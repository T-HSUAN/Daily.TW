<template>
    <div class="my_oott_card">
        <div class="card_content">
            <router-link to="/oott_info">
                <img :src="oottPhoto" alt="穿搭照片" class="oott_card_pic" />
            </router-link>
            <!-- 0 = 審核中 -->
            <div class="oott_card_text reviewing" v-if="oottStatus=='0'">
                <div class="oott_card_info" >
                    <h5 class="oott_card_tag">{{ oottCardTags }}</h5>
                    <span class="oott_card_date">審核中</span>
                </div>
            </div>
            <!-- 1 = 已通過, -->
            <div class="oott_card_text pass" v-if="oottStatus=='1'">
                <div class="oott_card_info" >
                    <h5 class="oott_card_tag">{{ oottCardTags }}</h5>
                    <span class="oott_card_date">{{ oottCardDate }}</span>
                </div>
            </div>
            <!-- 2 = 待修改 -->
            <div class="oott_card_text edit_needed" v-if="oottStatus=='2'">
                <div class="oott_card_info">
                    <h5 class="oott_card_tag">{{ oottCardTags }}</h5>
                    <span class="oott_card_date">待修改</span>
                </div>
            </div>
        </div>
        <div class="action">
            <!-- 2 = 待修改 -->
            <div class="edit" v-if="oottStatus=='2'" @click="this.$router.push(`/oott_edit_view/${id}`)">
                <font-awesome-icon icon="fa-solid fa-pen" />
                編輯
            </div>
            <!-- 1 = 已通過, -->
            <span class="delete" v-if="oottStatus=='1'">
                <font-awesome-icon icon="fa-solid fa-trash-can" />
                刪除
            </span>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        oottPhoto: String,
        oottCardTags: String,
        oottCardDate: String,
        oottStatus : String,
        id:Number,
    },
};
</script>

<style lang="scss">
@import "@/assets/scss/baseAndMixin.scss";

.my_oott_card {
    box-sizing: border-box;
    width: 279px;
    // height: 395px;
    margin: 6px;
    margin-bottom: 16px;
    
    @media (min-width: 768px) {
        gap: 16px;
        margin: 12px;
        margin-bottom: 20px;
    }
    .oott_card_pic {
        width: 100%;
    }

    .reviewing{
        background-color: #EECE75;
    }
    .pass{
        background-color: $default_yellow;
    }
    .edit_needed{
        background-color: #DB4918;
    }

    .oott_card_text {
        display: flex;
        flex-direction: column;
        gap: 16px;
        padding: 0 8px;
        position: relative;
        top: -2px;
        


        .oott_card_info {
            display: flex;
            justify-content: space-between;
            color: $tint_yellow;
            font-size: 14px;
            letter-spacing: 0.02em;
            line-height: 240%;

            @media (min-width: 768px) {
                font-size: 16px;
            }

            .oott_card_tag {
                font-weight: 400;
                width: 140px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .oott_card_date {
                font-size: 16px;
                font-weight: 350;
            }
        }        
    }
    .action{
            text-align: right;
            margin-top: 4px;
            .edit,span{
                color: var(--text-default, #6A5D4A);
                font-family: Noto Sans TC;
                font-size: 18px;
                font-style: normal;
                font-weight: 400;
                line-height: 150%; /* 24px */
                letter-spacing: 0.32px;
            }
            .edit {
                cursor: pointer;
            }

            svg{
                font-size: 14px;
            }
        }
}
</style>
