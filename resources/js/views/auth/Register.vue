<template>
    <div class="container mx-auto px-4 h-full">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-6/12 px-4">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        <div class="text-blueGray-400 text-center my-3 font-bold">
                            {{ t('title') }}
                        </div>
                        <form @submit.prevent="submitForm">
                            <Input
                                name="name"
                                v-model="form.name"
                                :error="errors.name"
                            />

                            <Input
                                name="email"
                                v-model="form.email"
                                :error="errors.email"
                            />

                            <Input
                                name="password"
                                v-model="form.password"
                                :error="errors.password"
                                type="password"
                            />

                            <Input
                                name="password_confirmation"
                                v-model="form.password_confirmation"
                                :error="errors.password_confirmation"
                                type="password"
                            />

                            <Checkbox
                                name="agreement"
                                v-model="form.agreement"
                                :error="errors.agreement"
                            />

                            <div class="text-center mt-6">
                                <button
                                    class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                    type="submit"
                                >{{ t('button') }}
                                </button>
                            </div>
                            <div class="text-center mt-6">
                                <router-link to="/auth/login">
                                    {{ t('linkToLogin') }}
                                </router-link>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { reactive , ref } from "vue";
import axios from "axios";
import {useI18n} from 'vue-i18n'

import Input from "../../components/Form/Element/Input.vue";
import Checkbox from "../../components/Form/Element/Checkbox.vue";

const form = reactive({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    agreement: false,
});

let errors = ref({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    agreement: '',
});

const submitForm = async () => {
    try {
        const response = await axios.post('/auth/register', form);
        const {user, token, status} = response.data;

        if (status === 'ok') {
            localStorage.setItem('authToken', token);
            window.location.href = '/admin';
        } else {
            console.error(t('error'));
        }
    } catch (error) {
        if (error.response && error.response.data) {
            errors.value = error.response.data.errors;
        } else {
            console.error(t('exception'), error);
        }
    }
}

const {t} = useI18n({
    messages: {
        ru: {
            title: "Регистрация",
            button: "Создать аккаунт",
            linkToLogin: "Войти",
            error: "Что-то пошло не так!",
            exception: "Произошла непредвиденная ошибка:",
        },
        en: {
            title: "Sign up",
            button: "Create Account",
            linkToLogin: "Login in",
        }
    }
})
</script>
