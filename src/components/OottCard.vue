<template>
    <div class="oott_default">
        <img 
            :src="oottPhoto"
            alt="穿搭照片"
            class="oott_card_pic"
        >
        <label class="heart">
            <input type="checkbox" />
            <font-awesome-icon icon="fa-solid fa-heart" />
            <font-awesome-icon icon="fa-solid fa-heart" class="front_heart"/>
        </label>
        <div class="oott_card_text">
            <div class="oott_card_info">
                <span class="oott_card_tag">{{ oottCardTags }}</span>
                <span class="oott_card_date">{{ oottCardDate }}</span>
            </div>
            <div class="oott_card_foot">
                <div class="oott_card_author">
                    <div class="oott_card_author_proPic">
                        <img
                            :src="oottAuthorPhoto"
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
        props:{
            oottPhoto: String,
            oottCardTags: String,
            oottCardDate: String,
            oottAuthorPhoto: String,
            oottCardAuthor: String,
        }
    }
</script>

<style lang="scss">
    @import "@/assets/scss/baseAndMixin.scss";
    .oott_default{
        width: 257px;
        height: 440px;
        background-color: $default_yellow;
        border-radius: 10px;
        padding: 24px 16px 16px 16px;
        position: relative;
        display: flex;
        flex-direction: column;
        gap: 16px;
        @media (min-width: 768px) {
        width: 311px;
        height: 522px;
        }
        
        .oott_card_pic{
            width: 100%;
        }

        .heart{
            display: block;
            position: absolute;
            right: 32px;
            top: 32px;
            @media (min-width: 768px) {
                right: 30px;
            }
            color: #6A5D4A;
            font-size: 50px;
            .front_heart{
                position: absolute;
                top: 7px;
                right: 3px;
                font-size: 42px;
                color: #FEFFF5;
                z-index: 5;
            };
            input{
                display: none;
                &:checked ~ .front_bookmark{
                    color:  var(--semantic-warning, $default_red)
                }
            }
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
                font-size: 14px;
                letter-spacing: 0.02em;
                @media (min-width: 768px) {
                    font-size: 16px;
                }

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