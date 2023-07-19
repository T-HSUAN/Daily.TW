<template>
    <footer id="mainFooter">
        <div class="footer_section">
            <div class="footer_block">
                <div class="footer_list">
                    <h4>專屬旅著</h4>
                    <a href="#">立即規劃</a>
                </div>
                <div class="footer_list">
                    <h4>出遊特輯</h4>
                    <a href="#">熱門行程</a>
                    <a href="#">精選行程</a>
                    <a href="#">行程總覽</a>
                </div>
                <div class="footer_list">
                    <h4>穿搭特輯</h4>
                    <a href="#">主題穿搭</a>
                    <a href="#">人氣穿搭</a>
                    <a href="#">穿搭總覽</a>
                </div>
                <div class="footer_list">
                    <h4>景點票券</h4>
                    <a href="#">票券總覽</a>
                </div>
                <div class="footer_list">
                    <h4>關於我們</h4>
                    <a href="#">服務介紹</a>
                    <a href="#">聯絡我們</a>
                </div>
            </div>
            <div class="social_box">
                <div class="social_icon">
                    <p>獲得最新行程&穿搭靈感</p>
                    <a href="#"><font-awesome-icon icon="fa-brands fa-line" /></a>
                    <a href=""><font-awesome-icon icon="fa-brands fa-instagram" /></a>
                    <a href=""><font-awesome-icon icon="fa-brands fa-square-facebook" /></a>
                </div>
                <input class="footer_input" type="search" v-model="email" placeholder='請輸入-email'>
            </div>
            <div class="social_box_md">
                <p>獲得最新行程&穿搭靈感</p>
                <input class="footer_input" type="search" v-model="email" placeholder='請輸入-email'>
                <div class="social_icon">
                    <a href="#"><font-awesome-icon icon="fa-brands fa-line" /></a>
                    <a href=""><font-awesome-icon icon="fa-brands fa-instagram" /></a>
                    <a href=""><font-awesome-icon icon="fa-brands fa-square-facebook" /></a>
                </div>
            </div>
        </div>
        <div class="footer_notice">
                <p>本網站為緯育 TibaMe 前端設計工程師班第 83 期學員專題成果作品，本平台僅供學習、展示之用。<br>若有抵觸有關著作權，或有第三人主張侵害智慧財產權等情事，均由學員負法律上責任，緯育公司概不負責。<br>若有侵權疑慮，您可以私訊「緯育TibaMe」，後續會由專人協助處理。<br>Copyright © 2023 Daily.TW</p>
        </div>
    </footer>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
@import "@/assets/scss/main.scss";
</style>
