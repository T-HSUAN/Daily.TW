<!-- 景點票券頁面 -->
<template>
    <div class="ticket_page">
        <div class="ticket_banner">
            <img class="banner_xl" :src="require('@/assets/img/ticket_banner.png')" alt="banner" />
            <img class="banner_sm" :src="require('@/assets/img/ticket_banner_sm.png')" alt="banner" />
            <img class="banner_man" :src="require('@/assets/img/layout/plan_q1-6.png')" alt="banner" />
            <h1>{{ banner.title }}</h1>
        </div>
        <Searchbar :Filter="updateDisplay" :tagTexts="tagTexts" :TagsFilter="TagsFilter" :TagSelected="TagSelected" />
        <!-- 景點票券清單 -->
        <div class="ticket_list" v-if="ticketDisplay.length > 0">
            <div class="ticket_card" v-for="(item, index) in ticketDisplay" :key="item.id">
                <img class="hover_showDuck" src="@/assets/img/duck_chooseme.svg" alt="hover_decorate" />
                <router-link :to="'/ticket/' + item.id" title="點擊查看票券詳情">
                    <Ticket :ticketPhoto="item.img" :ticketTitle="item.Name" :ticketLocation="item.location"
                        :ticketTags="item.tag" :originalPrice="item.price_adultO" :FinalPrice="item.price_adultF"
                        :discountTag="item.discount" />
                </router-link>
                <div class="add_cart">
                    <button class="btn" @click="createItem(index)">
                        + 加入購物車
                    </button>
                </div>
            </div>
        </div>
        <div class="no_result" v-else>查無結果，請重新輸入關鍵字</div>
        <div class="page_link">
            <a class="page" v-if="ticketDisplay.length === ticketData.length">1</a>
            <a class="page" v-if="ticketDisplay.length === ticketData.length">2</a>
            <a class="page" v-if="ticketDisplay.length === ticketData.length">3</a>
        </div>

        <!-- 購物車清單 -->
        <div :class="['cart_sidebar', { 'showCartSidebar': switchPage }]">
            <div class="cart_icon" @click="switchCart">
                <font-awesome-icon icon="fa-solid fa-cart-shopping" class="cart_switch" />
                <div class="numTag">{{ cartItems.length }}</div>
            </div>
            <h2>付款明細</h2>
            <!-- 購物明細 -->
            <div class="item">
                <div class="item_null" v-if="cartItems.length === 0">
                    <p>您的購物車目前是空的</p>
                    <img src="@/assets/img/cart_empty.svg" alt="decorate">
                </div>
                <div class="details" v-for="(item, index) in cartItems" :key="item.id">
                    <!-- 標題&垃圾桶 -->
                    <div class="title">
                        {{ item.Name }}
                        <font-awesome-icon icon="fa-solid fa-trash-can" class="cancel" @click="removeFromCart(index)"
                            title="刪除" />
                    </div>
                    <!-- 成人票券項目 -->
                    <div class="ticket_adult">
                        <label for="count_adult">
                            <p class="name">全票&nbsp;</p>
                            <p class="price">
                                (NT$ {{ item.price_adultF }} /張)
                            </p>
                        </label>
                        <select v-model="item.count_adult" name="ticket_count_adult" class="count_adult"
                            @change="updateSubtotal(item)">
                            <!-- 小計 -->
                            <option value="0" selected>0</option>
                            <option :value="num" v-for="num in 5" :key="num">
                                {{ num }}
                            </option>
                        </select>
                    </div>
                    <!-- 優惠票券項目 -->
                    <div class="ticket_ex">
                        <label for="count_ex">
                            <p class="name">優待票&nbsp;</p>
                            <p class="price">(NT$ {{ item.price_exF }} /張)</p>
                        </label>
                        <select v-model="item.count_ex" name="ticket_count_ex" class="count_ex"
                            @change="updateSubtotal(item)">
                            <option value="0" selected>0</option>
                            <option :value="num" v-for="num in 5" :key="num">
                                {{ num }}
                            </option>
                        </select>
                    </div>
                    <!-- 小計 -->
                    <div class="amount">
                        小計&nbsp;
                        <span>NT$ {{ item.subtotal }}</span>
                    </div>
                </div>
            </div>
            <!-- 票券總計 -->
            <div class="total">
                <p>({{ cartItems.length }}項票券) 總計</p>
                <p> NT$&nbsp;
                    <span class="total-price"> {{ totalPrice }} </span>
                    元
                </p>
                <!-- 結帳按鈕，跳轉至購物車 -->
                <router-link to="/cart"><button class="btn">結帳</button></router-link>
            </div>
            <!-- <div class="close" @click="switchCart">close</div> -->
        </div>
    </div>
</template>
<script>
import Searchbar from "@/components/Searchbar.vue";
import Ticket from "@/components/TicketVertical.vue";
import { mapActions, mapGetters } from 'vuex';
import ticketData from "@/store/ticketData.js";
export default {
    components: {
        Searchbar,
        Ticket,
    },
    data() {
        return {
            banner: {
                title: "景點票券一次購夠GO",
                img: "",
            },
            tagTexts: [
                { default: " #親子" },
                { default: " #情侶" },
                { default: " #小資" },
                { default: " #風景" },
                { default: " #樂園" },
                { default: " #農場" },
                { default: " #藝文" },
                { default: " #山林" },
                { default: " #海邊" },
                { default: " #放鬆" },
                { default: " #懷舊" },
            ],
            TagSelected: false,// 儲存使用者選擇的標籤
            ticket: {
                style: require("@/assets/img/layout/ticketVertical.svg"),
            },
            // 商品資料(僅在進入畫面時去取一次資料)
            ticketData: ticketData,
            // 從ticketData抓取商品資料並呈現(進行搜尋篩選)
            ticketDisplay: [],
            // 購物車清單
            cartItems: this.$store.state.cartItems,
            //switch購物車頁面
            switchPage: false,
        }
    },
    methods: {
        // filterByTag(tag) {
        //     this.selectedTag = tag;
        // },
        //模糊搜尋
        updateDisplay() {
            if (this.$store.state.filter.searchText === "") {
                this.ticketDisplay = this.ticketData;
            } else {
                const regexText = this.$store.state.filter.searchText
                    .split("")
                    .join(".*");
                const regex = new RegExp(regexText, "i");
                this.ticketDisplay = this.ticketData.filter((item) =>
                    regex.test(item.Name)
                );
            }
        },
        // LocationFilter() {
        //     if (this.TagSelected === true) {
        //         this.ticketDisplay = this.ticketData.filter((item) =>
        //             item.location.includes(this.tagTexts.default))
        //     } else {
        //         this.ticketDisplay = this.ticketData;
        //     }
        // },
        TagsFilter() {
            this.TagSelected = !this.TagSelected;
            if (this.TagSelected === true) {
                this.ticketDisplay = this.ticketData.filter((item) =>
                    item.location.includes(this.tagTexts.default))
            } else {
                this.ticketDisplay = this.ticketData;
            }
        },
        // switch購物車
        switchCart() {
            this.switchPage = !this.switchPage;
        },
        ...mapActions(['addToCart', 'removeFromCart', 'Subtotal']),
        // 檢查商品是否已經存在於購物車中
        createItem(index) {
            const cartItem = this.ticketDisplay[index];
            console.log('Received item:', this.cartItems);
            if (cartItem) {
                this.addToCart(cartItem);
            }
        },
        //更新購物車小計
        updateSubtotal(item) {
            // 調用 action 來更新小計
            this.Subtotal({
                itemId: item.id,
                countAdult: item.count_adult,
                countEx: item.count_ex,
            });
        },
    },
    computed: {
        // filteredTicket() {
        //     if (!this.selectedTag) {
        //         return this.ticketDisplay;
        //     }
        //     return this.ticketDisplay.filter(ticket => ticket.location.includes(this.selectedTag));
        // },
        ...mapGetters(['cartItems', 'totalPrice']),
    },
    created() {
        this.updateDisplay();
    },
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/baseAndMixin.scss";
@import "@/assets/scss/page/ticketview.scss";
</style>