<template>
    <div class="container mx-auto px-4 h-full">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-6/12 px-4">
                <div
                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0"
                >
                    <!--          <div class="rounded-t mb-0 px-6 py-6">
                                <div class="text-center mb-3">
                                  <h6 class="text-blueGray-500 text-sm font-bold">
                                    Sign up with
                                  </h6>
                                </div>
                                <div class="btn-wrapper text-center">
                                  <button
                                    class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
                                    type="button"
                                  >
                                    <img alt="..." class="w-5 mr-1" :src="github" />
                                    Github
                                  </button>
                                  <button
                                    class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
                                    type="button"
                                  >
                                    <img alt="..." class="w-5 mr-1" :src="google" />
                                    Google
                                  </button>
                                </div>
                                <hr class="mt-6 border-b-1 border-blueGray-300" />
                              </div>-->
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        <div class="text-blueGray-400 text-center my-3 font-bold">
                            <small>Or sign up with credentials</small>
                        </div>
                        <form @submit.prevent="submitForm">
                            <Input
                                :title="t('input.name')"
                                name="name"
                                v-model="form.name"
                                :error="errors.name"
                            />

                            <Input
                                :title="t('input.email')"
                                name="email"
                                v-model="form.email"
                                :error="errors.email"
                            />

                            <Input
                                :title="t('input.password')"
                                name="password"
                                v-model="form.password"
                                :error="errors.password"
                            />

                            <Input
                                :title="t('input.passwordConfirmation')"
                                name="password_confirmation"
                                v-model="form.password_confirmation"
                                :error="errors.password_confirmation"
                            />

                            <Checkbox
                                :title="t('input.agreement')"
                                name="agreement"
                                v-model="form.agreement"
                                :error="errors.agreement"
                            />

                            <div class="text-center mt-6">
                                <button
                                    class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                    type="submit"
                                >
                                    Create Account
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { useI18n } from 'vue-i18n'
import github from "@/assets/img/github.svg";
import google from "@/assets/img/google.svg";
import axios from "axios";

import Error from "../../components/Form/Element/Error.vue";
import Input from "../../components/Form/Element/Input.vue";
import Checkbox from "../../components/Form/Element/Checkbox.vue";

export default {
    setup() {
        const { t, locale } = useI18n({
            useScope: 'global'
        })

        return { t, locale }
    },
    components: {
        Checkbox,
        Error,
        Input
    },
    data() {
        return {
            github,
            google,
            form: {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                agreement: false,
            },
            errors: {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                agreement: '',
            },
        };
    },
    methods: {
        async submitForm() {
            try {
                const response = await axios.post('/auth/register', this.form);
                const {user, token, status} = response.data;

                if (status === 'ok') {
                    localStorage.setItem('authToken', token);
                    console.log('Регистрация прошла успешно! Токен сохранён.', user);
                    window.location.href = '/admin';
                } else {
                    console.error('Что-то пошло не так!');
                }
            } catch (error) {
                if (error.response && error.response.data) {
                    this.errors = error.response.data.errors;
                } else {
                    console.error('Произошла непредвиденная ошибка:', error);
                }
            }
        }
    }
};
</script>
