<!-- 行程頁面-->
<template>

    <div class="tripInfo">
        <!-- 麵包屑 -->
        <div class="breadcrumb">
            <router-link to="/">
                <span>首頁</span>
            </router-link>
            <font-awesome-icon icon="fa-solid fa-chevron-right" />
            <router-link to="/trip">
                <span>出遊特輯</span>
            </router-link>
            <font-awesome-icon icon="fa-solid fa-chevron-right" />
            <router-link to="/trip_overview">
                <span>行程總覽</span>
            </router-link>
            <font-awesome-icon icon="fa-solid fa-chevron-right" />
            <router-link to="/trip_info">
                <span>新竹內灣放鬆小旅行</span>
            </router-link>
        </div>

        <!-- 行程內容 -->
        <section class="trip_content">
            <header>
                <div class="title">
                    <h2>新竹內灣放鬆小旅行</h2>
                    <img src="~@/assets/img/trip_deco_footPrint.svg" alt="" class="deco">
                </div>
                <div class="author">作者 | 日日旅著小編</div>
                <div class="date">發布日期 | 2023年7月2日</div>
                <div class="views">2,345 次瀏覽</div>
            </header>
            <section class="trip_desc">
                <p>新竹內灣旅行去，來內灣一日遊要怎麼玩呢？除了內灣老街外，週邊也有一些亮點，像是景觀餐廳、文青景點、咖啡廳、自然景觀，推薦大家可以一同順遊。除了玩內灣，如果有時間，尖石一帶也有一些不錯的景點，可以順著路線玩上去。</p>
            </section>
            <section class="spot1">
                <h3>合興車站</h3>
                <div class="time">
                    <font-awesome-icon icon="fa-solid fa-clock" flip="horizontal" />
                    <h5>停留30分鐘</h5>
                </div>
                <div class="spot_img"></div>
                <p class="spot_desc">位於內灣老街附近的合興火車站，這裡除了原有的候車亭外，並沒有太多好玩或好拍的東西。但現在很不一樣囉！經過薰衣草森林的重新規劃後，合興車站成了名符其實的愛情火車站，在這裡，可以看到許多愛情的元素，一字一語、一點一滴，都觸動著我們的心。</p>
                <div class="spot_loction">
                    <font-awesome-icon icon="fa-solid fa-location-dot" />
                    <h5>新竹縣橫山鄉中山街一段17號</h5>
                </div>
            </section>
            <section class="trip_tags">
                <div class="tag">#新竹</div>
                <div class="tag">#放鬆</div>
                <div class="tag">#懷舊</div>
                <div class="tag">#情侶</div>
            </section>
            
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
					<h2>出遊穿搭推薦</h2>
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
					<h2>相關票券優惠</h2>
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

            <!-- 你可能有興趣 -->
			<section class="index_oott">
				<div class="bgCurve">
					<img src="~@/assets/img/bgCurve_B.png" alt="">
				</div>
				<div class="title">
					<div class="duck">
						<div class="duckDeco">
							<img src="~@/assets/img/duck_trace.png" alt="" class="trace">
							<img src="~@/assets/img/duck_red.png" alt="" class="duck">
						</div>
					</div>
					<h2>你可能有興趣</h2>
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

    </div>


</template>

<style lang="scss">
@import "@/assets/scss/main.scss";

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


.breadcrumb{
    max-width: $xl;
    margin: $sp3 auto $sp4;
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