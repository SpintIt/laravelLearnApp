<template>
    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
        <div class="rounded-t bg-white mb-0 px-6 py-6">
            <div class="text-center flex justify-between">
                <h6 class="text-blueGray-700 text-xl font-bold">{{ t('title') }}</h6>
                <router-link to="/admin/catalog/create"
                    class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                    type="button">
                    {{ t('buttonCreate') }}
                </router-link>
            </div>
        </div>
        <div class="block w-full overflow-x-auto">
            <GridView v-if="gridModel" :grid="gridModel" />
            <Loader v-else />
        </div>
    </div>
</template>

<script setup>
import { useI18n } from 'vue-i18n';
import { reactive, markRaw, ref, onMounted } from 'vue';
import api from '../../api.js';

import Loader from '../Loader/Loader.vue';

import GridView from "../Grid/Grid.vue";
import GridModel from "../Grid/Models/Grid.js";

defineProps({
    color: {
        type: String,
        default: 'light',
    },
});

let gridModel = ref(null);

onMounted(async () => {
    try {
        const data = await api.getProducts();
        gridModel.value = markRaw(new GridModel(data));
    } catch (error) {
        console.error(t('exception'), error);
    }
});

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
