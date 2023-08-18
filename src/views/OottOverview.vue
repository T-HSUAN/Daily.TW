<!-- 穿搭總覽 -->
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
        <Searchbar @Filters="Filters" :tagTexts="tagTexts" :ShowClear="ShowClear" :ClearFilter="ClearFilter">
            <div class="clear_filter" v-show="ShowClear" @click="ClearFilter">x 清除所有篩選</div>
        </Searchbar>
        <!-- 穿搭列表 -->
        <section class="list">
            <div class="oott_list" v-if="oottDisplay.length > 0">
            <div class="oott_card" v-for="(item, index) in paginatedOottDisplay" :key="item.id">
                    <router-link :to="item.link" title="點擊查看穿搭詳情">
                        <Oott :oottCardId="item.id" :oottPhoto="item.img" :oottCardTags="item.tag" :oottCardDate="item.date"
                            :oottAuthorPhoto="item.authorphoto" :oottCardAuthor="item.author" />
                    </router-link>
                </div>
            </div>
            <div class="no_result" v-else>查無結果，請重新輸入關鍵字</div>
            <div class="page_link">
                <a class="page" v-for="(page, pageIndex) in totalPages" :key="pageIndex"
                @click="changePage(pageIndex + 1)">{{ pageIndex + 1 }}</a>
            </div>
        </section>
    </div>
</template>
<script>
import Searchbar from "@/components/Searchbar.vue";
import Oott from "@/components/OottCard.vue";
import oottData from "@/store/oottData.js";
export default {
    components: {
        Searchbar,
        Oott,
    },
    data() {
        return {

            tagTexts: [
                { Name: "#運動" ,selected: false},
                { Name: "#韓系" ,selected: false},
                { Name: "#日系" ,selected: false},
                { Name: "#性感" ,selected: false},
                { Name: "#文青" ,selected: false},
                { Name: "#休閒" ,selected: false},
                { Name: "#可愛" ,selected: false},
                { Name: "#潮流" ,selected: false},
                { Name: "#復古" ,selected: false},
                { Name: "#美式" ,selected: false},
                { Name: "#簡約" ,selected: false},
            ],
            oottData: oottData,
            // 從oottData抓取資料並呈現(進行搜尋篩選)

            oottDisplay: [],
            //請自己更改標籤內容就可以
            ShowClear: false,
            itemsPerPage: 12,
            currentPage: 1,
        };
    },
    methods: {
        Filters() {
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
        },
        //清除篩選
        ClearFilter() {
            this.$store.state.filter.areaSelected = "所有地區";
            this.$store.state.filter.searchText = "";
            this.tagTexts.forEach(tag => tag.selected = false);
            console.log('[篩選]清除篩選');
            this.oottDisplay = this.oottData;
        },
        changePage(page) {
            this.currentPage = page;
        },
    },
    computed: {
        ShowClear() {
            if (this.oottDisplay != this.oottData) {
                console.log(this.oottDisplay);
                return true;
            } else {
                return false;
            }
        },
        paginatedOottDisplay() {
            const startIndex = (this.currentPage - 1) * this.itemsPerPage;
            const endIndex = startIndex + this.itemsPerPage;
            return this.oottDisplay.slice(startIndex, endIndex);
        },

        totalPages() {
            return Math.ceil(this.oottDisplay.length / this.itemsPerPage);
        },
    },
    created() {
        this.oottDisplay = this.oottData;
    },
};
</script>
<style lang="scss" >
@import "@/assets/scss/baseAndMixin.scss";

.oottOverview {
    background: $bgColor_tint;
    padding-top: 74px;
    
    @media (min-width: 768px) {
        padding-top: 200px;
    }
    .multi_filter{
            display: none !important;
    }
    .no_result{
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
