<template>
    <div class="plan_result">
        <div class="result_banner">
            <div class="main_pic">
                <div class="boy">
                    <img src="~@/assets/img/layout/plan_result-1.png" alt="">
                </div>
                <div class="duck">
                    <img src="~@/assets/img/layout/plan_result-2.png" alt="">
                </div>
            </div>
            <div class="result_title">
                <h1>專屬旅著已產生...</h1>
                <div class="location_icon">
                    <img src="~@/assets/img/layout/plan_result-3.png" alt="">
                </div>
                <div class="result_arrow">
                    <img src="~@/assets/img/layout/plan_result_arrow.png" alt="">
                </div>
                <span>往下查看結果</span>
            </div>
        </div>
        <div class="result_wave"></div>
        <div class="result_content">
            <div class="result_subtitle">
                <h2>你的一日專屬旅著</h2>
                <div class="title_footprint"></div>
            </div>
            <div class="content_desc">
                <div class="plan_container">
                    <div class="plan_title">
                        <h3>台中文青一日遊</h3>
                        <div class="place_tags">
                            <span># 屯區藝文中心</span>
                            <span># 太平買菸場</span>
                            <span># 審計新村</span>
                            <span># 紙箱王創意園區</span>
                        </div>
                        <label>
                            <input type="checkbox">
                            <span></span>
                        </label>
                    </div>
                    <div class="plan_place">
                        <div class="pic_swiper">
                            <Carousel :autoplay="3000" :wrap-around="true">
                                <Slide v-for="item in resultPic1" :key="item.index">
                                    <img :src="item.src" alt="">
                                </Slide>
                                <template #addons>
                                    <Pagination />
                                </template>
                            </Carousel>
                        </div>
                        <div class="place_desc">
                            <div class="place_content">
                                <h4>屯區藝文中心</h4>
                                <p>於99年7月正式成立，99年12月25日縣市合併後改名為臺中市立屯區藝文中心，嗣因組織整併，又於102年1月1日更改為今名。其以表演藝術與音樂為主軸，兼具美術展示與文化推廣功能。積極辦理各項藝文展演活動，促進國際文化藝術交流。
                                </p>
                            </div>
                            <div class="place_time_address">
                                <div class="time">
                                    <img src="~@/assets/img/layout/plan_result_time.png" alt="">
                                    <span>停留 1.5 小時</span>
                                </div>
                                <div class="address">
                                    <img src="~@/assets/img/layout/plan_result_location.png" alt="">
                                    <a href="#">台中市太平區大興路201號</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="plan_place">
                        <div class="pic_swiper">
                            <Carousel :autoplay="3000" :wrap-around="true">
                                <Slide v-for="item in resultPic2" :key="item.index">
                                    <img :src="item.src" alt="">
                                </Slide>
                                <template #addons>
                                    <Pagination />
                                </template>
                            </Carousel>
                        </div>
                        <div class="place_desc">
                            <div class="place_content">
                                <h4>太平買菸場</h4>
                                <p>興建於1955年，是公賣局向菸農鑑定、收購菸葉的場所，1994年裁撤後閒置良久，因見證太平菸葉發展歷程，加上建築構造特殊，整體空間具有再利用潛力，經兩年修繕營造出結合歷史與藝術文化的新場域。
                                </p>
                            </div>
                            <div class="place_time_address">
                                <div class="time">
                                    <img src="~@/assets/img/layout/plan_result_time.png" alt="">
                                    <span>停留 1.5 小時</span>
                                </div>
                                <div class="address">
                                    <img src="~@/assets/img/layout/plan_result_location.png" alt="">
                                    <a href="#">台中市太平區東平路464號</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="plan_place">
                        <div class="pic_swiper">
                            <Carousel :autoplay="3000" :wrap-around="true">
                                <Slide v-for="item in resultPic3" :key="item.index">
                                    <img :src="item.src" alt="">
                                </Slide>
                                <template #addons>
                                    <Pagination />
                                </template>
                            </Carousel>
                        </div>
                        <div class="place_desc">
                            <div class="place_content">
                                <h4>審計新村</h4>
                                <p>本區串連既有的綠園道及美術館文創商店以形成產業群聚效應，型塑臺中市園道文創產業廊道，並以生活、生產、生態三生共構的基礎，輔導青年族群進行微型創業，增加就業機會。</p>
                            </div>
                            <div class="place_time_address">
                                <div class="time">
                                    <img src="~@/assets/img/layout/plan_result_time.png" alt="">
                                    <span>停留 1.5 小時</span>
                                </div>
                                <div class="address">
                                    <img src="~@/assets/img/layout/plan_result_location.png" alt="">
                                    <a href="#">台中市西區民生路368巷</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="plan_place">
                        <div class="pic_swiper">
                            <Carousel :autoplay="3000" :wrap-around="true">
                                <Slide v-for="item in resultPic4" :key="item.index">
                                    <img :src="item.src" alt="">
                                </Slide>
                                <template #addons>
                                    <Pagination />
                                </template>
                            </Carousel>
                        </div>
                        <div class="place_desc">
                            <div class="place_content">
                                <h4>紙箱王創意園區</h4>
                                <p>以紙為主題的親子觀光創意園區將紙的創意無限延伸，打破你的想像，打造全世界的知名景點，來到這裡就可以搭乘紙箱小火車環遊世界，探索這變化萬千的異想紙的王國。</p>
                            </div>
                            <div class="place_time_address">
                                <div class="time">
                                    <img src="~@/assets/img/layout/plan_result_time.png" alt="">
                                    <span>停留 1.5 小時</span>
                                </div>
                                <div class="address">
                                    <img src="~@/assets/img/layout/plan_result_location.png" alt="">
                                    <a href="#">台中市北屯區東山路二段2巷2號</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn_bookmark">
                        <label>
                            <input type="checkbox" class="tag" />
                            <span>
                                <font-awesome-icon icon="fa-regular fa-bookmark" class="bookmark" />
                                加入收藏
                            </span>
                        </label>
                    </div>
                </div>
                <div class="weather_container">
                    <h3>一週天氣預報 | 台中</h3>
                    <div class="table_wrap">
                        <table>
                            <tr>
                                <td><span>07/28</span></td>
                                <td><span>07/29</span></td>
                                <td><span>07/30</span></td>
                                <td><span>07/31</span></td>
                                <td><span>08/01</span></td>
                                <td><span>08/02</span></td>
                                <td><span>08/03</span></td>
                            </tr>
                            <tr>
                                <!-- <td>
                                    <img src="weatherData.forecast.forecastday[0].day.condition.icon" alt="">
                                    <span>最高 {{ weatherData.forecast.forecastday[0].day.maxtemp_c }}℃</span><br>
                                    <span>最低 {{ weatherData.forecast.forecastday[0].day.mintemp_c }}℃</span><br>
                                    <span>降雨機率 {{ weatherData.forecast.forecastday[0].day.daily_chance_of_rain }}%</span>
                                </td> -->
                                <td>
                                    <img src="https://cdn.weatherapi.com/weather/64x64/day/308.png" alt="">
                                    <span>最高 28℃</span><br>
                                    <span>最低 25℃</span><br>
                                    <span>降雨機率 88%</span>
                                </td>
                                <td>
                                    <img src="https://cdn.weatherapi.com/weather/64x64/day/176.png" alt="">
                                    <span>最高 34℃</span><br>
                                    <span>最低 24℃</span><br>
                                    <span>降雨機率 89%</span>
                                </td>
                                <td>
                                    <img src="https://cdn.weatherapi.com/weather/64x64/day/308.png" alt="">
                                    <span>最高 32℃</span><br>
                                    <span>最低 25℃</span><br>
                                    <span>降雨機率 89%</span>
                                </td>
                                <td>
                                    <img src="https://cdn.weatherapi.com/weather/64x64/day/308.png" alt="">
                                    <span>最高 26℃</span><br>
                                    <span>最低 24℃</span><br>
                                    <span>降雨機率 89%</span>
                                </td>
                                <td>
                                    <img src="https://cdn.weatherapi.com/weather/64x64/day/176.png" alt="">
                                    <span>最高 30℃</span><br>
                                    <span>最低 23℃</span><br>
                                    <span>降雨機率 65%</span>
                                </td>
                                <td>
                                    <img src="https://cdn.weatherapi.com/weather/64x64/day/176.png" alt="">
                                    <span>最高 32℃</span><br>
                                    <span>最低 24℃</span><br>
                                    <span>降雨機率 78%</span>
                                </td>
                                <td>
                                    <img src="https://cdn.weatherapi.com/weather/64x64/day/302.png" alt="">
                                    <span>最高 32℃</span><br>
                                    <span>最低 26℃</span><br>
                                    <span>降雨機率 80%</span>
                                </td>

                            </tr>
                        </table>
                    </div>
                </div>
                <div class="oott_container">
                    <h3>出遊穿搭推薦</h3>
                    <div class="oott_card_wrap">
                        <OottCard class="oott_card" v-for="(oott, index) in ootts" :key="index" :oottPhoto="oott.oottPhoto"
                            :oottCardTags="oott.oottCardTags" :oottCardDate="oott.oottCardDate"
                            :oottAuthorPhoto="oott.oottAuthorPhoto" :oottCardAuthor="oott.oottCardAuthor">
                        </OottCard>
                    </div>
                </div>
                <div class="ticket_container">
                    <h3>景點票券優惠</h3>
                    <router-link to="/ticket_info">
                        <div class="ticket_box">
                            <div class="ticket_pic">
                            </div>
                            <div class="ticket_desc">
                                <div class="ticket_content">
                                    <h4>紙箱王創意園區門票</h4>
                                    <span>台中・</span>
                                    <span>#親子 #小資 #藝文</span>
                                    <p>以紙為主題的親子觀光創意園區將紙的創意無限延伸，打破你的想像，打造全世界的知名景點，來到這裡就可以搭乘紙箱小火車環遊世界，探索這變化萬千的異想紙的王國。</p>
                                </div>
                                <div class="ticket_price">
                                    <div class="price_box">
                                        <span>NT$ 200</span>
                                        <span>NT$ 200</span>
                                    </div>
                                    <div class="ticket_link">
                                        <router-link to="/ticket_info">
                                            查看詳情
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="sale_tag">
                                <span>75折</span>
                            </div> -->
                        </div>
                    </router-link>
                    <div class="ticket_card">
                        <router-link to="/ticket_info">
                            <Ticket v-for="(ticket, index) in tickets" :key="index" :ticketPhoto="ticket.ticketPhoto"
                                :ticketTitle="ticket.ticketTitle" :ticketTags="ticket.ticketTags"
                                :originalPrice="ticket.originalPrice" :FinalPrice="ticket.FinalPrice">
                            </Ticket>
                        </router-link>
                    </div>
                </div>
            </div>
            <div class="content_desc">
                <div class="plan_container">
                    <div class="plan_title">
                        <h3>基隆探索大自然之旅</h3>
                        <div class="place_tags">
                            <span># 正濱漁港彩色屋</span>
                            <span># 望幽谷濱海步道</span>
                            <span># 基隆潮境智能海洋館</span>
                            <span># 深澳鐵道自行車</span>
                        </div>
                        <label>
                            <input type="checkbox">
                            <span></span>
                        </label>
                    </div>
                    <div class="plan_place">
                        <div class="pic_swiper">
                            <Carousel :autoplay="3000" :wrap-around="true">
                                <Slide v-for="item in resultPic5" :key="item.index">
                                    <img :src="item.src" alt="">
                                </Slide>
                                <template #addons>
                                    <Pagination />
                                </template>
                            </Carousel>
                        </div>
                        <div class="place_desc">
                            <div class="place_content">
                                <h4>正濱漁港彩色屋</h4>
                                <p>正濱漁港的16棟屋子彩繪成彩色屋，讓原本寂靜的漁村，變成年輕人必訪的景點，最佳的拍攝點就在基隆市中正區正濱路58號~88號前的觀景平台　「涂大的吉古拉」非常好找，就在正濱漁港港邊，遠遠就能聞到一股碳烤香氣，基隆在地的美味，黃金色的吉古拉在彩色屋的陪襯下，顯得格外醒目，記得要先預訂才吃的到！
                                </p>
                            </div>
                            <div class="place_time_address">
                                <div class="time">
                                    <img src="~@/assets/img/layout/plan_result_time.png" alt="">
                                    <span>停留 0.5 小時</span>
                                </div>
                                <div class="address">
                                    <img src="~@/assets/img/layout/plan_result_location.png" alt="">
                                    <a href="#">基隆市中正區正濱路27號</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="content_desc">
                <div class="plan_container">
                    <div class="plan_title">
                        <h3>南投約會一日遊</h3>
                        <div class="place_tags">
                            <span># 中興新村</span>
                            <span># 星月天空景觀餐廳</span>
                            <span># 猴探井天空之橋</span>
                            <span># 埔里酒廠</span>
                        </div>
                        <label>
                            <input type="checkbox">
                            <span></span>
                        </label>
                    </div>
                    <div class="plan_place">
                        <div class="pic_swiper">
                            <Carousel :autoplay="3000" :wrap-around="true">
                                <Slide v-for="item in resultPic6" :key="item.index">
                                    <img :src="item.src" alt="">
                                </Slide>
                                <template #addons>
                                    <Pagination />
                                </template>
                            </Carousel>
                        </div>
                        <div class="place_desc">
                            <div class="place_content">
                                <h4>中興新村</h4>
                                <p>走進仿英國花園城鎮建造的「舊省府所在地」，時光彷彿停在純樸的5、60年代。除了有郵票牆、荷花池、大會堂等打卡景點；冰磚、牛肉麵、餡餅小米粥也是必吃喔！</p>
                            </div>
                            <div class="place_time_address">
                                <div class="time">
                                    <img src="~@/assets/img/layout/plan_result_time.png" alt="">
                                    <span>停留 1.5 小時</span>
                                </div>
                                <div class="address">
                                    <img src="~@/assets/img/layout/plan_result_location.png" alt="">
                                    <a href="#">南投縣南投市省府路</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="result_content_wave"></div>
        <div class="result_content result_bottom">
            <div class="result_subtitle">
                <h2>駐站旅人帶你玩</h2>
                <div class="title_footprint"></div>
            </div>
            <div class="result_trip">
                <TripCard v-for="(trip, index) in trips" :key="index" :tripCardPhoto="trip.tripCardPhoto"
                    :tripCardTags="trip.tripCardTags" :tripCardTitle="trip.tripCardTitle"
                    :tripCardAuthor="trip.tripCardAuthor" :tripCardDate="trip.tripCardDate">
                </TripCard>
            </div>
            <router-link to="/trip">
                <button class="btn">查看更多</button>
            </router-link>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import { Carousel, Pagination, Slide } from 'vue3-carousel'

import 'vue3-carousel/dist/carousel.css'

import OottCard from "@/components/OottCard.vue";
import Ticket from "@/components/TicketVertical.vue";
import TripCard from "@/components/TripCard.vue";

export default defineComponent({
    name: 'Autoplay',
    components: {
        Carousel,
        Slide,
        Pagination,
        OottCard,
        Ticket,
        TripCard,
    },
    data() {
        return {
            // showResultContent: false,
            resultPic1: [
                { src: require('@/assets/img/layout/plan_result_place_1-1.png') },
                { src: require('@/assets/img/layout/plan_result_place_1-2.png') },
                { src: require('@/assets/img/layout/plan_result_place_1-3.png') }
            ],
            resultPic2: [
                { src: require('@/assets/img/layout/plan_result_place_2-1.png') },
                { src: require('@/assets/img/layout/plan_result_place_2-2.png') },
                { src: require('@/assets/img/layout/plan_result_place_2-3.png') }
            ],
            resultPic3: [
                { src: require('@/assets/img/layout/plan_result_place_3-1.png') },
                { src: require('@/assets/img/layout/plan_result_place_3-2.png') },
                { src: require('@/assets/img/layout/plan_result_place_3-3.png') }
            ],
            resultPic4: [
                { src: require('@/assets/img/layout/plan_result_place_4-1.png') },
                { src: require('@/assets/img/layout/plan_result_place_4-2.png') }
            ],
            resultPic5: [
                { src: require('@/assets/img/layout/plan_result_place_5-1.png') },
                { src: require('@/assets/img/layout/plan_result_place_5-2.png') }
            ],
            resultPic6: [
                { src: require('@/assets/img/layout/plan_result_place_6-1.png') },
                { src: require('@/assets/img/layout/plan_result_place_6-2.png') }
            ],
            // weather: {
            //     loading: false,
            //     weatherData: {},
            //     location: 'Taichung',
            //     lang:'zh_tw',
            //     token:'713d2a4d5d6d47dca9a15517232207',
            // },
            ootts: [
                {
                    oottPhoto: require("@/assets/img/layout/plan_result_oott-1.png"),
                    oottCardTags: "#日系 #休閒 #風景",
                    oottCardDate: "2023 / 7 / 12",
                    oottAuthorPhoto: require("@/assets/img/layout/plan_result_oott-1_member.png"),
                    oottCardAuthor: "Alison",
                },
                {
                    oottPhoto: require("@/assets/img/layout/plan_result_oott-2.png"),
                    oottCardTags: "#復古 #海邊",
                    oottCardDate: "2023 / 7 / 3",
                    oottAuthorPhoto: require("@/assets/img/layout/plan_result_oott-2_member.png"),
                    oottCardAuthor: "Susan",
                },
                {
                    oottPhoto: require("@/assets/img/layout/plan_result_oott-3.png"),
                    oottCardTags: "#街頭 #潮流",
                    oottCardDate: "2023 / 6 / 6",
                    oottAuthorPhoto: require("@/assets/img/layout/plan_result_oott-3_member.png"),
                    oottCardAuthor: "Max",
                },
            ],
            tickets: [
                {
                    ticketPhoto: require("@/assets/img/layout/plan_result_ticket.png"),
                    ticketTitle: "紙箱王創意園區門票",
                    ticketTags: "台中・#親子 #小資 #藝文",
                    originalPrice: "200",
                    FinalPrice: "200",
                },
            ],
            trips: [
                {
                    tripCardPhoto: require("@/assets/img/layout/plan_result_place_7.png"),
                    tripCardTags: "新竹・#情侶 #風景 #藝文",
                    tripCardTitle: "新竹懷舊一日遊",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 12",
                },
                {
                    tripCardPhoto: require("@/assets/img/layout/plan_result_place_8.png"),
                    tripCardTags: "新北・#情侶 #小資 #風景",
                    tripCardTitle: "新北藝術一日遊",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 12",
                },
                {
                    tripCardPhoto: require("@/assets/img/layout/plan_result_place_9.png"),
                    tripCardTags: "宜蘭・#情侶 #風景 #藝文",
                    tripCardTitle: "宜蘭芬多精一日遊",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 12",
                },
            ],
        }
    },
    // created(){
    //     this.fetchWeather();
    // },
    // methods: {
    //     fetchWeather(){
    //         this.loading = true
    //         fetch(`https://api.weatherapi.com/v1/forecast.json?q=Taichung&days=7&hour=9&lang=zh_tw&key=713d2a4d5d6d47dca9a15517232207`)
    //         .then(res=> {
    //             return res.json()
    //         })
    //         .then(json=> {
    //             this.weatherData = json
    //             this.loading = false
    //         })
    //     }
    //     checkScroll() {
    //         const resultContent = document.querySelector('.result_content');
    //         if (resultContent) {
    //             const scrollPosition = window.scrollY;
    //             const resultContentOffset = resultContent.offsetTop;
    //             const windowHeight = window.innerHeight;
    //             if (scrollPosition > resultContentOffset - windowHeight / 2) {
    //             this.showResultContent = true;
    //             } else {
    //             this.showResultContent = false;
    //             }
    //         }
    //     },
    // },
    // mounted() {
    //     window.addEventListener('scroll', this.checkScroll);
    //     this.checkScroll();
    // },
});
</script>

<style lang="scss">
@import "@/assets/scss/baseAndMixin.scss";

#app {
    background-color: $bgColor_default;
}

.plan_result {
    background-color: $bgColor_default;

    @media (min-width: $md) {
        padding-top: $sp4;
    }

    .result_banner {
        position: relative;
        z-index: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-bottom: $sp4;
        position: relative;
        background-color: $bgColor_default;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center center;
        background-image: url("~@/assets/img/layout/plan_result_bg-sm.png");

        @media (min-width: $md) {
            background-image: url("~@/assets/img/layout/plan_result_bg-xl.png");
            background-position: top center;
        }

        .main_pic {
            display: flex;
            align-items: flex-end;
            padding: $sp15 0 $sp2 0;

            @media (min-width: $md) {
                padding: 184px 0 $sp2 0;
            }

            .boy {
                margin-right: -24px;

                @media (min-width: $md) {
                    margin-right: -40px;
                }

                img {
                    width: 146px;

                    @media (min-width: $md) {
                        width: 251px;
                    }
                }
            }

            .duck {
                margin-right: 20px;

                @media (min-width: $md) {
                    margin-right: -10px;
                }

                img {
                    width: 123px;

                    @media (min-width: $md) {
                        width: 211px;
                    }
                }
            }
        }

        .result_title {
            width: 200px;
            position: relative;

            @media (min-width: $md) {
                width: 573px;
            }

            h1 {
                display: inline-block;
                animation: fadeInDown 1s ease-in;
                @include sm_h1;

                @media (min-width: $md) {
                    @include xl_h1;
                }

                -webkit-text-stroke: 5px $textColor_default;
                position: relative;
                letter-spacing: 6px;
                line-height: 150%;

                &::before {
                    content: '專屬旅著已產生...';
                    position: absolute;
                    top: 0;
                    left: 0;
                    @include sm_h1;
                    -webkit-text-stroke: 0;
                    color: $textColor_tint;
                    letter-spacing: 6px;

                    @media (min-width: $md) {
                        @include xl_h1;
                    }
                }
            }

            .location_icon {
                position: absolute;
                top: 72px;
                left: 100%;
                animation: fadeInDown 1s ease-in;

                @media (min-width: $md) {
                    position: relative;
                    top: 0;
                    left: 0;
                    display: inline-block;
                }

                img {
                    width: 30px;
                }

                @media (min-width: $md) {
                    img {
                        width: 50px;
                    }
                }
            }

            .result_arrow {
                width: 17px;
                margin: auto;
                padding-top: $sp2;
                animation: fadeInDown 1s ease-in 1, fadeInDownLittle 1.2s 1s ease-in infinite;

                img {
                    width: 100%;
                    height: 79px;
                }
            }

            span {
                color: $textColor_default;
                display: block;
                text-align: center;
                padding-top: $sp1;
                animation: fadeInDown 1s ease-in 1, fadeInDownLittle 1.2s 1s ease-in infinite;
                @include sm_p;

                @media (min-width: $md) {
                    @include xl_p;
                }
            }
        }
    }

    .result_wave {
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

    .result_content_wave {
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

    .result_content {
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: $bgColor_tint;
        padding-top: $sp10;
        margin-top: -140px;

        @media (min-width: $md) {
            padding-top: $sp15;
            margin-top: -120px;
        }

        .result_subtitle {
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

        .content_desc {
            width: 83.333%;
            max-width: 1200px;
            border-radius: 5px 20px 20px 5px;
            background-color: $tint_yellow;
            padding: $sp2;
            margin-bottom: $sp3;
            box-shadow: 0px 3px 3px 0px rgba(106, 93, 74, 0.20);
            position: relative;

            @media (min-width: $md) {
                padding: $sp4;
                margin-bottom: $sp5;
            }

            .plan_container {
                display: flex;
                flex-direction: column;
                align-items: center;

                .plan_title {
                    padding-bottom: $sp1;
                    display: flex;
                    flex-direction: column;
                    gap: $sp2;

                    @media (min-width: $md) {
                        flex-direction: row;
                        gap: 0;
                        padding-bottom: $sp4;
                    }

                    h3 {
                        font-family: 'Shippori Mincho', 'Noto Sans TC', sans-serif;
                        font-size: 24px;
                        font-weight: 700;
                        white-space: nowrap;

                        @media (min-width: $md) {
                            font-size: 32px;
                            line-height: 42px;
                            padding-right: $sp2;
                        }
                    }

                    .place_tags {
                        display: flex;
                        gap: $sp1;
                        margin-right: 0;
                        overflow-x: scroll;

                        &::-webkit-scrollbar {
                            height: 4px;
                        }

                        &::-webkit-scrollbar-track {
                            background-color: $tint_red;
                        }

                        &::-webkit-scrollbar-thumb {
                            background-color: $mid_red;
                        }

                        @media (min-width: $md) {
                            margin-right: $sp9;

                            &::-webkit-scrollbar {
                                height: 12px;
                            }
                        }

                        span {
                            display: inline-block;
                            background-color: $default_red;
                            border-radius: 50px;
                            color: $textColor_white;
                            @include sm_p;
                            line-height: 28px;
                            padding: 0 $sp2;
                            margin-bottom: $sp1;
                            flex-shrink: 0;

                            @media (min-width: $md) {
                                @include xl_p;
                                line-height: 42px;
                            }
                        }
                    }

                    label {
                        input[type="checkbox"] {
                            display: none;
                        }

                        input[type="checkbox"]+span::before {
                            content: '';
                            display: inline-block;
                            width: 29px;
                            height: 47px;
                            background-image: url(~@/assets/img/bookmark_default.svg);
                            background-size: 100%;
                            background-repeat: no-repeat;
                            position: absolute;
                            top: 0;
                            right: 16px;
                            cursor: pointer;

                            @media (min-width: $md) {
                                width: 51px;
                                height: 77px;
                                right: 32px;
                            }
                        }

                        input[type="checkbox"]:checked+span::before {
                            content: '';
                            display: inline-block;
                            width: 29px;
                            height: 47px;
                            background-image: url(~@/assets/img/bookmark_clicked.svg);
                            background-size: 100%;
                            background-repeat: no-repeat;
                            cursor: pointer;

                            @media (min-width: $md) {
                                width: 51px;
                                height: 77px;
                            }
                        }
                    }
                }

                .plan_place {
                    display: flex;
                    flex-direction: column;
                    padding-bottom: $sp4;

                    @media (min-width: 1024px) {
                        flex-direction: row;
                        padding-bottom: $sp3;
                        gap: $sp2;
                    }

                    .pic_swiper {
                        position: relative;
                        margin: auto;
                        width: 279px;
                        flex-shrink: 0;

                        @media (min-width: $md) {
                            width: 381px;
                        }

                        @media (min-width: 1024px) {
                            margin: 0;
                        }

                        img {
                            width: 100%;
                            border-radius: 5px;
                        }

                        .carousel__pagination-button::after {
                            background-color: $tint_green !important;
                        }

                        .carousel__pagination-button--active::after {
                            background-color: $mid_green !important;
                        }
                    }

                    .place_desc {
                        display: flex;
                        flex-direction: column;
                        gap: $sp2;

                        @media (min-width: 1024px) {
                            justify-content: space-between;
                            padding-bottom: $sp3;
                        }

                        .place_content {
                            h4 {
                                @include sm_h4;
                                color: $default_green;
                                padding-top: $sp2;
                                padding-bottom: $sp2;

                                @media (min-width: $md) {
                                    @include xl_h4;
                                    padding-top: 0;
                                }
                            }

                            p {
                                @include sm_p;
                                line-height: 150%;
                                text-align: justify;

                                @media (min-width: $md) {
                                    @include xl_p;
                                }
                            }
                        }

                        .place_time_address {
                            display: flex;
                            flex-direction: column;
                            gap: $sp1;

                            @media (min-width: $md) {
                                flex-direction: row;
                                gap: $sp2;
                                padding-top: $sp1;
                            }

                            .time {
                                display: flex;
                                align-items: center;
                                gap: $sp1;

                                img {
                                    width: 22px;

                                    @media (min-width: $md) {
                                        width: 27px;
                                    }
                                }

                                span {
                                    @include sm_p;

                                    @media (min-width: $md) {
                                        @include xl_p;
                                        line-height: 150%;
                                    }
                                }
                            }

                            .address {
                                display: flex;
                                align-items: center;
                                gap: $sp1;

                                img {
                                    width: 19px;

                                    @media (min-width: $md) {
                                        width: 23px;
                                    }
                                }

                                a {
                                    color: $textColor_default;
                                    text-decoration: underline;
                                    @include sm_p;

                                    @media (min-width: $md) {
                                        @include xl_p;
                                        line-height: 150%;
                                    }
                                }
                            }
                        }
                    }
                }

                .btn_bookmark {
                    label {
                        span {
                            .bookmark {
                                padding-right: $sp1;
                            }
                        }
                    }
                }
            }

            .weather_container {
                padding-top: $sp5;

                h3 {
                    @include sm_h3;
                    padding-bottom: $sp3;

                    @media (min-width: $md) {
                        @include xl_h3;
                    }
                }

                .table_wrap {
                    border-radius: 10px;
                    border: 3px solid $textColor_default;
                    background-color: $textColor_white;
                    overflow-x: scroll;

                    &::-webkit-scrollbar {
                        height: 4px;
                    }

                    &::-webkit-scrollbar-track {
                        background-color: $textColor_default;
                    }

                    &::-webkit-scrollbar-thumb {
                        background-color: $textColor_tint;
                    }

                    @media (min-width: $md) {
                        &::-webkit-scrollbar {
                            height: 12px;
                        }
                    }

                    table {
                        // table-layout: fixed;
                        box-sizing: border-box;
                        width: 100%;
                        max-width: 1136px;

                        tr {
                            td {
                                border-right: 3px solid $textColor_tint;
                                padding: $sp1;

                                @media (min-width: $md) {
                                    padding: $sp2 $sp1;
                                }

                                span {
                                    @include sm_h5;
                                    white-space: nowrap;
                                    line-height: 150%;

                                    @media (min-width: $md) {
                                        @include xl_h5;
                                    }
                                }

                                img {
                                    display: block;
                                    margin: auto;
                                    width: 76px;
                                }
                            }

                            td:last-child {
                                border-right: none;
                            }
                        }

                        tr:nth-child(1) {
                            border-bottom: 3px solid $textColor_tint;

                            td {
                                text-align: center;
                            }

                        }
                    }
                }
            }

            .oott_container {
                padding-top: $sp5;

                h3 {
                    @include sm_h3;
                    padding-bottom: $sp3;

                    @media (min-width: $md) {
                        @include xl_h3;
                    }
                }

                .oott_card_wrap {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    gap: $sp2;

                    @media (min-width: 1024px) {
                        flex-direction: row;
                        justify-content: center;
                        gap: $sp3;
                        padding-bottom: $sp1;
                    }
                }
            }

            .ticket_container {
                padding-top: $sp5;

                h3 {
                    @include sm_h3;
                    padding-bottom: $sp3;

                    @media (min-width: $md) {
                        @include xl_h3;
                    }
                }

                .ticket_box {
                    display: none;

                    @media (min-width: 900px) {
                        width: 100%;
                        display: flex;
                        position: relative;
                        background-size: contain;
                        background-repeat: no-repeat;
                        background-image: url(~@/assets/img/layout/ticketHorizontal.png);
                        background-size: 100%;
                        gap: $sp5;
                    }

                    @media (min-width: 1024px) {
                        gap: $sp9;
                    }

                    .ticket_pic {
                        width: 45%;
                        aspect-ratio: calc(511/360);
                        background-image: url(~@/assets/img/layout/plan_result_ticket.png);
                        background-size: 100%;
                        background-repeat: no-repeat;
                        margin-left: $sp6;
                        flex-shrink: 0;

                        @media (min-width: 1024px) {
                            margin-left: $sp8;
                        }
                    }

                    .ticket_desc {
                        width: 100%;
                        padding: $sp3 $sp5 $sp3 0;
                        display: flex;
                        flex-direction: column;
                        justify-content: space-between;

                        @media (min-width: 1024px) {
                            padding: $sp5 $sp8 $sp3 0;
                        }

                        .ticket_content {
                            h4 {
                                font-size: 24px;
                                font-weight: 900;
                                color: $textColor_white;
                                padding-bottom: $sp2;

                                @media (min-width: $md) {
                                    font-size: 32px;
                                }
                            }

                            span {
                                font-size: 14px;
                                font-weight: 400;
                                color: $tint_blue;

                                @media (min-width: $md) {
                                    font-size: 16px;
                                }
                            }

                            span:nth-child(3) {
                                font-weight: 100;
                            }

                            p {
                                display: none;

                                @media (min-width: 1240px) {
                                    display: block;
                                    @include xl_p;
                                    color: $textColor_white;
                                    line-height: 150%;
                                    text-align: justify;
                                    padding-top: $sp2;
                                }
                            }
                        }

                        .ticket_price {
                            width: 100%;
                            display: flex;
                            flex-direction: column;
                            gap: $sp2;

                            @media (min-width: 1024px) {
                                flex-direction: row;
                                justify-content: space-between;
                                align-items: flex-end;
                                gap: 0;
                            }

                            .price_box {
                                display: flex;
                                flex-direction: column;
                                gap: $sp1;

                                @media (min-width: $xl) {
                                    flex-direction: row;
                                    align-items: center;
                                    gap: $sp2;
                                }

                                span:nth-child(1) {
                                    font-size: 16px;
                                    font-weight: 700;
                                    color: $tint_blue;
                                    text-decoration: line-through;
                                }

                                span:nth-child(2) {
                                    font-size: 36px;
                                    font-weight: 900;
                                    color: #E8F66A;
                                }
                            }

                            .ticket_link {
                                a {
                                    color: $textColor_white;
                                    text-decoration: underline;
                                    font-size: 20px;
                                    font-weight: 500;
                                }

                            }
                        }
                    }

                    .sale_tag {
                        width: 80px;
                        height: 80px;
                        border-radius: 80px;
                        background-color: #F15C3E;
                        text-align: center;
                        position: absolute;
                        top: -24px;
                        right: -8px;
                        transform: rotate(15deg);

                        span {
                            font-size: 24px;
                            font-weight: 900;
                            color: $textColor_white;
                            line-height: 80px;
                        }
                    }
                }

                .ticket_card {
                    display: flex;
                    justify-content: center;

                    @media (min-width: 900px) {
                        display: none;
                    }
                }
            }
        }
    }

    .result_bottom {
        background-color: $bgColor_default;
        padding-top: $sp10;
        margin-top: -90px;
        overflow: hidden;

        @media (min-width: $md) {
            padding-top: $sp15;
            margin-top: -90px;
        }

        .result_trip {
            display: flex;
            flex-direction: column;
            gap: $sp2;

            @media (min-width: $xl) {
                flex-direction: row;
                gap: $sp4;
            }
        }

        a {
            button {
                margin: $sp5 0 $sp15 0;
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

    @keyframes fadeInDownLittle {
        0% {
            opacity: 0;
            transform: translate(0, -20%);
        }

        100% {
            opacity: 1;
            transform: translate(0, 0);
        }
    }

    // .result_content{
    //     .content_desc:nth-child(3),
    //     .content_desc:nth-child(4){
    //         .place_desc{
    //             display: none !important;
    //             @media (min-width: $md){
    //                 display: flex !important;
    //             }
    //         }
    //     }
    // }
}
</style>