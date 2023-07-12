<!-- home的內容區塊 -->
<template>
  <main>
    <div class="home">
    <!-- <img alt="Vue logo" src="../assets/logo.png"> -->
    <HelloWorld :sectionTitle="title" sectionBg="defalt"/>
    <!-- <HelloWorld sctionTitle="Welcome to Your Vue.js App"  sectionBg="gray"/>
    <HelloWorld sctionTitle="sction 2" sectionBg="red"/> -->
  </div>
  </main>

</template>

<script>
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue'

export default {
  components: {
    HelloWorld
  },
  data(){
    return {
       title: '歡迎光臨日日旅著'
    }
  }
}
</script>