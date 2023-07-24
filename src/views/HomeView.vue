<!-- home的內容區塊 -->
<template>
	<div class="index">
		<main>
			<!-- 專屬旅著區塊 -->
			<section class="index_plan">
				<div class="container">
					<h1>一日行程 + 穿搭建議<br>規劃你的說走就走 !</h1>
					<p>煩惱景點安排？煩惱衣著搭配？讓日日旅著分擔你的煩惱！<br>在這裡你能找到全台各地行程、獲得穿搭靈感，也能分享出遊穿搭、展現個人風格<br>如果想要更省時便利呢？馬上進行專屬旅著測驗，就能打造最適合你的一日旅著！</p>
					<a href="/plan">
						<btn class="btn">立即體驗<img src="~@/assets/img/btn_arrow.png" alt="" class="arrow_white">
        				<img src="~@/assets/img/btn_arrow_hover.png" alt="" class="arrow_brown"></btn>
                    </a>
					<div class="coverPic">
						<img src="~@/assets/img/index_plan_cover_example.png" alt="">
					</div>
				</div>
			</section>
			<!-- 行程區塊 -->
			<section class="index_trip">
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
								<div class="deco">
									<img src="~@/assets/img/trip_deco_footPrint.svg" alt="">
								</div>
							</div>
							<a href="/trip_info">
								<btn class="btn">馬上出發<img src="~@/assets/img/btn_arrow.png" alt="" class="arrow_white">
								<img src="~@/assets/img/btn_arrow_hover.png" alt="" class="arrow_brown"></btn>
							</a>
						</div>
					</div>
				</div>
			</section>
			<!-- 穿搭區塊 -->
			<section class="index_oott">
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
						<div class="oottCards">
							<oottCard
							class="oottCard"
							v-for="(oott, index) in ootts"
							:key="index"
							:oottPhoto="oott.oottPhoto"
							:oottCardTags="oott.oottCardTags"
            				:oottCardDate="oott.oottCardDate"
            				:oottCardAuthor="oott.oottCardAuthor"
							></oottCard>
						</div>
					</div>
					<div class="panel">
						<button class="arrow"><font-awesome-icon icon="fa-solid fa-arrow-left" /></button>
						<button class="arrow"><font-awesome-icon icon="fa-solid fa-arrow-right" /></button>
					</div>
					<a href="/oott">
						<btn class="btn">查看更多</btn>
					</a>
				</div>
			</section>
			<!-- 票券區塊 -->
			<section class="index_ticket">
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
					<h2>景點票券優惠</h2>
				</div>
				<div class="content">
					<div class="wrap">
						<div class="ticketCards">
							<ticketCard
							class="ticketCard"
							v-for="(ticket, index) in tickets"
							:key="index"
							:ticketPhoto="ticket.ticketPhoto"
							:ticketTitle="ticket.ticketTitle"
							:ticketLocation="ticket.ticketLocation"
							:ticketTags="ticket.ticketTags"
            				:ticketPrice="ticket.ticketAuthor"
            				:FinalPrice="ticket.finalPrice"
							></ticketCard>
						</div>
					</div>
					<a href="/ticket">
						<btn class="btn">查看更多</btn>
					</a>
				</div>
			</section>
		</main>
	</div>
</template>

<script>
// @ is an alias to /src
import oottCard from '@/components/OottCard.vue'
import ticketCard from '@/components/TicketVertical.vue'

export default {
	components: {
		oottCard,
		ticketCard
	},
	data(){
		return {
			ootts:[
				{
					oottPhoto: require('@/assets/img/oott_card_example.png'),
					oottCardTags: "#日系 #休閒 #風景",
					oottCardDate: "2022 / 12 / 12",
					oottAuthorPhoto: require('@/assets/img/oott_card_proPic_example.png'),
					oottCardAuthor: "Alison",
				},
				{
					oottPhoto: require('@/assets/img/oott_card_example.png'),
					oottCardTags: "#復古 #海邊",
					oottCardDate: "2022 / 7 / 3",
					oottAuthorPhoto: require('@/assets/img/oott_card_proPic_example.png'),
					oottCardAuthor: "Susan",
				},
				{
					oottPhoto: require('@/assets/img/oott_card_example.png'),
					oottCardTags: "#街頭 #潮流",
					oottCardDate: "2022 / 7 / 6",
					oottAuthorPhoto: require('@/assets/img/oott_card_proPic_example.png'),
					oottCardAuthor: "Max",
				},
				{
					oottPhoto: require('@/assets/img/oott_card_example.png'),
					oottCardTags: "#兒童 #休閒 #自然",
					oottCardDate: "2022 / 12 / 12",
					oottAuthorPhoto: require('@/assets/img/oott_card_proPic_example.png'),
					oottCardAuthor: "Alison",
				},
				{
					oottPhoto: require('@/assets/img/oott_card_example.png'),
					oottCardTags: "#兒童 #休閒 #自然",
					oottCardDate: "2022 / 12 / 12",
					oottAuthorPhoto: require('@/assets/img/oott_card_proPic_example.png'),
					oottCardAuthor: "Alison",
				}
			],
			tickets:[
				{
					ticketPhoto: require('@/assets/img/ticketExample.png'),
					ticketTitle: "斑比斑比斑比斑比山丘門票",
					ticketLocation: "宜蘭",
					ticketTags: "#標籤",
					originalPrice: 800,
					finalPrice: 599,
				},
				{
					ticketPhoto: require('@/assets/img/ticketExample.png'),
					ticketTitle: "斑比斑比斑比斑比山丘門票",
					ticketLocation: "宜蘭",
					ticketTags: "#標籤",
					originalPrice: 800,
					finalPrice: 599,
				},
				{
					ticketPhoto: require('@/assets/img/ticketExample.png'),
					ticketTitle: "斑比斑比斑比斑比山丘門票",
					ticketLocation: "宜蘭",
					ticketTags: "#標籤",
					originalPrice: 800,
					finalPrice: 599,
				},
				{
					ticketPhoto: require('@/assets/img/ticketExample.png'),
					ticketTitle: "斑比斑比斑比斑比山丘門票",
					ticketLocation: "宜蘭",
					ticketTags: "#標籤",
					originalPrice: 800,
					finalPrice: 599,
				},
			]
			
		}
	}
}
</script>

<style lang="scss">
@import "@/assets/scss/main.scss";

#app{
	background-color: $bgColor_default;
}
.index{
	
	// 全頁設定
	
	.bgCurve{
		position: absolute;
		top: 0;
		width: 100%;
		height: 48px;

		@media (min-width: 768px) {
		height: 96px;
        }
		
		img{
			width: 100%;
			height: 100%;
		}
	}
	
	.title{
		margin: 0 auto 24px;
		display: flex;
		flex-direction: column;
		align-items: center;
		gap: 8px;

		@media (min-width: 768px) {
		margin: 0 auto 32px;
		max-width: 1200px;
		flex-direction: row;
		align-items: center;
		}
		
		.duckDeco{
			position: relative;
			
			.trace{
				display: none;
				
				@media (min-width: 768px) {
				display: block;
				width: 192px;
				position: absolute;
				left: -160px;
				bottom: -8px;
				}
			}
			
			.duck{
				width: 80px;
	
				@media (min-width: 768px) {
				width: 120px;
				}
			}
		}
	}

	.btn{
        position: relative;
        img{
            width: 40px;
            @media (min-width: $md){
                width: 45px;
            }
        }
        .arrow_white{
            position: absolute;
            right: 24px;
            @media (min-width: $md){
                right: 32px;
            }
        }
        &:hover{
            .arrow_white{
                display: none;
            }
        }
    }
	
	// 專屬旅著區塊
	.index_plan{
		padding: 8px 32px 32px;
		background-color: $bgColor_default;
		overflow: hidden;

		@media (min-width: 768px) {
		padding: 120px 32px 184px;
		}
		
		.container{
			position: relative;
			margin: 0 auto;
			text-align: center;
			
			@media (min-width: 768px) {
			max-width: 1200px;
			text-align: left;
			}
	
			h1{
				position: relative;
				width: 70%;
				color: $default_yellow;
				line-height: 150%;
				text-align: left;
				z-index: 10;

				@media (min-width: 768px) {
				line-height: 140%;
				}
			}
		
			p{
				position: relative;
				margin: 176px 0 32px;
				line-height: 180%;
				z-index: 10;
				
				@media (min-width: 768px) {
				margin: 24px 0 48px;
				line-height: 165%;
				}
			}
		
			.coverPic{
				position: absolute;
				top: 112px;
				right: -30%;
				z-index: 1;
				width: 80%;
				
				@media (min-width: 768px) {
				right: -20%;
				top: -100px;
				width: 640px;
				
				}
		
				img{
					width: 100%;
				}
			}
		}
	
	}
	
	// 行程區塊
	.index_trip{
		position: relative;
		padding: 160px 0 80px;
	
		.content{
			.wrap{
				margin: 0 auto 32px;
				display: flex;
				flex-direction: column;
				align-items: center;

				@media (min-width: 768px) {
				margin-top: 64px;
				width: 80%;
				flex-direction: row;
				}

				.head{
					position: relative;
					text-align: center;
					display: flex;
					flex-direction: column;
					align-items: center;

					@media (min-width: 768px) {
					display: block;
					}

					.tripTitle{
						order: 1;
						position: relative;
						top: -24px;
						padding: 8px 32px;
						font-family: Shippori Mincho;
						font-size: 20px;
						font-weight: 800;
						letter-spacing: 0.03em;

						@media (min-width: 768px) {
						position: absolute;
						padding: 8px 32px;
						font-size: 32px;
						letter-spacing: 0.06em;
						}
					}
					.tripCover{
						width: 80%;

						@media (min-width: 768px) {
						width: 60%;
							
						}
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
						.deco{
							width: 24px;
							@media (min-width: 768px) {
							width: 32px;
							}
						}
					}
				}
			}
		}
	}
	
	// 穿搭區塊
	.index_oott{
		position: relative;
		padding: 160px 0 80px;
		background-color: $bgColor_default;
	
		.content{
			padding-left: 32px;
			margin: 0 auto;
			max-width: 1200px;
			text-align: center;
	
			.wrap{
				margin-bottom: 16px;
				overflow-x: scroll;
				@media (min-width: 768px) {
						overflow: visible;
						}
				.oottCards{
					display: flex;
					gap: 32px;
					.oottCard{
						flex-shrink: 0;

					}
				}
			}
			.panel{
				display: flex;
				justify-content: center;
				gap: 64px;
				margin-bottom: 32px;
			}
		}
	
	}
	
	// 票券區塊
	.index_ticket{
		position: relative;
		padding: 160px 0;
	
		.content{
			margin: 0 auto;
			max-width: 1200px;
			text-align: center;

			.wrap{
				margin-bottom: 32px;
				.ticketCards{
					display: flex;
					overflow-x: scroll;
					@media (min-width: 1260px) {
					justify-content: space-between;
					overflow: visible;
					}

					.ticketCard{
						flex-shrink: 0;
						margin-left: 32px;
						@media (min-width: 1260px) {
						margin-left: 0;
						}
					}

				}
			}
		}
	
	}

}


</style>