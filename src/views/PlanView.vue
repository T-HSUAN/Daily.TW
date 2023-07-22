<!-- 專屬旅著 -->
<template>
    <div class="plan_view">
        <div class="plan_title">
            <h1>測出你的一日專屬旅著！</h1>
        </div>
        <div class="banner_main">
            <div class="bubble_wrap">
                <div class="bubble">
                    <span>沒時間規劃<br>出遊行程 ?</span>
                </div>
                <div class="bubble">
                    <span>要穿什麼<br>才好呢 ?</span>
                </div>
            </div>
            <div class="pic">
                <div class="clothes">
                    <img src="~@/assets/img/layout/plan_clothes.png" alt="">
                </div>
                <div class="boy">
                    <img src="~@/assets/img/layout/plan_boy.png" alt="">
                </div>
                <div class="map">
                    <img src="~@/assets/img/layout/plan_map.png" alt="">
                </div>
            </div>
            <div class="bubble_wrap">
                <div class="bubble">
                    <span>太多景點<br>選擇困難 ?</span>
                </div>
                <div class="bubble">
                    <span>一天幾個景點<br>才夠玩 ?</span>
                </div>
            </div>
        </div>
        <router-link to="/plan/quiz">
            <button class="btn">開始答題</button>
        </router-link>
        <div class="banner_deco">
            <div class="plan_duck">
                <img src="~@/assets/img/layout/plan_duck.png" alt="">
            </div>
            <div class="plan_grass">
                <img src="~@/assets/img/layout/plan_grass.png" alt="">
            </div>
        </div>
    </div>
</template>

<script>
// export default {
//   data(){
//     return {
     
//     }
//   },
//   methods: {
    
//   }
// }
</script>

<style lang="scss">
@import "@/assets/scss/main.scss";
#app{
    background-color: $bgColor_default;
}
.plan_view{
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: $bgColor_default;
    // padding-top: $sp4;
    overflow: hidden;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center center;
    background-image: url("~@/assets/img/layout/plan_bg_sm.png");
    @media (min-width: $md){
        background-image: url("~@/assets/img/layout/plan_bg_xl.png");
    }
    .plan_title{
        width: 300px;
        padding-bottom: $sp3;
        @media (min-width: $md){
            width: 1440px;
        }
        h1{
            @include sm_h1;
            @media (min-width: $md){
                @include xl_h1;
            }
            text-align: center;
            -webkit-text-stroke: 5px $textColor_default;
            position: relative;
            letter-spacing: 6px;
            line-height: 150%;
            &::before {
                content: '測出你的一日專屬旅著！';
                position: absolute;
                top: 0;
                left: 0;
                @include sm_h1;
                -webkit-text-stroke: 0;
                color: $textColor_tint;
                letter-spacing: 6px;
                @media (min-width: $md){
                    top:50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    @include xl_h1;
                }
            }
        }
    }
    .banner_main{
        width: 100%;
        position: relative;
        display: flex;
        justify-content: center;
        @media (min-width: $md){
            padding-top: $sp7;
        }
        .bubble_wrap{
            .bubble{
                background-size: contain;
                background-repeat: no-repeat;
                width: 110px;
                height: 110px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                @media (min-width: $md){
                    width: 176px;
                    height: 176px;
                }
                span{
                    @include sm_p;
                    line-height: 150%;
                    color: $textColor_white;
                    text-align: center;
                    @media (min-width: $md){
                        @include xl_p;
                    }
                }
            }
        }
        .bubble_wrap:nth-child(1){
            .bubble:nth-child(1){
                position: relative;
                bottom: 16px;
                right: 16px;
                background-image: url("~@/assets/img/layout/plan_bubble1.png");
                @media (min-width: $md){
                    left: 0;
                    bottom: 40px;
                }
                @media (min-width: $xl){
                    left: 200px;
                    bottom: 40px;
                }
                span{
                    margin-right: 8px;
                }
            }
            .bubble:nth-child(2){
                position: relative;
                top: 32px;
                right: -16px;
                z-index: 1;
                background-image: url("~@/assets/img/layout/plan_bubble3.png");
                @media (min-width: $md){
                    left: 50px;
                    bottom: 40px;
                }
                span{
                    margin-bottom: 25px;
                    @media (min-width: $md){
                        margin-bottom: 36px;
                    }
                }
            }
        }
        .bubble_wrap:nth-child(3){
            .bubble:nth-child(1){
                position: relative;
                bottom: 12px;
                left: 16px;
                background-image: url("~@/assets/img/layout/plan_bubble2.png");
                @media (min-width: $md){
                    bottom: 40px;
                    left: 0;
                }
                @media (min-width: $xl){
                    bottom: 40px;
                    left: -80px;
                }
                span{
                    margin-bottom: 10px;
                    @media (min-width: $md){
                        margin-bottom: 20px;
                    }
                }
            }
            .bubble:nth-child(2){
                position: relative;
                top: 24px;
                left: -16px;
                background-image: url("~@/assets/img/layout/plan_bubble4.png");
                @media (min-width: $md){
                    left: -60px;
                }
            }
        }
        .pic{
            @media (min-width: $md){
                display: flex;
            }
            .clothes{
                display: none;
                @media (min-width: $xl){
                    display: inline-block;
                    position: relative;
                    top: 140px;
                    left: 0;
                    img{
                        width: 300px;
                    }
                }
            }
            .boy{
                position: relative;
                left: 8px;
                z-index: 1;
                @media (min-width: $md){
                    left: 4px;
                }
                img{
                    width: 163px;
                    @media (min-width: $md){
                        width: 274px;
                    }
                }
            }
            .map{
                display: none;
                @media (min-width: $xl){
                    display: inline-block;
                    position: relative;
                    right: 30px;
                    top: 60px;
                    img{
                        width: 283px;
                    }
                }
            }
        }
    }
    .btn{
        margin: $sp4 0 $sp10 0;
        @media (min-width: $md){
            margin: $sp6 0 $sp15 0;
        }
    }
    .banner_deco{
        position: relative;
        .plan_duck{
            padding-left: $sp1;
            position: absolute;
            bottom: 20%;
            left: 0;
            width: 100%;
            img{
                width: 20%;
                min-width: 136px;
                max-width: 275px;
            }
        }
        .plan_grass{
            width: 100%;
            position: relative;
            top: 4px;
            img{
                width: 100%;
                vertical-align: bottom;
            }
        }
    }
}
</style>