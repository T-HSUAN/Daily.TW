<!-- 行程總覽 -->
<template>
    <div class="tripOverview">

        <!-- 麵包屑 -->
        <sec class="breadcrumb">
            <router-link to="/">
                <span>首頁</span>
            </router-link>
            <font-awesome-icon icon="fa-solid fa-chevron-right" />
            <router-link to="/trip">
                <span>出遊特輯</span>
            </router-link>
            <font-awesome-icon icon="fa-solid fa-chevron-right" />
            <router-link to="/trip_overview">
                <span>行程總覽</span>
            </router-link>
        </sec>
        <!-- 標題 -->
        <h2>行程總覽</h2>
        <!-- 搜尋篩選欄 -->
        <Searchbar :Filter="updateDisplay" />
        <!-- 行程列表 -->
        <section class="list">
            <div class="trip_list" v-if="tripDisplay.length > 0">
                <div
                    class="trip_card"
                    v-for="(item, index) in tripDisplay"
                    :key="item.id"
                >
                    <router-link :to="item.link" title="點擊查看行程詳情">
                        <Trip
                            :tripCardPhoto="item.img"
                            :tripCardTags="item.tag"
                            :tripCardTitle="item.name"
                            :tripCardDesc="item.desc"
                            :tripCardAuthor="item.author"
                            :tripCardDate="item.date"
                    /></router-link>
                </div>
            </div>
            <div v-else>查無結果</div>
            <router-link to="/"><button class="btn">查看更多</button></router-link>
        </section>
    </div>
</template>
<script>
import Searchbar from "@/components/Searchbar.vue";
import Trip from "@/components/TripCard.vue";
import tripData from "@/store/tripData.js";
export default {
    components: {
        Searchbar,
        Trip,
    },
    data() {
        return {
            
            tripData: tripData,
            // 從tripData抓取行程資料並呈現(進行搜尋篩選)

            tripDisplay: [],

        };
    },
    methods: {
        //模糊搜尋
        updateDisplay() {
            if (this.$store.state.filter.searchText === "") {
                this.tripDisplay = this.tripData;
            } else {
                const regexText = this.$store.state.filter.searchText
                    .split("")
                    .join(".*");
                const regex = new RegExp(regexText, "i");
                this.tripDisplay = this.tripData.filter((item) =>
                    regex.test(item.name)
                );
            }
        },
 
    },
    computed: {},
    created() {
        this.updateDisplay();
    },
};
</script>
<style lang="scss">
@import "@/assets/scss/main.scss";

.tripOverview{

    h2{
        text-align: center;
        margin: $sp10 auto $sp5;
    }

    .breadcrumb{
        max-width: $xl;
        margin: $sp3 auto;
    }
    
    .list{
    text-align: center;

        .trip_list {
            
            max-width: $xl;
            margin: $sp4 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            column-gap: $sp4;
            row-gap: $sp6;
            @media (min-width: $md){
            }
        
            .trip_card {
                position: relative;
                cursor: pointer;
            }
    
        }
        .btn{
            margin: 0 auto $sp12;
        }
    }


}

</style>