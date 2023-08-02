<!-- 穿搭特輯 -->

<template>
    <div class="oott_view">
        <!-- 投稿部分 -->
        <div class="post_section">
            <div class="post_area">
                <router-link to="/oott_post_view" class="btn_md">投稿</router-link>
                <div class="post_pic"><img :src="require('@/assets/img/oott_view_first.png')" alt="post"></div>
                <div class="post_block">
                    <div class="post_man">
                        <img :src="require('@/assets/img/oott_view_second.png')" alt="post">
                    </div>
                    <h1>穿搭投稿徵集中</h1>
                    <p>跟我們分享你的 #oott 吧！</p>
                    <router-link to="/oott_post_view" class="btn">投稿</router-link>

                </div>
            </div>

        </div>

        <!-- 主題穿搭 -->
        <div class="theme" id="theme">
            <div class="bgCurve">
                <img src="~@/assets/img/bgCurve_A.png" alt="">
            </div>
            <div class="title">
                <div class="duckDeco">
                    <img src="~@/assets/img/duck_trace.png" alt="" class="trace">
                    <img src="~@/assets/img/duck_yellow.png" alt="" class="duck">
                </div>
                <h2>主題穿搭</h2>
            </div>
            <div class="content">
                <div class="wrap">
                    <div class="oottCards">
                        <h2>#休閒</h2>
                        <div class="theme_block">
                            <div class="card_list">
                                <oottCard class="oottCard" v-for="(oott, index) in theme_ootts1" :key="index"
                                    :oottRank="oott.oottRank"  :oottPhoto="oott.oottPhoto" :oottCardTags="oott.oottCardTags"
                                    :oottCardDate="oott.oottCardDate" :oottAuthorPhoto="oott.oottAuthorPhoto"
                                    :oottCardAuthor="oott.oottCardAuthor"></oottCard>
                            </div>
                        </div>
                    </div>
                    
                    <div class="oottCards">
                        <h2>#復古</h2>
                        <div class="theme_block">
                            <div class="card_list">
                                <oottCard class="oottCard" v-for="(oott, index) in theme_ootts2" :key="index"
                                    :oottRank="oott.oottRank" :oottPhoto="oott.oottPhoto" :oottCardTags="oott.oottCardTags"
                                    :oottCardDate="oott.oottCardDate" :oottAuthorPhoto="oott.oottAuthorPhoto"
                                    :oottCardAuthor="oott.oottCardAuthor"></oottCard>
                            </div>
                        </div>
                    </div>
                    <div class="oottCards">
                        <h2>#潮流</h2>
                        <div class="theme_block">
                            <div class="card_list">
                                <oottCard class="oottCard" v-for="(oott, index) in theme_ootts3" :key="index"
                                    :oottRank="oott.oottRank"  :oottPhoto="oott.oottPhoto" :oottCardTags="oott.oottCardTags"
                                    :oottCardDate="oott.oottCardDate" :oottAuthorPhoto="oott.oottAuthorPhoto"
                                    :oottCardAuthor="oott.oottCardAuthor"></oottCard>
                            </div>
                        </div>
                    </div>
                    <div class="oottCards">
                        <h2>#藝文</h2>
                        <div class="theme_block">
                            <div class="card_list">
                                <oottCard class="oottCard" v-for="(oott, index) in theme_ootts4" :key="index"
                                    :oottRank="oott.oottRank" :oottPhoto="oott.oottPhoto" :oottCardTags="oott.oottCardTags"
                                    :oottCardDate="oott.oottCardDate" :oottAuthorPhoto="oott.oottAuthorPhoto"
                                    :oottCardAuthor="oott.oottCardAuthor"></oottCard>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="panel">
                    <button class="arrow">
                        <font-awesome-icon icon="fa-solid fa-arrow-left" />
                    </button>
                    <button class="arrow">
                        <font-awesome-icon icon="fa-solid fa-arrow-right" />
                    </button>
                </div> -->
                <router-link to="oott_overview">
                    <btn class="btn">查看更多</btn>
                </router-link>
            </div>
        </div>


        <!-- 人氣穿搭 -->
        <div class="top_oott" id="top_oott">
            <div class="bgCurve">
                <img src="~@/assets/img/bgCurve_B.png" alt="">
            </div>
            <div class="title">
                <div class="duckDeco">
                    <img src="~@/assets/img/duck_trace.png" alt="" class="trace">
                    <img src="~@/assets/img/duck_yellow.png" alt="" class="duck">
                </div>
                <h2>人氣穿搭</h2>
            </div>
            <div class="content">
                <Carousel class="wrap" v-bind="settings" :breakpoints="breakpoints">
                    <Slide v-for="(oott, index) in top_ootts" :key="index">
                        <oottCard class="oottCard"
                            :oottRank="oott.oottRank"
                            :oottPhoto="oott.oottPhoto" :oottCardTags="oott.oottCardTags"
                            :oottCardDate="oott.oottCardDate" :oottAuthorPhoto="oott.oottAuthorPhoto"
                            :oottCardAuthor="oott.oottCardAuthor"></oottCard>
                    </Slide>
                    <template #addons>
                        <Navigation />
                    </template>
                </Carousel>
                <!-- <div class="panel">
                    <button class="arrow">
                        <font-awesome-icon icon="fa-solid fa-arrow-left" />
                    </button>
                    <button class="arrow">
                        <font-awesome-icon icon="fa-solid fa-arrow-right" />
                    </button>
                </div> -->
                <router-link to="oott_overview">
                    <btn class="btn">查看更多</btn>
                </router-link>
            </div>
        </div>

        <!-- 穿搭作家 -->
        <div class="writer_oott">
            <div class="bgCurve">
                <img src="~@/assets/img/bgCurve_A.png" alt="">
            </div>
            <div class="wrap">
                <div class="title">
                    <div class="duckDeco">
                        <img src="~@/assets/img/duck_trace.png" alt="" class="trace">
                        <img src="~@/assets/img/duck_yellow.png" alt="" class="duck">
                    </div>
                    <div class="heading">
                        <h2>風格旅人</h2>
                        <p>看看他們的#oott/</p>
                    </div>
                </div>
                
                <div class="content">
                    <div class="author">
                        <div class="profilePic"><img src="~@/assets/img/oott_card_proPic_example.png" alt=""></div>
                        <h4>Alison</h4>
                    </div>
                    <div class="author">
                        <div class="profilePic"><img src="@/assets/img/layout/plan_result_oott-2_member.png" alt=""></div>
                        <h4>Susan</h4>
                    </div>
                    <div class="author">
                        <div class="profilePic"><img src="@/assets/img/oott_13.png" alt=""></div>
                        <h4>DuckLord</h4>
                    </div>
                    <div class="author">
                        <div class="profilePic"><img src="@/assets/img/layout/plan_result_oott-3_member.png" alt=""></div>
                        <h4>Max</h4>
                    </div>
                    <div class="author">
                        <div class="profilePic"><img src="@/assets/img/oott_01.png" alt=""></div>
                        <h4>Jeffery</h4>
                    </div>
                    <!-- <div class="author">
                        <div class="profilePic"><img src="@/assets/img/oott_11.png" alt=""></div>
                        <h4>Kay</h4>
                    </div>
                    <div class="author">
                        <div class="profilePic"><img src="@/assets/img/oott_kid.png" alt=""></div>
                        <h4>Kid</h4>
                    </div>
                    <div class="author">
                        <div class="profilePic"><img src="@/assets/img/oott_03.png" alt=""></div>
                        <h4>DazzleQueen</h4>
                    </div>
                    <div class="author">
                        <div class="profilePic"><img src="~@/assets/img/oott_card_proPic_example.png" alt=""></div>
                        <h4>Alison</h4>
                    </div>
                    <div class="author">
                        <div class="profilePic"><img src="~@/assets/img/oott_card_proPic_example.png" alt=""></div>
                        <h4>Alison</h4>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import oottCard from '@/components/OottCard.vue';
import { Carousel, Slide, Navigation } from 'vue3-carousel';

import 'vue3-carousel/dist/carousel.css';


export default {
    name: 'Autoplay',
    components: {
        oottCard,

        Carousel,
        Slide,
        Navigation,
    },
    data() {
        return {
            theme_ootts1: [
                {
                    oottPhoto: require('@/assets/img/oott_05.png'),
                    oottCardTags: "#休閒",
                    oottCardDate: "2022 / 08 / 31",
                    oottAuthorPhoto: require('@/assets/img/oott_13.png'),
                    oottCardAuthor: "DuckLord",
                },
                {
                    oottPhoto: require('@/assets/img/oott_10.png'),
                    oottCardTags: "#休閒 #美式",
                    oottCardDate: "2022 / 06 / 24",
                    oottAuthorPhoto: require('@/assets/img/oott_11.png'),
                    oottCardAuthor: "Kay",
                },
                {
                    oottPhoto: require('@/assets/img/oott_02.png'),
                    oottCardTags: "#日系 #休閒 #風景",
                    oottCardDate: "2022 / 12 / 12",
                    oottAuthorPhoto: require('@/assets/img/info_name_2.png'),
                    oottCardAuthor: "Alison",
                },
            ],
            theme_ootts2: [
                {
                    oottPhoto: require('@/assets/img/oott_06.png'),
                    oottCardTags: "#復古 #海邊",
                    oottCardDate: "2022 / 7 / 3",
                    oottAuthorPhoto: require('@/assets/img/oott_card_proPic_example.png'),
                    oottCardAuthor: "Susan",
                },
                {
                    oottPhoto: require('@/assets/img/oott_03.png'),
                    oottCardTags: "#復古 #性感",
                    oottCardDate: "2023 / 07 / 12",
                    oottAuthorPhoto: require('@/assets/img/oott_03.png'),
                    oottCardAuthor: "DazzleQueen",
                },
                {
                    oottPhoto: require('@/assets/img/oott_12.png'),
                    oottCardTags: "#可愛 #日系 #運動",
                    oottCardDate: "2022 / 01 / 08",
                    oottAuthorPhoto: require('@/assets/img/oott_kid.png'),
                    oottCardAuthor: "Kid",
                },
            ],
            theme_ootts3: [
                {
                    oottPhoto: require('@/assets/img/oott_40.png'),
                    oottCardTags: "#韓系 #休閒",
                    oottCardDate: "2022 / 06/ 12",
                    oottAuthorPhoto: require('@/assets/img/oott_kid.png'),
                    oottCardAuthor: "Kid",
                },
                {
                    oottPhoto: require('@/assets/img/oott_10.png'),
                    oottCardTags: "#休閒 #美式",
                    oottCardDate: "2022 / 06 / 24",
                    oottAuthorPhoto: require('@/assets/img/oott_11.png'),
                    oottCardAuthor: "Kay",
                },
                {
                    oottPhoto: require('@/assets/img/oott_41.png'),
                    oottCardTags: "#街頭 #潮流",
                    oottCardDate: "2022 / 7 / 6",
                    oottAuthorPhoto: require('@/assets/img/layout/plan_result_oott-3_member.png'),
                    oottCardAuthor: "Max",
                },
            ],
            theme_ootts4: [
                {
                    oottPhoto: require('@/assets/img/oott_18.png'),
                    oottCardTags: "#休閒",
                    oottCardDate: "2022 / 11 / 27",
                    oottAuthorPhoto: require('@/assets/img/oott_13.png'),
                    oottCardAuthor: "DuckLord",
                },
                {
                    oottPhoto: require('@/assets/img/oott_14.png'),
                    oottCardTags: "#簡約 #休閒",
                    oottCardDate: "2022 / 07 / 29",
                    oottAuthorPhoto: require('@/assets/img/oott_11.png'),
                    oottCardAuthor: "Kay",
                },
                {
                    oottPhoto: require('@/assets/img/oott_01.png'),
                    oottCardTags: "#藝文 #放鬆 #懷舊",
                    oottCardDate: "2022 / 01 / 12",
                    oottAuthorPhoto: require('@/assets/img/duck_yellow.png'),
                    oottCardAuthor: "Jeffery",
                },
            ],

            settings: {
                itemsToShow: 1,
                snapAlign: 'center',
                },
                breakpoints: {
                // 700px and up
                768: {
                    itemsToShow: 2,
                    snapAlign: 'start',
                },
                // 1024 and up
                1200: {
                    itemsToShow: 3,
                    snapAlign: 'start',
                },
            },

            top_ootts: [
                {
                    oottRank: "#01",
                    oottPhoto: require('@/assets/img/oott_02.png'),
                    oottCardTags: "#日系 #休閒 #風景",
                    oottCardDate: "2022 / 12 / 12",
                    oottAuthorPhoto: require('@/assets/img/info_name_2.png'),
                    oottCardAuthor: "Alison",
                },
                {
                    oottRank: "#02",
                    oottPhoto: require('@/assets/img/oott_06.png'),
                    oottCardTags: "#復古 #海邊",
                    oottCardDate: "2022 / 7 / 3",
                    oottAuthorPhoto: require('@/assets/img/oott_card_proPic_example.png'),
                    oottCardAuthor: "Susan",
                },
                {
                    oottRank: "#03",
                    oottPhoto: require('@/assets/img/oott_41.png'),
                    oottCardTags: "#街頭 #潮流",
                    oottCardDate: "2022 / 7 / 6",
                    oottAuthorPhoto: require('@/assets/img/oott_card_proPic_example.png'),
                    oottCardAuthor: "Max",
                },
                {
                    oottRank: "#04",
                    oottPhoto: require('@/assets/img/oott_01.png'),
                    oottCardTags: "#藝文 #放鬆 #懷舊",
                    oottCardDate: "2022 / 01 / 12",
                    oottAuthorPhoto: require('@/assets/img/duck_yellow.png'),
                    oottCardAuthor: "Jeffery",
                },
                {
                    oottRank: "#05",
                    oottPhoto: require('@/assets/img/oott_03.png'),
                    oottCardTags: "#復古 #性感",
                    oottCardDate: "2023 / 07 / 12",
                    oottAuthorPhoto: require('@/assets/img/layout/plan_result_oott-1_member.png'),
                    oottCardAuthor: "DazzleQueen",
                },
                {
                    oottRank: "#06",
                    oottPhoto: require('@/assets/img/oott_05.png'),
                    oottCardTags: "#休閒",
                    oottCardDate: "2022 / 08 / 31",
                    oottAuthorPhoto: require('@/assets/img/oott_13.png'),
                    oottCardAuthor: "DuckLord",
                },
                {
                    oottRank: "#07",
                    oottPhoto: require('@/assets/img/oott_10.png'),
                    oottCardTags: "#休閒 #美式",
                    oottCardDate: "2022 / 06 / 24",
                    oottAuthorPhoto: require('@/assets/img/duck_red.png'),
                    oottCardAuthor: "Kay",
                },


            ],
        }
    },
    methods: {

    },
}
</script>
<style lang="scss">
@import "@/assets/scss/baseAndMixin.scss";

.oott_view {
    background: $bgColor_default;
    padding-top: 74px;
    @media (min-width: 768px) {
        padding-top: 200px;
    }
    // 全頁設定

    #app {
        background-color: $bgColor_default;
    }

    .bgCurve {
        position: absolute;
        top: 0;
        width: 100%;
        height: 96px;

        img {
            width: 100%;
            height: 100%;
        }
    }

    .title {
        margin: 0 auto 24px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;

        @media (min-width: 768px) {
            margin: 0 auto 32px;
            max-width: 1200px;
            flex-direction: row;
            align-items: center;
        }

        .duckDeco {
            position: relative;

            .trace {
                display: none;

                @media (min-width: 768px) {
                    display: block;
                    width: 192px;
                    position: absolute;
                    left: -160px;
                    bottom: -8px;
                }
            }

            .duck {
                width: 80px;

                @media (min-width: 768px) {
                    width: 120px;
                }
            }
        }
    }

    // 投稿區塊

    //投稿共用

    .post_section {
        // max-width: 1200px;
        // padding-top: 100px;
        background-color: $bgColor_default;
        width: 100%;
        box-sizing: border-box;
        margin: auto;

        .post_area {
            margin: auto;
            display: flex;
            padding: $sp7 0;
            justify-content: center;

            .post_pic {

                img {
                    width: 100%;
                }
            }

            .post_block {
                box-sizing: border-box;
                margin: 0 $sp2;
                padding: $sp1;
            }
        }
    }

    //手機版
    @media screen and (max-width: 767px) {
        .post_area {
            flex-direction: column-reverse;
            margin: auto;
            text-align: center;
            align-items: center;

            a {
                width: 33px;
                height: 24px;
            }

            .btn_md {
                font-size: $xl_h5;
                padding: 15px 40px;
                white-space: nowrap;
                color: $textColor_white;
                text-align: center;
                font-family: $fontFamily;
                letter-spacing: 0.6px;
                display: inline-flex;
                justify-content: center;
                align-items: center;
                gap: 10px;
                border-radius: 50px;
                border: 2px solid $textColor_default;
                background: $textColor_default;
                cursor: pointer;
                box-shadow: -2px 2px 4px 0px rgba(0, 0, 0, 0.25);
                &:hover {
                    color: $textColor_default;
                    background: $textColor_white;
                    box-shadow: -2px 2px 4px 0px rgba(0, 0, 0, 0.25);
                }

                &:active {
                    color: $textColor_tint;
                    border: 2px solid $textColor_tint;
                    background: $textColor_white;
                }
            }

            .post_pic {
                width: 244px;
                margin: $sp5 0;
            }

            .post_block {
                display: flex;
                flex-direction: column;
                align-items: center;

                .post_man {
                    width: 120px;
                    height: 117px;

                    img {
                        width: 100%;
                    }
                }

                h1 {
                    font-size: $xl_h2;
                    padding: $sp1;
                }

                p {
                    font-size: $sm_h4;
                    color: $textColor_tint;
                    padding: $sp1;
                }

                .btn {
                    display: none;
                }
            }

        }
    }

    //電腦版
    @media screen and (min-width: 767px) {
        .post_area {
            .btn_md {
                display: none;
            }

            .post_pic {
                width: 30%;
                margin: 0 $sp2;
            }

            .post_block {
                .post_man {
                    width: 50%;

                    img {
                        width: 100%;
                    }
                }

                h1 {
                    font-size: $xl_h1;
                    padding: $sp1;
                }

                p {
                    font-size: $xl_h4;
                    color: $textColor_tint;
                    padding: $sp1;
                    margin-bottom: $sp3;
                }

                .btn {
                    font-size: $xl_h5;
                    padding: 8px 32px;
                    white-space: nowrap;
                    color: $textColor_white;
                    text-align: center;
                    font-family: $fontFamily;
                    letter-spacing: 0.6px;
                    display: inline-flex;
                    justify-content: center;
                    align-items: center;
                    gap: 10px;
                    border-radius: 50px;
                    border: 2px solid $textColor_default;
                    background: $textColor_default;
                    cursor: pointer;

                    &:hover {
                        color: $textColor_default;
                        background: $textColor_white;
                        box-shadow: -2px 2px 4px 0px rgba(0, 0, 0, 0.25);
                    }

                    &:active {
                        color: $textColor_tint;
                        border: 2px solid $textColor_tint;
                        background: $textColor_white;
                    }
                }
            }
        }
    }

    //主題穿搭
    .theme {
        position: relative;
        padding: 184px 0;
        background-color: $bgColor_tint;

        .content {
            padding-left: 32px;
            margin: 0 auto;
            max-width: 1200px;
            text-align: center;
            @media (min-width: 768px) {
                overflow: hidden;
            }

            .wrap {
                margin-bottom: 16px;

                // justify-content: center;
                gap: 32px;

                @media (min-width: 768px) {
                    overflow: visible;
                    display: flex;
                }

                .oottCards {
                    padding-top: 60px;
                    display: flex;
                    flex-direction: column;

                    h2 {
                        padding: 10px;
                        text-align: start;
                    }

                    .theme_block {
                        display: flex;
                        gap: 32px;
                    }

                    .card_list {
                        display: flex;
                        gap: 12px;
                        overflow: scroll;

                        @media (min-width: 768px) {
                            overflow: visible;
                            flex-shrink: 0;
                            width: 300px;
                            position: relative;
                            transition: all .5s linear;
                            height: 560px;

                            &:hover {
                                width: 960px;
                                cursor: pointer;

                                .oottCard:nth-child(3) {
                                    left: 640px;
                                }

                                .oottCard:nth-child(2) {
                                   left: 320px;
                                }

                                .oottCard:nth-child(1) {
                                   left: 0;
                                }
                            }
                        }

                    }

                    .oottCard {
                        // width: 279px;
                        flex-shrink: 0;

                        @media (min-width: 768px) {
                            margin: 10px;
                            position: absolute;
                           left: 0;
                            transition: all .5s linear;

                        }

                    }

                }
            }
        }

        .panel {
            display: none;
            justify-content: center;
            gap: 64px;
            margin-bottom: 32px;

            @media (min-width: 768px) {
                display: flex;
            }
        }

        .btn {
            justify-items: center;
            margin-top: 40px;
        }

    }


    //人氣穿搭
    .top_oott {
        position: relative;
        padding: $sp12 0 $sp8;
        background-color: $bgColor_default;
        overflow: hidden;
        @media (min-width: 768px) {
            padding: 160px 0 80px;
        }

        .carousel__viewport {
            overflow: visible;
        }

        .carousel__track {
            gap: $sp4;
        }

        .carousel__slide{
            flex-shrink: 1;
        }

        .carousel__prev, .carousel__next {
            display: none;
            @media (min-width: $md){
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 50px;
                border: 2px solid $textColor_default;
                background-color: $textColor_white;
                width: 40px;
                height: 40px;
                top: 640px;
                .carousel__icon {
                    width: 40px;
                    height: auto;
                    fill: $textColor_default;
                }
            }
        }

        .carousel__prev {
            left: calc(50% - 80px);
        }

        .carousel__next {
            right: calc(50% - 80px);
        }


        .content {
            padding-left: 32px;
            margin: 0 auto;
            max-width: 1200px;
            text-align: center;

            .wrap {
                display: flex;
                margin-bottom: 48px;
                gap: 32px;
                flex-shrink: 0;

                // .oottCard:nth-child(1) {
                //     transform: rotate(-2deg);
                // }

                // .oottCard:nth-child(2) {
                //     transform: rotate(2deg);
                // }

                // .oottCard:nth-child(3) {
                //     transform: rotate(-2deg);
                // }

                @media (min-width: 768px) {
                    margin-bottom: 120px;
                }

                .oottCards {
                    padding-top: 60px;
                    display: flex;
                    gap: 32px;

                    .oottCard {
                        flex-shrink: 0;
                    }
                }

            }

            // .panel {
            //     display: flex;
            //     justify-content: center;
            //     gap: 64px;
            //     margin: 32px;

            //     @media (max-width: 768px) {
            //         display: none;
            //     }
            // }

            .btn {
                justify-items: center;
                margin-top: 40px;

            }
        }

    }


    //穿搭作家
    .writer_oott {
        position: relative;
        padding: 184px 0 80px 0;
        background-color: $bgColor_tint;

        .wrap {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;

            @media (max-width: 768px) {
                flex-direction: column;
            }
        }

        .heading {
            display: flex;
            flex-direction: column;
            gap: $sp2;
            width: 280px;
            text-align: center;

            @media (min-width: 768px) {
                text-align: start;
            }
        }

        .content {
            width: 100%;
            display: flex;
            gap: $sp5;
            margin: 0 2%;
            overflow-x: scroll;
            overflow-y: hidden;
            @media (min-width: 768px) {
                overflow: visible;
            }
            .author {
                width: 128px;
                text-align: center;
                // margin: $sp1;

                .profilePic {
                    width: 128px;
                    height: 128px;
                    border-radius: 55% 60% 55% 50%;
                    overflow: hidden;
                    cursor: pointer;

                    img {
                        width: 100%;
                    }
                }
            }
        }
    }
}
</style>