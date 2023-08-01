<template>
    <div class="about_view">
        <div class="about_bg">
            <div class="about_banner">
                <div class="banner_deco_top">
                    <span>行程規劃 X 穿搭推薦</span>
                </div>
                <div class="banner_deco_left">
                    <span>S<br>I<br>N<br>C<br>E<br>2<br>0<br>2<br>3</span>
                </div>
                <div class="about_title">
                    <h2>日日旅著</h2>
                    <div class="about_subtitle">
                        <span>每一天都能規劃</span>
                        <span>你的專屬旅著！</span>
                    </div>
                </div>
                <div class="about_boy">
                    <img src="~@/assets/img/layout/about_banner.png" alt="">
                </div>
            </div>
        </div>
        <div class="about_us">
            <div class="about_swiper">
                <div class="swiper_wrap">
                    <Carousel :autoplay="3000" :wrap-around="true">
                        <Slide v-for="item in aboutPic" :key="item.index">
                            <img :src="item.src" alt="">
                        </Slide>
                    </Carousel>
                </div>
                <div class="slogan_deco">
                    <img src="~@/assets/img/layout/about_slogan.png" alt="">
                </div>
            </div>
            <div class="about_desc">
                <div class="desc_title">
                    <h2>關於</h2>
                    <div class="desc_logo">
                        <img src="~@/assets/img/layout/small.svg" alt="">
                    </div>
                </div>
                <div class="desc_subtitle">
                    <span>一日行程 + 穿搭建議</span>
                    <div class="about_arrow">
                        <img src="~@/assets/img/layout/about_arrow.png" alt="">
                        <span>開始你的專屬旅著 !</span>
                    </div>
                </div>
                <div class="desc_summary">
                    <p>
                        日日旅著提供一日行程規劃及穿搭靈感，讓旅客省下前置作業時間，安排出遊更便利，在這裡你能找到各式各樣的一天份輕旅行，也能分享出遊穿搭、展現個人風格，滿足你隨時都能說走就走 !
                    </p>
                </div>
                <div class="about_duckprint">
                    <div class="about_duck">
                        <img src="~@/assets/img/layout/about_duck.png" alt="">
                    </div>
                    <div class="about_footprint"></div>
                </div>
            </div>
        </div>
        <div class="about_us_wave"></div>
        <div class="about_service" id="about_service">
            <div class="service_title">
                <h2>我們的服務</h2>
                <div class="title_footprint"></div>
            </div>
            <div class="service_container">
                <div class="service_card_wrap">
                    <router-link to="/plan">
                        <div class="service_card">
                            <div class="card_front">
                                <div class="card_side_deco"></div>
                                <div class="card_main">
                                    <h3>專屬旅著</h3>
                                    <img src="~@/assets/img/layout/about_icon_duck.png" alt="">
                                </div>
                            </div>
                            <div class="card_back">
                                <div class="card_side_deco"></div>
                                <div class="card_main">
                                    <h3>專屬旅著</h3>
                                    <p>我們將依據您的需求客製化<br>推薦專屬的旅遊行程與穿搭</p>
                                    <img src="~@/assets/img/layout/about_service1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </router-link>
                </div>
                <div class="service_card_wrap">
                    <router-link to="/trip">
                        <div class="service_card">
                            <div class="card_front">
                                <div class="card_side_deco"></div>
                                <div class="card_main">
                                    <h3>出遊特輯</h3>
                                    <img src="~@/assets/img/layout/about_icon_map.png" alt="">
                                </div>
                            </div>
                            <div class="card_back">
                                <div class="card_side_deco"></div>
                                <div class="card_main">
                                    <h3>出遊特輯</h3>
                                    <p>由駐站旅人及小編規劃行程<br>不知道要去哪裡就能跟著走</p>
                                    <img src="~@/assets/img/layout/about_service2.png" alt="">
                                </div>
                            </div>
                        </div>
                    </router-link>
                </div>
                <div class="service_card_wrap">
                    <router-link to="/oott">
                        <div class="service_card">
                            <div class="card_front">
                                <div class="card_side_deco"></div>
                                <div class="card_main">
                                    <h3>穿搭特輯</h3>
                                    <img src="~@/assets/img/layout/about_icon_wear.png" alt="">
                                </div>
                            </div>
                            <div class="card_back">
                                <div class="card_side_deco"></div>
                                <div class="card_main">
                                    <h3>穿搭特輯</h3>
                                    <p>風格旅人分享出遊衣著搭配<br>展現獨特穿搭提供穿搭靈感</p>
                                    <img src="~@/assets/img/layout/about_service3.png" alt="">
                                </div>
                            </div>
                        </div>
                    </router-link>
                </div>
                <div class="service_card_wrap">
                    <router-link to="/ticket">
                        <div class="service_card">
                            <div class="card_front">
                                <div class="card_side_deco"></div>
                                <div class="card_main">
                                    <h3>景點票券</h3>
                                    <img src="~@/assets/img/layout/about_icon_ticket.png" alt="">
                                </div>
                            </div>
                            <div class="card_back">
                                <div class="card_side_deco"></div>
                                <div class="card_main">
                                    <h3>景點票券</h3>
                                    <p>囊括全台各地優惠景點門票<br>方便您一次購買到旅遊所需</p>
                                    <img src="~@/assets/img/layout/about_service4.png" alt="">
                                </div>
                            </div>
                        </div>
                    </router-link>
                </div>
            </div>
            <div class="service_action">
                <div class="action_slogan">
                    <span>不知道如何安排行程？<br>
                        不曉得出遊怎麼穿搭？</span>
                    <span>找日日旅著就對了！！！</span>
                </div>
                <router-link to="/plan">
                    <button class="btn">立即體驗</button>
                </router-link>

            </div>
        </div>
        <div class="about_service_wave"></div>
        <div class="about_message">
            <div class="message_title">
                <h2>有任何建議都<br>歡迎留言給我們</h2>
            </div>
            <div class="message_form">
                <form @submit.prevent="handleSubmit" action="">
                    <label for="user_name">
                        <span>姓名</span>
                        <input v-model="userName" type="text" name="user_name" id="user_name" placeholder="請輸入姓名">
                    </label><br>
                    <label for="user_email">
                        <span>email</span>
                        <input v-model="userEmail" type="text" name="user_email" id="user_email" placeholder="請輸入email">
                    </label><br>
                    <label for="user_title">
                        <span>主旨</span>
                        <input v-model="userTitle" type="text" name="user_title" id="user_title" placeholder="請輸入主旨">
                    </label><br>
                    <label for="user_content">
                        <span>內容說明</span>
                        <textarea v-model="userContent" name="user_content" id="user_content" rows="9" @input="handleContentChange"></textarea>
                        <span class="count_hint">{{ userContent.length }} / 限 200 字</span>
                    </label>
                </form>
                <button :disabled="!formValid" class="btn" @click="simulateSubmit">送出</button>
            </div>
        </div>
        <div v-if="showPopBox" class="about_popbox">
            <div class="block">
                <div class="pic">
                    <img src="~@/assets/img/popbox_check.svg" alt="" />
                    <p>已送出，感謝您的建議 !</p>
                </div>
            </div>
        </div>
        <div class="about_message_wave"></div>
        <div class="about_info" id="about_info">
            <div class="info_logo">
                <img src="~@/assets/img/layout/about_logo.png" alt="" />
            </div>
            <div class="info_desc">
                <div class="info_main">
                    <h3>日日旅著 Daily.TW</h3>
                    <a href="tel:0800000000">電話 : 0800-000-000</a>
                    <a href="mailto:service@dailytw.com">E-MAIL : service@dailytw.com</a>
                </div>
                <div class="info_follow">
                    <h3>FOLLOW US</h3>
                    <div class="follow_link">
                        <a href="#">
                            <font-awesome-icon icon="fa-brands fa-line" />
                        </a>
                        <a href="#">
                            <font-awesome-icon icon="fa-brands fa-instagram" />
                        </a>
                        <a href="#">
                            <font-awesome-icon icon="fa-brands fa-square-facebook" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
import { defineComponent } from 'vue'
import { Carousel, Pagination, Slide } from 'vue3-carousel'

import 'vue3-carousel/dist/carousel.css'

export default defineComponent({
    name: 'Autoplay',
    components: {
        Carousel,
        Slide,
        Pagination,
    },
    data: () => ({

        aboutPic: [
            { src: require('@/assets/img/layout/about_pic1.png') },
            { src: require('@/assets/img/layout/about_pic2.png') },
            { src: require('@/assets/img/layout/about_pic3.png') }
        ],

        userName: '',
        userEmail: '',
        userTitle: '',
        userContent: '',
        showPopBox: false,
    }),
    computed: {
        formValid() {
            return (
                this.userName.trim() !== '' &&
                this.userEmail.trim() !== '' &&
                this.userTitle.trim() !== '' &&
                this.userContent.trim() !== '' &&
                this.userContent.length <= 200
            );
        },
    },
    methods: {
        handleContentChange() {
        // Limit the number of characters in userContent to 200
            if (this.userContent.length > 200) {
                this.userContent = this.userContent.slice(0, 200);
            }
        },
        handleSubmit() {
            if (this.formValid) {
                // Form is valid, proceed with form submission logic
                // ...

                // Show the popbox
                this.showPopBox = true;
                // Automatically hide the popbox after 3 seconds
                setTimeout(() => {
                    this.showPopBox = false;
                }, 2000);

                // Reset form fields' values
                this.resetForm();
            }
        },
        resetForm() {
            // Reset form fields' values
            this.userName = '';
            this.userEmail = '';
            this.userTitle = '';
            this.userContent = '';
        },
        // 測試用，未進資料庫
        simulateSubmit() {
            this.handleSubmit();
        },
    },
})
</script>

<style lang="scss" scoped>
@import "@/assets/scss/baseAndMixin.scss";

.about_view{
    background-color: $bgColor_default;
    padding-top:74px;
    @media (min-width: $md) {
        padding-top:200px;
    }
    .about_bg {
        background-color: $bgColor_default;
        display: flex;
        justify-content: center;
    }

    .about_banner {
        width: 100%;
        background-color: $default_yellow;
        position: relative;

        @media (min-width: $md) {
            max-width: 1200px;
            border-radius: 5px 5px 0 5px;
        }

        .banner_deco_top {
            color: $textColor_white;
            @include sm_p;

            @media (min-width: $md) {
                @include xl_p;
            }

            text-align: center;
            padding-top: $sp1;
        }

        .banner_deco_left {
            color: $textColor_white;
            font-family: 'Baloo 2', 'Noto Sans TC', sans-serif;
            font-size: 16px;
            font-weight: 800;
            text-align: center;
            line-height: 150%;
            display: inline-block;
            padding: $sp1 0 $sp1 $sp1;

            @media (min-width: $md) {
                font-size: 32px;
            }
        }

        .about_title {
            background-color: $textColor_white;
            display: inline-block;
            border-radius: 5px 20px 20px 5px;
            padding: $sp2 $sp15 $sp2 $sp2;
            margin: 0 $sp6;
            position: relative;
            bottom: 100px;
            box-shadow: 0px 6px 1px rgba(0, 0, 0, 0.10);

            @media (min-width: $md) {
                bottom: 200px;
            }

            h2 {
                @include sm_h2;
                line-height: 150%;
                animation: fadeInDown 1s ease-in;

                @media (min-width: $md) {
                    @include xl_h1;
                }
            }

            .about_subtitle {
                @include sm_h4;
                line-height: 150%;
                white-space: nowrap;
                display: flex;
                flex-direction: column;
                animation: fadeInDown 1s ease-in;

                @media (min-width: $md) {
                    @include xl_h2;
                    flex-direction: row;
                    flex-wrap: wrap;
                }
            }
        }

        .about_boy img {
            width: 65%;
            max-width: 400px;
            position: absolute;
            right: 0;
            bottom: -3px;

            @media (min-width: $md) {
                bottom: -4px;
                max-width: 480px;
            }
        }
    }

    .about_us {
        width: 100%;
        background-color: $bgColor_default;
        display: flex;
        justify-content: center;
        overflow: hidden;

        .about_swiper {
            display: none;

            @media (min-width: $xl) {
                display: block;
                padding: $sp6 149px 140px $sp5;
                position: relative;

                .slogan_deco img {
                    width: 574px;
                    position: absolute;
                    bottom: -20px;
                    right: 10px;
                    z-index: 0;
                }

                .swiper_wrap {
                    width: 446px;
                    position: relative;
                    z-index: 1;

                    img {
                        width: 100%;
                    }
                }
            }
        }

        .about_desc {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: $sp6 $sp3 $sp5 $sp3;
            position: relative;

            @media (min-width: $md) {
                align-items: flex-start;
                padding: $sp6 $sp3 140px 0;
            }

            .desc_title {
                display: flex;
                padding-bottom: $sp3;

                h2 {
                    @include sm_h2;
                    color: $textColor_tint;
                    padding-right: $sp2;

                    @media (min-width: $md) {
                        @include xl_h2;
                    }
                }

                .desc_logo img {
                    width: 237px;

                    @media (min-width: $md) {
                        width: 384px;
                    }
                }
            }

            .desc_subtitle {
                padding-bottom: $sp2;

                @media (min-width: $md) {
                    padding-left: $sp12;
                }

                span {
                    @include sm_h5;

                    @media (min-width: $md) {
                        @include xl_h5;
                    }
                }

                .about_arrow {
                    display: inline-block;

                    img {
                        width: 36px;
                        padding: 0 $sp1;
                        position: relative;
                        bottom: 4px;
                    }
                }
            }

            .desc_summary {
                padding-bottom: $sp3;

                @media (min-width: $md) {
                    padding-left: $sp12;
                }

                p {
                    @include sm_p;
                    line-height: 180%;
                    text-align: center;

                    @media (min-width: $md) {
                        @include xl_p;
                        text-align: left;
                        width: 500px;
                        padding-bottom: $sp5;
                    }
                }
            }

            .about_duckprint {
                display: flex;
                align-items: flex-end;

                @media (min-width: $md) {
                    position: absolute;
                    left: -90px;
                    bottom: 80px;
                }

                .about_duck img {
                    width: 143px;
                    animation: shake .5s linear infinite alternate;

                    @media (min-width: $md) {
                        width: 258px;
                    }
                }

                .about_footprint {
                    width: 225px;
                    height: 55px;
                    background-image: url(~@/assets/img/layout/about_footprint_sm.png);
                    background-size: contain;
                    background-repeat: no-repeat;
                    position: relative;
                    bottom: -20px;

                    @media (min-width: $md) {
                        width: 460px;
                        height: 83px;
                        background-image: url(~@/assets/img/layout/about_footprint_xl.png);
                    }
                }
            }
        }
    }

    .about_us_wave,
    .about_message_wave {
        margin-top: -3%;
        background-image: url(~@/assets/img/layout/bg_wave1_sm.png);
        width: 100%;
        height: 56px;
        background-size: 100%;
        background-repeat: no-repeat;
        background-position: top center;
        position: relative;

        @media (min-width: 375px) {
            background-image: url(~@/assets/img/layout/bg_wave1_xl.png);
            height: 135px;
            margin-top: -1%;
        }
    }

    .about_service_wave {
        margin-top: -3%;
        background-image: url(~@/assets/img/layout/bg_wave2_sm.png);
        width: 100%;
        height: 56px;
        background-size: 100%;
        background-repeat: no-repeat;
        background-position: top center;
        position: relative;

        @media (min-width: 375px) {
            background-image: url(~@/assets/img/layout/bg_wave2_xl.png);
            height: 135px;
            margin-top: -1%;
        }
    }

    .about_service {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: $sp10 $sp7 $sp4 $sp7;
        margin-top: -130px;
        background-color: $bgColor_tint;

        @media (min-width: $md) {
            padding: $sp15 $sp7 $sp4 $sp7;
            margin-top: -120px;
        }

        .service_title {
            display: flex;
            align-items: flex-end;
            gap: $sp1;
            padding-bottom: $sp4;

            @media (min-width: $md) {
                padding-bottom: $sp6;
            }

            h2 {
                @include sm_h2;

                @media (min-width: $md) {
                    @include xl_h2;
                }
            }

            .title_footprint {
                width: 20px;
                height: 14px;
                background-image: url(~@/assets/img/layout/title_footprint.png);
                background-size: contain;
                background-repeat: no-repeat;
                position: relative;
                bottom: -4px;

                @media (min-width: $md) {
                    width: 29px;
                    height: 20px;
                }
            }
        }

        .service_container {
            display: flex;
            flex-direction: column;
            gap: $sp2;

            @media (min-width: $md) {
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                gap: $sp3;
                max-width: 1200px;
            }

            .service_card_wrap {
                width: 265px;
                position: relative;

                @media (min-width: $md) {
                    width: 486px;
                    height: 300px;
                }

                .service_card {
                    position: relative;
                    width: 100%;
                    height: 100%;
                    transform-style: preserve-3d;
                    transition: 0.5s all linear;

                    @media (min-width: $md) {
                        &:hover {
                            transform: rotateY(180deg);
                        }
                    }

                    .card_front {
                        display: none;

                        @media (min-width: $md) {
                            background-color: $textColor_white;
                            border-radius: 5px 20px 20px 5px;
                            border: 2px solid $textColor_default;
                            box-sizing: border-box;
                            display: flex;
                            position: absolute;
                            backface-visibility: hidden;
                            width: 100%;
                        }

                        img {
                            width: 192px;
                        }
                    }

                    .card_back {
                        background-color: $textColor_white;
                        border-radius: 5px 20px 20px 5px;
                        border: 2px solid $textColor_default;
                        box-sizing: border-box;
                        display: flex;

                        @media (min-width: $md) {
                            position: absolute;
                            width: 100%;
                            backface-visibility: hidden;
                            transform: rotateY(180deg);
                        }

                        img {
                            width: 160px;
                            position: absolute;
                            bottom: 18px;
                            right: 0;

                            @media (min-width: $md) {
                                width: 180px;
                                bottom: 72px;
                                right: 32px;
                            }
                        }
                    }

                    .card_side_deco {
                        width: 20px;
                        height: 200px;
                        border-radius: 3px 0 0 3px;
                        border-right: 2px solid $textColor_default;
                        box-sizing: border-box;
                        flex-shrink: 0;

                        @media (min-width: $md) {
                            width: 30px;
                            height: 300px;
                        }
                    }

                    .card_main {
                        width: 100%;
                        padding: $sp4 $sp1;
                        position: relative;
                        display: flex;
                        flex-direction: column;
                        align-items: center;

                        h3 {
                            @include sm_h3;
                            padding-bottom: $sp3;

                            @media (min-width: $md) {
                                @include xl_h3;
                            }
                        }

                        p {
                            @include sm_h5;
                            text-align: center;
                            line-height: 150%;
                            width: 90%;
                            position: relative;
                            top: 14px;
                            z-index: 1;
                            color: $textColor_default;

                            @media (min-width: $md) {
                                @include xl_h5;
                                top: 40px;
                            }
                        }
                    }
                }
            }

            .service_card_wrap:nth-child(1) {
                .card_side_deco {
                    background-color: $mid_red;
                }

                .card_main h3 {
                    color: $default_red;
                }
            }

            .service_card_wrap:nth-child(2) {
                .card_side_deco {
                    background-color: $mid_green;
                }

                .card_main h3 {
                    color: $default_green;
                }
            }

            .service_card_wrap:nth-child(3) {
                .card_side_deco {
                    background-color: $mid_yellow;
                }

                .card_main h3 {
                    color: $default_yellow;
                }
            }

            .service_card_wrap:nth-child(4) {
                .card_side_deco {
                    background-color: $mid_blue;
                }

                .card_main h3 {
                    color: $default_blue;
                }
            }
        }

        .service_action {
            padding-top: $sp3;
            display: flex;
            flex-direction: column;
            align-items: center;

            .action_slogan {
                padding-bottom: $sp3;
                display: flex;
                flex-direction: column;
                align-items: center;

                span {
                    @include sm_p;
                    line-height: 150%;

                    @media (min-width: $md) {
                        @include xl_p;
                        line-height: 180%;
                    }

                    br {
                        @media (min-width: $md) {
                            display: none;
                        }
                    }
                }
            }
        }
    }

    .about_message {
        padding: $sp10 $sp7 $sp4 $sp7;
        margin-top: -90px;
        background-color: $bgColor_default;

        @media (min-width: $md) {
            padding: $sp15 $sp7 $sp4 $sp7;
            margin-top: -110px;
        }

        .message_title {
            h2 {
                @include sm_h2;
                padding-bottom: $sp2;
                text-align: center;
                line-height: 150%;

                @media (min-width: $md) {
                    @include xl_h2;
                    padding-bottom: $sp4;
                }
            }

            br {
                @media (min-width: $md) {
                    display: none;
                }
            }
        }

        .message_form {
            display: flex;
            flex-direction: column;
            align-items: center;

            form {
                label {
                    span {
                        @include sm_p;
                        padding: $sp1;
                        display: block;

                        @media (min-width: $md) {
                            @include xl_p;
                        }
                    }

                    input {
                        margin-bottom: $sp1;

                        @media (min-width: $md) {
                            width: 500px;
                        }
                    }

                    textarea {
                        width: 224px;

                        @media (min-width: $md) {
                            width: 500px;
                        }
                    }

                    .count_hint {
                        text-align: right;
                        font-size: 12px;

                        @media (min-width: $md) {
                            font-size: 14px;
                        }
                    }
                }
            }

            .btn {
                margin-top: $sp1;
            }
        }
    }
    .about_popbox{
        width: 100%;
        height: 100vh;
        background-color: #6A5D4A80;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        .block {
            height: 78px;
            border: 3px solid $textColor_default;
            background-color: $textColor_white;
            border-radius: 20px;
            padding: 0 $sp4;
            display: flex;
            align-items: center;
            justify-content: center;
            .pic {
                display: flex;
                align-items: center;
                img {
                    width: 28px;
                }
                p {
                    font-size: $sm_h4;
                    padding: 10px;
                }
            }
        }
        @media (min-width: $md){
            .block {
                width: 410px;
                height: 102px;
                border: 3px solid $textColor_default;
                background-color: $textColor_white;
                border-radius: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                .pic {
                    display: flex;
                    align-items: center;
                    p {
                        font-size: $xl_h4;
                        padding: 10px;
                    }
                }
            }
        }
    }
    .about_info {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: $sp10 $sp7 $sp6 $sp7;
        margin-top: -130px;
        background-color: $bgColor_tint;

        @media (min-width: $md) {
            flex-direction: row;
            justify-content: center;
            padding: $sp15 $sp7 $sp10 $sp7;
            margin-top: -120px;
        }

        .info_logo img {
            width: 150px;
            margin-bottom: $sp3;

            @media (min-width: $md) {
                width: 316px;
                margin-right: $sp6;
            }
        }

        h3 {
            @include sm_h3;
            padding-bottom: $sp2;

            @media (min-width: $md) {
                @include xl_h3;
            }
        }

        .info_desc {
            .info_main {
                display: flex;
                flex-direction: column;
                align-items: center;
                padding-bottom: $sp3;

                @media (min-width: $md) {
                    align-items: flex-start;
                    padding-bottom: $sp6;
                }

                a {
                    @include sm_h5;
                    color: $textColor_tint;
                    line-height: 150%;

                    @media (min-width: $md) {
                        @include xl_h5;
                        padding-left: $sp1;
                    }
                }
            }

            .info_follow {
                display: flex;
                flex-direction: column;
                align-items: center;

                @media (min-width: $md) {
                    align-items: flex-start;
                }

                .follow_link {
                    display: flex;
                    gap: $sp2;

                    a {
                        font-size: 30px;
                        color: $textColor_tint;

                        @media (min-width: $md) {
                            font-size: 40px;
                            padding-left: $sp1;
                        }
                    }
                }

            }
        }
    }

    @keyframes fadeInDown {
        0% {
            opacity: 0;
            transform: translate(0, -100%);
        }

        100% {
            opacity: 1;
            transform: translate(0, 0);
        }
    }

    @keyframes shine {
        0% {
            transform: scale(1);
        }

        100% {
            transform: scale(1.2);
        }
    }

    @keyframes bounce {
        0% {
            transform: scale(0);
        }

        100% {
            transform: scale(1);
        }
    }

    @keyframes shake {
        0% {
            transform: translateX(-10px) rotate(-10deg);
        }

        100% {
            transform: translateX(10px) rotate(5deg);
        }
    }
}

</style>