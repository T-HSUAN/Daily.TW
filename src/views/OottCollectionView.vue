<template>
    <div class="oott_collection_wrap">
        <h2>收藏管理</h2>
        
        <div class="collection_container">
            <Sidenav></Sidenav>

            <div class="collection_content">
                <h3>穿搭收藏</h3>
                <hr>
                <div class="card_wrap">
                    <div class="card" v-for="item in tableData" key="oott.oottCardAuthor">
                        <OottCardConst
                        :oottCardId="item.oott_id"
                        :oottPhoto= "getOottImg(item.oott_img)"
                        :oottCardTags= "item.concatenated_style_name"
                        :oottCardDate= "item.oott_date_only"
                        :oottAuthorPhoto="getMemImg(item.mem_img)"
                        :oottCardAuthor= "item.mem_name"
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
                    width: 283px;
                    height: 463px;
                    margin: 7px;
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
import {GET} from '@/plugin/axios'
import OottCardConst from "@/components/OottCardConst.vue";
import Sidenav from "@/components/Sidenav.vue";

// import oottDataForUser from "@/store/oottDataForUser.js";

export default{
    components:{
        OottCardConst,
        Sidenav,
    },
    data() {
        return {
            tableData:[],
        }
    },
    methods:{
        getOottImg(oottImg){
            return process.env.BASE_URL + 'oottImg/' + oottImg;
        },
        getMemImg(memImg){
            return process.env.BASE_URL + 'profileImg/' + memImg;
        }
    },
    mounted() {
        GET(`${this.$URL}/oottCollection.php`)
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