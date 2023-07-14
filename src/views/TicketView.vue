<template>
    <div class="banner">
        <!-- w1200 h400 -->
        <!-- <img :src="" alt="" /> -->
        <div class="img">圖片</div>
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
    <div class="list" v-if="ticketData.length > 0">
        <div
            class="ticket"
            v-for="(item, index) in ticketDisplay"
            :key="item.id"
        >
            <!-- <img class="ticket-style" :src="ticket.style" alt="" /> -->
            <img :src="item.img" alt="" />
            <h3>{{ item.Name }}</h3>
            <p>{{ item.tag }}</p>
            <h4>NT$ {{ item.price }}</h4>
            <button @click="createItem(index)">加入購物車</button>
        </div>
    </div>
    <div v-else>Loading</div>
</template>
<script>
export default {
    data() {
        return {
            banner: {
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
                    tag: "這個景點一級棒!!買下去就對了",
                    price: 700,
                    count: 1,
                },
                {
                    id: 3,
                    Name: "票券C",
                    img: "https://picsum.photos/300/200/?random=11",
                    tag: "這個景點一級棒!!買下去就對了",
                    price: 1200,
                    count: 1,
                },
                {
                    id: 4,
                    Name: "票券D",
                    img: "https://picsum.photos/300/200/?random=12",
                    tag: "這個景點一級棒!!買下去就對了",
                    price: 2300,
                    count: 1,
                },
                {
                    id: 5,
                    Name: "票券E",
                    img: "https://picsum.photos/300/200/?random=13",
                    tag: "這個景點一級棒!!買下去就對了",
                    price: 300,
                    count: 1,
                },
                {
                    id: 6,
                    Name: "票券F",
                    img: "https://picsum.photos/300/200/?random=14",
                    tag: "這個景點一級棒!!買下去就對了",
                    price: 500,
                    count: 1,
                },
                {
                    id: 7,
                    Name: "票券G",
                    img: "https://picsum.photos/300/200/?random=15",
                    tag: "這個景點一級棒!!買下去就對了",
                    price: 200,
                    count: 1,
                },
                {
                    id: 8,
                    Name: "票券H",
                    img: "https://picsum.photos/300/200/?random=16",
                    tag: "這個景點一級棒!!買下去就對了",
                    price: 250,
                    count: 1,
                },
            ],
            // 呈現的商品資料(針對productData來搜尋篩選)
            ticketDisplay: [],
            //toggle購物車頁面
            // itemList: [],
            // togglePage: false,
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
                    item.Name.includes(this.searchText)
                );
            }
        },
    },
    //     createItem(index) {
    //         if (index >= 0 && index < this.ticketData.length) {
    //             const newItem = this.ticketData[index];
    //             if (!this.itemList.includes(newItem)) {
    //                 this.itemList.push(newItem);
    //             } else {
    //                 window.alert("該票券已存在於購物車中。");
    //             }
    //         }
    //     },
    //     add(index) {
    //         this.itemList[index].count++;
    //     },
    //     reduce(item) {
    //         if (item.count > 0) {
    //             item.count--;
    //         }
    //     },
    //     cancel: function (index) {
    //         console.log(this);
    //         this.itemList.splice(index, 1);
    //     },
    //     close() {
    //         this.style.display = "none";
    //     },
    //     toggleCart() {
    //         this.togglePage = !this.togglePage;
    //     },
    // },
    // computed: {
    //     totalPrice() {
    //         if (this.itemList.length === 0) return;
    //         let total = 0;
    //         for (let index = 0; index < this.itemList.length; index++) {
    //             const accumulator =
    //                 this.itemList[index].price * this.itemList[index].count;
    //             total += accumulator;
    //         }
    //         return total;
    //     },
    // },
};
</script>
<style lang="scss">
@import "@/assets/scss/main.scss";
.banner {
    .img {
        max-width: 1200px;
        height: 400px;
        margin: auto;
        background: $mid_yellow;
        text-align: center;
        border: 1px solid $textColor_default;
    }
}
.filter {
    width: 100%;
    line-height: 70px;
    background: $bgColor_default;
    .bar {
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
.list {
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
        img {
            margin-top: $sp5;
            margin-bottom: $sp7;
            width: 100%;
        }
        h3 {
            font-size: 32px;
        }
        h5 {
            font-style: 20px;
        }
    }
}
</style>
