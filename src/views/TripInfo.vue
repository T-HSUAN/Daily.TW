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
            <article class="trip_article">
                <div class="header">
                    <div class="trip_title">
                        <h2>新竹內灣放鬆小旅行</h2>
                        <img src="~@/assets/img/trip_deco_footPrint.svg" alt="" class="deco">
                    </div>
                    <h5 class="author">作者 | 日日旅著小編</h5>
                    <h5 class="date">發布日期 | 2023年7月2日</h5>
                    <h5 class="views">2,345 次瀏覽</h5>
                </div>
                <div class="trip_desc">
                    <p>新竹內灣旅行去，來內灣一日遊要怎麼玩呢？除了內灣老街外，週邊也有一些亮點，像是景觀餐廳、文青景點、咖啡廳、自然景觀，推薦大家可以一同順遊。除了玩內灣，如果有時間，尖石一帶也有一些不錯的景點，可以順著路線玩上去。</p>
                </div>
                <section class="spot">
                    <div class="spot_title">
                        <h3>合興車站</h3>
                        <div class="time">
                            <font-awesome-icon icon="fa-solid fa-clock" flip="horizontal" />
                            <h5>停留30分鐘</h5>
                        </div>
                    </div>
                    <div class="spot_img">
                        <img src="~@/assets/img/place_001.png" alt="景點照片">
                    </div>
                    <p class="spot_desc">位於內灣老街附近的合興火車站，這裡除了原有的候車亭外，並沒有太多好玩或好拍的東西。但現在很不一樣囉！經過薰衣草森林的重新規劃後，合興車站成了名符其實的愛情火車站，在這裡，可以看到許多愛情的元素，一字一語、一點一滴，都觸動著我們的心。</p>
                    <div class="spot_loc">
                        <font-awesome-icon icon="fa-solid fa-location-dot" />
                        <h5>新竹縣橫山鄉中山街一段17號</h5>
                    </div>
                </section>
                <section class="trip_tags">
                    <div class="tags">#新竹</div>
                    <div class="tags">#放鬆</div>
                    <div class="tags">#懷舊</div>
                    <div class="tags">#情侶</div>
                </section>
            </article>
            <div class="sidebar">
                <nav class="route">
                    <ol>
                        <li>合興車站</li>
                        <li>內灣愛情故事館</li>
                        <li>內灣老街</li>
                        <li>劉興欽漫畫館</li>
                        <li>內灣隱藏版咖啡</li>
                    </ol>
                </nav>
                <div class="collect">
                    <font-awesome-icon icon="fa-solid fa-bookmark" />
                    <label for="">加入收藏清單</label>
                </div>
            </div>
        </section>

        <!-- 穿搭區塊 -->
			<section class="tripInfo_oott">
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
                            :oottAuthorPhoto="oott.oottAuthorPhoto"
            				:oottCardAuthor="oott.oottCardAuthor"
							></oottCard>
						</div>
					</div>
					<a href="/oott">
						<btn class="btn">查看更多</btn>
					</a>
				</div>
			</section>

			<!-- 票券區塊 -->
			<section class="tripInfo_ticket">
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
            				:originalPrice="ticket.originalPrice"
            				:FinalPrice="ticket.finalPrice"
            				:discountTag="ticket.discountTag"
							></ticketCard>
						</div>
					</div>
					<a href="/ticket">
						<btn class="btn">查看更多</btn>
					</a>
				</div>
			</section>

            <!-- 你可能有興趣 -->
			<section class="tripInfo_trip">
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
						<div class="tripCards">
							<tripCard
							class="tripCard"
							v-for="(trip, index) in trips"
							:key="index"
							:tripCardPhoto="trip.tripCardPhoto"
							:tripCardTags="trip.tripCardTags"
							:tripCardTitle="trip.tripCardTitle"
                            :tripCardDesc="trip.tripCardDesc"
            				:tripCardAuthor="trip.tripCardAuthor"
            				:tripCardDate="trip.tripCardDate"
							/>
						</div>
					</div>
					<a href="/trip">
						<btn class="btn">查看更多</btn>
					</a>
				</div>
			</section>

    </div>


</template>

<style lang="scss">
@import "@/assets/scss/baseAndMixin.scss";

.tripInfo{

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
        padding: 0 32px;
    }

    // 行程內容
    .trip_content{
        margin: 0 auto;
        padding: 0 32px;
        max-width: $xl;
        position: relative;
        display: flex;
        align-items: flex-start;
        gap: $sp2;
        @media (min-width: $md){
        gap: $sp4;
        }

        .trip_article{
            @media (min-width: $md){
                width: calc((100% - 352px) / 4 * 3 + 256px);
            }

            .header{
                position: relative;
                margin-bottom: $sp3;
                @media (min-width: $xl){
                margin-bottom: $sp6;
                }

                .trip_title{
                    display: flex;
                    align-items: end;
                    margin-bottom: $sp2;

                    h2{
                        font-family: 'Shippori Mincho', serif;
                        font-weight: 700;
                        line-height: 150%;
                    }
                    .deco{
                        display: none;
                        @media (min-width: $md){
                        display: block;
                        }
                    }
                }

                .author{
                    color: $textColor_tint;
                    margin-bottom: $sp1;
                }

                .date{
                    color: $textColor_tint;
                    margin-bottom: $sp1;
                }

                .views{
                    margin-top: $sp2;
                    @media (min-width: $md){
                        position: absolute;
                        bottom: 0;
                        right: 0;
                    }
                }
            }

            .trip_desc{
                margin-bottom: $sp6;
                p{
                    line-height: 190%;
                    @media (min-width: $md){
                    line-height: 165%;
                    }
                }
            }

            .spot{
                .spot_title{
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-bottom: $sp3;

                    .time{
                        display: flex;
                        gap: $sp1;
                    }
                }
                .spot_img{
                    width: 100%;
                    margin-bottom: $sp2;
                    @media (min-width: $md){
                    margin-bottom: $sp3;
                    }

                    img{
                        width: 100%;
                    }
                }
                .spot_desc{
                    margin-bottom: $sp3;
                    line-height: 190%;
                    @media (min-width: $md){
                    line-height: 165%;
                    }
                }
                .spot_loc{
                    display: flex;
                    gap: $sp1;
                    margin-bottom: $sp5;
                }

            }
            .trip_tags{
                display: flex;
                flex-wrap: wrap;
                gap: $sp2 $sp1;
                margin-bottom: $sp8;

                .tags{
                    color: $textColor_white;
                    background-color: $textColor_default;
                    padding: 8px 20px;
                    border-radius: 50px;
                }
            }
        }
        .sidebar{
            position: sticky;
            top: $sp12;
            border-radius: 10px;
            border: 3px solid $textColor_default;
            background-color: $bgColor_default;
            margin-bottom: $sp8;
            @media (min-width: $md){
                width: calc((100% - 352px) / 4 + 64px);
            }
            .route{
                display: none;
                @media (min-width: $md){
                    display: block;
                    padding: $sp3;
                    border-bottom: 3px solid $textColor_default;
            }
            }
            .collect{
                padding: $sp2;
                @media (min-width: $md){
                padding: $sp3;
                }
            }
        }
    }
    
    // 穿搭區塊
    .tripInfo_oott{
        position: relative;
        background-color: $bgColor_default;
        padding: $sp12 0 $sp8;
        @media (min-width: 768px) {
        padding: 160px 0 80px;
        }
        
    
        .content{
            margin: 0 auto;
            max-width: 1200px;
            text-align: center;
            @media (min-width: 768px) {
            padding: 0 32px;
            }
    
            .wrap{
                margin-bottom: 16px;
                overflow-x: scroll;
                @media (min-width: 768px) {
                overflow: visible;
                }
                .oottCards{
                    display: flex;
                    gap: $sp4;
                    margin-bottom: $sp4;
                    @media (min-width: 768px) {
                    justify-content: center;
                    }
                    .oottCard{
                        flex-shrink: 0;
                        @media (min-width: 768px) {
                        flex-shrink: 1;
                        }

                        &:nth-child(2n+1){
                            rotate: 1.6deg;
                        }
                        &:nth-child(2n){
                            rotate: -1.6deg;
                        }
    
                    }
                }
            }
        }
    
    }
    
    // 票券區塊
    .tripInfo_ticket{
        position: relative;
        padding: $sp12 0 $sp8;
        @media (min-width: 768px) {
        padding: 160px 0 80px;
        }
    
        .content{
            margin: 0 auto;
            max-width: 1200px;
            text-align: center;
    
            .wrap{
                margin-bottom: 32px;
                text-align: left;
                .ticketCards{
                    display: flex;
                    overflow-x: scroll;
                    @media (min-width: 1260px) {
                    justify-content: space-between;
                    gap: 32px;
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

    // 你可能有興趣
    .tripInfo_trip{
        position: relative;
        background-color: $bgColor_default;
        padding: $sp12 0 $sp8;
        @media (min-width: 768px) {
        padding: 160px 0 80px;
        }
        .content{
            margin: 0 auto;
            max-width: 1200px;
            text-align: center;
            @media (min-width: 768px) {
            padding: 0 32px;
            }
    
            .wrap{
                margin-bottom: 16px;
                overflow-x: scroll;
                text-align: left;
                @media (min-width: 768px) {
                overflow: visible;
                }
                .tripCards{
                    display: flex;
                    gap: $sp4;
                    margin-bottom: $sp4;
                    @media (min-width: 768px) {
                    justify-content: center;
                    }
                    .tripCard{
                        flex-shrink: 0;
                        @media (min-width: 768px) {
                        flex-shrink: 1;
                        }
    
                    }
                }
            }
        }
    
    }
}


</style>


<script>
import oottCard from '@/components/OottCard.vue'
import ticketCard from '@/components/TicketVertical.vue'
import tripCard from '@/components/TripCard.vue'

export default {
    components: {
		oottCard,
		ticketCard,
        tripCard,
	},
    data(){
        return {
            ootts:[
				{
					oottPhoto: require('@/assets/img/oott_card_example.png'),
					oottCardTags: "#日系 #休閒 #風景",
					oottCardDate: "2022 / 12 / 12",
					oottAuthorPhoto: require("@/assets/img/layout/plan_result_oott-1_member.png"),
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
			],
			tickets:[
				{
					ticketPhoto: require('@/assets/img/ticketExample.png'),
					ticketTitle: "斑比斑比斑比斑比山丘門票",
					ticketLocation: "宜蘭",
					ticketTags: "#標籤",
					originalPrice: 800,
					finalPrice: 599,
					discountTag: "75折",
				},
				{
					ticketPhoto: require('@/assets/img/ticketExample.png'),
					ticketTitle: "斑比斑比斑比斑比山丘門票",
					ticketLocation: "宜蘭",
					ticketTags: "#標籤",
					originalPrice: 800,
					finalPrice: 599,
					discountTag: "75折",
				},
				{
					ticketPhoto: require('@/assets/img/ticketExample.png'),
					ticketTitle: "斑比斑比斑比斑比山丘門票",
					ticketLocation: "宜蘭",
					ticketTags: "#標籤",
					originalPrice: 800,
					finalPrice: 599,
					discountTag: "75折",
				},
				{
					ticketPhoto: require('@/assets/img/ticketExample.png'),
					ticketTitle: "斑比斑比斑比斑比山丘門票",
					ticketLocation: "宜蘭",
					ticketTags: "#標籤",
					originalPrice: 800,
					finalPrice: 599,
					discountTag: "75折",
				},
			],
            trips:[
                {
                    tripCardPhoto: require('@/assets/img/trip_card_example.png'),
                    tripCardTags: "台中・#親子 #情侶 #農場",
                    tripCardTitle: "台中文青一日遊",
                    tripCardDesc: "到臺中屯區藝文中心參觀各式展覽與展演廳，並到太平買菸場欣賞本市藝術家陳庭詩鐵雕作品，再來到臺中市中區參觀美化的綠川水岸廊道，中午在第二市場品嚐臺中市各式美食小吃，下午再到審計新村參觀文創聚落感受臺中市文創的魅力，接著前往紙箱王創意園區體驗親手DIY文創商品，帶著滿滿的回憶與紀念品回家。",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 9",
                },
                {
                    tripCardPhoto: require('@/assets/img/trip_card_example.png'),
                    tripCardTags: "台中・#親子 #情侶 #農場",
                    tripCardTitle: "台中文青一日遊",
                    tripCardDesc: "到臺中屯區藝文中心參觀各式展覽與展演廳，並到太平買菸場欣賞本市藝術家陳庭詩鐵雕作品，再來到臺中市中區參觀美化的綠川水岸廊道，中午在第二市場品嚐臺中市各式美食小吃，下午再到審計新村參觀文創聚落感受臺中市文創的魅力，接著前往紙箱王創意園區體驗親手DIY文創商品，帶著滿滿的回憶與紀念品回家。",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 9",
                },
                {
                    tripCardPhoto: require('@/assets/img/trip_card_example.png'),
                    tripCardTags: "台中・#親子 #情侶 #農場",
                    tripCardTitle: "台中文青一日遊",
                    tripCardDesc: "到臺中屯區藝文中心參觀各式展覽與展演廳，並到太平買菸場欣賞本市藝術家陳庭詩鐵雕作品，再來到臺中市中區參觀美化的綠川水岸廊道，中午在第二市場品嚐臺中市各式美食小吃，下午再到審計新村參觀文創聚落感受臺中市文創的魅力，接著前往紙箱王創意園區體驗親手DIY文創商品，帶著滿滿的回憶與紀念品回家。",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023 / 7 / 9",
                },
            ]
        }
    },
    methods: {

    },
}
</script>