<template>
    <div class="ticketVertical_container ticket_single">
        <img :src="ticketPhoto" alt="票券照片" />
        <div class="ticket_text">
            <h3 class="ticket_title">{{ ticketTitle }}</h3>
            <p class="ticket_location">
                {{ ticketLocation }}・
                <span class="ticket_tags"
                    >{{ ticketTags }}{{ ticketTags }}{{ ticketTags }}</span
                >
            </p>
            <p class="ticket_details">{{ ticketDetails }}</p>
            <p class="ticket_addr">
                <font-awesome-icon icon="fa-solid fa-location-dot" />&nbsp;{{
                    ticketAddr
                }}
            </p>
            <div class="ticket_price">
                <span>{{ originalPrice }}</span>
                <span>{{ FinalPrice }}</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        ticketPhoto: String,
        ticketTitle: String,
        ticketLocation: String,
        ticketDetails: String,
        ticketAddr: String,
        ticketTags: String,
        originalPrice: Number,
        FinalPrice: Number,
    },
};
</script>

<style></style>

<!-- v-for 的例子 -->
<!-- <template>
    <MainHeader></MainHeader>
    <main>
      <router-view />
      <ticketVertical
      class="ticketCard"       
      v-for="(ticket, index) in tickets"
      :key="index"
      :ticketPhoto="ticket.ticketPhoto"
      :ticketTitle="ticket.ticketTitle"
      :ticketTags="ticket.ticketTags"
      :originalPrice="ticket.originalPrice"
      :FinalPrice="ticket.FinalPrice"></ticketVertical>
    </main>
    <ArrowUp></ArrowUp>
    <MainFooter></MainFooter>
</template>


<script>
import MainHeader from "@/components/MainHeader.vue";
import MainFooter from "@/components/MainFooter.vue";
import ArrowUp from "@/components/ArrowUp.vue";
import ticketVertical from "@/components/TicketVertical.vue";


export default {
  components: {
    MainHeader,
    MainFooter,
    ArrowUp,
    ticketVertical
},
data() {
  return {
    tickets:[
      {
      ticketPhoto:"https://picsum.photos/300/200/?  random=10",
      ticketTitle:"標題1",
      ticketTags:"標籤1",
      originalPrice: "555",
      FinalPrice: "388"
      },
      {
      ticketPhoto:"https://picsum.photos/300/200/?  random=9",
      ticketTitle:"標題2",
      ticketTags:"標籤2",
      originalPrice: "999",
      FinalPrice: "666"
      }
      ],
    }
  }
};
</script>

<style lang="scss">
// @import url('./assets/scss/main.scss');
// @import './assets/scss/main.scss';
@import "@/assets/scss/main.scss";
.ticketCard{
  margin: 4px;
}
</style> -->
