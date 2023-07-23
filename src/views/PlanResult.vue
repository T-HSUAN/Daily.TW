<template>
    <div class="plan_result">
        <div class="banner">
            <div class="main_pic">
                <div class="boy">
                    <img src="~@/assets/img/layout/plan_result-1.png" alt="">
                </div>
                <div class="duck">
                    <img src="~@/assets/img/layout/plan_result-2.png" alt="">
                </div>
            </div>
            <div class="result_title">
                <h1>專屬旅著已產生...</h1>
                <div class="location_icon">
                    <img src="~@/assets/img/layout/plan_result-3.png" alt="">
                </div>
                <div class="result_arrow">
                    <img src="~@/assets/img/layout/plan_result_arrow.png" alt="">
                </div>
                <span>往下查看結果</span>
            </div>
        </div>
        <div class="result_wave"></div>
    </div>
</template>
<script></script>
<style lang="scss">
@import "@/assets/scss/main.scss";
#app{
    background-color: $bgColor_default;
}

.plan_result{
    .banner{
        // overflow: hidden;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center center;
        background-image: url("~@/assets/img/layout/plan_result_bg-sm.png");
        @media (min-width: $md){
            background-image: url("~@/assets/img/layout/plan_result_bg-xl.png");
        }
    }
}
</style>