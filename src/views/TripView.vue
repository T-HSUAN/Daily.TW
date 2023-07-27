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
                    <a href="/trip_info">
                        <button class="btn">馬上出發<img src="~@/assets/img/btn_arrow.png" alt="" class="arrow_white">
                            <img src="~@/assets/img/btn_arrow_hover.png" alt="" class="arrow_brown"></button>
                    </a>
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
                    tripCardPhoto: require('@/assets/img/trip_card_example.png'),
                    tripCardTags: "台中・#親子 #情侶 #農場",
                    tripCardTitle: "台中文青一日遊",
                    tripCardDesc: "到臺中屯區藝文中心參觀各式展覽與展演廳，並到太平買菸場欣賞本市藝術家陳庭詩鐵雕作品，再來到臺中市中區參觀美化的綠川水岸廊道，中午在第二市場品嚐臺中市各式美食小吃，下午再到審計新村參觀文創聚落感受臺中市文創的魅力，接著前往紙箱王創意園區體驗親手DIY文創商品，帶著滿滿的回憶與紀念品回家。",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 9",
                },
                {
                    tripCardPhoto: require('@/assets/img/trip_card_example.png'),
                    tripCardTags: "台中・#親子 #情侶 #農場",
                    tripCardTitle: "台中文青一日遊",
                    tripCardDesc: "到臺中屯區藝文中心參觀各式展覽與展演廳，並到太平買菸場欣賞本市藝術家陳庭詩鐵雕作品，再來到臺中市中區參觀美化的綠川水岸廊道，中午在第二市場品嚐臺中市各式美食小吃，下午再到審計新村參觀文創聚落感受臺中市文創的魅力，接著前往紙箱王創意園區體驗親手DIY文創商品，帶著滿滿的回憶與紀念品回家。",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 9",
                },
                {
                    tripCardPhoto: require('@/assets/img/trip_card_example.png'),
                    tripCardTags: "台中・#親子 #情侶 #農場",
                    tripCardTitle: "台中文青一日遊",
                    tripCardDesc: "到臺中屯區藝文中心參觀各式展覽與展演廳，並到太平買菸場欣賞本市藝術家陳庭詩鐵雕作品，再來到臺中市中區參觀美化的綠川水岸廊道，中午在第二市場品嚐臺中市各式美食小吃，下午再到審計新村參觀文創聚落感受臺中市文創的魅力，接著前往紙箱王創意園區體驗親手DIY文創商品，帶著滿滿的回憶與紀念品回家。",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 9",
                },
                {
                    tripCardPhoto: require('@/assets/img/trip_card_example.png'),
                    tripCardTags: "台中・#親子 #情侶 #農場",
                    tripCardTitle: "台中文青一日遊",
                    tripCardDesc: "到臺中屯區藝文中心參觀各式展覽與展演廳，並到太平買菸場欣賞本市藝術家陳庭詩鐵雕作品，再來到臺中市中區參觀美化的綠川水岸廊道，中午在第二市場品嚐臺中市各式美食小吃，下午再到審計新村參觀文創聚落感受臺中市文創的魅力，接著前往紙箱王創意園區體驗親手DIY文創商品，帶著滿滿的回憶與紀念品回家。",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 9",
                },
                {
                    tripCardPhoto: require('@/assets/img/trip_card_example.png'),
                    tripCardTags: "台中・#親子 #情侶 #農場",
                    tripCardTitle: "台中文青一日遊",
                    tripCardDesc: "到臺中屯區藝文中心參觀各式展覽與展演廳，並到太平買菸場欣賞本市藝術家陳庭詩鐵雕作品，再來到臺中市中區參觀美化的綠川水岸廊道，中午在第二市場品嚐臺中市各式美食小吃，下午再到審計新村參觀文創聚落感受臺中市文創的魅力，接著前往紙箱王創意園區體驗親手DIY文創商品，帶著滿滿的回憶與紀念品回家。",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 9",
                },
                {
                    tripCardPhoto: require('@/assets/img/trip_card_example.png'),
                    tripCardTags: "台中・#親子 #情侶 #農場",
                    tripCardTitle: "台中文青一日遊",
                    tripCardDesc: "到臺中屯區藝文中心參觀各式展覽與展演廳，並到太平買菸場欣賞本市藝術家陳庭詩鐵雕作品，再來到臺中市中區參觀美化的綠川水岸廊道，中午在第二市場品嚐臺中市各式美食小吃，下午再到審計新村參觀文創聚落感受臺中市文創的魅力，接著前往紙箱王創意園區體驗親手DIY文創商品，帶著滿滿的回憶與紀念品回家。",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 9",
                },
            ],
            selectTrips: [
                {
                    tripCardPhoto: require('@/assets/img/trip_card_example.png'),
                    tripCardTags: "台中・#親子 #情侶 #農場",
                    tripCardTitle: "台中文青一日遊",
                    tripCardDesc: "到臺中屯區藝文中心參觀各式展覽與展演廳，並到太平買菸場欣賞本市藝術家陳庭詩鐵雕作品，再來到臺中市中區參觀美化的綠川水岸廊道，中午在第二市場品嚐臺中市各式美食小吃，下午再到審計新村參觀文創聚落感受臺中市文創的魅力，接著前往紙箱王創意園區體驗親手DIY文創商品，帶著滿滿的回憶與紀念品回家。",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 9",
                },
                {
                    tripCardPhoto: require('@/assets/img/trip_card_example.png'),
                    tripCardTags: "台中・#親子 #情侶 #農場",
                    tripCardTitle: "台中文青一日遊",
                    tripCardDesc: "到臺中屯區藝文中心參觀各式展覽與展演廳，並到太平買菸場欣賞本市藝術家陳庭詩鐵雕作品，再來到臺中市中區參觀美化的綠川水岸廊道，中午在第二市場品嚐臺中市各式美食小吃，下午再到審計新村參觀文創聚落感受臺中市文創的魅力，接著前往紙箱王創意園區體驗親手DIY文創商品，帶著滿滿的回憶與紀念品回家。",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 9",
                },
                {
                    tripCardPhoto: require('@/assets/img/trip_card_example.png'),
                    tripCardTags: "台中・#親子 #情侶 #農場",
                    tripCardTitle: "台中文青一日遊",
                    tripCardDesc: "到臺中屯區藝文中心參觀各式展覽與展演廳，並到太平買菸場欣賞本市藝術家陳庭詩鐵雕作品，再來到臺中市中區參觀美化的綠川水岸廊道，中午在第二市場品嚐臺中市各式美食小吃，下午再到審計新村參觀文創聚落感受臺中市文創的魅力，接著前往紙箱王創意園區體驗親手DIY文創商品，帶著滿滿的回憶與紀念品回家。",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 9",
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