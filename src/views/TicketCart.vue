<!-- 購物車 -->
<template>
    <div class="cart_page">
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
                <span>購物車</span>
            </router-link>
        </div>
        <!-- <button @click="test">test</button> -->
        <h2>請勾選票券進行結帳</h2>
        <div class="cart_items">
            <div class="cart_select_all">
                <label for="select_all" @change="selectAll()">
                    <input type="checkbox" id="select_all" :checked="$store.state.selectAll" />&nbsp;全選
                </label>
            </div>
            <div class="cart_item" v-for="(item, index) in cartItems" :key="item">
                <div class="ticket_title-photo">
                    <label for="select" class="ticket_title" @change="SelecteOne(item)">
                        <input type="checkbox" name="" id="select" :checked="item.selected" />&nbsp;{{ item.Name }}
                    </label>
                    <img :src="getPlaceImg(item.img)" alt="ticket_photo" />
                </div>
                <font-awesome-icon icon="fa-solid fa-trash-can" @click="removeFromCart(index)" />
                <div class="ticket_select">
                    <div class="ticket_item">
                        <div class="ticket_adult">
                            <label for="count_adult">
                                <p class="name">全票</p>
                                <p class="price">NT$ {{ priceAdultF(item) }}</p>
                            </label>
                            <select name="ticket_count_adult" class="count_adult" v-model="item.count_adult"
                                @change="updateSubtotal(item)">
                                <option value="0" selected>0</option>
                                <option :value="num" v-for="num in 5" :key="num">
                                    {{ num }}
                                </option>
                            </select>
                            <p class="subtotal_adult">
                                NT${{ priceAdultF(item) * item.count_adult }}
                            </p>
                        </div>
                        <div class="ticket_ex" v-if="item.price_ex">
                            <label for="count_ex">
                                <p class="name">優待票</p>
                                <p class="price">NT$ {{ priceExF(item) }}</p>
                            </label>
                            <select name="ticket_count_ex" class="count_ex" v-model="item.count_ex"
                                @change="updateSubtotal(item)">
                                <option value="0" selected>0</option>
                                <option :value="num" v-for="num in 5" :key="num">
                                    {{ num }}
                                </option>
                            </select>
                            <p class="subtotal_ex">
                                NT${{ priceExF(item) * item.count_ex }}
                            </p>
                        </div>
                    </div>
                </div>
                <p class="subtotal">小計 NT${{ item.subtotal }}</p>
            </div>
            <div class="result">
                <img class="payDuck" src="@/assets/img/duck_pay.svg" alt="payDuck" />
                <p>
                    <span>({{ finalCartItems.length }}項票券)</span>總計<br />
                    NT${{ finalCartTotalPrice }}
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
                <!-- 購買內容(結帳明細) -->
                <div class="item">
                    <div class="details" v-for="item in finalCartItems" :key="item">
                        <div class="title">
                            {{ item.Name }}
                        </div>
                        <div class="ticket_adult">
                            <p class="name">全票&nbsp;</p>
                            <p class="price">(NT$ {{ priceAdultF(item) }} /張)</p>
                            <p class="count">x{{ item.count_adult }}</p>
                        </div>
                        <div class="ticket_ex" v-if="item.price_ex">
                            <p class="name">優待票&nbsp;</p>
                            <p class="price">(NT$ {{ priceExF(item) }} /張)</p>
                            <p class="count">x{{ item.count_ex }}</p>
                        </div>

                        <div class="amount">
                            小計&nbsp;
                            <span>NT$ {{ item.subtotal }}</span>
                        </div>
                    </div>
                </div>
                <!-- 票券總計 -->
                <div class="result">
                    <p>({{ finalCartItems.length }}項票券) 總計</p>
                    <p>
                        NT$&nbsp;
                        <span class="total-price"> {{ finalCartTotalPrice }} </span>
                        元
                    </p>
                    <button class="btn" @click="checkoutFinalCart">
                        付款 <span>⇀</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { mapMutations, mapActions, mapGetters } from 'vuex';
export default {
    data() {
        return {
        };
    },
    methods: {
        ...mapMutations(['SelectItem', 'updateFinalCartItems']),
        ...mapActions(['removeFromCart', 'Subtotal']),
        getPlaceImg(placeImg) {
            return process.env.BASE_URL + 'placeImg/' + placeImg;
        },
        priceAdultF(item) {
            if (item.discount !== null) {
                return Math.round(item.discount * (item.price_adult / 10));
            } else {
                return item.price_adult;
            }
        },
        priceExF(item) {
            if (item.discount !== null) {
                return Math.round(item.discount * (item.price_ex / 10));
            } else {
                return item.price_ex;
            }
        },
        //小計
        updateSubtotal(item) {
            // 調用 action 來更新小計
            this.Subtotal({
                itemId: item.id,
                priceAdultF: this.priceAdultF(item),
                countAdult: item.count_adult,
                priceExF: this.priceExF(item),
                countEx: item.count_ex,
            });
        },
        SelecteOne(item) {
            item.selected = !item.selected;
            console.log('[勾選]', item.Name, ':', item.selected);
            //至少有一個沒有選中則為true
            const checkedItems = this.cartItems.every(item => item.selected === true);
            if (checkedItems === true) {
                this.$store.state.selectAll = true;
            }
            else {
                this.$store.state.selectAll = false;
            }
            console.log('[勾選]all:', this.$store.state.selectAll);
            this.updateFinalCart();
        },
        selectAll() {
            this.$store.state.selectAll = !this.$store.state.selectAll;
            this.$store.commit('SelectItem');// 更新購物車項目的選取狀態
            console.log('[勾選]all:', this.$store.state.selectAll);
            this.updateFinalCart();// 更新最終購物明細清單和總金額 
        },
        updateFinalCart() {
            // 選中的商品加入最終購物明細清單
            const finalCartItems = this.cartItems.filter(item => item.selected);
            // 將最終購物明細清單存儲在 Vuex 或其他地方
            this.$store.commit('updateFinalCartItems', finalCartItems);
        },
        //結帳
        checkoutFinalCart() {
            if (this.finalCartTotalPrice > 0) {
                this.$router.push('/ticket_payment'); // 購物車不為空，跳轉到結帳頁面
            }
            else {
                swal("您尚未勾選票券或選擇票券數量", "", "warning", { timer: 2000 });
            }
        },
        test() {
            console.log(this.cartItems);
        }
    },
    computed: {
        ...mapGetters(['cartItems', 'totalPrice', 'totalSelectedPrice', 'finalCartItems', 'finalCartTotalPrice']),
        selectItem: {
            get() {
                return this.$store.state.selectAll;
            },
            set(value) {
                this.$store.commit('SelectItem', value);
            }
        }
    },
    mounted() {
        this.$store.commit('SelectItem');
        this.updateFinalCart();
    }
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/baseAndMixin.scss";
@import "@/assets/scss/page/ticketcart.scss";
</style>
