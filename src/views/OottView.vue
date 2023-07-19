<!-- 穿搭特輯 -->
<template>
    <div class="post_section">
        <div class="post_area">
            <div class="post_pic"><img :src="require('@/assets/img/oott_view_first.png')" alt="post"></div>
            <div class="post_block">
                <div class="post_man">
                    <img :src="require('@/assets/img/oott_view_second.png')" alt="post">
                </div>
                <h1>穿搭投稿徵集中</h1>
                <p>跟我們分享你的 #oott 吧！</p>
                <a href="#">投稿</a>
            </div>
        </div>
    </div>
    <OottCard />
</template>

<script>

import OottCard from '@/components/OottCard.vue';

export default {
  components: {
    OottCard,
},
  data(){
    return {
    }
  },
  methods: {
    
  },
  components:{
    OottCard
}
}
</script>
<style lang="scss">
@import "@/assets/scss/main.scss";

.post_section{
    max-width: 1200px;
    box-sizing: border-box;
    margin: auto;
    .post_area{
        padding: $sp7 0;
        justify-content: center;
        display: flex;
        .post_pic {
            margin: 0 $sp2;
            width: 30%;
            img{
                width: 100%;
            }
        }
        .post_block{
            box-sizing: border-box;
            margin: 0 $sp2;
            padding: $sp1;
            .post_man{
                width: 50%;
                img{
                    width: 100%;
                }
            }
            h1{
                font-size: $xl_h1; 
                padding: $sp1;
            }
            p{
                font-size: $xl_h4;
                color:$textColor_tint;
                padding: $sp1;
                margin-bottom: $sp3;
            }
            a{
                font-size: $sm_h5;
                padding: 8px 24px;
                @media (min-width: 1200px) {
                font-size: $xl_h5;
                padding: 8px 32px;
                }
                white-space: nowrap;
                color: $textColor_white;
                text-align: center;
                font-family: $fontFamily;
                letter-spacing: 0.6px;
                display: inline-flex;
                justify-content: center;
                align-items: center;
                gap: 10px;
                border-radius: 50px;
                border: 2px solid $textColor_default;
                background: $textColor_default;
                &:hover {
                    color: $textColor_default;
                    background: $textColor_white;
                    box-shadow: -2px 2px 4px 0px rgba(0, 0, 0, 0.25);
                }
                &:active {
                    color: $textColor_tint;
                    border: 2px solid $textColor_tint;
                    background: $textColor_white;
                }

            }
        }
    }
}
</style>