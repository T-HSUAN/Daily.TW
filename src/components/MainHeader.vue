<template>
    <header>
        <!-- phone -->
        <div class="header_phone" v-if="screenWidth < 768">
            <!-- logo_sm &home_link -->
            <router-link to="/Home">
                <img class="logo_sm" :src="LOGO.sm" alt="logo" @click="hideSidebar" />
            </router-link>
            <img class="ham_toggle" :src="Hamburger.toggle" alt="hamburger_toggle" @click="toggleSidebar" />
            <!-- menu -->
            <nav :class="['menu_sidebar', { 'showSidebar': showSidebar }]">
                <ul>
                    <router-link v-for=" item in menu " :key="item.id" :to="'/' + item.link" @click="toggleSidebar">
                        <li>{{ item.name }}</li>
                    </router-link>
                    <!-- 登入後顯示 -->
                    <div v-if="isLogin">
                        <router-link to="/member" @click="toggleSidebar">
                            <li>會員中心</li>
                        </router-link>

                        <div @click="handleLogout">
                            登出
                        </div>
                    </div>
                    <!-- 未登入狀態 -->
                    <div v-else>
                        <router-link to="/login" @click="toggleSidebar">
                            <li>{{ $store.state.name }}</li>
                        </router-link>
                    </div>
                </ul>
                <router-link to="/Home">
                    <img class="sidebar_logo" :src="LOGO.sidebar" alt="logo" @click="hideSidebar">
                </router-link>
            </nav>
        </div>

        <!-- desktop -->
        <div :class="['header_desktop', { 'header_short': changeHeight }]" v-if="screenWidth > 767">
            <!-- logo_xl &home_link -->
            <router-link to="/Home">
                <img :class="'logo_' + LOGO.size" :src="LOGO.desktop" alt="logo">
            </router-link>
            <!-- menu -->
            <nav class="menu">
                <ul>
                    <router-link v-for=" item in menu " :key="item.id" :to="'/' + item.link">
                        <li>{{ item.name }}</li>
                    </router-link>
                    <!-- 登入後顯示 -->
                    <div v-if="isLogin">
                        <div @click="toggleUser">
                            會員中心
                        </div>
                        <span class="separate">|</span>
                        <div @click="handleLogout">
                            登出
                        </div>
                    </div>
                    <!-- 未登入狀態 -->
                    <div v-else>
                        <router-link to="/login" @click="toggleSidebar">
                            <li>{{ $store.state.name }}</li>
                        </router-link>
                    </div>
                </ul>
            </nav>
        </div>




    </header>
</template>
<script>

import { POST } from '../plugin/axios.js';

export default {
    data() {
        return {
            menu: [
                {
                    id: 1,
                    name: "專屬旅著",
                    link: "plan",
                    img: "flag_plan",
                    display: "none",
                },
                {
                    id: 2,
                    name: "出遊特輯",
                    link: "trip",
                    img: "flag_trip",
                    display: "none",
                },
                {
                    id: 3,
                    name: "穿搭特輯",
                    link: "oott",
                    img: "flag_oott",
                    display: "none",
                },
                {
                    id: 4,
                    name: "景點票券",
                    link: "ticket",
                    img: "flag_ticket",
                    display: "none",
                },
                {
                    id: 5,
                    name: "關於我們",
                    link: "about",
                    img: "flag_about",
                    display: "none",
                },

            ],
            LOGO: {
                sidebar: require('@/assets/img/layout/sidebar_logo.svg'),
                sm: require('@/assets/img/layout/small.svg'),
                xl: require('@/assets/img/layout/logo.png'),
                desktop: require('@/assets/img/layout/logo.png'),
                size: 'xl'
            },
            Hamburger: {
                toggle: require('@/assets/img/layout/ham_open.svg'),
            },
            screenWidth: 0,
            showSidebar: false, // 側邊欄開關
            changeHeight: true,

        };
    },
    methods: {
        Resize() {
            this.screenWidth = window.innerWidth;
        },
        toggleSidebar() {
            this.showSidebar = !this.showSidebar;
            if (this.showSidebar === true) {
                this.Hamburger.toggle = require('@/assets/img/layout/ham_close.svg');
            } else {
                this.Hamburger.toggle = require('@/assets/img/layout/ham_open.svg');
            }
        },
        hideSidebar() {
            this.showSidebar = false;
            this.Hamburger.toggle = require('@/assets/img/layout/ham_open.svg');
        },
        scrollDown() {
            this.changeHeight = window.scrollY > 0;
            if (this.changeHeight === true) {
                this.LOGO.desktop = require('@/assets/img/layout/small.svg')
                this.LOGO.size = 'sm'
            } else {
                this.LOGO.desktop = require('@/assets/img/layout/logo.png')
                this.LOGO.size = 'xl'
            }
        },
        toggleUser() {
            this.showSidebar = !this.showSidebar;
            this.$router.push({ path: "/member" });
        },
        //登出
        handleLogout() {
            this.showSidebar = !this.showSidebar;
            this.$store.commit('setName', "登入|註冊");
            this.$store.commit('setIsLogin', false);
            sessionStorage.removeItem("mem_id");
            this.$router.push("/Home");
            setTimeout(() => {
                this.$router.go(0);

            }, 10)
        },


        //檢查登入狀態
        checkLogin() {
            let memId = sessionStorage.getItem("mem_id");
            console.log(memId);

            if (memId) {

                let URL = `${this.$URL}/sessionLogin.php`;
                // 建立一個 FormData 物件，用來傳送資料到後端
                let params = new FormData();
                //將資料新增到 FormData 物件中。第一個參數 "mem_id" 是欄位的名稱，它是後端接收資料時的參數名稱
                params.append("mem_id", memId);
                POST(URL, params).then((res) => {
                    console.log(res);
                    this.$store.commit("setLoginData", res);
                });
            } else {
                this.$store.commit('logOut');
            }
        },



    },
    computed: {
        isLogin() {
            return this.$store.state.isLogin;
        },
    },
    mounted() {
        this.Resize();
        window.addEventListener('resize', this.Resize);
        window.addEventListener("scroll", this.scrollDown);
        this.scrollDown();

        this.checkLogin();
    },
    beforeUnmount() {
        window.removeEventListener('resize', this.Resize);
        window.removeEventListener("scroll", this.scrollDown);
    },

};
</script>
<style lang="scss" scoped>
// @import "@/assets/scss/baseAndMixin.scss";
</style>