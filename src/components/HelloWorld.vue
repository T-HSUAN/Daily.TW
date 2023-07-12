<!-- main網站內容 -->
<template>
    <section :class="sectionBg">
        <h1>{{ sectionTitle }}</h1>

        <!-- {{ sectionBg }} -->
    </section>
</template>

<script>
export default {
    props: {
        sectionTitle: String,
        sectionBg: String,
    },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
section {
    //垂直置中
    display: flex;
    justify-content: center;
    align-items: center;

    color: #6a5d4a;
    height: 100vh;
    //預設底色
    background-color: #fff6e3;
    &.red {
        background-color: rgb(126, 35, 35);
    }
    &.black {
        background-color: rgb(8, 8, 8);
    }
    &.grayGreen {
        color: #333;
        background-color: rgb(165, 178, 166);
    }
}
</style>
