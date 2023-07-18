<!-- 登入/註冊 -->
<template>
  <section >   
    <div v-for="(item, key) in tabItems" 
        :class="{active: key == tabActive}" >
        <div v-if="tabActive == item.tab" class="canvas" >
            <div class="login" :class="{ active: isActive }">
                <div class="login_card"   >             
                    <h2>{{ item.title }}</h2>
                    <div class="login_option"><img :src="require('@/assets/img/LINE.png')" alt="icon"><p>使用LINE登入</p></div>
                    <div class="login_option"><img :src="require('@/assets/img/FB.png')" alt="icon"><p>使用FACEBOOK登入</p></div>
                    <label for="email">Email</label>
                    <input type="email" v-model="email" placeholder='請輸入EMAIL'>
                    <label for="psw">密碼</label>
                    <input type="password" v-model="psw" placeholder='請輸入密碼 (英數混合6-12碼)'>
                    <div class="login_action">
                        <label for="remember" v-if="item.tab == 1">
                        <input type="checkbox" name="remember" id="remember" >
                        <span>記住我</span>
                        </label>
                        <router-link to="./" v-if="item.tab == 1">忘記密碼?</router-link>
                    </div>
                    <button class="btn" @click="login" v-if="item.tab == 1">登入</button>
                    <router-link to="./register" class="btn" v-if="item.tab == 2">註冊</router-link>
                </div>
            </div>
            <div class="register" :class="{ active: isActive }">
                <h2>還不是會員?</h2>
                <h2>加入日日旅著體驗完整服務</h2>
                <div class="register_img">
                    <img src="@/assets/img/register.png" alt="">
                </div>
                <div v-if="item.tab == 2" class="welcome">歡迎加入日日旅著！</div>
                <button v-if="item.tab == 1" class="btn" @click="handleClick" >註冊</button>
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
            tab: 1,
            goNext: 2,
            btn:'登入'
        },
        2:{
            title: '加入旅著',
            tab: 2,
            btn:'註冊'
        },
      },
      email: '',
      psw:'',
      isActive: false
    }
  },
  methods: {
        login(){
          if(this.email === 'test' && this.psw === 'test'){
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
        },
    }
}
</script>


<style lang="scss" scoped>
    @import '@/assets/scss/main.scss';
    
    .canvas{
        width: 1000px;
        display: flex;
        justify-content: center;
        background-color: $textColor_tint;
        margin: $sp10 auto;
        border-radius: $sp3;
        &.active {
            // border-radius: $sp3;
            background-color: $default_green;
        }
        .login{
            width: 50%;
            border-right: 2px solid $textColor_white;
            
            .login_card{
                padding: $sp6 0;
                display: flex;
                flex-direction: column;
                align-items: center;
                // border-radius: $sp3 0 0 $sp3;   
                h2{
                    color: #FEFFF5;
                    font-size: $xl_h2;
                    padding: $sp5 0;
                    font-weight: 900;
                    letter-spacing: 2px;
                }
                .login_option{
                    width: 410px;
                    box-sizing: border-box;
                    padding: $sp2 $sp3;
                    margin: 0 0 $sp2;
                    display: flex;
                    align-items: flex-start;
                    background: $textColor_white;
                    border-radius: 5px;
                    box-shadow: -3px 3px 4px 0px rgba(106, 93, 74, 0.50);
                    cursor: pointer;
                    &:hover{
                        background: $tint_yellow;
                    }
                    p{
                        font-size: $xl_h5;
                        margin-left: $sp2;
                        font-weight: 500;
                        letter-spacing: 0.6px;
                    }
                }
                label{
                    width: 410px;
                    color: #FEFFF5;
                    font-size: $xl_h4;
                    font-weight: 700;
                    letter-spacing: 0.72px;
                    padding: 4px 0;
                }
                input{
                    width: 410px;
                    padding: $sp1 $sp3;
                    background: $textColor_white;
                    color: $textColor_default;
                    border-radius: 50px;
                    box-sizing: border-box;
                    font-size: $xl_p;
                    margin: $sp1 0 $sp2 0;
                    border: 2px solid $textColor_default;
                }
                .login_action{
                    width: 410px;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin: 0 0 $sp4;
                    label{
                        width: 100px;
                        font-weight: 400;
                        font-size: $xl_p;
                        display: inline-block;
                        cursor: pointer;
                        #remember{
                            width: 20px;
                            height: 18px;
                            margin: 0 $sp1 0 0;
                        }
                    }
                  a{
                    font-size: $xl_p;
                    color: $textColor_white;
                    &:hover{
                        color: $tint_blue;
                    }
                  }
                }
            }
        }
        .register{
            width: 50%;
            padding: $sp6 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            h2{
                color: #FEFFF5;
                font-size: $xl_h2;
                text-align: center;
            }
            h2{
                font-size: 30px;
                padding: 20px;
                color:$textColor_white;
            }
            .welcome{
                padding: 0 0 20px;
                color:white;
            }
            .register_img{
                width: 70%;
                height: 60%;
                overflow: hidden;
                padding: $sp4;
                img{
                    display: block;
                    height: 100%;
                    width: 100%;
                    object-fit: cover;
                }
            }  
        }
  }
  
</style>

