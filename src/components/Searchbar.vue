<template>
    <div class="search_bar">
        <div class="multi_filter">
            <div class="order_select_wrap">
                <div class="order_tool">
                    <div class="order_icon">
                        <font-awesome-icon icon="fa-solid fa-arrow-up-wide-short" />
                    </div>
                    <button>
                        <span>人氣</span>
                        <div class="order_arrow_icon">
                            <font-awesome-icon icon="fa-solid fa-arrow-up" />
                        </div>
                    </button>
                    <button>
                        <span>上架時間</span>
                        <div class="order_arrow_icon">
                            <font-awesome-icon icon="fa-solid fa-arrow-up" />
                        </div>
                    </button>
                </div>
                <div class="select_tool">
                    <div class="select_icon">
                        <font-awesome-icon icon="fa-solid fa-filter"/>
                    </div>
                    <select id="select_filter">
                        <option value="">地區</option>
                        <option value="">台北</option>
                        <option value="">台中</option>
                        <option value="">高雄</option>
                    </select>
                    <div class="select_arrow">
                        <font-awesome-icon icon="fa-solid fa-sort-down" />
                    </div>
                </div>
            </div>
            <label class="search_tool">
                <input type="text" name="search" id="search" placeholder="請輸入關鍵字"/>
                <button class="btn">搜尋</button>
            </label>
        </div>
        <div class="tags_filter">
            <!-- 不知道要如何帶入已製作好的tag -->
        </div>
    </div>
</template>

<script>
// export default {
//     name: 'tag',
//     props: {
//         tagTexts:{
//             default:'#標籤',
//         }
//     }
// } 
</script>

<style lang="scss">
@import "@/assets/scss/main.scss";
</style>