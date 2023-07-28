<!-- 帳號管理的我的訂單頁面 -->

<template>
    <div class="myorder">
        <div class="lg_area">
        <h2>訂單記錄</h2>

        <div class="bg_area">
            <Sidenav class="sidenav"></Sidenav>
            <div class="bg_container">
                <h3>我的訂單</h3>
            <div class="bg_order">
            <div v-for="order in orders" :key="order.orderNumber" class="order">
                <!-- 订单头部信息 -->
                <div class="order_list">
                    <div class="order_title"><span>訂單編號</span><span>訂購日期</span><span>訂單狀態</span><span>總計</span></div>
                    <div class="order_header">
                    <div>{{ order.orderNumber }}</div>
                    <div>{{ order.orderDate }}</div>
                    <div>{{ order.orderStatus }}</div>
                    <div>{{ order.total }}</div>
                    <div class="details_button_lg" @click="toggleOrder(order.orderNumber)">
                        <span>{{ order.expanded ? '收合明細' : '查看明細' }}</span>
                    </div>
                    </div>
                </div>
                
                
                <!-- 订单明细内容 -->
                <div v-if="order.expanded" class="order_details">
                <div v-for="ticket in order.tickets" :key="ticket.name" class="ticket">
                    <div class="order_block">
                        <div class="text">
                            <div class="header">{{ ticket.name }}</div>
                            <div class="order_box">
                                <div>{{ ticket.type1 }}</div>
                                <div>{{ ticket.quantity1 }}</div>
                                <div>{{ ticket.price1 }}</div>
                            </div>
                            <div class="order_box">
                                <div>{{ ticket.type2 }}</div>
                                <div>{{ ticket.quantity2 }}</div>
                                <div>{{ ticket.price2 }}</div>
                            </div>
                            <div class="last"><span>小計</span>{{ ticket.subtotal }}</div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="details_button_md" @click="toggleOrder(order.orderNumber)">
                    <span>{{ order.expanded ? '收合明細' : '查看明細' }}</span>
                </div>
            </div>
        </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
import Sidenav from "@/components/Sidenav.vue";

export default {
    components: {
        Sidenav,
    },
    data() {
      return {
        orders: [
          {
            orderNumber: "1",
            orderDate: "2023-07-25",
            orderStatus: "已付款",
            total: "$100",
            expanded: false,
            tickets: [
              { name: "班比山丘門票", type1:"全票 (NT$200 / 張)", quantity1: "x2", price1:"400", type2 :"半票 (NT$50 / 張)", quantity2:"x1", price2:"50", subtotal: "NT$450" },
              { name: "宜蘭傳統藝術中心門票", type1:"全票 (NT$150 / 張)", quantity1: "x2", price1:"300", type2 :"半票 (NT$120 / 張)", quantity2:"x1", price2:"120", subtotal: "NT$420" },
            ],
          },
          {
            orderNumber: "2",
            orderDate: "2023-07-24",
            orderStatus: "未付款",
            total: "$80",
            expanded: false,
            tickets: [
                { name: "班比山丘門票", type1:"全票 (NT$200 / 張)", quantity1: "x2", price1:"400", type2 :"半票 (NT$50 / 張)", quantity2:"x1", price2:"50", subtotal: "NT$450" },
                { name: "宜蘭傳統藝術中心門票", type1:"全票 (NT$150 / 張)", quantity1: "x2", price1:"300", type2 :"半票 (NT$120 / 張)", quantity2:"x1", price2:"120", subtotal: "NT$420" },
            ],
          },
          {
            orderNumber: "3",
            orderDate: "2023-07-24",
            orderStatus: "未付款",
            total: "$80",
            expanded: false,
            tickets: [
                { name: "班比山丘門票", type1:"全票 (NT$200 / 張)", quantity1: "x2", price1:"400", type2 :"半票 (NT$50 / 張)", quantity2:"x1", price2:"50", subtotal: "NT$450" },
                { name: "宜蘭傳統藝術中心門票", type1:"全票 (NT$150 / 張)", quantity1: "x2", price1:"300", type2 :"半票 (NT$120 / 張)", quantity2:"x1", price2:"120", subtotal: "NT$420" },
            ],
          },
          {
            orderNumber: "4",
            orderDate: "2023-07-24",
            orderStatus: "未付款",
            total: "$80",
            expanded: false,
            tickets: [
                { name: "班比山丘門票", type1:"全票 (NT$200 / 張)", quantity1: "x2", price1:"400", type2 :"半票 (NT$50 / 張)", quantity2:"x1", price2:"50", subtotal: "NT$450" },
                { name: "宜蘭傳統藝術中心門票", type1:"全票 (NT$150 / 張)", quantity1: "x2", price1:"300", type2 :"半票 (NT$120 / 張)", quantity2:"x1", price2:"120", subtotal: "NT$420" },
            ],
          },
          {
            orderNumber: "5",
            orderDate: "2023-07-24",
            orderStatus: "未付款",
            total: "$80",
            expanded: false,
            tickets: [
                { name: "班比山丘門票", type1:"全票 (NT$200 / 張)", quantity1: "x2", price1:"400", type2 :"半票 (NT$50 / 張)", quantity2:"x1", price2:"50", subtotal: "NT$450" },
                { name: "宜蘭傳統藝術中心門票", type1:"全票 (NT$150 / 張)", quantity1: "x2", price1:"300", type2 :"半票 (NT$120 / 張)", quantity2:"x1", price2:"120", subtotal: "NT$420" },
            ],
          },
          // Add more orders here
        ],
      };
    },
    methods: {
        toggleOrder(orderNumber) {
            this.orders = this.orders.map((order) => {
                if (order.orderNumber === orderNumber) {
                    return { ...order, expanded: !order.expanded };
                }
                return order;
            });
        },
    },
  };
  </script>
  
  <style lang="scss">
  @import "@/assets/scss/baseAndMixin.scss";

  .myorder{
    .lg_area {
        width: 90%;
        margin: 0 auto;
        text-align: center;
        @media (min-width: 1200px) {
            width: 1175px;
        }
        h2 {
            margin: 41px auto;
            text-align: center;
            
            
        }
        .bg_area {
            display: flex;
            justify-content: center;
            gap: 30px;
            .bg_container {
            width: 100%;

            @media (min-width: 1200px) {
                box-sizing: border-box;
                
            }
        }
        h3{
            display: flex;
            padding: 4px 0;
            border-bottom: 1px solid $textColor_default;
            // @media (min-width: 768px) {
            //     // padding: $sp3 0;
            //     // margin: 0;
            // }
        }

        .bg_order{
            padding: 0 0 100px;
            @media (max-width:768px) {
                padding: 40px 0;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
        }
        
        }
 
        .order {
            box-sizing: border-box;
            @media (min-width:768px) {
                margin:40px 0 10px 0;
                .details_button_md{
                    display: none;
                }
            }
            @media (max-width:768px) {
                width: 100%;
                display: grid;
                flex-direction: column;
                align-content: center;
                .details_button_md{
                    display: block;
                    padding: 5px;
                    text-align: end;
                    margin-right: 10%;
                    span{
                        cursor: pointer;
                    }
                }
            }
            .order_list{
                @media (max-width:768px) {
                    display: flex;
                    justify-content: center;
                }
            }
        .order_title{
            background-color:$textColor_tint;
            color: $textColor_white;
            padding: 10px;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            align-items: center;
            flex-direction: row;
            @media (max-width:768px) {
                width: 30%;
                display: flex;
                flex-direction: column;
                span{
                    margin: 5px 0;
                }
            }
        }
        .order_header {
            display: grid;
            border: 3px solid $textColor_tint;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            align-items: center;
            // cursor: pointer;
            padding: 10px;
            color: $textColor_default;
            @media (max-width:768px) {
                display: flex;
                flex-direction: column;
                width: 50%;
                align-items: start;
                div{
                    margin: 5px;
                }
                .details_button_lg{
                    display: none;
                }
            }
            @media (min-width:768px) {
                .details_button_lg{
                    display: block;
                }
            }
            .details_button_lg {
                text-align: right;
                span{
                    cursor: pointer;
                }
            }
        }
        .order_details {
            display: flex;
            flex-direction: column;
            @media (min-width:768px) {
                align-items: end;
            }
            @media (max-width:768px) {
                width: 100%;
                align-items: center;
                margin: 2px 0;
                .ticket{
                    width: 100%;
                }
            }
            
            .order_block{
                display: flex;
                flex-direction: column;
                @media (max-width:768px) {
                    align-items: center;
                    width: 100%;
                    box-sizing: border-box;
                }
                .text {
                    background-color: $textColor_tint;
                    color: $textColor_white;
                    align-items: center;
                    padding: 15px 0;
                    border-bottom: 1px solid $textColor_white;
                    @media (max-width:768px) {
                        border: 3px solid $textColor_tint;
                        padding: $sp1 0;
                        width: 80%;
                    }
                    .header{
                        margin-bottom: 20px;
                        font-size: $xl_h4;
                        font-weight: 700;
                        @media (max-width:768px) {
                            font-size: $sm_h5;
                            text-align: start;
                            margin:5px 20px;
                            
                            margin: 0 15px;
                        }
                    }
                    .order_box{
                        // margin-top: $sp2;
                        display: grid;
                        grid-template-columns: 1fr 0.5fr 0.2fr;
                        padding: 10px 10px 20px 10px;
                        justify-content: space-around;
                        @media (max-width:768px) {
                            font-size: $sm_p;
                            padding: 10px 10px 8px 10px;
                            text-align: start;
                            margin-left: 5%;
                            display: grid;
                            
                        }
                        
                        
                    }
                    .last{
                        padding: 10px;
                        text-align: end;
                        font-size: $xl_h5;
                        span{
                                font-size: $xl_p;
                                padding-right: $sp2;
                            }
                        @media (max-width:768px) {
                            font-size: $sm_h5;
                            span{
                                font-size: $sm_p;
                                padding-right: $sp1;
                            }
                        }
                    }
                }
            }
        }
        }
    }
}
  </style>
  
