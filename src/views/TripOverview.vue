<!-- 行程總覽 -->
<template>
    <div class="tripOverview">

        <!-- 麵包屑 -->
        <div class="breadcrumb">
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
        </div>

        <!-- 標題 -->
        <h2>行程總覽</h2>
        <!-- 搜尋篩選欄 -->
        <Searchbar @Filters="Filters" :tagTexts="tagTexts" :ShowClear="ShowClear" :ClearFilter="ClearFilter">
            <div class="clear_filter" v-show="ShowClear" @click="ClearFilter">x 清除所有篩選</div>
        </Searchbar>
        <!-- 行程列表 -->
        <section class="list">
            <div class="trip_list" v-if="tripDisplay.length > 0">
                <div class="trip_card" v-for="(item, index) in tripDisplay" :key="item.id">
                    <Trip :tripCardPhoto="item.img" :tripCardTags="item.tag" :tripCardTitle="item.name"
                        :tripCardDesc="item.desc" :tripCardAuthor="item.author" :tripCardDate="item.date" />
                </div>
            </div>
            <div class="no_result" v-else>查無結果，請重新輸入關鍵字</div>
            <div class="page_link">
                <a class="page" v-if="tripDisplay.length === tripData.length">1</a>
                <a class="page" v-if="tripDisplay.length === tripData.length">2</a>
                <a class="page" v-if="tripDisplay.length === tripData.length">3</a>
            </div>
        </section>
    </div>
</template>
<script>
import {GET} from '@/plugin/axios'
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
            ShowClear: false,

            tagTexts: [
                { Name: "#親子", selected: false },
                { Name: "#情侶", selected: false },
                { Name: "#小資", selected: false },
                { Name: "#風景", selected: false },
                { Name: "#樂園", selected: false },
                { Name: "#農場", selected: false },
                { Name: "#藝文", selected: false },
                { Name: "#山林", selected: false },
                { Name: "#海邊", selected: false },
                { Name: "#放鬆", selected: false },
                { Name: "#懷舊", selected: false },
            ],

        };
    },
    methods: {
        Filters() {
            const areaSelected = this.$store.state.filter.areaSelected;
            const selectedTags = this.tagTexts.filter(tag => tag.selected).map(tag => tag.Name);
            const searchText = this.$store.state.filter.searchText;
            this.tripDisplay = this.tripData.filter(item => {
                // 地區篩選
                const areaMatch = areaSelected === "所有地區" || item.location.includes(areaSelected);

                // 標籤篩選
                const tagMatch = selectedTags.length === 0 || selectedTags.every(selectedTag => item.tag.includes(selectedTag));

                // 文字模糊搜索
                const nameMatch = searchText === "" || new RegExp(searchText.split("").join(".*"), "i").test(item.Name);

                // 返回结果
                return areaMatch && tagMatch && nameMatch;
            });
        },
        //清除篩選
        ClearFilter() {
            this.$store.state.filter.areaSelected = "所有地區";
            this.$store.state.filter.searchText = "";
            this.tagTexts.forEach(tag => tag.selected = false);
            console.log('[篩選]清除篩選');
            this.tripDisplay = this.tripData;
        },

    },
    mounted() {
        GET(`${this.$URL}/tripOverview.php`)
            .then((res) => {
                console.log(res);
                this.tripDataForUser = res;
            })
            .catch((err) => {
                console.log(err);
            })
    },
    computed: {
        ShowClear() {
            if (this.tripDisplay != this.tripData) {
                console.log(this.tripDisplay);
                return true;
            } else {
                return false;
            }
        },
    },
    created() {
        this.tripDisplay = this.tripData;
    },
};
</script>
<style lang="scss">
@import "@/assets/scss/baseAndMixin.scss";

.tripOverview {
    padding: 8px 32px 32px;
    background-color: $bgColor_tint;
    overflow: hidden;

@media (min-width: 768px) {
    padding: 200px 32px 200px;
}

    h2 {
        text-align: center;
        margin: $sp10 auto $sp5;
    }

    .breadcrumb {
        max-width: $xl;
        margin: $sp3 auto;
        padding: 0 $sp2;
    }

    .list {
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

            @media (min-width: $md) {}

            .trip_card {
                position: relative;
                cursor: pointer;
            }

        }

        .page_link {
            display: flex;
            justify-content: center;

            .page {
                display: block;
                margin: $sp4 $sp1 $sp8;
                text-align: center;
                color: $textColor_default;

                &:hover {
                    color: $default_blue;
                }
            }
        }
    }


}
</style>