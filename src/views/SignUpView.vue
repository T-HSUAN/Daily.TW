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
                        
                        <label for="email">Email</label>
                        <input type="text" v-model="email" @input="validateEmail" :class="{ form_warning: !isEmailValid }" 
                            placeholder='請輸入EMAIL'>
                        
                        <label for="psw">密碼</label>
                        <input type="password" v-model="psw" @input="validatePassword"
                            :class="{ form_warning: !isPasswordValid }" placeholder='請輸入密碼 (英數混合6-12碼)'>
                        
                            <div class="space"></div>
                        <div class="cancel_group">
                            
                            <button @click="cancelbtn" class="cancel_btn">
                                取消
                            </button>
                            <button @click.prevent="changeRegister"  class="btn">
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
    // import {GET} from '@/plugin/axios'
    import axios from "axios";
    import { firebaseAuth } from "@/assets/config/firebase.js";
    import { createUserWithEmailAndPassword } from "firebase/auth";
    import { signInWithEmailAndPassword } from "firebase/auth";
    //google 守門人
    import { signInWithPopup, GoogleAuthProvider } from "firebase/auth";
    const provider = new GoogleAuthProvider()
    
    export default {
        data() {
            return {
                signupData:[],
    
                
                email: '',
                psw: '',
                isEmailValid: true,
                isPasswordValid: true,
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
            // signup() {
            //     // if (this.isEmailValid && this.isPasswordValid) {
            //     if (this.email === "test123" && this.psw === "test123") {
            //         window.alert("登入成功");
            //         this.$store.commit('setName', this.email); 
            //         this.$store.commit('setIsLogin', true);
            //         this.$router.push({ path: "/" });
            //     } else {
            //         window.alert("帳號或密碼錯誤，請重新登入");
            //         // this.$router.replace({ path: "/login" });
            //     }
                
                // }
            // },
        //     closeModal() {
        //   this.$emit("emit-status");
        // },
        forgetpsw(){
            this.$router.push('/forget_psw');
        },
            signInGoogle(){
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
                
                login() {
                
                if(this.email === '' || this.pse === '')return
                signInWithEmailAndPassword(firebaseAuth, this.email, this.psw)
                .then((userCredential) => {
                    // firebase 的資料
                    // const userInfo = userCredential.user
                    // this.$store.commit('setName', userInfo);
                    this.$store.commit('setName', this.email);
                    this.$store.commit('setIsLogin', true); // 使用 commit 來改變狀態
                    window.alert("登入成功");
                    this.$router.push('/');
                })
                .catch((error) => {
                    const errorCode = error.code
                    console.log(errorCode);
                    if( errorCode === 'auth/wrong-password'){
                        window.alert("密碼錯誤");
                    }else if(errorCode === 'auth/user-not-found'){
                        window.alert("請前往註冊");
                    }else{
                        window.alert(`${errorCode}`);
                        this.errorMsg = "帳號或密碼輸入錯誤";
                    }
                })
            },
            
    
    
    
    
            cancelbtn(){
                this.$router.push('/login');
            },
            changeRegister(){
                this.$router.push('/signup_info');
            }
        },
        async mounted() {
        //     GET(`${this.$URL}/login.php`)
        //         .then((res) => {
        //             this.loginData=res;
        //         })
        //         .catch((err) => {
        //             console.log(err);
        //         })
        const res = await axios.get(`${this.$URL}/login.php`)
        console.log(res)
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