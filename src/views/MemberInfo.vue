<!-- 帳號管理的個人資料修改頁面 -->
<template>
    <section class="memberInfo">
        <section class="profile">
            <h2>帳號管理</h2>

            <div class="profile_container">
                <Sidenav class="sidenav"></Sidenav>
                <!-- 個人資料修改 -->
                <div class="profile_card">
                    <div class="member_title">
                        <h3>個人資料修改</h3>
                    </div>
                    <form class="member_data" method="post" @submit="submitForm">

                        <div class="photo_group">
                            <div class="member_img">
                                <!-- <img src="../assets/img/photo_stickers.png" alt="上傳照片"> -->
                                <img src="~@/assets/img/member_info_1.png" alt="上傳照片">
                                <!-- public\profileImg\1.png -->
                            </div>
                            <button class="btn push" @click="toggleHiddenBlock">上傳大頭貼</button>
                        </div>
                        <div v-for="(item, index) in tabItems" 
                        :key="index">
                            <label :for="item.id">{{ item.text }}</label>
                            <input type="text" 
                            :id="item.id" 
                            :placeholder="item.placeholder"
                            :value="item.value"/>
                            <label for="postPhoto" class="member_img">
                                <!-- 預設圖片 -->
                                <div class="photo_upload" v-if="!previewUrl">
                                    <img src="../assets/img/photo_stickers.png" alt="Default Preview">
                                </div>

                                <input class="post_sticker" v-show="!previewUrl" type="file" name="postPhoto" id="postPhoto"
                                    @change="handleFileChange">
                                <span class="btn" v-show="!previewUrl">上傳大頭貼</span>
                                <div class="photo_upload" v-if="previewUrl">
                                    <img :src="previewUrl" alt="Preview">
                                </div>

                            </label>
                        </div>

                        <label for="sign_name">姓名</label>
                        <input type="text" v-model="sign_name" placeholder="請輸入姓名" id="sign_name" name="sign_name" required>
                        <label for="sign_nickname">暱稱</label>
                        <input type="text" v-model="sign_nickname" placeholder="請輸入暱稱" id="sign_nickname"
                            name="sign_nickname" required>
                        <label for="sign_email">Email</label>
                        <input type="text" v-model="sign_email" placeholder="請輸入EMAIL" id="sign_email" name="sign_email"
                            required readonly>
                        <label for="year">生日</label>
                        <div class="date_group">
                            <select v-model="selectedYear" @change="onYearChange" id="year">
                                <option v-for="(year, index) in yearList" :key="index" :value="year">
                                    {{ year }}
                                </option>
                            </select>
                            <select v-model="selectedMonth" @change="onMonthChange" id="month">
                                <option v-for="(month, index) in monthList" :key="index" :value="month">
                                    {{ month }}
                                </option>
                            </select>
                            <select v-model="selectedDate" @change="onDayChange" id="selectDate">
                                <option v-for="(date, index) in dateList" :key="index" :value="date">
                                    {{ date }}
                                </option>
                            </select>
                        </div>
                        <label for="gender">性別</label>
                        <div class="gender_group">
                            <label class="checkbox_container" @click="toggleCheckbox('isMan')">
                                <input type="checkbox" v-model="isMan" class="myCheckbox">
                                <span class="checkmark"></span>
                                <span class="content">男</span>
                            </label>
                            <label class="checkbox_container" @click="toggleCheckbox('isWomen')">
                                <input type="checkbox" v-model="isWomen" class="myCheckbox">
                                <span class="checkmark"></span>
                                <span class="content">女</span>
                            </label>
                            <label class="checkbox_container" @click="toggleCheckbox('isSecret')">
                                <input type="checkbox" v-model="isSecret" class="myCheckbox">
                                <span class="checkmark"></span>
                                <span class="content">秘密</span>
                            </label>
                        </div>
                        <label for="sign_phone">電話</label>
                        <input type="text" v-model="sign_phone" @input="filterNonNumeric" placeholder="請輸入電話"
                            id="sign_phone" name="sign_phone">
                        <div v-for="(way, index) in contact" :key="index">
                            <label :for="way.id">{{ way.name }}</label>
                            <input type="text" :id="way.id" :value="way.value" :placeholder="way.placeholder" />
                        </div>
                        <div class="btn_group">
                            <button class="cancel_btn" @click="canceldata">
                                取消編輯
                            </button>
                            <button class="btn" type="submit" :disabled="!formValid">
                                儲存
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
</template>
    
    
    <script>
    import { POST } from '../plugin/axios.js';
    import Sidenav from "@/components/Sidenav.vue";

    export default {
        components: {
            Sidenav,
        },
        data() {
            return {
                member: '',
                selectedYear: '', // 用於存儲選擇的年分值
                yearList: [], // 用於存儲年份選項的數組
                selectedMonth: '',
                monthList: [],
                selectedDate: '',
                dateList: [],
                isMan: true,
                isWomen: false,
                isSecret: false,
                // 圖片的上傳狀態
                isPhotoSelected: false,
                // 預覽圖片
                selectedFile: null,
                previewUrl: '',
                sign_name:'',
            }
        },
        computed: {
            // inputEls(){
            //     return Array.from(this.$refs.inputEls) ?? [];
            // },
            formValid() {
                return (
                    this.sign_name !== '' &&
                    this.sign_nickname !== '' &&
                    this.sign_phone !== ''
                )
            }

        },
        methods: {
            // 確認照片上傳
            handleFileChange(event) {
                this.isPhotoSelected = event.target.files.length > 0;
                // 將照片選取狀態改變
                this.selectedFile = event.target.files[0];
                // 將取得的照片存在selectedFile供預覽用
                this.previewUrl = URL.createObjectURL(this.selectedFile);
            },
            populateYearList() {
                const currentYear = new Date().getFullYear();
                const startYear = 1979;

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
            toggleCheckbox(option) {
                if (option === "isMan") {
                    this.isMan = true;
                    this.isWomen = false;
                    this.isSecret = false;
                    this.mem_sex = "男"
                } else if (option === "isWomen") {
                    this.isMan = false;
                    this.isWomen = true;
                    this.isSecret = false;
                    this.mem_sex = "女"

                } else if (option === "isSecret") {
                    this.isMan = false;
                    this.isWomen = false;
                    this.isSecret = true;
                    this.mem_sex = "秘密"

                }
            },
            filterNonNumeric() {
                // 使用正則表達式過濾非數字字符
                this.phone = this.phone.replace(/\D/g, '');
            },
            toggleHiddenBlock() {
                this.showHiddenBlock = !this.showHiddenBlock;
            },
            canceldata() {
                this.$router.push('/signup');
            },
            getMemDetailData() {
            let memId = sessionStorage.getItem("mem_id");
            console.log("memId", memId);
            if (memId) {
                let URL = `${this.$URL}/memberDetail.php`;
                let formData = new FormData();
                formData.append("mem_id", memId);
                formData.append("sign_name", this.sign_name);
                POST(URL, formData)
                    .then((res) => {
                        console.log(res);
                        this.$store.commit("setLoginData", res);
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            } else {
                this.$router.push("/member");
            }
        },


        },
        watch: {
            selectedYear(newVal) {
                this.populateDateList(newVal, this.selectedMonth);
                // 將日期選擇設置為第一天（1號）
                this.selectedDate = '18';
            },
            selectedMonth(newVal) {
                this.populateDateList(this.selectedYear, newVal);
                this.selectedDate = '10';
            },
            // 監聽資料屬性變化，保證至少選一個
            isMan(newValue) {
                if (!newValue && !this.isWomen && !this.isSecret) {
                    this.isMan = true;
                }
            },
            isWomen(newValue) {
                if (!newValue && !this.isMan && !this.isSecret) {
                    this.isWomen = true;
                }
            },
            isSecret(newValue) {
                if (!newValue && !this.isMan && !this.isWomen) {
                    this.isSecret = true;
                }
            },

        },
        created() {
            this.populateYearList();
            this.populateMonthList();
            // 填充當前年份和月份的日期選項
            this.populateDateList(new Date().getFullYear(), new Date().getMonth() + 1);
            // 將日期選擇設置為當前日期
            this.selectedDate = new Date().getDate().toString();
            // this.getMemDetailData();
        },
    }
    </script> 

    <style lang="scss" scoped>
    @import "@/assets/scss/baseAndMixin.scss";

    .memberInfo {
        padding-top: 74px;
        @media all and (min-width: $md) {
            padding-top: 200px;
        }

        .profile {
            width: 90%;
            margin: 0 auto;
            @media (min-width: 1200px) {
                box-sizing: border-box;
                width: 1175px;
            }

            h2 {
                margin: 41px auto 44px;
                text-align: center;
            }

            .profile_container {
                display: flex;
                gap: 30px;

                // 個人資料修改
                .profile_card {
                    width: 100%;
                    display: flex;
                    flex-direction: column;

                    .member_title {
                        width: 100%;
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        border-bottom: 1px solid $textColor_default;
                        padding: 0 0 $sp1;

                        h3 {
                            margin: 0;
                        }
                    }
                    //form表單
                    .member_data {
                        @media (min-width: 768px) {
                            max-width: 435px;
                            box-sizing: border-box;
                            margin: 0 200px 0 150px;
                        }

                        .photo_group {
                            display: flex;
                            justify-content: center;
                            align-items: end;

                            .member_img {
                                width: 100px;
                                display: flex;
                                flex-direction: column;
                                margin: 0 0 $sp2;
                                cursor: pointer;
                                @media (min-width: 768px) {
                                    width: 200px;
                                }

                                img {
                                    border: 2px solid $textColor_default;
                                    border-radius: 50%;
                                    width: 100%;
                                    height: 100%;
                                    display: block;
                                    cursor: pointer;
                                }

                                .post_sticker {
                                    display: none;
                                }

                                input[type="file"]::-webkit-file-upload-button {
                                    visibility: hidden;
                                }

                                input[type="file"]::before {
                                    content: url('');
                                    display: inline-block;
                                    width: 16px;
                                    height: 16px;
                                    cursor: pointer;
                                    vertical-align: middle;
                                    margin-right: 5px;
                                }
                                .photo_upload {
                                    width: 100px;
                                    height: 100px;
                                    margin: 20px 0;

                                    @media (min-width: 768px) {
                                        width: 200px;
                                        height: 200px;
                                        margin: 30px 0;
                                    }
                                }
                            }

                        }


                        label {
                            font-size: $sm_h4;
                            font-weight: 700;

                            @media (min-width: 768px) {
                                font-size: $xl_h4;
                            }
                        }

                        input {
                            width: 100%;
                            box-sizing: border-box;
                            margin: $sp1 0 $sp2;

                            @media (min-width: 768px) {
                                margin: $sp1 0 $sp3;
                            }
                        }

                        .date_group {
                            width: 100%;
                            display: flex;
                            justify-content: space-between;
                            padding: $sp1 0 $sp3;

                            select {
                                // 隱藏原本的下拉箭頭
                                width: 33%;
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
                                margin: 0 4px 0 0;
                                cursor: pointer;

                                @media (min-width: 768px) {
                                    font-size: $xl_p;
                                    padding: $sp1 20px;
                                }

                                &:hover {
                                    color: $textColor_default;
                                    background: $textColor_white;
                                    border: 2px solid $textColor_default;
                                }

                                &:active {
                                    color: $textColor_tint;
                                    border: 2px solid $textColor_default;
                                    background: $textColor_white;
                                }
                            }
                        }

                        .gender_group {
                            width: 100%;
                            display: flex;

                            .checkbox_container {
                                width: 20%;
                                position: relative;
                                display: inline-block;
                                cursor: pointer;
                                font-size: $sm_h4;
                                margin: $sp1 0 $sp3;

                                @media (min-width: 768px) {
                                    margin: $sp1 0 $sp4;
                                    font-size: $xl_h4;
                                }

                                // 隱藏原本的checkbox
                                input {
                                    display: none;
                                }

                                //圓形按鈕
                                .checkmark {
                                    position: absolute;
                                    top: 0;
                                    left: 0;
                                    margin: 4px 0;
                                    height: 16px;
                                    width: 16px;
                                    border-radius: 50%;
                                    background-color: $textColor_white;
                                    outline: 2px solid $textColor_default;

                                    @media (min-width: 768px) {
                                        height: 24px;
                                        width: 24px;
                                    }
                                }

                                // 當checkbox選中時變更背景顏色
                                input:checked~.checkmark {
                                    background-color: $textColor_default;
                                }

                                .content {
                                    padding-left: 20px;

                                    @media (min-width: 768px) {
                                        padding-left: 30px;
                                    }
                                }
                            }

                            .checkbox_container:nth-of-type(3) {
                                width: 40%;
                            }

                        }

                    .btn_group {
                        width: 100%;
                        display: flex;
                        align-items: center;
                        justify-content: flex-end;
                        margin: $sp2 0 $sp10;
                        gap: 22px;
                        @media (min-width: 768px) {
                            margin: $sp5 0 $sp15;
                        }

                        

                    }
                }
            }
        }

    }
}</style>
    
     