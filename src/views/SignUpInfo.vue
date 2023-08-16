<!-- 會員註冊資料頁面 -->
<template>
    <section class="signupview">
        <section class="register">
            <div class="canvas">
                <div class="joinus_sm">
                    <img src="@/assets/img/joinus_sm.png" alt="joinus">
                </div>
                <h2>加入旅著</h2>
                <!-- id="registryForm" -->
                <form class="form" 
                method="post" 
                @submit="submitForm">
                <div class="photo_group">
                    <label for="postPhoto" class="member_img">
                            <input class="post_sticker" v-show="!previewUrl" type="file" name="postPhoto" id="postPhoto" @change="handleFileChange">
                            <span class="btn" v-show="!previewUrl">上傳大頭貼</span>
                        
                        <div class="photo_upload" v-if="previewUrl">
                            <img :src="previewUrl" alt="Preview">
                        </div>
                        
                    </label>
                    <!-- <label for="postPhoto" class="photo_upload" v-if="!isPhotoSelected">
                            <input type="file" name="postPhoto" id="postPhoto" @change="handleFileChange">
                            + <br> 點此選擇照片上傳
                        </label>
                        <div class="photo_upload" v-if="isPhotoSelected">
                            <img :src="previewUrl" alt="Preview">
                        </div> -->
    
    
                    <!-- <Upload action="//jsonplaceholder.typicode.com/posts/">
                        <Button class="btn push">上傳大頭貼</Button>
                    </Upload> -->
                </div>
                
    
                <!-- <div class="preview" v-if="showPreview" @click="hidePreview">
                
            </div> -->
                        <label for="sign_email">Email</label>
                        <input type="text" v-model="sign_email"
                        placeholder="請輸入EMAIL"
                        id="sign_email"
                        name="sign_email"
                        required
                        readonly>
                        <label for="sign_psw">密碼</label>
                        <input type="password" v-model="sign_psw"
                        placeholder="請輸入密碼"
                        id="sign_psw"
                        required
                        readonly>
                        <label for="repeat_psw">確認密碼
                            <span v-if="!isPasswordMatch"
                                class="error"
                                >與密碼不一致</span>
                        </label>
                        
                        <input type="password" v-model="repeat_psw"
                        placeholder="請在輸入一次密碼"
                        id="repeat_psw"
                        name="repeat_psw"
                        required
                        @blur="checkPasswordMatch"
                        :class="{ form_warning: !isPasswordMatch }">
                        <!-- :class沒效果 -->
                        <label for="sign_name">姓名</label>
                        <input type="text" v-model="sign_name"
                        placeholder="請輸入姓名"
                        id="sign_name"
                        name="sign_name"
                        required>
                        <label for="sign_nickname">暱稱</label>
                        <input type="text" v-model="sign_nickname"
                        placeholder="請輸入暱稱"
                        id="sign_nickname"
                        name="sign_nickname"
                        required>
    
                        
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
                                <input type="checkbox" v-model="isSecret" class="myCheckbox" >
                                <span class="checkmark"></span>
                                <span class="content">秘密</span>
                            </label>
                        </div>
                        <label for="sign_phone">電話</label>
                        <input type="text" v-model="sign_phone"
                         @input="filterNonNumeric" 
                         placeholder="請輸入電話"
                         id="sign_phone"
                         name="sign_phone"
                         >
                        <div class="btn_group">
                        <button  class="cancel_btn" @click="canceldata">
                            取消
                        </button>
                        <button class="btn"
                        type="submit" 
                        :disabled="!formValid" 
                        >
                            註冊
                        </button>
                    </div>
                    </form>
                
                <!-- <div class="member_sm" v-if="isPopBoxVisible">
                    <div class="block">
                        <div class="pic">
                            <img src="~@/assets/img/popbox_check.svg" alt="">
                            <h3>註冊成功！</h3>
                        </div>
                        <button class="btn" @click="redirectToOtherPage">確定</button>
                    </div>
                </div> -->
    
            </div>
        </section>
    </section>
    </template>
    
    <script>
    import { mapState } from 'vuex';	
    import { POST } from '../plugin/axios.js';	
    import  axios  from "axios";
    
    export default {
        data() {
            return {
                selectedYear: '', // 用於存儲選擇的年份值
                yearList: [], // 用於存儲年份選項的數組
                selectedMonth: '',
                monthList: [],
                selectedDate: '',
                dateList: [],
                isMan: false,
                isWomen: false,
                isSecret: false,
                mem_sex:'',
                phone: '',
                showHiddenBlock: false,
                showPreview: true,
                isPopBoxVisible: false,
                isPasswordMatch:true,
                repeat_psw:'',
                sign_name:'',
                sign_nickname:'',
                sign_phone:'',
                // 圖片的上傳狀態
                isPhotoSelected: false,
                // 預覽圖片
                selectedFile: null,
                // 要傳到後台的資料
                selectedStyle: '',
                selectedPlace: '',
                selectedSeason: '',
                previewUrl: '',
                
            }
        },
        computed:{
            // inputEls(){
            //     return Array.from(this.$refs.inputEls) ?? [];
            // },
            ...mapState(['sign_email', 'sign_psw']),
            formValid(){
                return(
                    this.repeat_psw !== '' &&
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
            onYearChange() {
                // 在這裡處理年份選項變化後的相關邏輯
                // 例如，您可以根據選擇的年份值做進一步處理
            },
            onMonthChange() { },
            onDayChange() { },
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
                this.sign_phone = this.sign_phone.replace(/\D/g, '');
            },
            canceldata(){
                this.$router.push('/signup');
            },
            checkPasswordMatch() {
                this.isPasswordMatch = this.sign_psw == this.repeat_psw;
            },
            // showPopbox() {
            //     const emptyFieldIndex = this.inputValues.findIndex((value) => value.trim() === "");
            //     if (emptyFieldIndex !== -1) {
            //         // There is an empty field, set focus to the corresponding input element
            //         this.$nextTick(() => {
            //             this.inputEls[emptyFieldIndex].focus();
            //         });
            //     } else {
            //         this.isPopBoxVisible = !this.isPopBoxVisible;
            //         // All fields have values, do your submit logic here
            //         // ...
            //     }
            // },
            redirectToOtherPage() {
                this.isPopBoxVisible = false;
                this.$router.push('/member');
            },
            
            async submitForm(event) {
                event.preventDefault();
    
                const selectedYear = this.selectedYear;
                const selectedMonth = this.selectedMonth;
                const selectedDate = this.selectedDate;
                const selectedDateStr = `${selectedYear}-${selectedMonth}-${selectedDate}`;
    
                if (this.sign_psw !== this.repeat_psw) {
                    swal("密碼和確認密碼不一致，", "請重新輸入。", "error")
                console.log("psw",this.sign_psw)
                return;
                }
                try {
    
                    console.log('Sending request...');
                    const formData = new FormData();
                    
                    formData.append('mem_img', this.selectedFile);
    
                    formData.append('sign_email', this.sign_email);
                    formData.append('sign_psw', this.sign_psw);
                    formData.append('repeat_psw', this.repeat_psw);
                    formData.append('sign_name', this.sign_name);
                    formData.append('sign_nickname', this.sign_nickname);
                    formData.append('mem_sex', this.mem_sex);
                    formData.append('sign_phone', this.sign_phone);
                    formData.append('mem_birth', selectedDateStr);
                    // formData.append('img', this.sign_phone);
    
                    const response = await axios.post(`${this.$URL}/PostMember.php`, formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data', // Use multipart/form-data for form data
                        },
                    });
                    console.log("mem_sex", this.mem_sex)
                    swal("新增成功!","", "success")
                    // this.isPopBoxVisible = true;
                    console.log('Data sent successfully', response.data);
                    
                    this.$router.push('/member');
                    // this.$router.push('/');
    
                } catch (error) {
                    console.log(error);
                }
            }
            
            
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
            
        },
        
    
    };
    
    
    </script>
    
    <style lang="scss" scoped>
    @import '@/assets/scss/baseAndMixin.scss';
    
    // #app {
    //     background-color: $bgColor_default;
    // }
    .signupview{
        padding-top: 74px;
    
        @media all and (min-width: $md) {
            padding-top: 200px;
        }
    .register {
        margin: 150px 0 60px;
    
        @media all and (min-width: $md) {
            margin: 130px 0;
        }
    
        .canvas {
            width: 83%;
            background-color: $mid_green;
            padding: $sp8 27px;
            box-sizing: border-box;
            margin: auto;
            border-radius: 30px;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
    
            @media all and (min-width: $md) {
                max-width: 1000px;
                padding: $sp12 0;
            }
    
            .joinus_sm {
                position: absolute;
                top: -130px;
                width: 150px;
                left: 50%;
                transform: translateX(-50%);
                overflow: hidden;
    
                @media all and (min-width: $md) {
                    display: none;
                }
    
                img {
                    display: block;
                    height: 100%;
                    width: 100%;
                    object-fit: cover;
                }
            }
    
            h2 {
                color: $textColor_white;
                font-size: $sm_h2;
                padding: 0 0 $sp4;
                font-weight: 900;
                line-height: 150%;
                /* 42px */
                letter-spacing: 0.84px;
    
                @media all and (min-width: $md) {
                    font-size: $xl_h2;
                }
            }
    
            .photo_group {
                display: flex;
                justify-content: center;
                align-items: end;
               
                
                // @media (min-width: 768px) {
                    // flex-direction: row;
                    // justify-content: center;
                // }
    
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
                        @media (min-width: 768px) {
                            // border-radius: 50%;
                            // width: 200px;
                            // height: 200%;
                        }
                    }
                    .post_sticker{
                        width: 100px;
                        height: 100px;
                        cursor: pointer;
                        @media (min-width: 768px) {
                            width: 200px;
                            height: 200px;
                            border-radius: 50%;
                            
                        }
                    }
                    
                    input[type="file"]::-webkit-file-upload-button {
                        visibility: hidden;
                    }
                    input[type="file"]::before {
                        content: url(''); 
                        display: inline-block;
                        width: 16px; /* 调整图片宽度 */
                        height: 16px; 
                        cursor: pointer;
                        vertical-align: middle;
                        margin-right: 5px; /* 可选，根据需要调整图片和文本之间的间距 */
                        // @media (min-width: 768px) {
                        //     width: 20px;
                        //     height: 200px;
                        // }
                    }
                    
                    
                    .photo_upload{
                        width: 100px;
                        height: 100px;
                        @media (min-width: 768px) {
                            width: 200px;
                            height: 200px;
                        }
                    }
                }
    
            }
    
    
            .form {
                width: 100%;
    
                @media (min-width: 768px) {
                    width: 60%;
                }
    
                label {
                    width: 100%;
                    color: $textColor_default;
                    font-size: $sm_h4;
                    font-weight: 700;
                    letter-spacing: 0.72px;
    
                    @media (min-width: 768px) {
                        font-size: $xl_h4;
                    }
                    .error{
                        color: $warningColor;
                    }
                }
    
                input {
                    width: 100%;
                    padding: $sp1 20px;
                    background: $textColor_white;
                    color: $textColor_default;
                    border-radius: 50px;
                    box-sizing: border-box;
                    font-size: $sm_p;
                    margin: $sp1 0 $sp2;
                    border: 2px solid $textColor_default;
                    
    
                    @media (min-width: 768px) {
                        padding: $sp1 20px;
                        font-size: $xl_p;
                        margin: $sp1 0 $sp3;
                    }
                }
                .form_warning{
                        border: 2px solid $warningColor;
                    }
    
                .date_group {
                    width: 100%;
                    display: flex;
                    justify-content: space-between;
                    padding: $sp1 0 $sp4;
    
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
                            font-size: $xl_h4;
                            margin: $sp1 0 $sp4;
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
                                margin: 4px 0;
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
                        width: 30%;
                    }
                }
            }
    
            .btn_group {
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: flex-end;
                margin: $sp2 0;
    
                @media (min-width: 768px) {
                    justify-content: center;
                }
    
                
                .btn {
                    margin: 0 $sp2;
                    box-shadow: -3px 3px 4px 0px rgba(106, 93, 74, 0.50);
                }
    
            }
    
            //popbox
    
            .member_sm {
                display: flex;
                width: 273px;
                height: 194px;
                border: 3px solid $textColor_default;
                background-color: $textColor_white;
                border-radius: 20px;
    
                position: absolute;
                z-index: 10;
                top: 900px;
                left: 50%;
                transform: translate(-50%, 0%);
    
                .block {
                    width: 250px;
                    left: 50%;
                    transform: translate(-50%, 0%);
                    position: relative;
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
    
                    // .button{
                    // margin-left: auto;
                    // .cancel{
                    //     font-size: $sm_h5;
                    //     color: $textColor_default;
                    //     border-bottom: 1px solid $textColor_default;
                    //     margin-right: 20px;
                    // }
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
    
                    // }
                }
    
                // 電腦版
                @media (min-width: 768px) {
                    display: flex;
    
                    width: 410px;
                    height: 243px;
                    border: 3px solid $textColor_default;
                    background-color: $textColor_white;
                    border-radius: 20px;
                    justify-content: center;
    
                    position: absolute;
                    z-index: 10;
    
                    .block {
                        width: 100%;
                        position: relative;
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
    }
    </style>