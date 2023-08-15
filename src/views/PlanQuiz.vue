<!-- 專屬旅著題目 -->
<template>
    <div class="question_container">
        <!-- 第一題 -->
        <div v-if="currentQuestionIndex === 0" class="question">
            <div class="title">
                <div class="number">Q1</div>
                <h2>現在想去哪裡玩呢？</h2>
            </div>
            <div class="pic">
                <div class="place">
                    <div class="place_bubble">
                        <img src="~@/assets/img/layout/plan_q1-2.png" alt="">
                    </div>
                    <div class="place_bubble">
                        <img src="~@/assets/img/layout/plan_q1-3.png" alt="">
                    </div>
                </div>
                <div class="taiwan">
                    <img src="~@/assets/img/layout/plan_q1-1.png" alt="">
                </div>
                <div class="place">
                    <div class="place_bubble">
                        <img src="~@/assets/img/layout/plan_q1-4.png" alt="">
                    </div>
                    <div class="place_bubble">
                        <img src="~@/assets/img/layout/plan_q1-5.png" alt="">
                    </div>
                </div>
            </div>
            <div class="selection">
                <div class="boy">
                    <img src="~@/assets/img/layout/plan_q1-6.png" alt="">
                </div>
                <div class="select_box">
                    <span>* 請選擇1~3個</span>
                    <Select v-model="selectValue" multiple @on-select="changeTag">
                        <Option v-for="(item, index) in cityList" :value="item.region_name" :key="index">{{ item.region_name }}</Option>
                    </Select>
                </div>
            </div>
            <button @click="nextQuestion" class="btn" :disabled="isNextButtonDisabled">
                下一題
                <img src="~@/assets/img/btn_arrow.png" alt="" class="arrow_white">
                <img src="~@/assets/img/btn_arrow_hover.png" alt="" class="arrow_brown">
            </button>
        </div>
        <!-- 第二題 -->
        <div v-if="currentQuestionIndex === 1" class="question">
            <div class="title">
                <div class="number">Q2</div>
                <h2>看到下列景點標籤，<br>哪些是你感興趣的呢？</h2>
            </div>
            <div class="question_main">
                <div class="wheel">
                    <img src="~@/assets/img/layout/plan_q2-2.png" alt="">
                </div>
                <div class="tags_container">
                    <span class="hint">* 請選擇至少3個</span>
                    <div class="tags_wrap">
                        <label v-for="(placeTag, index) in placeTags" :key="index">
                            <input type="checkbox" class="tag" 
                            v-model="checkedPlaceTags[index]"
                            @change="handleTagsChange('place',index)"/>
                            <span># {{ placeTag.place_tag_name }}</span>
                        </label>
                    </div>
                </div>
                <div class="rabbit">
                    <img src="~@/assets/img/layout/plan_q2-3.png" alt="">
                </div>
                <div class="luggage">
                    <img src="~@/assets/img/layout/plan_q2-4.png" alt="">
                </div>
            </div>
            <div class="btn_wrap">
                <button @click="prevQuestion" class="cancel_btn">回到上一題</button>
                <button @click="nextQuestion" class="btn" :disabled="isNextButtonDisabled">
                    下一題
                    <img src="~@/assets/img/btn_arrow.png" alt="" class="arrow_white">
                    <img src="~@/assets/img/btn_arrow_hover.png" alt="" class="arrow_brown">
                </button>
            </div>
        </div>
        <!-- 第三題 -->
        <div v-if="currentQuestionIndex === 2" class="question">
            <div class="title">
                <div class="number">Q3</div>
                <h2>穿搭風格百百款，<br>選出你愛的 #oott！</h2>
                <span>( Outfit of the trip )</span>
            </div>
            <div class="question_oott">
                <div class="tags_qa">
                    <div class="subtitle">
                        <h4>平常習慣穿</h4>
                        <span>* 請選擇1個</span>
                    </div>
                    <div class="tags_wrap">
                        <label v-for="(sexTag, index) in sexTags" :key="index">
                            <input type="checkbox" class="tag" 
                            v-model="checkedSexTag[index]"
                            @change="handleTagsChange('sex', index)"/>
                            <span># {{ sexTag.label }}</span>
                        </label>
                    </div>
                </div>
                <div class="dashed_line">
                    <img src="~@/assets/img/layout/plan_q3-6.png" alt="">
                </div>
                <div class="tags_qa">
                    <div class="subtitle">
                        <h4>喜歡風格有</h4>
                        <span>* 請選擇至少3個</span>
                    </div>
                    <div class="tags_wrap">
                        <label v-for="(styleTag, index) in styleTags" :key="index">
                            <input type="checkbox" class="tag"
                            v-model="checkedStyleTags[index]"
                            @change="handleTagsChange('style', index)"/>
                            <span># {{ styleTag.style_name }}</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="pic">
                <div class="boy_q3">
                    <img src="~@/assets/img/layout/plan_q3-1.png" alt="">
                </div>
                <div class="sunglasses_pants">
                    <div class="sunglasses">
                        <img src="~@/assets/img/layout/plan_q3-2.png" alt="">
                    </div>
                    <div class="pants">
                        <img src="~@/assets/img/layout/plan_q3-3.png" alt="">
                    </div>
                </div>
                <div class="shoes">
                    <img src="~@/assets/img/layout/plan_q3-4.png" alt="">
                </div>
                <div class="vest">
                    <img src="~@/assets/img/layout/plan_q3-5.png" alt="">
                </div>
            </div>
            <div class="btn_wrap">
                <button @click="prevQuestion" class="cancel_btn">回到上一題</button>
                <button @click="handleResultClick" :disabled="isNextButtonDisabled" class="btn">
                    看結果
                    <img src="~@/assets/img/btn_arrow.png" alt="" class="arrow_white">
                    <img src="~@/assets/img/btn_arrow_hover.png" alt="" class="arrow_brown">
                </button>
            </div>
        </div>
    </div>
</template>
    
<script>
import { GET } from '@/plugin/axios';

export default {
    data() {
        return {
            currentQuestionIndex: 0,
            cityList: [],
            selectValue: [], //選取地區
            placeTags: [],
            sexTags: [
                {
                    value: '男',
                    label: '男裝'
                },
                {
                    value: '女',
                    label: '女裝'
                },
                {
                    value: '',
                    label: '不限'
                },
            ],
            styleTags: [],
            checkedPlaceTags :[], //選取景點類型
            checkedSexTag :[], //選取穿搭性別
            checkedStyleTags :[], //選取穿搭風格
            placeTagIdMapping: [], //轉存place_tag_id
            // sexTagIdMapping: [], //轉存mem_id
            styleTagIdMapping: [], //轉存style_id
        }
    },
    computed: {
        isNextButtonDisabled() {
            if (this.currentQuestionIndex === 0) {
                return this.selectValue.length < 1;
            } else if (this.currentQuestionIndex === 1) {
                return this.countCheckedTags(this.checkedPlaceTags) < 3;
            } else if (this.currentQuestionIndex === 2) {
                return this.countCheckedTags(this.checkedSexTag) < 1 || this.countCheckedTags(this.checkedStyleTags) < 3;
            }
        },
    },
    methods: {
        nextQuestion() {
            if (this.currentQuestionIndex < 2) {
                this.currentQuestionIndex++;
                this.scrollToTop();
            }
        },
        prevQuestion() {
            if (this.currentQuestionIndex > 0) {
                this.currentQuestionIndex--;
                this.scrollToTop();
            }
        },
        scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'auto',
            })
        },
        // view ui 限制最多選3個
        changeTag() {
            if (this.selectValue.length < 3) {
                return false;
            }
            const data = this.selectValue;
            this.$nextTick(() => {
                if (this.selectValue.length < data.length) {
                    return false;
                }
                this.selectValue = data;
            })
        },
        limitCheckedTags(checkedArray,index){
            let tagsLimit = 1;     // 限制選1個
            if(checkedArray[index]){   // 確認勾到的有在資料裡面        
                if(this.countCheckedTags(checkedArray)>tagsLimit){
                    checkedArray[index] = false; // 取消勾選
                }
            }
        },
        // count the number of true values in an array
        countCheckedTags(checkedArray){
            return checkedArray.filter((tag) => tag).length;
        },
        handleTagsChange(tagList,index){
            let checkedArray = []; // 辨識打勾選到的 array

            if (tagList === 'place'){
                checkedArray = this.checkedPlaceTags;
            } else if(tagList === 'style'){
                checkedArray = this.checkedStyleTags;
            } else if (tagList === 'sex'){
                checkedArray = this.checkedSexTag;
                this.limitCheckedTags(checkedArray, index);
            }
        },
        // "看結果"按鈕跳轉至結果頁
        handleResultClick() {
            if (this.isNextButtonDisabled) {
                return;
            }
            // 陣列改存table id
            this.checkedPlaceTags = this.checkedPlaceTags.forEach((isChecked, index) => {
                if (isChecked) {
                    this.placeTagIdMapping.push(this.placeTags[index].place_tag_name);
                }
            });
            // this.checkedStyleTags = this.checkedStyleTags.forEach((isChecked, index) => {
            //     if (isChecked) {
            //         this.styleTagIdMapping.push(this.styleTags[index].style_id);
            //     }
            // });
            // Construct the query parameters
            const query = {
                selectValue: this.selectValue,
                checkedPlaceTags: this.placeTagIdMapping,
                checkedSexTag: this.checkedSexTag,
                checkedStyleTags: this.checkedStyleTags,
            };

            // Use Vue Router to navigate to the target route with query parameters
            this.$router.push({
                path: '/plan_result',
                query: query,
            });

            // this.$router.push('/plan_result');            
        },
    },
    mounted() {
        this.currentQuestionIndex = 0;
        GET(`${this.$URL}/PlanQuizRegion.php`)
            .then((res) => {
                console.log(res);
                this.cityList = res;
            })
            .catch((err) => {
                console.log(err);
            });
        GET(`${this.$URL}/PlanQuizPlaceTag.php`)
            .then((res) => {
                console.log(res);
                this.placeTags = res;
            })
            .catch((err) => {
                console.log(err);
            });
        GET(`${this.$URL}/PlanQuizStyle.php`)
            .then((res) => {
                console.log(res);
                this.styleTags = res;
            })
            .catch((err) => {
                console.log(err);
            });
    },
};
</script>
    
<style lang="scss">
@import "@/assets/scss/baseAndMixin.scss";

.question_container{
    background-color: $bgColor_default;
    padding-top:96px;
    @media (min-width: $md) {
        padding-top:240px;
    }
    .question {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: $bgColor_default;
        overflow: hidden;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center center;
        background-image: url("~@/assets/img/layout/plan_bg_sm.png");
        animation: fadeIn .5s ease-in;

        @media (min-width: $md) {
            background-image: url("~@/assets/img/layout/plan_bg_xl.png");
        }

        .title {
            display: flex;
            align-items: center;
            flex-direction: column;
            gap: $sp2;
            padding: $sp4 0;

            @media (min-width: $md) {
                flex-direction: row;
                gap: $sp3;
                padding: $sp4 0 $sp3 0;
            }

            .number {
                font-size: 36px;
                font-weight: 900;
                line-height: 65px;
                text-align: center;
                color: $textColor_white;
                -webkit-text-stroke: 2px $textColor_default;
                width: 71px;
                height: 72px;
                background-image: url(~@/assets/img/layout/plan_qa.png);
                background-size: contain;
                background-repeat: no-repeat;

                @media (min-width: $md) {
                    font-size: 45px;
                    line-height: 80px;
                    width: 87px;
                    height: 88px;
                }
            }

            h2 {
                line-height: 150%;
                @include sm_h2;

                @media (min-width: $md) {
                    @include xl_h2;
                }
            }
        }

        .pic {
            display: flex;

            .taiwan {
                img {
                    width: 138px;

                    @media (min-width: $md) {
                        width: 233px;
                    }
                }
            }

            .place:nth-child(1) {
                display: none;

                @media (min-width: $md) {
                    display: block;

                    .place_bubble:nth-child(1) {
                        position: relative;
                        right: 80px;
                        top: 40px;
                        animation: float 1s linear infinite alternate;

                        img {
                            width: 145px;
                        }
                    }

                    .place_bubble:nth-child(2) {
                        position: relative;
                        right: 30px;
                        top: 100px;
                        animation: float 1s .5s linear infinite alternate;

                        img {
                            width: 126px;
                        }
                    }
                }
            }

            .place:nth-child(3) {
                .place_bubble:nth-child(1) {
                    position: relative;
                    left: 20px;
                    top: 30px;
                    animation: float 1s .5s linear infinite alternate;

                    @media (min-width: $md) {
                        left: 30px;
                        top: 0;
                    }

                    img {
                        width: 70px;

                        @media (min-width: $md) {
                            width: 101px;
                        }
                    }
                }

                .place_bubble:nth-child(2) {
                    position: relative;
                    left: 30px;
                    top: 40px;
                    animation: float 1s linear infinite alternate;

                    @media (min-width: $md) {
                        top: 50px;
                        left: 60px;
                    }

                    img {
                        width: 94px;

                        @media (min-width: $md) {
                            width: 128px;
                        }
                    }
                }
            }
        }

        .selection {
            padding: $sp3 0 $sp4 0;
            position: relative;

            .boy {
                position: absolute;
                bottom: 70px;
                right: 50px;

                @media (min-width: $md) {
                    bottom: 70px;
                    right: 0;
                }

                img {
                    width: 119px;

                    @media (min-width: $md) {
                        width: 187px;
                    }
                }
            }

            .select_box {
                display: flex;
                flex-direction: column;

                span {
                    @include sm_p;
                    margin-bottom: $sp1;

                    @media (min-width: $md) {
                        @include xl_p;
                    }
                }

                span.ivu-select-placeholder {
                    display: none;
                }

                .ivu-select-selection {
                    height: 40px;
                    border: 3px solid $textColor_default !important;
                    border-radius: 10px !important;
                    box-shadow: none !important;
                    width: 311px;
                    padding: 0 $sp1;

                    @media (min-width: $md) {
                        width: 375px;
                    }
                }

                .ivu-select-item {
                    color: $textColor_default;
                }
                .ivu-select-item-selected,
                .ivu-select-item-selected::after{
                    color: $default_red;
                }

                .ivu-tag {
                    border: none;
                    background: $textColor_default;
                    height: 28px;
                }

                .ivu-tag-text {
                    color: $textColor_white;
                    font-size: 14px;
                    line-height: 28px;
                }

                .ivu-icon-ios-close {
                    color: $textColor_white;
                    font-size: 14px;
                    line-height: 21px;
                    font-weight: 700;
                }
                .ivu-select-arrow {
                    color: $textColor_default;
                }
            }

            // select{
            //     position: relative;
            //     z-index: 1;
            //     width: 311px;
            //     @media (min-width: $md){
            //         width: 375px;
            //     }
            // }
        }

        .btn {
            margin-bottom: 128px;
            position: relative;

            img {
                width: 40px;

                @media (min-width: $md) {
                    width: 45px;
                }
            }

            .arrow_white {
                position: absolute;
                right: 24px;

                @media (min-width: $md) {
                    right: 32px;
                }
            }

            &:hover {
                .arrow_white {
                    display: none;
                }
            }
        }

        // 第二題
        .question_main {
            display: flex;
            align-items: flex-end;

            .wheel {
                display: none;

                @media (min-width: $md) {
                    display: block;
                    position: relative;
                    left: 100px;
                    bottom: 30px;
                    z-index: 1;

                    img {
                        width: 264px;
                    }
                }
            }

            .tags_container {
                width: 410px;
                height: 350px;
                background-image: url(~@/assets/img/layout/plan_q2-1.png);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: top center;
                position: relative;

                @media (min-width: $md) {
                    width: 580px;
                    height: 490px;
                }

                span.hint {
                    @include sm_p;
                    position: absolute;
                    top: 80px;
                    left: 70px;

                    @media (min-width: $md) {
                        @include xl_p;
                        top: 115px;
                        left: 120px;
                    }
                }

                .tags_wrap {
                    width: 300px;
                    display: flex;
                    flex-wrap: wrap;
                    gap: $sp2;
                    position: relative;
                    top: 135px;
                    left: 85px;

                    @media (min-width: $md) {
                        width: 400px;
                        top: 190px;
                        left: 120px;
                        gap: $sp3;
                    }
                }
            }

            .rabbit {
                display: none;

                @media (min-width: $md) {
                    display: block;
                    position: relative;
                    right: 95px;
                    bottom: 30px;
                    z-index: 1;

                    img {
                        width: 95px;
                    }
                }
            }

            .luggage {
                display: none;

                @media (min-width: $md) {
                    display: block;
                    position: relative;
                    right: 155px;
                    bottom: 30px;

                    img {
                        width: 180px;
                    }
                }
            }
        }

        .btn_wrap {
            .cancel_btn {
                margin-right: $sp3;
            }
        }

        // 第三題
        .title {
            position: relative;

            span {
                @include sm_p;
                position: absolute;
                right: 0;
                top: 88%;

                @media (min-width: $md) {
                    @include xl_p;
                }
            }
        }

        .question_oott {
            width: 340px;
            padding-top: $sp2;
            padding-bottom: $sp10;

            @media (min-width: $md) {
                width: 590px;
                padding-top: $sp4;
                padding-bottom: 0;
            }

            .tags_qa {
                display: flex;
                flex-direction: column;
                gap: $sp2;

                @media (min-width: $md) {
                    flex-direction: row;
                }

                .subtitle {
                    display: flex;
                    align-items: flex-end;
                    gap: $sp1;

                    @media (min-width: $md) {
                        display: block;
                    }

                    h4 {
                        @include sm_h4;
                        white-space: nowrap;
                        line-height: 24px;

                        @media (min-width: $md) {
                            @include xl_h4;
                            line-height: 36px;
                        }
                    }

                    span {
                        @include sm_p;
                        white-space: nowrap;

                        @media (min-width: $md) {
                            @include xl_p;
                            line-height: 150%;
                        }
                    }
                }

                .tags_wrap {
                    display: flex;
                    flex-wrap: wrap;
                    gap: $sp2;
                }
            }

            .dashed_line {
                padding: 4px 0 $sp1 0;
                position: relative;
                left: -10px;

                @media (min-width: $md) {
                    padding: $sp1 0 $sp2 0;
                    left: 0;
                }

                img {
                    width: 340px;

                    @media (min-width: $md) {
                        width: 590px;
                    }
                }
            }

            .tags_qa:nth-child(1) {
                .tags_wrap {
                    position: relative;
                    left: 0;

                    @media (min-width: $md) {
                        left: 16px;
                    }
                }
            }

            .tags_qa:nth-child(3) {
                .tags_wrap {
                    justify-content: flex-end;
                    position: relative;
                    left: -14px;

                    @media (min-width: $md) {
                        left: 0;
                    }
                }
            }
        }

        .pic {
            .boy_q3 {
                margin-bottom: -80px;
                position: relative;
                bottom: 80px;
                right: 35px;

                @media (min-width: $md) {
                    bottom: 100px;
                    right: 70px;
                }

                img {
                    width: 149px;

                    @media (min-width: $md) {
                        width: 231px;
                    }
                }
            }

            .sunglasses_pants {
                position: relative;
                right: 0;
                top: -20px;

                @media (min-width: $md) {
                    right: 70px;
                    top: 20px;
                }

                .sunglasses {
                    position: relative;
                    left: -40px;
                    bottom: 20px;

                    @media (min-width: $md) {
                        left: 40px;
                        bottom: 20px;
                    }

                    img {
                        width: 47px;

                        @media (min-width: $md) {
                            width: 73px;
                        }
                    }
                }

                .pants {
                    img {
                        width: 64px;

                        @media (min-width: $md) {
                            width: 101px;
                        }
                    }
                }
            }

            .shoes {
                position: relative;
                right: -10px;
                top: -30px;

                @media (min-width: $md) {
                    right: 25px;
                    top: 50px;
                }

                img {
                    width: 75px;

                    @media (min-width: $md) {
                        width: 127px;
                    }
                }
            }

            .vest {
                display: none;

                @media (min-width: $md) {
                    display: block;
                    position: relative;
                    top: 20px;

                    img {
                        width: 119px;
                    }
                }
            }
        }

        @keyframes float {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(10px);
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    }
}

</style>