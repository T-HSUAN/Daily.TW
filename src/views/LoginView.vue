<!-- 登入/註冊 -->
<template>
  <section >
    
    <div v-for="(item, key) in tabItems" 
        :class="{active: key == tabActive}" >
        <div v-if="tabActive == item.tab" class="canvas">
    <!-- 登入區塊 :class="{ active: isActive}-->
        <div class="login"  >
            <!--  :class="{block: isBlock}"-->
            <!-- :class="{bgColor: item.tab == 2}" -->
            <h1>{{ item.title }}</h1>
            <div class="third-party"><img :src="require('@/assets/img/LINE.png')" alt="icon"><p>使用LINE登入</p></div>
            <div class="third-party"><img :src="require('@/assets/img/FB.png')" alt="icon"><p>使用FACEBOOK登入</p></div>
            <label for="email">帳號
              <input type="email" v-model="email" placeholder='請輸入EMAIL'>
            </label>
            <br>
            <br>
            <label for="psw">密碼
              <input type="password" v-model="psw" placeholder='請輸入密碼 (英數混合6-12碼)'>
            </label>
            <br> 
            <br>       
            <div class="note">
              <label for="remember" v-if="item.tab == 1">
              <input type="checkbox" name="remember" id="remember" >記住我</label>
              <router-link to="./" v-if="item.tab == 1">忘記密碼</router-link>
            </div>
            <button class="btn" @click="login" v-if="item.tab == 1">登入</button>
            <router-link to="./register" class="btn" v-if="item.tab == 2">註冊</router-link>
            </div>
        <div class="register">
            <h1>還不是會員?</h1>
            <h2>加入日日旅著體驗完整服務</h2>
            <div class="register_img">
              <img src="@/assets/img/register.png" alt="">
            </div>
            <div v-if="item.tab == 2" class="welcome">歡迎加入日日旅著！</div>
            <button v-if="item.tab == 1" class="btn" @click="updateTab(item.goNext) " >註冊</button>
            

        </div>
    </div>
    </div>
    
  <!-- 註冊區塊 -->
  
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
    //   isBlock:true
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
  }
}
</script>

<style lang="scss" scoped>
    @import '@/assets/scss/main.scss';
    // .isBlock{
    //     background-color: black;
    // }
    .canvas{
      width: 100%;
      display: flex;
      justify-content: center;
      margin: 100px auto;
    //   background-color:$bgColor_tint;
      .login{
        width: 40%;
          padding: 50px 0;
          display: flex;
          flex-direction: column;
          align-items: center;
          background-color: #74B5C3;
          
          h1{
          //   color: #FEFFF5;
            font-size: $xl_h1;
            text-align: center;
          }
        .third-party{
          width: 410px;
          height: 60px;
          margin: 15px 0;
          display: flex;
          align-items: center;
          background: #FEFFF5;
          border-radius: 5px;
          cursor: pointer;
            &:hover{
              background: #FBEDC8;
            }
          img{
            width: 33px;
            height: 33px;
            margin-left: 25px;
          }
          p{
            margin-left: 20px;
          }
        }
        label{
          color: #FEFFF5;
        }
        input{
          width: 320px;
          height: 50px;
          padding-left: 25px;
          margin-left: 25px;
          background: #FEFFF5;
          color: #BAB162;
          border-radius: 50px;
        }
        .note{
          box-sizing: border-box;
          width: 100%;
          padding: 0 45px;
          display: flex;
          justify-content: space-between;
          label{
            display: inline-block;
            cursor: pointer;
            #remember{
            width: 20px;
            height: 20px;
          }
          }
          a{
            color: #FEFFF5;
            &:hover{
              color: #C8E4EB;
            }
          }

        }
      
      }
    .register{
        width: 40%;
        padding: 50px 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        background: #93AE51;
        h1{
          color: #FEFFF5;
          font-size: 64px;
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