<template>
    <div class="stage_page">
        <img src="@/assets/img/layout/small.svg" alt="logo">
        <div class="link">
            <router-link to="/" class="front">前台</router-link>
            <router-link to="/" class="back">後台</router-link>
        </div>
    </div>
</template>
<style lang="scss">
@import "@/assets/scss/baseAndMixin.scss";

.stage_page {
    width: 100%;
    height: 100vh;
    background: url("@/assets/img/layout/plan_bg_xl.png");
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;

    img {
        margin: auto;
    }

    .link {
        margin: auto;

        .front,
        .back {
            display: inline-block;
            width: 250px;
            line-height: 250px;
            font-size: 48px;
            color: $textColor_default;
            background: $tint_green;
            text-align: center;
            border-radius: 50%;
        }

        .back {
            background: $tint_blue;
        }
    }
}
</style>