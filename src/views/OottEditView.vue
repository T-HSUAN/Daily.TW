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
                <h5 class="breadcrumb">
                   &lt 我的穿搭
                </h5>
                
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
                            <textarea name="" id="" cols="5" rows="10">
                            </textarea>
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
                            <button class="cancel_btn">取消編輯</button>
                            <button class="btn">送出審核</button>
                        </div>
                    </div>
                </div>
                <!-- post_button -->
            </div>

        </div>
    </div>

</template>

<script>
import Sidenav from "@/components/Sidenav.vue";
export default{
    data(){
        return{
            styleTags : [  "日系",  "復古",  "韓系",  "簡約",  "美式",  "運動",  "休閒",  "甜美",  "可愛",  "氣質",  "文青",  "潮流",  "街頭",  "中性",  "性感"],
            placeTags : [  "親子",  "情侶",  "小資",  "風景",  "樂園",  "藝文",  "山林",  "海邊",  "放鬆",  "懷舊"],
            seasonTags : ["春季","夏季","秋季","冬季"],
        }
    },
    components:{
        Sidenav, 
    }
}
</script>

<style lang="scss" scoped>
    @import '@/assets/scss/main.scss';
    .oott_edit_wrap{
        width: 257px;
        margin: 0 auto;
        @media (min-width: 768px) {
            width: 735px;
        }
        @media (min-width : 1200px) {
            box-sizing: border-box;
            width: 1100px;            
        }
        .oott_edit_container{
            display: flex;
            gap: 71px;
        }
        .text_area{
            @media (min-width: 1024px) {
                width: 735px;
            }
        }
        /* sidenav等手機板切出來再拿掉(連同上面的class) */
        .sidenav{
            flex-shrink: 0;
            height: 506px;
            display: none;
            @media (min-width : 1200px) {
                display: block;            
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
                display: block;
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
                    width: 735px;
                }
                box-sizing: border-box;
            }
            .edit_subtitle{
                margin: 24px 0px 8px 0px;
                display: flex;
                justify-content: space-between;
                .edit_header{
                    display: flex;
                    .edit_instruction{
                        margin-left: 8px;
                        @media (min-width: 1024px) {
                        margin-left: 16px;
                        }
                    }
                }
                // span{
                //     flex-grow: 1;

                // }
                .text_limit{
                    margin-left: 0px;
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
                .btn, .cancel_btn{
                    margin: 12px;
                }
            }
        }



    }
</style>