import { createApp } from "vue";
import { createWebHistory, createRouter } from "vue-router";

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-token');
}

// styles

import "@fortawesome/fontawesome-free/css/all.min.css";
import "@/assets/styles/tailwind.css";

// mouting point for the whole app

import App from "@/App.vue";

// layouts

import Admin from "./layouts/Admin.vue";
import Auth from "./layouts/Auth.vue";

// views for Admin layout

import Dashboard from "@/views/admin/Dashboard.vue";
import Settings from "@/views/admin/Settings.vue";
import Tables from "@/views/admin/Tables.vue";
import Maps from "@/views/admin/Maps.vue";

// views for Auth layout

import Login from "@/views/auth/Login.vue";
import Register from "@/views/auth/Register.vue";

// views without layouts

import Landing from "@/views/Landing.vue";
import Profile from "@/views/Profile.vue";
import Index from "@/views/Index.vue";
import Catalog from "./views/admin/Catalog.vue";

// routes

const routes = [
    {
        path: "/admin",
        component: Admin,
        children: [
            {
                path: "catalog",
                component: Catalog,
                meta: { hideHeaderStats: true },
            },
            {
                path: "dashboard",
                component: Dashboard,
            },
            {
                path: "dashboard/:id",
                component: Dashboard,
            },
            {
                path: "settings",
                component: Settings,
            },
            {
                path: "tables",
                component: Tables,
            },
            {
                path: "maps",
                component: Maps,
            },
        ],
    },
    {
        path: "/auth",
        redirect: "/auth/login",
        component: Auth,
        children: [
            {
                path: "login",
                component: Login,
            },
            {
                path: "register",
                component: Register,
            },
        ],
    },
    {
        path: "/landing",
        component: Landing,
    },

    {
        path: "/profile",
        component: Profile,
    },
    { path: "/:pathMatch(.*)*", redirect: "/" },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});


createApp(App).use(router).mount("#app");
