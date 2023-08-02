<template>
    <div class="oott_edit_wrap">
        <div class="post_title">
            <h2>穿搭管理</h2>
        </div>

        <div class="oott_edit_container">
            <!-- Sidebar -->
            <Sidenav class="sidenav"></Sidenav>
            <!-- 內容區域 -->
            <div class="post_content_wrap">
                <!-- 麵包屑 -->
                <div class="breadcrumb">
                    <font-awesome-icon icon="fa-solid fa-chevron-left" />  
                    <router-link to="/my_oott">
                        <span>我的穿搭</span>
                    </router-link>
                </div>
                
                <div class="post_edit_title">
                    <h3>貼文編輯</h3>
                    <span >狀態：</span>
                    <span class="status">！待修改</span>
                </div>

                <hr>
                
                <div class="post_content_container">
                    <div class="photo_area">
                        <div class="edit_subtitle">
                            <div class="edit_header">
                                <h5>*穿搭照片</h5>
                            </div>
                            <div class="review_feedback">
                                V 審核通過
                            </div>
                        </div>
                        <div class="photo_preview">
                            <label for="postPhoto">
                                <input type="file" name="postPhoto" id="postPhoto">
                                + <br> 點此選擇照片上傳
                            </label>
                        </div>
                    </div>
                    <!-- 右方的文字和標籤 -->
                    <div class="text_area">
                        <div class="post_desc">
                            <div class="edit_subtitle">
                                <div class="edit_header">
                                    <h5>*穿搭描述</h5>
                                    <span class="text_limit edit_instruction">*字數 200/200</span>
                                </div>
                                <div class="review_feedback">
                                    ！待修改：勿使用不雅文字
                                </div>
                            </div>
                            <textarea name="" id="" cols="5" rows="10"></textarea>
                        </div>
                        <div class="style_tags">
                            <div class="edit_subtitle">
                                <div class="edit_header">
                                    <h5>*穿搭風格</h5>
                                    <span lass="edit_instruction">請選擇1~3個</span>
                                </div>
                                <div class="review_feedback">
                                    ！待修改：勿使用不雅文字
                                </div>
                            </div>
                                <label v-for="(styleTag, index) in styleTags" :key="styleTag.index">
                                    <input type="checkbox" class="tag" :id="`styleTag-${index}`"/>
                                    <span># {{ styleTag }}</span>
                                </label>
                        </div>
                        <div class="place_tags">
                            <div class="edit_subtitle">
                                <div class="edit_header">
                                    <h5>*景點類型</h5>
                                    <span>請選擇1~3個</span>
                                </div>
                                <div class="review_feedback">
                                    V審核通過
                                </div>
                            </div>
                                <label v-for="(placeTag, index) in placeTags" :key="placeTag.index">
                                    <input type="checkbox" class="tag" />
                                    <span># {{ placeTag }}</span>
                                </label>
                        </div>
                        <div class="season_tags">
                            <div class="edit_subtitle">
                                <div class="edit_header">
                                    <h5>*穿搭季節</h5>
                                </div>
                                <div class="review_feedback">
                                    V審核通過
                                </div>
                            </div>
                                <label v-for="(seasonTag, index) in seasonTags" :key="seasonTag.index">
                                    <input type="checkbox" class="tag" />
                                    <span>{{ seasonTag }}</span>
                                </label>
                        </div>
                        <div class="button_area">
                            <button class="cancel_btn">
                                <router-link to="/my_oott" >取消編輯</router-link>
                            </button>
                            <button class="btn" @click="showPopbox">送出審核</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <!-- pop_box-->
        <div class="member_sm" v-if="isPopBoxVisible">
            <div class="block">
                <div class="pic">
                    <img src="~@/assets/img/popbox_check.svg" alt="">
                    <h3>完成送出，請耐心<br>等候審核結果</h3>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
import Sidenav from "@/components/Sidenav.vue";
export default{
    data(){
        return{
            isPopBoxVisible: false,
            styleTags : [  "日系",  "復古",  "韓系",  "簡約",  "美式",  "運動",  "休閒",  "甜美",  "可愛",  "氣質",  "文青",  "潮流",  "街頭",  "中性",  "性感"],
            placeTags : [  "親子",  "情侶",  "小資",  "風景",  "樂園",  "藝文",  "山林",  "海邊",  "放鬆",  "懷舊"],
            seasonTags : ["春季","夏季","秋季","冬季"],
        }
    },
    components:{
        Sidenav, 
    },
    methods: {
        showPopbox(){
            this.isPopBoxVisible = !this.isPopBoxVisible;
        },
    },
}
</script>

<style lang="scss" >
    @import '@/assets/scss/main.scss';
    .oott_edit_wrap{
        width: 257px;
        margin: 0 auto;
        padding-top: 74px;
        @media (min-width: 768px) {
            width: 735px;
            padding-top: 200px;
        }
        @media (min-width: 1200px) {
            box-sizing: border-box;
            width: 1175px;
        }
        .oott_edit_container{
            display: flex;
            gap: 30px;
            @media (min-width: 1200px) {
                box-sizing: border-box;
                width: 1175px;
            }
        }
        .text_area{
            @media (min-width: 1024px) {
                min-width: 610px;
            }
        }

        .post_title{
            margin-top: 48px;
            margin-bottom: 40px;
            @media (min-width: 1024px) {
                    margin-top: 65px;
                    margin-bottom: 67px;
                }
            text-align: center;
            h2{
                display: inline;
            }
            img{
                width: 19px;
                height: 13px;
                @media (min-width: 1024px) {
                    width: 29px;
                    height: 20.346px;
                }
            }
        } 
        // 內容區域
        .post_content_wrap{

            .breadcrumb{
                display: none;
                @media (min-width: 1024px) {
                display: inline-block;
                margin-bottom: 22px;
                }
            }
            .post_edit_title{
                display: flex;
                justify-content: space-between;
                align-items: center;
                h3{
                    flex-grow: 1;
                    line-height: 150%;
                }
                .status{
                    color: var(--semantic-warning, #DB4918);
                }
            }
            // .post_content_container{
            //     @media (min-width: 1024px) {
            //     display: flex;
            //     gap: 24px;
            //     }
            // }

            .photo_preview{
                width: 257px;
                height: 342px;
                margin: auto;
                border: 1px solid var(--text-default, #6A5D4A);
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                input{
                    display: none;
                }
            }
            // 右方的文字和標籤

            textarea{
                display: block;
                width: 257px;
                height: 224px;
                @media (min-width: 768px) {
                    width: 100%;
                }
                box-sizing: border-box;
            }
            .edit_subtitle{
                margin: 24px 0px 8px 0px;
                @media (min-width: 768px) {
                    display: flex;
                    justify-content: space-between;
                }
                .edit_header{
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    line-height: 240%;
                    .edit_instruction{
                        margin-left: 8px;
                        @media (min-width: 1024px) {
                        margin-left: 16px;
                        }
                    }
                }
                .text_limit{
                    margin-left: 0px;
                }
                .review_feedback{
                    margin-left: 5px;
                }

            }
            label{
                span{
                    margin: 4px;
                }
            }
            .season_tags{
                span{
                    margin: 3px;
                }
            }
            .button_area{
                display: flex;
                justify-content: end;
                margin-top: 32px;
                @media (min-width: 768px) {
                    margin-top: 72px;
                }

                margin-bottom: 280px;
                .btn, .cancel_btn{
                    margin: 12px;
                }
                .cancel_btn{
                    a{
                        color: #6A5D4A;
                    }
                }
            }
        }

        .member_sm{
            display: flex;
            width: 273px;
            height: 150px;
            border: 3px solid $textColor_default;
            background-color: $textColor_white;
            border-radius: 20px;
            justify-content: center;

            position: absolute;
            z-index: 10;
            top: 900px;
            left: 50%;
            transform: translate(-50%, 0%);

            .block{
                width: 250px;
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                align-items: center;
                .pic{
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    margin-top: 20px;
                    img{
                    width: 28px;
                    }
                    h3{
                        padding: 10px;
                        font-size: $sm_h4;
                    }
                }
                .button{
                    margin-left: auto;
                    .cancel{
                        font-size: $sm_h5;
                        color: $textColor_default;
                        border-bottom: 1px solid $textColor_default;
                        margin-right: 20px;
                    }
                    .btn {
                        font-size: $sm_h5;
                        padding: 8px 24px;
                        box-shadow: 1px 1px 1px 1px #0005;
                        white-space: nowrap;
                        color: $textColor_white;
                        text-align: center;
                        font-family: $fontFamily;
                        letter-spacing: 0.6px;
                        display: inline-flex;
                        justify-content: center;
                        align-items: center;
                        gap: 10px;
                        border-radius: 50px;
                        border: 2px solid $textColor_default;
                        background: $textColor_default;
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
            }
            // 電腦版
            @media (min-width: 768px) {
            display: flex;

            width: 410px;
            height: 200px;
            border: 3px solid $textColor_default;
            background-color: $textColor_white;
            border-radius: 20px;
            justify-content: center;
            
            position: absolute;
            z-index: 10;

            .block{
                width: 300px;
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                align-items: center;
                .pic{
                    margin-top: 10px;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    img{
                    width: 34px;
                    }
                    h3{
                        text-align: center;
                        font-size: $sm_h3;
                        line-height: 150%;
                        margin-top: 15px;
                    }
                }
                .button{
                    margin-left: auto;
                    .cancel{
                        font-size: $xl_h5;
                        color: $textColor_default;
                        border-bottom: 1px solid $textColor_default;
                        margin-right: 20px;
                    }
                    .btn {
                        font-size: $sm_h5;
                        padding: 8px 24px;
                        box-shadow: 1px 1px 1px 1px #0005;
                        @media (min-width: 768px) {
                        font-size: $xl_h5;
                        padding: 8px 32px;
                        }
                        white-space: nowrap;
                        color: $textColor_white;
                        text-align: center;
                        font-family: $fontFamily;
                        letter-spacing: 0.6px;
                        display: inline-flex;
                        justify-content: center;
                        align-items: center;
                        gap: 10px;
                        border-radius: 50px;
                        border: 2px solid $textColor_default;
                        background: $textColor_default;
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
                }
            }
        }



    }
</style>