<template>
    <div class="trip_card_default">
        <label>
            <input type="checkbox">
            <span></span>
        </label>
        <a href="#">
            <div class="trip_card_img">
                <img
                    :src= "tripCardPhoto"
                    alt="景點照片"
                />
            </div>
            <div class="trip_card_text">
                <span class="trip_card_tags">{{ tripCardTags }}</span>
                <h3 class="trip_card_title">{{tripCardTitle}}</h3>
                <p class="trip_card_desc">{{tripCardDesc}}</p>
                <div class="trip_card_info">
                    <span>{{tripCardAuthor}}</span>
                    <span>{{tripCardDate}}</span>
                </div>
            </div>
        </a>
    </div>
</template>

<script>
    export default {
        props:{
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
.trip_card_default{
    background-color:var(--green-default, #93AE51);
    border-radius: 5px 20px 20px 5px;
    width: 276px;
    height: 332px;
    @media (min-width: 768px) {
        width: 378px;
        height: 521px;
    }
    position: relative;
    label{
        input[type="checkbox"]{
            display: none;
        }
        input[type="checkbox"] + span::before{
            content: '';
            display: inline-block;
            width: 29px;
            height: 47px;
            background-image: url(~@/assets/img/bookmark_default.svg);
            background-size: 100%;
            background-repeat: no-repeat;
            position: absolute;
            top: -2px;
            right: 32px;
            cursor: pointer;
            @media (min-width: $md){
                width: 32px;
                height: 48px;
                right: 32px;
            }
        }
        input[type="checkbox"]:checked + span::before{
            content: '';
            display: inline-block;
            width: 29px;
            height: 47px;
            background-image: url(~@/assets/img/bookmark_clicked.svg);
            background-size: 100%;
            background-repeat: no-repeat;
            cursor: pointer;
            @media (min-width: $md){
                width: 32px;
                height: 48px;
            }
        }
    }
    .trip_card_img{
        padding: 24px;
        @media (min-width: 768px) {
            padding: 24px;
        }
        img{
            width: 100%;
        }
    }

    .trip_card_text{
        margin: 24px;
        margin-top: 0;
        .trip_card_tags{
            color: var(--green-tint, #DAE5BE);
            font-family: Noto Sans CJK TC;
            font-size: 16px;
            letter-spacing: 0.32px;

        }
        .trip_card_title{
            @media (min-width: 1200px) {
                height: 70px;
            }
            line-height: 120%;
            text-align: left;
            margin: 7px 0;
            color: var(--text-white, #FEFFF5);
            font-family: Shippori Mincho;
            font-weight: 700;
            letter-spacing: 0.64px;
        }
        .trip_card_desc{
            height: 89px;
            align-self: stretch;
            overflow: hidden;
            color: var(--text-white, #FEFFF5);
            text-overflow: ellipsis;
            line-height: 165%; 
            letter-spacing: 0.54px;
            position: relative;
            &::after{
                content: '...';
                position: absolute;
                bottom: 0;
                background-color: var(--green-default, #93AE51);
                width: 15px;
                right: 3px;
                @media (min-width:1200px) {
                    width: 18px;
                    right: 15px;
                }
            }
        }
        .trip_card_info{
            display: flex;
            justify-content: space-between;
            color: var(--green-tint, #DAE5BE);
            margin-top: 24px;
            font-size: 12px;
            @media (min-width:768px) {
                font-size: 16px;
                margin-top: 36px;
            }
            @media (min-width:1200px) {
                margin-top: 12px;
            }

            font-weight: 500;
            line-height: 150%; 
            letter-spacing: 0.32px;

            span{
                display: inline-block;
            }
            span:first-child{
                margin-right: auto;
            }

        }
    }
}
</style>

