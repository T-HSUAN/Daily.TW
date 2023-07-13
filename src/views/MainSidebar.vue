<template>
    <div class="sidebar" :class="{ active: sidebarOpen }">
        <button @click="closeSidebar">X</button>
        <div class="sidebar_content">
            <h6>購物車</h6>
            <div></div>
        </div>
    </div>
</template>

<script>
export default {
    //props:從父層繼承的屬性，key為sidebarOpen，型態為Boolean
    props: {
        sidebarOpen: Boolean,
    },
    methods: {
        //點擊button觸發的event
        closeSidebar() {
            // emit: 觸發父層的function或js
            // 這個還沒教
            this.$emit("close");
        },
    },
};
</script>

<style lang="scss" scoped>
// 加了scoped就只會在這一個vue裡面才作用
.sidebar {
    box-sizing: border-box;
    position: absolute;
    width: 15rem;
    height: 100vh;
    right: -15rem;
    top: 0;
    z-index: 100;
    background-color: #fff;
    padding: 1rem;
    transition: right 1s ease-in-out;
    text-align: right;
    &.active {
        right: 0;
    }

    button {
        width: 2rem;
        height: 2rem;
        border-radius: 2rem;
    }
    &_content {
        text-align: left;
    }
}
</style>
