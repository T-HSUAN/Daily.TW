<template>
    <!-- 篩選功能請參考TicketView編寫 -->
    <div class="search_bar">
        <div class="multi_filter_bg">
            <div class="multi_filter">
                <div class="order_select_wrap">
                    <!-- <div class="order_tool">
                        <font-awesome-icon icon="fa-solid fa-arrow-up-wide-short" class="order_icon" />
                        <button>
                            <span>人氣</span>
                            <font-awesome-icon icon="fa-solid fa-arrow-up" class="order_arrow_icon" />
                        </button>
                        <button>
                            <span>上架時間</span>
                            <font-awesome-icon icon="fa-solid fa-arrow-up" class="order_arrow_icon" />
                        </button>
                    </div> -->
                    <!-- 篩選function 地區、文字、標籤篩選共用:Filters() -->
                    <!-- 地區篩選 -->
                    <div class="select_tool">
                        <font-awesome-icon icon="fa-solid fa-filter" class="select_icon" />
                        <select id="select_filter" v-model="$store.state.filter.areaSelected" @change="Filters">
                            <option v-for="area in $store.state.area" :value="area" :key="area">{{ area }}
                            </option>
                        </select>
                    </div>
                </div>
                <!-- 使用說明:在store:index.js->filter中添加一個任意名稱的空字串
                        ex: areaSelected:"所有地區(預設顯示的內容)"-->
                <!-- 文字篩選 -->
                <div class="search_tool">
                    <input type="text" name="search" id="search" placeholder="請搜尋景點名稱"
                        v-model="$store.state.filter.searchText" />
                    <!-- <button class="btn" @click="Filters">搜尋</button> -->
                    <button class="cancel" @click="ClearText">x</button>
                    <!-- <font-awesome-icon icon="fa-solid fa-xmark" /> -->
                </div>
                <!-- 使用說明:在store:index.js->filter中添加一個任意名稱的空字串 
                ex: searchText: ""-->
            </div>
        </div>
        <!-- 標籤篩選 -->
        <div class="tags_filter">
            <label v-for="(item, index) in tagTexts" :key="item">
                <input type="checkbox" class="tag" v-model="item.selected" @click="switchTagSelection(item)" />
                <span>{{ item.Name }}</span>
            </label>
            <slot></slot>
            <!-- 可以在自己頁面加上清除篩選 class名:clear_filter(已設定css) 
            <div class="clear_filter" v-show="ShowClear" @click="ClearFilter">x 清除所有篩選</div>-->
        </div>
        <!-- 使用說明；在自己頁面使用添加以下標籤內容
            第一步驟：在data中添加tagTexts            
        data(){
            return{
                tagText: [
                { Name: "#親子", selected: false},
                { Name: "#情侶", selected: false},
            ]
            }       
        }
        第二步驟：在store:index.js->Filter中添加一個任意名稱的空陣列
        ex: selectedTags: [] ,並修改下面的switchTagSelection(item)內容-->
    </div>
</template>

<script>
export default {
    components: {
    },
    props: {
        tagTexts: {
            type: Array,
            default: () => ([
                { Name: "#標籤", selected: false },
                // ...其他标签
            ]),
            required: true,
        },
        // Filters: Function,
        ClearFilter: Function,
    },
    data() {
        return {
        };
    },
    methods: {
        ClearText() {
            this.$store.state.filter.searchText = "";
        },
        Filters() {
            this.$emit('Filters');
        },
        switchTagSelection(item) {
            item.selected = !item.selected;
            let selectedTags = this.$store.state.filter.selectedTags
            selectedTags = this.tagTexts.filter(item => item.selected).map(item => item.Name);
            this.$emit('Filters', selectedTags);
        },//this.$store.state.filter.selectedTags改成自己的標籤Array
    },
};
</script>

<style lang="scss">
@import "@/assets/scss/baseAndMixin.scss";
</style>
