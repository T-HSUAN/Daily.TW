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
                        <h2>#日系</h2>
                        <div class="theme_block">
                            <div class="card_list">
                                 <swiper :effect="'cards'" :grabCursor="true" :modules="modules" class="mySwiper">
                                            <swiper-slide v-for="(oott, index) in oottTheme1" :key="index" @click="navigateToDetail(oott.oott_id)">
                                                <div class="oott_card">
                                                    <div class="oott_default">
                                                        <router-link to="/oott_Info" class="link">
                                                            <img :src="getOottImg(oott.oott_img)" alt="穿搭照片" class="oott_card_pic" />
                                                        </router-link>
                                                        <label class="heart">
                                                            <input type="checkbox">
                                                            <span></span>
                                                        </label>
                                                        <router-link to="/oott_info">
                                                            <div class="oott_card_text">
                                                                <div class="oott_card_info">
                                                                    <span class="oott_card_tag">#{{ oott.concatenated_style_name }}</span>
                                                                    <span class="oott_card_date">{{ oott.oott_date_new }}</span>
                                                                </div>
                                                                <div class="oott_card_foot">
                                                                    <div class="oott_card_author">
                                                                        <div class="oott_card_author_proPic">
                                                                            <img :src="getMemImg(oott.mem_img)" alt="作者照片" />
                                                                        </div>
                                                                        <h4 class="oott_card_author_name">{{ oott.mem_nickname }}</h4>
                                                                    </div>
                                                                    <img :src="require('@/assets/img/oott_card_deco_footprint.png')" alt="腳印裝飾"
                                                                        class="oott_card_deco_footprint" />
                                                                </div>
                                                            </div>
                                                        </router-link>
                                                    </div>
                                                </div>
                                            </swiper-slide>
                                    </swiper>
                            </div>
                        </div>
                    </div>
                    
                    <div class="oottCards">
                        <h2>＃文青</h2>
                        <div class="theme_block">
                            <div class="card_list">
                                 <swiper :effect="'cards'" :grabCursor="true" :modules="modules" class="mySwiper">
                                            <swiper-slide v-for="(oott, index) in oottTheme2" :key="index" @click="navigateToDetail(oott.oott_id)">
                                                <div class="oott_card">
                                                    <div class="oott_default">
                                                        <router-link to="/oott_Info" class="link">
                                                            <img :src="getOottImg(oott.oott_img)" alt="穿搭照片" class="oott_card_pic" />
                                                        </router-link>
                                                        <label class="heart">
                                                            <input type="checkbox">
                                                            <span></span>
                                                        </label>
                                                        <router-link to="/oott_info">
                                                            <div class="oott_card_text">
                                                                <div class="oott_card_info">
                                                                    <span class="oott_card_tag">#{{ oott.concatenated_style_name }}</span>
                                                                    <span class="oott_card_date">{{ oott.oott_date_new }}</span>
                                                                </div>
                                                                <div class="oott_card_foot">
                                                                    <div class="oott_card_author">
                                                                        <div class="oott_card_author_proPic">
                                                                            <img :src="getMemImg(oott.mem_img)" alt="作者照片" />
                                                                        </div>
                                                                        <h4 class="oott_card_author_name">{{ oott.mem_nickname }}</h4>
                                                                    </div>
                                                                    <img :src="require('@/assets/img/oott_card_deco_footprint.png')" alt="腳印裝飾"
                                                                        class="oott_card_deco_footprint" />
                                                                </div>
                                                            </div>
                                                        </router-link>
                                                    </div>
                                                </div>
                                            </swiper-slide>
                                    </swiper>
                            </div>
                        </div>
                    </div>
                    <div class="oottCards">
                        <h2>#潮流</h2>
                        <div class="theme_block">
                            <div class="card_list">
                                <swiper :effect="'cards'" :grabCursor="true" :modules="modules" class="mySwiper">
                                            <swiper-slide v-for="(oott, index) in oottTheme3" :key="index" @click="navigateToDetail(oott.oott_id)">
                                                <div class="oott_card">
                                                    <div class="oott_default">
                                                        <router-link to="/oott_Info" class="link">
                                                            <img :src="getOottImg(oott.oott_img)" alt="穿搭照片" class="oott_card_pic" />
                                                        </router-link>
                                                        <label class="heart">
                                                            <input type="checkbox">
                                                            <span></span>
                                                        </label>
                                                        <router-link to="/oott_info">
                                                            <div class="oott_card_text">
                                                                <div class="oott_card_info">
                                                                    <span class="oott_card_tag">#{{ oott.concatenated_style_name }}</span>
                                                                    <span class="oott_card_date">{{ oott.oott_date_new }}</span>
                                                                </div>
                                                                <div class="oott_card_foot">
                                                                    <div class="oott_card_author">
                                                                        <div class="oott_card_author_proPic">
                                                                            <img :src="getMemImg(oott.mem_img)" alt="作者照片" />
                                                                        </div>
                                                                        <h4 class="oott_card_author_name">{{ oott.mem_nickname }}</h4>
                                                                    </div>
                                                                    <img :src="require('@/assets/img/oott_card_deco_footprint.png')" alt="腳印裝飾"
                                                                        class="oott_card_deco_footprint" />
                                                                </div>
                                                            </div>
                                                        </router-link>
                                                    </div>
                                                </div>
                                            </swiper-slide>
                                    </swiper>
                            </div>
                        </div>
                    </div>
                </div>
               
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
                    <Slide v-for="(oott, index) in oottData" :key="index">
                        <oottCard class="oottCard"
                            :oottCardId="oott.oott_id"
                            :oottRank="'#' + (index + 1).toString().padStart(2, '0')"
                            :oottPhoto="getOottImg(oott.oott_img)"
                            :oottCardTags="oott.concatenated_style_name"
                            :oottCardDate="oott.oott_date_new"
                            :oottAuthorPhoto="getMemImg(oott.mem_img)"
                            :oottCardAuthor="oott.mem_nickname">
                        </oottCard>
                    </Slide>
                    <template #addons>
                        <Navigation />
                    </template>
                </Carousel>
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
                    <div class="author"  v-for="(item, index) in author" :key="index">
                        <div class="profilePic">
                            <img :src="getMemImg(item.mem_img)" alt="作者照片" />
                        </div>
                        <h4>{{ item.mem_name }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {GET} from '@/plugin/axios';
import oottCard from '@/components/OottCard.vue';
import { Carousel, Slide, Navigation } from 'vue3-carousel';

import 'vue3-carousel/dist/carousel.css';

import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/effect-cards';
import { EffectCards } from 'swiper/modules';


export default {
    name: 'Autoplay',
    components: {
        oottCard,

        Carousel,
        Slide,
        Navigation,

        Swiper,
      SwiperSlide,
    },
    setup() {
      return {
        modules: [EffectCards],
      };
    },
    data() {
        return {
            oottTheme1: [],
            oottTheme2: [],
            oottTheme3: [],
            oottData: [],
            author:[],

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
           
        }
    },
    methods: {
        getOottImg(oottImg){
            return process.env.BASE_URL + 'oottImg/' + oottImg ;
        },
        getMemImg(memImg){
            return process.env.BASE_URL + 'profileImg/' + memImg ;
        },
        navigateToDetail(oottId) {
        // 构建跳转链接，将 oottId 作为参数传递到目标页面
        const routePath = `/oott_info/${oottId}`;
        this.$router.push(routePath); // 跳转到目标页面
    },
    },
    mounted() {
        GET(`${this.$URL}/oottViewTop.php`)
            .then((res) => {
                this.oottData = res;
                console.log(res);
            })
            .catch((err) => {
                console.log(err);
            }),

        GET(`${this.$URL}/oottViewThemeFirst.php`)
            .then((res) => {
                this.oottTheme1 = res;
                console.log(res);
            })
            .catch((err) => {
                console.log(err);
            }),
        GET(`${this.$URL}/oottViewThemeSecond.php`)
            .then((res) => {
                this.oottTheme2 = res;
                console.log(res);
            })
            .catch((err) => {
                console.log(err);
            }),
        GET(`${this.$URL}/oottViewThemeThird.php`)
            .then((res) => {
                this.oottTheme3 = res;
                console.log(res);
            })
            .catch((err) => {
                console.log(err);
            }),
        GET(`${this.$URL}/oottViewAuthor.php`)
            .then((res) => {
                this.author = res;
                console.log(res);
            })
            .catch((err) => {
                console.log(err);
            })
    },
};
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
                  animation: duck_shake 1s linear alternate infinite;
                @media (min-width: 768px) {
                    width: 120px;
                }
                @keyframes duck_shake {
                    0%{
                        rotate: -3.2deg;
                    }
                    100%{
                        rotate: 3.2deg;
                    }
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
        padding: 184px 0 120px 0;
        background-color: $bgColor_tint;
        
        .content {
            padding-left: 32px;
            margin: 0 auto;
            max-width: 1200px;
            text-align: center;
            @media (min-width: 768px) {
                // overflow: hidden;
            }

            .wrap {
                margin-bottom: 16px;
                justify-content: center;
                @media (min-width: 768px) {
                    gap: 100px;
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
                        @media (max-width: 768px) {
                            margin-left: 50px;
                        }
                    }

                    .theme_block {
                        display: flex;
                        justify-content: center;
                    }
                    .swiper {
                        width: 260px;
                        @media (min-width: 768px) {
                            width: 310px;
                        }
                    }

                    .swiper-slide {
                        display: flex;
                        align-items: center;
                        border-radius: 18px;
                        font-size: 22px;
                        font-weight: bold;
                        background-color: none;
                        // color: $default_yellow;
                    }
                    .swiper-slide:nth-child(1n) {
                        background-color: none;
                    }

                    .swiper-slide:nth-child(2n) {
                        background-color: none;
                    }

                    .swiper-slide:nth-child(3n) {
                        background-color:none;
                    }

                    .card_list {
                        display: flex;

                    }

                    .oottCard {
                        width: 100%;
                        flex-shrink: 0;
                    }

                    }
            }
        }

        .btn {
            justify-items: center;
            margin-top: 60px;
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
            gap: $sp4;
            margin: 0 1%;
            overflow-x: scroll;
            overflow-y: hidden;
            @media (min-width: 768px) {
                overflow: visible;
                gap:$sp6;
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