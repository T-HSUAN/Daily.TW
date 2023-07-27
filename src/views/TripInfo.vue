<!-- 行程頁面-->
<template>
    <div class="tripInfo">
        <!-- 麵包屑 -->
        <div class="breadcrumb">
            <router-link to="/">
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
                        <h2>新竹內灣放鬆小旅行</h2>
                        <img src="~@/assets/img/trip_deco_footPrint.svg" alt="" class="deco">
                    </div>
                    <h5 class="author">作者 | 日日旅著小編</h5>
                    <h5 class="date">發布日期 | 2023年7月2日</h5>
                    <h5 class="views">2,345 次瀏覽</h5>
                </div>
                <div class="trip_desc">
                    <p>新竹內灣旅行去，來內灣一日遊要怎麼玩呢？除了內灣老街外，週邊也有一些亮點，像是景觀餐廳、文青景點、咖啡廳、自然景觀，推薦大家可以一同順遊。除了玩內灣，如果有時間，尖石一帶也有一些不錯的景點，可以順著路線玩上去。
                    </p>
                </div>
                <section class="spot" id="spot1">
                    <div class="spot_title">
                        <h3>合興車站</h3>
                        <div class="time">
                            <font-awesome-icon icon="fa-solid fa-clock" flip="horizontal" />
                            <h5>停留30分鐘</h5>
                        </div>
                    </div>
                    <div class="spot_img">
                        <img src="~@/assets/img/place/place_001.png" alt="景點照片">
                    </div>
                    <p class="spot_desc">
                        位於內灣老街附近的合興火車站，這裡除了原有的候車亭外，並沒有太多好玩或好拍的東西。但現在很不一樣囉！經過薰衣草森林的重新規劃後，合興車站成了名符其實的愛情火車站，在這裡，可以看到許多愛情的元素，一字一語、一點一滴，都觸動著我們的心。
                    </p>
                    <div class="spot_loc">
                        <font-awesome-icon icon="fa-solid fa-location-dot" />
                        <a href="https://goo.gl/maps/Nekbh1wSTguR5KDf7" target="_blank">
                            <h5>新竹縣橫山鄉中山街一段17號</h5>
                        </a>
                    </div>
                </section>
                <section class="spot" id="spot2">
                    <div class="spot_title">
                        <h3>內灣愛情故事館</h3>
                        <div class="time">
                            <font-awesome-icon icon="fa-solid fa-clock" flip="horizontal" />
                            <h5>停留1小時</h5>
                        </div>
                    </div>
                    <div class="spot_img">
                        <img src="~@/assets/img/place/place_002.png" alt="景點照片">
                    </div>
                    <p class="spot_desc">
                        浴火重生，強勢回歸~以全新的面貌再次登場，這回的內灣愛情故事館，可以說是進階版的愛情故事館，不只拍照的場景變多了，還有許多浪漫新元素，而且連餐點都變好吃了，想要揪好姐妹或另一半來浪漫拍照，就來全新的內灣愛情故事館走走吧。
                    </p>
                    <div class="spot_loc">
                        <font-awesome-icon icon="fa-solid fa-location-dot" />
                        <a href="https://goo.gl/maps/tL1NkkwnjHRej8Mr8" target="_blank">
                            <h5> 新竹縣內灣鄉內灣村中正路200號</h5>
                        </a>
                    </div>
                </section>
                <section class="spot" id="spot3">
                    <div class="spot_title">
                        <h3>內灣老街</h3>
                        <div class="time">
                            <font-awesome-icon icon="fa-solid fa-clock" flip="horizontal" />
                            <h5>停留2小時</h5>
                        </div>
                    </div>
                    <div class="spot_img">
                        <img src="~@/assets/img/place/place_003.png" alt="景點照片">
                    </div>
                    <p class="spot_desc">
                        一個充滿學生回憶的地方。內灣老街的小吃攤販很多，走一圈差不多就可以吃飽了，其中內灣戲院生意極好，用餐尖峰時間都要候位才排得到座位。
                    </p>
                    <div class="spot_loc">
                        <font-awesome-icon icon="fa-solid fa-location-dot" />
                        <a href="https://goo.gl/maps/xdGrkv3sFKemu5Xz5" target="_blank">
                            <h5>新竹縣橫山鄉中正路</h5>
                        </a>
                    </div>
                </section>
                <section class="spot" id="spot4">
                    <div class="spot_title">
                        <h3>劉興欽漫畫館</h3>
                        <div class="time">
                            <font-awesome-icon icon="fa-solid fa-clock" flip="horizontal" />
                            <h5>停留3小時</h5>
                        </div>
                    </div>
                    <div class="spot_img">
                        <img src="~@/assets/img/place/place_004.png" alt="景點照片">
                    </div>
                    <p class="spot_desc">
                        一直以來，我覺得漫畫館是比較靜態復古的展覽，對劉興欽大師的畫，又比較不是這麼熟悉，所以激不起我的興趣。
                        可是後來了好客好品希望工場進駐，經過文創團隊的改造後，裡頭不只有漫畫館，還多了品客好客生活餐飲、及台灣水色工作坊。將園區打造的相當的有趣味性。
                    </p>
                    <div class="spot_loc">
                        <font-awesome-icon icon="fa-solid fa-location-dot" />
                        <a href="https://goo.gl/maps/DChj9k95D33TXvsKA" target="_blank">
                            <h5>新竹縣橫山鄉內灣村3鄰110號</h5>
                        </a>
                    </div>
                </section>
                <section class="spot" id="spot5">
                    <div class="spot_title">
                        <h3>內灣隱藏版咖啡</h3>
                        <div class="time">
                            <font-awesome-icon icon="fa-solid fa-clock" flip="horizontal" />
                            <h5>停留1.5小時</h5>
                        </div>
                    </div>
                    <div class="spot_img">
                        <img src="~@/assets/img/place/place_005.png" alt="景點照片">
                    </div>
                    <p class="spot_desc">
                        位於內灣老街附近的遷徏咖啡，除了是民宿，白天也是咖啡廳，文青風的室內環境，復古卻很有味道。
                    </p>
                    <div class="spot_loc">
                        <font-awesome-icon icon="fa-solid fa-location-dot" />
                        <a href="https://goo.gl/maps/bu6AU3sz2Dua7L3T7" target="_blank">
                            <h5>新竹縣橫山鄉和平街18號</h5>
                        </a>
                    </div>
                </section>
                <section class="trip_tags">
                    <div class="tags">#新竹</div>
                    <div class="tags">#親子</div>
                    <div class="tags">#情侶</div>
                    <div class="tags">#風景</div>
                    <div class="tags">#藝文</div>
                    <div class="tags">#放鬆</div>
                    <div class="tags">#懷舊</div>
                </section>
            </article>
            <div class="sidebar">
                <div class="route">
                    <Anchor show-ink>
                        <AnchorLink href="#spot1" title="合興車站" />
                        <AnchorLink href="#spot2" title="內灣愛情故事館" />
                        <AnchorLink href="#spot3" title="內灣老街" />
                        <AnchorLink href="#spot4" title="劉興欽漫畫館" />
                        <AnchorLink href="#spot5" title="內灣隱藏版咖啡" />
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
                        <oottCard class="oottCard" v-for="(oott, index) in ootts" :key="index" :oottPhoto="oott.oottPhoto"
                            :oottCardTags="oott.oottCardTags" :oottCardDate="oott.oottCardDate"
                            :oottAuthorPhoto="oott.oottAuthorPhoto" :oottCardAuthor="oott.oottCardAuthor"></oottCard>
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
                                <ticketCard
                                    :ticketPhoto="ticket.ticketPhoto" :ticketTitle="ticket.ticketTitle"
                                    :ticketLocation="ticket.ticketLocation" :ticketTags="ticket.ticketTags"
                                    :originalPrice="ticket.originalPrice" :FinalPrice="ticket.finalPrice"
                                    :discountTag="ticket.discountTag"></ticketCard>
                            </router-link>
                        </div>
                    </div>
                </div>
                <a href="/ticket">
                    <button class="btn">查看更多</button>
                </a>
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
                <a href="/trip">
                    <button class="btn">查看更多</button>
                </a>
            </div>
        </section>

    </div>
</template>

<style lang="scss">
@import "@/assets/scss/baseAndMixin.scss";

.tripInfo {

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

            .spot {

                a{
                    color: inherit;
                    &:hover{
                        color: $textColor_tint;
                    }
                }

                .spot_title {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-bottom: $sp3;

                    .time {
                        display: flex;
                        gap: $sp1;
                    }
                }

                .spot_img {
                    width: 100%;
                    margin-bottom: $sp2;

                    @media (min-width: $md) {
                        margin-bottom: $sp3;
                    }

                    img {
                        width: 100%;
                    }
                }

                .spot_desc {
                    margin-bottom: $sp3;
                    line-height: 190%;

                    @media (min-width: $md) {
                        line-height: 165%;
                    }
                }

                .spot_loc {
                    display: flex;
                    gap: $sp1;
                    margin-bottom: $sp8;
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

                    @media (min-width: 1260px) {
                        justify-content: space-between;
                        gap: 32px;
                        overflow: visible;
                    }

                    .ticketCard {
                        flex-shrink: 0;
                        margin-left: 32px;

                        @media (min-width: 1260px) {
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
                text-align: left;

                @media (min-width: 768px) {
                    overflow: visible;
                }

                .tripCards {
                    display: flex;
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
import oottCard from '@/components/OottCard.vue'
import ticketCard from '@/components/TicketVertical.vue'
import tripCard from '@/components/TripCard.vue'

export default {
    components: {
        oottCard,
        ticketCard,
        tripCard,
    },
    data() {
        return {
            ootts: [
            {   
                    oottPhoto: require('@/assets/img//oott_02.png'),
                    oottCardTags: "#日系 #休閒 #風景",
                    oottCardDate: "2022 / 12 / 12",
                    oottAuthorPhoto: require('@/assets/img/layout/plan_result_oott-1_member.png'),
                    oottCardAuthor: "Alison",
                },
                {
                    oottPhoto: require('@/assets/img/oott_06.png'),
                    oottCardTags: "#簡約 #休閒 #氣質",
                    oottCardDate: "2022 / 12 / 12",
                    oottAuthorPhoto: require('@/assets/img/layout/plan_result_oott-2_member.png'),
                    oottCardAuthor: "Susan",
                },
                {
                    oottPhoto: require('@/assets/img/oott_41.png'),
                    oottCardTags: "#簡約 #運動 #休閒",
                    oottCardDate: "2022 / 12 / 12",
                    oottAuthorPhoto: require('@/assets/img/layout/plan_result_oott-3_member.png'),
                }
            ],
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
            ]
        }
    },
    methods: {

    },
}
</script>