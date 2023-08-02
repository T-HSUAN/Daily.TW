<template>
    <header>
        <!-- phone -->
        <div class="header_phone" v-if="screenWidth < 768">
            <!-- logo_sm &home_link -->
            <router-link to="/">
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
                        <div @click="toggleUser">
                            會員中心,
                        </div>
                        <div @click="handleLogout">
                            登出
                        </div>
                    </div>
                    <!-- 未登入狀態 -->
                    <div v-else>
                        <router-link to="/login">
                            <li>{{ $store.state.name }}</li>
                        </router-link>
                    </div>
                </ul>
                <router-link to="/">
                    <img class="sidebar_logo" :src="LOGO.sidebar" alt="logo" @click="hideSidebar">
                </router-link>
            </nav>
        </div>
        <!-- desktop -->
        <div :class="['header_desktop', { 'header_short': changeHeight }]" v-if="screenWidth > 767">
            <!-- logo_xl &home_link -->
            <router-link to="/">
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
                            會員中心,
                        </div>
                        <div @click="handleLogout">
                            登出
                        </div>
                    </div>
                    <!-- 未登入狀態 -->
                    <div v-else>
                        <router-link to="/login">
                            <li>{{ $store.state.name }}</li>
                        </router-link>
                    </div>
                </ul>
            </nav>
        </div>
        
        


    </header>
</template>
<script>
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

                // {
                //     id: 6,
                //     name: "登入|註冊",
                //     link: "login",
                //     img: "flag_login-reg",
                //     display: "none",
                // },
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
            this.$router.push({ path: "/member" });
        },
        handleLogout() {
            //登出
            this.$store.commit('setName', "登入/註冊");
            this.$store.commit('setIsLogin', false);
            this.$router.push("/");
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