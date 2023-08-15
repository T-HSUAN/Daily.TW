<!-- 行程頁面-->
<template>
    <div class="tripInfo">
        <!-- 麵包屑 -->
        <div class="breadcrumb">
            <router-link to="/Home">
                <span>首頁</span>
            </router-link>
            <font-awesome-icon icon="fa-solid fa-chevron-right" />
            <router-link to="/trip">
                <span>出遊特輯</span>
            </router-link>
            <font-awesome-icon icon="fa-solid fa-chevron-right" />
            <router-link to="/trip_overview">
                <span>行程總覽</span>
            </router-link>
            <font-awesome-icon icon="fa-solid fa-chevron-right" />
            <router-link to="/trip_info">
                <span>新竹內灣放鬆小旅行</span>
            </router-link>
        </div>

        <!-- 行程內容 -->
        <section class="trip_content">
            <article class="trip_article">
                <div class="header">
                    <div class="trip_title">
                        <h2>{{ tripInfo.trip_name }}</h2>
                        <img src="~@/assets/img/trip_deco_footPrint.svg" alt="" class="deco">
                    </div>
                    <h5 class="author">作者 | {{ tripInfo.trip_author }}</h5>
                    <h5 class="date">發布日期 | {{ tripInfo.formattedDate }}</h5>
                    <h5 class="views">2,345 次瀏覽</h5>
                </div>
                <div class="trip_desc">
                    <p>{{ tripInfo.trip_desc }}
                    </p>
                </div>
                <img src="../../public/placeImg/001.png">

                <section class="place" v-for="(place, index) in placeInfo" :key="index" :id="'place' + (index + 1)">
                    <div class="place_title">
                        <h3>{{ place.place_name }}</h3>
                        <div class="time">
                            <img src="~@/assets/img/layout/plan_result_time.png" alt="" />
                            <h5>停留{{ place.place_stay }}小時</h5>
                        </div>
                    </div>
                    <div class="place_img">
                        <Carousel :autoplay="3000" :wrap-around="true">
                            <Slide v-for="(image, imageIndex) in placeInfo.place_img" :key="imageIndex" v-if="image">
                                <img :src="getPlaceImagePath(image)" />
                            </Slide>
                            <template #addons>
                                <Navigation />
                                <Pagination />
                            </template>
                        </Carousel>
                    </div>
                    <p class="place_desc">{{ place.place_desc }}</p>
                    <div class="place_loc">
                        <img src="~@/assets/img/layout/plan_result_location.png" alt="" />
                        <a :href="place.place_link" target="_blank">
                            <h5>{{ place.place_addr }}</h5>
                        </a>
                    </div>
                </section>

                <section class="trip_tags">
                    <router-link v-for="(tag, index) in placeTags" :key="index" to="/trip_overview">
                        <div class="tags">{{ tag.place_tag_name }}</div>
                    </router-link>
                </section>
            </article>
            <div class="sidebar">
                <div class="route">
                    <Anchor show-ink>
                        <AnchorLink v-for="(place, index) in placeInfo" :key="index" :href="'#place' + (index + 1)"
                            :title="place.place_name" />
                    </Anchor>
                </div>
                <label class="collect">
                    <input type="checkbox" class="trip_tag" />
                    <span>
                        <font-awesome-icon icon="fa-regular fa-bookmark" class="bookmark" />
                        加入收藏
                    </span>
                </label>
            </div>
        </section>

        <!-- 穿搭區塊 -->
        <section class="tripInfo_oott">
            <div class="bgCurve">
                <img src="~@/assets/img/bgCurve_B.png" alt="">
            </div>
            <div class="title">
                <div class="duck">
                    <div class="duckDeco">
                        <img src="~@/assets/img/duck_trace.png" alt="" class="trace">
                        <img src="~@/assets/img/duck_yellow.png" alt="" class="duck">
                    </div>
                </div>
                <h2>出遊穿搭推薦</h2>
            </div>
            <div class="content">
                <div class="wrap">
                    <div class="oottCards">
                        <oottCard class="oottCard" v-for="(oott, index) in oottData" :key="index" :oottPhoto="oott.oott_img"
                            :oottCardTags="oott.concatenated_style_name" :oottCardDate="oott.oott_date"
                            :oottAuthorPhoto="oott.mem_img" :oottCardAuthor="oott.mem_name"></oottCard>
                    </div>
                </div>
                <a href="/oott">
                    <button class="btn">查看更多</button>
                </a>
            </div>
        </section>

        <!-- 票券區塊 -->
        <section class="tripInfo_ticket">
            <div class="bgCurve">
                <img src="~@/assets/img/bgCurve_A.png" alt="">
            </div>
            <div class="title">
                <div class="duck">
                    <div class="duckDeco">
                        <img src="~@/assets/img/duck_trace.png" alt="" class="trace">
                        <img src="~@/assets/img/duck_blue.png" alt="" class="duck">
                    </div>
                </div>
                <h2>相關票券優惠</h2>
            </div>
            <div class="content">
                <div class="wrap">
                    <div class="ticketCards">
                        <div class="ticketCard" v-for="(ticket, index) in tickets" :key="index">
                            <router-link to="/ticket_info">
                                <ticketCard :ticketPhoto="ticket.ticketPhoto" :ticketTitle="ticket.ticketTitle"
                                    :ticketLocation="ticket.ticketLocation" :ticketTags="ticket.ticketTags"
                                    :originalPrice="ticket.originalPrice" :FinalPrice="ticket.finalPrice"
                                    :discountTag="ticket.discountTag"></ticketCard>
                            </router-link>
                        </div>
                    </div>
                </div>
                <router-link to="/ticket">
                    <button class="btn">查看更多</button>
                </router-link>
            </div>
        </section>

        <!-- 你可能有興趣 -->
        <section class="tripInfo_trip">
            <div class="bgCurve">
                <img src="~@/assets/img/bgCurve_B.png" alt="">
            </div>
            <div class="title">
                <div class="duck">
                    <div class="duckDeco">
                        <img src="~@/assets/img/duck_trace.png" alt="" class="trace">
                        <img src="~@/assets/img/duck_red.png" alt="" class="duck">
                    </div>
                </div>
                <h2>你可能有興趣</h2>
            </div>
            <div class="content">
                <div class="wrap">
                    <div class="tripCards">
                        <tripCard class="tripCard" v-for="(trip, index) in trips" :key="index"
                            :tripCardPhoto="trip.tripCardPhoto" :tripCardTags="trip.tripCardTags"
                            :tripCardTitle="trip.tripCardTitle" :tripCardDesc="trip.tripCardDesc"
                            :tripCardAuthor="trip.tripCardAuthor" :tripCardDate="trip.tripCardDate" />
                    </div>
                </div>
                <router-link to="/trip">
                    <button class="btn">查看更多</button>
                </router-link>
            </div>
        </section>

    </div>
</template>

<style lang="scss">
@import "@/assets/scss/baseAndMixin.scss";

.tripInfo {

    padding-top: 74px;
    background: $bgColor_tint;

    @media (min-width: 768px) {
        padding-top: 200px;
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
                    0% {
                        rotate: -3.2deg;
                    }

                    100% {
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


    .breadcrumb {
        max-width: $xl;
        margin: $sp3 auto $sp4;
        padding: 0 32px;
    }

    // 行程內容
    .trip_content {
        margin: 0 auto;
        padding: 0 32px;
        max-width: $xl;
        position: relative;
        display: flex;
        align-items: flex-start;
        gap: $sp2;

        @media (min-width: $md) {
            gap: $sp4;
        }

        .trip_article {
            @media (min-width: $md) {
                width: calc((100% - 352px) / 4 * 3 + 256px);
            }

            .header {
                position: relative;
                margin-bottom: $sp3;

                @media (min-width: $xl) {
                    margin-bottom: $sp6;
                }

                .trip_title {
                    display: flex;
                    align-items: end;
                    margin-bottom: $sp2;

                    h2 {
                        font-family: 'Shippori Mincho', serif;
                        font-weight: 700;
                        line-height: 150%;
                    }

                    .deco {
                        display: none;

                        @media (min-width: $md) {
                            display: block;
                        }
                    }
                }

                .author {
                    color: $textColor_tint;
                    margin-bottom: $sp1;
                }

                .date {
                    color: $textColor_tint;
                    margin-bottom: $sp1;
                }

                .views {
                    margin-top: $sp2;

                    @media (min-width: $md) {
                        position: absolute;
                        bottom: 0;
                        right: 0;
                    }
                }
            }

            .trip_desc {
                margin-bottom: $sp6;

                p {
                    line-height: 190%;

                    @media (min-width: $md) {
                        line-height: 165%;
                    }
                }
            }

            .place {

                a {
                    color: inherit;

                    &:hover {
                        color: $textColor_tint;
                    }
                }

                .place_title {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-bottom: $sp3;

                    .time {
                        display: flex;
                        align-items: center;
                        gap: 4px;

                        @media (min-width: $md) {
                            gap: $sp1;
                        }

                        img {
                            width: 22px;

                            @media (min-width: $md) {
                                width: 27px;
                            }
                        }
                    }
                }

                .place_img {
                    width: 100%;
                    margin-bottom: $sp2;

                    @media (min-width: $md) {
                        margin-bottom: $sp3;
                    }

                    img {
                        width: 100%;
                    }

                    .carousel__prev,
                    .carousel__next {
                        display: none;

                        @media (min-width: $md) {
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            border-radius: 50px;
                            border: 2px solid $textColor_default;
                            background-color: $textColor_white;
                            width: 40px;
                            height: 40px;
                            box-shadow: -2px 2px 4px 0px rgba(0, 0, 0, 0.25);

                            &:hover {
                                background-color: $textColor_default;

                                .carousel__icon {
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

                    .carousel__prev {
                        left: 24px;
                    }

                    .carousel__next {
                        right: 24px;
                    }

                    .carousel__pagination-button::after {
                        background-color: $textColor_tint !important;
                    }

                    .carousel__pagination-button--active::after {
                        background-color: $textColor_default !important;
                    }
                }

                .place_desc {
                    margin-bottom: $sp3;
                    line-height: 190%;

                    @media (min-width: $md) {
                        line-height: 165%;
                    }
                }

                .place_loc {
                    display: flex;
                    margin-bottom: $sp8;
                    align-items: center;
                    gap: 4px;

                    @media (min-width: $md) {
                        gap: $sp1;
                    }

                    img {
                        width: 22px;

                        @media (min-width: $md) {
                            width: 27px;
                        }
                    }
                }

            }

            .trip_tags {
                display: flex;
                flex-wrap: wrap;
                gap: $sp2 $sp1;
                margin-bottom: $sp8;

                .tags {
                    color: $textColor_white;
                    background-color: $textColor_default;
                    padding: 8px 20px;
                    border-radius: 50px;
                }
            }
        }

        .sidebar {
            position: sticky;
            top: $sp12;
            border-radius: 10px;
            border: 2px solid $textColor_default;
            background-color: $bgColor_default;
            margin-bottom: $sp8;
            overflow: hidden;
            padding: 0 16px;

            @media (min-width: $md) {
                border: 3px solid $textColor_default;
                width: calc((100% - 352px) / 4 + 64px);
                padding: 0;
            }

            .route {
                display: none;

                a:hover {
                    color: $textColor_tint;
                }

                @media (min-width: $md) {
                    display: block;
                    padding: $sp3;
                    border-bottom: 3px solid $textColor_default;
                    font-size: 16px;
                }

                @media (min-width: $xl) {
                    font-size: 20px;
                }

                .ivu-affix {
                    position: relative;
                }

                .ivu-anchor-ink-ball {
                    border: 2px solid $textColor_default;
                    background-color: $textColor_default;
                    width: 10px;
                    height: 10px;
                }

                .ivu-anchor-ink {
                    left: 4px;
                }

                .ivu-anchor-ink:before {
                    background-color: $textColor_default;
                }

                .ivu-anchor-link-title {
                    color: $textColor_default;
                }

                .ivu-anchor-link-active>.ivu-anchor-link-title {
                    color: $textColor_default;
                    font-weight: 600;

                    @media (min-width: $md) {
                        font-size: 18px;
                    }

                    @media (min-width: $xl) {
                        font-size: 24px;
                    }

                }
            }

            .collect {
                display: flex;
                // align-items: center;
                justify-content: center;
                text-align: center;
                width: 100%;
                height: 100%;

                .trip_tag {
                    position: absolute;
                    display: none;

                    width: 100%;

                    // height: 100%;
                    +span {
                        padding: 16px;
                        width: 100%;
                        // height: 100%;
                        // @include sm_p;
                        font-size: 14px;
                        // padding: 4px 12px;
                        writing-mode: vertical-lr;

                        @media (min-width: $md) {
                            font-size: 18px;
                            writing-mode: horizontal-tb;
                        }

                        @media (min-width: $xl) {
                            font-size: 24px;
                        }

                        // display: inline-flex;
                        // justify-content: center;
                        // align-items: center;
                        // background: $bgColor_default;
                        cursor: pointer;
                    }

                    &:checked+span {
                        color: $textColor_white;
                        font-weight: bold;
                        background: $textColor_default;
                    }
                }

                .bookmark {
                    @media (min-width: $md) {
                        padding-right: $sp1;
                    }
                }
            }
        }
    }

    // 穿搭區塊
    .tripInfo_oott {
        position: relative;
        background-color: $bgColor_default;
        padding: $sp12 0 $sp8;

        @media (min-width: 768px) {
            padding: 160px 0 80px;
        }


        .content {
            margin: 0 auto;
            max-width: 1200px;
            text-align: center;

            @media (min-width: 768px) {
                padding: 0 32px;
            }

            .wrap {
                margin-bottom: 16px;
                overflow-x: scroll;

                @media (min-width: 768px) {
                    overflow: visible;
                }

                .oottCards {
                    display: flex;
                    // gap: $sp4;
                    margin-bottom: $sp4;
                    margin-right: 32px;

                    @media (min-width: 768px) {
                        justify-content: center;
                    }

                    .oottCard {
                        flex-shrink: 0;
                        margin-left: 32px;

                        @media (min-width: $xl) {
                            flex-shrink: 1;
                        }

                        &:nth-child(2n+1) {
                            rotate: 1.6deg;
                        }

                        &:nth-child(2n) {
                            rotate: -1.6deg;
                        }

                    }
                }
            }
        }

    }

    // 票券區塊
    .tripInfo_ticket {
        position: relative;
        padding: $sp12 0 $sp8;

        @media (min-width: 768px) {
            padding: 160px 0 80px;
        }

        .content {
            margin: 0 auto;
            max-width: 1200px;
            text-align: center;

            .wrap {
                margin-bottom: 32px;
                text-align: left;

                .ticketCards {
                    display: flex;
                    overflow-x: scroll;

                    @media (min-width: $xl) {
                        justify-content: space-between;
                        gap: 32px;
                        overflow: visible;
                    }

                    .ticketCard {
                        flex-shrink: 0;
                        margin-left: 32px;

                        @media (min-width: $xl) {
                            margin-left: 0;
                        }
                    }

                }
            }
        }

    }

    // 你可能有興趣
    .tripInfo_trip {
        position: relative;
        background-color: $bgColor_default;
        padding: $sp12 0 $sp8;
        overflow: visible;

        @media (min-width: 768px) {
            padding: 160px 0 80px;
        }

        .content {
            margin: 0 auto;
            max-width: 1200px;
            text-align: center;
            overflow: visible;

            @media (min-width: 768px) {
                padding: 0 32px;
            }

            .wrap {
                margin-bottom: 16px;
                text-align: left;
                overflow: visible;

                @media (min-width: 768px) {}

                .tripCards {
                    display: flex;
                    overflow-y: visible;
                    overflow-x: scroll;
                    // gap: $sp4;
                    margin-bottom: $sp4;
                    margin-right: 32px;

                    @media (min-width: 768px) {
                        justify-content: center;
                    }

                    .tripCard {
                        flex-shrink: 0;
                        margin-left: 32px;

                        @media (min-width: 768px) {
                            flex-shrink: 1;
                        }

                    }
                }
            }
        }

    }
}
</style>


<script>
import { GET } from '@/plugin/axios'
import oottCard from '@/components/OottCard.vue'
import ticketCard from '@/components/TicketVertical.vue'
import tripCard from '@/components/TripCard.vue'
import { Carousel, Pagination, Slide, Navigation } from 'vue3-carousel';

import 'vue3-carousel/dist/carousel.css';

export default {
    components: {
        oottCard,
        ticketCard,
        tripCard,

        Carousel,
        Slide,
        Pagination,
        Navigation,
    },
    data() {
        return {
            tripInfo: [],

            placeInfo: {
                place_name: '',
                place_img: [
                    { place_img1: '' },
                    { place_img2: '' },
                    { place_img3: '' }
                ],
                place_stay: '',
                place_desc: '',
                place_addr: '',
                place_link: ''
            },

            placeTags: [],

            oottData: [],

            ticketData: [],

            otherTrip: [],

            tickets: [
                {
                    ticketPhoto: require('@/assets/img/ticketExample.png'),
                    ticketTitle: "斑比斑比斑比斑比山丘門票",
                    ticketLocation: "宜蘭",
                    ticketTags: "#標籤",
                    originalPrice: 800,
                    finalPrice: 599,
                    discountTag: "75折",
                },
                {
                    ticketPhoto: require('@/assets/img/ticketExample.png'),
                    ticketTitle: "斑比斑比斑比斑比山丘門票",
                    ticketLocation: "宜蘭",
                    ticketTags: "#標籤",
                    originalPrice: 800,
                    finalPrice: 599,
                    discountTag: "75折",
                },
                {
                    ticketPhoto: require('@/assets/img/ticketExample.png'),
                    ticketTitle: "斑比斑比斑比斑比山丘門票",
                    ticketLocation: "宜蘭",
                    ticketTags: "#標籤",
                    originalPrice: 800,
                    finalPrice: 599,
                    discountTag: "75折",
                },
                {
                    ticketPhoto: require('@/assets/img/ticketExample.png'),
                    ticketTitle: "斑比斑比斑比斑比山丘門票",
                    ticketLocation: "宜蘭",
                    ticketTags: "#標籤",
                    originalPrice: 800,
                    finalPrice: 599,
                    discountTag: "75折",
                },
            ],
            trips: [
                {
                    tripCardPhoto: require('@/assets/img/trip_card_example.png'),
                    tripCardTags: "台中・#親子 #情侶 #農場",
                    tripCardTitle: "台中文青一日遊",
                    tripCardDesc: "到臺中屯區藝文中心參觀各式展覽與展演廳，並到太平買菸場欣賞本市藝術家陳庭詩鐵雕作品，再來到臺中市中區參觀美化的綠川水岸廊道，中午在第二市場品嚐臺中市各式美食小吃，下午再到審計新村參觀文創聚落感受臺中市文創的魅力，接著前往紙箱王創意園區體驗親手DIY文創商品，帶著滿滿的回憶與紀念品回家。",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 9",
                },
                {
                    tripCardPhoto: require('@/assets/img/place/006-1.png'),
                    tripCardTags: "宜蘭・#親子 #情侶 #風景",
                    tripCardTitle: "宜蘭芬多精一日遊",
                    tripCardDesc: "不知道要去哪裡玩嗎？精選六個宜蘭知名景點，有吃又有玩，無論",
                    tripCardAuthor: "小編B",
                    tripCardDate: "2023 / 7 / 12",
                },
                {
                    tripCardPhoto: require('@/assets/img/place/012.png'),
                    tripCardTags: "新北・#親子 #情侶 #風景 #海邊 #放鬆",
                    tripCardTitle: "新北藝術一日遊",
                    tripCardDesc: "來去新北一日遊，鶯歌、三峽這裡也有蠻多特色景點，不只是逛老街，也可以安排個鶯歌景點一日遊，順便遊三峽景點。不管是季節限定的賞花景點，還是親子同遊必拍，又或者是IG熱門打卡點，通通好玩報你知。",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 13",
                },
            ]
        }
    },
    methods: {
        formatTripDate(originalDateString) {
            const date = new Date(originalDateString);
            const year = date.getFullYear();
            const month = date.getMonth() + 1;
            const day = date.getDate();
            return `${year}年${month}月${day}日`;
        },
        getPlaceImagePath(imageName) {
            return `placeImg/${imageName}.png`;
        }
    },
    mounted() {
        const tripId = this.$route.params.trip_id;
        GET(`${this.$URL}/tripInfoGetTrip.php?trip_id=${tripId}`)
            .then((res) => {
                console.log(res);
                this.tripInfo = res;
                this.tripInfo.formattedDate = this.formatTripDate(this.tripInfo.trip_date);
            })
            .catch((err) => {
                console.log(err);
            });
        GET(`${this.$URL}/tripInfoGetPlaces.php?trip_id=${tripId}`)
            .then((res) => {
                console.log(res);
                this.placeInfo = res;
            })
            .catch((err) => {
                console.log(err);
            });
        GET(`${this.$URL}/tripInfoGetOott.php?trip_id=${tripId}`)
            .then((res) => {
                console.log(res);
                this.oottData = res;
            })
            .catch((err) => {
                console.log(err);
            });
        GET(`${this.$URL}/tripInfoGetTicket.php?trip_id=${tripId}`)
            .then((res) => {
                console.log(res);
                this.ticketData = res;
            })
            .catch((err) => {
                console.log(err);
            });
        GET(`${this.$URL}/tripInfoGetOther.php?trip_id=${tripId}`)
            .then((res) => {
                console.log(res);
                this.otherTrip = res;
            })
            .catch((err) => {
                console.log(err);
            });
    },
}
</script>