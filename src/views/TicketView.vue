<!-- 景點票券頁面 -->
<template>
    <div class="ticket_page">
        <div class="ticket_banner">
            <img class="banner_xl" :src="require('@/assets/img/ticket_banner.png')" alt="banner" />
            <img class="banner_sm" :src="require('@/assets/img/ticket_banner_sm.png')" alt="banner" />
            <img class="banner_man" :src="require('@/assets/img/layout/plan_q1-6.png')" alt="banner" />
            <h1>{{ banner.title }}</h1>
        </div>
        <Searchbar @Filters="Filters" :tagTexts="tagTexts">
            <div class="clear_filter" v-show="ShowClear" @click="ClearFilter">x 清除所有篩選</div>
        </Searchbar>
        <!-- 景點票券清單 -->
        <div class="ticket_list" v-if="ticketDisplay.length > 0">
            <div class="ticket_card" v-for="(item, index) in ticketDisplay" :key="item.id">
                <img class="hover_showDuck" src="@/assets/img/duck_chooseme.svg" alt="hover_decorate" />
                <router-link :to="'/ticket/' + item.id" title="點擊查看票券詳情">
                    <Ticket :ticketPhoto="`/placeImg/${item.img}`" :ticketTitle="item.Name" :ticketLocation="item.location"
                        :ticketTags="item.ticket_tag" :originalPrice="item.price_adult" :FinalPrice="priceAdultF(item)"
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

        <!-- 購物車清單(側邊) -->
        <div :class="['cart_sidebar', { 'showCartSidebar': switchPage }]">
            <div class="cart_icon" @click="switchCart">
                <font-awesome-icon icon="fa-solid fa-cart-shopping" class="cart_switch" />
                <div class="numTag">{{ cartItems.length }}</div>
            </div>
            <h2>付款明細</h2>
            <!-- 購物明細(側邊) -->
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
                                (NT$ {{ priceAdultF(item) }} /張)
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
                    <div class="ticket_ex" v-if="item.price_ex">
                        <label for="count_ex">
                            <p class="name">優待票&nbsp;</p>
                            <p class="price">(NT$ {{ priceExF(item) }} /張)</p>
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
                <button class="btn" @click="checkoutCart">結帳</button>
            </div>
        </div>
        <button @click="test">test123</button>
    </div>
</template>
<script>
import Searchbar from "@/components/Searchbar.vue";
import Ticket from "@/components/TicketVertical.vue";
import { mapActions, mapGetters } from 'vuex';
import swal from 'sweetalert';
import axios from 'axios';
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
                { Name: "#親子", selected: false },
                { Name: "#情侶", selected: false },
                { Name: "#小資", selected: false },
                { Name: "#風景", selected: false },
                { Name: "#樂園", selected: false },
                { Name: "#農場", selected: false },
                { Name: "#藝文", selected: false },
                { Name: "#山林", selected: false },
                { Name: "#海邊", selected: false },
                { Name: "#放鬆", selected: false },
                { Name: "#懷舊", selected: false },
            ],
            ticket: {
                style: require("@/assets/img/layout/ticketVertical.svg"),
            },
            // 商品資料(僅在進入畫面時去取一次資料)
            // ticketData: ticketData,
            // 從ticketData抓取商品資料並呈現(進行搜尋篩選)
            ticketDisplay: [],
            ShowClear: false,
            // 購物車清單
            cartItems: this.$store.state.cartItems,
            //switch購物車頁面
            switchPage: false,
        }
    },
    methods: {
        ...mapActions(['fetchTicketData', 'addToCart', 'removeFromCart', 'Subtotal']),
        priceAdultF(item) {
            if (item.discount !== null) {
                return Math.round(item.discount * (item.price_adult / 10));
            } else {
                return item.price_adult;
            }
        },
        priceExF(item) {
            if (item.discount !== null) {
                return Math.round(item.discount * (item.price_ex / 10));
            } else {
                return item.price_ex;
            }
        },
        Filters() {
            const areaSelected = this.$store.state.filter.areaSelected;
            const selectedTags = this.tagTexts.filter(tag => tag.selected).map(tag => tag.Name);
            const searchText = this.$store.state.filter.searchText;
            this.ticketDisplay = this.ticketData.filter(item => {
                // 地區篩選
                const areaMatch = areaSelected === "所有地區" || item.location.includes(areaSelected);

                // 標籤篩選
                const tagMatch = selectedTags.length === 0 || selectedTags.every(selectedTag => item.tag.includes(selectedTag));

                // 文字模糊搜索
                const nameMatch = searchText === "" || new RegExp(searchText.split("").join(".*"), "i").test(item.Name);

                // 返回结果
                return areaMatch && tagMatch && nameMatch;
            });
        },
        //清除篩選
        ClearFilter() {
            this.$store.state.filter.areaSelected = "所有地區";
            this.$store.state.filter.searchText = "";
            this.tagTexts.forEach(tag => tag.selected = false);
            console.log('[篩選]清除篩選');
            this.ticketDisplay = this.ticketData;
        },
        // switch購物車
        switchCart() {
            this.switchPage = !this.switchPage;
        },
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
                priceAdultF: this.priceAdultF(item),
                priceExF: this.priceExF(item),
                countAdult: item.count_adult,
                countEx: item.count_ex,
            });
        },
        //跳轉至購物車
        checkoutCart() {
            if (this.cartItems.length > 0) {
                this.$router.push('/ticket_cart'); // 購物車不為空時，跳轉至購物車頁面
            } else {
                swal("您的購物車是空的", "請先選購票券", "warning", { timer: 2500 });
            }
        },
        test() {
            console.log(this.ticketDisplay);
            console.log(typeof (this.ticketDisplay[0].count_adult));
        },
    },
    computed: {
        ...mapGetters(['ticketData', 'cartItems', 'totalPrice']),
        ShowClear() {
            if (this.ticketDisplay.length === this.ticketData.length) {
                return false;
            } else {
                return true;
            }
        },
    },
    created() {
    },
    mounted() {
        this.fetchTicketData().then(() => {
            this.ticketDisplay = this.ticketData; // 進入頁面時，將商品資料載入至畫面
        });
    },
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/main.scss";
@import "@/assets/scss/baseAndMixin.scss";
@import "@/assets/scss/page/ticketview.scss";
</style>