<!-- 登入/註冊 -->
<template>
  <section class="loginview">   
    <div v-for="(item, key) in tabItems" 
        :class="{active: key == tabActive}" >
        <div v-if="tabActive == item.tab" class="canvas" >
            <div class="joinus_sm">
                <img src="@/assets/img/joinus_sm.png" alt="joinus">
            </div>
            <div class="login" :class="{ active: isActive }">
                <h2>{{ item.title }}</h2>
                <div class="login_way">
                    <img :src="require('@/assets/img/LINE.png')" alt="icon">
                    <p>使用LINE登入</p>
                </div>
                <div class="login_way">
                    <img :src="require('@/assets/img/FB.png')" alt="icon">
                    <p>使用FACEBOOK登入</p>
                </div>
                <label for="email">Email</label>
                    <input type="text" 
                        v-model="email"
                        @input="validateEmail"
                        :class="{ form_warning: !isEmailValid }" 
                        placeholder='請輸入EMAIL'>
                    <!-- <span class="error_message" v-if="!isPasswordValid">
                        請輸入@gmail.com格式</span> -->
                <label for="psw">密碼</label>
                <input type="password" 
                    v-model="psw"
                    @input="validatePassword"
                    :class="{ form_warning: !isPasswordValid }" 
                    placeholder='請輸入密碼 (英數混合6-12碼)'
                    >
                <div class="login_action">
                    <label for="remember" v-if="item.tab == 1">
                    <input type="checkbox" name="remember" id="remember" >
                    <span>記住我</span>
                    </label>
                    <router-link to="/forget_psw" 
                    v-if="item.tab == 1">
                    忘記密碼?
                </router-link>
                </div>
                <!-- <div v-show="item.tab == 2" class="space"></div> -->
                <div class="cancel_group">
                    <router-link to="/login" 
                        v-if="item.tab == 1" 
                        @click="handleClick"
                        class="cancel_btn">
                        還不是會員?
                    </router-link>
                    <div to="/login" 
                        v-if="item.tab == 2" 
                        @click="handleClick"
                        class="cancel_btn">
                        取消
                    </div>
                    <!-- 利用 v-if/v-else 控制是否顯示 router-link -->
                    <router-link 
                        v-if="item.tab == 2" 
                        to="/signup" 
                        class="btn">
                        註冊
                    </router-link>
                    <router-link 
                        v-else v-if="item.tab == 1" 
                        to="/member" 
                        @click="login" 
                        class="btn"
                        :class="{ btn: isEmailValid && isPasswordValid }"
                        >
                        <!-- :disabled="!(isEmailValid && isPasswordValid)" -->
                        登入
                    </router-link>
                </div>
            </div>
            <div class="register" :class="{ active: isActive }">
                <h2>{{ item.subtitle }}</h2>
                <p v-if="item.tab == 1">加入日日旅著體驗完整服務</p>
                <div class="joinus_md">
                    <img src="@/assets/img/joinus_md.png" alt="joinus">
                </div>
                <div v-if="item.tab == 2" class="welcome">歡迎加入日日旅著！</div>
                <router-link 
                    v-if="item.tab == 1" 
                    to="/login" 
                    @click="handleClick" 
                    class="btn" >
                    註冊
                </router-link>
            </div>       
        </div>
    </div>
  </section>
</template>
<script>
export default {
    data(){
        return {
            tabActive: 1,
            tabItems:{
                1:{
                    title: '歡迎登入',
                    subtitle:'還不是會員?',
                    tab: 1,
                    goNext: 2,
                    btn:'登入',
                },
                2:{
                    title: '加入旅著',
                    subtitle:'Welcome!',
                    tab: 2,
                    goNext:1,
                    btn:'註冊',
                },
            },
            email: '',
            psw:'',
            isEmailValid: true,
            isPasswordValid: true,
            isActive: false,
            showError: false,
        }
    },
    methods: {
        validateEmail() {
            const regex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
            this.isEmailValid = regex.test(this.email);
        },
        validatePassword() {
            const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,12}$/;
            this.isPasswordValid = regex.test(this.psw);
        },
        login() {
        // if (this.isEmailValid && this.isPasswordValid) {
            if (this.email === "test123" && this.psw === "test123") {
            window.alert("登入成功");
            // 执行页面跳转
            // this.$router.push({ path: "/member" });
        } else {
            window.alert("帳號或密碼錯誤，請重新登入");
            this.$router.replace({ path: "/login" });
            }
        // }
        },
      // 切換tab
      updateTab(index){
          this.tabActive = index
      },
      handleClick() {
          this.updateTab(this.tabItems[this.tabActive].goNext);
          this.isActive = !this.isActive;
      }
    }
}
</script>


<style lang="scss" >
    @import '@/assets/scss/baseAndMixin.scss';
// *{
//     outline: 1px solid red;
// }
    #app{
        background-color: $bgColor_default;
    }


.loginview{
    margin: 150px 0 60px;
    @media all and (min-width: $md){
        margin: 130px 0;
    }
    .canvas{  
        width: 83%;
        background-color: $textColor_tint;
        margin: auto;
        border-radius: $sp3;
        position: relative;
        z-index: 2;
        @media all and (min-width: $md){
            max-width: 1000px;
            display: flex;
            justify-content: center;
            margin: $sp10 auto;
        }
        // 變換背景色
        .active {
            border-radius: $sp3;
            background-color: $default_green;
            @media all and (min-width: $md){
                border-radius: $sp3 0 0 $sp3;
            }
        }
        .joinus_sm{
            position: absolute;
            top: -130px;
            width: 150px;
            left: 50%;
            transform: translateX(-50%);
            overflow: hidden;
            @media all and (min-width: $md){
                display: none;
            }
            img{
                display: block;
                height: 100%;
                width: 100%;
                object-fit: cover;
            }
        }
        .login{
            padding: $sp8 $sp3;
            display: flex;
            flex-direction: column;
            align-items: center;
            @media all and (min-width: $md){
                width: 50%;
                border-right: 2px solid $textColor_white;
                padding: $sp6 0;
            }
            h2{
                color: $textColor_white;
                font-size: $sm_h2;
                padding: 0 0 $sp5;
                font-weight: 900;
                line-height: 150%; /* 42px */
                letter-spacing: 0.84px;
                @media all and (min-width: $md){
                    font-size: $xl_h2;
                }
            }
            .login_way{
                width: 100%;
                box-sizing: border-box;
                padding: $sp1 $sp2;
                margin: 0 0 $sp2;
                display: flex;
                align-items: center;
                background: $textColor_white;
                border-radius: 5px;
                box-shadow: -3px 3px 4px 0px rgba(106, 93, 74, 0.50);
                cursor: pointer;
                @media all and (min-width: $md){
                    // width: 410px;
                    padding: $sp2 $sp3;
                    width: 80%;
                }
                &:hover{
                    background: $tint_yellow;
                }
                p{
                    font-size: $sm_p;
                    margin-left: $sp2;
                    font-weight: 500;
                    letter-spacing: 0.6px;
                    @media all and (min-width: $md){
                        font-size: $xl_p;
                }
                }
            }
            label{
                width: 100%;
                color: $textColor_white;
                font-size: $sm_h4;
                font-weight: 700;
                letter-spacing: 0.72px;
                padding: 4px 0;
                position: relative;
                @media all and (min-width: $md){
                    width: 80%;
                    padding: 0;
                    font-size: $xl_h4;
                }

            }
            input{
                width: 100%;
                box-sizing: border-box;
                margin: 4px 0 16px;
                @media all and (min-width: $md){
                    width: 80%;
                    padding: $sp1 20px;
                    margin: $sp1 0 $sp3;
                }
            }
   
            .login_action{
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin: 0 0 $sp4;
                @media all and (min-width: $md){
                    width: 80%;
                }
                label{
                    width: 100px;
                    font-weight: 400;
                    font-size: $sm_p;
                    display: flex;
                    flex-direction: row;
                    align-items: center;
                    cursor: pointer;
                    @media all and (min-width: $md){
                        font-size: $xl_p;
                    }
                    &:hover{
                        color: $tint_blue;
                    }
                    #remember{
                        width: 20px;
                        height: 18px;
                        margin: 0 $sp1 0 0;
                    }
                }
                a{
                    font-size: $sm_p;
                    color: $textColor_white;
                    @media all and (min-width: $md){
                        font-size: $xl_p;
                    }
                    &:hover{
                        color: $tint_blue;
                    }
                }
            }
            //加入旅著頁面撐出空間
            .space{
                padding: 13px 0;
                @media all and (min-width: $md){
                    padding: $sp2;
                }
            }
            .cancel_group{
                width: 100%;
                display: flex;
                justify-content: flex-end;
                align-items: center;
                @media all and (min-width: $md){
                    justify-content: center;
                }
                a:first-child{
                    padding: 0 $sp2;
                    @media all and (min-width: $md){
                        display: none;
                    }
                }
                div{
                    padding: $sp1 $sp2;
                }
                .btn{
                    box-shadow: -3px 3px 4px 0px rgba(106, 93, 74, 0.50);
                }
            }
        }
        
        .register{
            display: none;
            @media all and (min-width: $md){
                width: 50%;
                padding: $sp6 0 0px;
                display: flex;
                flex-direction: column;
                align-items: center;
                border-radius: 0 $sp3 $sp3 0;
                h2{
                    color: $textColor_white;
                    font-size: $sm_h2;
                    padding: 0 0 $sp5;
                    font-weight: 900;
                    letter-spacing: 2px;
                    @media all and (min-width: $md){
                        font-size: $xl_h2;
                    }
                }
                p{
                    font-size: $sm_h4;
                    color:$textColor_white;
                    font-weight: 700;
                    letter-spacing: 0.72px;
                    @media all and (min-width: $md){
                        font-size: $xl_h4;
                    }
                }
                .joinus_md{
                    max-width: 400px;
                    height: 300px;
                    margin: $sp5 0 65px;
                    img{
                        // display: block;
                        height: 100%;
                        width: 100%;
                    }
                }
                .welcome{
                    font-size: $sm_h4;
                    color:$textColor_white;
                    @media all and (min-width: $md){
                        font-size: $xl_h4;
                    }
                }  
            }    
        }
        
    }

}

</style>


