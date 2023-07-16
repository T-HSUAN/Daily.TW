<!-- 單一票券的內容區塊 -->
<template>
    <div class="ticket_container">
        <div class="ticket_single">
            <Ticketsingle
                :ticketTitle="Title"
                :ticketTags="Tags"
                :originalPrice="originalP"
                :FinalPrice="FinalP"
            />
        </div>
        <div class="ticket_desc">
            <h4>票券描述</h4>
            <p class="content">
                1.全票200元(含體驗飼料一份)。<br />
                2.優待票50元(6~12歲之孩童、65歲以上之長者、領有身心障礙手冊者及其陪同者為優待票，皆需憑證明文件購票）。<br />
                3.5歲以下孩童免購票。<br />
            </p>
        </div>
        <div class="ticket_count">
            <h4>選擇門票數量</h4>
            <select name="item_adult" id="adult">
                <option>0</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
            <label for="adult">全票 </label>
            <select name="item_ex" id="ex">
                <option>0</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
            <label for="ex">優待票 </label>
        </div>
        <!-- 門票購買統計清單fixed right-->
        <div class="ticket_amount">
            <h4>目前選擇</h4>
            <p>全票 (NT$90 / 張) x2 NT$180</p>
            <p>半票 (NT$45 / 張) x1 NT$45</p>
            <p>總計 NT$450</p>
            <button>加入購物車</button>
            <button>直接購買</button>
        </div>
        <div class="ticket_notice">
            <h4>注意事項</h4>
            <p>
                單日門票有效期
                入園時間必須為2023年X月XX日或年底之前。賓客可參閱官方時間表以瀏覽最新公佈的景點開放日子和時間。
                不可轉售，否則作廢
                轉售或嘗試轉售此門票，不論成功與否，一經發現即作廢。 身份認證
                兌換門票或進入景點時，賓客須出示購票時所用的信用卡及購票確認憑據
                ，及應本公司要求出示個人身份證明文件，以核實其信用卡持有人的身份。
                每張單日門票必須由同一位賓客使用。賓客須在進園前在迴轉欄拍照，用作再次進園及門票升級時（如適用）持票人的身份認證。詳情及其他驗證安排，請按此查閱單日門票的條款及細則
            </p>
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
            Title: "蘭陽博物館門票",
            Tags: "#親子 #情侶 #農場",
            originalP: "NT$ " + 100,
            FinalP: "NT$ " + 90,
        };
    },
};
</script>
<style lang="scss">
@import "@/assets/scss/main.scss";
.ticket_container {
    max-width: 1200px;
    margin: auto;
    display: flex;
    flex-direction: column;
    .ticket_desc {
        width: 60%;
    }
    .ticket_count {
        width: 60%;
    }
    .ticket_amount {
        width: 400px;
        height: 500px;
        position: fixed;
        top: 300px;
        right: $sp3;
        background: $bgColor_default;
    }
    .ticket_notice {
        width: 60%;
    }
}
</style>
