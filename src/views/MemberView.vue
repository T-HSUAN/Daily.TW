<!-- 會員總覽 -->
<template>
    <div class="member">
        <h1>會員中心</h1>
        <div class="member_container">
            <Sidenav class="sidenav"></Sidenav>
            <div class="personal_info">
                <div class="title">
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
                </div>
                <button class="btn">編輯</button>
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


.member{
    width: 100%;
    text-align: center;
   .member_container{
    padding-top: 40px;
    display: flex;
    justify-content: center;
    .sidenav{
            flex-shrink: 0;
            height: 506px;
            display: none;
            @media (min-width : 1024px) {
                display: block;            
            }
        }
    .personal_info{
        width: 900px;
    }
   }
   
}
</style>