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
            <a class="ticket_addr" :href="ticketAddrLink" target="_blank" title="點擊查看地圖" v-if="showAddr === true">
                <font-awesome-icon icon="fa-solid fa-location-dot" />&nbsp;
                {{ ticketAddr }}
            </a>
            <div class="ticket_price" v-if="showNT === true">
                <!--以下不用加true/false，它是參考originalPrice的值，沒有價格就會不顯示 -->
                <p class="price_original" v-if="originalPrice !== FinalPrice">NT$</p>
                <p class="price_original">{{ originalPrice }}</p>
                <p class="price_final">NT${{ FinalPrice }}</p>
            </div>
        </div>
        <!--以下不用加true/false，它是參考discountTag的值，沒有折扣就會不顯示 -->
        <p class="discount_tag" v-if="discountTag">{{ discountTag }}折</p>
    </div>
</template>

<script>
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
<style lang="scss" scoped>
@import "@/assets/scss/baseAndMixin.scss";

.ticket_single_card {
    display: flex;
    flex-direction: column;
    width: 100%;
    max-width: $sm;
    margin: $sp2 auto;
    position: relative;

    @media (min-width: $md) {
        max-width: $xl;
        margin: $sp4 auto;
    }

    @media (min-width: $xl) {
        flex-direction: row;
        max-width: 1135px;
        height: 361px;
        background-image: url("@/assets/img/layout/ticketHorizontal.svg");
        background-position: top;
        background-size: cover;
        background-repeat: no-repeat;
    }

    img {
        width: 80%;
        margin: $sp3 auto;

        @media (min-width: $md) {
            width: 80%;
            margin: $sp4 auto;
        }

        @media (min-width: $xl) {
            width: 100%;
            max-width: 500px;
            height: 100%;
            margin: 0 $sp9;
        }
    }

    // 票券內文
    .ticket_text {
        width: 80%;
        height: 313px;
        display: flex;
        flex-direction: column;
        position: relative;
        margin: $sp3 auto;
        color: $textColor_default;

        @media (min-width: $md) {
            width: 80%;
            margin: $sp4 auto;
        }

        @media (min-width: $xl) {
            margin: $sp3;
            color: $textColor_white;
        }

        h3 {
            @include sm_h3;
            letter-spacing: 0.72px;
            line-height: 150%;


            @media (min-width: $xl) {
                @include xl_h3;
            }
        }

        // 地區&標籤
        .ticket_location {
            display: inline-block;
            color: $textColor_tint;
            font-size: 14px;
            margin-top: $sp1;
            flex-grow: 0;

            @media (min-width: $md) {
                font-size: 16px;
                margin-top: $sp1;
            }

            @media (min-width: $xl) {
                color: $tint_blue;
                font-size: 16px;
                margin-top: 10px;
            }

            .ticket_tags {
                font-weight: 300;
                letter-spacing: 0.32px;
            }
        }

        // 介紹
        .ticket_details {
            line-height: 25px;
            margin: $sp2 0;
            color: $textColor_default;

            @media (min-width: $md) {
                font-size: 16px;
                line-height: 25px;
                margin: $sp2 0;
            }

            @media (min-width: $xl) {
                line-height: 30px;
                margin: $sp2 $sp5 $sp2 0;
                color: $textColor_white;
            }
        }

        // 地址連結
        .ticket_addr {
            display: block;
            color: $textColor_default;

            @media (min-width: $md) {
                font-size: 16px;
            }

            @media (min-width: $xl) {
                position: absolute;
                bottom: 0;
                font-size: 18px;
                color: $textColor_white;
            }

            .fa-location-dot {
                color: $mid_red;
            }
        }
    }

    // 右上角折扣標籤
    .discount_tag {
        display: none;

        @media (min-width: $xl) {
            display: inline-block;
            width: 65px;
            line-height: 65px;
            position: absolute;
            right: 8px;
            top: -20px;
            font-size: 18px;
            font-weight: 700;
            color: $textColor_white;
            background: $default_red;
            text-align: center;
            border-radius: 50%;
            transform: rotate(15deg);
        }
    }
}
</style>
