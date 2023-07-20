<template>
    <div class="cart_sidebar">
        <h1>付款明細</h1>
        <!-- 購買內容 -->
        <div class="item">
            <div class="details" v-for="(item, index) in itemList" :key="item.id">
                <div class="name">{{ item.Name }}</div>
                <div class="ticket_adult">
                    <select v-model="item.count_adult" name="ticket_count_adult" class="count_adult"
                        @change="subTotalPrice(item)">
                        <option value="0" selected>0</option>
                        <option :value="num" v-for="num in 5" :key="num">
                            {{ num }}
                        </option>
                    </select>
                    <label for="count_adult">
                        <p class="name">全票</p>
                        <p class="price">NT$ {{ item.price_adultF }}</p>
                    </label>
                </div>
                <div class="ticket_ex">
                    <select v-model="item.count_ex" name="ticket_count_ex" class="count_ex" @change="subTotalPrice(item)">
                        <option value="0" selected>0</option>
                        <option :value="num" v-for="num in 5" :key="num">
                            {{ num }}
                        </option>
                    </select>
                    <label for="count_ex">
                        <p class="name">優待票</p>
                        <p class="price">NT$ {{ item.price_exF }}</p>
                    </label>
                </div>

                <div class="amount">小計 NT$ {{ item.subtotal }}</div>
                <!-- 票券總計 -->
                <div class="result">
                    <p>({{ itemList.length }}項票券) 總計</p>
                    <p>
                        💰
                        <span class="total-price">
                            {{ totalPrice }}
                        </span>
                        元
                    </p>
                </div>
                <div class="delete" title="刪除">
                    <button>X</button>
                </div>
            </div>
        </div>
        <!-- 票券總計 -->
        <div class="result">
            <p>({{ itemList.length }}項票券) 總計</p>
            <p>
                💰
                <span class="total-price"> </span>
                元
            </p>
        </div>
        <div class="close">close</div>
    </div>
    </div>
    <template>
        <script>
            import searchbar from "@/components/Searchbar.vue";

    export default {
        components: {
            searchbar,
        },
        data() {
            return {
                banner: {
                    title: "景點票券一次購夠GO",
                    img: "",
                },
                filter: {
                    title: "景點票券",
                    searchText: "",
                    subtitle: "票券列表",
                },
                ticket: {
                    style: require("@/assets/img/layout/ticketVertical.svg"),
                },
                // 商品資料 需連接DB(僅在進入畫面時去取一次資料)
                ticketData: [
                    {
                        id: 1,
                        Name: "票券A",
                        img: "https://picsum.photos/300/200/?random=9",
                        tag: "#標籤",
                        price_adultO: 100,
                        price_adultF: 50,
                        price_exO: 300,
                        price_exF: 150,
                        count_adult: 0,
                        count_ex: 0,
                        subtotal: 0,
                        link: "/ticketinfo",
                    },
                    {
                        id: 2,
                        Name: "票券B",
                        img: "https://picsum.photos/300/200/?random=10",
                        tag: "#標籤",
                        price_adultO: 1400,
                        price_adultF: 700,
                        price_exO: 300,
                        price_exF: 150,
                        count_adult: 0,
                        count_ex: 0,
                        subtotal: 0,
                        link: "/ticketinfo",
                    },
                    {
                        id: 3,
                        Name: "票券C",
                        img: "https://picsum.photos/300/200/?random=11",
                        tag: "#標籤",
                        price_adultO: 2400,
                        price_adultF: 1200,
                        price_exO: 300,
                        price_exF: 150,
                        count_adult: 0,
                        count_ex: 0,
                        subtotal: 0,
                        link: "/ticketinfo",
                    },
                    {
                        id: 4,
                        Name: "票券D",
                        img: "https://picsum.photos/300/200/?random=12",
                        tag: "#標籤",
                        price_adultO: 4600,
                        price_adultF: 2300,
                        price_exO: 300,
                        price_exF: 150,
                        count_adult: 0,
                        count_ex: 0,
                        subtotal: 0,
                        link: "/ticketinfo",
                    },
                    {
                        id: 5,
                        Name: "票券E",
                        img: "https://picsum.photos/300/200/?random=13",
                        tag: "#標籤",
                        price_adultO: 600,
                        price_adultF: 300,
                        price_exO: 300,
                        price_exF: 150,
                        count_adult: 0,
                        count_ex: 0,
                        subtotal: 0,
                        link: "/ticketinfo",
                    },
                    {
                        id: 6,
                        Name: "票券F",
                        img: "https://picsum.photos/300/200/?random=14",
                        tag: "#標籤",
                        price_adultO: 1000,
                        price_adultF: 500,
                        price_exO: 300,
                        price_exF: 150,
                        count_adult: 0,
                        count_ex: 0,
                        subtotal: 0,
                        link: "/ticketinfo",
                    },
                    {
                        id: 7,
                        Name: "票券G",
                        img: "https://picsum.photos/300/200/?random=15",
                        tag: "#標籤",
                        price_adultO: 400,
                        price_adultF: 200,
                        price_exO: 300,
                        price_exF: 150,
                        count_adult: 0,
                        count_ex: 0,
                        subtotal: 0,
                        link: "/ticketinfo",
                    },
                    {
                        id: 8,
                        Name: "票券H",
                        img: "https://picsum.photos/300/200/?random=16",
                        tag: "#標籤",
                        price_adultO: 500,
                        price_adultF: 250,
                        price_exO: 300,
                        price_exF: 150,
                        count_adult: 0,
                        count_ex: 0,
                        subtotal: 0,
                        link: "/ticketinfo",
                    },
                ],
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
                updateDisplay() {
                    if (this.filter.searchText === "") {
                        this.ticketDisplay = this.ticketData;
                    } else {
                        this.ticketDisplay = this.ticketData.filter((item) =>
                            item.Name.includes(this.filter.searchText)
                        );
                    }
                },
            // 加入購物車
            createItem(index) {
                if (index >= 0 && index < this.ticketData.length) {
                    const newItem = this.ticketData[index];
                    if (!this.itemList.includes(newItem)) {
                        this.itemList.push(newItem);
                    } else {
                        window.alert("該票券已存在於購物車中。");
                    }
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
            subTotalPrice: function (item) {
                const countAdult = item.count_adult;
                const countEx = item.count_ex;
                const priceAdultF = item.price_adultF;
                const priceExF = item.price_exF;
                item.subtotal = countAdult * priceAdultF + countEx * priceExF;
            },
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
        </body>

        </html>
