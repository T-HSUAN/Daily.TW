<!-- 單一票券的內容區塊 -->
<template>
    <div class="ticketSingle_container">
        <div class="ticket_single">
            <Ticketsingle
                :ticketPhoto="Photo"
                :ticketTitle="Title"
                :ticketLocation="Location"
                :ticketTags="Tags"
                :showDetails="true"
                :ticketDetails="Details"
                :showAddr="true"
                :ticketAddr="Addr"
            />
        </div>
        <div class="ticket_info">
            <div class="ticket_desc">
                <h3>票券描述</h3>
                <ol class="content">
                    <li>全票200元(含體驗飼料一份)。</li>
                    <li>
                        優待票50元(6~12歲之孩童、65歲以上之長者、領有身心障礙手冊者及其陪同者為優待票，皆需憑證明文件購票）。
                    </li>
                    <li>5歲以下孩童免購票。</li>
                </ol>
            </div>
            <div class="ticket_select">
                <h3>選擇門票數量</h3>
                <div class="ticket_item">
                    <div class="ticket_adult">
                        <select name="ticket_count_adult" id="count_adult">
                            <option value="0" selected>0</option>
                            <option :value="num" v-for="num in 5" :key="num">
                                {{ num }}
                            </option>
                        </select>
                        <label for="count_adult">
                            <p class="name">全票</p>
                            <div class="price">
                                <p class="final">NT$ 90</p>
                                <p class="origin">原價:NT$100</p>
                            </div>
                        </label>
                    </div>
                    <div class="ticket_ex">
                        <select name="ticket_count_ex" id="count_ex">
                            <option value="0" selected>0</option>
                            <option :value="num" v-for="num in 5" :key="num">
                                {{ num }}
                            </option>
                        </select>
                        <label for="count_ex">
                            <p class="name">優待票</p>
                            <div class="price">
                                <p class="final">NT$ 45</p>
                                <p class="origin">原價:NT$50</p>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <!-- 門票購買統計清單sticky right-->
            <div class="ticket_amount">
                <div class="content">
                    <h3>目前選擇</h3>
                    <p>全票 (NT$90 / 張) x2 NT$180</p>
                    <p>半票 (NT$45 / 張) x1 NT$45</p>
                    <p class="total">總計 <span>NT$450</span></p>
                    <div class="buy_btn">
                        <button class="btn">加入購物車</button>
                        <button class="btn">直接購買</button>
                    </div>
                </div>
            </div>
            <div class="ticket_notice">
                <h4>注意事項</h4>
                <dl>
                    <dt>單日門票有效期：</dt>
                    <dd>
                        入園時間必須為2023年12月31日之前。請參閱官方時間表以瀏覽最新公佈的景點開放日期與時間。
                    </dd>
                    <dt>不可轉售，否則作廢：</dt>
                    <dd>
                        進行轉售或嘗試轉售此門票，不論成功與否，一經發現即作廢。
                    </dd>
                    <dt>身份認證：</dt>
                    <dd>
                        兌換門票或進入景點時，賓客須出示票券或購票憑據，及應本公司要求出示個人身份證明文件，以核實其身份。
                        詳情及其他驗證安排，請按此查閱單日門票的條款及細則。
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</template>

<script>
import Ticketsingle from "@/components/TicketVertical.vue";

export default {
    components: {
        Ticketsingle,
    },
    data() {
        return {
            Photo: require("@/assets/img/ticketExample.png"),
            Title: "蘭陽博物館門票",
            Location: "宜蘭",
            Tags: "#親子 #農場",
            Details:
                "大受歡迎的親子景點，園區內有多種動物，可以與梅花鹿、水豚、羊咩咩來場親密的互動。美美子咖啡廳的冰淇淋十分美味，推薦給所有人到店購買品嚐。",
            Addr: "宜蘭縣冬山鄉下湖路285號",
            OriginalP: 100,
            FinalP: 90,
        };
    },
};
</script>
<style lang="scss">
@import "@/assets/scss/main.scss";
@import "@/assets/scss/page/ticketSingle";
</style>
