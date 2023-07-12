<!-- 產品的內容區塊 -->
<style lang="scss">
</style>
<template>
    <h1>{{title}}</h1>
    <div class="searchbox">            
        <label for="search">搜尋景點</label>
        <input type="search" v-model="ticket">
        <button @click="search">搜尋</button>
    </div>
    <h2>{{subtitle}}</h2>
    <div class="ticket-list">       
        <div class="card" v-for="item in itemList" :key="item.id" >
          <img :src="item.img" alt="">
          <div class="name">{{item.Name}}</div>
          <div class="price">{{item.price}}</div>
        </div>
        
    </div>
  </template>
  
  <script>
  export default {
    data(){
      return {
        title: '景點票券',
        searchText: '',
        // 商品資料(僅在進入畫面時去取一次資料)
        ticketData: [],
        // 呈現的商品資料(針對productData來搜尋篩選)
        ticketDisplay: [],

        subtitle:'票券列表',
        itemList:[
          {
          id:1,
          Name:'票券A',
          img:'https://picsum.photos/300/200/?random=9',
          price:50
          },
          {
            id:2,
            Name:'票券B',
            img:'https://picsum.photos/300/200/?random=10',
            price:700
          },
          {
            id:3,
            Name:'票券C',
            img:'https://picsum.photos/300/200/?random=11',
            price:1200
          },
          {
            id:4,
            Name:'票券D',
            img:'https://picsum.photos/300/200/?random=12',
            price:2300
          },
          {
            id:5,
            Name:'票券E',
            img:'https://picsum.photos/300/200/?random=13',
            price:300
          },
          {
            id:6,
            Name:'票券F',
            img:'https://picsum.photos/300/200/?random=14',
            price:500
          },
          {
            id:7,
            Name:'票券G',
            img:'https://picsum.photos/300/200/?random=15',
            price:200
          },
          {
            id:8,
            Name:'票券H',
            img:'https://picsum.photos/300/200/?random=16',
            price:250
          },
          {
            id:9,
            Name:'票券I',
            img:'https://picsum.photos/300/200/?random=17',
            price:750
          },
        ]
      }
    },
    },
    created() {
      fetch('https://fakestoreapi.com/products')
      .then(res=>res.json())
      .then(json=>{
        this.productData = json
        this.updateDisplay()
      })
    },
    methods: {
      updateDisplay(){
        if(this.searchText === ''){
          this.productDisplay = this.productData
        }else{
          this.productDisplay = this.productData.filter(item => item.title.includes(this.searchText))
        }
      }
    },
  }
  
  </script>