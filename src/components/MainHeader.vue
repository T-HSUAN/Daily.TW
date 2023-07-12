<template>
  <header>
    <div class="header">
      <!-- <img alt="logo" src="./assets/img/logo.png"> -->
      <router-link to="/"><img :src="require('@/assets/img/logo.png')" alt="logo"></router-link>
      <nav>              
        <router-link to="/">日日旅著首頁</router-link>
        <router-link to="/ticket">景點票券</router-link>
        <router-link to="/login">登入|註冊</router-link>
        <router-link to="/cart">購物車</router-link>
        <!-- 登入 商品頁面 商品詳情 -->
      </nav>
    </div>
  </header>
  <router-view/>
</template>
<script>
export default {
  data(){
    return {
      logo:'logo.png'
    }
  },
  methods: {

  }
}
</script>