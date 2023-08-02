<template>
    <div class="trip_card_default">
        <!-- 書籤 -->
        <label class="bookmark">
            <input type="checkbox">
            <span></span>
        </label>

        <!-- <label class="bookmark">
            <input type="checkbox" />
            <font-awesome-icon icon="fa-solid fa-bookmark" />
            <font-awesome-icon icon="fa-solid fa-bookmark" class="front_bookmark"/>
        </label> -->
        <div class="trip_card_img">
            <router-link to="/trip_info">
                <img :src="tripCardPhoto" alt="景點照片" />
            </router-link>
        </div>
        <div class="trip_card_text">
            <router-link to="/trip_info">
                <span class="trip_card_tags">{{ tripCardTags }}</span>
                <h3 class="trip_card_title">{{ tripCardTitle }}</h3>
                <p class="trip_card_desc">{{ tripCardDesc }}</p>
                <div class="trip_card_info">
                    <span>{{ tripCardAuthor }}</span>
                    <span>{{ tripCardDate }}</span>
                </div>
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        // 這裡是 TripCard 組件的屬性（props），用於接收外部傳遞的資料
        tripCardPhoto: String, // 圖片的路徑
        tripCardTags: String, // 標籤文字
        tripCardTitle: String, // 標題文字
        tripCardDesc: String, // 描述文字
        tripCardAuthor: String, // 作者名稱
        tripCardDate: String, // 日期
    }
}
</script>

<style lang="scss">
@import "@/assets/scss/main.scss";

.trip_card_default {
    background-color: $default-green;
    border-radius: 5px 20px 20px 5px;
    padding: $sp2;
    width: 276px;
    display: flex;
    flex-direction: column;
    box-sizing: border-box;
    position: relative;

    @media (min-width: 768px) {
        padding: $sp3;
        width: 378px;
    }

    &:hover {
        background-color: $mid-green;
        transform: rotate(0.5deg) scale(1.01);
    }

    .bookmark {
        position: absolute;
        top: -2px;
        right: 64px;
        z-index: 5;

        input[type="checkbox"] {
            display: none;
        }

        input[type="checkbox"]+span::before {
            content: '';
            display: inline-block;
            width: 29px;
            height: 47px;
            background-image: url(~@/assets/img/bookmark_default.svg);
            background-size: 100%;
            background-repeat: no-repeat;
            position: absolute;

            cursor: pointer;

            @media (min-width: $md) {
                width: 32px;
                height: 48px;
            }
        }

        input[type="checkbox"]:checked+span::before {
            content: '';
            display: inline-block;
            width: 29px;
            height: 47px;
            background-image: url(~@/assets/img/bookmark_clicked.svg);
            background-size: 100%;
            background-repeat: no-repeat;
            cursor: pointer;

            @media (min-width: $md) {
                width: 32px;
                height: 48px;
            }
        }
    }

    .trip_card_img {
        width: 100%;
        overflow: hidden;

        img {
            width: 100%;
            transition: 0.5s;

            &:hover {
                transform: scale(1.1);
            }
        }
    }

    .trip_card_text {
        margin-top: $sp2;
        text-align: left;

        @media (min-width:768px) {
            margin-top: $sp3;
        }

        .trip_card_tags {
            color: var(--green-tint, #DAE5BE);
            font-family: Noto Sans CJK TC;
            font-size: 16px;
            letter-spacing: 0.32px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
        }

        .trip_card_title {
            text-align: left;
            margin: 7px 0;
            color: var(--text-white, #FEFFF5);
            font-family: Shippori Mincho;
            font-weight: 700;
            letter-spacing: 0.64px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
        }

        .trip_card_desc {
            max-height: 72px;
            align-self: stretch;
            overflow: hidden;
            color: $textColor_white;
            line-height: 180%;
            position: relative;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;

            @media (min-width:768px) {
                max-height: 89px;
                line-height: 165%;
                overflow: hidden;
            }

            // &::after{
            //     content: '...';
            //     position: absolute;
            //     bottom: 0;
            //     background-color: var(--green-default, #93AE51);
            //     width: 15px;
            //     right: 3px;
            //     @media (min-width:1200px) {
            //         width: 18px;
            //         right: 15px;
            //     }
            // }
        }

        .trip_card_info {
            margin-top: 24px;
            display: flex;
            justify-content: space-between;
            color: var(--green-tint, #DAE5BE);
            font-size: 12px;

            @media (min-width:768px) {
                font-size: 16px;
            }

            font-weight: 500;
            line-height: 150%;
            letter-spacing: 0.32px;

            span {
                display: inline-block;
            }

            span:first-child {
                margin-right: auto;
            }

        }
    }
}
</style>
