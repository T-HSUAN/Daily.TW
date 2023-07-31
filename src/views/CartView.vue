<!-- 購物車 -->
<template>
    <div class="cart_page">
        <div class="breadcrumb">
            <router-link to="/">
                <span>首頁</span>
            </router-link>
            <font-awesome-icon icon="fa-solid fa-chevron-right" />
            <router-link to="/ticket">
                <span>景點票券</span>
            </router-link>
            <font-awesome-icon icon="fa-solid fa-chevron-right" />
            <router-link to="/ticket_info">
                <span>購物車</span>
            </router-link>
        </div>
        <div class="cart_items">
            <div class="cart_select_all">
                <label for="select_all"><input type="checkbox" id="select_all" />&nbsp;全選</label>
            </div>
            <div class="cart_item">
                <div class="ticket_title-photo">
                    <label for="select" class="ticket_title"><input type="checkbox" name="" id="select" />&nbsp;{{
                        Name
                    }}</label>
                    <img :src="img" alt="ticket_photo" />
                </div>
                <font-awesome-icon icon="fa-solid fa-trash-can" />

                <div class="ticket_select">
                    <div class="ticket_item">
                        <div class="ticket_adult">
                            <label for="count_adult">
                                <p class="name">全票</p>
                                <p class="price">NT$ {{ price_adultF }}</p>
                            </label>
                            <select name="ticket_count_adult" class="count_adult" v-model="count_adult"
                                @change="subTotalPrice()">
                                <option value="0" selected>0</option>
                                <option :value="num" v-for="num in 5" :key="num">
                                    {{ num }}
                                </option>
                            </select>
                            <p class="subtotal_adult">
                                NT${{ price_adultF * count_adult }}
                            </p>
                        </div>
                        <div class="ticket_ex">
                            <label for="count_ex">
                                <p class="name">優待票</p>
                                <p class="price">NT$ {{ price_exF }}</p>
                            </label>
                            <select name="ticket_count_ex" class="count_ex" v-model="count_ex" @change="subTotalPrice()">
                                <option value="0" selected>0</option>
                                <option :value="num" v-for="num in 5" :key="num">
                                    {{ num }}
                                </option>
                            </select>
                            <p class="subtotal_ex">
                                NT${{ price_exF * count_ex }}
                            </p>
                        </div>
                    </div>
                </div>
                <p class="subtotal">小計 NT${{ subtotal }}</p>
            </div>
            <div class="result">
                <img class="payDuck" src="@/assets/img/duck_pay.svg" alt="payDuck" />
                <p>
                    <span>(1項票券)</span>總計<br />
                    NT${{ total }}
                </p>
            </div>
            <div class="btn_buy-pay">
                <router-link to="/ticket"><button class="btn buymore">繼續購買</button></router-link>
                <router-link to="/ticket_payment"><button class="btn pay">
                        付款 <span>⇀</span>
                    </button></router-link>
            </div>
        </div>
        <div class="pay_details">
            <div class="pay_details_content">
                <img class="payDuck" src="@/assets/img/duck_pay.svg" alt="decorate" />
                <p class="Title">付款明細</p>
                <!-- 購買內容 -->
                <div class="item">
                    <div class="details">
                        <div class="title">
                            {{ Name }}
                        </div>
                        <div class="ticket_adult">
                            <p class="name">全票&nbsp;</p>
                            <p class="price">(NT$ {{ price_adultF }} /張)</p>
                            <p class="count">x{{ count_adult }}</p>
                        </div>
                        <div class="ticket_ex">
                            <p class="name">優待票&nbsp;</p>
                            <p class="price">(NT$ {{ price_exF }} /張)</p>
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
                    <router-link to="/ticket_payment"><button class="btn">
                            付款 <span>⇀</span>
                        </button></router-link>
                </div>
            </div>
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
            count_adult: 0,
            count_ex: 0,
            subtotal: 0,
            total: 0,
        };
    },
    methods: {
        //小計
        subTotalPrice() {
            const subtotalAdult = this.price_adultF * this.count_adult;
            const subtotalEx = this.price_exF * this.count_ex;

            this.subtotal = subtotalAdult + subtotalEx;
            this.Total();
        },
        Total() {
            this.total = this.subtotal;
        },
    },
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/baseAndMixin.scss";
@import "@/assets/scss/page/cart.scss";
</style>
