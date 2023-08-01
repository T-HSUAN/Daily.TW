<template>
    <div class="oott_collection_wrap">
        <h2>收藏管理</h2>
        
        <div class="collection_container">
            <Sidenav></Sidenav>

            <div class="collection_content">
                <h3>穿搭收藏</h3>
                <hr>
                <div class="card_wrap">
                    <div class="card" v-for="oott in oottDataForUser" key="oott.oottCardAuthor">
                        <OottCard
                        :oottPhoto= "oott.oottPhoto"
                        :oottCardTags= "oott.oottCardTags"
                        :oottCardDate= "oott.oottCardDate"
                        :oottAuthorPhoto= "oott.oottAuthorPhoto"
                        :oottCardAuthor= "oott.oottCardAuthor"
                        />
                    </div>
                </div>
            </div>

        </div>

    </div>
</template>

<style lang="scss">
    .oott_collection_wrap{
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
        

        .card_wrap{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;

            .oott_default{
                box-sizing: border-box;
                margin: 6px;
                width: 257px;
                height: 440px;
                @media (min-width:768px) {
                    width: 276px;
                    height: 463px;
                    margin: 12px;
                }
                
                .oott_card_tag{
                    width: 104px;
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                }
            }
        }
    }



</style>


<script>
import OottCard from "@/components/OottCard.vue";
import Sidenav from "@/components/Sidenav.vue";

import oottDataForUser from "@/store/oottDataForUser.js";

export default{
    components:{
        OottCard,
        Sidenav,
    },
    data() {
        return {
            oottDataForUser:oottDataForUser,
        }
    },

/* 以下使用 fetch 但上線前失敗了*/
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
//       try {
//         // Use the Fetch API to fetch the data from the JSON file
//         const response = await fetch("/fake/OottData.json"); // Adjust the path based on your project structure

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