import { createI18n } from 'vue-i18n';

const messages = {
    ru: {
        input: {
            name: 'Имя',
            email: 'Email',
            password: 'Пароль',
            passwordConfirmation: 'Подтверждение пароля',
            agreement: 'Я согласен с <a href="javascript:void(0)" class="text-emerald-500">Политикой конфиденциальности</a>',
        }
    },
    en: {
        input: {
            name: 'Name',
            email: 'Email',
            password: 'Password',
            passwordConfirmation: 'Confirme Password',
            agreement: 'I agree with the <a href="javascript:void(0)" class="text-emerald-500">Privacy Policy</a>',
        }
    },
};

const i18n = createI18n({
    locale: import.meta.env.VITE_APP_LOCALE,
    fallbackLocale: import.meta.env.VITE_APP_FALLBACK_LOCALE,
    messages,
});

export default i18n;
