import { createRouter, createWebHistory } from "vue-router";
import HomeView from "@/views/HomeView.vue";
import TicketInfo from "@/views/TicketInfo.vue";

const routesUser = [
    {//首頁
        path: "/",
        name: "home",
        component: HomeView,
    },
    // {
    //     path: "/",
    //     name: "frontbackstage",
    //     component: () =>
    //         import(
    //             /* webpackChunkName: "frontbackstage" */ "@/views/FrontBackStage.vue"
    //         ),
    // },
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
        path: "/trip_overview",
        name: "trip_overview",
        component: () =>
            import(
                /* webpackChunkName: "tripoverview" */ "@/views/TripOverview.vue"
            ),
    },
    {
        path: "/trip_info",
        name: "trip_info",
        component: () =>
            import(/* webpackChunkName: "tripinfo" */ "@/views/TripInfo.vue"),
    },
    {
        path: "/oott",
        name: "oott",
        component: () =>
            import(/* webpackChunkName: "oott" */ "@/views/OottView.vue"),
    },
    {
        path: "/oott_overview",
        name: "oott_overview",
        component: () =>
            import(
                /* webpackChunkName: "oottoverview" */ "@/views/OottOverview.vue"
            ),
    },
    {
        path: "/oott_info",
        name: "oott_info",
        // component: TicketView
        component: () =>
            import(/* webpackChunkName: "oottinfo" */ "@/views/OottInfo.vue"),
    },
    {
        path: "/ticket",
        name: "ticket",
        // component: TicketView
        component: () =>
            import(/* webpackChunkName: "ticket" */ "@/views/TicketView.vue"),
    },
    {
        path: "/ticket/:id",
        name: "ticket_info",
        component: TicketInfo,
        props: true,
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
        path: "/forget_psw",
        name: "forgetpsw",
        component: () =>
            import(/* webpackChunkName: "forgetpsw" */ "@/views/ForgetPsw.vue"),
    },
    {
        path: "/reset_psw",
        name: "resetpsw",
        component: () =>
            import(/* webpackChunkName: "resetpsw" */ "@/views/ResetPsw.vue"),
    },
    {
        path: "/member_info",
        name: "memberinfo",
        component: () =>
            import(
                /* webpackChunkName: "memberinfo" */ "@/views/MemberInfo.vue"
            ),
    },
    {
        path: "/member_psw",
        name: "memberpsw",
        component: () =>
            import(/* webpackChunkName: "memberpsw" */ "@/views/MemberPsw.vue"),
    },
    {
        path: "/member",
        name: "member",
        component: () =>
            import(/* webpackChunkName: "member" */ "@/views/MemberView.vue"),
    },
    {
        path: "/myorder",
        name: "myorder",
        component: () =>
            import(/* webpackChunkName: "myorder" */ "@/views/MyOrder.vue"),
    },
    {
        path: "/signup",
        name: "signup",
        component: () =>
            import(/* webpackChunkName: "signup" */ "@/views/SignUpView.vue"),
    },
    {
        path: "/cart",
        name: "cart",
        component: () =>
            import(/* webpackChunkName: "cart" */ "@/views/CartView.vue"),
    },
    {
        path: "/ticket_payment",
        name: "ticket_payment",
        component: () =>
            import(/* webpackChunkName: "ticket_payment" */ "@/views/TicketPayment.vue"),
    },
    {
        path: "/ticket_pay_success",
        name: "ticket_pay_success",
        component: () =>
            import(
                /* webpackChunkName: "ticket_pay_success" */ "@/views/TicketPaySuccess.vue"
            ),
    },
    {
        path: "/oott_post_view/:oott_id",
        name: "OottPostView",
        component: () =>
            import(
                /* webpackChunkName: "OottPostView" */ "@/views/OottPostView.vue"
            ),
    },
    {
        path: "/trip_collection_view",
        name: "TripCollectionView",
        component: () =>
            import(
                /* webpackChunkName: "TripCollectionView" */ "@/views/TripCollectionView.vue"
            ),
    },
    {
        path: "/oott_edit_view",
        name: "OottEditView",
        component: () =>
            import(
                /* webpackChunkName: "OottEditView" */ "@/views/OottEditView.vue"
            ),
    },
    {
        path: "/my_oott",
        name: "MyOott",
        component: () =>
            import(/* webpackChunkName: "MyOott" */ "@/views/MyOott.vue"),
    },
    {
        path: "/oott_collection_view",
        name: "OottCollectionView",
        component: () =>
            import(
                /* webpackChunkName: "OottCollectionView" */ "@/views/OottCollectionView.vue"
            ),
    },
    {
        path: "/email",
        name: "test",
        component: () =>
            import(
                /* webpackChunkName: "OottCollectionView" */ "@/views/email.vue"
            ),
    },
    
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes: routesUser,
});

export default router;
