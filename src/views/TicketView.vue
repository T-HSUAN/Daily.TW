<template>
    <div class="banner">
        <!-- w1200 h400 -->
        <img :src="require('@/assets/img/ticket_banner.png')" alt="banner" />
        <h1>{{ banner.title }}</h1>
    </div>
    <!-- 篩選bar -->
    <div class="filter">
        <div class="bar">
            <div class="title">
                <p>↑人氣</p>
                <p>↑上架時間</p>
                <p>↑地區</p>
            </div>
            <div class="searchbar">
                <input
                    type="text"
                    name="search"
                    id="search"
                    v-model="filter.searchText"
                />
                <!-- placeholder="請輸入關鍵字" -->
                <label for="search" class="btn" @click="updateDisplay"
                    >搜尋</label
                >
            </div>
        </div>
    </div>
    <!-- 景點票券清單 -->
    <div class="ticket_list" v-if="ticketData.length > 0">
        <div
            class="ticket"
            v-for="(item, index) in ticketDisplay"
            :key="item.id"
        >
            <img :src="item.img" alt="" />
            <h3>{{ item.Name }}</h3>
            <p>{{ item.tag }}</p>
            <h4>NT$ {{ item.price }}</h4>
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
        <div class="title">
            <div class="products">商品</div>
            <div class="price">單價</div>
            <div class="count">數量</div>
            <div class="amount">金額</div>
            <div class="delete"></div>
        </div>
        <!-- 購買內容 -->
        <div class="item">
            <div
                class="title content"
                v-for="(item, index) in itemList"
                :key="item.id"
            >
                <div class="products">
                    <img :src="item.img" alt="" />
                    <div class="name">{{ item.Name }}</div>
                </div>
                <div class="price">$ {{ item.price }}</div>
                <div class="count">
                    <button @click="reduce(item)">-</button>
                    <p>{{ item.count }}</p>
                    <button @click="add(index)">+</button>
                </div>
                <div class="amount">$ {{ item.price * item.count }}</div>
                <div class="delete" @click="cancel(index)" title="刪除">
                    <button>X</button>
                </div>
            </div>
        </div>
        <!-- 票券總計 -->
        <div class="result">
            <p>({{ itemList.length }}項商品) 總計</p>
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
export default {
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
                style: require("../assets/img/ticket.png"),
            },
            // 商品資料(僅在進入畫面時去取一次資料)
            ticketData: [
                {
                    id: 1,
                    Name: "票券A",
                    img: "https://picsum.photos/300/200/?random=9",
                    tag: "#xxx",
                    price: 50,
                    count: 1,
                },
                {
                    id: 2,
                    Name: "票券B",
                    img: "https://picsum.photos/300/200/?random=10",
                    tag: "xxx",
                    price: 700,
                    count: 1,
                },
                {
                    id: 3,
                    Name: "票券C",
                    img: "https://picsum.photos/300/200/?random=11",
                    tag: "xxx",
                    price: 1200,
                    count: 1,
                },
                {
                    id: 4,
                    Name: "票券D",
                    img: "https://picsum.photos/300/200/?random=12",
                    tag: "xxx",
                    price: 2300,
                    count: 1,
                },
                {
                    id: 5,
                    Name: "票券E",
                    img: "https://picsum.photos/300/200/?random=13",
                    tag: "xxx",
                    price: 300,
                    count: 1,
                },
                {
                    id: 6,
                    Name: "票券F",
                    img: "https://picsum.photos/300/200/?random=14",
                    tag: "xxx",
                    price: 500,
                    count: 1,
                },
                {
                    id: 7,
                    Name: "票券G",
                    img: "https://picsum.photos/300/200/?random=15",
                    tag: "xxx",
                    price: 200,
                    count: 1,
                },
                {
                    id: 8,
                    Name: "票券H",
                    img: "https://picsum.photos/300/200/?random=16",
                    tag: "xxx",
                    price: 250,
                    count: 1,
                },
            ],
            // 呈現的商品資料(針對ticketData來搜尋篩選)
            ticketDisplay: [],
            // 購物車清單
            itemList: [],
            //toggle購物車頁面
            togglePage: false,
        };
    },
    created() {
        this.updateDisplay();
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
        // 增加項目數量
        add(index) {
            this.itemList[index].count++;
        },
        // 減少項目數量
        reduce(item) {
            if (item.count > 0) {
                item.count--;
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
    },
    computed: {
        // 計算購物車總計
        totalPrice() {
            if (this.itemList.length === 0) return;
            let total = 0;
            for (let index = 0; index < this.itemList.length; index++) {
                const accumulator =
                    this.itemList[index].price * this.itemList[index].count;
                total += accumulator;
            }
            return total;
        },
    },
};
</script>
<style lang="scss">
@import "@/assets/scss/main.scss";
.banner {
    height: 400px;
    position: relative;
    img {
        display: block;
        width: 100%;
        max-width: 1200px;
        // max-height: 400px;
        margin: auto;
        // background: $mid_yellow;
        color: $textColor_white;
        font-size: $xl_h1;
    }
    h1 {
        position: absolute;
        top: 170px;
        left: 0;
        right: 400px;
        margin: auto;
    }
}
.filter {
    width: 100%;
    line-height: 70px;
    background: $bgColor_default;
    .bar {
        box-sizing: border-box;
        max-width: 1200px;
        margin: auto;
        padding: 0 $sp1;
        display: flex;
        justify-content: space-between;
        .title {
            display: flex;
        }
        .searchbar {
            display: flex;
            align-items: center;
            #search {
                width: 160px;
                height: 30px;
                margin-right: $sp3;
                padding: $sp1 $sp3;
                font-size: $xl_p;
                border-radius: 50px;
            }
            .btn {
                width: 40px;
                height: 30px;
            }
        }
    }
}
.ticket_list {
    box-sizing: border-box;
    max-width: 1200px;
    margin: $sp5 auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    .ticket {
        width: 275px;
        height: 530px;
        margin: $sp1;
        position: relative;
        background-image: url("../assets/img/ticket.png");
        background-size: contain;
        color: $textColor_white;
        text-align: center;
        cursor: pointer;
        img {
            margin-top: $sp5;
            margin-bottom: $sp7;
            width: 100%;
        }
        h3 {
            @include xl_h3;
        }
        h5 {
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
    position: fixed;
    top: 0;
    right: 0;
    width: 700px;
    height: 100vh;
    padding: 10px 50px;
    background: $textColor_tint;
    .title {
        display: flex;
        margin: 0 auto;
        height: 30px;
        padding-left: 10px;
        div {
            width: 100px;
            line-height: 30px;
            text-align: center;
        }
        .products {
            width: 300px;
            text-align: left;
        }
    }
    .content {
        // height: 50px;
        padding: 25px 0;
        justify-content: center;
        align-items: center;
        color: black;
        .products {
            display: flex;
            img {
                width: 80px;
                height: 80px;
                border-radius: 3px;
                float: left;
            }
            .name {
                margin-left: 100px;
                margin-top: 20px;
            }
        }
        .count {
            p {
                display: inline-block;
                width: 30px;
                padding: 0 5px;
                text-align: center;
                border: 1px solid gray;
            }
        }
        button {
            background: none;
            font-size: 32px;
            border: none;
            cursor: pointer;
            &:hover {
                color: #a0a2d1;
            }
        }
        .delete {
            height: 100px;
            display: flex;
            align-items: center;
            cursor: pointer;
            &:hover button {
                color: #a0a2d1;
            }
        }
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
}

.cart_toggle {
    position: fixed;
    right: 30px;
    bottom: 200px;
    cursor: pointer;
}
</style>
