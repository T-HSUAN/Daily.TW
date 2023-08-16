<template>
    <div class="my_oott_wrap">
        <h2>穿搭管理</h2>
        
        <div class="collection_container">
            <Sidenav></Sidenav>

            <div class="collection_content">
                <h3>我的穿搭</h3>
                <hr>
                <div class="status_bar">
                    <div class="status_container">
                        
                        <div class="status">
                            <h5>您有 </h5>
                            <h5 class="edit_status_number">2</h5>
                            <h5> 則貼文未通過</h5>
                            <h5 class="status_number">1</h5>
                            <h5> 則貼文審核中</h5>
                        </div>

                        <div class="status">
                            <h5 class="status_number">2</h5>
                            <h5> 則貼文已發布</h5>
                        </div>
                    </div>
                    <div class="status_sorting">
                        <font-awesome-icon icon="fa-solid fa-arrow-up-wide-short" />
                        <!-- 排序依據 -->
                        <span>排序依據</span>
                        <select name="my_oott_sorting" id="selection_main" >
                            <option value="">由新到舊</option>
                            <option value="">由舊到新</option>
                            <option value="">瀏覽人氣</option>
                        </select>

                        <!-- 狀態 -->
                        <!-- <font-awesome-icon icon="fa-solid fa-filter" />
                        <select name="my_oott_sorting" id="my_oott_sorting">

                        </select>
                        <font-awesome-icon icon="fa-solid fa-caret-down" /> -->
                    </div>
                </div>
                <div class="card_wrap">
                    <div class="card" v-for="oott in tableData" key="oott.oottCardAuthor">
                        <MyOottCard
                        :oottImg= "oott.oott_img"
                        :oottCardTags= "oott.oottCardTags"
                        :oottCardDate= "oott.oott_date_only"
                        :oottStatus ="oott.oott_review_status"
                        :oottId = "oott.oott_id"
                        />
                    </div>
                    <!-- <Page :total="18" /> -->
                </div>
            </div>

        </div>

    </div>
</template>

<style lang="scss">
    .my_oott_wrap{
        width: 90%;
        margin: auto;
        padding-top: 74px;
        @media (min-width: 768px) {
            padding-top: 200px;
        }
        .collection_container{
            display: flex;
            gap: 30px;
        }


        @media (min-width: 1200px) {
            box-sizing: border-box;
            width: 1175px;
        }

        h2{
           margin: 41px auto 44px auto;
           text-align: center;
        }

        h3{
            margin-bottom: 8px;
        }

        hr{
            margin-bottom: 32px;
        }

        // status bar
        .status_bar{
            margin-bottom: 39px;

            .status_container{
                color: var(--yellow-tint, #FBEDC8);
                background: var(--yellow-default, #E3C451);
                padding: 8px 16px;
                display: block;
                gap:4px;
                line-height: 150%;
                font-size: 16px;
                @media (min-width: 500px) {
                    display: flex;
                }
                @media (min-width: 768px) {
                    font-size: 20px;
                    gap:10px;
                    padding: 16px 32px;
                }
                .status{
                    display: flex;
                    gap:4px;
                    @media (min-width: 768px) {
                    gap:10px;
                }
                }
                .status_number{
                    color: var(--text-white, #FEFFF5);
                }
                
                .edit_status_number{
                    color: #DB4918;
                }

            }
            .status_sorting{
                background: var(--yellow-tint, #FBEDC8);
                padding: 16px 32px;
                span{
                    margin-right: 16px;
                }
                
            }
        }

        // card
        .card_wrap{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

    }



</style>


<script>
import {GET} from '@/plugin/axios';
import MyOottCard from "@/components/MyOottCard.vue";
import Sidenav from "@/components/Sidenav.vue";
import axios from 'axios';
import { counter } from '@fortawesome/fontawesome-svg-core';

export default{
    components:{
        MyOottCard,
        Sidenav,
    },
    data() {
        return {
            tableData:[],
            PAGE_SIZE: 10,
            currentPageNum: 1,
        }
    },
    computed: {
        currentList() {
                return this.tableData.slice((this.currentPageNum - 1) * this.PAGE_SIZE, this.currentPageNum * this.PAGE_SIZE);
            },
        // countOott(){
        //     return this.tableData[0].oott_review_status;
        // },
    },
    mounted() {
        GET(`${this.$URL}/myOott.php`)
            .then((res) => {
                console.log(res);
                this.tableData = res;
            })
            .catch((err) => {
                console.log(err);
            })
    },
};
</script>  