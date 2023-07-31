<template>
    <div class="cart_sidebar" v-show="togglePage">
        <button @click="closeSidebar">X</button>
        <div>
            <slot name="slotheader"></slot>
            ==========
            <slot name="slotfooter"></slot>
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
        closeSidebar() {
            // emit: 觸發父層的function或js
            this.$emit("close");
        },
        toggleCart() {
            this.togglePage = !this.togglePage;
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
    top: 300px;
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
