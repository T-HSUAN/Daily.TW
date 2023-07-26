<template>
    <div class="oott_default">
        <router-link to="/oott_info">
            <img :src="oottPhoto" alt="穿搭照片" class="oott_card_pic" />
        </router-link>
        <label>
            <input type="checkbox">
            <span></span>
        </label>
        <div class="oott_card_text">
            <div class="oott_card_info">
                <span class="oott_card_tag">{{ oottCardTags }}</span>
                <span class="oott_card_date">{{ oottCardDate }}</span>
            </div>
            <div class="oott_card_foot">
                <div class="oott_card_author">
                    <div class="oott_card_author_proPic">
                        <img :src="oottAuthorPhoto" alt="作者照片" />
                    </div>
                    <h4 class="oott_card_author_name">{{ oottCardAuthor }}</h4>
                </div>
                <img :src="require('@/assets/img/oott_card_deco_footprint.png')" alt="腳印裝飾"
                    class="oott_card_deco_footprint" />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        oottPhoto: String,
        oottCardTags: String,
        oottCardDate: String,
        oottAuthorPhoto: String,
        oottCardAuthor: String,
    },
};
</script>

<style lang="scss">
@import "@/assets/scss/baseAndMixin.scss";

.oott_default {
    width: 257px;
    height: 440px;
    background-color: $default_yellow;
    border-radius: 10px;
    padding: 24px 16px 16px 16px;
    position: relative;
    display: flex;
    flex-direction: column;
    gap: 8px;

    @media (min-width: 768px) {
        width: 311px;
        height: 522px;
        gap: 16px;
    }

    label {
        position: absolute;
        top: 32px;
        right: 64px;

        @media (min-width: $md) {
            top: 32px;
            right: 72px;
        }

        input[type="checkbox"] {
            display: none;
        }

        input[type="checkbox"]+span::before {
            content: '';
            display: inline-block;
            width: 40px;
            height: 40px;
            background-image: url(~@/assets/img/heart_default.svg);
            background-size: 100%;
            background-repeat: no-repeat;
            position: absolute;

            cursor: pointer;

            @media (min-width: $md) {
                width: 48px;
                height: 48px;
            }
        }

        input[type="checkbox"]:checked+span::before {
            content: '';
            display: inline-block;
            width: 40px;
            height: 40px;
            background-image: url(~@/assets/img/heart_clicked.svg);
            background-size: 100%;
            background-repeat: no-repeat;
            cursor: pointer;

            @media (min-width: $md) {
                width: 48px;
                height: 48px;
            }
        }
    }

    .oott_card_pic {
        width: 100%;
    }

    .oott_card_text {
        display: flex;
        flex-direction: column;
        gap: 16px;
        padding: 0 8px;

        .oott_card_info {
            display: flex;
            justify-content: space-between;
            color: $tint_yellow;
            font-size: 14px;
            letter-spacing: 0.02em;

            @media (min-width: 768px) {
                font-size: 16px;
            }

            .oott_card_tag {
                font-weight: 400;
            }

            .oott_card_date {
                font-weight: 350;
            }
        }

        .oott_card_foot {
            display: flex;
            justify-content: space-between;
            align-items: end;

            .oott_card_author {
                display: flex;
                align-items: center;
                gap: 16px;

                .oott_card_author_proPic {
                    width: 48px;
                    height: 48px;
                    border-radius: 100%;
                    overflow: hidden;

                    img {
                        width: 100%;
                    }
                }
            }

            .oott_card_deco_footprint {
                width: 32px;
            }
        }
    }
}
</style>
