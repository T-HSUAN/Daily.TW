<template>
    <div class="banner">
        <!-- w1200 h400 -->
        <!-- <img :src="" alt="" /> -->
        <div class="img">圖片</div>
    </div>
    <!-- 篩選bar -->
    <div class="filter-bar">
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
                    placeholder="請輸入關鍵字"
                />
                <label for="search">搜尋</label>
            </div>
        </div>
    </div>
    <!-- 景點票券清單 -->
    <div class="ticket-list">
        <div class="card" v-for="(item, index) in ticketDisplay" :key="item.id">
            <img :src="item.img" alt="" />
            <p>{{ item.Name }}</p>
            <p>{{ item.description }}</p>
            <p>NT$ {{ item.price }}</p>
            <button @click="createItem(index)">加入購物車</button>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            banner: {
                img: "",
            },
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
                    count: 1,
                },
            ],
            itemList: [],
            // togglePage: false,
        };
    },
    created() {
        this.updateDisplay();
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
.filter-bar {
    width: 100%;
    background: $bgColor_default;
    .bar {
        max-width: 1200px;
        margin: auto;
        display: flex;
        justify-content: space-between;
        .title {
            display: flex;
        }
    }
}
.ticket-list {
    display: flex;
    flex-wrap: wrap;
}
</style>
