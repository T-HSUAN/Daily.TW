<!-- home的內容區塊 -->
<template>
	<main>
		<!-- 專屬旅著區塊 -->
		<div class="planSec">
			<div class="container">
				<h1>一日行程 + 穿搭建議<br>規劃你的說走就走 !</h1>
				<p>煩惱景點安排？煩惱衣著搭配？讓日日旅著分擔你的煩惱！<br>在這裡你能找到全台各地行程、獲得穿搭靈感，也能分享出遊穿搭、展現個人風格<br>如果想要更省時便利呢？馬上進行專屬旅著測驗，就能打造最適合你的一日旅著！</p>
				<div class="btn">立即體驗<font-awesome-icon icon="fa-solid fa-arrow-right" /></div>
				<div class="coverPic">
					<img src="~@/assets/img/index_plan_cover_example.png" alt="">
				</div>
			</div>
		</div>

		<!-- 行程區塊 -->
		<div class="tripSec">
			<div class="bgCurve">
				<img src="~@/assets/img/bgCurve_A.png" alt="">
			</div>
			<div class="title">
				<div class="duckDeco">
					<img src="~@/assets/img/duck_trace.png" alt="" class="trace">
					<img src="~@/assets/img/duck_green.png" alt="" class="duck">
				</div>
				<h2>精選出遊特輯</h2>
			</div>
			<div class="content">
				<div class="wrap">
					<div class="head">
						<div class="tripTitle">台中文青一日遊</div>
						<div class="tripCover">
							<img src="~@/assets/img/index_trip_cover_example.png" alt="">
						</div>
					</div>
					<div class="info">
						<div class="tripSpots">
							<div class="spot spot1">
								<img src="~@/assets/img/trip_flag_white.svg" alt="">
								<h5>屯區藝文中心</h5>
							</div>
							<div class="spot spot2">
								<img src="~@/assets/img/trip_flag_white.svg" alt="">
								<h5>太平買菸場</h5>
							</div>
							<div class="spot spot3">
								<img src="~@/assets/img/trip_flag_white.svg" alt="">
								<h5>新盛綠川水岸廊道</h5>
							</div>
							<div class="spot spot4">
								<img src="~@/assets/img/trip_flag_white.svg" alt="">
								<h5>第二市場</h5>
							</div>
						</div>
						<div class="btn">馬上出發<font-awesome-icon icon="fa-solid fa-arrow-right" /></div>
					</div>
				</div>
			</div>
		</div>

		<!-- 穿搭區塊 -->
		<div class="oottSec">
			<div class="bgCurve">
				<img src="~@/assets/img/bgCurve_B.png" alt="">
			</div>
			<div class="title">
				<div class="duck">
					<div class="duckDeco">
						<img src="~@/assets/img/duck_trace.png" alt="" class="trace">
						<img src="~@/assets/img/duck_yellow.png" alt="" class="duck">
					</div>
				</div>
				<h2>人氣穿搭特輯</h2>
			</div>
			<div class="content">
				<div class="wrap">
					<div class="oottCard">

					</div>
				</div>
				<div class="panel">
					<div class="arrow"><font-awesome-icon icon="fa-solid fa-arrow-left" /></div>
					<div class="arrow"><font-awesome-icon icon="fa-solid fa-arrow-right" /></div>
				</div>
				<div class="btn">查看更多</div>
			</div>
		</div>

		<!-- 票券區塊 -->
		<div class="ticketSec">
			<div class="bgCurve">
				<img src="~@/assets/img/bgCurve_A.png" alt="">
			</div>
			<div class="title">
				<div class="duck">
					<div class="duckDeco">
						<img src="~@/assets/img/duck_trace.png" alt="" class="trace">
						<img src="~@/assets/img/duck_blue.png" alt="" class="duck">
					</div>
				</div>
				<h2>人氣穿搭特輯</h2>
			</div>
			<div class="content">
				<div class="wrap">
					
				</div>
				<div class="btn">查看更多</div>
			</div>
		</div>
	</main>
</template>

<script>
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue'

export default {
	components: {
		HelloWorld
	},
	data(){
		return {
			title: '歡迎光臨日日旅著'
		}
	}
}
</script>

<style lang="scss">
@import "@/assets/scss/main.scss";

// 全頁設定
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
			position: relative;

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

// 專屬旅著區塊
.planSec{
	padding-top: 120px;
	padding-bottom: 184px;
	background-color: $bgColor_default;
	overflow: hidden;
	
	.container{
		position: relative;
		margin: 0 auto;
		max-width: 1200px;

		h1{
			color: $default_yellow;
			line-height: 140%;
		}
	
		p{
			margin-top: 24px;
			margin-bottom: 48px;
			line-height: 165%;
		}
	
		.coverPic{
			position: absolute;
			right: -20%;
			top: -100px;
			width: 640px;
	
			img{
				width: 100%;
			}
		}
	}

}

// 行程區塊
.tripSec{
	position: relative;
	padding: 184px 0;

	.title{
		margin: 0 auto;
		max-width: 1200px;
		display: flex;
		align-items: center;
		
	}

	.content{
		.wrap{
			margin: 0 auto;
			width: 80%;
			display: flex;
			align-items: center;
			.head{
				position: relative;
				.tripTitle{
					position: absolute;
					padding: 8px 32px;
					display: inline-block;
					font-family: Shippori Mincho;
					font-size: 32px;
					font-weight: 800;
					letter-spacing: 0.06em;
				}
				.tripCover{
					width: 60%;
					img{
						width: 100%;
					}
				}
			}
			.info{
				.tripSpots{
					.spot{
						display: flex;
					}
					h5{
						font-weight: 400;
					}
				}
			}
		}
	}
}

// 穿搭區塊
.oottSec{
	position: relative;
	padding: 184px 0;
	background-color: $bgColor_default;

	.title{
		margin: 0 auto;
		max-width: 1200px;
		display: flex;
		align-items: center;

		
	}

	.content{
		margin: 0 auto;
		max-width: 1200px;
		text-align: center;

		.wrap{

		}
		.panel{
			display: flex;
			justify-content: center;
			gap: 64px;
		}
	}

}

// 票券區塊
.ticketSec{
	position: relative;
	padding: 184px 0;

	.title{
		margin: 0 auto;
		max-width: 1200px;
		display: flex;
		align-items: center;

		
	}

	.content{
		margin: 0 auto;
		max-width: 1200px;
		text-align: center;
	}

}

</style>