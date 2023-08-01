<!-- 單一票券的內容區塊 -->
<template>
    <div class="ticket_info_page">
        <p>{{ ticket.Name }}</p>
    </div>
</template>

<script>
import TicketSingleCard from "@/components/TicketSingleCard.vue";
import ticketData from "@/store/ticketData.js";
import itemList from "@/store/cart.js";
export default {
    components: {
        TicketSingleCard,
    },
    props: {
        id: {
            type: Number,
            required: true // 要求接收 id 屬性
        }
    },
    data() {
        return {
            itemList: itemList,
            togglePage: false,
            ticket: null,
        };
    },
    methods: {
        getTicketDetails(ticketId) {
            // Find the ticket with the given ID in your ticketData array
            return ticketData.find(ticketData => ticketData.id === ticketId);
        }
    },
    computed() {

    },
    created() {
        console.log('Received id:', this.$route.params.id);
        const id = parseInt(this.$route.params.id);
        this.ticket = this.getTicketDetails(id);
        return this.ticket;
    }

};
</script>
<style lang="scss" scoped>
@import "@/assets/scss/baseAndMixin.scss";
@import "@/assets/scss/page/ticketinfo.scss";
</style>
