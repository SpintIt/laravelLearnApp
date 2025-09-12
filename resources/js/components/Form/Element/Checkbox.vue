<template>
    <div>
        <label class="inline-flex items-center cursor-pointer" :for="name">
            <input
                type="checkbox"
                :name="name"
                :id="name"
                :checked="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
                class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                autocomplete="off"
            />
            <span class="ml-2 text-sm font-semibold text-blueGray-600" v-html="t(name)" />
        </label>
        <error :message="errorMessage"/>
    </div>
</template>

<script>
import Error from "./Error.vue";

export default {
    components: {Error},
    data() {
        return {
        };
    },
    props: {
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
    },
    computed: {
        errorMessage() {
            if (Array.isArray(this.error)) {
                return this.error.join(', ');
            }

            return this.error;
        },
    },
};
</script>

<script setup>
import { useI18n } from 'vue-i18n'

const { t } = useI18n({
    messages: {
        ru: {
            agreement: "Я согласен с <a href='javascript:void(0)' class='text-emerald-500'>Политикой конфиденциальности</a>",
            remember: "Запомнить меня",
        },
        en: {
            agreement: "I agree with the <a href='javascript:void(0)' class='text-emerald-500'>Privacy Policy</a>",
            remember: "Remember me",
        }
    }
})
</script>
