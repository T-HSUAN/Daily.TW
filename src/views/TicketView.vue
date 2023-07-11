<!-- 產品的內容區塊 -->
<template>
    <h1>{{title}}</h1>
    <div class="searchbox">            
        <label for="search">搜尋景點</label>
        <input type="search" v-model="ticket">
        <button @click="search">搜尋</button>
    </div>
    <div class="ticket-list">
        <h2>{{subtitle}}</h2>
    </div>
  </template>
  
  <script>
  export default {
    data(){
      return {
        title: '景點票券',
        ticket: '',
        subtitle:'票券列表'
      }
    },
    methods: {
        search(){
      }
    },
  }
  </script>