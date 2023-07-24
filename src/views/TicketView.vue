<template>
    <div class="ticket_banner">
        <img
            class="banner_xl"
            :src="require('@/assets/img/ticket_banner.png')"
            alt="banner"
        />
        <img
            class="banner_sm"
            :src="require('@/assets/img/ticket_banner_sm.png')"
            alt="banner"
        />
        <h1>{{ banner.title }}</h1>
    </div>
    <Searchbar :Filter="updateDisplay" />
    <!-- 景點票券清單 -->
    <div class="ticket_list" v-if="ticketDisplay.length > 0">
        <div
            class="ticket_card"
            v-for="(item, index) in ticketDisplay"
            :key="item.id"
        >
            <img
                class="hover_showDuck"
                src="@/assets/img/duck_chooseme.svg"
                alt="hover_showDuck"
            />
            <router-link :to="item.singlecard_link" title="點擊查看票券詳情">
                <Ticket
                    :ticketPhoto="item.img"
                    :ticketTitle="item.Name"
                    :ticketLocation="item.location"
                    :ticketTags="item.tag"
                    :originalPrice="item.price_adultO"
                    :FinalPrice="item.price_adultF"
                    :discountTag="item.discount"
            /></router-link>
            <div class="add_cart">
                <button class="btn" @click="createItem(index)">
                    + 加入購物車
                </button>
            </div>
        </div>
    </div>
    <div v-else>查無結果</div>
    <button class="btn more" v-if="ticketDisplay.length === ticketData.length">
        更多
    </button>
    <!-- 購物車清單 -->
    <!-- <router-link to="/cart"></router-link> -->
    <div class="cart">
        <font-awesome-icon
            icon="fa-solid fa-cart-shopping"
            class="cart_toggle"
            @click="toggleCart"
        />
        <div class="numTag">{{ itemList.length }}</div>
    </div>
    <div class="cart_sidebar" v-show="togglePage">
        <h2>付款明細</h2>
        <!-- 購買內容 -->
        <div class="item">
            <div
                class="details"
                v-for="(item, index) in itemList"
                :key="item.id"
            >
                <div class="title">
                    {{ item.Name }}
                    <button class="cancel" @click="cancel(index)" title="刪除">
                        X
                    </button>
                </div>

                <div class="ticket_adult">
                    <label for="count_adult">
                        <p class="name">全票&nbsp;</p>
                        <p class="price">(NT$ {{ item.price_adultF }} /張)</p>
                    </label>
                    <select
                        v-model="item.count_adult"
                        name="ticket_count_adult"
                        class="count_adult"
                        @change="subTotalPrice(item)"
                    >
                        <option value="0" selected>0</option>
                        <option :value="num" v-for="num in 5" :key="num">
                            {{ num }}
                        </option>
                    </select>
                </div>
                <div class="ticket_ex">
                    <label for="count_ex">
                        <p class="name">優待票&nbsp;</p>
                        <p class="price">(NT$ {{ item.price_exF }} /張)</p>
                    </label>
                    <select
                        v-model="item.count_ex"
                        name="ticket_count_ex"
                        class="count_ex"
                        @change="subTotalPrice(item)"
                    >
                        <option value="0" selected>0</option>
                        <option :value="num" v-for="num in 5" :key="num">
                            {{ num }}
                        </option>
                    </select>
                </div>

                <div class="amount">
                    小計&nbsp;
                    <span>NT$ {{ item.subtotal }}</span>
                </div>
            </div>
        </div>
        <!-- 票券總計 -->
        <div class="result">
            <p>({{ itemList.length }}項票券) 總計</p>
            <p>
                NT$&nbsp;
                <span class="total-price"> {{ totalPrice }} </span>
                元
            </p>
            <button class="btn">結帳</button>
        </div>
        <div class="close" @click="toggleCart">close</div>
    </div>
</template>
<script>
import Sidebar from "./MainSidebar.vue";
import Searchbar from "@/components/Searchbar.vue";
import Ticket from "@/components/TicketVertical.vue";
import ticketData from "@/store/ticketData.js";
export default {
    components: {
        Sidebar,
        Searchbar,
        Ticket,
    },
    data() {
        return {
            banner: {
                title: "景點票券一次購夠GO",
                img: "",
            },
            // filter: {
            //     searchText: "",
            // },
            ticket: {
                style: require("@/assets/img/layout/ticketVertical.svg"),
            },
            // 商品資料(僅在進入畫面時去取一次資料)
            ticketData: ticketData,
            // 從ticketData抓取商品資料並呈現(進行搜尋篩選)
            ticketDisplay: [],
            // 購物車清單

            itemList: [],
            //toggle購物車頁面
            totalPrice: 0,
            togglePage: false,
        };
    },
    methods: {
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

        createItem(index) {
            let cartItem = this.ticketDisplay[index];
            // 檢查商品是否已經存在於購物車中
            if (!this.itemList.includes(cartItem)) {
                this.itemList.push(cartItem);
            } else {
                window.alert(
                    "票券已加入購物車，請點擊確認全票與優待票購買數量。"
                );
            }
        },
        // 刪除項目
        cancel: function (index) {
            console.log(this);
            this.itemList.splice(index, 1);
        },
        // 點擊關閉購物車
        close() {
            this.style.display = "none";
        },
        // toggle購物車
        toggleCart() {
            this.togglePage = !this.togglePage;
        },
        //小計
        subTotalPrice(item) {
            const countAdult = item.count_adult;
            const countEx = item.count_ex;
            const priceAdultF = item.price_adultF;
            const priceExF = item.price_exF;

            item.subtotal = countAdult * priceAdultF + countEx * priceExF;
            this.TotalPrice();
        },
        //總計
        TotalPrice() {
            if (this.itemList.length === 0) return 0;
            for (let i = 0; i < this.itemList.length; i++) {
                const item = this.itemList[i];
                this.totalPrice += item.subtotal;
            }
            return this.totalPrice;
        },
    },
    computed: {},
    created() {
        this.updateDisplay();
        this.TotalPrice();
    },
};
</script>
<style lang="scss">
@import "@/assets/scss/main.scss";
</style>
