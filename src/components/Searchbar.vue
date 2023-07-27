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
                            <option value="">新北</option>
                            <option value="">臺北</option>
                            <option value="">基隆</option>
                            <option value="">桃園</option>
                            <option value="">新竹</option>
                            <option value="">苗栗</option>
                            <option value="">臺中</option>
                            <option value="">彰化</option>
                            <option value="">雲林</option>
                            <option value="">嘉義</option>
                            <option value="">南投</option>
                            <option value="">臺南</option>
                            <option value="">高雄</option>
                            <option value="">屏東</option>
                            <option value="">宜蘭</option>
                            <option value="">花蓮</option>
                            <option value="">臺東</option>
                            <option value="">澎湖</option>
                            <option value="">金門</option>
                            <option value="">連江</option>
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
            <label v-for="item in tagTexts" :key="item">
                <input type="checkbox" class="tag" />
                <span>{{ item.default }}</span>
            </label>
            <!-- <tag :tagTexts="tagTexts" :tagTexts.default="tagTexts.default" /> -->
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
// import tag from "@/components/Tag.vue";

export default {
    components: {
        // tag,
    },
    props: {
        Filter: Function,
        tagTexts: {
            type: [Object, String],
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

label {
    width: 92px;
    height: 45px;
}
</style>
