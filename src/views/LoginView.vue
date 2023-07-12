<!-- 登入/註冊 -->
<style lang="scss">
  .login{
    width: 500px;
    margin: 50px auto;
    padding: 50px 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    background: #74B5C3;
    h1{
      color: #FEFFF5;
      font-size: 64px;
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
    button{//login
        width: 160px;
        height: 55px;
        margin: 0 auto;
        font-size: 20px;
        background: #FBEDC8;
        box-shadow: 5px 5px 5px #6A5D4A;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        &:hover{
          color: #C8E4EB;
          background: #6A5D4A;
        }
      }
  }
</style>
<template>
  <div class="login">
    <h1>{{title}}</h1>
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
      <label for="remember">
      <input type="checkbox" name="remember" id="remember">
      記住我</label>
      <a href="">忘記密碼</a>
    </div>
    <button @click="login">登入</button>
  </div>
</template>
<script>
export default {
  data(){
    return {
      title: '歡迎登入',
      email: '',
      psw:'',
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
    }
  }
}
</script>