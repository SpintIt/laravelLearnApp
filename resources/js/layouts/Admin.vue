<template>
    <div>
        <sidebar />
        <div class="relative md:ml-64 bg-blueGray-100">
            <admin-navbar />
            <div class="relative bg-emerald-600 md:pt-28 pb-28 pt-24">
                <div class="px-4 md:px-10 mx-auto w-full">
                    <header-stats v-if="showHeaderStats" />
                </div>
            </div>
            <div class="px-4 md:px-10 mx-auto w-full -m-24">
                <router-view />
                <footer-admin />
            </div>
        </div>
    </div>
</template>
<script setup>
import { computed } from 'vue'
import { useRoute } from 'vue-router'

import AdminNavbar from "../components/Navbars/AdminNavbar.vue";
import Sidebar from "../components/Sidebar/Sidebar.vue";
import HeaderStats from "../components/Headers/HeaderStats.vue";
import FooterAdmin from "../components/Footers/FooterAdmin.vue";

const route = useRoute();

const showHeaderStats = computed(() => !route.meta.hideHeaderStats);
</script>
