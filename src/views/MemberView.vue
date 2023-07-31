<!-- 會員總覽 -->
<template>
<div class="member_view">
    <div class="lg_area">
        <h1>會員中心</h1>
        <div class="bg_area">
            <Sidenav class="sidenav"></Sidenav>
            <div class="bg_container">
                <div class="member">
                    <div class="member_container">
                        <div class="personal_info">
                            <div class="member_title">
                                <h2>個人資料</h2>
                                <!-- <p>會員編號</p> -->
                            </div>
                            <div class="text">
                                <div class="pic">
                                    <img
                                        src="~@/assets/img/member_info.png"
                                        alt=""
                                    />
                                </div>
                                <ul>
                                    <li>用戶暱稱</li>
                                    <li>生日</li>
                                    <li>性別</li>
                                    <li>email</li>
                                </ul>
                                <router-link to="/member_info" class="btn">編輯</router-link>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 我的穿搭 -->
                <div class="my_oott">
                    <div class="oott_container">
                        <div class="my_title">
                            <h2>我的穿搭</h2>
                            <button class="my_btn">1則待修改|1則審核中</button>
                        </div>
                        <div class="card_list">
                            <div class="card">
                                <div class="pic">
                                    <a href="#"
                                        ><img
                                            src="~@/assets/img/oott_14.png"
                                            alt="卡片照片"
                                    /></a>
                                </div>
                                <div class="text_warn">
                                    <p>主題標籤</p>
                                    <p class="state">待修改</p>
                                </div>
                                <div class="edit">
                                    <font-awesome-icon
                                        class="icon"
                                        icon="fa-solid fa-pen"
                                    />
                                    <a href="#">編輯</a>
                                </div>
                            </div>
                            <div class="card">
                                <div class="pic">
                                    <a href="#"
                                        ><img
                                            src="~@/assets/img/oott_10.png"
                                            alt="卡片照片"
                                    /></a>
                                </div>
                                <div class="text">
                                    <p>主題標籤</p>
                                    <p class="state">審核中</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="pic">
                                    <a href="#"
                                        ><img
                                            src="~@/assets/img/oott_11.png"
                                            alt="卡片照片"
                                    /></a>
                                </div>
                                <div class="text">
                                    <p>主題標籤</p>
                                    <p class="state">新增日期</p>
                                </div>
                                <div class="edit">
                                    <font-awesome-icon
                                        class="icon"
                                        icon="fa-solid fa-trash-can"
                                    />
                                    <a href="#">刪除</a>
                                </div>
                            </div>
                        </div>
                        <router-link to="/my_oott" class="btn">所有穿搭</router-link>
                    </div>
                </div>
                <!-- 收藏清單 -->
                <div class="collect">
                    <div class="big_title">
                        <h2>收藏清單</h2>
                    </div>
                    <div class="trip_collect">
                        <div class="trip_title">
                            <h3>行程收藏</h3>
                        </div>
                        <div class="trip_block">
                            <trip-card
                                class="trip_box"
                                v-for="(card, index) in tripCards"
                                :key="index"
                                :tripCardPhoto="card.tripCardPhoto"
                                :tripCardTags="card.tripCardTags"
                                :tripCardTitle="card.tripCardTitle"
                                :tripCardDesc="card.tripCardDesc"
                                :tripCardAuthor="card.tripCardAuthor"
                                :tripCardDate="card.tripCardDate"
                            />
                        </div>
                        <router-link to="/trip_collection_view" class="btn">所有行程</router-link>
                    </div>
                    <div class="oott_collect">
                        <div class="oott_title">
                            <h3>穿搭收藏</h3>
                        </div>
                        <div class="oott_block">
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
                        <router-link to="/oott_collection_view" class="btn">所有穿搭</router-link>
                    </div>
                </div>
                <!-- 我的訂單 -->
                <div class="order">
                    <div class="big_title">
                        <h2>我的訂單</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>訂單編號</th>
                                <th>訂購日期</th>
                                <th>訂單狀態</th>
                                <th>總計</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>2023-07-24</td>
                                <td>處理中</td>
                                <td>$100.00</td>
                                <td>
                                    <router-link to="/myorder">前往訂單<font-awesome-icon icon="fa-solid fa-arrow-right"/></router-link>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>2023-07-23</td>
                                <td>已發貨</td>
                                <td>$75.50</td>
                                <td>
                                    <router-link to="/myorder">前往訂單<font-awesome-icon icon="fa-solid fa-arrow-right"/></router-link>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>2023-07-22</td>
                                <td>已完成</td>
                                <td>$50.25</td>
                                <td>
                                    <router-link to="/myorder">前往訂單<font-awesome-icon icon="fa-solid fa-arrow-right"/></router-link>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>2023-07-21</td>
                                <td>處理中</td>
                                <td>$120.75</td>
                                <td>
                                    <router-link to="/myorder">前往訂單<font-awesome-icon icon="fa-solid fa-arrow-right"/></router-link>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>2023-07-20</td>
                                <td>已取消</td>
                                <td>$0.00</td>
                                <td>
                                    <router-link to="/myorder">前往訂單<font-awesome-icon icon="fa-solid fa-arrow-right"/></router-link>
                                </td>
                            </tr>
                        </tbody>
                        <router-link to="/myorder"><button class="btn">所有訂單</button></router-link>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
import Sidenav from "@/components/Sidenav.vue";
import TripCard from "@/components/TripCard.vue";
import oottCard from "@/components/OottCard.vue";
export default {
    components: {
        Sidenav,
        TripCard,
        oottCard,
    },
    data() {
        return {
            tripCards: [
                {
                    tripCardPhoto: "https://picsum.photos/237/191?random=1",
                    tripCardTags: "#懷舊 #文青 #景觀",
                    tripCardTitle: "新竹懷舊之旅",
                    tripCardDesc:
                        "新竹內灣旅行去，來內灣一日遊要怎麼玩呢？除了內灣老街外，週邊也有一些亮點，像是景觀餐廳、文青景點、咖啡廳，自然景觀，推薦大家可以一同順遊，除了玩內灣，如果有時間，尖石一帶也有一些不錯的景點，可以順著路線玩上去。",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023/05/01",
                },
                {
                    tripCardPhoto: "https://picsum.photos/237/191?random=2",
                    tripCardTags: "#親子 #農場",
                    tripCardTitle: "宜蘭芬多精一日遊",
                    tripCardDesc:
                        "不知道要去哪裡玩嗎? 精選六個宜蘭知名景點，有吃又有玩，無論是親子出遊、朋友相聚或者是情侶約會保證您都能玩得很盡興。",
                    tripCardAuthor: "小編B",
                    tripCardDate: "2023/05/02",
                },
                {
                    tripCardPhoto: "https://picsum.photos/237/191?random=3",
                    tripCardTags: "#藝術 #賞花 #親子",
                    tripCardTitle: "新北藝術一日遊",
                    tripCardDesc:
                        "來去新北一日遊,鶯歌、三峽這裡也有蠻多特色景點,不只是逛老街,也可以安排個鶯歌景點一日遊,順便遊三峽景點。不管是季節限定的賞花景點,還是親子同遊必拍,又或者是IG熱門打卡點,通通好玩報你知。",
                    tripCardAuthor: "小編A",
                    tripCardDate: "2023/05/03",
                },
            ],
            ootts: [
                {
                    oottPhoto: require("@/assets/img/oott_card_example.png"),
                    oottCardTags: "#日系 #休閒 #風景",
                    oottCardDate: "2022 / 12 / 12",
                    oottAuthorPhoto: require("@/assets/img/oott_card_proPic_example.png"),
                    oottCardAuthor: "Alison",
                },
                {
                    oottPhoto: require("@/assets/img/oott_06.png"),
                    oottCardTags: "#復古 #海邊",
                    oottCardDate: "2022 / 7 / 3",
                    oottAuthorPhoto: require("@/assets/img/oott_card_proPic_example.png"),
                    oottCardAuthor: "Susan",
                },
                {
                    oottPhoto: require("@/assets/img/oott_card_example.png"),
                    oottCardTags: "#街頭 #潮流",
                    oottCardDate: "2022 / 7 / 6",
                    oottAuthorPhoto: require("@/assets/img/oott_card_proPic_example.png"),
                    oottCardAuthor: "Max",
                },
            ],
        };
    },
};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/baseAndMixin.scss";
.member_view{
    max-width: 1175px;
    box-sizing: border-box;
    margin: auto;
    background: $bgColor_tint;
    padding-top: 74px;
    @media (min-width: 768px) {
        padding-top: 200px;
    }
.lg_area {
    width: 100%;
    text-align: center;
    align-items: center;
    // padding: $sp8 $sp3;
    
    h1 {
        margin: 30.5px auto;
        text-align: center;
        @media (min-width: 768px) {
            // margin: 40px auto 80px;
        }
    }
    .bg_area {
        display: flex;
        .bg_container {
            margin-bottom: 60px;
            width: 100%;
            @media (min-width: 768px) {
                padding-left: 30px;
            }
        }
    }
}

// 會員資料
.member {
    width: 100%;
    text-align: center;
    .member_container {
        display: flex;
        justify-content: center;
        .personal_info {
            width: 100%;
            position: relative;
            .member_title {
                display: flex;
                align-items: end;
                justify-content: space-between;
                padding: 0 0 $sp3 0;
                margin: 0 $sp3 $sp3 $sp3;
                @media (min-width: 768px) {
                    padding: 0 $sp3 $sp3 0;
                    margin: 0 0 $sp3 0;
                }
                border-bottom: 2px solid $textColor_default;
                h2 {
                    font-size: $sm_h3;
                    @media (min-width: 768px) {
                        font-size: $xl_h2;
                    }
                }
                p {
                    font-size: $sm_p;
                    @media (min-width: 768px) {
                        font-size: $xl_p;
                    }
                }
            }
            .text {
                display: flex;
                margin: $sp3;
                padding-bottom: 30px;
                border-bottom: 2px solid $textColor_default;
                @media (min-width: 768px) {
                    padding-bottom: 32px;
                    margin: 0;
                }
                .pic {
                    width: 98px;
                    @media (min-width: 768px) {
                        width: 160px;
                    }
                    img {
                        width: 100%;
                    }
                }
                ul {
                    display: flex;
                    flex-direction: column;
                    width: 130px;
                    align-items: start;
                    padding-left: $sp2;
                    gap: 15px;
                    @media (min-width: 768px) {
                        width: 600px;
                        padding-left: $sp5;
                        gap: 30px;
                    }
                }
                .btn {
                    position: absolute;
                    right: 70px;
                    bottom: 6px;
                    @media (min-width: 768px) {
                        position: absolute;
                        right: 90px;
                        bottom: -18px;
                    }
                }
            }
        }
    }
}

// 我的穿搭
.my_oott {
    padding-top: $sp1;
    width: 100%;
    text-align: center;
    margin: auto;
    @media (min-width: 768px) {
        // width: 900px;
        padding-top: $sp8;
    }
    .oott_container {
        position: relative;

        .my_title {
            display: flex;
            padding: $sp3 0;
            margin: $sp3;
            align-items: end;
            border-bottom: 2px solid $textColor_default;
            @media (min-width: 768px) {
                padding: $sp3 0;
                margin: 0;
            }
            @media (max-width: 768px) {
                justify-content: space-between;
            }
            h2 {
                font-size: $sm_h3;
                @media (min-width: 768px) {
                    font-size: $xl_h2;
                }
            }
            .my_btn {
                width: 181px;
                height: 25px;
                border-radius: 50px;
                color: white;
                background-color: $textColor_tint;
                margin-left: 30px;
                @media (min-width: 768px) {
                    width: 234px;
                    height: 35px;
                }
            }
        }
        .card_list {
            display: flex;
            padding: $sp3 0;
            margin: $sp3;
            border-bottom: 2px solid $textColor_default;
            overflow-x: scroll; //////////////////////scroll_bar
            overflow-y: visible;
            @media (min-width: 768px) {
                justify-content: center;
                margin: 0;
                overflow: visible; //////////////////////scroll_bar
            }
            .card {
                flex-direction: column;
                display: block;
                padding: 10px;
                .pic {
                    img {
                        width: 260px;
                        height: 347px;
                    }
                }
                .text {
                    display: flex;
                    padding: 5px;
                    background-color: $default_yellow;
                    justify-content: space-between;
                    p {
                        font-size: $sm_h5;
                        color: white;
                        @media (min-width: 768px) {
                            font-size: $xl_h5;
                        }
                    }
                    .state {
                        color: white;
                        font-size: $sm_p;
                        @media (min-width: 768px) {
                            font-size: $sm_h5;
                        }
                    }
                }
                .text_warn {
                    display: flex;
                    background-color: $warningColor;
                    padding: 5px;
                    justify-content: space-between;
                    p {
                        font-size: $sm_h5;
                        color: white;
                        @media (min-width: 768px) {
                            font-size: $xl_h5;
                        }
                    }
                    .state {
                        color: white;
                        font-size: $sm_p;
                        @media (min-width: 768px) {
                            font-size: $sm_h5;
                        }
                    }
                }
                .edit {
                    justify-content: end;
                    align-items: center;
                    display: flex;
                    padding: 5px;
                    margin-bottom: $sp1;
                    @media (min-width: 768px) {
                        margin-bottom: $sp4;
                    }
                    .icon {
                        font-size: 12px;
                        padding-right: 5px;
                        @media (min-width: 768px) {
                            font-size: 14px;
                        }
                    }
                    a {
                        font-size: $sm_p;
                        color: $textColor_default;
                        @media (min-width: 768px) {
                            font-size: $sm_h5;
                        }
                    }
                }
            }
        }
        .btn {
            position: absolute;
            right: 80px;
            bottom: -18px;
            @media (min-width: 768px) {
                position: absolute;
                right: 88px;
                bottom: -18px;
            }
        }
    }
}
// 收藏清單
.collect {
    padding-top: $sp1;
    width: 100%;
    @media (min-width: 768px) {
        padding-top: $sp6;
    }
    .big_title {
        display: flex;
        align-items: end;
        padding: $sp3 0;
        margin: $sp3;
        border-bottom: 2px solid $textColor_default;
        @media (min-width: 768px) {
            padding: $sp6 0 $sp3 0;
            margin: 0;
        }
        h2 {
            font-size: $sm_h3;
            @media (min-width: 768px) {
                font-size: $xl_h2;
            }
        }
    }
    //行程收藏
    .trip_collect {
        width: 100%;
        position: relative;
        @media (min-width: 768px) {
            padding-top: $sp3;
            margin-bottom: $sp3;
        }
        .trip_title {
            display: flex;
            align-items: end;
            padding: $sp3 0;
            margin: $sp3;
            border-bottom: 1px solid $textColor_default;
            @media (min-width: 768px) {
                padding: $sp3 0;
                margin: 0;
            }
            h3 {
                font-size: $sm_h4;
                @media (min-width: 768px) {
                    font-size: $xl_h4;
                }
            }
        }
        .trip_block {
            position: relative;
            padding: $sp2 0 $sp6 0;
            margin: $sp3;
            border-bottom: 2px solid $textColor_default;
            display: flex;

            gap: 10px;
            overflow-x: scroll; //////////////////////scroll_bar
            @media (min-width: 768px) {
                padding: $sp3 0 $sp6 0;
                justify-content: center;
                margin: 0;
                overflow: visible; //////////////////////scroll_bar
            }
            .trip_box {
                flex-shrink: 0;
                width: 231px;
                @media (min-width: 768px) {
                    width: 285px;
                }
            }
        }
        .btn {
            position: absolute;
            right: 80px;
            bottom: -18px;
            @media (min-width: 768px) {
                position: absolute;
                right: 88px;
                bottom: -18px;
            }
        }
    }
    //穿搭收藏
    .oott_collect {
        position: relative;
        width: 100%;
        @media (min-width: 768px) {
            padding-top: $sp3;
            margin-bottom: $sp3;
        }
        .oott_title {
            display: flex;
            align-items: end;
            padding: $sp3 0;
            margin: $sp3;
            border-bottom: 1px solid $textColor_default;
            @media (min-width: 768px) {
                padding: $sp3 0;
                margin: 0;
            }
            h3 {
                font-size: $sm_h4;
                @media (min-width: 768px) {
                    font-size: $xl_h4;
                }
            }
        }
        .oott_block {
            // position: relative;
            box-sizing: border-box;
            padding: $sp2 0 $sp6 0;
            margin: $sp3;
            border-bottom: 2px solid $textColor_default;
            overflow-y: visible;
            overflow-x: scroll; //////////////////////scroll_bar
            @media (min-width: 768px) {
                padding: $sp3 0 $sp6 0;
                margin: 0;
                justify-content: center;
                overflow: visible; //////////////////////scroll_bar
            }
            .oottCards {
                display: flex;
                width: 100%;
                @media (min-width: 768px) {
                    justify-content: center;
                }
                .oottCard {
                    flex-shrink: 0;
                    margin: 5px;
                }
            }
        }
        .btn {
            position: absolute;
            right: 80px;
            bottom: -18px;
            @media (min-width: 768px) {
                position: absolute;
                right: 88px;
                bottom: -18px;
            }
        }
    }
}

.order {
    box-sizing: border-box;
    width: 100%;
    display: flex;
    flex-direction: column;
    position: relative;
    padding: $sp3 0 $sp6 0;
    // margin: $sp3;
    border-bottom: 2px solid $textColor_default;
    @media (min-width: 768px) {
        padding: $sp3 0 $sp6 0;
        margin: 0;
    }
    .big_title {
        display: flex;
        align-items: end;
        text-align: start;
        padding: $sp3 0;
        margin: $sp3;
        border-bottom: 2px solid $textColor_default;
        @media (min-width: 768px) {
            padding: $sp6 0 $sp3 0;
            margin: 0;
        }
        h2 {
            font-size: $sm_h3;
            @media (min-width: 768px) {
                font-size: $xl_h2;
            }
        }
    }
    table {
        margin-top: 10px;
        border-collapse: separate;
        border-spacing: 0;
        margin: $sp3;
        border: 3px solid $textColor_tint;
        @media (min-width: 768px) {
            margin: 30px 0 0 0;
        }
    }

    th,
    td {
        border-bottom: 3px solid $textColor_tint;
        padding: 8px;
        text-align: center;
        @media (min-width: 768px) {
            padding: 11px;
        }
    }

    th {
        background-color: $default_yellow;
        color: white;
        @media (min-width: 768px) {
            font-size: $xl_h5;
        }
    }

    tr {
        color: $textColor_default;
        @media (min-width: 768px) {
            font-size: $xl_h5;
        }
    }

    tr:hover {
        background-color: $textColor_white;
    }

    a {
        display: block;
        text-align: center;
        text-decoration: none;
        color: $textColor_default;
    }
    .btn {
        position: absolute;
        right: 80px;
        bottom: -18px;
        @media (min-width: 768px) {
            position: absolute;
            right: 88px;
            bottom: -18px;
        }
    }
}
}
</style>
