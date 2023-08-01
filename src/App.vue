<template>
    <MainHeader></MainHeader>
    <main>
        <router-view />
    </main>
    <ArrowUp></ArrowUp>
    <MainFooter></MainFooter>
</template>

<script>
import MainHeader from "@/components/MainHeader.vue";
import MainFooter from "@/components/MainFooter.vue";
import ArrowUp from "@/components/ArrowUp.vue";

export default {
    components: {
        MainHeader,
        MainFooter,
        ArrowUp,
    },
    data() {
        return {};
    },
};
</script>

<style lang="scss">
// @import "@/assets/scss/main.scss";
// @import url('./assets/scss/main.scss');ss
// @import './assets/scss/main.scss';
// #app {
//     @include sm_p;
//     font-family: $fontFamily;
//     color: $textColor_default;
//     background: $bgColor_tint;

//     h1 {
//         @include sm_h1;
//     }

//     h2 {
//         @include sm_h2;
//     }

//     h3 {
//         @include sm_h3;
//     }

//     h4 {
//         @include sm_h4;
//     }

//     h5 {
//         @include sm_h5;
//     }

// }

// @media all and (min-width: $md) {
//     #app {
//         @include xl_p;

//         h1 {
//             @include xl_h1;
//         }

//         h2 {
//             @include xl_h2;
//         }

//         h3 {
//             @include xl_h3;
//         }

//         h4 {
//             @include xl_h4;
//         }

//         h5 {
//             @include xl_h5;
//         }
//     }
// }
</style>
