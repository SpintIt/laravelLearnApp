<template>
    <div>
        <label class="inline-flex items-center cursor-pointer" :for="name">
            <input
                type="checkbox"
                :name="name"
                :id="name"
                :checked="modelValue"
                @input="$emit('update:modelValue', $event.target.checked)"
                class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                autocomplete="off"
            />
            <span class="ml-2 text-sm font-semibold text-blueGray-600" v-html="t(name)" />
        </label>
        <error :message="errorMessage"/>
    </div>
</template>

<script setup>
import { useI18n } from 'vue-i18n'
import { computed } from "vue";

import Error from "./Error.vue";

const props = defineProps({
    modelValue: {
        type: Boolean,
        default: false,
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
});

const errorMessage = computed(() => {
    if (Array.isArray(props.error)) {
        return props.error.join(', ');
    }

    return props.error;
});

const { t } = useI18n({
    messages: {
        ru: {
            active: "Активность",
            activeOffer: "Активность",
            agreement: "Я согласен с <a href='javascript:void(0)' class='text-emerald-500'>Политикой конфиденциальности</a>",
            remember: "Запомнить меня",
        },
        en: {
            active: "Active",
            agreement: "I agree with the <a href='javascript:void(0)' class='text-emerald-500'>Privacy Policy</a>",
            remember: "Remember me",
        }
    }
})
</script>
