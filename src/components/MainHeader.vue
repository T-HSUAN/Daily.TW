<template>
    <!-- 滾動超過200px header增加class:sm -->
    <header :class="{ sm: showHeader }">
        <!-- 滾動超過200px不顯示default -->
        <div v-if="!showHeader" class="header_default">
            <!--  + { _hidden: !showHeader } -->
            <!-- logo:home-link -->
            <router-link to="/">
                <img
                    class="logo"
                    :src="require('../assets/img/logo.png')"
                    alt="logo"
                />
            </router-link>
            <nav>
                <router-link
                    v-for="item in menu"
                    :key="item.id"
                    :to="'/' + item.link"
                    @click="flagDisplay(item.id)"
                    ><img
                        :src="require(`../assets/img/${item.img}.svg`)"
                        alt="icon"
                        :style="{
                            display: item.display,
                        }"
                    />
                    &nbsp;{{ item.name }}
                </router-link>
            </nav>
        </div>
        <!-- 滾動超過200px顯示sm -->
        <div v-else class="header_sm">
            <!-- + { _display: showHeader } -->
            <router-link to="/">
                <img
                    class="logo"
                    :src="require('../assets/img/small.svg')"
                    alt="logo"
                />
            </router-link>
            <nav>
                <router-link
                    v-for="item in menu"
                    :key="item.id"
                    :to="'/' + item.link"
                    @click="flagDisplay(item.id)"
                    ><img
                        :src="require(`../assets/img/${item.img}.svg`)"
                        alt="icon"
                        :style="{
                            display: item.display,
                        }"
                    />
                    &nbsp;{{ item.name }}
                </router-link>
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
                {
                    id: 6,
                    name: "登入|註冊",
                    link: "login",
                    img: "flag_login-reg",
                    display: "none",
                },
            ],
            showHeader: true,
        };
    },
    mounted() {
        window.addEventListener("scroll", this.handleScroll);
        this.handleScroll();
    },
    beforeDestroy() {
        window.removeEventListener("scroll", this.handleScroll);
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
        },
    },
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/main.scss";
</style>
