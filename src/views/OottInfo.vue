<!-- 單一穿搭頁面 -->
<template>
    <div class="oott_info">
        <!-- 麵包屑 -->
        <div class="breadcrumb">
            <router-link to="/Home">
                <span>首頁</span>
            </router-link>
            <font-awesome-icon icon="fa-solid fa-chevron-right" />
            <router-link to="/oott">
                <span>穿搭特輯</span>
            </router-link>
            <font-awesome-icon icon="fa-solid fa-chevron-right" />
            <router-link to="/oott_overview">
                <span>穿搭總覽</span>
            </router-link>
            <font-awesome-icon icon="fa-solid fa-chevron-right" />
            <router-link to="/oott">
                <span>{{ oottInfo.mem_name }}</span>
            </router-link>
        </div>

        <!-- 穿搭資訊頁 -->
        <div class="oott_info_section">
            <div class="pic_md">
                <img :src=getMemImg(oottInfo.mem_img) alt="作者頭像" />
                <span>{{ oottInfo.mem_name }}</span>
            </div>
            <div class="pic_block">
                <div class="pic">
                    <img :src=getOottImg(oottInfo.oott_img) alt="穿搭照片" />
                    <label>
                        <input type="checkbox">
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="writer_block">
            <div class="pic_xl">
                <img :src=getMemImg(oottInfo.mem_img) alt="作者頭像" />
                <a href="#">{{ oottInfo.mem_name }}</a>
            </div>
            <p>{{ oottInfo.oott_desc }}</p>
            <div class="tag_block">
                <label v-for="(tag, index) in oottInfo.concatenated_style_name" :key="index">
                <input type="checkbox" class="tag" />
                <span>#{{ tag }}</span>
                </label>
            </div>
            <div class="date">
            <span>{{ oottInfo.oott_date }}</span>
            <span class="number">{{ oottInfo.oott_view }} 次瀏覽</span>
            </div>
            </div>
        </div>

        <!-- 查看更多 -->
        <div class="oott_more">
            <div class="bgCurve">
                <img src="~@/assets/img/bgCurve_B.png" alt="" />
            </div>
            <div class="title">
                <div class="duckDeco">
                    <img src="~@/assets/img/duck_yellow.png" alt="" class="duck" />
                </div>
                <h2>看看其他穿搭</h2>
            </div>
            <div class="wrap">
                <div class="oottCards">
                    <oottCard class="oottCard" v-for="item in ootts" :key="item.id" 
                        :oottCardId="+item.oott_id"
                        :oottPhoto="getOottImg(item.oott_img)"
                        :oottCardTags="item.concatenated_style_name" 
                        :oottCardDate="item.oott_date"
                        :oottAuthorPhoto="getMemImg(item.mem_img)" 
                        :oottCardAuthor="item.mem_name">
                    </oottCard>
                </div>
            </div>
            <div class="look_more">
                <router-link to="/oott_overview" class="btn">查看更多</router-link>
            </div>
        </div>
    </div>
</template>
<script>
import { GET } from '@/plugin/axios'
import oottCard from "@/components/OottCard.vue";
export default {
    components: {
        oottCard,
    },
    data() {
        return {
            oottInfo: [],

            ootts: [],
        };
    },
    methods: {
        getOottImg(oottImg) {
            return process.env.BASE_URL + 'oottImg/' + oottImg ;
        },
        getMemImg(memImg) {
            return process.env.BASE_URL + 'profileImg/' + memImg ;
        },
        getData(){
            const oottId = this.$route.params.oott_id;
            GET(`${this.$URL}/oottInfo.php?oott_id=${oottId}`)
                .then((res) => {
                    this.oottInfo = res;
                    console.log(res);
                })
                .catch((err) => {
                    console.log(err);
                });

            GET(`${this.$URL}/oottInfoMore.php?oott_id=${oottId}`)
                .then((res) => {
                    console.log(res);
                    this.ootts = res;
                })
                .catch((err) => {
                    console.log(err);
                })
        }
    },
    watch: {
        '$route.params.oott_id': {
            handler: 'getData',
            deep: true,
            immediate: true
        }
    }

};

</script>

<style lang="scss" scoped>
@import "@/assets/scss/baseAndMixin.scss";

.oott_info {
    background: $bgColor_tint;
    padding-top: 74px;

    @media (min-width: 768px) {
        padding-top: 200px;
    }

    // 麵包屑
    .breadcrumb {
        padding-left: 30px;
        display: flex;
        align-items: center;
        font-size: 14px;
        gap: 4px;
        background-color: $bgColor_tint;

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

        +span {
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
            cursor:default;
        }
    }

    .oott_info_section {
        width: 100%;
        box-sizing: border-box;
        background-color: $bgColor_tint;

        @media (min-width: 768px) {
            display: flex;
            justify-content: center;
        }

        .pic_md {
            padding-top: 20px;
            width: 75%;
            display: flex;
            align-items: center;
            justify-content: center;

            @media (min-width: 768px) {
                display: none;
            }

            img {
                width: 48px;
                border-radius: 50px;
                padding: 0 5px;
            }

            a {
                font-size: $sm_h4;
                padding: $sp1;
                color: $textColor_default;
            }
        }

        .pic_block {
            // position: relative;
            display: flex;
            justify-content: center;
            padding-top: 20px;

            .pic {
                width: 255px;
                height: 343px;
                position: relative;

                @media (min-width: 768px) {
                    width: 480px;
                    height: 640px;
                }

                img {
                    width: 100%;
                }
            }

            label {
                position: absolute;
                top: 12px;
                right: 54px;

                @media (min-width: $md) {
                    top: 18px;
                    right: 72px;
                }

                input[type="checkbox"] {
                    display: none;
                }

                input[type="checkbox"]+span::before {
                    content: '';
                    display: inline-block;
                    width: 40px;
                    height: 40px;
                    background-image: url(~@/assets/img/heart_default.svg);
                    background-size: 100%;
                    background-repeat: no-repeat;
                    position: absolute;

                    cursor: pointer;

                    @media (min-width: $md) {
                        width: 60px;
                        height: 60px;
                    }
                }

                input[type="checkbox"]:checked+span::before {
                    content: '';
                    display: inline-block;
                    width: 40px;
                    height: 40px;
                    background-image: url(~@/assets/img/heart_clicked.svg);
                    background-size: 100%;
                    background-repeat: no-repeat;
                    cursor: pointer;

                    @media (min-width: $md) {
                        width: 60px;
                        height: 60px;
                    }
                }
            }
        }

        .writer_block {
            @media (max-width: 768px) {
                width: 256px;
                display: flex;
                flex-direction: column;
                margin: auto;
            }

            @media (min-width: 768px) {
                padding-left: 30px;
            }

            .pic_xl {

                // padding: $sp1;
                @media (max-width: 768px) {
                    display: none;
                }

                @media (min-width: 768px) {
                    width: 120px;
                    padding: 10px;
                    display: flex;
                    align-items: center;

                    img {
                        width: 100%;
                        // padding: 10px;
                        border-radius: 50px;
                    }

                    a {
                        padding: 5px;
                        font-size: $xl_h3;
                        color: $textColor_default;
                    }
                }
            }

            p {
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

            .tag_block {
                padding-top: 20px;

                @media (min-width: 768px) {
                    padding-top: 220px;
                }
            }

            .date {
                padding-top: 20px;
                display: flex;
                justify-content: space-between;

                span {
                    font-size: $sm_p;

                    @media (min-width: 768px) {
                        font-size: $xl_h5;
                    }
                }

                .number {
                    font-size: $sm_p;
                    color: $textColor_tint;

                    @media (min-width: 768px) {
                        font-size: $xl_h5;
                    }
                }
            }
        }
    }

    // 查看更多

    .bgCurve {
        position: absolute;
        top: 0;
        width: 100%;
        height: 96px;

        img {
            width: 100%;
            height: 100%;
        }
    }

    .title {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        @media (min-width: 768px) {
            flex-direction: row;
        }

        .duck {
            width: 90px;
            height: 66px;

            @media (min-width: 768px) {
                width: 130px;
                height: 100px;
            }
        }
    }

    h2 {
        font-size: $sm_h2;

        @media (min-width: 768px) {
            font-size: $xl_h2;
        }
    }

    .oott_more {
        position: relative;
        padding: 120px 0;
        background-color: $bgColor_default;

        .wrap {
            padding: 0 5%;
            margin-bottom: 16px;
            overflow-x: scroll; //////////////////////scroll_bar

            @media (min-width: 768px) {
                overflow: visible; //////////////////////scroll_bar
            }

            .oottCards {
                display: flex;
                align-items: center;
                padding-top: 60px;
                margin: auto;
                gap: 30px;
                flex-shrink: 0;

                .oottCard:nth-child(1) {
                    transform: rotate(-2deg);
                }

                .oottCard:nth-child(2) {
                    transform: rotate(2deg);
                }

                .oottCard:nth-child(3) {
                    transform: rotate(-2deg);
                }

                @media (min-width: 768px) {
                    display: flex;
                    justify-content: center;
                    flex-direction: row;
                }

            }
        }

        .look_more {
            padding-top: 60px;
            display: flex;
            justify-content: center;

            .btn {
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
        }
    }
}
</style>
