<template>
    <div>
        <font-awesome-icon icon="fa-solid fa-bookmark" />
        <font-awesome-icon icon="fa-solid fa-heart" />
        <font-awesome-icon icon="fa-solid fa-cart-shopping" />
        <font-awesome-icon icon="fa-solid fa-magnifying-glass" />
        <font-awesome-icon icon="fa-brands fa-line" />
        <font-awesome-icon icon="fa-brands fa-instagram" />
        <font-awesome-icon icon="fa-brands fa-square-facebook" />
        <font-awesome-icon icon="fa-solid fa-clock" flip="horizontal" />
        <font-awesome-icon icon="fa-solid fa-location-dot" />
        <font-awesome-icon icon="fa-solid fa-cloud" flip="horizontal" />
        <font-awesome-icon icon="fa-solid fa-eye" />
        <font-awesome-icon icon="fa-solid fa-eye-slash" flip="horizontal" />
        <font-awesome-icon icon="fa-solid fa-circle-xmark" />
    <!-- 在 font-awesome 裡沒有找到單側的箭頭、navbar的按鈕，先放替代的 -->
        <font-awesome-icon icon="fa-solid fa-arrow-left" />
        <font-awesome-icon icon="fa-solid fa-arrow-right" />
        <font-awesome-icon icon="fa-solid fa-arrow-up" />
        <font-awesome-icon icon="fa-solid fa-circle-chevron-down" />
        <font-awesome-icon icon="fa-solid fa-arrow-up-wide-short" />
        <font-awesome-icon icon="fa-solid fa-filter" />
        <font-awesome-icon icon="fa-solid fa-pen" />
        <font-awesome-icon icon="fa-solid fa-trash-can" />
        <font-awesome-icon icon="fa-solid fa-square-plus" />
        <font-awesome-icon icon="fa-solid fa-sort-up" />
        <font-awesome-icon icon="fa-solid fa-sort-down" />
        <font-awesome-icon icon="fa-solid fa-car" />
        <font-awesome-icon icon="fa-solid fa-ticket" />
        <font-awesome-icon icon="fa-solid fa-user" />
        <font-awesome-icon icon="fa-solid fa-user-tie" />
        <font-awesome-icon icon="fa-solid fa-shirt" />
        <font-awesome-icon icon="fa-solid fa-bullhorn" />
        <font-awesome-icon icon="fa-solid fa-bag-shopping" />
<!-- 
        <font-awesome-icon :icon="`fa-solid fa-${icon}`" /> -->
        <!-- <FontAwesomeIcons icon="shirt" /> -->
    </div>
</template>

<script>
export default {
    props: {
        icon: {
            type: String,
            default: ""
        }
    },
};
</script>

<style lang="scss" scoped>
</style>    