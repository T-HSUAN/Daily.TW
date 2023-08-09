<template>
    <!-- 篩選功能請參考TicketView編寫 -->
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
                <!-- 文字篩選 -->
                <div class="search_tool">
                    <input type="text" name="search" id="search" placeholder="請輸入關鍵字"
                        v-model="$store.state.filter.searchText" />
                    <button class="btn" @click="Filter">搜尋</button>
                    <button class="cancel" @click="CancelFilter">x</button>
                    <!-- <font-awesome-icon icon="fa-solid fa-xmark" /> -->
                </div>
                <!-- 使用說明:在store:index.js->Filter中添加一個任意名稱的空字串 
                function請參考TicketsFilter()-->
            </div>
        </div>
        <!-- 標籤篩選 -->
        <div class="tags_filter">
            <label v-for="(item, index) in tagTexts" :key="item">
                <input type="checkbox" class="tag" v-model="item.selected" @click="switchTagSelection(item)" />
                <span>{{ item.default }}</span>
            </label>
        </div>
        <!-- 使用說明；在需要使用的該頁面使用以下方式即可添加標籤內容
            第一步驟：在data中添加tagTexts
            function請參考TagsFilter()            
        <Searchbar :Filter="某個篩選的function" :tagTexts="tagText" />
        data(){
            return{
                tagText: [
                { default: "#親子" },
                { default: "#情侶" },
            ]
            }       
        }
        第二步驟：在store:index.js->Filter中添加一個任意名稱的空陣列
        -->
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
            type: Array,
            default: () => ([
                { default: "#標籤", selected: false }, // 示例的默认标签
                // ...其他标签
            ]),
            required: true,
        },
        TagsFilter: Function,
        CancelFilter: Function,
    },
    data() {
        return {
            filter: {
                searchText: "",
            },
        };
    },
    methods: {
        switchTagSelection(tag) {
            tag.selected = !tag.selected;
            this.$emit('TagsFilter');
        },
    },
};
</script>

<style lang="scss">
@import "@/assets/scss/baseAndMixin.scss";
</style>
