<template>
    <div class="oott_post_wrap">
        <div class="breadcrumb">
            <router-link to="/">
                <span>首頁</span>
            </router-link>
            <font-awesome-icon icon="fa-solid fa-chevron-right" />
            <router-link to="/oott">
                <span>穿搭特輯</span>
            </router-link>
            <font-awesome-icon icon="fa-solid fa-chevron-right" />
            <router-link to="/oott">
                <span>穿搭投稿</span>
            </router-link>
        </div>

        <div class="post_title">
            <h2>穿搭投稿</h2>
            <img class="foot_print" src="@/assets/img/oott_card_deco_footprint.png" alt="">
        </div>
        <!-- 內容區域 -->
        <form method="post" @submit="submitForm">
            <div class="post_content">
                <div class="photo_area">
                    <div class="post_subtitle">
                        <h5>*穿搭照片</h5>
                    </div>
                    <label for="postPhoto" class="photo_upload" v-if="!isPhotoSelected">
                        <input type="file" name="postPhoto" id="postPhoto" @change="handleFileChange">
                        + <br> 點此選擇照片上傳
                    </label>
                    <div class="photo_upload" v-if="isPhotoSelected">
                        <img :src="previewUrl" alt="Preview">
                    </div>

                </div>
                <!-- 右方的文字和標籤 -->
                <div class="text_area">
                    <div class="post_desc">
                        <div class="post_subtitle">
                            <h5>*穿搭描述</h5>
                            <span class="text_limit">{{ oottDesc.length }} 字 / 上限 200 字</span>
                        </div>
                        <textarea name="oottDesc" id="oottDesc" cols="5" rows="10" v-model="oottDesc"
                            @input="handleDescChange"></textarea>
                    </div>
                    <div class="style_tags">
                        <div class="post_subtitle">
                            <h5>*穿搭風格</h5>
                            <span>請選擇1~3個</span>
                        </div>
                        <label v-for="(styleTag, index) in styleTags" :key="styleTag.index">
                            <input type="checkbox" class="tag" :id="`styleTag-${index}`" v-model="checkedStyleTags[index]"
                                @change="handleTagsChange('style', index)" />
                            <span># {{ styleTag }}</span>
                        </label>
                    </div>
                    <div class="place_tags">
                        <div class="post_subtitle">
                            <h5>*景點類型</h5>
                            <span>請選擇1~3個</span>
                        </div>
                        <label v-for="(placeTag, index) in placeTags" :key="placeTag.index">
                            <input type="checkbox" class="tag" :id="`placeTag-${index}`" v-model="checkedPlaceTags[index]"
                                @change="handleTagsChange('place', index)" />
                            <span># {{ placeTag }}</span>
                        </label>
                    </div>
                    <div class="season_tags">
                        <div class="post_subtitle">
                            <h5>*穿搭季節</h5>
                        </div>
                        <label v-for="(seasonTag, index) in seasonTags" :key="seasonTag.index">
                            <input type="checkbox" class="tag" :id="`seasonTag-${index}`" v-model="checkedSeasonTags[index]"
                                @change="handleTagsChange('season', index)" />
                            <span>{{ seasonTag }}</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- post_button -->
            <div class="post_button_area">
                <button class="btn" type="submit" @click="showPopbox" :disabled="!formValid">
                    確定送出
                </button>
            </div>
        </form>

        <!-- pop_box-->
        <div class="post_popbox" v-if="isPopBoxVisible">
            <div class="block">
                <div class="pic">
                    <img src="~@/assets/img/popbox_exclamation.svg" alt="">
                    <h3>穿搭貼文審核中<br>
                        請留意會員中心<br>
                        貼文狀態</h3>
                </div>
                <div class="button">
                    <!-- <button class="cancel" @click="showPopbox">取消</button> -->
                    <button class="btn" @click="uploadPhoto">
                        <router-link to="/oott" class="confirm_btn">
                            確定
                        </router-link> 
                    </button>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            // 圖片的上傳狀態
            isPhotoSelected: false,

            // 預覽圖片
            selectedFile: null,

            //圖片描述
            oottDesc: '',

            styleTags: ["日系", "復古", "韓系", "簡約", "美式", "運動", "休閒", "甜美", "可愛", "氣質", "文青", "潮流", "街頭", "中性", "性感"],
            placeTags: ["親子", "情侶", "小資", "風景", "樂園", "藝文", "山林", "海邊", "放鬆", "懷舊"],
            seasonTags: ["春季", "夏季", "秋季", "冬季"],
            // 打勾的 Tags
            checkedStyleTags: [],
            checkedPlaceTags: [],
            checkedSeasonTags: [],

            // 送出後的彈窗
            isPopBoxVisible: false,
        }
    },
    computed: {
        formValid() {
            return (
                this.isPhotoSelected !== false &&
                this.oottDesc.trim() !== '' &&
                this.oottDesc.length <= 200 &&
                this.checkedStyleTags !== [] &&
                this.checkedPlaceTags !== [] &&
                this.checkedSeasonTags !== []
            )
        }
    },
    methods: {
        // 判斷送出與否的資料
        // 控制彈出視窗
        showPopbox() {
            this.isPopBoxVisible = !this.isPopBoxVisible;
        },
        // 確認穿搭描述字數
        handleDescChange() {
            if (this.oottDesc.length > 200) {
                this.oottDesc = this.oottDesc.slice(0, 200);
            }
        },
        // 限制勾選的 tags 只能有三個
        handleTagsChange(tagList, index) {
            let checkedArray = []; // 辨識打勾選到的 array
            let tagsLimit = 0;     // 選到 array 的 tags 上限。

            if (tagList === 'style') {
                checkedArray = this.checkedStyleTags;
                tagsLimit = 3;
            } else if (tagList === 'place') {
                checkedArray = this.checkedPlaceTags;
                tagsLimit = 3;
            } else if (tagList === 'season') {
                checkedArray = this.checkedSeasonTags
                tagsLimit = 1;
            }

            if (checkedArray[index]) {          // 確認勾到的有在資料裡面        
                if (this.countCheckedTags(checkedArray) > tagsLimit) {
                    checkedArray[index] = false; // 取消勾選
                }
            }
        },
        countCheckedTags(checkedArray) {
            return checkedArray.filter(tag => tag).length; // 計算有勾選的長度
        },
// 確認照片上傳
        handleFileChange(event) {
            this.isPhotoSelected = event.target.files.length > 0;
            // 將照片選取狀態改變
            this.selectedFile = event.target.files[0];
            // 將取得的照片存在selectedFile
            this.previewUrl = URL.createObjectURL(this.selectedFile);
        },

// 圖片上傳到後端
async submitForm(event) {
            event.preventDefault();
            try {
                console.log('Sending request...');
                const formData = new FormData();
                formData.append('photo', this.selectedFile);

                const response = await axios.post(`${this.$URL}/oottPostView.php`, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data', // Use multipart/form-data for form data
                    },
                });
                console.log('Data sended successfully', response.data);
            } catch (error) {
                console.log(error);
            }
        },
// 圖片存在預覽區，準備上傳

        

    },
}
</script>

<style lang="scss" >
@import '@/assets/scss/main.scss';

.oott_post_wrap {
    width: 257px;
    padding-top: 74px;

    @media (min-width: 768px) {
        width: 735px;
        padding-top: 200px;
    }

    @media (min-width: 1024px) {
        width: 1000px;
    }

    margin: 0 auto;

    .post_title {

        margin-top: 48px;
        margin-bottom: 40px;

        @media (min-width: 1024px) {
            margin-top: 7px;
            margin-bottom: 44px;
        }

        text-align: center;

        h2 {
            display: inline;
        }

        img {
            width: 19px;
            height: 13px;

            @media (min-width: 1024px) {
                width: 29px;
                height: 20.346px;
            }
        }
    }

    // 內容區域
    .post_content {
        @media (min-width: 1024px) {
            display: flex;
            justify-content: center;
            align-content: center;
            gap: 24px;
        }

        .photo_upload {
            width: 279px;
            height: 369px;
            margin: auto;
            img{
                width: 100%;
            }

            @media (min-width: 1024px) {
                width: 418.5px;
                height: 553.5px;
            }

            border: 1px solid var(--text-default, #6A5D4A);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;

            input {
                display: none;
            }
        }

        .text_area {
            @media (min-width: 1024px) {
                width: 420px;
            }
        }

        textarea {
            display: block;
            width: 257px;
            height: 224px;

            @media (min-width: 768px) {
                width: 735px;
            }

            @media (min-width: 1024px) {
                width: 420px;
                height: 224px;
            }

            box-sizing: border-box;
        }

        .post_subtitle {
            margin: 24px 0px 8px 0px;
            display: flex;

            span {
                margin-left: 8px;

                @media (min-width: 1024px) {
                    margin-left: 16px;
                }
            }

            .text_limit {
                margin-left: 0px;
            }

        }

        .post_desc {
            .post_subtitle {
                justify-content: space-between;
            }
        }

        label {
            span {
                margin: 4px;
            }
        }

        .season_tags {
            span {
                margin: 3px;
            }
        }
    }

    .post_button_area {
        margin: 32px 0;
        text-align: center;

        @media (min-width: 1024px) {
            margin: 114px 0;
        }
    }

    //popbox

    .post_popbox {
        display: flex;
        width: 100%;
        height: 100vh;
        border: 3px solid $textColor_default;
        background-color: #6A5D4A80;
        border-radius: 20px;
        justify-content: center;

        position: absolute;
        z-index: 10;
        top: 900px;
        left: 50%;
        transform: translate(-50%, 0%);

        .block {
            width: 250px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;

            .pic {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin-top: 20px;

                img {
                    width: 28px;
                }

                h3 {
                    padding: 10px;
                    font-size: $sm_h4;
                }
            }

            .button {
                margin-left: auto;

                .cancel {
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
            height: 300px;
            border: 3px solid $textColor_default;
            background-color: $textColor_white;
            border-radius: 20px;
            justify-content: center;

            position: absolute;
            z-index: 10;

            .block {
                width: 410px;
                height: 300px;
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                align-items: center;

                .pic {
                    margin-top: 10px;
                    display: flex;
                    flex-direction: column;
                    align-items: center;

                    img {
                        width: 34px;
                    }

                    h3 {
                        text-align: center;
                        font-size: $sm_h3;
                        line-height: 150%;
                        margin-top: 15px;
                    }
                }

                .button {
                    margin-left: auto;

                    .cancel {
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
    .confirm_btn{
        a,a:active,a:hover{
            color: #fefff5;
        }
    }

}
</style>