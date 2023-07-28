<!-- 單一票券的內容區塊 -->
<template>
    <div class="ticket_info_page">
        <!-- 票券造型呈現，768以下無造型 -->
        <TicketSingleCard :ticketPhoto="img" :ticketTitle="Name" :ticketLocation="location" :ticketTags="tag"
            :ticketDetails="ticket_details" :showAddr="true" :ticketAddr="ticket_addr" :ticketAddrLink="ticket_addr_link"
            :discountTag="discount" />
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
                        <select name="ticket_count_adult" class="count_adult" v-model="count_adult"
                            @change="subTotalPrice()">
                            <option value="0" selected>0</option>
                            <option :value="num" v-for="num in 5" :key="num">
                                {{ num }}
                            </option>
                        </select>
                        <label for="count_adult">
                            <p class="name">全票</p>
                            <div class="price">
                                <p class="final">NT$ {{ price_adultF }}</p>
                                <p class="origin" v-if="price_adultO !== ''">
                                    原價:NT$ {{ price_adultO }}
                                </p>
                            </div>
                        </label>
                    </div>
                    <!-- 優惠票項目 -->
                    <div class="ticket_ex">
                        <select name="ticket_count_ex" class="count_ex" v-model="count_ex" @change="subTotalPrice()">
                            <option value="0" selected>0</option>
                            <option :value="num" v-for="num in 5" :key="num">
                                {{ num }}
                            </option>
                        </select>
                        <label for="count_ex">
                            <p class="name">優待票</p>
                            <div class="price">
                                <p class="final">NT$ {{ price_exF }}</p>
                                <p class="origin" v-if="price_exO !== ''">
                                    原價:NT$ {{ price_exO }}
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
                        全票 (NT$ {{ price_adultF }} / 張) x {{ count_adult
                        }}<span>NT$ {{ price_adultF * count_adult }}</span>
                    </p>
                    <p>
                        半票 (NT$ {{ price_exF }} / 張) x {{ count_ex
                        }}<span>NT$ {{ price_exF * count_ex }}</span>
                    </p>
                    <!-- 總計 -->
                    <p class="total">
                        總計 <span>NT${{ subtotal }}</span>
                    </p>
                    <!-- 購物車&購買按鈕 -->
                    <div class="buy_btn">
                        <button class="btn">加入購物車</button>
                        <router-link to="/cart"><button class="btn">直接購買</button></router-link>
                    </div>
                </div>
            </div>
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
            <div class="buy_btn_phone">
                <button class="btn">加入購物車</button>
                <router-link to="/cart"><button class="btn">直接購買</button></router-link>
            </div>
        </div>
        <!-- 購物車清單 -->
        <div class="cart">
            <font-awesome-icon icon="fa-solid fa-cart-shopping" class="cart_toggle" />
            <div class="numTag">0</div>
        </div>
    </div>
</template>

<script>
import TicketSingleCard from "@/components/TicketSingleCard.vue";

export default {
    components: {
        TicketSingleCard,
    },
    data() {
        return {
            img: require("@/assets/img/ticket_photo/ticket_photo02.jpg"),
            Name: "蘭陽博物館",
            location: "宜蘭",
            tag: "#親子#情侶#藝文",
            ticket_details:
                "蘭陽博物館結合在地海洋觀光特色，形成旅遊廊道，在觀光資源區帶上，扮演人文旅遊的窗口，期待再現石港春帆的風華，同時實踐「宜蘭是一座博物館」的理念。",
            ticket_addr: "宜蘭縣頭城鎮青雲路三段750號",
            ticket_addr_link: "https://goo.gl/maps/4o6bFU6S4FTv6koHA",
            price_adultO: 100,
            price_adultF: 90,
            price_exO: 50,
            price_exF: 45,
            discount: "9折",
            count_adult: 0,
            count_ex: 0,
            subtotal: 0,
        };
    },
    methods: {
        //小計
        subTotalPrice() {
            const subtotalAdult = this.price_adultF * this.count_adult;
            const subtotalEx = this.price_exF * this.count_ex;

            this.subtotal = subtotalAdult + subtotalEx;
        },
    },
};
</script>
<style lang="scss">
@import "@/assets/scss/baseAndMixin.scss";
</style>
