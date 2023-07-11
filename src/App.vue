<template>
  <nav>
    <router-link to="/">日日旅著首頁</router-link>
    <router-link to="/ticket">景點票券</router-link>
    <router-link to="/login">登入|註冊</router-link>
    <router-link to="/cart">購物車</router-link>
    <!-- 登入 商品頁面 商品詳情 -->
  </nav>
  <router-view/>
</template>

<style lang="scss">
#app {
  font-family: 'Noto Sans TC', sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: right;
  color: #6A5D4A;
  background: #FFF6E3;
}

nav {
  height: 200px;
  padding: 0 120px;
  background: #FEF0D1;

  a {
    margin: auto 0 auto 20px;
    font-weight: bold;

    color: #6A5D4A;

    &.router-link-exact-active {
      color: #E3C451;
    }
  }
}
</style>
