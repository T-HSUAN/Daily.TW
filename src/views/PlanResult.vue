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
            <div class="result_subtitle" v-show="showResultContent">
                <h2>你的一日專屬旅著</h2>
                <div class="title_footprint"></div>
            </div>
            <div class="content_desc" v-show="showResultContent">
                <div class="plan_container">
                    <div class="plan_title">
                        <h3>{{selectValue[0]}}一日遊</h3>
                        <div class="place_tags">
                            <span v-for="(place, placeIndex) in limitedFilteredPlaces[selectValue[0]]"
                            :key="placeIndex">
                                # {{place.place_name}}
                            </span>
                        </div>
                        <label>
                            <input type="checkbox">
                            <span></span>
                        </label>
                    </div>
                    <div class="plan_place" v-if="limitedFilteredPlaces[selectValue[0]] && limitedFilteredPlaces[selectValue[0]].length > 0">
                        <div class="pic_swiper">
                            <Carousel :autoplay="3000" :wrap-around="true">
                                <Slide v-for="(item, index) in resultPicMapping[selectValue[0]][0].images" :key="index">
                                    <img :src="item.src" alt="">
                                </Slide>
                                <template #addons>
                                    <Pagination />
                                </template>
                            </Carousel>
                        </div>
                        <div class="place_desc">
                            <div class="place_content">
                                <h4>{{ limitedFilteredPlaces[selectValue[0]][0].place_name }}</h4>
                                <p>{{ limitedFilteredPlaces[selectValue[0]][0].place_desc }}</p>
                            </div>
                            <div class="place_time_address">
                                <div class="time">
                                    <img src="~@/assets/img/layout/plan_result_time.png" alt="">
                                    <span>停留 {{ limitedFilteredPlaces[selectValue[0]][0].place_stay }} 小時</span>
                                </div>
                                <div class="address">
                                    <img src="~@/assets/img/layout/plan_result_location.png" alt="">
                                    <a :href="limitedFilteredPlaces[selectValue[0]][0].place_link">{{ limitedFilteredPlaces[selectValue[0]][0].place_addr }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="show_result_btn" v-if="!showPlan1">
                        <div class="btn" @click="showPlan1 = true; showPlan2 = false; showPlan3 = false;">
                            <span>
                                展開行程
                                <font-awesome-icon icon="fa-solid fa-chevron-down" />
                            </span>
                        </div>
                    </div>
                    <div class="show_result_wrap" v-if="showPlan1">
                        <div class="plan_place">
                            <div class="pic_swiper">
                                <Carousel :autoplay="3000" :wrap-around="true">
                                    <Slide v-for="(item, index) in resultPicMapping[selectValue[0]][1].images" :key="index">
                                        <img :src="item.src" alt="">
                                    </Slide>
                                    <template #addons>
                                        <Pagination />
                                    </template>
                                </Carousel>
                            </div>
                            <div class="place_desc">
                                <div class="place_content">
                                    <h4>{{ limitedFilteredPlaces[selectValue[0]][1].place_name }}</h4>
                                    <p>{{ limitedFilteredPlaces[selectValue[0]][1].place_desc }}</p>
                                </div>
                                <div class="place_time_address">
                                    <div class="time">
                                        <img src="~@/assets/img/layout/plan_result_time.png" alt="">
                                        <span>停留 {{ limitedFilteredPlaces[selectValue[0]][1].place_stay }} 小時</span>
                                    </div>
                                    <div class="address">
                                        <img src="~@/assets/img/layout/plan_result_location.png" alt="">
                                        <a :href="limitedFilteredPlaces[selectValue[0]][1].place_link">{{ limitedFilteredPlaces[selectValue[0]][1].place_addr }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="plan_place">
                            <div class="pic_swiper">
                                <Carousel :autoplay="3000" :wrap-around="true">
                                    <Slide v-for="(item, index) in resultPicMapping[selectValue[0]][2].images" :key="index">
                                        <img :src="item.src" alt="">
                                    </Slide>
                                    <template #addons>
                                        <Pagination />
                                    </template>
                                </Carousel>
                            </div>
                            <div class="place_desc">
                                <div class="place_content">
                                    <h4>{{ limitedFilteredPlaces[selectValue[0]][2].place_name }}</h4>
                                    <p>{{ limitedFilteredPlaces[selectValue[0]][2].place_desc }}</p>
                                </div>
                                <div class="place_time_address">
                                    <div class="time">
                                        <img src="~@/assets/img/layout/plan_result_time.png" alt="">
                                        <span>停留 {{ limitedFilteredPlaces[selectValue[0]][2].place_stay }} 小時</span>
                                    </div>
                                    <div class="address">
                                        <img src="~@/assets/img/layout/plan_result_location.png" alt="">
                                        <a :href="limitedFilteredPlaces[selectValue[0]][2].place_link">{{ limitedFilteredPlaces[selectValue[0]][2].place_addr }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="plan_place">
                            <div class="pic_swiper">
                                <Carousel :autoplay="3000" :wrap-around="true">
                                    <Slide v-for="(item, index) in resultPicMapping[selectValue[0]][3].images" :key="index">
                                        <img :src="item.src" alt="">
                                    </Slide>
                                    <template #addons>
                                        <Pagination />
                                    </template>
                                </Carousel>
                            </div>
                            <div class="place_desc">
                                <div class="place_content">
                                    <h4>{{ limitedFilteredPlaces[selectValue[0]][3].place_name }}</h4>
                                    <p>{{ limitedFilteredPlaces[selectValue[0]][3].place_desc }}</p>
                                </div>
                                <div class="place_time_address">
                                    <div class="time">
                                        <img src="~@/assets/img/layout/plan_result_time.png" alt="">
                                        <span>停留 {{ limitedFilteredPlaces[selectValue[0]][3].place_stay }} 小時</span>
                                    </div>
                                    <div class="address">
                                        <img src="~@/assets/img/layout/plan_result_location.png" alt="">
                                        <a :href="limitedFilteredPlaces[selectValue[0]][3].place_link">{{ limitedFilteredPlaces[selectValue[0]][3].place_addr }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="plan_place">
                            <div class="pic_swiper">
                                <Carousel :autoplay="3000" :wrap-around="true">
                                    <Slide v-for="(item, index) in resultPicMapping[selectValue[0]][4].images" :key="index">
                                        <img :src="item.src" alt="">
                                    </Slide>
                                    <template #addons>
                                        <Pagination />
                                    </template>
                                </Carousel>
                            </div>
                            <div class="place_desc">
                                <div class="place_content">
                                    <h4>{{ limitedFilteredPlaces[selectValue[0]][4].place_name }}</h4>
                                    <p>{{ limitedFilteredPlaces[selectValue[0]][4].place_desc }}</p>
                                </div>
                                <div class="place_time_address">
                                    <div class="time">
                                        <img src="~@/assets/img/layout/plan_result_time.png" alt="">
                                        <span>停留 {{ limitedFilteredPlaces[selectValue[0]][4].place_stay }} 小時</span>
                                    </div>
                                    <div class="address">
                                        <img src="~@/assets/img/layout/plan_result_location.png" alt="">
                                        <a :href="limitedFilteredPlaces[selectValue[0]][4].place_link">{{ limitedFilteredPlaces[selectValue[0]][4].place_addr }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="btn_bookmark">
                            <label>
                                <input type="checkbox" class="tag" />
                                <span>
                                    <font-awesome-icon icon="fa-regular fa-bookmark" class="bookmark" />
                                    加入收藏
                                </span>
                            </label>
                        </div> -->
                    </div>
                </div>
                <div class="weather_container" v-if="showPlan1">
                    <h3>一週天氣預報 | {{selectValue[0]}}</h3>
                    <div class="table_wrap">
                        <table v-if="weather.weatherData">
                            <tr>
                                <td v-for=" (itemValue, itemIndex) in weather.weatherData[selectValue[0]]" :key="itemIndex">
                                    <span>
                                        {{ formatDate(itemValue.date) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td v-for=" (itemValue, itemIndex) in weather.weatherData[selectValue[0]]" :key="itemIndex">
                                    <img :src="itemValue.day.condition.icon" alt="">
                                    <span>最高 {{ Math.round(itemValue.day.maxtemp_c) }}℃</span><br>
                                    <span>最低 {{ Math.round(itemValue.day.mintemp_c) }}℃</span><br>
                                    <span>降雨機率 {{ itemValue.day.daily_chance_of_rain }}%</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="oott_container" v-if="showPlan1">
                    <h3>出遊穿搭推薦</h3>
                    <div class="oott_card_wrap">
                        <OottCard class="oott_card" v-for="(oott, index) in randomPickedOottData[0]" :key="index" 
                                :oottCardId="oott.oott_id"
                                :oottPhoto="getOottImg(oott.oott_img)"
                                :oottCardTags="oott.concatenated_style_name"
                                :oottCardDate="oott.oott_date_new"
                                :oottAuthorPhoto="getMemImg(oott.mem_img)"
                                :oottCardAuthor="oott.mem_nickname">
                        </OottCard>
                    </div>
                </div>
                <div class="ticket_container" v-if="showPlan1">
                    <h3>相關景點票券</h3>
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
                                        <!-- <span>NT$ 200</span> -->
                                        <span>NT$ 200</span>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="sale_tag">
                                <span>75折</span>
                            </div>  -->
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
            <div class="content_desc show_plan_2" v-if="showResultContent2">
                <div class="plan_container">
                    <div class="plan_title">
                        <h3>{{selectValue[1]}}一日遊</h3>
                        <div class="place_tags">
                            <span v-for="(place, placeIndex) in limitedFilteredPlaces[selectValue[1]]"
                            :key="placeIndex">
                                # {{place.place_name}}
                            </span>
                        </div>
                        <label>
                            <input type="checkbox">
                            <span></span>
                        </label>
                    </div>
                    <div class="plan_place" v-if="limitedFilteredPlaces[selectValue[1]] && limitedFilteredPlaces[selectValue[1]].length > 0">
                        <div class="pic_swiper">
                            <Carousel :autoplay="3000" :wrap-around="true">
                                <Slide v-for="(item, index) in resultPicMapping[selectValue[1]][0].images" :key="index">
                                    <img :src="item.src" alt="">
                                </Slide>
                                <template #addons>
                                    <Pagination />
                                </template>
                            </Carousel>
                        </div>
                        <div class="place_desc">
                            <div class="place_content">
                                <h4>{{ limitedFilteredPlaces[selectValue[1]][0].place_name }}</h4>
                                <p>{{ limitedFilteredPlaces[selectValue[1]][0].place_desc }}</p>
                            </div>
                            <div class="place_time_address">
                                <div class="time">
                                    <img src="~@/assets/img/layout/plan_result_time.png" alt="">
                                    <span>停留 {{ limitedFilteredPlaces[selectValue[1]][0].place_stay }} 小時</span>
                                </div>
                                <div class="address">
                                    <img src="~@/assets/img/layout/plan_result_location.png" alt="">
                                    <a :href="limitedFilteredPlaces[selectValue[1]][0].place_link">{{ limitedFilteredPlaces[selectValue[1]][0].place_addr }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="show_result_btn" v-if="!showPlan2">
                        <div class="btn" @click="showPlan2 = true; showPlan1 = false; showPlan3 = false; scrollToTop()">
                            <span>
                                展開行程
                                <font-awesome-icon icon="fa-solid fa-chevron-down" />
                            </span>
                        </div>
                    </div>
                    <div class="show_result_wrap" v-if="showPlan2">
                        <div class="plan_place">
                            <div class="pic_swiper">
                                <Carousel :autoplay="3000" :wrap-around="true">
                                    <Slide v-for="(item, index) in resultPicMapping[selectValue[1]][1].images" :key="index">
                                        <img :src="item.src" alt="">
                                    </Slide>
                                    <template #addons>
                                        <Pagination />
                                    </template>
                                </Carousel>
                            </div>
                            <div class="place_desc">
                                <div class="place_content">
                                    <h4>{{ limitedFilteredPlaces[selectValue[1]][1].place_name }}</h4>
                                    <p>{{ limitedFilteredPlaces[selectValue[1]][1].place_desc }}</p>
                                </div>
                                <div class="place_time_address">
                                    <div class="time">
                                        <img src="~@/assets/img/layout/plan_result_time.png" alt="">
                                        <span>停留 {{ limitedFilteredPlaces[selectValue[1]][1].place_stay }} 小時</span>
                                    </div>
                                    <div class="address">
                                        <img src="~@/assets/img/layout/plan_result_location.png" alt="">
                                        <a :href="limitedFilteredPlaces[selectValue[1]][1].place_link">{{ limitedFilteredPlaces[selectValue[1]][1].place_addr }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="plan_place">
                            <div class="pic_swiper">
                                <Carousel :autoplay="3000" :wrap-around="true">
                                    <Slide v-for="(item, index) in resultPicMapping[selectValue[1]][2].images" :key="index">
                                        <img :src="item.src" alt="">
                                    </Slide>
                                    <template #addons>
                                        <Pagination />
                                    </template>
                                </Carousel>
                            </div>
                            <div class="place_desc">
                                <div class="place_content">
                                    <h4>{{ limitedFilteredPlaces[selectValue[1]][2].place_name }}</h4>
                                    <p>{{ limitedFilteredPlaces[selectValue[1]][2].place_desc }}</p>
                                </div>
                                <div class="place_time_address">
                                    <div class="time">
                                        <img src="~@/assets/img/layout/plan_result_time.png" alt="">
                                        <span>停留 {{ limitedFilteredPlaces[selectValue[1]][2].place_stay }} 小時</span>
                                    </div>
                                    <div class="address">
                                        <img src="~@/assets/img/layout/plan_result_location.png" alt="">
                                        <a :href="limitedFilteredPlaces[selectValue[1]][2].place_link">{{ limitedFilteredPlaces[selectValue[1]][2].place_addr }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="plan_place">
                            <div class="pic_swiper">
                                <Carousel :autoplay="3000" :wrap-around="true">
                                    <Slide v-for="(item, index) in resultPicMapping[selectValue[1]][3].images" :key="index">
                                        <img :src="item.src" alt="">
                                    </Slide>
                                    <template #addons>
                                        <Pagination />
                                    </template>
                                </Carousel>
                            </div>
                            <div class="place_desc">
                                <div class="place_content">
                                    <h4>{{ limitedFilteredPlaces[selectValue[1]][3].place_name }}</h4>
                                    <p>{{ limitedFilteredPlaces[selectValue[1]][3].place_desc }}</p>
                                </div>
                                <div class="place_time_address">
                                    <div class="time">
                                        <img src="~@/assets/img/layout/plan_result_time.png" alt="">
                                        <span>停留 {{ limitedFilteredPlaces[selectValue[1]][3].place_stay }} 小時</span>
                                    </div>
                                    <div class="address">
                                        <img src="~@/assets/img/layout/plan_result_location.png" alt="">
                                        <a :href="limitedFilteredPlaces[selectValue[1]][3].place_link">{{ limitedFilteredPlaces[selectValue[1]][3].place_addr }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="plan_place">
                            <div class="pic_swiper">
                                <Carousel :autoplay="3000" :wrap-around="true">
                                    <Slide v-for="(item, index) in resultPicMapping[selectValue[1]][4].images" :key="index">
                                        <img :src="item.src" alt="">
                                    </Slide>
                                    <template #addons>
                                        <Pagination />
                                    </template>
                                </Carousel>
                            </div>
                            <div class="place_desc">
                                <div class="place_content">
                                    <h4>{{ limitedFilteredPlaces[selectValue[1]][4].place_name }}</h4>
                                    <p>{{ limitedFilteredPlaces[selectValue[1]][4].place_desc }}</p>
                                </div>
                                <div class="place_time_address">
                                    <div class="time">
                                        <img src="~@/assets/img/layout/plan_result_time.png" alt="">
                                        <span>停留 {{ limitedFilteredPlaces[selectValue[1]][4].place_stay }} 小時</span>
                                    </div>
                                    <div class="address">
                                        <img src="~@/assets/img/layout/plan_result_location.png" alt="">
                                        <a :href="limitedFilteredPlaces[selectValue[1]][4].place_link">{{ limitedFilteredPlaces[selectValue[1]][4].place_addr }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="btn_bookmark">
                            <label>
                                <input type="checkbox" class="tag" />
                                <span>
                                    <font-awesome-icon icon="fa-regular fa-bookmark" class="bookmark" />
                                    加入收藏
                                </span>
                            </label>
                        </div> -->
                    </div>
                </div>
                <div class="weather_container" v-if="showPlan2">
                    <h3>一週天氣預報 | {{selectValue[1]}}</h3>
                    <div class="table_wrap">
                        <table v-if="weather.weatherData">
                            <tr>
                                <td v-for=" (itemValue, itemIndex) in weather.weatherData[selectValue[1]]" :key="itemIndex">
                                    <span>
                                        {{ formatDate(itemValue.date) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td v-for=" (itemValue, itemIndex) in weather.weatherData[selectValue[1]]" :key="itemIndex">
                                    <img :src="itemValue.day.condition.icon" alt="">
                                    <span>最高 {{ Math.round(itemValue.day.maxtemp_c) }}℃</span><br>
                                    <span>最低 {{ Math.round(itemValue.day.mintemp_c) }}℃</span><br>
                                    <span>降雨機率 {{ itemValue.day.daily_chance_of_rain }}%</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="oott_container" v-if="showPlan2">
                    <h3>出遊穿搭推薦</h3>
                    <div class="oott_card_wrap">
                        <OottCard class="oott_card" v-for="(oott, index) in randomPickedOottData[1]" :key="index" 
                                :oottCardId="oott.oott_id"
                                :oottPhoto="getOottImg(oott.oott_img)"
                                :oottCardTags="oott.concatenated_style_name"
                                :oottCardDate="oott.oott_date_new"
                                :oottAuthorPhoto="getMemImg(oott.mem_img)"
                                :oottCardAuthor="oott.mem_nickname">
                        </OottCard>
                    </div>
                </div>
                <div class="ticket_container" v-if="showPlan2">
                    <h3>相關景點票券</h3>
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
                                        <!-- <span>NT$ 200</span> -->
                                        <span>NT$ 200</span>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="sale_tag">
                                <span>75折</span>
                            </div>  -->
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
            <div class="content_desc show_plan_3" v-if="showResultContent3">
                <div class="plan_container">
                    <div class="plan_title">
                        <h3>{{selectValue[2]}}一日遊</h3>
                        <div class="place_tags">
                            <span v-for="(place, placeIndex) in limitedFilteredPlaces[selectValue[2]]"
                            :key="placeIndex">
                                # {{place.place_name}}
                            </span>
                        </div>
                        <label>
                            <input type="checkbox">
                            <span></span>
                        </label>
                    </div>
                    <div class="plan_place" v-if="limitedFilteredPlaces[selectValue[2]] && limitedFilteredPlaces[selectValue[2]].length > 0">
                        <div class="pic_swiper">
                            <Carousel :autoplay="3000" :wrap-around="true">
                                <Slide v-for="(item, index) in resultPicMapping[selectValue[2]][0].images" :key="index">
                                    <img :src="item.src" alt="">
                                </Slide>
                                <template #addons>
                                    <Pagination />
                                </template>
                            </Carousel>
                        </div>
                        <div class="place_desc">
                            <div class="place_content">
                                <h4>{{ limitedFilteredPlaces[selectValue[2]][0].place_name }}</h4>
                                <p>{{ limitedFilteredPlaces[selectValue[2]][0].place_desc }}</p>
                            </div>
                            <div class="place_time_address">
                                <div class="time">
                                    <img src="~@/assets/img/layout/plan_result_time.png" alt="">
                                    <span>停留 {{ limitedFilteredPlaces[selectValue[2]][0].place_stay }} 小時</span>
                                </div>
                                <div class="address">
                                    <img src="~@/assets/img/layout/plan_result_location.png" alt="">
                                    <a :href="limitedFilteredPlaces[selectValue[2]][0].place_link">{{ limitedFilteredPlaces[selectValue[2]][0].place_addr }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="show_result_btn" v-if="!showPlan3">
                        <div class="btn" @click="showPlan3 = true; showPlan1 = false; showPlan2 = false; scrollToTop()">
                            <span>
                                展開行程
                                <font-awesome-icon icon="fa-solid fa-chevron-down" />
                            </span>
                        </div>
                    </div>
                    <div class="show_result_wrap" v-if="showPlan3">
                        <div class="plan_place">
                            <div class="pic_swiper">
                                <Carousel :autoplay="3000" :wrap-around="true">
                                    <Slide v-for="(item, index) in resultPicMapping[selectValue[2]][1].images" :key="index">
                                        <img :src="item.src" alt="">
                                    </Slide>
                                    <template #addons>
                                        <Pagination />
                                    </template>
                                </Carousel>
                            </div>
                            <div class="place_desc">
                                <div class="place_content">
                                    <h4>{{ limitedFilteredPlaces[selectValue[2]][1].place_name }}</h4>
                                    <p>{{ limitedFilteredPlaces[selectValue[2]][1].place_desc }}</p>
                                </div>
                                <div class="place_time_address">
                                    <div class="time">
                                        <img src="~@/assets/img/layout/plan_result_time.png" alt="">
                                        <span>停留 {{ limitedFilteredPlaces[selectValue[2]][1].place_stay }} 小時</span>
                                    </div>
                                    <div class="address">
                                        <img src="~@/assets/img/layout/plan_result_location.png" alt="">
                                        <a :href="limitedFilteredPlaces[selectValue[2]][1].place_link">{{ limitedFilteredPlaces[selectValue[2]][1].place_addr }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="plan_place">
                            <div class="pic_swiper">
                                <Carousel :autoplay="3000" :wrap-around="true">
                                    <Slide v-for="(item, index) in resultPicMapping[selectValue[2]][2].images" :key="index">
                                        <img :src="item.src" alt="">
                                    </Slide>
                                    <template #addons>
                                        <Pagination />
                                    </template>
                                </Carousel>
                            </div>
                            <div class="place_desc">
                                <div class="place_content">
                                    <h4>{{ limitedFilteredPlaces[selectValue[2]][2].place_name }}</h4>
                                    <p>{{ limitedFilteredPlaces[selectValue[2]][2].place_desc }}</p>
                                </div>
                                <div class="place_time_address">
                                    <div class="time">
                                        <img src="~@/assets/img/layout/plan_result_time.png" alt="">
                                        <span>停留 {{ limitedFilteredPlaces[selectValue[2]][2].place_stay }} 小時</span>
                                    </div>
                                    <div class="address">
                                        <img src="~@/assets/img/layout/plan_result_location.png" alt="">
                                        <a :href="limitedFilteredPlaces[selectValue[2]][2].place_link">{{ limitedFilteredPlaces[selectValue[2]][2].place_addr }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="plan_place">
                            <div class="pic_swiper">
                                <Carousel :autoplay="3000" :wrap-around="true">
                                    <Slide v-for="(item, index) in resultPicMapping[selectValue[2]][3].images" :key="index">
                                        <img :src="item.src" alt="">
                                    </Slide>
                                    <template #addons>
                                        <Pagination />
                                    </template>
                                </Carousel>
                            </div>
                            <div class="place_desc">
                                <div class="place_content">
                                    <h4>{{ limitedFilteredPlaces[selectValue[2]][3].place_name }}</h4>
                                    <p>{{ limitedFilteredPlaces[selectValue[2]][3].place_desc }}</p>
                                </div>
                                <div class="place_time_address">
                                    <div class="time">
                                        <img src="~@/assets/img/layout/plan_result_time.png" alt="">
                                        <span>停留 {{ limitedFilteredPlaces[selectValue[2]][3].place_stay }} 小時</span>
                                    </div>
                                    <div class="address">
                                        <img src="~@/assets/img/layout/plan_result_location.png" alt="">
                                        <a :href="limitedFilteredPlaces[selectValue[2]][3].place_link">{{ limitedFilteredPlaces[selectValue[2]][3].place_addr }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="plan_place">
                            <div class="pic_swiper">
                                <Carousel :autoplay="3000" :wrap-around="true">
                                    <Slide v-for="(item, index) in resultPicMapping[selectValue[2]][4].images" :key="index">
                                        <img :src="item.src" alt="">
                                    </Slide>
                                    <template #addons>
                                        <Pagination />
                                    </template>
                                </Carousel>
                            </div>
                            <div class="place_desc">
                                <div class="place_content">
                                    <h4>{{ limitedFilteredPlaces[selectValue[2]][4].place_name }}</h4>
                                    <p>{{ limitedFilteredPlaces[selectValue[2]][4].place_desc }}</p>
                                </div>
                                <div class="place_time_address">
                                    <div class="time">
                                        <img src="~@/assets/img/layout/plan_result_time.png" alt="">
                                        <span>停留 {{ limitedFilteredPlaces[selectValue[2]][4].place_stay }} 小時</span>
                                    </div>
                                    <div class="address">
                                        <img src="~@/assets/img/layout/plan_result_location.png" alt="">
                                        <a :href="limitedFilteredPlaces[selectValue[2]][4].place_link">{{ limitedFilteredPlaces[selectValue[2]][4].place_addr }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="btn_bookmark">
                            <label>
                                <input type="checkbox" class="tag" />
                                <span>
                                    <font-awesome-icon icon="fa-regular fa-bookmark" class="bookmark" />
                                    加入收藏
                                </span>
                            </label>
                        </div> -->
                    </div>
                </div>
                <div class="weather_container" v-if="showPlan3">
                    <h3>一週天氣預報 | {{selectValue[2]}}</h3>
                    <div class="table_wrap">
                        <table v-if="weather.weatherData">
                            <tr>
                                <td v-for=" (itemValue, itemIndex) in weather.weatherData[selectValue[2]]" :key="itemIndex">
                                    <span>
                                        {{ formatDate(itemValue.date) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td v-for=" (itemValue, itemIndex) in weather.weatherData[selectValue[2]]" :key="itemIndex">
                                    <img :src="itemValue.day.condition.icon" alt="">
                                    <span>最高 {{ Math.round(itemValue.day.maxtemp_c) }}℃</span><br>
                                    <span>最低 {{ Math.round(itemValue.day.mintemp_c) }}℃</span><br>
                                    <span>降雨機率 {{ itemValue.day.daily_chance_of_rain }}%</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="oott_container" v-if="showPlan3">
                    <h3>出遊穿搭推薦</h3>
                    <div class="oott_card_wrap">
                        <OottCard class="oott_card" v-for="(oott, index) in randomPickedOottData[2]" :key="index" 
                                :oottCardId="oott.oott_id"
                                :oottPhoto="getOottImg(oott.oott_img)"
                                :oottCardTags="oott.concatenated_style_name"
                                :oottCardDate="oott.oott_date_new"
                                :oottAuthorPhoto="getMemImg(oott.mem_img)"
                                :oottCardAuthor="oott.mem_nickname">
                        </OottCard>
                    </div>
                </div>
                <div class="ticket_container" v-if="showPlan3">
                    <h3>相關景點票券</h3>
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
                                        <!-- <span>NT$ 200</span> -->
                                        <span>NT$ 200</span>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="sale_tag">
                                <span>75折</span>
                            </div>  -->
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
        </div>
        <div class="result_content_wave" v-show="showResultContent"></div>
        <div class="result_content result_bottom" v-show="showResultContent">
            <div class="result_subtitle">
                <h2>駐站旅人帶你玩</h2>
                <div class="title_footprint"></div>
            </div>
            <div class="result_trip">
                <TripCard v-for="(trip, index) in trips" :key="index" 
                    :tripCardId="trip.tripCardId"
                    :tripCardPhoto="trip.tripCardPhoto"
                    :tripCardTags="trip.tripCardTags" 
                    :tripCardTitle="trip.tripCardTitle"
                    :tripCardAuthor="trip.tripCardAuthor" 
                    :tripCardDate="trip.tripCardDate">
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
import { GET } from '@/plugin/axios';
import  axios  from "axios";

import 'vue3-carousel/dist/carousel.css'

import OottCard from "@/components/OottCard.vue";
import TicketSingleCard from "@/components/TicketSingleCard.vue";
import Ticket from "@/components/TicketVertical.vue";
import TripCard from "@/components/TripCard.vue";

export default defineComponent({
    name: 'Autoplay',
    components: {
        Carousel,
        Slide,
        Pagination,
        OottCard,
        TicketSingleCard,
        Ticket,
        TripCard,
    },
    computed: {
        // 以地區數顯示行程數
        showPlanCount() {
            const selectValue = this.$route.query.selectValue || [];
            return selectValue.length;
        },
        // 篩選各地區的景點資料
        filteredPlaces() {
            const filteredData = {};

            for (const regionName of this.selectValue) {
                const regionFilteredData = this.placeData.filter(place => {
                    return place.region_name === regionName;
                });

                filteredData[regionName] = regionFilteredData.map(place => ({ ...place }));
            }

            return filteredData;
        },
        limitedFilteredPlaces() {
            const limitPerRegion = 5;

            const limitedPlaces = {};
            for (const regionName in this.filteredPlaces) {
                limitedPlaces[regionName] = this.filteredPlaces[regionName].slice(0, limitPerRegion);
            }

            return limitedPlaces;
        },
        randomPickedOottData() {
            const subarraySize = 3;
            const oottDataCopy = [...this.oottData]; // Create a copy of the oottData array
            let randomPickedData = [];
            if (this.checkedSexTag.length === 1 && this.checkedSexTag[0] === "") {
                // If checkedSexTag is empty, shuffle all oottData
                randomPickedData = this.shuffleArray(oottDataCopy);
            } else {
                const filteredOottData = oottDataCopy.filter(oott => this.checkedSexTag.includes(oott.mem_sex));
                randomPickedData = this.shuffleArray(filteredOottData);
            }
            const result = [];

            for (let i = 0; i < subarraySize; i++) {
                const subarray = randomPickedData.slice(i * subarraySize, (i + 1) * subarraySize);
                result.push(subarray);
            }
            return result;
        },
    },
    data() {
        return {
            showResultContent: false,
            showResultContent2: false,
            showResultContent3: false,
            showPlan1: false,
            showPlan2: false,
            showPlan3: false,
            resultPicMapping: {},
            weather: {
                loading: false,
                weatherData: {},
                location: 'Taichung',
                lang:'zh_tw',
                token:'713d2a4d5d6d47dca9a15517232207',
            },
            regionWeatherData: {},
            tickets: [
                {
                    ticketPhoto: require("@/assets/img/layout/plan_result_ticket.png"),
                    ticketTitle: "紙箱王創意園區門票",
                    ticketTags: "台中・#親子 #小資 #藝文",
                    originalPrice: "",
                    FinalPrice: "200",
                },
            ],
            trips: [
                {
                    tripCardId: 7,
                    tripCardPhoto: require("@/assets/img/layout/plan_result_place_3-1.png"),
                    tripCardTags: "台中・#情侶 #風景 #藝文",
                    tripCardTitle: "台中文青一日遊",
                    tripCardAuthor: "小編C",
                    tripCardDate: "2023 / 8 / 6",
                },
                {
                    ripCardId: 3,
                    tripCardPhoto: require("@/assets/img/layout/plan_result_place_8.png"),
                    tripCardTags: "新北・#情侶 #小資 #風景",
                    tripCardTitle: "新北藝術一日遊",
                    tripCardAuthor: "小編B",
                    tripCardDate: "2023 / 8 / 6",
                },
                {
                    ripCardId: 2,
                    tripCardPhoto: require("@/assets/img/layout/plan_result_place_9.png"),
                    tripCardTags: "宜蘭・#情侶 #風景 #藝文",
                    tripCardTitle: "宜蘭芬多精一日遊",
                    tripCardAuthor: "小編C",
                    tripCardDate: "2023 / 8 / 4",
                },
            ],
            selectValue: [],
            checkedPlaceTags: [],
            checkedSexTag: [],
            placeData: [],
            oottData: [],
        }
    },
    // created(){
    //     this.fetchWeather();
    // },
    methods: {
        fetchWeather(region) {
            this.weather.location = this.placeData.find(place => place.region_name === region)?.region_weather || 'Taichung';

            fetch(`https://api.weatherapi.com/v1/forecast.json?q=${this.weather.location}&days=7&hour=9&lang=zh_tw&key=713d2a4d5d6d47dca9a15517232207`)
            .then(res=> {
                return res.json()
            })
            .then(json=> {
                // this.weatherData = json.forecast.forecastday
                // this.loading = false
                // console.log(this.weatherData)
                this.weather.weatherData[region] = json.forecast.forecastday; // Store weather data for the region
                this.weather.loading = false;
                console.log(this.weather.weatherData);
            })
        },
        extractRegionWeather() {
            const regionWeatherPromises = this.selectValue.map(region => this.fetchWeather(region));

            Promise.all(regionWeatherPromises)
                .then(() => {
                    console.log('All weather data fetched.');
                })
                .catch(error => {
                    console.error('Error fetching weather data:', error);
                });
        },
        // fetchWeather(){
        //     this.loading = true
        //     fetch(`https://api.weatherapi.com/v1/forecast.json?q=${this.weather.location}&days=7&hour=9&lang=zh_tw&key=713d2a4d5d6d47dca9a15517232207`)
        //     .then(res=> {
        //         return res.json()
        //     })
        //     .then(json=> {
        //         this.weatherData = json.forecast.forecastday
        //         this.loading = false
        //         console.log(this.weatherData)
        //     })
        // },
        formatDate(date) {
            return date.split("-").slice(1).join("/");
        },
        // 往下滾動後行程 fadeIn 顯示，且往回滾動不會消失
        checkScroll() {
            const resultBanner = document.querySelector('.result_banner');
            if (resultBanner) {
                const scrollPosition = window.scrollY;
                const resultBannerHeight = resultBanner.clientHeight;
                if (window.innerWidth >= 1024){
                    if (scrollPosition >= resultBannerHeight / 2) {
                        this.showResultContent = true;
                        window.removeEventListener('scroll', this.checkScroll);
                    }
                }else{
                    if (scrollPosition >= resultBannerHeight / 4) {
                        this.showResultContent = true;
                        window.removeEventListener('scroll', this.checkScroll);
                    }
                }
            }
        },
        // 展開行程後要到該行程頂端
        scrollToTop() {
            this.$nextTick(() => {
                const showPlan2Section = document.querySelector(".show_plan_2");
                const showPlan3Section = document.querySelector(".show_plan_3");
                if (this.showPlan2 === true) {
                const topOffset = showPlan2Section.getBoundingClientRect().top;
                const scrollOptions = {
                    top: window.scrollY + topOffset,
                    behavior: "smooth",
                };
                window.scrollTo(scrollOptions);
                }else if (this.showPlan3 === true) {
                const topOffset = showPlan3Section.getBoundingClientRect().top;
                const scrollOptions = {
                    top: window.scrollY + topOffset,
                    behavior: "smooth",
                };
                window.scrollTo(scrollOptions);
                }
            });
        },
        //修正圖片路徑
        getPlaceImg(placeImg){
            return process.env.BASE_URL + 'placeImg/' + placeImg;  
        },
        getOottImg(oottImg){
            return process.env.BASE_URL + 'oottImg/' + oottImg;
        },
        getMemImg(memImg){
            return process.env.BASE_URL + 'profileImg/' + memImg;
        },
        // 陣列隨機排序
        shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        },
    },
    mounted() {
        // Add the event listener when the component is mounted
        window.addEventListener('scroll', this.checkScroll);
        this.checkScroll();

        // 從PlanQuiz取得用戶選取內容
        const query = this.$route.query;
        this.selectValue = query.selectValue || [];
        this.checkedPlaceTags = query.checkedPlaceTags;
        this.checkedSexTag = query.checkedSexTag;
        const checkedStyleTags = query.checkedStyleTags;

        console.log(this.selectValue);
        console.log(this.checkedPlaceTags);
        console.log(this.checkedSexTag);
        console.log(checkedStyleTags);

        // 控制要顯示的行程數
        const count = this.showPlanCount;
        console.log(count);
        this.showResultContent2 = count >= 2;
        this.showResultContent3 = count >= 3;

        //取得景點資料
        GET(`${this.$URL}/PlanResultPlace.php`)
            .then((res) => {
                console.log(res);
                this.placeData = this.shuffleArray(res);

                // Populate resultPicMapping dynamically
                for (const region of this.selectValue) {
                    const placesForRegion = this.limitedFilteredPlaces[region];
                    if (Array.isArray(placesForRegion)) {
                        const placeImagesArray = [];
                        placesForRegion.forEach(place => {
                            const placeImages = [];
                            placeImages.push({
                                src: this.getPlaceImg(place.place_img1),
                            });
                            if (place.place_img2) {
                                placeImages.push({
                                    src: this.getPlaceImg(place.place_img2),
                                });
                            }
                            if (place.place_img3) {
                                placeImages.push({
                                    src: this.getPlaceImg(place.place_img3),
                                });
                            }
                            if (placeImages.length > 0) {
                                placeImagesArray.push({
                                    place_name: place.place_name,
                                    images: placeImages,
                                });
                            }
                        });
                        if (placeImagesArray.length > 0) {
                            this.resultPicMapping[region] = placeImagesArray;
                        }
                    }
                }

                // Fetch weather data after receiving placeData
                this.weatherData = this.extractRegionWeather(); 
            })
            .catch((err) => {
                console.log(err);
            });
            GET(`${this.$URL}/PlanResultOott.php`)
            .then((res) => {
                this.oottData = res;
                console.log(res);
            })
            .catch((err) => {
                console.log(err);
            });
    },
    beforeUnmount() {
        // Remove the event listener when the component is about to be unmounted
        window.removeEventListener('scroll', this.checkScroll);
    },
});
</script>

<style lang="scss">
@import "@/assets/scss/baseAndMixin.scss";

.plan_result {
    background-color: $bgColor_default;
    padding-top:88px;
    @media (min-width: $md) {
        padding-top:200px;
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
                    white-space: nowrap;
                }

                -webkit-text-stroke: 5px $textColor_default;
                position: relative;
                letter-spacing: 6px !important;
                line-height: 150%;

                &::before {
                    content: '專屬旅著已產生...';
                    position: absolute;
                    top: 0;
                    left: 0;
                    @include sm_h1;
                    -webkit-text-stroke: 0;
                    color: $textColor_tint;
                    letter-spacing: 6px !important;

                    @media (min-width: $md) {
                        @include xl_h1;
                        white-space: nowrap;
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
                    top: -80px;
                    left: 580px;
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
            animation: fadeIn 1s linear;

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
            animation: fadeIn 1.5s linear;
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
                        align-self: flex-start;
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
                                padding-left: 2px;
                                @media (min-width: $md) {
                                    padding-left: 0;
                                }
                                img {
                                    width: 19px;
                                    @media (min-width: $md) {
                                        width: 23px;
                                    }
                                }

                                a {
                                    color: $textColor_default;
                                    @include sm_p;
                                    &:hover{
                                        color: $textColor_tint;
                                    }
                                    @media (min-width: $md) {
                                        @include xl_p;
                                        line-height: 150%;
                                    }
                                }
                            }
                        }
                    }
                }
                .show_result_btn{
                    margin-top: -8px;
                    @media (min-width: 1024px){
                        margin-top: -16px;
                    }
                }
                .show_result_wrap{
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    animation: fadeIn 1s linear;
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
            }

            .weather_container {
                padding-top: $sp5;
                animation: fadeIn 1s linear;
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
                animation: fadeIn 1s linear;
                h3 {
                    @include sm_h3;
                    padding-bottom: $sp3;

                    @media (min-width: $md) {
                        @include xl_h3;
                    }
                }

                .oott_card_wrap {
                    width: 100%;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    gap: $sp2;

                    @media (min-width: $md) {
                        flex-direction: row;
                        overflow-x: scroll;
                        padding-bottom: $sp1;
                    }
                    @media (min-width: 1200px) {
                        justify-content: center;
                        overflow-x: auto;
                    }
                }
            }

            .ticket_container {
                padding-top: $sp5;
                animation: fadeIn 1s linear;
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
                        &:hover{
                            background-image: url(~@/assets/img/layout/ticketHorizontal_hover.png);
                        }
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
                            // width: 100%;
                            // display: flex;
                            // flex-direction: column;
                            // gap: $sp2;

                            // @media (min-width: 1024px) {
                            //     flex-direction: row;
                            //     justify-content: space-between;
                            //     align-items: flex-end;
                            //     gap: 0;
                            // }

                            .price_box {
                                // display: flex;
                                // flex-direction: column;
                                // gap: $sp1;

                                // @media (min-width: $xl) {
                                //     flex-direction: row;
                                //     justify-content: flex-end;
                                //     align-items: center;
                                //     gap: $sp2;
                                // }

                                // span:nth-child(1) {
                                //     font-size: 16px;
                                //     font-weight: 700;
                                //     color: $tint_blue;
                                //     text-decoration: line-through;
                                // }
                                text-align: right;
                                span{
                                    font-size: 36px;
                                    font-weight: 900;
                                    color: $textColor_white;
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

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
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