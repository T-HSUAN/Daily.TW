<!-- 產品的內容區塊 -->
<style lang="scss">
.searchbox {
    margin: 25px;
    text-align: center;
}
.ticket-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
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
    }
}
</style>
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
            <div class="card" v-for="item in ticketDisplay" :key="item.id">
                <img :src="item.img" alt="" />
                <p>{{ item.Name }}</p>
                <p>{{ item.description }}</p>
                <p>NT$ {{ item.price }}</p>
            </div>
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
                },
                {
                    id: 2,
                    Name: "票券B",
                    img: "https://picsum.photos/300/200/?random=10",
                    description: "這個景點一級棒!!買下去就對了",
                    price: 700,
                },
                {
                    id: 3,
                    Name: "票券C",
                    img: "https://picsum.photos/300/200/?random=11",
                    description: "這個景點一級棒!!買下去就對了",
                    price: 1200,
                },
                {
                    id: 4,
                    Name: "票券D",
                    img: "https://picsum.photos/300/200/?random=12",
                    description: "這個景點一級棒!!買下去就對了",
                    price: 2300,
                },
                {
                    id: 5,
                    Name: "票券E",
                    img: "https://picsum.photos/300/200/?random=13",
                    description: "這個景點一級棒!!買下去就對了",
                    price: 300,
                },
                {
                    id: 6,
                    Name: "票券F",
                    img: "https://picsum.photos/300/200/?random=14",
                    description: "這個景點一級棒!!買下去就對了",
                    price: 500,
                },
                {
                    id: 7,
                    Name: "票券G",
                    img: "https://picsum.photos/300/200/?random=15",
                    description: "這個景點一級棒!!買下去就對了",
                    price: 200,
                },
                {
                    id: 8,
                    Name: "票券H",
                    img: "https://picsum.photos/300/200/?random=16",
                    description: "這個景點一級棒!!買下去就對了",
                    price: 250,
                },
                {
                    id: 9,
                    Name: "票券I",
                    img: "https://picsum.photos/300/200/?random=17",
                    description: "這個景點一級棒!!買下去就對了",
                    price: 750,
                },
            ],
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
    },
};
</script>
