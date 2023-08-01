<template>
    <div class="trip_collection_wrap">
        <h2>收藏管理</h2>

        <div class="collection_container">
            <Sidenav></Sidenav>

            <div class="collection_content">
                <h3>行程收藏</h3>
                <hr />
                <div class="card_wrap">
                    <div
                        class="card"
                        v-for="trip in tripDataForUser"
                        key="tripCollection"
                    >
                        <TripCardConst
                            :tripCardPhoto="trip.place_img1"
                            :tripCardTags="
                                combineTags(
                                    trip.region_name,
                                    trip.place_tag_name
                                )
                            "
                            :tripCardTitle="trip.trip_name"
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

<style lang="scss">
.trip_collection_wrap {
    width: 90%;
    margin: auto;
    padding-top: 74px;
    @media (min-width: 768px) {
        padding-top: 200px;
    }
    .collection_container {
        display: flex;
        gap: 30px;
    }

    @media (min-width: 1200px) {
        box-sizing: border-box;
        width: 1175px;
    }

    h2 {
        margin: 41px auto 44px auto;
        text-align: center;
    }

    h3 {
        margin-bottom: 8px;
    }

    hr {
        margin-bottom: 32px;
    }

    .card_wrap {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;

        .trip_card_const_default {
            margin: 8px 9px;
            width: 283px;
            height: 431px;
            @media (min-width: 768px) {
                width: 285px;
                height: 485px;
            }
            .trip_card_desc {
                height: 70px;
                @media (min-width: 768px) {
                    height: 89px;
                    }
            }
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
            
        
    }

}
</style>

<script>
import TripCardConst from "@/components/TripCardConst.vue";
import Sidenav from "@/components/Sidenav.vue";

import tripDataForUser from "@/store/tripDataForUser.js";

export default {
    components: {
        TripCardConst,
        Sidenav,
    },
    data() {
        return {
            tripDataForUser:tripDataForUser,
        }
    },
    methods: {
        combineTags(regionName, placeTagName) {
            // Combine regionName and placeTagName with a space between them
            return `${regionName} ${placeTagName}`;
        },
    }


    /* 以下使用 fetch 但上線前失敗了*/
    /*
    data() {
        return {
            tripData: [], // Initialize tripData as an empty array
        };
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
    */
};
</script>