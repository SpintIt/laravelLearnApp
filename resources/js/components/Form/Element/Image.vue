<template>
    <div class="relative w-full mb-3">
        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" :for="name">
            {{ t(name) }}
        </label>
        <input
            type="file"
            :id="name"
            :name="name"
            @change="handleFileChange"
            class="block w-full text-sm text-blueGray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-emerald-50 file:text-emerald-700
                                    hover:file:bg-emerald-100"
            ref="fileInputRef"
            accept=".jpg, .jpeg, .png, .webp"
        />
        <error :message="errorMessage"/>

        <div v-if="image" class="mt-2 flex flex-col items-start">
            <img :src="image" alt="Image preview" class="max-w-[100px] h-auto rounded"/>
            <button
                type="button"
                @click="remove"
                class="text-red-500 hover:text-red-700 text-xs font-semibold mt-2"
            >{{ t('removeImage') }}
            </button>
        </div>
    </div>
</template>

<script setup>
import { useI18n } from 'vue-i18n'
import { onMounted, computed, ref, watch } from "vue";
import Error from "./Error.vue";
import login from "@/assets/img/login.jpg";

const emit = defineEmits(['update:modelValue']);

const prop = defineProps({
    modelValue: {
        type: [Object, null],
        default: null,
    },
    name: {
        type: String,
        required: true,
    },
    error: {
        type: [String, Array],
        default: '',
    },
    imagePreview: {
        type: [String, null],
        default: null,
    }
});

const fileInputRef = ref(null);

const image = ref(prop.imagePreview);

onMounted(async () => {
    if (prop.imagePreview)
    {
        try {
            const response = await fetch(prop.imagePreview);
            const blob = await response.blob();
            const fileName = prop.imagePreview.substring(prop.imagePreview.lastIndexOf('/') + 1);
            const fileType = blob.type || 'image/jpeg';
            const file = new File([blob], fileName, { type: fileType });
            emit('update:modelValue', file);
            image.value = URL.createObjectURL(file);
        } catch (e) {
            console.error('Failed to create File object from URL:', e);
        }
    }
});

watch(() => prop.modelValue, (newValue) => {
    if (newValue === null && image.value !== null) {
        image.value = null;
        if (fileInputRef.value) {
            fileInputRef.value.value = '';
        }
    } else if (newValue instanceof File && image.value !== URL.createObjectURL(newValue)) {
        image.value = URL.createObjectURL(newValue);
    }
}, { immediate: true });


const errorMessage = computed(() => {
    if (Array.isArray(prop.error)) {
        return prop.error.join(', ');
    }
    return prop.error;
});

const handleFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        emit('update:modelValue', file);
        image.value = URL.createObjectURL(file);
    } else {
        emit('update:modelValue', null);
        image.value = null;
    }
};

const remove = () => {
    emit('update:modelValue', null);
    image.value = null;
    if (fileInputRef.value) {
        fileInputRef.value.value = '';
    }
};

const { t } = useI18n({
    messages: {
        ru: {
            image: "Изображение",
            imageOffer: "Изображение",
            removeImage: "Удалить изображение",
        },
        en: {
            image: "Image",
            imageOffer: "Image",
            removeImage: "Remove image",
        }
    }
})
</script>
