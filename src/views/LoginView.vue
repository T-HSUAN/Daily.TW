<template>
  <div class="login">
    <h1>{{title}}</h1>
    <label for="email">email</label>
    <br>
    <input type="email" v-model="email">
    <br>
    <label for="psw">密碼</label>
    <br>
    <input type="password" v-model="psw">
    <br>
    <button @click="login">登入</button>
  </div>
</template>

<script>
export default {
  data(){
    return {
      title: '歡迎登入',
      email: 'test',
      psw:'test',
      check:''
    }
  },
  methods: {
    login(){
      // console.log('login:'+ this.email);
      // let ID = document.getElementById('memId').value;
      // let PSW = document.getElementById('memPsw').value;
      if(this.email === 'test' && this.psw === 'test'){
        this.check='登入成功'
      }
      else{
        this.check='登入失敗，請重新登入';
      }
    }
  },
}
</script>