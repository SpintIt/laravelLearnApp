<template>
    <div
        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
    >
        <div class="rounded-t bg-white mb-0 px-6 py-6">
            <div class="text-center flex justify-between">
                <h6 class="text-blueGray-700 text-xl font-bold">{{ t('title') }}</h6>
                <button
                    class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                    type="button"
                >
                    {{ t('buttonCreate') }}
                </button>
            </div>
        </div>
        <div class="block w-full overflow-x-auto">
            <GridView :grid="gridModel"/>
        </div>
    </div>
</template>

<script>
import bootstrap from "@/assets/img/bootstrap.jpg";
import angular from "@/assets/img/angular.jpg";
import sketch from "@/assets/img/sketch.jpg";
import react from "@/assets/img/react.jpg";
import vue from "@/assets/img/vue.jpg";

import team1 from "@/assets/img/team-1-800x800.jpg";
import team2 from "@/assets/img/team-2-800x800.jpg";
import team3 from "@/assets/img/team-3-800x800.jpg";
import team4 from "@/assets/img/team-4-470x470.png";

import GridView from "../Grid/Grid.vue";
import GridModel from "../Grid/Models/Grid.js";

export default {
    components: {
        GridView
    },
    props: {
        color: {
            type: String,
            default: 'light',
        },
    },
    data() {
        return {
            gridModel: new GridModel(),
            bootstrap,
            angular,
            sketch,
            react,
            vue,
            team1,
            team2,
            team3,
            team4,
        };
    },
    mounted() {
    },
    methods: {}
};
</script>

<script setup>
import {useI18n} from 'vue-i18n'

const {t} = useI18n({
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
})
</script>
