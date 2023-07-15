<!-- 會員填寫資料頁面 -->
<template>
    <section class="canvas">
        <label for="email" v-for="(item, index) in tabItems " :key="index" >
            {{ item }}
        </label>
        <input type="email" v-model="email" />
    </section>

</template>

<script>
export default{
    data(){
        return{
            tabItems:{
                1:{
                    item:'Email',
                    text:'請輸入EMAIL'
                }
            }
        }
    }
}
</script>

<style lang="scss" scoped>
    @import '@/assets/scss/main.scss';
    .canvas{
        width: 100%;
      display: flex;
      justify-content: center;
      margin: 100px auto;
    }
</style>