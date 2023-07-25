<template>
    <div class="payment_page">
        <div class="pay_details">
            <div class="pay_details_content">
                <img
                    class="payDuck"
                    src="@/assets/img/duck_pay.png"
                    alt="payDuck"
                />
                <h3 class="Title">付款明細</h3>
                <!-- 購買內容 -->
                <div class="item">
                    <div class="details">
                        <h4 class="title">
                            {{ Name }}
                        </h4>
                        <div class="ticket_adult">
                            <p class="name">
                                全票&nbsp;
                                <span class="price"
                                    >(NT$ {{ price_adultF }} /張)</span
                                >
                            </p>
                            <p class="count">x{{ count_adult }}</p>
                        </div>
                        <div class="ticket_ex">
                            <p class="name">
                                優待票&nbsp;
                                <span class="price"
                                    >(NT$ {{ price_exF }} /張)</span
                                >
                            </p>
                            <p class="count">x{{ count_ex }}</p>
                        </div>

                        <div class="amount">
                            小計&nbsp;
                            <span>NT$ {{ subtotal }}</span>
                        </div>
                    </div>
                </div>
                <!-- 票券總計 -->
                <div class="result">
                    <p>(1項票券) 總計</p>
                    <p>
                        NT$&nbsp;
                        <span class="total-price"> {{ total }} </span>
                        元
                    </p>
                </div>
            </div>
        </div>
        <div class="methods">
            <h3>請選擇付款方式</h3>
            <label for="method">
                <input
                    type="radio"
                    name="pay_method"
                    class="method"
                />信用卡</label
            >
            <label for="method">
                <input type="radio" name="pay_method" class="method" />
                LINE Pay</label
            >
            <label for="method">
                <input
                    type="radio"
                    name="pay_method"
                    class="method"
                />街口支付</label
            >
            <label for="method">
                <input
                    type="radio"
                    name="pay_method"
                    class="method"
                />轉帳</label
            >
        </div>
        <div class="order_info">
            <h3>訂購者資訊</h3>
            <div class="name">
                <p class="title">訂購者</p>
                <p class="content">日日小鴨</p>
            </div>
            <div class="phone_num">
                <p class="title">手機號碼</p>
                <p class="content">0912345678</p>
            </div>
            <div class="email">
                <p class="title">Email</p>
                <p class="content">littleduck@dailytw.com</p>
            </div>
        </div>
        <div class="recipient_info">
            <h3>收件者資訊</h3>

            <label><input type="checkbox" />與訂購者相同</label>
            <label for="">收件者</label>
            <input type="text" name="mem_name" />
            <label for="">手機號碼</label>
            <input type="tel" name="mem_phone" maxlength="10" />
            <label for="">Email</label>
            <input type="email" name="mem_email" />
            <label for="">寄送地址</label>
            <input type="text" name="ord_addr" />
        </div>
        <div class="result">
            <router-link to="/ticket">
                <button class="cancel_btn">取消</button>
            </router-link>
            <router-link to="/pay_success">
                <button class="btn">確認付款</button>
            </router-link>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            img: require("@/assets/img/ticketExample.png"),
            Name: "斑比山丘門票",
            price_adultF: 200,
            price_exF: 50,
            count_adult: 1,
            count_ex: 0,
            subtotal: 200,
            total: 200,
        };
    },
    methods: {
        //小計
        // subTotalPrice() {
        //     const subtotalAdult = this.price_adultF * this.count_adult;
        //     const subtotalEx = this.price_exF * this.count_ex;
        //     this.subtotal = subtotalAdult + subtotalEx;
        //     this.Total();
        // },
        // Total() {
        //     this.total = this.subtotal;
        // },
    },
};
</script>
