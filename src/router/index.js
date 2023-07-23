import { createRouter, createWebHistory } from "vue-router";
import HomeView from "@/views/HomeView.vue";
import OottPostView from "@/views/OottPostView.vue";
import TripCollectionView from "@/views/TripCollectionView.vue";

const routesUser = [
    {
        path: "/",
        name: "home",
        component: HomeView,
    },
    {
        path: "/plan",
        name: "plan",
        component: () =>
            import(/* webpackChunkName: "plan" */ "@/views/PlanView.vue"),
    },
    {
        path: "/plan_quiz",
        name: "quiz",
        component: () =>
            import(/* webpackChunkName: "quiz" */ "@/views/PlanQuiz.vue"),
    },
    {
        path: "/plan_result",
        name: "result",
        component: () =>
            import(/* webpackChunkName: "result" */ "@/views/PlanResult.vue"),
    },
    {
        path: "/trip",
        name: "trip",
        component: () =>
            import(/* webpackChunkName: "trip" */ "@/views/TripView.vue"),
    },
    {
        path: "/oott",
        name: "oott",
        component: () =>
            import(/* webpackChunkName: "oott" */ "@/views/OottView.vue"),
      
    },
    {
        path: "/oott_info",
        name: "oott_info",
        // component: TicketView
        component: () =>
            import(/* webpackChunkName: "oott" */ "@/views/OottInfo.vue"),
    },
    {
        path: "/ticket",
        name: "ticket",
        // component: TicketView
        component: () =>
            import(/* webpackChunkName: "ticket" */ "@/views/TicketView.vue"),
    },
    {
        path: "/ticketinfo",
        name: "ticketinfo",
        // component: TicketInfo
        component: () =>
            import(
                /* webpackChunkName: "ticketinfo" */ "@/views/TicketInfo.vue"
            ),
    },
    {
        path: "/about",
        name: "about",
        component: () =>
            import(/* webpackChunkName: "about" */ "@/views/AboutView.vue"),
    },
    {
        path: "/login",
        name: "login",
        component: () =>
            import(/* webpackChunkName: "login" */ "@/views/LoginView.vue"),
    },
    {
        path: "/login/forgetpsw",
        name: "forgetpsw",
        component: () =>
            import(/* webpackChunkName: "forgetpsw" */ "@/views/ForgetPsw.vue"),
    },
    {
        path: "/member",
        name: "member",
        component: () =>
            import(/* webpackChunkName: "member" */ "@/views/MemberView.vue"),
    },
    {
        path: "/register",
        name: "register",
        component: () =>
            import(
                /* webpackChunkName: "register" */ "@/views/RegisterView.vue"
            ),
    },
    {
        path: "/cart",
        name: "cart",
        component: () =>
            import(/* webpackChunkName: "cart" */ "@/views/CartView.vue"),
    },
    {
        path: "/OottPostView",
        component: OottPostView,
    },
    {
        path: "/TripCollectionView",
        component: TripCollectionView,
    },
    
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes: routesUser,
});

export default router;
