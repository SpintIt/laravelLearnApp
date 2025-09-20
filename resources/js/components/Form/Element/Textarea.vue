<template>
    <div class="relative w-full mb-3">
        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" :for="name">
            {{ t(name) }}
        </label>
        <textarea
            :id="name"
            :name="name"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            type="textarea"
            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
            rows="4"
            :placeholder="title"
            autocomplete="on"
        ></textarea>

        <error :message="errorMessage"/>
    </div>
</template>

<script setup>
import { useI18n } from 'vue-i18n'
import { computed } from "vue";
import Error from "./Error.vue";

const prop = defineProps({
    modelValue: {
        type: String,
        default: '',
    },
    title: {
        type: String,
        default: '',
    },
    name: {
        type: String,
        default: '',
    },
    error: {
        type: [String, Array],
        default: '',
    },
})

const errorMessage = computed(() => {
    if (Array.isArray(prop.error)) {
        return prop.error.join(', ');
    }

    return prop.error;
});

const { t } = useI18n({
    messages: {
        ru: {
            description: "Описание",
        },
        en: {
            description: "Description",
        }
    }
})
</script>
