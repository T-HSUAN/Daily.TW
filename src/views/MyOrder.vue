<template>
    <div class="lg_area">
      <h1>訂單記錄</h1>
      <div class="bg_area">
        <Sidenav class="sidenav"></Sidenav>
        <div class="bg_container">
            <h2>我的訂單</h2>
          <div v-for="order in orders" :key="order.orderNumber" class="order">
            <!-- 订单头部信息 -->
            <div class="order_title"><span>訂單編號</span><span>訂購日期</span><span>訂單狀態</span><span>總計</span></div>
            <div class="order_header">
              <div>{{ order.orderNumber }}</div>
              <div>{{ order.orderDate }}</div>
              <div>{{ order.orderStatus }}</div>
              <div>{{ order.total }}</div>
              <div class="details_button" @click="toggleOrder(order.orderNumber)">
                {{ order.expanded ? '收合明細' : '查看明細' }}
              </div>
            </div>
            <!-- 订单明细内容 -->
            <div v-if="order.expanded" class="order_details">
              <div v-for="ticket in order.tickets" :key="ticket.name" class="ticket">
                <div>{{ ticket.name }}</div>
                <div>{{ ticket.quantity }}</div>
                <div>{{ ticket.subtotal }}</div>
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
              { name: "門票 A", quantity: 2, subtotal: "$50" },
              { name: "門票 B", quantity: 1, subtotal: "$50" },
            ],
          },
          {
            orderNumber: "2",
            orderDate: "2023-07-24",
            orderStatus: "未付款",
            total: "$80",
            expanded: false,
            tickets: [
              { name: "門票 C", quantity: 3, subtotal: "$30" },
              { name: "門票 D", quantity: 2, subtotal: "$50" },
            ],
          },
          {
            orderNumber: "3",
            orderDate: "2023-07-24",
            orderStatus: "未付款",
            total: "$80",
            expanded: false,
            tickets: [
              { name: "門票 C", quantity: 3, subtotal: "$30" },
              { name: "門票 D", quantity: 2, subtotal: "$50" },
            ],
          },
          {
            orderNumber: "4",
            orderDate: "2023-07-24",
            orderStatus: "未付款",
            total: "$80",
            expanded: false,
            tickets: [
              { name: "門票 C", quantity: 3, subtotal: "$30" },
              { name: "門票 D", quantity: 2, subtotal: "$50" },
            ],
          },
          {
            orderNumber: "5",
            orderDate: "2023-07-24",
            orderStatus: "未付款",
            total: "$80",
            expanded: false,
            tickets: [
              { name: "門票 C", quantity: 3, subtotal: "$30" },
              { name: "門票 D", quantity: 2, subtotal: "$50" },
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
  
  .lg_area {
    width: 100%;
    text-align: center;
    margin-bottom: $sp8;
    h1 {
        padding: $sp3 0;
        @media (min-width: 768px) {
            padding: $sp8 0;
        }
    }
    .bg_area {
      display: flex;
      justify-content: center;
      .bg_container {
        width: 100%;
        @media (min-width: 768px) {
          width: 900px;
        }
      }
      h2{
        display: flex;
            padding: $sp3 0;
            margin: $sp3;
            border-bottom: 2px solid $textColor_default;
            @media (min-width: 768px) {
                padding: $sp3 0;
                margin: 0;
            }
      }
      .sidenav {
        flex-shrink: 0;
        height: 506px;
        display: none;
        @media (min-width: 768px) {
          margin: $sp3 0;
        }
        @media (min-width: 1024px) {
          display: block;
        }
      }
      .bg_container {
        @media (min-width: 768px) {
          margin: 0 $sp3;
          padding: 0 $sp3 $sp3;
        }
      }
    }
  
    .order {
      border: 3px solid $textColor_tint;
      margin:60px 0 10px 0;
      .order_title{
        background-color:$textColor_tint;
        color: $textColor_white;
        padding: 10px;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
        align-items: center;
        flex-direction: row;
      }
      .order_header {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
        align-items: center;
        cursor: pointer;
        padding: 10px;
        color: $textColor_default;
        .details_button {
          text-align: right;
        }
      }
      .order_details {
        border-top: 1px solid #ddd;
        // padding: 10px;
        .ticket {
          display: grid;
          grid-template-columns: 1fr 1fr 1fr;
          background-color: $textColor_tint;
          color: $textColor_white;
          align-items: center;
          padding: 5px 0;
        }
      }
    }
  }
  </style>
  