<!-- 會員總覽 -->
<template>
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
                                <p>會員編號</p>
                            </div>
                            <div class="text">
                                <div class="pic">
                                    <img src="~@/assets/img/member_info.png" alt="">
                                </div>
                                <ul>
                                    <li>用戶暱稱</li>
                                    <li>生日</li>
                                    <li>性別</li>
                                    <li>email</li>
                                </ul>
                                <button class="btn">編輯</button>
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
                                    <a href="#"><img src="~@/assets/img/oott_card_example.png" alt="卡片照片"></a>
                                </div>
                                <div class="text">
                                    <p>主題標籤</p>
                                    <p class="state">待修改</p>
                                </div>
                                <div class="edit">
                                    <font-awesome-icon icon="fa-solid fa-pen" />
                                    <a href="#">編輯</a>
                                </div>
                            </div>
                            <div class="card">
                                <div class="pic">
                                    <a href="#"><img src="~@/assets/img/oott_card_example.png" alt="卡片照片"></a>
                                </div>
                                <div class="text">
                                    <p>主題標籤</p>
                                    <p class="state">審核中</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="pic">
                                    <a href="#"><img src="~@/assets/img/oott_card_example.png" alt="卡片照片"></a>
                                </div>
                                <div class="text">
                                    <p>主題標籤</p>
                                    <p class="state">新增日期</p>
                                </div>
                                <div class="edit">
                                    <font-awesome-icon icon="fa-solid fa-trash-can" />
                                    <a href="#">刪除</a>
                                </div>
                            </div>
                        </div>
                        <button class="btn">所有穿搭</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Sidenav from "@/components/Sidenav.vue";
export default {
    components: {
        Sidenav,
    },
}
</script>
<style lang="scss">
@import "@/assets/scss/main.scss";
.lg_area{
    width: 100%;
    text-align: center;
    h1{
        padding-top: 60px;
    }
    .bg_area{
        display: flex;
        justify-content: center;
        .bg_container{
        width: 100%;
        @media (min-width: 768px) {
                width: 900px;
            }
        }
        .sidenav{
            flex-shrink: 0;
            height: 506px;
            display: none;
            @media (min-width: 768px) {
                margin: $sp3 0;
            }
            @media (min-width : 1024px) {
                display: block;         
            }
        }
        .bg_container{
            @media (min-width: 768px) {
                margin: 0 $sp3;
                padding: 0 $sp3 $sp3;
            }
        }
    }
    
}

// 會員資料
.member{
    width: 100%;
    text-align: center;
    @media (min-width: 768px) {
        width: 900px;
    }
   .member_container{
    display: flex;
    justify-content: center;
    @media (min-width: 768px) {
        padding-top: 80px;
    }
    
    .personal_info{
        width: 100%;
        position: relative;
        @media (min-width: 768px) {
            width: 900px;
        }
        .member_title{
            display: flex;
            align-items: end;
            justify-content: space-between;
            padding: $sp3 0;
            margin: $sp3;
            @media (min-width: 768px) {
                padding: $sp3 0;
            }
            border-bottom: 2px solid $textColor_default;
            h2{
                font-size: $sm_h3;
                @media (min-width: 768px) {
                font-size: $xl_h2;
                }
            }
            p{
                font-size: $sm_p;
                @media (min-width: 768px) {
                font-size: $xl_p;
                }
            }
        }
        .text{
            display: flex;
            margin: $sp3;
            padding-bottom: 30px;
            border-bottom: 2px solid $textColor_default;
            @media (min-width: 768px) {
                padding-bottom: 32px;
                margin: $sp3;
            }
            .pic{
                width: 98px;
                @media (min-width: 768px) {
                    width: 160px;
                }
                img{
                    width: 100%;
                }
            }
            ul{
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
            .btn{
                position: absolute;
                right: 40px;
                bottom: 5px;
                @media (min-width: 768px) {
                position: absolute;
                right: 60px;
                bottom: 2px;
                }
            }
        }
        
    }
   }
}

// 我的穿搭
.my_oott{
    padding-top: $sp1;
    width: 100%;
    text-align: center;
    margin: auto;
    
    @media (min-width: 768px) {
            width: 900px;
        }
    .oott_container{

       .my_title{
            display: flex;
            padding: $sp3 0;
            margin: $sp3;
            align-items: end;
            border-bottom: 2px solid $textColor_default;
            @media (min-width: 768px) {
                padding: $sp3 0;
            }
            @media (max-width: 768px) {
                justify-content: space-between;
            }
            h2{
                font-size: $sm_h3;
                @media (min-width: 768px) {
                font-size: $xl_h2;
                }
            }
            .my_btn{
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
       .card_list{
        display: flex;
        .card{
            flex-direction: column;
            
            .pic{
                width: 205px;
                height: 256px;
                @media (min-width: 768px) {
                    width: 276px;
                    height: 347px;
                }
                img{
                    width: 100%;
                }
            }
        }
       }
    }
}
</style>