import { createRouter, createWebHistory } from "vue-router";
import HomeView from "@/views/HomeView.vue";
// import ProductsView from '@/views/ProductsView.vue'

const routesUser = [
    {
        path: "/",
        name: "home",
        component: HomeView,
    },
    {
        path: "/ticket",
        name: "ticket",
        // component: TicketView
        component: () =>
            import(/* webpackChunkName: "ticket" */ "@/views/TicketView.vue"),
    },
    {
        path: "/login",
        name: "login",
        component: () =>
            import(/* webpackChunkName: "login" */ "@/views/LoginView.vue"),
    },
    {
        path: "/cart",
        name: "cart",
        component: () =>
            import(/* webpackChunkName: "cart" */ "@/views/CartView.vue"),
    },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes: routesUser,
});

export default router;
