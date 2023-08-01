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
<!-- 建議直接套用 CSS 就好 -->