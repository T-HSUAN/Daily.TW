<!-- 登入/註冊 -->
<template>
  <section class="canvas">
    <div class="login">
    <!-- 登入區塊 -->
    <h1>歡迎登入</h1>
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
    <button class="btn" @click="login">登入</button>
    </div>
  <!-- 註冊區塊 -->
  <div class="register">
    <h1>還不是會員?</h1>
    <h2>加入日日旅著體驗完整服務</h2>
    <div class="register_img">
      <img src="@/assets/img/register.png" alt="">
    </div>
    <button class="btn" @click="login">註冊</button>
  </div>
  </section>
  
</template>
<script>
export default {
  data(){
    return {
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
    },
  }
}
</script>

<style lang="scss" scoped>
    @import '@/assets/scss/page/_login.scss';
</style>