<template>
    <div class="container mx-auto px-4 h-full">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-4/12 px-4">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        <div class="text-blueGray-400 text-center my-3 font-bold">
                            {{ t('title') }}
                        </div>
                        <form @submit.prevent="submitForm">
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

                            <Checkbox
                                name="remember"
                                v-model="form.remember"
                                :error="errors.remember"
                            />
                            <div class="text-center mt-6">
                                <button
                                    class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                    type="submit"
                                >
                                    {{ t('button') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="flex flex-wrap mt-6 relative">
                    <div class="w-1/2">
                        <a href="javascript:void(0)" class="text-blueGray-200">
                            <small>{{ t('forgot') }}</small>
                        </a>
                    </div>
                    <div class="w-1/2 text-right">
                        <router-link to="/auth/register" class="text-blueGray-200">
                            <small>{{ t('linkToRegistration') }}</small>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import github from "@/assets/img/github.svg";
import google from "@/assets/img/google.svg";
import axios from "axios";

import Input from "../../components/Form/Element/Input.vue";
import Checkbox from "../../components/Form/Element/Checkbox.vue";

export default {
    components: {
        Checkbox,
        Input
    },
    data() {
        return {
            github,
            google,
            form: {
                name: '',
                password: '',
                remember: false,
            },
            errors: {
                name: '',
                password: '',
                remember: '',
            }
        };
    },
    methods: {
        async submitForm() {
            try {
                const response = await axios.post('/auth/login', this.form);
                const {user, token, status} = response.data;

                if (status === 'ok') {
                    localStorage.setItem('authToken', token);
                    window.location.href = '/admin';
                } else {
                    console.error(t('error'));
                }
            } catch (error) {
                if (error.response && error.response.data) {
                    this.errors = error.response.data.errors;
                } else {
                    console.error(t('exception'), error);
                }
            }
        }
    }
};
</script>

<script setup>
import {useI18n} from 'vue-i18n'

const {t} = useI18n({
    messages: {
        ru: {
            title: "Авторизация",
            button: "Войти",
            forgot: "Забыл пароль?",
            linkToRegistration: "Создать аккаунт",
            error: "Что-то пошло не так!",
            exception: "Произошла непредвиденная ошибка:",
        },
        en: {
            title: "Sign In",
            button: "Sign In",
            forgot: "Forgot password?",
            linkToRegistration: "Create new account",
        }
    }
})
</script>
