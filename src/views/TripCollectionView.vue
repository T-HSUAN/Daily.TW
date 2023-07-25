<template>
    <div class="collection_wrap">
        <h2>收藏管理</h2>
        
        <div class="collection_container">
            <Sidenav class="sidenav"></Sidenav>

            <div class="collection_content">
                <h3>行程收藏</h3>
                <hr>
                <div class="card_wrap">
                    <div class="card" v-for="trip in tripData" key="tripCollection">
                        <TripCard
                            :tripCardPhoto = "trip.place_img1"
                            :tripCardTags = "combineTags(trip.region_name, trip.place_tag_name)"
                            :tripCardTitle = "trip.trip_name"
                            :tripCardDesc="trip.trip_desc"
                            :tripCardAuthor="trip.trip_author"
                            :tripCardDate="trip.trip_date"
                        />
                    </div>
                </div>
            </div>

        </div>

    </div>
</template>

<style lang="scss" scope>
    .collection_wrap{
        .collection_container{
            display: flex;
        }

        width: 90%;
        margin: auto;
        @media (min-width : 1220px) {
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

        .card_wrap{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            
            .trip_card_default{
                margin: 8px 15px;
                width: 283px;
                height: 431px;
                @media (min-width:768px) {
                    width: 285px;
                    height: 485px;
                }
                .trip_card_desc{
                    height: 70px;
                    @media (min-width:768px) {
                        height: 89px;
                    }
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
import TripCard from "@/components/TripCard.vue";
import Sidenav from "@/components/Sidenav.vue";

export default{
    components:{
        TripCard,
        Sidenav,
    },
    data() {
        return {
            tripData : [],// Initialize tripData as an empty array
        }
    },
    mounted() {
        // Fetch data from the JSON file when the component is mounted
        this.fetchTripData();
    },
    methods: {
    async fetchTripData() {
      try {
        // Use the Fetch API to fetch the data from the JSON file
        const response = await fetch("/fake/TripData.json"); // Adjust the path based on your project structure

        if (!response.ok) {
          throw new Error("Network response was not ok");
        }

        // Parse the JSON data
        const data = await response.json();

        // Set the fetched data as tripData
        this.tripData = data;
      } catch (error) {
        console.error("Error fetching trip data:", error);
      }
    },
    combineTags(regionName, placeTagName) {
      // Combine regionName and placeTagName with a space between them
      return `${regionName} ${placeTagName}`;
    },
  },
};
</script>  