<template>
    <footer id="mainFooter">
        <div class="footer_section">
            <div class="footer_block">
                <div class="footer_list">
                    <router-link to="/plan">
                        <h4>專屬旅著</h4>
                    </router-link>
                    <router-link to="/plan">立即規劃</router-link>
                </div>
                <div class="footer_list">
                    <router-link to="/trip">
                        <h4>出遊特輯</h4>
                    </router-link>
                    <router-link to="/trip">熱門行程</router-link>
                    <router-link to="/trip">精選行程</router-link>
                    <router-link to="/trip_overview">行程總覽</router-link>
                </div>
                <div class="footer_list">
                    <router-link to="/oott">
                        <h4>穿搭特輯</h4>
                    </router-link>
                    <router-link to="/oott">主題穿搭</router-link>
                    <router-link to="/oott">人氣穿搭</router-link>
                    <router-link to="/oott_overview">穿搭總覽</router-link>
                </div>
                <div class="footer_list">
                    <router-link to="/ticket">
                        <h4>景點票券</h4>
                    </router-link>
                    <router-link to="/ticket">票券總覽</router-link>
                </div>
                <div class="footer_list">
                    <router-link to="/about">
                        <h4>關於我們</h4>
                    </router-link>
                    <router-link to="/about">服務介紹</router-link>
                    <router-link to="/about">聯絡我們</router-link>
                </div>
            </div>
            <div class="social_box">
                <div class="social_icon">
                    <p>獲得最新行程&穿搭靈感</p>
                    <div class="icon_wrap">
                        <a href="#"><font-awesome-icon icon="fa-brands fa-line" /></a>
                        <a href="#"><font-awesome-icon icon="fa-brands fa-square-facebook" /></a>
                        <a href="#"><font-awesome-icon icon="fa-brands fa-instagram" /></a>
                    </div>
                </div>
                <form ref="form" @submit.prevent="sendEmail" class="input_group">
                    <button class="input_arrow" @click="sendEmail"></button>
                <input class="footer_input" type="text" v-model="email" placeholder="請輸入email"
                name="email" />
            </form>
            </div>
        </div>
        <div class="footer_notice">
            <p>
                本網站為緯育 TibaMe 前端設計工程師班第 83
                期學員專題成果作品，本平台僅供學習、展示之用。<br />若有抵觸有關著作權，或有第三人主張侵害智慧財產權等情事，均由學員負法律上責任，緯育公司概不負責。<br />若有侵權疑慮，您可以私訊<a
                    href="https://www.facebook.com/TibaMe">「緯育TibaMe」</a>，後續會由專人協助處理。<br />Copyright
                © 2023 Daily.TW
            </p>
        </div>
        <!-- 成功送出郵件後的彈窗 -->
        <div class="member_sm" v-if="isPopBoxVisible">
            <div class="block">
                <div class="pic">
                    <img src="~@/assets/img/popbox_check.svg" alt="">
                    <h3>信件已送出，請至信箱查看！</h3>
                </div>
                <button class="btn" @click="closePopBox">確定</button>
            </div>
        </div>
        <!-- 寄送失敗後的彈窗 -->
        <div class="member_sm" v-if="isPopBoxFalse">
            <div class="block">
                <div class="pic">
                    <img src="~@/assets/img/popbox_exclamation.svg" alt="">
                    <h3>EMAIL信箱不能為空白</h3>
                </div>
                <button class="btn" @click="closePopBox">確定</button>
            </div>
        </div>
    </footer>
</template>

<script>
import emailjs from 'emailjs-com';

export default {
    data() {
        return {
            email: "",
            isPopBoxVisible: false,
            isPopBoxFalse: false,
        };
    },

    methods:{
        sendEmail() {  
        if (this.email === '') {

            this.isPopBoxFalse = true;
        } else {

            emailjs.sendForm('daily', 'daily', this.$refs.form, 'av3wEk3CDkczylGAe')
                .then((result) => {
                    // 信件成功送出，設定 isPopBoxVisible 為 true，顯示彈窗
                    this.isPopBoxVisible = true;
                })
                .catch((error) => {
                    this.isPopBoxVisible = false;
                    alert('信件未送出，請稍後再試');
                });
        }
    },
    closePopBox() {
            this.isPopBoxVisible = false;
            this.isPopBoxFalse = false,
                this.email = '';
        },
    }
};
</script>

<style lang="scss" scoped>
@import "@/assets/scss/baseAndMixin.scss";
</style>
