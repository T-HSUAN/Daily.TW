<template>
    <MainHeader></MainHeader>
    <main>
      <router-view />

    </main>
    <ArrowUp></ArrowUp>
    <MainFooter></MainFooter>
</template>


<script>
import MainHeader from "@/components/MainHeader.vue";
import MainFooter from "@/components/MainFooter.vue";
import ArrowUp from "@/components/ArrowUp.vue";



export default {
  components: {
    MainHeader,
    MainFooter,
    ArrowUp,

},
data() {
  return {
    }
  }
};
</script>

<style lang="scss">
// @import url('./assets/scss/main.scss');
// @import './assets/scss/main.scss';
@import "@/assets/scss/main.scss";
</style>
