<!-- 單一穿搭頁面 -->
<template>
<!-- 麵包屑 -->
    <div class="breadcrumb">
        <router-link to="/">
            <span>首頁</span>
        </router-link>
        <font-awesome-icon icon="fa-solid fa-chevron-right" />
        <router-link to="/oott">
            <span>穿搭特輯</span>
        </router-link>
        <font-awesome-icon icon="fa-solid fa-chevron-right" />
        <router-link to="/oott">
            <span>穿搭總覽</span>
        </router-link>
        <font-awesome-icon icon="fa-solid fa-chevron-right" />
        <router-link to="/oott">
            <span>Ailson #oott</span>
        </router-link>
    </div>

<!-- 穿搭資訊頁 -->
    <div class="oott_info_section">
        <div class="pic_md">
            <img src="@/assets/img/info_name_2.png" alt="作者頭像">
            <a href="">Ailson</a>
        </div>
        <div class="pic_block">
            <div class="pic">
                <img src="@/assets/img/oott_40.png" alt="穿搭照片">
                <font-awesome-icon class="heart" icon="fa-solid fa-heart" />
            </div>
            
        </div>
        <div class="writer_block">
            <div class="pic_xl">
                <img src="~@/assets/img/info_name_2.png" alt="作者頭像">
                <a href="#">Ailson</a>
            </div>
            <p>小朋友穿著一套黃色花花的衣服，衣服上繽紛的花卉圖案增添了活潑的氛圍，頭上戴著一頂黃色的學生帽，帽檐整齊地遮蓋著他的額頭，營造出俏皮可愛的感覺，小朋友充滿活力和童真，他的穿搭散發著陽光般的溫暖和歡樂。</p>
            <div class="tag_block">
                <label>
                    <input type="checkbox" class="tag" />
                    <span>#可愛</span>
                </label>
                <label>
                    <input type="checkbox" class="tag" />
                    <span>#日系</span>
                </label>
                <label>
                    <input type="checkbox" class="tag" />
                    <span>#運動</span>
                </label>
            </div>
            <div class="date">
                <span>2023年7月3日</span>
                <span class="number">2,345 次瀏覽</span>
            </div>
        </div>
    </div>

</template>
<script>
export default {
    data() {
        return {};
    },
    methods: {},
};
</script>

<style lang="scss">
@import "@/assets/scss/main.scss";

// 麵包屑
.breadcrumb {
    padding-left: 30px;
    display: flex;
    align-items: center;
    font-size: 14px;
    gap: 4px;
    @media (min-width: 768px) {
        font-size: 18px;
        gap: $sp1;
        padding-left: 120px;
    }
    a {
        color: $textColor_default;
        letter-spacing: 0.6px;
    }
    a:last-child {
        color: $default_yellow;
        padding-bottom: 2px;
        @media (min-width: 768px) {
            padding-bottom: $sp1;
        }
        &::before {
            content: "";
            display: inline-block;
            width: 13px;
            height: 16px;
            background-image: url("~@/assets/img/layout/flag_oott.svg");
            background-size: 100%;
            background-repeat: no-repeat;
            padding-right: 4px;
            transform: translateY(1px);
            @media (min-width: 768px) {
                width: 20px;
                height: 24px;
                transform: translateY(3px);
            }
        }
    }
}

//tag
.tag {
    position: absolute;
    display: none;
    + span {
        @include sm_p;
        padding: 4px 12px;
        @media (min-width: 768px) {
            @include xl_p;
            padding: 8px 20px;
        }
        display: inline-flex;
        width: fit-content;
        justify-content: center;
        align-items: center;
        border-radius: 50px;
        color: $textColor_white;
        border: 2px solid $textColor_default;
        background: $textColor_default;
        cursor: pointer;
    }

}

.oott_info_section{
    width: 100%;
    box-sizing: border-box;

    @media (min-width: 768px) {
        display: flex;
        justify-content: center;
    }
    .pic_md{
        padding-top: 20px;
        width: 75%;
        display: flex;
        align-items: center;
        justify-content: center;
        @media (min-width: 768px) {
            display: none;
        }
        img{
            width: 48px;
            border-radius: 50px;
            padding:0 5px;
        }
        a{
            font-size: $sm_h4;
            padding: $sp1;
            color: $textColor_default;
        }
    }
    .pic_block{
        display: flex;
        justify-content: center;
        padding-top: 20px;
        .pic{
            width: 255px;
            height: 343px;
            position: relative;
            @media (min-width: 768px) {
                width: 480px;
                height: 640px;
            }
            img{
                width: 100%;
            }
            
        }
        .heart{
            font-size: 30px;
            position: absolute;
            top: 5px;
            right: 10px;
            color: white;
            @media (min-width: 768px) {
                font-size: 48px;
                position: absolute;
                top: 10px;
                right: 20px;
            }
        }
    }
    .writer_block{
        @media (max-width: 768px) {
            width: 256px;
            display: flex;
            flex-direction: column;
            margin: auto;
        }
        @media (min-width: 768px) {
            padding-left: 30px;
        }
        .pic_xl{
            // padding: $sp1;
            @media (max-width: 768px) {
                display: none;
                
            }
            @media (min-width: 768px) {
                width: 120px;
                padding: 10px;
                display: flex;
                align-items: center;
                img{
                    width: 100%;
                    // padding: 10px;
                }
                a{
                    padding: 5px;
                    font-size: $xl_h3;
                    color: $textColor_default;
                }
            }
        }
        p{
            margin-top: $sp1;
            width: 256px;
            letter-spacing: 1px;
            line-height: 20px;
            @media (min-width: 768px) {
                margin-top: $sp7;
                width: 480px;
                letter-spacing: 2px;
                line-height: 30px;
            }
        }
        .tag_block{
            padding-top: 20px;
            @media (min-width: 768px) {
                padding-top: 220px;
            }
        }
        .date{
            padding-top: 20px;
            display: flex;
            justify-content: space-between;
            span{
                font-size: $sm_p;
                @media (min-width: 768px) {
                    font-size: $xl_h5;
                }
                
            }
            .number{
                font-size: $sm_p;
                color: $textColor_tint;
                @media (min-width: 768px) {
                    font-size: $xl_h5;
                }
            }

        }
    }
}

</style>