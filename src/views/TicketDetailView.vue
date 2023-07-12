<template>
    <!-- {{ $route.params.id }} -->
    <div v-if="ticketData">
        <img :src="ticketData.img" alt="" />
        <p>{{ ticketData.Name }}</p>
        <p>{{ ticketData.description }}</p>
        <p>NT$ {{ ticketData.price }}</p>
        <!-- <span>{{ ticketData.count}}</span> -->
    </div>
    <div v-else>Loading...</div>
</template>
<script>
export default {
    data() {
        return {
            ticketData: null,
        }
    }
};
</script>
<style lang="scss">
img {
    width: 300px;
}
</style>
