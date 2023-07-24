<!-- 行程總覽 -->
<template>
    <div class="oottOverview">

        <!-- 麵包屑 -->
        <div class="breadcrumb">
            <router-link to="/">
                <span>首頁</span>
            </router-link>
            <font-awesome-icon icon="fa-solid fa-chevron-right" />
            <router-link to="/oott">
                <span>穿搭特輯</span>
            </router-link>
            <font-awesome-icon icon="fa-solid fa-chevron-right" />
            <router-link to="/oott_overview">
                <span>穿搭總覽</span>
            </router-link>
        </div>

        <!-- 標題 -->
        <h2>穿搭總覽</h2>
        <!-- 搜尋篩選欄 -->
        <Searchbar :Filter="updateDisplay" />
        <!-- 穿搭列表 -->
        <section class="list">
            <div class="oott_list" v-if="tripDisplay.length > 0">
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
.breadcrumb {
    display: flex;
    align-items: center;
    font-size: 16px;
    gap: 4px;
    @media (min-width: 768px) {
        font-size: 18px;
        gap: $sp1;
    }
    a {
        color: $textColor_default;
        letter-spacing: 0.6px;
    }
    a:last-child {
        color: $default_yellow;
        padding-bottom: 2px;
        @media (min-width: 768px) {
            padding-bottom: $sp1;
        }
        &::before {
            content: "";
            display: inline-block;
            width: 13px;
            height: 16px;
            background-image: url("~@/assets/img/layout/flag_oott.svg");
            background-size: 100%;
            background-repeat: no-repeat;
            padding-right: 4px;
            transform: translateY(1px);
            @media (min-width: 768px) {
                width: 20px;
                height: 24px;
                transform: translateY(3px);
            }
        }
    }
}

.tripOverview{

    h2{
        text-align: center;
        margin: $sp10 auto $sp5;
    }

    .breadcrumb{
        max-width: $xl;
        margin: $sp3 auto;
        padding: 0 $sp2;
    }
    
    .list{
    display: flex;
    flex-direction: column;
    align-items: center;

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