<template>
    <div class="sidenav">
        <ul>
            <li @click="showSubtitleMember = !showSubtitleMember">
                <div class="sidenav_icon">
                    <div class="icon_box">
                        <img
                            src="~@/assets/img/sidenav_icon_member.svg"
                            alt=""
                        />
                    </div>
                </div>
                <div class="sidenav_title">
                    <h4>帳號管理</h4>
                    <div
                        class="sidenav_subtitle_wrap"
                        v-if="showSubtitleMember"
                    >
                        <router-link to="/member_info" class="sidenav_subtitle"
                            >個人資料修改</router-link
                        >
                        <router-link to="/member_psw" class="sidenav_subtitle"
                            >密碼修改</router-link
                        >
                    </div>
                </div>
            </li>
            <li @click="showSubtitleOott = !showSubtitleOott">
                <div class="sidenav_icon">
                    <div class="icon_box">
                        <img src="~@/assets/img/sidenav_icon_oott.svg" alt="" />
                    </div>
                </div>
                <div class="sidenav_title">
                    <h4>穿搭管理</h4>
                    <div class="sidenav_subtitle_wrap" v-if="showSubtitleOott">
                        <router-link to="/member_oott" class="sidenav_subtitle"
                            >我的穿搭</router-link
                        >
                    </div>
                </div>
            </li>
            <li @click="showSubtitleLike = !showSubtitleLike">
                <div class="sidenav_icon">
                    <div class="icon_box">
                        <img src="~@/assets/img/sidenav_icon_like.svg" alt="" />
                    </div>
                </div>
                <div class="sidenav_title">
                    <h4>收藏管理</h4>
                    <div class="sidenav_subtitle_wrap" v-if="showSubtitleLike">
                        <router-link
                            to="/member_like_trip"
                            class="sidenav_subtitle"
                            >行程收藏</router-link
                        >
                        <router-link
                            to="/member_like_oott"
                            class="sidenav_subtitle"
                            >穿搭收藏</router-link
                        >
                    </div>
                </div>
            </li>
            <li @click="toggleSubtitle('order')">
                <div class="sidenav_icon">
                    <div class="icon_box">
                        <img
                            src="~@/assets/img/sidenav_icon_order.svg"
                            alt=""
                        />
                    </div>
                </div>
                <div class="sidenav_title">
                    <h4>訂單紀錄</h4>
                    <router-link to="/member_order" class="sidenav_subtitle"
                        >我的訂單</router-link
                    >
                </div>
            </li>
        </ul>
    </div>
</template>

<script></script>

<style lang="scss">
@import "@/assets/scss/baseAndMixin.scss";
</style>
