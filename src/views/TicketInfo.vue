<!-- 單一票券的內容區塊 -->
<template>
    <div class="ticket_info_page">
        <div class="breadcrumb">
            <router-link to="/">
                <span>首頁</span>
            </router-link>
            <font-awesome-icon icon="fa-solid fa-chevron-right" />
            <router-link to="/ticket">
                <span>景點票券</span>
            </router-link>
            <font-awesome-icon icon="fa-solid fa-chevron-right" />
            <router-link to="/ticket">
                <span>票券詳情</span>
            </router-link>
        </div>
        <!-- 票券造型呈現，1200以下無造型 -->
        <TicketSingleCard :ticketPhoto="ticketInfo.img" :ticketTitle="ticketInfo.Name" :ticketLocation="ticketInfo.location"
            :ticketTags="ticketInfo.tag" :ticketDetails="ticketInfo.ticket_details" :showAddr="true"
            :ticketAddr="ticketInfo.ticket_addr" :ticketAddrLink="ticketInfo.ticket_addr_link"
            :discountTag="ticketInfo.discount" />
        <!-- 票券資訊區 -->
        <div class="ticket_info">
            <!-- 內容描述 -->
            <div class="ticket_desc">
                <h3>票券描述</h3>
                <ol class="content">
                    <li>全票200元(含體驗飼料一份)。</li>
                    <li>
                        優待票50元(6~12歲之孩童、65歲以上之長者、領有身心障礙手冊者及其陪同者為優待票，皆需憑證明文件購票)。
                    </li>
                    <li>5歲以下孩童免購票。</li>
                </ol>
            </div>
            <!-- 選擇門票數量 -->
            <div class="ticket_select">
                <h3>選擇門票數量</h3>
                <div class="ticket_item">
                    <!-- 成人票項目 -->
                    <div class="ticket_adult">
                        <select name="ticket_count_adult" class="count_adult" v-model="ticketInfo.count_adult"
                            @change="subTotalpricePreview">
                            <option value="0" selected>0</option>
                            <option :value="num" v-for=" num  in  5 " :key="num">
                                {{ num }}
                            </option>
                        </select>
                        <label for="count_adult">
                            <p class="name">全票</p>
                            <div class="price">
                                <p class="final">NT$ {{ ticketInfo.price_adultF }}</p>
                                <p class="origin" v-if="ticketInfo.price_adultO !== ''">
                                    原價:NT$ {{ ticketInfo.price_adultO }}
                                </p>
                            </div>
                        </label>
                    </div>
                    <!-- 優惠票項目 -->
                    <div class="ticket_ex" v-if="ticketInfo.price_exF !== ''">
                        <select name="ticket_count_ex" class="count_ex" v-model="ticketInfo.count_ex"
                            @change="subTotalpricePreview">
                            <option value="0" selected>0</option>
                            <option :value="num" v-for=" num  in  5 " :key="num">
                                {{ num }}
                            </option>
                        </select>
                        <label for="count_ex">
                            <p class="name">優待票</p>
                            <div class="price">
                                <p class="final">NT$ {{ ticketInfo.price_exF }}</p>
                                <p class="origin" v-if="ticketInfo.price_exO != ''">
                                    原價:NT$ {{ ticketInfo.price_exO }}
                                </p>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <!-- 門票購買統計清單sticky right-->
            <div class="ticket_amount">
                <div class="content">
                    <h3>目前選擇</h3>
                    <p>
                        全票 (NT$ {{ ticketInfo.price_adultF }} / 張) x {{ ticketInfo.count_adult
                        }}<span>NT$ {{ ticketInfo.price_adultF * ticketInfo.count_adult }}</span>
                    </p>
                    <p v-if="ticketInfo.price_exF != ''">
                        半票 (NT$ {{ ticketInfo.price_exF }} / 張) x {{ ticketInfo.count_ex
                        }}<span>NT$ {{ ticketInfo.price_exF * ticketInfo.count_ex }}</span>
                    </p>
                    <!-- 總計 -->
                    <p class="total">
                        總計 <span>NT${{ ticketInfo.subtotal }}</span>
                    </p>
                    <!-- 購物車&購買按鈕 -->
                    <div class="buy_btn">
                        <button class="btn" @click="createItem()">加入購物車</button>
                        <button class="btn" @click="buyDirectly()">直接購買</button>
                    </div>
                </div>
            </div>
            <!-- 注意事項 -->
            <div class="ticket_notice">
                <h4>注意事項</h4>
                <dl>
                    <dt>單日門票有效期：</dt>
                    <dd>
                        請注意，此門票僅限於2023年12月31日前入園。請務必參閱官方時間表，確認景點的最新開放日期與時間，並確保在有效期內使用門票。
                    </dd>
                    <dt>禁止轉售：</dt>
                    <dd>
                        門票僅限持票人使用，不可進行轉售或嘗試轉售。任何發現的轉售行為，無論成功與否，將導致門票作廢，並可能面臨法律追究。
                    </dd>
                    <dt>身份證明：</dt>
                    <dd>
                        兌換門票或進入景點時，請攜帶有效的身份證明文件，以核實您的身份。根據本公司的要求，可能需要出示票券或購票憑據以及個人身份證明文件。請遵守以上注意事項，確保您的入場體驗順利且安全。如有其他驗證安排或細則，請查閱相關的官方公告以瞭解更多資訊。
                    </dd>
                </dl>
            </div>
            <!-- 購買按鈕(手機) -->
            <div class="buy_btn_phone">
                <button class="btn" @click="createItem()">加入購物車</button>
                <button class="btn" @click="buyDirectly()">直接購買</button>
            </div>
        </div>
        <!-- 購物車清單(側邊) -->
        <div :class="['cart_sidebar', { 'showCartSidebar': switchPage }]">
            <div class="cart_icon" @click="switchCart">
                <font-awesome-icon icon="fa-solid fa-cart-shopping" class="cart_switch" />
                <div class="numTag">{{ cartItems.length }}</div>
            </div>
            <h2>付款明細</h2>
            <!-- 購物明細(側邊) -->
            <div class="item">
                <div class="item_null" v-if="cartItems.length === 0">
                    <p>您的購物車目前是空的</p>
                    <img src="@/assets/img/cart_empty.svg" alt="decorate">
                </div>
                <div class="details" v-for="(item, index) in cartItems" :key="item.id">
                    <!-- 標題&垃圾桶 -->
                    <div class="title">
                        {{ item.Name }}
                        <font-awesome-icon icon="fa-solid fa-trash-can" class="cancel" @click="removeFromCart(index)"
                            title="刪除" />
                    </div>
                    <!-- 成人票券項目 -->
                    <div class="ticket_adult">
                        <label for="count_adult">
                            <p class="name">全票&nbsp;</p>
                            <p class="price">
                                (NT$ {{ item.price_adultF }} /張)
                            </p>
                        </label>
                        <select v-model="item.count_adult" name="ticket_count_adult" class="count_adult"
                            @change="updateSubtotal(item)">
                            <!-- 小計 -->
                            <option value="0" selected>0</option>
                            <option :value="num" v-for="num in 5" :key="num">
                                {{ num }}
                            </option>
                        </select>
                    </div>
                    <!-- 優惠票券項目 -->
                    <div class="ticket_ex" v-if="item.price_exF !== ''">
                        <label for="count_ex">
                            <p class="name">優待票&nbsp;</p>
                            <p class="price">(NT$ {{ item.price_exF }} /張)</p>
                        </label>
                        <select v-model="item.count_ex" name="ticket_count_ex" class="count_ex"
                            @change="updateSubtotal(item)">
                            <option value="0" selected>0</option>
                            <option :value="num" v-for="num in 5" :key="num">
                                {{ num }}
                            </option>
                        </select>
                    </div>
                    <!-- 小計 -->
                    <div class="amount">
                        小計&nbsp;
                        <span>NT$ {{ item.subtotal }}</span>
                    </div>
                </div>
            </div>
            <!-- 票券總計 -->
            <div class="total">
                <p>({{ cartItems.length }}項票券) 總計</p>
                <p> NT$&nbsp;
                    <span class="total-price"> {{ totalPrice }} </span>
                    元
                </p>
                <!-- 結帳按鈕，跳轉至購物車 -->
                <button class="btn" @click="checkoutCart">結帳</button>
            </div>
        </div>
    </div>
</template>

<script>
import TicketSingleCard from "@/components/TicketSingleCard.vue";
import ticketData from "@/store/ticketData.js";
import { mapActions, mapGetters } from 'vuex';

export default {
    components: {
        TicketSingleCard,
    },
    props: {
        id: {
            type: Number,
            required: true // 要求接收 id 屬性
        }
    },
    data() {
        return {
            cartItems: this.$store.state.cartItems,
            switchPage: false,
            ticketInfo: null,
        };
    },
    methods: {
        ...mapActions(['addToCart', 'addToCartDirectly', 'removeFromCart', 'Subtotal']),
        // 從前一頁的票券得到它的id，藉由這個id找到與ticketData一樣id資料，並傳入本頁的ticketInfo之中
        getTicketContent(ticketId) {
            return ticketData.find(ticketData => ticketData.id === ticketId);
        },
        //小計預覽(未加入購物車)
        subTotalpricePreview() {
            const subtotalAdult = this.ticketInfo.price_adultF * this.ticketInfo.count_adult;
            const subtotalEx = this.ticketInfo.price_exF * this.ticketInfo.count_ex;
            this.ticketInfo.subtotal = subtotalAdult + subtotalEx;
        },
        // toggle購物車
        switchCart() {
            this.switchPage = !this.switchPage;
        },
        //加入購物車
        createItem() {
            const cartItem = this.ticketInfo;
            console.log('Received item:', this.cartItems);
            if (cartItem) {
                this.addToCart(cartItem);
            }
        },
        //直接購買
        buyDirectly() {
            const cartItem = this.ticketInfo;
            if (cartItem) {
                this.addToCartDirectly(cartItem);
                this.$router.push('/ticket_cart');
            }
        },
        updateSubtotal(ticketInfo) {
            // 調用 action 來更新小計
            this.Subtotal({
                itemId: ticketInfo.id,
                countAdult: ticketInfo.count_adult,
                countEx: ticketInfo.count_ex,
            });
        },
        //跳轉至購物車
        checkoutCart() {
            if (this.cartItems.length > 0) {
                this.$router.push('/ticket_cart'); // 购物车不为空，跳转到结账页面
            } else {
                swal("您的購物車是空的", "請先選購票券", "warning", { timer: 2000 });
            }
        },
    },
    computed: {
        ...mapGetters(['cartItems', 'totalPrice']),
    },
    created() {
        //接收前一頁的票券id
        console.log('Received id:', this.$route.params.id);
        const id = parseInt(this.$route.params.id);
        this.ticketInfo = this.getTicketContent(id);
        this.subTotalpricePreview();//票券小計預覽(未加入購物車)
    }

};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/baseAndMixin.scss";
@import "@/assets/scss/page/ticketinfo.scss";
</style>
