<template>
    <div
        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
    >
        <div class="rounded-t bg-white mb-0 px-6 py-6">
            <div class="text-center flex justify-between">
                <h6 class="text-blueGray-700 text-xl font-bold">{{ t('title') }}</h6>
                <router-link to="/admin/catalog/create"
                    class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                    type="button"
                >
                    {{ t('buttonCreate') }}
                </router-link>
            </div>
        </div>
        <div class="block w-full overflow-x-auto">
            <GridView :grid="gridModel"/>
        </div>
    </div>
</template>

<script setup>
import { useI18n } from 'vue-i18n';
import { reactive, markRaw } from 'vue';

import GridView from "../Grid/Grid.vue";
import GridModel from "../Grid/Models/Grid.js";

defineProps({
    color: {
        type: String,
        default: 'light',
    },
});

const gridModel = reactive(markRaw(new GridModel()));

const { t } = useI18n({
    messages: {
        ru: {
            title: "Каталог",
            buttonCreate: "Создать",
            linkToLogin: "Войти",
            error: "Что-то пошло не так!",
            exception: "Произошла непредвиденная ошибка:",
        },
        en: {}
    }
});
</script>
