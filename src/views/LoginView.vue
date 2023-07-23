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
                <label for="email">Email
                    <input type="text" 
                        v-model="email"
                        @input="validateEmail" 
                        placeholder='請輸入EMAIL'>
                    <div v-if="showError" class="error_message">請輸入有效的...@gmail.com格式</div>
                </label>
                <label for="psw">密碼</label>
                <input type="password" 
                    v-model="psw" 
                    placeholder='請輸入密碼 (英數混合6-12碼)'>
                <div class="login_action">
                    <label for="remember" v-if="item.tab == 1">
                    <input type="checkbox" name="remember" id="remember" >
                    <span>記住我</span>
                    </label>
                    <router-link to="./" v-if="item.tab == 1">忘記密碼?</router-link>
                </div>
                <div v-show="item.tab == 2" class="space"></div>
                <div class="cancel_group">
                    <router-link to="./login" 
                        v-if="item.tab == 1" 
                        @click="handleClick"
                        class="cancel_btn">
                        還不是會員?
                    </router-link>
                    <div to="./login" 
                        v-if="item.tab == 2" 
                        @click="handleClick"
                        class="cancel_btn">
                        取消
                    </div>
                    <!-- 利用 v-if/v-else 控制是否顯示 router-link -->
                    <router-link 
                        v-if="item.tab == 2" 
                        to="./register" 
                        class="btn">
                        註冊
                    </router-link>
                    <router-link 
                        v-else v-if="item.tab == 1" 
                        to="./login" 
                        @click="login" 
                        class="btn">
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
                    to="./login" 
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
            isActive: false,
            showError: false,
        }
    },
    methods: {
    validateEmail() {
      const regex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
      if (!regex.test(this.email)) {
        // 輸入格式不正確，顯示錯誤提示
        this.showError = true;
      } else {
        // 輸入格式正確，隱藏錯誤提示
        this.showError = false;
      }
    },
      login(){
        if(this.email === '123@gmail.com' && this.psw === 'test'){
          window.alert('登入成功')
        }
        else{
          window.alert('登入失敗，請重新登入');
        }
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
    @import '@/assets/scss/main.scss';

    #app{
        background-color: $bgColor_default;
    }
    //手機板

.loginview{
    padding: 200px 0 150px;
    // position: relative;
    // z-index: 2;
    .canvas{  
        width: 83%;
        background-color: $textColor_tint;
        margin: auto;
        border-radius: $sp3;
        // padding-top: 100px;
        position: relative;
        z-index: 2;
        // 變換背景色
        .active {
            border-radius: $sp3;
            background-color: $default_green;
        }
        .joinus_sm{
            position: absolute;
            top: -130px;
            width: 150px;
            left: 50%;
            transform: translateX(-50%);
            overflow: hidden;
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
            h2{
                color: $textColor_white;
                font-size: $sm_h2;
                padding: 0 0 $sp5;
                font-weight: 900;
                line-height: 150%; /* 42px */
                letter-spacing: 0.84px;
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
                &:hover{
                    background: $tint_yellow;
                }
                p{
                    font-size: $sm_h5;
                    margin-left: $sp2;
                    font-weight: 500;
                    letter-spacing: 0.6px;
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
                input{
                    width: 100%;
                    padding: $sp1 20px;
                    background: $textColor_white;
                    color: $textColor_default;
                    border-radius: 50px;
                    box-sizing: border-box;
                    font-size: $sm_p;
                    margin: $sp1 0 $sp1;
                    border: 2px solid $textColor_default;
                }
                .error_message{
                    position: absolute;
                    bottom: -2px;
                    // left: 50%;
                    // transform: translateX(-50%);
                    color: $warningColor;
                    font-size: $sm_p;
                }
            }
            input{
                width: 100%;
                padding: $sp1 20px;
                background: $textColor_white;
                color: $textColor_default;
                border-radius: 50px;
                box-sizing: border-box;
                font-size: $sm_p;
                margin: $sp1 0 $sp1;
                border: 2px solid $textColor_default;
            }
            
            .login_action{
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin: 0 0 $sp4;
                label{
                    width: 100px;
                    font-weight: 400;
                    font-size: $sm_p;
                    display: flex;
                    flex-direction: row;
                    align-items: center;
                    cursor: pointer;
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
                    &:hover{
                        color: $tint_blue;
                    }
                }
            }
            .space{
                padding: 13px 0;
            }
            .cancel_group{
                width: 100%;
                display: flex;
                justify-content: flex-end;
                align-items: center;
                a:first-child{
                    padding: 0 $sp2;
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
        }
        
    }

}
    //平板
    @media all and (min-width: $md){
    .loginview{
        padding: 50px 0;
        .canvas{
            max-width: 1000px;
            display: flex;
            justify-content: center;
            margin: $sp10 auto;
            .joinus_sm{
                display: none;
            }
            .active {
            border-radius: $sp3 0 0 $sp3;
            }
            .login{
                width: 50%;
                border-right: 2px solid $textColor_white;
                padding: $sp6 0;
                h2{
                    letter-spacing: 2px;
                }
                .login_way{
                    width: 80%;               
                }
                label{
                    width: 80%;
                }
                input{
                    width: 80%;
                    padding: $sp1 $sp3;
                }
                .login_action{
                    width: 80%;
                }
                .space{
                    padding: $sp2;
                }
                .cancel_group{
                    justify-content: center;
                    a:first-child{
                        display: none;
                    }
                }
            }
            .register{
                width: 50%;
                padding: $sp6 0;
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
                }
                p{
                    font-size: $sm_h4;
                    color:$textColor_white;
                    font-weight: 700;
                    letter-spacing: 0.72px;
                }
                .joinus_md{
                    width: 300px;
                    overflow: hidden;
                    margin: $sp4 0 $sp10;
                    img{
                        display: block;
                        height: 100%;
                        width: 100%;
                        object-fit: cover;
                    }
                }
                .welcome{
                    font-size: $sm_h4;
                    color:$textColor_white;
                }      
            }
        }
    }
    }
    //桌機板
    @media all and (min-width: $xl){
    .loginview{
        .canvas{
            .login{
                h2{
                    font-size: $xl_h2;
                }
                .login_way{
                    width: 410px;
                    padding: $sp2 $sp3;
                    p{
                        font-size: $xl_h5;
                    }
                }
                label{
                    width: 410px;
                }
                input{
                    width: 410px;
                    font-size: $xl_p;
                    margin: $sp1 0 $sp2 0;
                }
                .error_message{
                    color: $warningColor;
                    font-size: $xl_p;
                }
                .login_action{
                    width: 410px;
                    label{
                        font-size: $xl_p;   
                    }
                    a{
                        font-size: $xl_p;
                    }
                }
                .space{
                    padding: 26px 0 0;
                }//42px-16px
                .cancel_group{
                    padding: 10px 0 10px;
                    div{
                        font-size: $xl_p;
                    }
                }
                
            }
            .register{
                h2{
                    font-size: $xl_h2;
                }
                p{
                    font-size: $xl_h4;
                }
                .joinus_md{
                    width: 380px;
                }
                .welcome{
                    font-size: $xl_h4;
                }  
            }
        }
    }
    } 
</style>


