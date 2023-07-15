<template>
    <header>
        <div class="header" v-show="showHeader">
            <!-- logo:home-link -->
            <router-link to="/">
                <img :src="require('../assets/img/big.svg')" alt="logo" />
            </router-link>
            <nav>
                <router-link to="/plan">專屬旅著</router-link>
                <router-link to="/trip">出遊特輯</router-link>
                <router-link to="/oott">穿搭特輯</router-link>
                <router-link to="/ticket">景點票券</router-link>
                <router-link to="/about">關於我們</router-link>
                <router-link to="/login">登入|註冊</router-link>
                <!-- <router-link to="/cart">購物車</router-link> -->
            </nav>
        </div>

        <div class="header_sm" v-show="!showHeader">
            <!-- <img alt="logo" src="./assets/img/logo.png"> -->
            <router-link to="/">
                <img :src="require('../assets/img/small.svg')" alt="logo" />
            </router-link>
            <nav>
                <router-link to="/plan">專屬旅著</router-link>
                <router-link to="/trip">出遊特輯</router-link>
                <router-link to="/oott">穿搭特輯</router-link>
                <router-link to="/ticket">景點票券</router-link>
                <router-link to="/about">關於我們</router-link>
                <router-link to="/login">登入|註冊</router-link>
                <!-- <router-link to="/cart">購物車</router-link> -->
            </nav>
        </div>
    </header>
</template>
<script>
export default {
    data() {
        return {
            showHeader: true,
        };
    },
    mounted() {
        window.addEventListener("scroll", this.handleScroll);
    },
    beforeDestroy() {
        window.removeEventListener("scroll", this.handleScroll);
    },
    methods: {
        handleScroll() {
            this.showHeader = window.scrollY <= 0;
        },
    },
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/main.scss";
</style>
