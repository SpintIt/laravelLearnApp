<template>
    <thead v-show="row">
    <tr>
        <th
            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
            :class="colorClass"
            v-for="(cell, key) in row.getData()"
        >
            {{ cell.getData() }}
        </th>

        <th
            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
            :class="colorClass"
            v-for="(cell, key) in row"
        ></th>
    </tr>
    </thead>
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

import GridRow from "./Models/GridRow.js";

export default {
    components: {},
    props: {
        color: {
            type: String,
            default: 'light',
        },
        row: {
            type: GridRow,
            default: null,
        },
    },
    data() {
        return {
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
    computed: {
        colorClass() {
            return this.color === 'light'
                ? 'bg-blueGray-50 text-blueGray-500 border-blueGray-100'
                : 'bg-emerald-800 text-emerald-300 border-emerald-700'
        }
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
        },
        en: {}
    }
})
</script>
