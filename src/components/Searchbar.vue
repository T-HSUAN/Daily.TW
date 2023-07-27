<template>
    <div class="search_bar">
        <div class="multi_filter_bg">
            <div class="multi_filter">
                <div class="order_select_wrap">
                    <div class="order_tool">
                        <font-awesome-icon icon="fa-solid fa-arrow-up-wide-short" class="order_icon" />
                        <button>
                            <span>人氣</span>
                            <font-awesome-icon icon="fa-solid fa-arrow-up" class="order_arrow_icon" />
                        </button>
                        <button>
                            <span>上架時間</span>
                            <font-awesome-icon icon="fa-solid fa-arrow-up" class="order_arrow_icon" />
                        </button>
                    </div>
                    <div class="select_tool">
                        <font-awesome-icon icon="fa-solid fa-filter" class="select_icon" />
                        <select id="select_filter">
                            <option value="">地區</option>
                            <option value="">台北</option>
                            <option value="">台中</option>
                            <option value="">高雄</option>
                        </select>
                    </div>
                </div>
                <div class="search_tool">
                    <input type="text" name="search" id="search" placeholder="請輸入關鍵字"
                        v-model="$store.state.filter.searchText" />
                    <button class="btn" @click="Filter">搜尋</button>
                </div>
            </div>
        </div>
        <div class="tags_filter">
            <tag :tagTexts="tagTexts" :tagTexts.default="tagTexts.default" />
        </div>
        <!-- 在需要使用的該頁面使用以下方式即可添加標籤內容
        <Searchbar :Filter="某個可以篩選的function" :tagTexts="tagText" />
        data(){
            return{
                tagText: [
                { default: " #親子" },
                { default: " #情侶" },
            ]
            }       
        } -->
    </div>
</template>

<script>
import tag from "@/components/Tag.vue";

export default {
    components: {
        tag,
    },
    props: {
        Filter: Function,
        tagTexts: {
            type: String,
            default: "#標籤",
        }
    },
    data() {
        return {
            filter: {
                searchText: "",
            },
        };
    },
};
</script>

<style lang="scss">
@import "@/assets/scss/baseAndMixin.scss";
</style>
