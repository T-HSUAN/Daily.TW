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
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
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
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
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
                <p>總計 NT$450</p>
                <button>加入購物車</button>
                <button>直接購買</button>
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
    box-sizing: border-box;
    max-width: 1200px;
    margin: auto;
    padding: 0 $sp2;
    display: flex;
    flex-direction: column;
    position: relative;
    h3 {
        margin-bottom: $sp3;
        text-align: left;
    }
    .ticket_desc {
        width: 60%;
        margin: $sp5 0;
        .content {
            padding-left: $sp3;
            list-style: number;
            li {
                line-height: 30px;
                letter-spacing: 0.54px;
            }
        }
    }
    .ticket_select {
        width: 60%;
        margin: $sp5 0;
        .ticket_item {
            display: flex;
            justify-content: space-between;
            .ticket_adult,
            .ticket_ex {
                display: flex;
                select {
                    width: 100px;
                    height: 75px;
                    font-size: 24px;
                    color: $textColor_default;
                    text-align: center;
                    border-radius: 50px;
                }
                label {
                    margin: 0 $sp4;
                    .name {
                        font-size: $xl_h5;
                    }
                    .price {
                        .final {
                            font-size: 32px;
                        }
                        .origin {
                            color: $textColor_tint;
                            font-size: 16px;
                            text-decoration: line-through;
                        }
                    }
                }
            }
        }
    }
    .ticket_amount {
        width: 400px;
        height: calc(100% - $sp2);
        position: absolute;
        top: $sp2;
        right: $sp2;
        .content {
            height: 500px;
            position: sticky;
            top: 200px;
            right: $sp3;
            background: $bgColor_default;
        }
    }
    .ticket_notice {
        box-sizing: border-box;
        width: 60%;
        margin: $sp5 0;
        padding: $sp3 $sp4;
        border: 1px solid $textColor_default;
        dt {
            margin: $sp2 0;
            font-size: 16px;
        }
        dd {
            margin: $sp1 0;
            font-size: 16px;
        }
    }
}
</style>
