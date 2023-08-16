import { createRouter, createWebHistory } from "vue-router";
import Entrance from '@/views/Entrance.vue'
import HomeView from "@/views/HomeView.vue";
import TicketInfo from "@/views/TicketInfo.vue";
import store from '@/store/index.js'


const routesUser = [
    {//入口
        path: "/",
        name: 'Entrance',
        component: Entrance
    },
    {//首頁
        path: "/Home",
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
        path: "/trip_overview",
        name: "trip_overview",
        component: () =>
            import(
                /* webpackChunkName: "tripoverview" */ "@/views/TripOverview.vue"
            ),
    },
    {
        path: "/trip_info/:trip_id",
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
        path: "/oott_info/:oott_id",
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
        path: "/ticket_cart",
        name: "ticket_cart",
        component: () =>
            import(/* webpackChunkName: "cart" */ "@/views/TicketCart.vue"),
    },
    {
        path: "/ticket_payment",
        name: "ticket_payment",
        component: () =>
            import(/* webpackChunkName: "ticket_payment" */ "@/views/TicketPayment.vue"),
        beforeEnter: () => {
            console.log(store.state.isLogin)
            if (store.state.isLogin === false) {
                return { name: 'home' }
            }
        },
    },
    {
        path: "/ticket_pay_success",
        name: "ticket_pay_success",
        component: () =>
            import(
                /* webpackChunkName: "ticket_pay_success" */ "@/views/TicketPaySuccess.vue"
            ),
        beforeEnter: () => {
            console.log(store.state.isLogin)
            if (store.state.isLogin === false) {
                return { name: 'home' }
            }
        },
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
        beforeEnter: () => {
            // console.log('login');
            console.log(store.state.isLogin)
            if(store.state.isLogin === true){
                return {name:'home'}
            }
        },
    },
    {
        path: "/forget_psw",
        name: "forgetpsw",
        component: () =>
            import(/* webpackChunkName: "forgetpsw" */ "@/views/ForgetPsw.vue"),
        beforeEnter: () => {
            console.log(store.state.isLogin)
            if (store.state.isLogin === true) {
                return { name: 'home' }
            }
        },

    },
    {
        path: "/reset_psw",
        name: "resetpsw",
        component: () =>
            import(/* webpackChunkName: "resetpsw" */ "@/views/ResetPsw.vue"),
        beforeEnter: () => {
            console.log(store.state.isLogin)
            if (store.state.isLogin === true) {
                return { name: 'home' }
            }
        },
    },
    {
        path: "/member_info",
        name: "memberinfo",
        component: () =>
            import(
                /* webpackChunkName: "memberinfo" */ "@/views/MemberInfo.vue"
            ),
            beforeEnter: () => {
                console.log(store.state.isLogin)
                if (store.state.isLogin === false) {
                    return { name: 'home' }
                }
            },
            
    },
    {
        path: "/member_psw",
        name: "memberpsw",
        component: () =>
            import(/* webpackChunkName: "memberpsw" */ "@/views/MemberPsw.vue"),
            beforeEnter: () => {
                console.log(store.state.isLogin)
                if (store.state.isLogin === false) {
                    return { name: 'home' }
                }
            },
    },
    {
        path: "/member",
        name: "member",
        component: () =>
            import(/* webpackChunkName: "member" */ "@/views/MemberView.vue"),
            beforeEnter: () => {
                console.log(store.state.isLogin)
                if (store.state.isLogin === false) {
                    return { name: 'home' }
                }
            },
    },
    {
        path: "/myorder",
        name: "myorder",
        component: () =>
            import(/* webpackChunkName: "myorder" */ "@/views/MyOrder.vue"),
            beforeEnter: () => {
                console.log(store.state.isLogin)
                if (store.state.isLogin === false) {
                    return { name: 'home' }
                }
            },
    },
    {
        path: "/signup",
        name: "signup",
        component: () =>
            import(/* webpackChunkName: "signup" */ "@/views/SignUpView.vue"),
        beforeEnter: () => {
            console.log(store.state.isLogin)
            if (store.state.isLogin === true) {
                return { name: 'home' }
            }
        },
    },
    {
        path: "/signup_info",
        name: "signup_info",
        component: () =>
            import(/* webpackChunkName: "SignUpInfo" */ "@/views/SignUpInfo.vue"),
        beforeEnter: () => {
            console.log(store.state.isLogin)
            if (store.state.isLogin === true) {
                return { name: 'home' }
            }
        },
    },
    {
        path: "/oott_post_view",
        name: "OottPostView",
        component: () =>
            import(
                /* webpackChunkName: "OottPostView" */ "@/views/OottPostView.vue"
            ),
        beforeEnter: () => {
            console.log(store.state.isLogin)
            if (store.state.isLogin === false) {
                return { name: 'home' }
            }
        },
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
        path: "/oott_edit_view/:oottId",
        name: "OottEditView",
        component: () =>
            import(
                /* webpackChunkName: "OottEditView" */ "@/views/OottEditView.vue"
            ),
        props: true,
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
