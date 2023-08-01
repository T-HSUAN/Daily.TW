<!-- 出遊特輯 -->
<template>
    <!-- banner -->
    <section class="tripView_banner">
        <div class="content">
            <div class="wrap">
                <div class="head">
                    <div class="tripTitle">台中文青一日遊</div>
                    <div class="tripCover">
                        <img src="~@/assets/img/index_trip_cover_example.png" alt="">
                    </div>
                </div>
                <div class="info">
                    <div class="tripSpots">
                        <div class="spot spot1">
                            <img src="~@/assets/img/trip_flag_white.svg" alt="">
                            <h5>屯區藝文中心</h5>
                        </div>
                        <div class="spot spot2">
                            <img src="~@/assets/img/trip_flag_white.svg" alt="">
                            <h5>太平買菸場</h5>
                        </div>
                        <div class="spot spot3">
                            <img src="~@/assets/img/trip_flag_white.svg" alt="">
                            <h5>新盛綠川水岸廊道</h5>
                        </div>
                        <div class="spot spot4">
                            <img src="~@/assets/img/trip_flag_white.svg" alt="">
                            <h5>第二市場</h5>
                        </div>
                    </div>
                    <div class="deco">
                        <img src="~@/assets/img/trip_deco_footPrint.svg" alt="">
                    </div>
                    <router-link to="/trip_info">
                        <button class="btn">馬上出發<img src="~@/assets/img/btn_arrow.png" alt="" class="arrow_white">
                            <img src="~@/assets/img/btn_arrow_hover.png" alt="" class="arrow_brown"></button>
                    </router-link>
                </div>
            </div>
        </div>
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
                    <tripCard class="tripCard" v-for="(trip, index) in topTrips" :key="index"
                        :tripCardPhoto="trip.tripCardPhoto" :tripCardTags="trip.tripCardTags"
                        :tripCardTitle="trip.tripCardTitle" :tripCardDesc="trip.tripCardDesc"
                        :tripCardAuthor="trip.tripCardAuthor" :tripCardDate="trip.tripCardDate" />
                </div>
            </div>
            <router-link to="/trip_overview">
                <div class="btn">查看更多</div>
            </router-link>
        </div>
    </section>

    <!-- 精選行程 -->
    <section class="tripView_selectTrip" id="tripView_selectTrip">
        <div class="bgCurve">
            <img src="~@/assets/img/bgCurve_B.png" alt="">
        </div>
        <div class="title">
            <div class="duckDeco">
                <img src="~@/assets/img/duck_trace.png" alt="" class="trace">
                <img src="~@/assets/img/duck_red.png" alt="" class="duck">
            </div>
            <h2>精選行程</h2>
        </div>
        <div class="content">
            <div class="wrap">
                <div class="tripCards">
                    <tripCard class="tripCard" v-for="(trip, index) in selectTrips" :key="index"
                        :tripCardPhoto="trip.tripCardPhoto" :tripCardTags="trip.tripCardTags"
                        :tripCardTitle="trip.tripCardTitle" :tripCardDesc="trip.tripCardDesc"
                        :tripCardAuthor="trip.tripCardAuthor" :tripCardDate="trip.tripCardDate" />
                </div>
            </div>
            <router-link to="/trip_overview">
                <div class="btn">查看更多</div>
            </router-link>
        </div>
    </section>

    <!-- 精選行程 -->
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
                <div class="author">
                    <div class="profilePic"><img src="~@/assets/img/oott_card_proPic_example.png" alt=""></div>
                    <h4>Alison</h4>
                </div>
                <div class="author">
                    <div class="profilePic"><img src="~@/assets/img/oott_card_proPic_example.png" alt=""></div>
                    <h4>Alison</h4>
                </div>
                <div class="author">
                    <div class="profilePic"><img src="~@/assets/img/oott_card_proPic_example.png" alt=""></div>
                    <h4>Alison</h4>
                </div>
                <div class="author">
                    <div class="profilePic"><img src="~@/assets/img/oott_card_proPic_example.png" alt=""></div>
                    <h4>Alison</h4>
                </div>
                <div class="author">
                    <div class="profilePic"><img src="~@/assets/img/oott_card_proPic_example.png" alt=""></div>
                    <h4>Alison</h4>
                </div>
                <!-- <div class="author">
                    <div class="profilePic"><img src="~@/assets/img/oott_card_proPic_example.png" alt=""></div>
                    <h4>Alison</h4>
                </div> -->
                <!-- <div class="author">
                    <div class="profilePic"><img src="~@/assets/img/oott_card_proPic_example.png" alt=""></div>
                    <h4>Alison</h4>
                </div>
                <div class="author">
                    <div class="profilePic"><img src="~@/assets/img/oott_card_proPic_example.png" alt=""></div>
                    <h4>Alison</h4>
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
    </section>
</template>

<style lang="scss">
@import "@/assets/scss/baseAndMixin.scss";

// 全頁設定

#app {
    background-color: $bgColor_default;
}

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

            @media (min-width: 768px) {
                width: 120px;
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

                    @media (min-width: $xl) {
                        position: absolute;
                        padding: $sp3 $sp6;
                        font-size: 32px;
                        letter-spacing: 0.06em;
                    }
                }

                .tripCover {
                    width: 80%;

                    @media (min-width: $xl) {
                        width: 640px;

                    }

                    img {
                        width: 100%;
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
                    background-image: url('~@/assets/img/index_trip_info_bg.svg');
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

                @media (min-width: 768px) {
                    flex-wrap: wrap;
                    gap: 32px;
                    overflow-x: visible;

                }

                .tripCard {

                    box-sizing: border-box;
                    flex-shrink: 0;
                    margin-left: 32px;
                    background-color: $default_red;

                    @media (min-width: 768px) {
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
.tripView_selectTrip {
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

                @media (min-width: 768px) {
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

                    @media (min-width: 768px) {
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
    }

    .heading {
        display: flex;
        flex-direction: column;
        gap: $sp2;
        width: 280px;
    }

    .content {
        width: 100%;
        display: flex;
        gap: $sp5;
        overflow-x: scroll;
        overflow-y: hidden;
        @media (min-width: $xl) {
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
</style>

<script>
import tripCard from '@/components/TripCard.vue'

export default {
    data() {
        return {
            topTrips: [
            {
                    tripCardPhoto: require('@/assets/img/trip_card_example.png'),
                    tripCardTags: "台中・#親子 #情侶 #農場",
                    tripCardTitle: "台中文青一日遊",
                    tripCardDesc: "到臺中屯區藝文中心參觀各式展覽與展演廳，並到太平買菸場欣賞本市藝術家陳庭詩鐵雕作品，再來到臺中市中區參觀美化的綠川水岸廊道，中午在第二市場品嚐臺中市各式美食小吃，下午再到審計新村參觀文創聚落感受臺中市文創的魅力，接著前往紙箱王創意園區體驗親手DIY文創商品，帶著滿滿的回憶與紀念品回家。",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 9",
                },
                {
                    tripCardPhoto: require('@/assets/img/place/place_006-1.png'),
                    tripCardTags: "宜蘭・#親子 #情侶 #風景",
                    tripCardTitle: "宜蘭芬多精一日遊",
                    tripCardDesc: "不知道要去哪裡玩嗎？精選六個宜蘭知名景點，有吃又有玩，無論",
                    tripCardAuthor: "小編B",
                    tripCardDate: "2023 / 7 / 12",
                },
                {
                    tripCardPhoto: require('@/assets/img/place/place_012.png'),
                    tripCardTags: "新北・#親子 #情侶 #風景 #海邊 #放鬆",
                    tripCardTitle: "新北藝術一日遊",
                    tripCardDesc: "來去新北一日遊，鶯歌、三峽這裡也有蠻多特色景點，不只是逛老街，也可以安排個鶯歌景點一日遊，順便遊三峽景點。不管是季節限定的賞花景點，還是親子同遊必拍，又或者是IG熱門打卡點，通通好玩報你知。",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 13",
                },
                {
                    tripCardPhoto: require('@/assets/img/place/place_001.png'),
                    tripCardTags: "新竹・#親子 #情侶 #風景 #藝文 #放鬆 #懷舊",
                    tripCardTitle: "新竹懷舊之旅",
                    tripCardDesc: "新竹內灣旅行去，來內灣一日遊要怎麼玩呢？除了內灣老街外，週邊也有一些亮點，像是景觀餐廳、文青景點、咖啡廳，自然景觀，推薦大家可以一同順遊，除了玩內灣，如果有時間，尖石一帶也有一些不錯的景點，可以順著路線玩上去。",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 9",
                },
                {
                    tripCardPhoto: require('@/assets/img/place/place_019-1.png'),
                    tripCardTags: "台北・#親子 #藝文 #放鬆",
                    tripCardTitle: "台北泡湯一日遊",
                    tripCardDesc: "台北一日遊，探索台北的繁華與傳統魅力！不只是泡溫泉，也可以安排個美食之旅，順便去公園遊玩。不管是季節限定的賞花景點，還是親子同遊必拍！。",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 16",
                },
                {
                    tripCardPhoto: require('@/assets/img/place/place_029.png'),
                    tripCardTags: "基隆・#小資 #風景 #海邊 #放鬆 #懷舊",
                    tripCardTitle: "基隆探索大自然之",
                    tripCardDesc: "基隆一日遊，享受基隆的陽光與海洋！不只是拍美美的照片，也可以安排個美食之旅，順便去騎自行車。不管是基隆仙洞巖山，或是智能海洋館！",
                    tripCardAuthor: "小編B",
                    tripCardDate: "2023 / 7 / 18",
                },
                {
                    tripCardPhoto: require('@/assets/img/place/place_037-1.png'),
                    tripCardTags: "苗栗・#親子 #風景 #山林 #放鬆 #農場",
                    tripCardTitle: "苗栗放鬆身心一日遊",
                    tripCardDesc: "探索苗栗美景：飛牛牧場帶您親近可愛的牛兒，西湖渡假村讓您寧靜享受湖光山色，巧克力雲莊帶來甜蜜的巧克力製作體驗，白沙屯拱天宮感受宗教莊嚴。一天遊覽，盡情享受苗栗之旅！",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 19",
                },
            ],
            selectTrips: [
                {
                    tripCardPhoto: require('@/assets/img/place/place_056.png'),
                    tripCardTags: "彰化・#親子 #情侶 #風景 #樂園 #山林 #放鬆",
                    tripCardTitle: "彰化活力滿滿一日遊",
                    tripCardDesc: "樸實無化的彰化地區，除了濃濃的人情味，還有許多宮廟傳統，彰化活力滿滿一日遊，讓你越玩越有活力！",
                    tripCardAuthor: "小編B",
                    tripCardDate: "2023 / 7 / 22",
                },
                {
                    tripCardPhoto: require('@/assets/img/place/place_130-1.png'),
                    tripCardTags: "宜蘭・#親子 #情侶 #藝文",
                    tripCardTitle: "宜蘭深度之旅",
                    tripCardDesc: "來一場令人難以忘懷的深度旅程吧!!!可以讓你深入了解台灣的歷史文明和文化遺產，帶領你穿越時空，探索古老的建築、考古遺址、博物館和文物展覽，並提供了對過去的獨特洞察。",
                    tripCardAuthor: "小編B",
                    tripCardDate: "2023 / 7 / 23",
                },
                {
                    tripCardPhoto: require('@/assets/img/place/place_064.png'),
                    tripCardTags: "南投・#情侶 #小資 #風景 #放鬆 #懷舊",
                    tripCardTitle: "南投約會一日遊",
                    tripCardDesc: "讓我們一起遊玩南投！中興新村、星月天空景觀餐廳、猴探井天空之橋、埔里酒廠、水蛙頭步道。漫遊於這些地點，體驗豐富的文化、美食和自然景觀。",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 25",
                },
                {
                    tripCardPhoto: require('@/assets/img/trip_card_example.png'),
                    tripCardTags: "台中・#親子 #情侶 #農場",
                    tripCardTitle: "台中文青一日遊",
                    tripCardDesc: "到臺中屯區藝文中心參觀各式展覽與展演廳，並到太平買菸場欣賞本市藝術家陳庭詩鐵雕作品，再來到臺中市中區參觀美化的綠川水岸廊道，中午在第二市場品嚐臺中市各式美食小吃，下午再到審計新村參觀文創聚落感受臺中市文創的魅力，接著前往紙箱王創意園區體驗親手DIY文創商品，帶著滿滿的回憶與紀念品回家。",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 9",
                },
            ]
        }
    },
    methods: {

    },
    components: {
        tripCard
    }
}
</script>