<!-- 帳號管理的個人密碼修改頁面 -->
<template>
<section class="memberPsw">

    <section class="profile">
        <h2>帳號管理</h2>
        
        <div class="profile_container">
            <Sidenav class="sidenav"></Sidenav>
            <!-- 個人資料修改 -->
            <div class="profile_card">
                <div class="member_title">
                    <h3>密碼修改</h3>
                    <!-- <p>會員編號</p> -->
                </div>
                <div class="member_data">
                    <div v-for="(item, index) in tabItems" 
                    :key="index">
                        <label :for="item.id">{{ item.text }}</label>
                        <input type="text" 
                        :id="item.id"
                    v-model="item.tag" 
                    :placeholder="item.placeholder"/>
                    </div>
                    <div class="btn_group">
            <router-link
                to="./member" 
                class="cancel_btn">
                取消編輯
            </router-link>
            <router-link
                to="./member" 
                class="btn">
            儲存
            </router-link>
        </div>
                </div>
            </div>
        </div>

    </section>
</section>
</template>

<style lang="scss" scoped>
@import "@/assets/scss/baseAndMixin.scss";
// *{
//     outline: 1px solid red;
// }
.memberPsw{
    padding-top: 74px;
    @media all and (min-width: $md) {
        padding-top: 200px;
        
    }
.profile{
    width: 90%;
    margin: 0 auto;

    @media (min-width: 1200px) {
        box-sizing: border-box;
        width: 1175px;
    }
    h2{
        margin: 41px auto;
        text-align: center;
    }


    .profile_container{
        display: flex;
        gap: 30px;
        
        .profile_card{
            width: 100%;
            display: flex;
            flex-direction: column;
            
            .member_title{
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: space-between;
                border-bottom: 1px solid $textColor_default;
                padding: 0 0 $sp1;
                
                h2{ 
                    margin: 0;
                }
                p{
                    font-size: $sm_p;
                    @media (min-width: 768px) {
                        font-size: $xl_p;
                    }
                }
            }
            
            .member_data{
                padding: 40px 0;
                @media (min-width: 768px) {
                    width: 435px;
                    box-sizing: border-box;
                    margin: 32px 200px 0 150px;
                }
                
                label{
                    font-size: $sm_h4;
                    font-weight: 700;
                    @media (min-width: 768px) {
                        font-size: $xl_h4;             
                    }
                }
                input{
                    width: 100%;
                    box-sizing: border-box;
                    margin: $sp1 0 $sp2;
                    @media (min-width: 768px) {
                        margin: $sp1 0 $sp3;            
                    }
                }

            .btn_group{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin: $sp2 0 $sp10;
            @media (min-width: 768px) {
                margin: $sp5 0 $sp15;
            }
            a:first-child{
                margin: 0 $sp2;
                @media (min-width: 768px) {
                    margin: 0 $sp4;
            }
            }
            
        }
        }
        }
    }
    
    }
}
</style>

<script>
import Sidenav from "@/components/Sidenav.vue";

export default{
    components:{
        Sidenav,
    },
    data(){
        return{
           tabItems:{
                1:{
                    text:'舊密碼',
                    placeholder:'請輸入6~12碼英數混合密碼',
                    id:'oldpsw',
                    tag:''
                },
                2:{
                    text:'新密碼',
                    placeholder:'請輸入6~12碼英數混合密碼',
                    id:'newpsw',
                    tag:''
                },
                3:{
                    text:'請再輸入一次新密碼',
                    placeholder:'請輸入6~12碼英數混合密碼',
                    id:'repeatpsw',
                    tag:''
                },
           },
           
           member:'',
        }
    },
}
</script>