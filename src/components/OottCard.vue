<template>
    <div class="oott_default">
        <img 
            :src="require('@/assets/img/oott_card_example.png')"
            alt="穿搭照片"
            class="oott_card_pic"
        >
        <div class="oott_card_text">
            <div class="oott_card_info">
                <span class="oott_card_tag">{{ oottCardTags }}</span>
                <span class="oott_card_date">{{ oottCardDate }}</span>
            </div>
            <div class="oott_card_foot">
                <div class="oott_card_author">
                    <div class="oott_card_author_proPic">
                        <img
                            :src="require('@/assets/img/oott_card_proPic_example.png')"
                            alt="作者照片"
                        >
                    </div>
                    <h4 class="oott_card_author_name">{{ oottCardAuthor }}</h4>
                </div>
                <img
                    :src="require('@/assets/img/oott_card_deco_footprint.png')"
                    alt="腳印裝飾" class="oott_card_deco_footprint"
                >
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        // props:{
        //     oottCardTags: String,
        //     oottCardDate: String,
        //     oottCardAuthor: String,
        // }
        data(){
            return {
                oottCardTags: "#日系 #休閒 #風景",
                oottCardDate: "2022 / 12 / 12",
                oottCardAuthor: "Alison",
            }
        }
    }
</script>

<style lang="scss">
    @import "@/assets/scss/main.scss";
    .oott_default{
        width: 311px;
        background-color: $default_yellow;
        border-radius: 10px;
        padding: 24px 16px 24px 16px;
        display: flex;
        flex-direction: column;
        gap: 16px;
        
        .oott_card_pic{
            width: 100%;
        }

        .oott_card_text{
            display: flex;
            flex-direction: column;
            gap: 16px;
            padding: 0 8px;

            .oott_card_info{
                display: flex;
                justify-content: space-between;
                color: $tint_yellow;
                font-size: 16px;
                letter-spacing: 0.02em;

                .oott_card_tag{
                    font-weight: 400;
                }

                .oott_card_date{
                    font-weight: 350;
                }
            }

            .oott_card_foot{
                display: flex;
                justify-content: space-between;
                align-items: end;


                .oott_card_author{
                    display: flex;
                    align-items: center;
                    gap: 16px;

                    .oott_card_author_proPic{
                        width: 48px;
                        height: 48px;
                        border-radius: 100%;
                        overflow: hidden;
    
                        img{
                            width: 100%;
                        }
                    }
                }
                .oott_card_deco_footprint{
                    width: 32px;
                }
            }
        }

    }
</style>