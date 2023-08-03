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
                            <h5 class="edit_status_number">1</h5>
                            <h5> 則貼文待修改</h5>
                            <h5 class="status_number">1</h5>
                            <h5> 則貼文審核中</h5>
                        </div>

                        <div class="status">
                            <h5 class="status_number">12</h5>
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
                    <div class="card" v-for="oott in oottDataForUser" key="oott.oottCardAuthor">
                        <MyOottCard
                        :oottPhoto= "oott.oottPhoto"
                        :oottCardTags= "oott.oottCardTags"
                        :oottCardDate= "oott.oottCardDate"
                        :oottAuthorPhoto= "oott.oottAuthorPhoto"
                        :oottCardAuthor= "oott.oottCardAuthor"
                        :oottStatus ="oott.oottStatus"
                        :id = "oott.oottId"
                        />
                    </div>
                    <Page :total="18" />
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

// import oottDataForUser from "@/store/oottDataForUser.js";

export default{
    components:{
        MyOottCard,
        Sidenav,
    },
    data() {
        return {
            oottDataForUser:[],
            PAGE_SIZE: 10,
            currentPageNum: 1,
        }
    },
    computed: {
    currentList() {
            return this.oottDataForUser.slice((this.currentPageNum - 1) * this.PAGE_SIZE, this.currentPageNum * this.PAGE_SIZE);
        }
    },
    created() {
        GET('/fake/OottData.json').then(res => {
            this.oottDataForUser = res
        })
    },
//     data() {
//         return {
//             oottData : [],// Initialize oottData as an empty array
//         }
//     },
//     mounted() {
//         // Fetch data from the JSON file when the component is mounted
//         this.fetchOottData();
//     },
//     methods: {
//     async fetchOottData() {
    // const url = process.env.NODE_ENV === 'production' ? "/g5/fake/OottData.json" : "/fake/OottData.json";
//       try {
//         // Use the Fetch API to fetch the data from the JSON file
//         const response = await fetch(url); // Adjust the path based on your project structure

//         if (!response.ok) {
//           throw new Error("Network response was not ok");
//         }

//         // Parse the JSON data
//         const data = await response.json();

//         // Set the fetched data as OottData
//         this.oottData = data;
//       } catch (error) {
//         console.error("Error fetching oott data:", error);
//       }
//     },
//   },
};
</script>  