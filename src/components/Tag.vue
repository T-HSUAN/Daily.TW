<template>
    <label>
    <input type="checkbox" class="tag">
    <span>{{ tagTexts }}</span>
    </label>  
</template>

<script>
export default {
    name: 'tag',
    props: {
        tagTexts:{
            type:String,
            default:'#標籤',
        }
    }
} 
</script>

<!-- 使用方法-->
<!-- 在 template 裡放 <Tag :tagTexts="你想要參照的key"></Tag> -->
<!-- 改變單個標籤的內容 -->
<!-- 在 data() return 的地方確認有 "你想要參照的key":"你想要參照的value" -->



<style>
</style>