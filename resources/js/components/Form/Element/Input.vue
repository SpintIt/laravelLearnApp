<template>
    <div class="relative w-full mb-4">
        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" :for="name">
            {{ t(name) }}
        </label>
        <input
            :type="type"
            :id="name"
            :name="name"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
            :placeholder="title"
            autocomplete="on"
        />
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
        type: {
            type: String,
            default: 'text',
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
            name: "Имя",
            email: "Email",
            password: "Пароль",
            password_confirmation: "Подтверждение пароля"
        },
        en: {
            name: "Name",
            email: "Email",
            password: "Password",
            password_confirmation: "Confirme Password"
        }
    }
})
</script>
