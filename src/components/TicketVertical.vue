<template>
    <div class="ticketVertical_container">
        <img
            :src="require('@/assets/img/ticketExample.png')"
            alt="斑比山丘門票"
        />
        <div class="ticket_text">
            <h3 class="ticket_title">{{ ticketTitle }}</h3>
            <span class="ticket_tags">{{ ticketTags }}</span>
            <div class="ticket_price">
                <span>{{ originalPrice }}</span>
                <span>{{ FinalPrice }}</span>
            </div>
            <button class="btn add_cart" @click="createItem(index)">
                + 加入購物車
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        ticketTitle: {
            default: "票券標題",
        },
        ticketTags: {
            default: "票券標籤",
        },
        originalPrice: {
            default: "原價",
        },
        FinalPrice: {
            default: "售價",
        },
    },
};
</script>

<style></style>
