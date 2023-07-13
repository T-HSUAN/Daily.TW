<!-- 產品的內容區塊 -->
<template>
    <main v-if="ticketData.length > 0">
        <h1>{{ title }}</h1>
        <div class="searchbox">
            <label for="search">搜尋景點</label>
            <input type="search" v-model="searchText" />
            <button @click="updateDisplay">搜尋</button>
        </div>
        <!-- <h2>{{ subtitle }}</h2> -->
        <div class="ticket-list">
            <div
                class="card"
                v-for="(item, index) in ticketDisplay"
                :key="item.id"
            >
                <img :src="item.img" alt="" />
                <p>{{ item.Name }}</p>
                <p>{{ item.description }}</p>
                <p>NT$ {{ item.price }}</p>
                <button @click="createItem(index)">加入購物車</button>
            </div>
        </div>
        <img
            class="carttoggle"
            :src="require('@/assets/img/cart.png')"
            alt="cart"
            @click="toggleCart"
        />
        <div class="cart" v-show="togglePage">
            <h1>購物車清單</h1>
            <div class="title">
                <div class="products">商品</div>
                <div class="price">單價</div>
                <div class="count">數量</div>
                <div class="amount">金額</div>
                <div class="delete"></div>
            </div>
            <div class="item_list">
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
    </main>
    <main v-else>Loading...</main>
</template>
<script>
export default {
    data() {
        return {
            title: "景點票券",
            searchText: "",
            subtitle: "票券列表",
            // 呈現的商品資料(針對productData來搜尋篩選)
            ticketDisplay: [],
            // 商品資料(僅在進入畫面時去取一次資料)
            ticketData: [
                {
                    id: 1,
                    Name: "票券A",
                    img: "https://picsum.photos/300/200/?random=9",
                    description: "這個景點一級棒!!買下去就對了",
                    price: 50,
                    count: 1,
                },
                {
                    id: 2,
                    Name: "票券B",
                    img: "https://picsum.photos/300/200/?random=10",
                    description: "這個景點一級棒!!買下去就對了",
                    price: 700,
                    count: 1,
                },
                {
                    id: 3,
                    Name: "票券C",
                    img: "https://picsum.photos/300/200/?random=11",
                    description: "這個景點一級棒!!買下去就對了",
                    price: 1200,
                    count: 1,
                },
                {
                    id: 4,
                    Name: "票券D",
                    img: "https://picsum.photos/300/200/?random=12",
                    description: "這個景點一級棒!!買下去就對了",
                    price: 2300,
                    count: 1,
                },
                {
                    id: 5,
                    Name: "票券E",
                    img: "https://picsum.photos/300/200/?random=13",
                    description: "這個景點一級棒!!買下去就對了",
                    price: 300,
                    count: 1,
                },
                {
                    id: 6,
                    Name: "票券F",
                    img: "https://picsum.photos/300/200/?random=14",
                    description: "這個景點一級棒!!買下去就對了",
                    price: 500,
                    count: 1,
                },
                {
                    id: 7,
                    Name: "票券G",
                    img: "https://picsum.photos/300/200/?random=15",
                    description: "這個景點一級棒!!買下去就對了",
                    price: 200,
                    count: 1,
                },
                {
                    id: 8,
                    Name: "票券H",
                    img: "https://picsum.photos/300/200/?random=16",
                    description: "這個景點一級棒!!買下去就對了",
                    price: 250,
                    count: 1,
                },
                {
                    id: 9,
                    Name: "票券I",
                    img: "https://picsum.photos/300/200/?random=17",
                    description: "這個景點一級棒!!買下去就對了",
                    price: 750,
                    count: 1,
                },
            ],
            itemList: [],
            togglePage: false,
        };
    },
    methods: {
        updateDisplay() {
            if (this.searchText === "") {
                this.ticketDisplay = this.ticketData;
            } else {
                this.ticketDisplay = this.ticketData.filter((item) =>
                    item.Name.includes(this.searchText)
                );
            }
        },
        createItem(index) {
            if (index >= 0 && index < this.ticketData.length) {
                const newItem = this.ticketData[index];
                if (!this.itemList.includes(newItem)) {
                    this.itemList.push(newItem);
                } else {
                    window.alert("該項目已存在於購物車中。");
                }
            } else {
                window.alert("無效的索引。");
            }
        },
        add(index) {
            this.itemList[index].count++;
        },
        reduce(item) {
            if (item.count > 0) {
                item.count--;
            }
        },
        cancel: function (index) {
            console.log(this);
            this.itemList.splice(index, 1);
        },
        close() {
            this.style.display = "none";
        },
        toggleCart() {
            this.togglePage = !this.togglePage;
        },
    },
    computed: {
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
.searchbox {
    margin: 25px;
    text-align: center;
}
.ticket-list {
    max-width: 1200px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin: auto;
    .card {
        display: flex;
        flex-direction: column;
        width: 350px;
        height: 500px;
        margin: 15px;
        background: #74b5c3;
        color: #fefff5;
        img {
            margin-bottom: 10px;
        }
        p {
            margin: 10px 15px;
        }
        button {
            width: 100px;
            height: 50px;
            margin: 15px;
            color: #6a5d4a;
            background: #fefff5;
            border: none;
            border-radius: 15px;
            cursor: pointer;
        }
    }
}
.cart {
    position: fixed;
    top: 0;
    right: 0;
    width: 700px;
    height: 100vh;
    padding: 10px 50px;
    background: #eece75;
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

.carttoggle {
    position: fixed;
    right: 30px;
    bottom: 200px;
    cursor: pointer;
}
</style>
