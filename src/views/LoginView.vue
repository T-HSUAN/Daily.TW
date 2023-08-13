<!-- 登入 -->
<template>
    <section class="logincard">
        <section class="loginview">
            <div>
                <div class="canvas">
                    <div class="joinus_sm">
                        <img src="@/assets/img/joinus_sm.png" alt="joinus">
                    </div>
                    <div class="login">
                        <h2>歡迎加入</h2>
                        <div class="login_trace">
                            <img :src="require('@/assets/img/duck_trace3.png')" alt="icon">
                        </div>
                        <button class="login_way" @click="signInGoogle">
                            <Icon type="logo-googleplus" />
                            <p>使用GOOGLE登入</p>
                        </button>

                        <label>Email</label>
                        <input type="text" 
                        v-model="email" 
                        required 
                        placeholder='請輸入EMAIL'>
                        <!-- @input="validateEmail" :class="{ form_warning: !isEmailValid }" -->
                        <label>密碼</label>
                        <input type="password" 
                        v-model="psw" 
                        placeholder='請輸入密碼 ' 
                        required>
                        <!-- (英數混合6-12碼) -->
                        <!-- @input="validatePassword"
                        :class="{ form_warning: !isPasswordValid }" -->
                        <div class="login_action">
                            <label for="remember">
                                <input type="checkbox" name="remember" id="remember">
                                <span>記住我</span>
                            </label>
                            <button @click="forgetpsw" class="forgetpsw">
                                忘記密碼?
                            </button>
                        </div>
                        <div class="cancel_group">
                            <button @click="changeRegister" class="cancel_btn">
                                還不是會員?
                            </button>

                            <button @click="login" class="btn" type="button">
                                登入
                            </button>
                            <!-- :class="{ btn: isEmailValid && isPasswordValid }" -->
                        </div>
                    </div>
                    <div class="register">
                        <h2>還不是會員?</h2>
                        <p>加入日日旅著體驗完整服務</p>
                        <div class="joinus_md">
                            <img src="@/assets/img/joinus_md.png" alt="joinus">
                        </div>
                        <button @click="changeRegister" class="btn">
                            註冊
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </section>
</template>
<script>
import { POST } from '../plugin/axios.js';

import axios from "axios";
// import { URL } from "@/assets/js/common.js";

import { firebaseAuth } from "@/assets/config/firebase.js";
import { createUserWithEmailAndPassword } from "firebase/auth";
import { signInWithEmailAndPassword } from "firebase/auth";
//google 守門人
import { signInWithPopup, GoogleAuthProvider } from "firebase/auth";
const provider = new GoogleAuthProvider()

export default {
    data() {
        return {
            dataFromMySQL: [],

            email: '',
            psw: '',
            isEmailValid: true,
            isPasswordValid: true,
            isActive: false,
            showError: false,

        }
    },
    methods: {
        // validateEmail() {
        //     const regex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
        //     this.isEmailValid = regex.test(this.email);
        // },
        // validatePassword() {
        //     const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,12}$/;
        //     this.isPasswordValid = regex.test(this.psw);
        // },
        forgetpsw() {
            this.$router.push('/forget_psw');
        },
        //===========================google註冊登入==================================
        signInGoogle() {
            signInWithPopup(firebaseAuth, provider)
                .then((result) => {
                    // const credential = GoogleAuthProvider.credentialFromResulsignInGoogleedential.accessToken;
                    this.$store.commit('setIsLogin', true); // 使用 commit 來改變狀態
                    window.alert("google 登入成功");
                    const userInfo = result.user;
                    this.$store.commit('setName', this.email);
                    this.$router.push('/');
                    // this.$store.commit('setName', userInfo);
                    // this.$router.push({ name: 'result', params: { 
                    //     type: 'loginSuccess'
                    // }})
                }).catch((error) => {
                    const errorCode = error.code
                    // this.$Message.warning(errorCode);
                    console.log('google註冊失敗', errorCode);
                    alert(`google註冊失敗${errorCode}`);
                });
        },
        //===========================google帳號登入=========================================
        //     login() {
        //     if(this.email === '' || this.psw === '') {
        //         alert('帳號密碼不能為空！');
        //         return; 

        //     }
        //     signInWithEmailAndPassword(firebaseAuth, this.email, this.psw)
        //     .then((userCredential) => {
        //         // firebase 的資料
        //         // const userInfo = userCredential.user
        //         // this.$store.commit('setName', userInfo);
        //         this.$store.commit('setName', this.email);
        //         this.$store.commit('setIsLogin', true); // 使用 commit 來改變狀態
        //         window.alert("登入成功");
        //         this.$router.push('/');
        //     })
        //     .catch((error) => {
        //         const errorCode = error.code
        //         console.log(errorCode);
        //         if( errorCode === 'auth/wrong-password'){
        //             window.alert("密碼錯誤");
        //         }else if(errorCode === 'auth/user-not-found'){
        //             window.alert("請前往註冊");
        //         }else{
        //             window.alert(`${errorCode}`);
        //             this.errorMsg = "帳號或密碼輸入錯誤";
        //         }
        //     })
        // },
        //===========================php帳號登入=========================================

        login() {
            if (this.email !== "" && this.psw !== "") {
                let url = `${this.$URL}/login.php`;
                let params = new URLSearchParams();
                params.append("email", this.email);
                //"email"跟login.php的$email = $_POST["email"]; 做呼應
                params.append("psw", this.psw);
                
                POST(url,params).then((res) => {
                    // console.log(res)
                    if (res == 0) {
                        alert("*帳號密碼錯誤，請再試一次");
                        
                        // this.errMsg = '*帳號密碼錯誤，請再試一次'
                    } else {
                        this.$store.commit("setName", res);
                        this.$store.commit('setIsLogin', true); // 使用 commit 來改變狀態
                        window.alert("登入成功");
                        this.$router.push('/');

                        this.$store.commit("setLoginData", res);

                        // this.$emit("close");
                        this.email = ''
                        this.psw = ''
                        // this.errMsg = ''
                        // this.$router.push("/index");
                    }
                });
            } else if (this.email === "") {
                alert('請輸入帳號');
            } else if (this.psw === "") {
                alert('請輸入密碼');
            }
        },
        changeRegister() {
            this.$router.push('/signup');
        }
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

.logincard {
    padding-top: 74px;

    @media all and (min-width: $md) {
        padding-top: 200px;
    }

    .loginview {
        margin: 150px 0 60px;

        @media all and (min-width: $md) {
            margin: 130px 0;
        }

        .canvas {
            width: 83%;
            background-color: $textColor_tint;
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

            .login {
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

                .login_trace {
                    width: 80%;

                    img {
                        width: 100%;
                        height: 100%;
                    }
                }

                .login_way {
                    width: 100%;
                    box-sizing: border-box;
                    padding: $sp1 $sp2;
                    margin: 0 0 $sp2;
                    display: flex;
                    align-items: center;
                    color: $textColor_tint;
                    background: $textColor_white;
                    border-radius: 5px;
                    box-shadow: -3px 3px 4px 0px rgba(106, 93, 74, 0.50);
                    cursor: pointer;

                    @media all and (min-width: $md) {
                        // width: 410px;
                        padding: $sp2 $sp3;
                        width: 80%;
                    }

                    &:hover {
                        background: $tint_yellow;
                    }

                    p {
                        font-size: $sm_p;
                        margin-left: $sp2;
                        font-weight: 500;
                        letter-spacing: 0.6px;

                        @media all and (min-width: $md) {
                            font-size: $xl_p;
                        }
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

                .login_action {
                    width: 100%;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin: 0 0 $sp4;

                    @media all and (min-width: $md) {
                        width: 80%;
                    }

                    label {
                        width: 100px;
                        font-weight: 400;
                        font-size: $sm_p;
                        display: flex;
                        flex-direction: row;
                        align-items: center;
                        cursor: pointer;

                        @media all and (min-width: $md) {
                            font-size: $xl_p;
                        }

                        &:hover {
                            color: $tint_blue;
                        }

                        #remember {
                            width: 20px;
                            height: 18px;
                            margin: 0 $sp1 0 0;
                        }

                    }

                    .forgetpsw {
                        font-size: $sm_p;
                        color: $textColor_default;

                        @media all and (min-width: $md) {
                            font-size: $xl_p;
                        }

                        &:hover {
                            color: $tint_blue;
                        }
                    }
                }

                //加入旅著頁面撐出空間
                // .space {
                //     padding: 13px 0;

                //     @media all and (min-width: $md) {
                //         padding: $sp2;
                //     }
                // }

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

                        &:hover {
                            color: $tint_blue;
                        }
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


                }
            }

        }

    }
}
</style>