<template>
    <!-- 768px以下顯示側邊欄 -->
    <div class="container_box">
        <!-- 手機版 -->
        <header v-if="viewportWidth < 768" class="phone">
            <!-- logo -->
            <router-link to="/" @click="homeClick">
                <img class="logo" :src="require('@/assets/img/layout/small.svg')" alt="logo" />
            </router-link>
            <!-- 漢堡條 -->
            <img class="ham" :src="require('@/assets/img/layout/hamburger.svg')" alt="hamburger" @click="toggleSidebar" />
        </header>
        <!-- 漢堡nav -->
        <aside v-if="viewportWidth < 768" :class="{ 'show-sidebar': showSidebar }">
            <img class="ham_close" :src="require('@/assets/img/layout/hamburger_close.svg')" alt="hamburger"
                @click="toggleSidebar" />
            <nav>
                <router-link v-for="item in menu" :key="item.id" :to="'/' + item.link" @click="flagDisplay(item.id)">
                    <img :src="require(`@/assets/img/layout/${item.img}.svg`)" alt="icon"
                        :style="{ display: item.display }" />
                    &nbsp;{{ item.name }}
                </router-link>
            </nav>
            <img class="sidebar_logo" :src="require('@/assets/img/layout/sidebar_logo.svg')" alt="logo" />
        </aside>

        <!-- 768px以上顯示header -->
        <header v-else :class="{ sm: showHeader }">
            <div v-if="!showHeader" class="header_default">
                <!-- + { _hidden: !showHeader } -->
                <router-link to="/" @click="homeClick">
                    <img class="logo" :src="require('@/assets/img/layout/logo.png')" alt="logo" />
                </router-link>
                <!-- nav選單 -->
                <nav>
                    <router-link v-for="item in menu" :key="item.id" :to="'/' + item.link" @click="flagDisplay(item.id)">
                        <img :src="require(`@/assets/img/layout/${item.img}.svg`)
                            " alt="icon" :style="{ display: item.display }" />
                        &nbsp;{{ item.name }}
                    </router-link>
                </nav>
            </div>
            <!-- 小nav -->
            <div v-else class="header_sm">
                <!-- + { _display: showHeader } -->
                <router-link to="/" @click="homeClick">
                    <img class="logo" :src="require('@/assets/img/layout/small.svg')" alt="logo" />
                </router-link>
                <nav>
                    <router-link v-for=" item in menu" :key="item.id" :to="'/' + item.link" @click="flagDisplay(item.id)">
                        <img :src="require(`@/assets/img/layout/${item.img}.svg`)
                            " alt="icon" :style="{ display: item.display }" />
                        &nbsp;{{ item.name }}
                    </router-link>
                </nav>
            </div>
        </header>
    </div>
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

                {
                    id: 6,
                    name: "登入|註冊",
                    link: "login",
                    img: "flag_login-reg",
                    display: "none",
                },
            ],
            showHeader: true,
            showSidebar: false, // 新增側邊欄顯示狀態
            viewportWidth: 0, // 用來存儲視窗寬度
        };
    },
    methods: {
        handleScroll() {
            this.showHeader = window.scrollY > 0;
        },
        flagDisplay(itemId) {
            this.menu.forEach((item) => {
                if (item.id === itemId) {
                    item.display = "block";
                } else {
                    item.display = "none";
                }
            });
            this.saveMenuState();
        },
        homeClick() {
            this.menu.forEach((item) => {
                item.display = "none";
            });
            this.saveMenuState();
        },
        saveMenuState() {
            // 使用LocalStorage保存菜单状态
            sessionStorage.setItem('menuState', JSON.stringify(this.menu));
        },
        loadMenuState() {
            // 从LocalStorage中加载菜单状态
            const savedMenuState = sessionStorage.getItem('menuState');
            if (savedMenuState) {
                this.menu = JSON.parse(savedMenuState);
            } else {
                // 如果LocalStorage中没有保存的菜单状态，则初始化为初始状态
                this.menu.forEach((item) => {
                    item.display = "none";
                })
            }
        },
        handleResize() {
            this.viewportWidth = window.innerWidth;
        },
        toggleSidebar() {
            this.showSidebar = !this.showSidebar;
        },
    },
    mounted() {
        window.addEventListener("scroll", this.handleScroll);
        this.handleScroll();
        window.addEventListener("resize", this.handleResize);
        this.handleResize();
        this.loadMenuState();
    },
    beforeDestroy() {
        window.removeEventListener("scroll", this.handleScroll);
        window.removeEventListener("resize", this.handleResize);
    },
};
</script>

<style lang="scss">
@import "@/assets/scss/baseAndMixin.scss";
</style>
