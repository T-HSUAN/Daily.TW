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

// banner
.banner{
	background-color: $bgColor_default;

}

// 熱門行程
.topTrip{
	position: relative;
	padding: 184px 0;

	.title{
		margin: 0 auto;
		max-width: 1200px;
		display: flex;
		align-items: center;

		
	}
}

// 精選行程
.selectTrip{
	position: relative;
	padding: 184px 0;
	background-color: $bgColor_default;

	.title{
		margin: 0 auto;
		max-width: 1200px;
		display: flex;
		align-items: center;

		
	}
}

// 駐站旅人
.authors{
	position: relative;
	padding: 184px 0;

	.title{
		margin: 0 auto;
		max-width: 1200px;
		display: flex;
		align-items: center;

		
	}
}

</style>

<script>

export default {
    data(){
        return {
        }
    },
    methods: {

    },
    components:{
    }
}
</script>