<!-- home的內容區塊 -->
<template>
  <main>
    <div class="home">
      <HelloWorld :sectionTitle="title" sectionBg="defalt"/>
    </div>
  </main>
  <!-- <router-view/> -->
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