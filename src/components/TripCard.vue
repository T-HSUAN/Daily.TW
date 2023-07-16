<template>
    <div class="trip_default">
        <img
            :src="require('@/assets/img/trip_card_example.png')"
            alt="景點照片"
        />
        <div class="trip_card_text">
            <span class="trip_card_tags">{{ tripCardTags }}</span>
            <h3 class="trip_card_title">{{tripCardTitle}}</h3>
            <p class="trip_card_desc">{{tripCardDesc}}</p>
            <div class="trip_card_info">
                <span>{{tripCardAuthor}}</span>
                <span>{{tripCardDate}}</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:{
            tripCardTags:String,
            tripCardTitle:String,
            tripCardDesc:String,
            tripCardAuthor:String,
            tripCardDate:String,
        }
    }
</script>

<style lang="scss">
.trip_default{
    background-image: url('@/assets/img/layout/trip_card_default.svg');
    background-position: center;  
    width: 388px;
    height: 521px;
    img{
        margin: 24px;
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
            text-align: left;
            margin: 7px 0;
            color: var(--text-white, #FEFFF5);
            font-family: Shippori Mincho;
            font-size: 32px;
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
        }
        .trip_card_info{
            margin-top: 24px;
            display: flex;
            justify-content: space-between;
            color: var(--green-tint, #DAE5BE);
            font-size: 16px;
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