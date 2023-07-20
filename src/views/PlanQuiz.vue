<!-- 專屬旅著題目 -->
<template>
<!-- 第一題 -->
<div class="question">
    <div class="title">
        <div class="number">Q1</div>
        <h2>現在想去哪裡玩呢？</h2>
    </div>
    <div class="pic">
        <div class="place">
            <div class="place_bubble">
                <img src="~@/assets/img/layout/plan_q1-2.png" alt="">
            </div>
            <div class="place_bubble">
                <img src="~@/assets/img/layout/plan_q1-3.png" alt="">
            </div>
        </div>
        <div class="taiwan">
            <img src="~@/assets/img/layout/plan_q1-1.png" alt="">
        </div>
        <div class="place">
            <div class="place_bubble">
                <img src="~@/assets/img/layout/plan_q1-4.png" alt="">
            </div>
            <div class="place_bubble">
                <img src="~@/assets/img/layout/plan_q1-5.png" alt="">
            </div>
        </div>
    </div>
    <div class="selection">
        <div class="boy">
            <img src="~@/assets/img/layout/plan_q1-6.png" alt="">
        </div>
        <select name="" id="selection_main">
            <option value="">請選擇1~3個地區</option>
            <option value="">台北</option>
            <option value="">台中</option>
            <option value="">高雄</option>
        </select>
    </div>
    <button class="btn">
        下一題
        <img src="~@/assets/img/btn_arrow.png" alt="" class="arrow_white">
        <img src="~@/assets/img/btn_arrow_hover.png" alt="" class="arrow_brown">
    </button>
</div>
<!-- 第二題 -->
<div class="question">
    <div class="title">
        <div class="number">Q2</div>
        <h2>看到下列景點標籤，<br>哪些是你感興趣的呢？</h2>
    </div>
    <div class="question_main">
        <div class="wheel">
            <img src="~@/assets/img/layout/plan_q2-2.png" alt="">
        </div>
        <div class="tags_wrap">
            <span>* 請選擇至少3個</span>
            <label>
                <input type="checkbox" class="tag" />
                <span>{{ tagTexts }}</span>
            </label>
        </div>
        <div class="rabbit">
            <img src="~@/assets/img/layout/plan_q2-3.png" alt="">
        </div>
        <div class="luggage">
            <img src="~@/assets/img/layout/plan_q2-4.png" alt="">
        </div>
    </div>
    <div class="btn_wrap">
        <button class="cancel_btn">回到上一題</button>
        <button class="btn">
            下一題
            <img src="~@/assets/img/btn_arrow.png" alt="" class="arrow_white">
            <img src="~@/assets/img/btn_arrow_hover.png" alt="" class="arrow_brown">
        </button>
    </div>
    
</div>
</template>

<script>
import Tag from "@/components/Tag.vue";

export default {
    components: {
        Tag,
    },
    data() {
        return {
            place_category: ["#親子", "#情侶", "#小資", "#風景", "#山林", "#海邊", "#樂園", "#農場", "#藝文", "#放鬆", "#懷舊"],
        }
    }
};
</script>

<style lang="scss">
@import "@/assets/scss/main.scss";

.question{
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: $bgColor_default;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center center;
    background-image: url("~@/assets/img/layout/plan_bg_sm.png");
    @media (min-width: $md){
        background-image: url("~@/assets/img/layout/plan_bg_xl.png");
    }
    .title{
        display: flex;
        align-items: center;
        flex-direction: column;
        gap: $sp2;
        padding: $sp4 0;
        @media (min-width: $md){
            flex-direction: row;
            gap: $sp3;
            padding: $sp4 0 $sp3 0;
        }
        .number{
            font-size: 36px;
            font-weight: 900;
            line-height: 65px;
            text-align: center;
            color: $textColor_white;
            -webkit-text-stroke: 2px $textColor_default;
            width: 71px;
            height: 72px;
            background-image: url(~@/assets/img/layout/plan_qa.png);
            background-size: contain;
            background-repeat: no-repeat;
            @media (min-width: $md){
                font-size: 45px;
                line-height: 80px;
                width: 87px;
                height: 88px;
            }
        }
        h2{
            line-height: 150%;
            @include sm_h2;
            @media (min-width: $md){
                @include xl_h2;
            }
        }
    }
    .pic{
        display: flex;
        .taiwan{
            img{
                width: 138px;
                @media (min-width: $md){
                    width: 233px;
                }
            }
        }
        .place:nth-child(1){
            display: none;
            @media (min-width: $md){
                display: block;
                .place_bubble:nth-child(1){
                    position: relative;
                    right: 80px;
                    top: 40px;
                    img{
                        width: 145px;
                    }
                }
                .place_bubble:nth-child(2){
                    position: relative;
                    right: 30px;
                    top: 100px;
                    img{
                        width: 126px;
                    }
                }
            }
        }
        .place:nth-child(3){
            .place_bubble:nth-child(1){
                position: relative;
                left: 20px;
                top: 30px;
                @media (min-width: $md){
                    left: 30px;
                    top: 0;
                }
                img{
                    width: 70px;
                    @media (min-width: $md){
                        width: 101px;
                    }
                }
            }
            .place_bubble:nth-child(2){
                position: relative;
                left: 30px;
                top: 40px;
                @media (min-width: $md){
                    top: 50px;
                    left: 60px;
                }
                img{
                    width: 94px;
                    @media (min-width: $md){
                        width: 128px;
                    }
                }
            }
        }
    }
    .selection{
        padding: $sp3 0 $sp4 0;
        position: relative;
        .boy{
            position: absolute;
            bottom: 64px;
            right: 50px;
            @media (min-width: $md){
                bottom: 72px;
                right: 0;
            }
            img{
                width: 119px;
                @media (min-width: $md){
                    width: 187px;
                }
            }
        }
        select{
            position: relative;
            z-index: 1;
            width: 311px;
            @media (min-width: $md){
                width: 375px;
            }
        }
    }
    .btn{
        margin-bottom: $sp12;
        position: relative;
        img{
            width: 40px;
            @media (min-width: $md){
                width: 45px;
            }
        }
        .arrow_white{
            position: absolute;
            right: 24px;
            @media (min-width: $md){
                right: 32px;
            }
        }
        &:hover{
            .arrow_white{
                display: none;
            }
        }
    }

    // 第二題
    .question_main{
        display: flex;
        align-items: flex-end;
        .wheel{
            position: relative;
            left: 100px;
            bottom: 30px;
            z-index: 1;
            img{
                width: 264px;
            }
        }
        .tags_wrap{
            width: 580px;
            height: 490px;
            background-image: url(~@/assets/img/layout/plan_q2-1.png);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: top center;
            position: relative;
            span{
                @include xl_p;
                position: absolute;
                top: 115px;
                left: 120px;
            }
        }
        .rabbit{
            position: relative;
            right: 95px;
            bottom: 30px;
            z-index: 1;
            img{
                width: 95px;
            }
        }
        .luggage{
            position: relative;
            right: 155px;
            bottom: 30px;
            img{
                width: 180px;
            }
        }
    }
    .btn_wrap{
        .cancel_btn{
            margin-right: $sp3;
        }
    }
}
</style>