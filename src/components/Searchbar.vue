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
                    <!-- 地區篩選 -->
                    <div class="select_tool">
                        <font-awesome-icon icon="fa-solid fa-filter" class="select_icon" />
                        <select id="select_filter" v-model="$store.state.filter.areaSelected" @change="AreaFilter">
                            <option v-for="area in $store.state.area" :value="area" :key="area">{{ area }}
                            </option>
                            <!-- <option value="">地區</option>
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
                            <option value="">連江</option> -->
                        </select>
                    </div>
                    <!-- <div class="tags_filter_status">
                        <span>已選擇</span>
                        <span class="tags_filter_status_num" v-for="tag in $store.state.filter.selectedTags" :key="tag"
                            @change="tag">{{
                                tag }}</span>
                        <span></span>
                    </div> -->
                </div>
                <!-- 文字篩選 -->
                <div class="search_tool">
                    <input type="text" name="search" id="search" placeholder="請輸入關鍵字"
                        v-model="$store.state.filter.searchText" />
                    <button class="btn" @click="TextFilter">搜尋</button>
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
                <span>{{ item.Name }}</span>
            </label>
        </div>
        <!-- 使用說明；在需要使用的該頁面使用以下方式即可添加標籤內容
            第一步驟：在data中添加tagTexts
            function請參考TagsFilter()            
        <Searchbar :Filter="某個篩選的function" :tagTexts="tagText" />
        data(){
            return{
                tagText: [
                { Name: "#親子" },
                { Name: "#情侶" },
            ]
            }       
        }
        第二步驟：在store:index.js->Filter中添加一個任意名稱的空陣列
        -->
    </div>
</template>

<script>
export default {
    components: {
    },
    props: {
        AreaFilter: Function,
        TextFilter: Function,
        tagTexts: {
            type: Array,
            default: () => ([
                { Name: "#標籤", selected: false }, // 示例的默认标签
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
