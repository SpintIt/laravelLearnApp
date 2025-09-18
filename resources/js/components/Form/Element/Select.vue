<template>
    <div class="relative w-full mb-4">
        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" :for="name">{{ t(name) }}</label>
        <select
            :id="name"
            :name="name"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
        >
            <option value="" disabled>{{ t(name) }}</option>
            <option v-for="option in options" :key="option.id" :value="option.id">{{ option.name }}</option>
        </select>
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
    options: {
        type: Array,
        default: [],
    },
    title: {
        type: String,
        default: '',
    },
    name: {
        type: String,
        default: '',
    },
    type: {
        type: String,
        default: 'text',
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
            size: "Размер",
            color: "Цвет",
        },
        en: {
        }
    }
})
</script>
