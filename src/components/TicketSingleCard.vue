<!-- 橫式單一票券 -->
<template>
    <div class="ticket_single_card">
        <img :src="ticketPhoto" alt="票券照片" />
        <div class="ticket_text">
            <h3 class="ticket_title">{{ ticketTitle }}</h3>
            <p class="ticket_location">
                {{ ticketLocation }}・
                <span class="ticket_tags">{{ ticketTags }}</span>
            </p>
            <p class="ticket_details">
                {{ ticketDetails }}
            </p>
            <!-- if true顯示 false不顯示 -->
            <a
                class="ticket_addr"
                :href="ticketAddrLink"
                target="_blank"
                title="點擊查看地圖"
                v-if="showAddr === true"
            >
                <font-awesome-icon icon="fa-solid fa-location-dot" />&nbsp;
                {{ ticketAddr }}
            </a>
            <div class="ticket_price" v-if="showNT === true">
                <!--以下不用加true/false，它是參考originalPrice的值，沒有價格就會不顯示 -->
                <p class="price_original" v-if="originalPrice !== ''">NT$</p>
                <p class="price_original">{{ originalPrice }}</p>
                <p class="price_final">NT${{ FinalPrice }}</p>
            </div>
        </div>
        <!--以下不用加true/false，它是參考discountTag的值，沒有折扣就會不顯示 -->
        <p class="discount_tag" v-if="discountTag !== ''">{{ discountTag }}</p>
    </div>
</template>

<script>
import { stringifyQuery } from "vue-router";

export default {
    props: {
        ticketPhoto: String,
        ticketTitle: String,
        ticketLocation: String,
        ticketDetails: String,
        showAddr: Boolean,
        ticketAddr: String,
        ticketAddrLink: String,
        ticketTags: String,
        showNT: Boolean,
        originalPrice: { Number, String },
        FinalPrice: Number,
        discountTag: String,
    },
};
</script>
