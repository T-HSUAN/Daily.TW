<template>
    <div class="sidenav">
        <ul>
            <li @click="toggleSubtitle('member')">
                <div class="sidenav_icon">
                    <div class="icon_box">
                        <img src="~@/assets/img/sidenav_icon_member.svg" alt="">
                    </div>
                </div>
                <div class="sidenav_title">
                    <h4>帳號管理</h4>
                    <div class="sidenav_subtitle_wrap" v-if="showSubtitle.member">
                        <router-link to="/member_info" class="sidenav_subtitle">個人資料修改</router-link>
                        <router-link to="/member_psw" class="sidenav_subtitle">密碼修改</router-link>
                    </div>
                </div>
            </li>
            <li @click="toggleSubtitle('oott')">
                <div class="sidenav_icon">
                    <div class="icon_box">
                        <img src="~@/assets/img/sidenav_icon_oott.svg" alt="">
                    </div>
                </div>
                <div class="sidenav_title">
                    <h4>穿搭管理</h4>
                    <div class="sidenav_subtitle_wrap" v-if="showSubtitle.oott">
                        <router-link to="/member_oott" class="sidenav_subtitle">我的穿搭</router-link>
                    </div>
                </div>
            </li>
            <li @click="toggleSubtitle('like')">
                <div class="sidenav_icon">
                    <div class="icon_box">
                        <img src="~@/assets/img/sidenav_icon_like.svg" alt="">
                    </div>
                </div>
                <div class="sidenav_title">
                    <h4>收藏管理</h4>
                    <div class="sidenav_subtitle_wrap" v-if="showSubtitle.like">
                        <router-link to="/member_like_trip" class="sidenav_subtitle">行程收藏</router-link>
                        <router-link to="/member_like_oott" class="sidenav_subtitle">穿搭收藏</router-link>
                    </div>
                </div>
            </li>
            <li @click="toggleSubtitle('order')">
                <div class="sidenav_icon">
                    <div class="icon_box">
                        <img src="~@/assets/img/sidenav_icon_order.svg" alt="">
                    </div>
                </div>
                <div class="sidenav_title">
                    <h4>訂單紀錄</h4>
                    <div class="sidenav_subtitle_wrap" v-if="showSubtitle.order">
                        <router-link to="/member_order" class="sidenav_subtitle">我的訂單</router-link>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default{
    data(){
        return{
            showSubtitle: {
                member: true,
                oott: true,
                like: true,
                order: true,
            },
            windowWidth: 0,
        };
    },
    mounted() {
        this.windowWidth =  window.innerWidth;
        window.addEventListener("resize", this.resizeHandler);
    },
    unmounted() {
        window.removeEventListener("resize", this.resizeHandler);
    },
    methods: {
        resizeHandler(e){
            this.windowWidth =  window.innerWidth;
        },
        toggleSubtitle(key){
            if (this.windowWidth > 767){
                return;
            }
            this.showSubtitle[key] = !this.showSubtitle[key];
        },
    }
}
</script>

<style lang="scss">
</style>