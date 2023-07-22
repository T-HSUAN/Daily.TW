<!-- 穿搭特輯 -->

<template>
<!-- 投稿部分 -->
    <div class="post_section">
        <div class="post_area">
            <a href="#" class="btn_md">投稿</a>
            <div class="post_pic"><img :src="require('@/assets/img/oott_view_first.png')" alt="post"></div>
            <div class="post_block">
                <div class="post_man">
                    <img :src="require('@/assets/img/oott_view_second.png')" alt="post">
                </div>
                <h1>穿搭投稿徵集中</h1>
                <p>跟我們分享你的 #oott 吧！</p>
                <a href="#" class="btn">投稿</a>
                
            </div>
        </div>
       
    </div>

<!-- 主題穿搭 -->
<div class="theme">
    <div class="bgCurve">
		<img src="~@/assets/img/bgCurve_A.png" alt="">
	    </div>
    <div class="title">
		<div class="duckDeco">
			<img src="~@/assets/img/duck_trace.png" alt="" class="trace">
			<img src="~@/assets/img/duck_yellow.png" alt="" class="duck">
		</div>
		<h2>主題穿搭</h2>
	</div>
</div>


<!-- 人氣穿搭 -->
<div class="top_oott">
    <div class="bgCurve">
		<img src="~@/assets/img/bgCurve_B.png" alt="">
	    </div>
    <div class="title">
		<div class="duckDeco">
			<img src="~@/assets/img/duck_trace.png" alt="" class="trace">
			<img src="~@/assets/img/duck_yellow.png" alt="" class="duck">
		</div>
		<h2>人氣穿搭</h2>
	</div>
</div>

<!-- 穿搭作家 -->
<div class="writer_oott">
    <div class="bgCurve">
		<img src="~@/assets/img/bgCurve_A.png" alt="">
	    </div>
    <div class="title">
		<div class="duckDeco">
			<img src="~@/assets/img/duck_trace.png" alt="" class="trace">
			<img src="~@/assets/img/duck_yellow.png" alt="" class="duck">
		</div>
		<h2>人氣穿搭</h2>
	</div>
</div>
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
// 全頁設定

#app{
    background-color: $bgColor_default;
}
.bgCurve{
	position: absolute;
	top: 0;
	width: 100%;
	height: 96px;

	img{
		width: 100%;
		height: 100%;
	}
}

.duckDeco{
			position: absolute;
            left: 100px;

			.trace{
				width: 192px;
				position: absolute;
				left: -160px;
				bottom: -8px;
			}
			.duck{
				width: 120px;
			}
		}
h2{
    position: absolute;
    font-size: $sm_h1;
    left: 200px;
    top: 230px;
}
// 投稿區塊

//投稿共用
.post_section{
        // max-width: 1200px;
        background-color: $bgColor_default;
        width: 100%;
        box-sizing: border-box;
        margin: auto;
        .post_area{ 
            margin: auto;
            display: flex;
            padding: $sp7 0;
            justify-content: center;
            .post_pic {
                
                img{
                    width: 100%;
                }
            }
            .post_block{
                box-sizing: border-box;
                margin: 0 $sp2;
                padding: $sp1;
            }
        }
}
//手機版
@media screen and (max-width: 767px) { 
    .post_area{
        flex-direction: column-reverse;
        margin: auto;
        text-align: center;
        align-items: center;
        a{
            width: 33px;
            height: 24px;
        }
        .btn_md{
            font-size: $sm_h5;
            padding: 8px 24px;
            @media (min-width: 768px) {
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
            cursor: pointer;
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
            .post_pic{
                width: 244px;
                margin: $sp5 0;
            }
            .post_block{
                display: flex;
                flex-direction: column;
                align-items: center;
                .post_man{
                    width: 120px;
                    height: 117px;
                    img{
                        width: 100%;
                    }
                }
                h1{
                    font-size: $xl_h2;
                    padding: $sp1;
                }
                p{
                    font-size: $sm_h4;
                    color: $textColor_tint;
                    padding: $sp1;
                }
                .btn{
                    display: none;
                }
            }
            
    }
    }
   
//電腦版
@media screen and (min-width: 767px) { 
    .post_area{
        .btn_md{
            display: none;
        }
        .post_pic{
            width: 30%;
            margin: 0 $sp2;
        }
        .post_block{
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
            .btn{
                margin: $sp4 0 $sp10 0;
                @media (min-width: $md){
                margin: $sp6 0 $sp15 0;
                }
            }
        }
    }
}

//主題穿搭
.theme{
    position: relative;
    padding: 184px 0;
    
}


//人氣穿搭
.top_oott{
    position: relative;
    padding: 184px 0;
    background-color: $bgColor_default;
}


//穿搭作家
.writer_oott{
    position: relative;
    padding: 184px 0;
}
</style>