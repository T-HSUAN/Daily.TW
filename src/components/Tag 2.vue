<template>
    <label v-for="item in tagTexts" :key="item">
        <input type="checkbox" class="tag" />
        <span>{{ item.default }}</span>
    </label>
</template>

<script>
export default {
    name: "tag",
    props: {
        tagTexts: {
            type: String,
            default: "#標籤",
        },
    },
};
</script>

<!-- 使用方法-->
<!-- 建議複製 template 跟套用scss style 就好，因為每個 tag 可能會連到不同的資料庫表單。  -->

<style>
label {
    width: 92px;
    height: 45px;
}
</style>
