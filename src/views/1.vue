<template>
    <div class="banner">
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
    <!-- 篩選bar -->
    <searchbar />
    <!-- 景點票券清單 -->
    <div class="ticket_list" v-if="ticketDisplay.length > 0">
        <div
            v-for="(item, index) in ticketDisplay"
            :key="item.id"
            class="ticket"
        >
            <!-- :to="item.link" -->
            <img :src="item.img" alt="" />
            <h3>{{ item.Name }}</h3>
            <p>{{ item.tag }}</p>
            <p>NT$ {{ item.price_adultF }}</p>
            <button class="btn add_cart" @click="createItem(index)">
                + 加入購物車
            </button>
        </div>
    </div>
    <div v-else>Loading</div>
    <!-- 購物車清單 -->
    <!-- <router-link to="/cart"></router-link> -->
    <img
        class="cart_toggle"
        :src="require('@/assets/img/cart.png')"
        alt="cart"
        @click="toggleCart"
    />
    <div class="cart_sidebar" v-show="togglePage">
        <h1>付款明細</h1>
        <!-- 購買內容 -->
        <div class="item">
            <div
                class="details"
                v-for="(item, index) in itemList"
                :key="item.id"
            >
                <div class="name">{{ item.Name }}</div>
                <div class="ticket_adult">
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
                    <label for="count_adult">
                        <p class="name">全票</p>
                        <p class="price">NT$ {{ item.price_adultF }}</p>
                    </label>
                </div>
                <div class="ticket_ex">
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
                    <label for="count_ex">
                        <p class="name">優待票</p>
                        <p class="price">NT$ {{ item.price_exF }}</p>
                    </label>
                </div>

                <div class="amount">
                    小計 NT$
                    {{ item.subtotal }}
                </div>
                <div class="delete" @click="cancel(index)" title="刪除">
                    <button>X</button>
                </div>
            </div>
        </div>
        <!-- 票券總計 -->
        <div class="result">
            <p>({{ itemList.length }}項票券) 總計</p>
            <p>
                💰
                <span class="total-price"> {{ totalPrice }} </span>
                元
            </p>
        </div>
        <div class="close" @click="toggleCart">close</div>
    </div>
</template>
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
.banner {
    width: 100%;
    position: relative;
    .banner_xl {
        display: none;
    }
    .banner_sm {
        @include width($sm) {
        }
    }
    h1 {
        position: absolute;
        top: 42%;
        left: 0;
        right: 0;
        margin: 0 auto;
        text-align: center;
    }
}
.ticket_list {
    box-sizing: border-box;
    max-width: $sm;
    margin: $sp4 auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    .ticket {
        width: 250px;
        height: 500px;
        margin: $sp1;
        position: relative;
        background-image: url("../assets/img/layout/ticketVertical.svg");
        background-size: contain;
        color: $textColor_white;
        text-align: center;
        cursor: pointer;
        img {
            width: 100%;
            margin-top: $sp5;
            margin-bottom: $sp7;
        }
        p {
            font-style: 20px;
        }
        .add_cart {
            display: flex;
            width: 184px;
            height: 46px;
            margin: $sp2 auto;
            background: $default_yellow;
            font-size: 20px;
            border: none;
            cursor: pointer;
        }
    }
}
.cart_sidebar {
    @include width(100);
    height: 100vh;
    padding: $sp1 $sp6;
    position: fixed;
    top: 0;
    right: 0;
    background: $textColor_tint;
    .details {
        height: 50px;
        padding: 25px 0;
        display: flex;
        justify-content: center;
        align-items: center;
        // .name {
        //     display: flex;
        // }
        // .count {
        //     p {
        //         display: inline-block;
        //         width: 30px;
        //         padding: 0 5px;
        //         text-align: center;
        //         border: 1px solid gray;
        //     }
        // }
        // }
        // .delete {
        //     height: 100px;
        //     display: flex;
        //     align-items: center;
        //     cursor: pointer;
        //     &:hover button {
        //         color: #a0a2d1;
        //     }
        // }
    }
    .result {
        margin: 30px 80px 30px 0;
        p {
            text-align: right;
        }
        .total-price {
            font-size: 32px;
            font-weight: 800;
            color: #d53e3e;
        }
    }
    .close {
        position: absolute;
        right: 10px;
        top: 10px;
        font-size: 24px;
        color: #fefff5;
        cursor: pointer;
        &:hover {
            color: #a0a2d1;
        }
    }
    .cart_toggle {
        position: fixed;
        right: 30px;
        bottom: 200px;
        cursor: pointer;
    }
}
@media all and (min-width: $xl) {
    .banner {
        width: 100%;
        height: 400px;
        .banner_xl {
            display: block;
            width: 1200px;
            margin: auto;
        }
        .banner_sm {
            display: none;
        }
        h1 {
            top: 170px;
            left: 0;
            right: 400px;
            margin: 0 auto;
        }
    }
    .ticket_list {
        box-sizing: border-box;
        max-width: $xl;
        margin: $sp4 auto;
        .ticket {
            width: 275px;
            height: 530px;
            margin: $sp1;
            cursor: pointer;
            img {
                width: 100%;
                margin-top: $sp5;
                margin-bottom: $sp7;
            }
            p {
                font-style: 20px;
            }
            .add_cart {
                width: 184px;
                height: 46px;
                margin: $sp2 auto;
                font-size: 20px;
            }
        }
    }
    .cart_sidebar {
        position: fixed;
        top: 0;
        right: 0;
        width: 700px;
        height: 100vh;
        padding: 10px 50px;
        .result {
            margin: 30px 80px 30px 0;
            p {
                text-align: right;
            }
            .total-price {
                font-size: 32px;
                font-weight: 800;
                color: #d53e3e;
            }
        }
        .close {
            position: absolute;
            right: 10px;
            top: 10px;
            font-size: 24px;
            color: #fefff5;
            cursor: pointer;
            &:hover {
                color: #a0a2d1;
            }
        }
    }

    .cart_toggle {
        position: fixed;
        right: 30px;
        bottom: 200px;
        cursor: pointer;
    }
}
</style>
