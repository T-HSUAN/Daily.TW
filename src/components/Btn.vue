<template>
<button class="btn">{{ btnTexts }}</button>
</template>

<script>
export default {
    name: 'btn',
    props: {
        btnTexts:{
            default:'#按鈕',
        }
    }
} 
</script>

<style>
</style>

<!-- 使用方法-->
<!-- 在 template 裡放 <btn :btnTexts="你想要參照的key"></btn> -->
<!-- 改變單個標籤的內容 -->
<!-- 在 data() return 的地方確認有 "你想要參照的key":"你想要參照的value" -->