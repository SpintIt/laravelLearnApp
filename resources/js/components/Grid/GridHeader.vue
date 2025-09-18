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
        ></th>
    </tr>
    </thead>
</template>

<script setup>
import { computed } from 'vue';
import { useI18n } from 'vue-i18n';

import GridRow from "./Models/GridRow.js";

const props = defineProps({
    color: {
        type: String,
        default: 'light',
    },
    row: {
        type: GridRow,
        default: null,
    },
});

const colorClass = computed(() => {
    return props.color === 'light'
        ? 'bg-blueGray-50 text-blueGray-500 border-blueGray-100'
        : 'bg-emerald-800 text-emerald-300 border-emerald-700';
});

const { t } = useI18n({
    messages: {
        ru: {
            title: "Каталог",
        },
        en: {}
    }
});
</script>
