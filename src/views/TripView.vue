<!-- 出遊特輯 -->
<template>

    <!-- banner -->
    <section class="banner">

    </section>

    <!-- 熱門行程 -->
    <section class="topTrip">
        <div class="bgCurve">
            <img src="@/assets/img/bgCurve_A.png" alt="">
        </div>
        <div class="title">
            <div class="duckDeco">
                <img src="~@/assets/img/duck_trace.png" alt="" class="trace">
                <img src="~@/assets/img/duck_green.png" alt="" class="duck">
            </div>
            <h2>熱門行程</h2>
        </div>
        <div class="content">
            <div class="wrap">
						<div class="tripCards">
							<tripCard
							class="tripCard"
							v-for="(trip, index) in trips"
							:key="index"
							:tripCardPhoto="trip.tripPhoto"
							:tripCardTags="trip.tripCardTags"
							:tripCardTitle="trip.tripCardTitle"
							:tripCardDesc="trip.tripCardDesc"
            				:tripCardAuthor="trip.tripCardAuthor"
            				:tripCardDate="trip.tripCardDate"
							/>
						</div>
					</div>
					<router-link to="/trip_overview">
                        <div class="btn">查看更多</div>
                    </router-link>
        </div>
    </section>

    <!-- 精選行程 -->
    <section class="selectTrip">
        <div class="bgCurve">
            <img src="~@/assets/img/bgCurve_B.png" alt="">
        </div>
        <div class="title">
            <div class="duckDeco">
                <img src="~@/assets/img/duck_trace.png" alt="" class="trace">
                <img src="~@/assets/img/duck_red.png" alt="" class="duck">
            </div>
            <h2>精選行程</h2>
        </div>
        <div class="content">
            <div class="wrap">
						<div class="tripCards">
							<tripCard
							class="tripCard"
							v-for="(trip, index) in trips"
							:key="index"
							:tripCardPhoto="trip.tripPhoto"
							:tripCardTags="trip.tripCardTags"
							:tripCardTitle="trip.tripCardTitle"
							:tripCardDesc="trip.tripCardDesc"
            				:tripCardAuthor="trip.tripCardAuthor"
            				:tripCardDate="trip.tripCardDate"
							/>
						</div>
					</div>
					<router-link to="/trip_overview">
                        <div class="btn">查看更多</div>
                    </router-link>
        </div>
    </section>
    
    <!-- 精選行程 -->
    <section class="authors">
        <div class="bgCurve">
            <img src="~@/assets/img/bgCurve_A.png" alt="">
        </div>
        <div class="title">
            <div class="duckDeco">
                <img src="~@/assets/img/duck_trace.png" alt="" class="trace">
                <img src="~@/assets/img/duck_red.png" alt="" class="duck">
            </div>
            <h2>駐站旅人</h2>
        </div>
        <div class="content">
        </div>
    </section>
</template>

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

	a{
		color: inherit;
	}

// banner
.banner{
	background-color: $bgColor_default;

}

// 熱門行程
.topTrip{
	position: relative;
	padding: 184px 0;

    .content{
        margin: 0 auto;
        max-width: 1200px;
        text-align: center;

        .wrap{
            margin-bottom: 32px;
            .tripCards{
                display: flex;
                overflow-x: scroll;

                .tripCard{
                    flex-shrink: 0;
                    margin-left: 32px;
                    @media (min-width: 768px) {
                    margin-left: 24px;
                    }
                }

            }
        }
    }
}

// 精選行程
.selectTrip{
	position: relative;
	padding: 184px 0;
	background-color: $bgColor_default;

    .content{
        margin: 0 auto;
        max-width: 1200px;
        text-align: center;

        .wrap{
            margin-bottom: 32px;
            .tripCards{
                display: flex;
                overflow-x: scroll;

                .tripCard{
                    flex-shrink: 0;
                    margin-left: 32px;
                    @media (min-width: 768px) {
                    margin-left: 24px;
                    }
                }

            }
        }
    }

}

// 駐站旅人
.authors{
	position: relative;
	padding: 184px 0;

}

</style>

<script>
import tripCard from '@/components/TripCard.vue'

export default {
    data(){
        return {
            trips:[
				{
					tripCardPhoto: String,
					tripCardTags: String,
					tripCardTitle: String,
					tripCardDesc: String,
					tripCardAuthor: String,
					tripCardDate: String,
				}
			]
        }
    },
    methods: {

    },
    components:{
        tripCard
    }
}
</script>