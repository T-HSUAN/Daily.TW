<!-- 穿搭總覽 -->
<template>
    <div class="oottOverview">
        <!-- 麵包屑 -->
        <div class="breadcrumb">
            <router-link to="/Home">
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
        <Searchbar @Filters="oottDisplay" :tagTexts="tagTexts" :searchText="searchText">
            <div class="clear_filter" v-show="ShowClear" @click="ClearFilter">x 清除所有篩選</div>
        </Searchbar>
        <!-- 穿搭列表 -->
        <section class="list">
            <div class="oott_list" v-if="oottDisplay.length > 0">
                <div class="oott_card" v-for="item in oottDisplay" :key="item.id">
                    <Oott 
                    :oottCardId="+item.oott_id"
                    :oottPhoto="getOottImg(item.oott_img)" 
                    :oottCardTags="item.concatenated_style_name" 
                    :oottCardDate="item.oott_date"
                    :oottAuthorPhoto="getMemImg(item.mem_img)" 
                    :oottCardAuthor="item.mem_name" />
                </div>
            </div>
            <div class="no_result" v-else>查無結果，請重新輸入關鍵字</div>
            <div class="pages">
                <Page :total="dataLength" v-model="page.index" :page-size="page.size" />
            </div>
        </section>
    </div>
</template>
<script>
import { GET } from '@/plugin/axios'
import Searchbar from "@/components/Searchbar.vue";
import Oott from "@/components/OottCard.vue";
// import oottData from "@/store/oottData.js";
export default {
    components: {
        Searchbar,
        Oott,
    },
    data() {
        return {
            // oottData: oottData,
            // 從oottData抓取資料並呈現(進行搜尋篩選)
            oottDisplay: [],
            // ShowClear: false,

            tagTexts: [
                { Name: "#運動", selected: false },
                { Name: "#派對", selected: false },
                { Name: "#日系", selected: false },
                { Name: "#性感", selected: false },
                { Name: "#懷舊", selected: false },
                { Name: "#休閒", selected: false },
                { Name: "#可愛", selected: false },
                { Name: "#潮流", selected: false },
                { Name: "#復古", selected: false },
                { Name: "#美式", selected: false },
                { Name: "#簡約", selected: false },
            ],
            page: {
                index: 1, //當前分頁
                size: 20, //一頁多少筆資料
            },
            ShowClear: false,

        };
    },
    methods: {
        // Filters() {
        //     console.log(this.oottDisplay)
        //     // const areaSelected = this.$store.state.filter.areaSelected;
        //     // const selectedTags = this.tagTexts.filter(tag => tag.selected).map(tag => tag.Name);
        //     // const searchText = this.$store.state.filter.searchText;
        //    console.log(this.oottData)
        //     this.oottDisplay = this.oottData.filter(item => {
        //         // 地區篩選
        //         // const areaMatch = areaSelected === "所有地區" || item.location.includes(areaSelected);

        //         // 標籤篩選
        //         // const tagMatch = selectedTags.length === 0 || selectedTags.every(selectedTag => item.tag.includes(selectedTag));

        //         // 文字模糊搜索
        //         // const nameMatch = searchText === "" || new RegExp(searchText.split("").join(".*"), "i").test(item.Name);
        //         // 返回结果
        //         // return areaMatch && tagMatch && nameMatch;
        //         return true
        //     });
        // },
        ClearFilter() {
            this.$store.state.filter.areaSelected = "所有地區";
            this.$store.state.filter.searchText = "";
            this.tagTexts.forEach(tag => tag.selected = false);
            console.log('[篩選]清除篩選');
            this.oottDisplay = this.oottData;
        },
        getOottImg(oottImg) {
            return process.env.BASE_URL + 'oottImg/' + oottImg ;
        },
        getMemImg(memImg) {
            return process.env.BASE_URL + 'profileImg/' + memImg ;
        },
        
    },
    mounted() {
        const oottId = this.$route.params.oott_id;
        GET(`${this.$URL_}/oottOverview.php?oott_id=${oottId}`)
            .then((res) => {
                console.log(res);
                this.oottDisplay = res;
            })
            .catch((err) => {
                console.log(err);
            })
    },
    computed: {
       //資料分頁&篩選
       oottsDisplay() {
            const areaSelected = this.$store.state.filter.areaSelected;
            const selectedTags = this.tagTexts.filter(tag => tag.selected).map(tag => tag.Name);
            const searchText = this.$store.state.filter.searchText;
            this.oottDisplay = this.oottData.filter(item => {
                // 地區篩選
                const areaMatch = areaSelected === "所有地區" || item.location.includes(areaSelected);

                // 標籤篩選
                const tagMatch = selectedTags.length === 0 || selectedTags.every(selectedTag => item.tag.includes(selectedTag));

                // 文字模糊搜索
                const nameMatch = searchText === "" || new RegExp(searchText.split("").join(".*"), "i").test(item.author);

                // 返回结果
                return areaMatch && tagMatch && nameMatch;
            });
            return this.oottDisplay.slice((this.page.index - 1) * this.page.size, this.page.index * this.page.size);
        },
        dataLength() {
            console.log('票券長度', this.oottDisplay.length);
            return this.oottDisplay.length;

        },
    },
    // created() {
    //     this.fetchOottData().then(() => {
    //         this.oottDisplay = this.oottData; // 進入頁面時，將商品資料載入至畫面
    //     });
    // },
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/baseAndMixin.scss";

.oottOverview {
    background: $bgColor_tint;
    padding-top: 74px;

    @media (min-width: 768px) {
        padding-top: 200px;
    }

    .no_result {
        padding: 40px;
        font-size: $sm_h4;

        @media (min-width: 768px) {
            font-size: $xl_h4;
        }
    }

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


    h2 {
        text-align: center;
        margin: $sp10 auto $sp5;
    }

    .breadcrumb {
        max-width: $xl;
        margin: $sp3 auto;
        padding: 0 $sp2;
        background-color: $bgColor_tint;
    }

    .list {
        display: flex;
        flex-direction: column;
        align-items: center;

        .oott_list {
            max-width: $xl;
            margin: $sp4 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            column-gap: $sp4;
            row-gap: $sp6;

            .oott_card {
                // position: relative;
                cursor: pointer;
                color: $textColor_default;

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
