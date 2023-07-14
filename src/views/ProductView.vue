<!-- 產品-->
<style lang="scss">
.product{
    text-align: center;
    padding: 4rem 0;
    .container{ 
        padding: 2rem 0; 
        .page{
            width: 100%;
            display: flex;
            // margin: auto;
            // justify-content: center;
            flex-wrap: wrap;
            .card{
                width: 25%;
                box-sizing: border-box;
                .card_text{
                    display: flex;
                    justify-content: space-around;
                }
            }
        }
    }
}
</style>

<template>
    <section class="product">
        <h1>商品列表</h1>
        <div class="container">
            <div class="page" >
                <div class="card" v-for="(item, index) in itemlist" :key="index">
                    <img :src="item.img" alt="">
                    <div class="card_text">
                        {{ item.Name }}
                        {{ item.price }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</template>

<script>
    export default{
        data(){
            return{
                itemlist:[
                    {
                        id:1,
                        Name:'票券A',
                        img:'https://picsum.photos/300/200/?random=9',
                        price:500, 
                    },
                    {
                        id:2,
                        Name:'票券B',
                        img:'https://picsum.photos/300/200/?random=10',
                        price:700,
                    },
                    {
                        id:3,
                        Name:'票券C',
                        img:'https://picsum.photos/300/200/?random=11',
                        price:1200,
                    },
                    {
                        id:4,
                        Name:'票券D',
                        img:'https://picsum.photos/300/200/?random=12',
                        price:2300,
                    },
                      
                ]
            }
        },
        methods: {
            
        },
    }
</script>