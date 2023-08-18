<template>
    <div class="payment_page">
        <div class="breadcrumb">
            <router-link to="/Home">
                <span>首頁</span>
            </router-link>
            <font-awesome-icon icon="fa-solid fa-chevron-right" />
            <router-link to="/ticket">
                <span>景點票券</span>
            </router-link>
            <font-awesome-icon icon="fa-solid fa-chevron-right" />
            <router-link to="/ticket_info">
                <span>票券詳情</span>
            </router-link>
        </div>
        <div class="pay_details">
            <div class="pay_details_content">
                <img class="payDuck" src="@/assets/img/duck_pay.svg" alt="decorate" />
                <h3 class="Title">付款明細</h3>
                <!-- 購買內容 -->
                <div class="item">
                    <div class="details" v-for="(item, index) in FilterFinalCartItems" :key="index">
                        <h4 class="title">
                            {{ item.Name }}
                        </h4>
                        <div class="ticket_adult">
                            <p class="name">
                                全票&nbsp;
                                <span class="price">(NT$ {{ item.price_adultF }} /張)</span>
                            </p>
                            <p class="count">x{{ item.count_adult }}</p>
                        </div>
                        <div class="ticket_ex">
                            <p class="name">
                                優待票&nbsp;
                                <span class="price">(NT$ {{ item.price_exF }} /張)</span>
                            </p>
                            <p class="count">x{{ item.count_ex }}</p>
                        </div>

                        <div class="amount">
                            小計&nbsp;
                            <span>NT$ {{ item.subtotal }}</span>
                        </div>
                    </div>
                </div>
                <!-- 票券總計 -->
                <div class="total">
                    <p>({{ FilterFinalCartItems.length }}項票券) 總計</p>
                    <p>
                        NT$&nbsp;
                        <span class="total-price"> {{ finalCartTotalPrice }} </span>
                        元
                    </p>
                </div>
            </div>
        </div>
        <div class="pay_info">
            <div class="methods">
                <h3>請選擇付款方式</h3>
                <label for="method">
                    <input type="radio" name="pay_method" class="method" />信用卡</label>
                <label for="method">
                    <input type="radio" name="pay_method" class="method" />
                    LINE Pay</label>
                <label for="method">
                    <input type="radio" name="pay_method" class="method" />街口支付</label>
                <label for="method">
                    <input type="radio" name="pay_method" class="method" />轉帳</label>
            </div>
            <div class="order_info">
                <h3>訂購者資訊</h3>
                <div class="name">
                    <p class="title">訂購者</p>
                    <p class="content">{{ memberData.mem_name }}</p>
                </div>
                <div class="phone_num">
                    <p class="title">手機號碼</p>
                    <p class="content">{{ memberData.mem_phone }}</p>
                </div>
                <div class="email">
                    <p class="title">Email</p>
                    <p class="content">{{ memberData.mem_email }}</p>
                </div>
            </div>
            <div class="recipient_info">
                <h3>收件者資訊</h3>
                <label>
                    <input type="checkbox" class="same_check" @click="switchCheck" />
                    與訂購者相同&nbsp;<span v-if="checked">(勾選時無法修改內容)</span>
                </label>
                <label for="">收件者</label>
                <input type="text" name="name" class="name" v-model="recipient_info.ord_receiver" :disabled="checked"
                    placeholder="請輸入收件者" />
                <label for="">手機號碼</label>
                <input type="tel" name="phone" maxlength="10" v-model="recipient_info.ord_phone" :disabled="checked"
                    placeholder="請輸入手機號碼" />
                <label for="">Email</label>
                <input type="email" name="email" v-model="recipient_info.ord_email" :disabled="checked"
                    placeholder="請輸入email" />
                <label for="">寄送地址</label>
                <input type="text" name="ord_addr" v-model="recipient_info.ord_addr" placeholder="請輸入地址" />
            </div>
            <div class="result">
                <router-link to="/ticket">
                    <button class="cancel_btn">取消</button>
                </router-link>
                <router-link to="/ticket_pay_success">
                    <button class="btn" @click="SubmitOrderInfo">確認付款</button>
                </router-link>
            </div>
        </div>
    </div>
</template>
<script>
import { mapActions, mapGetters } from 'vuex';
import { GET } from '@/plugin/axios'
export default {
    data() {
        return {
            memberData: [],
            recipient_info: {
                ord_no: 1,
                ord_date: new Date().toLocaleDateString(),
                // ticket_name: this.FilterFinalCartItems.Name,
                // price_adult: this.FilterFinalCartItems.price_adultF,
                // price_ex: this.FilterFinalCartItems.price_exF,
                // count_adult: this.FilterFinalCartItems.count_adult,
                // count_ex: this.FilterFinalCartItems.count_ex,
                // subtotal: this.FilterFinalCartItems.subtotal,
                ord_sum: "",
                ord_receiver: "",
                ord_phone: "",
                ord_email: "",
                ord_addr: "",
            },
            checked: false,
        };
    },
    methods: {
        ...mapActions(['setOrderInfo']),
        switchCheck() {
            this.checked = !this.checked;
            this.CheckedSame();
        },
        CheckedSame() {
            if (this.checked === true) {
                this.recipient_info.ord_receiver = this.memberData.mem_name;
                this.recipient_info.ord_phone = this.memberData.mem_phone;
                this.recipient_info.ord_email = this.memberData.mem_email;
            }
        },
        SubmitOrderInfo() {
            // 假设 this.recipient_info 包含需要的订单信息
            this.setOrderInfo(this.recipient_info);
            console.log('[訂單資訊]:', this.recipient_info);
        }
    },
    computed: {
        ...mapGetters(['cartItems', 'finalCartItems', 'finalCartTotalPrice', 'orderInfo']),
        FilterFinalCartItems() {
            // 假設 finalCartItems 是包含所有項目的陣列
            const FilterFinalCartItems = this.finalCartItems.filter(item => item.subtotal !== 0);
            return FilterFinalCartItems;
        },
    },
    mounted() {
        GET(`${this.$URL}/memberViewInfo.php`)
            .then((res) => {
                console.log(res);
                this.memberData = res;
                console.log('[會員]:資料成功匯入', this.memberData);
            })
            .catch((err) => {
                console.log(err);
            });
        this.recipient_info.ord_sum = this.finalCartTotalPrice;
    },
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/baseAndMixin.scss";
@import "@/assets/scss/page/ticketpayment.scss";
</style>
