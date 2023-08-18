<!-- 註冊首頁 -->
<template>
    
    <section class="signupcard">
        <section class="signupview">
            <div>
                <div class="canvas">
                    <div class="joinus_sm">
                        <img src="@/assets/img/joinus_sm.png" alt="joinus">
                    </div>
                    <div class="signup">
                        <h2>加入旅著</h2>
                        <div class="signup_trace">
                            <img :src="require('@/assets/img/duck_trace3.png')" alt="icon">
                        </div>
                        
                        <div class="space_signup"></div>
                        
                        <label for="email">Email
                            <div v-if="!isEmailValid"
                            class="error"
                            >*請輸入正確格式</div>
                        </label>
                        <input type="text" v-model="sign_email"  
                        placeholder='請輸入EMAIL'
                        @blur="validateEmail"
                        :class="{ form_warning: !isEmailValid }"
                        required>

                        <label for="psw">密碼
                            <span v-if="!isPasswordValid"
                            class="error"
                            >請輸入英數混合6-12碼</span>
                        </label>
                        <input type="password" v-model="sign_psw"  
                        placeholder='請輸入密碼(英數混合6-12碼)'
                        @blur="validatePassword"
                        :class="{ form_warning: !isPasswordValid }"
                        maxlength="12"
                        required>
                        
                            <div class="space"></div>
                        <div class="cancel_group">
                            
                            <button @click="cancelbtn" class="cancel_btn">
                                取消
                            </button>
                            <button @click.prevent="updateValues"  class="btn"
                            type="button">
                                註冊
                            </button>
                            
                        </div>
                    </div>
                    <div class="register">
                        <h2>Welcome</h2>
                        <p>加入日日旅著體驗完整服務</p>
                        <div class="joinus_md">
                            <img src="@/assets/img/joinus_md.png" alt="joinus">
                        </div>
                        <div class="welcome">歡迎加入日日旅著！</div>
                        
                    </div>
                </div>
            </div>
        </section>
    </section>
    </template>

    <script>
    import { mapActions } from 'vuex';
    
    export default {
        data() {
            return {
                sign_email: '',
                sign_psw: '',
                isEmailValid: true,
                isPasswordValid: true,
            }
        },
        methods: {
            ...mapActions(['updateAccount', 'updatePassword']),

            validateEmail() {
                const regex = /^[a-zA-Z0-9._%+-]+@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/;
                this.isEmailValid = regex.test(this.sign_email);
            },
            validatePassword() {
                const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,12}$/;
                this.isPasswordValid = regex.test(this.sign_psw);
                if (this.isPasswordValid) {
                    this.isPasswordValid = this.sign_psw.length >= 6 && this.sign_psw.length <= 12;
                }
            },


            updateValues() {
                this.validateEmail();
                this.validatePassword();

                if (this.isEmailValid && this.isPasswordValid && this.sign_email !== "" && this.sign_psw !== "") {
                    console.log(this.sign_email)
                    console.log(this.sign_psw)
                    this.updateAccount(this.sign_email);
                    this.updatePassword(this.sign_psw);
                    this.$router.push({ name: 'signup_info' });

                } else if (this.sign_email === "") {
                    alert('請輸入帳號');
                } else if (this.sign_psw === "") {
                    alert('請輸入密碼');
                } else if (this.isEmailValid) {
                    // 将焦点设置回错误的输入框内
                    // document.querySelector('.form_warning input').focus();
                    return; // 停止继续执行登录逻辑
                }
            },
            cancelbtn() {
                this.$router.push('/login');
            },
        },
        
    }
    </script>
      
      
    <style lang="scss" scoped>
    @import '@/assets/scss/baseAndMixin.scss';
    
    // *{
    //     outline: 1px solid red;
    // }
    #app {
        background-color: $bgColor_default;
    }
    
    .signupcard{
        padding-top: 74px;
    
        @media all and (min-width: $md) {
            padding-top: 200px;
        }
    
    .signupview {
        margin: 150px 0 60px;
    
        @media all and (min-width: $md) {
            margin: 130px 0;
        }
    
        .canvas {
            width: 83%;
            background-color: $default_green;
            margin: auto;
            border-radius: $sp3;
            position: relative;
            z-index: 2;
    
            @media all and (min-width: $md) {
                max-width: 1000px;
                display: flex;
                justify-content: center;
                margin: $sp10 auto;
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
    
            .signup {
                padding: $sp8 $sp3;
                display: flex;
                flex-direction: column;
                align-items: center;
    
                @media all and (min-width: $md) {
                    width: 50%;
                    border-right: 2px solid $textColor_white;
                    padding: $sp6 0;
                }
    
                h2 {
                    color: $textColor_white;
                    font-size: $sm_h2;
                    padding: 0 0 $sp5;
                    font-weight: 900;
                    line-height: 150%;
                    /* 42px */
                    letter-spacing: 0.84px;
    
                    @media all and (min-width: $md) {
                        // padding: 0 0 120px;
                        font-size: $xl_h2;
                    }
                }
                .signup_trace{
                    width: 80%;
                    img{
                        width: 100%;
                        height: 100%;
                    }
                }
                
                .space_signup{
                    
                    @media all and (min-width: $md) {
                        padding-bottom: 66px;
                    }
                }
                label {
                    width: 100%;
                    color: $textColor_white;
                    font-size: $sm_h4;
                    font-weight: 700;
                    letter-spacing: 0.72px;
                    padding: 4px 0;
                    position: relative;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    .error{
                        color: $warningColor;
                        font-size: $sm_p;
                        @media all and (min-width: $md) {
                        font-size: $xl_p;
                    }
                    }
                    @media all and (min-width: $md) {
                        width: 80%;
                        padding: 0;
                        font-size: $xl_h4;
                    }
    
                }
    
                input {
                    width: 100%;
                    box-sizing: border-box;
                    margin: 4px 0 16px;
    
                    @media all and (min-width: $md) {
                        width: 80%;
                        padding: $sp1 20px;
                        margin: $sp1 0 $sp3;
                    }
                }
    
                
    
                //加入旅著頁面撐出空間
                .space {
                    padding: 13px 0;
    
                    @media all and (min-width: $md) {
                        padding: $sp2;
                    }
                }
    
                .cancel_group {
                    width: 100%;
                    display: flex;
                    justify-content: flex-end;
                    align-items: center;
    
                    @media all and (min-width: $md) {
                        justify-content: center;
                    }
    
                    
    
                    .cancel_btn {
                        padding: 0 $sp2;
                    }
    
                    .btn {
                        box-shadow: -3px 3px 4px 0px rgba(106, 93, 74, 0.50);
                    }
                }
            }
    
            .register {
                display: none;
    
                @media all and (min-width: $md) {
                    width: 50%;
                    padding: $sp6 0 0px;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    border-radius: 0 $sp3 $sp3 0;
    
                    h2 {
                        color: $textColor_white;
                        font-size: $sm_h2;
                        padding: 0 0 $sp5;
                        font-weight: 900;
                        letter-spacing: 2px;
    
                        @media all and (min-width: $md) {
                            font-size: $xl_h2;
                        }
                    }
    
                    p {
                        font-size: $sm_h4;
                        color: $textColor_white;
                        font-weight: 700;
                        letter-spacing: 0.72px;
    
                        @media all and (min-width: $md) {
                            font-size: $xl_h4;
                        }
                    }
    
                    .joinus_md {
                        max-width: 400px;
                        height: 306px;
                        margin: $sp5 0 72px;
    
                        img {
                            // display: block;
                            height: 100%;
                            width: 100%;
                        }
                    }
    
                    .welcome {
                        font-size: $sm_h4;
                        color: $textColor_white;
    
                        @media all and (min-width: $md) {
                            font-size: $xl_h4;
                        }
                    }
                }
            }
    
        }
    
    }
    }
    </style>