<!-- 會員註冊資料頁面 -->
<template>
    <section class="canvas" >
        <div class="joinus_sm">
            <img src="@/assets/img/joinus_sm.png" alt="joinus">
        </div>
        <h2>加入旅著</h2>
        <div class="member_img">
            <span>上傳照片</span>
        </div>
        <button class="btn">上傳大頭貼</button>
        <form class="form" >
            <div v-for="(item, index) in tabItems" 
                :key="index">
                <label for="options">{{ item.text }}</label>
                <input type="text" v-model="options" :placeholder="item.placeholder"/>
            </div>
            <label for="year">生日</label>
            <div class="date_group">
                <select v-model="selectedYear" @change="onYearChange" id="year">
                    <option 
                        v-for="(year, index) in yearList" 
                        :key="index" 
                        :value="year">
                            {{ year }}
                    </option>
                </select>
                <select v-model="selectedMonth" @change="onMonthChange" id="month">
                    <option 
                        v-for="(month, index) in monthList" 
                        :key="index" 
                        :value="month">
                        {{ month }}
                    </option>
                </select>
                <select v-model="selectedDate" @change="onDayChange" id="selectDate">
                    <option 
                        v-for="(date, index) in dateList" 
                        :key="index" 
                        :value="date">
                        {{ date }}
                    </option>
                </select>
            </div>
            <label for="gender">性別</label>
            <div class="grnder_group">
                <input type="checkbox" id="roundCheckbox" class="round-checkbox">
                <label for="roundCheckbox" class="checkbox-label">
                    <span>男</span>
                </label>
                <!-- <input type="checkbox" id="roundCheckbox" class="round-checkbox">
                <label for="roundCheckbox" class="checkbox-label">
                    <span>女</span>
                </label> -->
                <!-- <input type="checkbox" id="roundCheckbox" class="round-checkbox">
                <label for="roundCheckbox" class="checkbox-label">
                    <span>不告訴你</span>
                </label> -->

            </div>
        </form>
    </section>
    
</template>

<script>
export default{
    data(){
        return{
            tabItems:{
                1:{
                    text:'Email',
                    placeholder:'請輸入EMAIL'
                },
                2:{
                    text:'密碼',
                    placeholder:'英數混合6-12碼'
                },
                3:{
                    text:'確認密碼',
                    placeholder:'請再輸入一次密碼'
                },
                4:{
                    text:'姓名',
                    placeholder:'請輸入姓名'
                },
                5:{
                    text:'暱稱',
                    placeholder:'請輸入暱稱'
                },
            },
            selectedYear: '', // 用於存儲選擇的年份值
            yearList: [], // 用於存儲年份選項的數組
            selectedMonth: '',
            monthList: [],
            selectedDate: '',
            dateList: [],
        }
    },
    methods: {
        onYearChange() {
            // 在這裡處理年份選項變化後的相關邏輯
            // 例如，您可以根據選擇的年份值做進一步處理
        },
        onMonthChange() {},
        onDayChange() {},
        populateYearList() {
            const currentYear = new Date().getFullYear();
            const startYear = 1970;

            for (let year = startYear; year <= currentYear; year++) {
              this.yearList.push(year.toString());
            }
            // 將預設選擇設置為當前年份
            this.selectedYear = startYear.toString();
        },
        populateMonthList() {
            const currentMonth = new Date().getMonth() + 1;
            
            for (let month = 1; month <= 12; month++) {
                // 將月份值轉換為兩位數的字符串，例如：01、02、...、12
                const formattedMonth = month.toString().padStart(2, '0');
                this.monthList.push(formattedMonth);
            }

            this.selectedMonth = currentMonth.toString().padStart(2, '0');
        },
        populateDateList(selectedYear, selectedMonth) {
            const daysInMonth = new Date(selectedYear, selectedMonth, 0).getDate();
            this.dateList = Array.from({ length: daysInMonth }, (_, index) => (index + 1).toString());
        },
    },
    watch: {
        selectedYear(newVal) {
            this.populateDateList(newVal, this.selectedMonth);
            // 將日期選擇設置為第一天（1號）
            this.selectedDate = '1';
        },
        selectedMonth(newVal) {
            this.populateDateList(this.selectedYear, newVal);
            this.selectedDate = '1';
        },
    },
    created() {
        this.populateYearList();
        this.populateMonthList();
        // 填充當前年份和月份的日期選項
        this.populateDateList(new Date().getFullYear(), new Date().getMonth() + 1);
        // 將日期選擇設置為當前日期
        this.selectedDate = new Date().getDate().toString();
    },
    
};


</script>

<style lang="scss" scoped>
    @import '@/assets/scss/main.scss';
    .canvas{
        width: 83%;
        background-color: $mid_green;
        padding: $sp8 27px;
        box-sizing: border-box;
        margin: 150px auto;
        border-radius: 30px;
        // position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        .joinus_sm{
            position: absolute;
            top: -130px;
            width: 150px;
            left: 50%;
            transform: translateX(-50%);
            overflow: hidden;
            img{
                display: block;
                height: 100%;
                width: 100%;
                object-fit: cover;
            }
        }
        h2{
            color: $textColor_white;
            font-size: $sm_h2;
            padding: 0 0 $sp4;
            font-weight: 900;
            line-height: 150%; /* 42px */
            letter-spacing: 0.84px;
        }
        .member_img{
            width: 125px;
            height: 125px;
            border-radius: 50%;
            margin: 0 0 $sp2;
            background-color: $textColor_white;
            // position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            span{
                font-size: $sm_p;
            }
        }
        button{
            margin: 0 0 $sp4;
        }
        .form{
            width: 100%;
            label{
                width: 100%;
                color: $textColor_default;
                font-size: $sm_h4;
                font-weight: 700;
                letter-spacing: 0.72px;
            }
            input{
                width: 100%;
                padding: $sp1 20px;
                background: $textColor_white;
                color: $textColor_default;
                border-radius: 50px;
                box-sizing: border-box;
                font-size: $sm_p;
                margin: $sp1 0 $sp2;
                border: 2px solid $textColor_default;
            }
            .date_group{
                display: flex;
                justify-content: space-between;
                padding: $sp1 0 $sp2;
                select {
                    // 隱藏原本的下拉箭頭
                    width: 100px;
                    appearance: none;
                    -moz-appearance: none;
                    -webkit-appearance: none;
                    background-image: url('@/assets/img/layout/down_arrow.svg');
                    background-repeat: no-repeat;
                    background-position: right 4px center;
                    // padding-right: 40px;
                    color: $textColor_default;
                    font-size: $sm_p;
                    border: 2px solid $textColor_default;
                    border-radius: 50px;
                    padding: 6px $sp2;
                    cursor: pointer;
                    &:hover {
                        color: $textColor_default;
                        background: $textColor_white;
                        box-shadow: -2px 2px 4px 0px rgba(0, 0, 0, 0.25);
                    }
                    &:active {
                        color: $textColor_tint;
                        border: 2px solid $textColor_tint;
                        background: $textColor_white;
                    }
                }
            }
            // 隱藏原本的checkbox
            .round-checkbox {
                display: none;
            }
            // 創建圓形checkbox的外觀
            .checkbox-label {
                display: inline-block;
                width: 20px;
                height: 20px;
                border-radius: 50%; // 圓形的關鍵，設置為50%
                border: 2px solid $textColor_default;
                background-color: $textColor_white;
                cursor: pointer;

                // 用於顯示被選中的checkbox
                &::after {
                    content: "";
                    display: block;
                    width: 12px;
                    height: 12px;
                    border-radius: 50%;
                    background-color: #333; // 可以自行調整選中的填充顏色
                    margin: 3px; // 調整選中標記的位置
                    visibility: hidden;
                }
            
                // 當checkbox被選中時顯示標記
                ~ .round-checkbox:checked + &::after {
                    visibility: visible;
                }
                span{
                    // width: 100px;
                    padding: 30px;
                }
            }
        

        }
}
</style>