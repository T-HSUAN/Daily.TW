<style>
h1{
    padding-left: 100px;
}
.title{
    display: flex;
    justify-content: center;
    max-width: 1000px;
    margin: 0 auto;
    height: 30px;
    padding-left: 10px;
    /* border-bottom: 3px solid gray; */
}
.title div{
    width: 200px;
    line-height: 30px;
    text-align: center;
}
.title .products{
    text-align: left;
}
.title .products{
    width: 50%;
}
.content{
    height: 50px;
    margin-left: 137px;
    padding: 25px 0;
    justify-content: center;
    align-items: center;
    color: black;
}
.content .delete{
    height: 100px;
    display: flex;
    align-items: center;
    cursor: pointer;
}
.content .delete:hover button, button:hover{
    color: #a0a2d1;
}
.products img{
    width: 80px;
    height: 80px;
    border-radius: 3px;
    margin-left: 15px;
    float: left;
}
.products .name{
    margin-left: 100px;
    margin-top: 20px;
}
.count p{
    display: inline-block;
    width: 30px;
    padding: 0 5px;
    text-align: center;
    border: 1px solid gray;
}
button{
    background: none;
    border: none;
    cursor: pointer;
}
.result{
    padding-right: 250px;
}
.result p{
    text-align: right;
}
.result .total-price{
    font-size: 32px;
    font-weight: 800;
    color: #d53e3e;
}
</style>
<template>
    <main>
        <div class="cart">
        <h1>購物車</h1>
        <div class="title">
            <div class="products">商品</div>
            <div class="price">單價</div>
            <div class="count">數量</div> 
            <div class="amount">金額</div>
            <div class="delete"></div>
        </div>
        <div class="item_list">
            <div class="title content" v-for="(item, index) in itemList" :key="item.id" >
                <div class="products">
                    <img :src="item.img" alt="">
                    <div class="name">{{item.Name}}</div>
                </div>                   
                <div class="price">$ {{item.price}}</div>
                <div class="count">
                    <button @click="reduce(item)">-</button>
                    <p>{{item.count}}</p>
                    <button @click="add(index)">+</button>
                </div> 
                <div class="amount">$ {{item.price * item.count}}</div>
                <div class="delete" @click="cancel(index)" title="刪除">
                    <button>X</button>
                </div>
            </div>
        </div>
        <div class="result">
            <p>({{itemList.length}}項商品) 總計</p>
            <p>💰
                <span class="total-price">
                    {{totalPrice}} </span>    
            元</p>
        </div>
    </div>
    </main>
</template>
<script>
    export default {
        data(){
            return{
                itemList:[
                    {
                        id:1,
                        Name:'票券A',
                        img:'https://picsum.photos/300/200/?random=9',
                        price:500,
                        count:3
                    },
                    {
                        id:2,
                        Name:'票券B',
                        img:'https://picsum.photos/300/200/?random=10',
                        price:700,
                        count:6
                    },
                    {
                        id:3,
                        Name:'票券C',
                        img:'https://picsum.photos/300/200/?random=11',
                        price:1200,
                        count:2
                    },
                    {
                        id:4,
                        Name:'票券D',
                        img:'https://picsum.photos/300/200/?random=12',
                        price:2300,
                        count:1
                    }
                ]
            }
        },
        methods:{//三種寫法
            add(index){
                this.itemList[index].count++;
            },
            reduce(item){
                if(item.count>0){
                item.count--;                
                }
            },
            cancel: function(index){
                console.log(this);
                this.itemList.splice(index,1);
            }
        },
        computed:{
            totalPrice(){
                if(this.itemList.length === 0) return
                let total = 0
                for (let index = 0; index < this.itemList.length; index++) {
                    const accumulator = this.itemList[index].price * this.itemList[index].count
                    total += accumulator 
                }
                return total;
            }
            // totalPrice() {
            //     return this.itemList.reduce((total, item) => total + (item.price * item.count), 0);
            // }
            //this 代表 vue 實體本身，total 表示 reduce() 中每次累加的結果，item 是 itemList 每一個元素
            //箭頭函式是用於處理陣列中每個元素的函式，0 為第一次呼叫函式時的累加器初始值。
        }
    }
</script>