<template>
    <div class="collection_wrap">
        <h2>穿搭管理</h2>
        
        <div class="collection_container">
            <Sidenav class="sidenav"></Sidenav>

            <div class="collection_content">
                <h3>我的穿搭</h3>
                <hr>
                <div class="status_bar">
                    <div class="status_message">
                        <h5>您有 </h5>
                        <h5 class="status_number">1</h5>
                        <h5> 則貼文待修改</h5>
                        <h5 class="status_number">1</h5>
                        <h5> 則貼文審核中</h5>
                        <h5 class="status_number">12</h5>
                        <h5> 則貼文已發布</h5>
                    </div>
                    <div class="status_sorting">
                        <font-awesome-icon icon="fa-solid fa-arrow-up-wide-short" />
                        <!-- 排序依據 -->
                        <span>排序依據</span>
                        <select name="my_oott_sorting" id="my_oott_sorting">
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
                    <div class="card" v-for="oott in oottData" key="oott.oottCardAuthor">
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

<style lang="scss" scope>
    .collection_wrap{
        width: 90%;
        margin: auto;

        .collection_container{
            display: flex;
        }


        @media (min-width : 1250px) {
            box-sizing: border-box;
                width: 1200px;            
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
            @media (min-width: 768px) {
            margin-left: 30px;
            }

            .status_message{
                color: var(--yellow-tint, #FBEDC8);
                background: var(--yellow-default, #E3C451);
                padding: 16px 32px;
                display: flex;
                gap:16px;
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

            .oott_default{
                box-sizing: border-box;
                margin: 16px;
                width: 257px;
                height: 440px;
                @media (min-width:768px) {
                    width: 276px;
                    height: 463px;
                }
                
                .oott_card_tag{
                    width: 104px;
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                }
            }
        }

        /* 等手機板切出來再拿掉(連同上面的class) */
        .sidenav{
            flex-shrink: 0;
            height: 506px;
            display: none;
            @media (min-width : 1024px) {
                display: block;            
            }
        }
    }



</style>


<script>
import OottCard from "@/components/OottCard.vue";
import Sidenav from "@/components/Sidenav.vue";

export default{
    components:{
        OottCard,
        Sidenav,
    },
    data() {
        return {
            oottData : [],// Initialize oottData as an empty array
        }
    },
    mounted() {
        // Fetch data from the JSON file when the component is mounted
        this.fetchOottData();
    },
    methods: {
    async fetchOottData() {
      try {
        // Use the Fetch API to fetch the data from the JSON file
        const response = await fetch("/fake/OottData.json"); // Adjust the path based on your project structure

        if (!response.ok) {
          throw new Error("Network response was not ok");
        }

        // Parse the JSON data
        const data = await response.json();

        // Set the fetched data as OottData
        this.oottData = data;
      } catch (error) {
        console.error("Error fetching oott data:", error);
      }
    },
  },
};
</script>  