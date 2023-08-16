<!-- 出遊特輯 -->
<template>
    <div class="tripView">

        <!-- banner -->
        <section class="tripView_banner">
            <MyCarousel v-bind="settings2" :breakpoints="breakpoints2" class="content">
                <MySlide class="wrap" v-for="(trip, index) in tripData" :key="index">
                    <div class="head">
                        <div class="tripTitle">{{ trip.trip_name }}</div>
                        <div class="tripCover">
                            <img :src="getPlaceImg(trip.concatenated_place_img[0])" alt="景點圖片" class="mask_trip" />
                        </div>
                    </div>
                    <div class="info">
                        <div class="tripSpots">
                            <div v-for="(place, placeIndex) in trip.concatenated_place_name" :key="placeIndex" class="spot" >
                                <img src="~@/assets/img/trip_flag_white.svg" alt="" />
                                <h5>{{ place }}</h5>
                            </div>
                        </div>
                        <div class="deco">
                            <img src="~@/assets/img/trip_deco_footPrint.svg" alt="" />
                        </div>
                        <router-link :to="'/trip_info/' + trip.trip_id">
                            <button class="btn">
                                馬上出發
                                <img src="~@/assets/img/btn_arrow.png" alt="" class="arrow_white" />
                                <img src="~@/assets/img/btn_arrow_hover.png" alt="" class="arrow_brown" />
                            </button>
                        </router-link>
                    </div>
                </MySlide>
                <template #addons>
                    <MyNavigation />
                </template>
            </MyCarousel>
        </section>

        <!-- 熱門行程 -->
        <section class="tripView_topTrip" id="tripView_topTrip">
            <div class="bgCurve">
                <img src="@/assets/img/bgCurve_A.png" alt="">
            </div>
            <div class="title">
                <div class="duckDeco">
                    <img src="~@/assets/img/duck_trace.png" alt="" class="trace">
                    <img src="~@/assets/img/duck_green.png" alt="" class="duck">
                </div>
                <h2>熱門行程</h2>
            </div>
            <div class="content">
                <div class="wrap">
                    <div class="tripCards">
                        <tripCard class="tripCard" v-for="(trip, index) in topTrip" :key="index"
                            :tripCardId="trip.trip_id"
                            :tripCardPhoto="getPlaceImg(trip.trip_img)" :tripCardTags="trip.trip_region + '・' + trip.trip_tag"
                            :tripCardTitle="trip.trip_name" :tripCardDesc="trip.trip_desc"
                            :tripCardAuthor="trip.trip_author" :tripCardDate="trip.trip_date_new" />
                    </div>
                </div>
                <router-link to="/trip_overview">
                    <div class="btn">查看更多</div>
                </router-link>
            </div>
        </section>

        <!-- 最新行程 -->
        <section class="tripView_newTrip" id="tripView_newTrip">
            <div class="bgCurve">
                <img src="~@/assets/img/bgCurve_B.png" alt="">
            </div>
            <div class="title">
                <div class="duckDeco">
                    <img src="~@/assets/img/duck_trace.png" alt="" class="trace">
                    <img src="~@/assets/img/duck_red.png" alt="" class="duck">
                </div>
                <h2>最新行程</h2>
            </div>
            <div class="content">
                <div class="wrap">
                    <div class="tripCards">
                        <tripCard class="tripCard" v-for="(trip, index) in newTrip" :key="index"
                            :tripCardId="trip.trip_id"
                            :tripCardPhoto="getPlaceImg(trip.trip_img)" :tripCardTags="trip.trip_region + '・' + trip.trip_tag"
                            :tripCardTitle="trip.trip_name" :tripCardDesc="trip.trip_desc"
                            :tripCardAuthor="trip.trip_author" :tripCardDate="trip.trip_date_new" />
                    </div>
                </div>
                <router-link to="/trip_overview">
                    <div class="btn">查看更多</div>
                </router-link>
            </div>
        </section>
        <!-- 駐站旅人 -->
        <section class="tripView_authors">
            <div class="bgCurve">
                <img src="~@/assets/img/bgCurve_A.png" alt="">
            </div>
            <div class="wrap">
                <div class="title">
                    <div class="duckDeco">
                        <img src="~@/assets/img/duck_trace.png" alt="" class="trace">
                        <img src="~@/assets/img/duck_blue.png" alt="" class="duck">
                    </div>
                    <div class="heading">
                        <h2>駐站旅人</h2>
                        <p>看看他們怎麼玩 /</p>
                    </div>
                </div>
                <div class="content">
                    <router-link to="#" class="author" v-for="(author, index) in authorInfo" :key="index">
                        <div class="profilePic">
                            <img :src="require('@/assets/img/' + author.author_img)" alt="作者頭像">
                        </div>
                        <h4>{{ author.author_name }}</h4>
                    </router-link>
                </div>
            </div>
        </section>
    </div>
</template>

<style lang="scss">
@import "@/assets/scss/baseAndMixin.scss";


.tripView{
    
    padding-top: 74px;
    background: $bgColor_default;
    
    @media (min-width: 768px) {
        padding-top: 120px;
    }
    
    // 全頁設定
    .bgCurve {
        position: absolute;
        top: 0;
        width: 100%;
        height: 48px;
    
        @media (min-width: 768px) {
            height: 96px;
        }
    
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
    
    .btn {
        position: relative;
    
        img {
            width: 40px;
    
            @media (min-width: $md) {
                width: 45px;
            }
        }
    
        .arrow_white {
            position: absolute;
            right: 24px;
    
            @media (min-width: $md) {
                right: 32px;
            }
        }
    
        &:hover {
            .arrow_white {
                display: none;
            }
        }
    }
    
    a {
        color: inherit;
    }
    
    // banner
    .tripView_banner {
        background-color: $bgColor_default;
        padding: $sp12 0 $sp8;
    
        .content {
            .carousel__prev, .carousel__next {
            display: none;
            @media (min-width: $xl){
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 50px;
                border: 2px solid $textColor_default;
                background-color: $textColor_white;
                width: 40px;
                height: 40px;
                box-shadow: -2px 2px 4px 0px rgba(0, 0, 0, 0.25);
                &:hover{
                    background-color: $textColor_default;
                    .carousel__icon{
                        fill: $textColor_white;
                    }
                }
                .carousel__icon {
                    width: 40px;
                    height: auto;
                    fill: $textColor_default;
                }
            }
            }
            margin: 0 auto;
    
        }

        .carousel__prev {
            left: calc(50% - 560px);
        }

        .carousel__next {
            right: calc(50% - 560px);
        }

        .mask_trip{
            width: 80%;
            -webkit-mask-image: url(@/assets/img/mask_trip.svg);
            mask-image: url(@/assets/img/mask_trip.svg);
            -webkit-mask-repeat: no-repeat;
            mask-repeat: no-repeat;
            mask-size: 100%;
            @media (min-width: $xl) {
                width: 640px;
                mask-size: 640px;
            }
        }

        .content {
            margin: 0 auto;

            .wrap {
                margin: 0 auto 32px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;

                @media (min-width: $xl) {
                    margin-top: 64px;
                    width: 80%;
                    flex-direction: row;
                }

                .head {
                    position: relative;
                    text-align: center;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    z-index: 5;

                    @media (min-width: $xl) {
                        display: block;
                        margin-right: -$sp4;
                    }

                    .tripTitle {
                        order: 1;
                        position: relative;
                        top: -24px;
                        padding: $sp2 $sp4;
                        background-color: $default_red;
                        border-radius: 80% 60% 80% 60%;
                        color: $textColor_white;
                        font-family: Shippori Mincho;
                        font-size: 20px;
                        font-weight: 800;
                        letter-spacing: 0.03em;
                        z-index: 3;

                        @media (min-width: $xl) {
                            position: absolute;
                            padding: $sp3 $sp6;
                            font-size: 32px;
                            letter-spacing: 0.06em;
                        }
                    }
                }

                .info {
                    position: relative;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    flex-shrink: 0;

                    @media (min-width: $xl) {
                        background-image: url("~@/assets/img/index_trip_info_bg.svg");
                        background-size: contain;
                        background-repeat: no-repeat;
                        width: 479px;
                        height: 363px;
                        margin-left: -$sp4;
                        justify-content: center;
                    }

                    .tripSpots {
                        display: flex;
                        flex-direction: column;

                        @media (min-width: $xl) {
                            gap: $sp2;
                        }

                        .spot {
                            display: flex;

                            @media (min-width: $xl) {
                                color: $textColor_white;
                            }
                        }

                        h5 {
                            font-weight: 400;
                        }
                    }

                    .deco {
                        width: 24px;
                        margin-top: $sp2;

                        @media (min-width: $xl) {
                            width: 32px;
                        }
                    }

                    a {
                        margin-top: $sp2;

                        @media (min-width: $xl) {
                            position: absolute;
                            right: 0;
                            bottom: $sp8;
                        }
                    }
                }
            }
        }
    
    }
    
    
    // 熱門行程
    .tripView_topTrip {
        position: relative;
        background-color: $bgColor_tint;
        padding: $sp12 0 $sp8;
    
        @media (min-width: $xl) {
            padding: 160px 0 80px;
        }
    
        .content {
            margin: 0 auto;
            max-width: 1200px;
            text-align: center;
    
            .wrap {
                margin-bottom: 32px;
    
                .tripCards {
                    display: flex;
                    overflow-x: scroll;
    
                    @media (min-width: $xl) {
                        flex-wrap: wrap;
                        gap: 32px;
                        overflow-x: visible;
    
                    }
    
                    .tripCard {
    
                        box-sizing: border-box;
                        flex-shrink: 0;
                        margin-left: 32px;
                        background-color: $default_red;
    
                        @media (min-width: $xl) {
                            margin-left: 0;
    
                            &:nth-child(-n+3) {
                                width: calc((100% - 352px) / 3 + 96px);
                            }
    
                            &:nth-child(n+4):nth-child(-n+7) {
                                background-color: $mid_red;
                                width: calc((100% - 352px) / 4 + 64px);
                            }
                        }
    
                    }
    
                }
            }
        }
    }
    
    // 精選行程
    .tripView_newTrip {
        position: relative;
        background-color: $bgColor_default;
        padding: $sp12 0 $sp8;
    
        @media (min-width: $xl) {
            padding: 160px 0 80px;
        }
    
        .content {
            margin: 0 auto;
            max-width: 1200px;
            text-align: center;
    
            .wrap {
                margin-bottom: 32px;
    
                .tripCards {
                    display: flex;
                    overflow-x: scroll;
    
                    @media (min-width: $xl) {
                        max-height: 664px;
                        flex-direction: column;
                        flex-wrap: wrap;
                        gap: 32px;
                        overflow-x: hidden;
                        overflow-y: visible;
                    }
    
                    .tripCard {
    
                        box-sizing: border-box;
                        flex-shrink: 0;
                        margin-left: 32px;
                        background-color: $default_green;
    
                        @media (min-width: $xl) {
                            margin-left: 0;
    
                            &:nth-child(1) {
                                width: calc((100% - 352px) / 12 * 5 + 128px);
                            }
    
                            &:nth-child(n+2):nth-child(-n+4) {
                                background-color: $mid_green;
                                width: calc((100% - 352px) / 12 * 7 + 192px);
                                flex-direction: row;
    
                                .trip_card_img {
                                    display: none;
                                }
    
                            }
                        }
    
                    }
    
                }
            }
        }
    
    }
    
    // 駐站旅人
    .tripView_authors {
        position: relative;
        background-color: $bgColor_tint;
        padding: $sp12 0 $sp8;
    
        @media (min-width: $xl) {
            padding: 160px 0 80px;
        }
    
        .wrap {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
    
            @media (max-width: $xl) {
                flex-direction: column;
            }
        }
    
        .heading {
            display: flex;
            flex-direction: column;
            gap: $sp2;
            width: 280px;
            text-align: center;
    
            @media (min-width: $xl) {
                text-align: start;
            }
        }
    
        .content {
            width: 100%;
            display: flex;
            gap: $sp5;
            overflow-x: scroll;
            overflow-y: hidden;
    
            @media (min-width: $xl) {
                overflow: visible;
            }
    
            .author {
                width: 128px;
                text-align: center;
    
                .profilePic {
                    width: 128px;
                    height: 128px;
                    border-radius: 55% 60% 55% 50%;
                    overflow: hidden;
    
                    img {
                        width: 100%;
                    }
                }
            }
        }
    
    }
}
</style>

<script>
import {GET} from '@/plugin/axios'
import tripCard from '@/components/TripCard.vue'
import { Carousel as MyCarousel, Pagination as MyPagination, Slide as MySlide, Navigation as MyNavigation } from 'vue3-carousel';

import 'vue3-carousel/dist/carousel.css';

export default {
    name: 'Autoplay',
    components: {
        tripCard,

        MyCarousel,
        MySlide,
        MyPagination,
        MyNavigation,
    },

    data() {
        return {
            tripData: [],
            topTrip: [],
            newTrip: [],
            authorInfo: [
                {
                    author_img: "tripAuthorA.png",
                    author_name: "小編A"
                },
                {
                    author_img: "tripAuthorB.png",
                    author_name: "小編B"
                },
                {
                    author_img: "tripAuthorC.png",
                    author_name: "小編C"
                },
                {
                    author_img: "tripAuthorD.png",
                    author_name: "小編D"
                },
                {
                    author_img: "tripAuthorE.png",
                    author_name: "小編E"
                },
            ],


            settings2: {
                autoplay: 5000,
                wrapAround: true,
                itemsToShow: 1.4,
                snapAlign: 'center',
                },
                breakpoints2: {
                // 700px and up
                768: {
                    wrapAround: true,
                    itemsToShow: 1.6,
                    snapAlign: 'center',
                },
                // 1024 and up
                1200: {
                    wrapAround: true,
                    itemsToShow: 1.2,
                    snapAlign: 'center',
                },
            },

        }
    },

    methods: {
        getPlaceImg(placeImg){
            return process.env.BASE_URL + 'placeImg/' + placeImg;
        },
        getMemImg(memImg){
            return process.env.BASE_URL + 'profileImg/' + memImg + '.png';
        }
    },
    
    mounted() {
        GET(`${this.$URL}/homeGetTrip.php`)
            .then((res) => {
                console.log(res);
                this.tripData = res;
            })
            .catch((err) => {
                console.log(err);
            }),
        GET(`${this.$URL}/tripGetTop.php`)
            .then((res) => {
                console.log(res);
                this.topTrip = res;
            })
            .catch((err) => {
                console.log(err);
            }),
        GET(`${this.$URL}/tripGetNew.php`)
            .then((res) => {
                console.log(res);
                this.newTrip = res;
            })
            .catch((err) => {
                console.log(err);
            })
    }
}
</script>