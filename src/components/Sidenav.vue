<template>
    <div class="sidenav">
        <ul>
            <li @click="toggleSubtitle('member')">
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
                        v-if="showSubtitle.member"
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
            <li @click="toggleSubtitle('oott')">
                <div class="sidenav_icon">
                    <div class="icon_box">
                        <img src="~@/assets/img/sidenav_icon_oott.svg" alt="" />
                    </div>
                </div>
                <div class="sidenav_title">
                    <h4>穿搭管理</h4>
                    <div class="sidenav_subtitle_wrap" v-if="showSubtitle.oott">
                        <router-link to="/my_oott" class="sidenav_subtitle"
                            >我的穿搭</router-link
                        >
                    </div>
                </div>
            </li>
            <li @click="toggleSubtitle('like')">
                <div class="sidenav_icon">
                    <div class="icon_box">
                        <img src="~@/assets/img/sidenav_icon_like.svg" alt="" />
                    </div>
                </div>
                <div class="sidenav_title">
                    <h4>收藏管理</h4>
                    <div class="sidenav_subtitle_wrap" v-if="showSubtitle.like">
                        <router-link
                            to="/trip_collection_view"
                            class="sidenav_subtitle"
                            >行程收藏</router-link
                        >
                        <router-link
                            to="/oott_collection_view"
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
                    <div class="sidenav_subtitle_wrap" v-if="showSubtitle.order">
                        <router-link to="/member_order" class="sidenav_subtitle"
                        >我的訂單</router-link
                    >
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            showSubtitle : {
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
        // Set the initial showSubtitle values based on the window's width
        this.updateShowSubtitle();
    },
    unmounted() {
        window.removeEventListener("resize", this.resizeHandler);
    },
    methods: {
        resizeHandler(e){
            this.windowWidth =  window.innerWidth;
            this.updateShowSubtitle(); // Update showSubtitle when window is resized
        },
        toggleSubtitle(key){
            if (this.windowWidth > 767){
                return;
            }
            this.showSubtitle[key] = !this.showSubtitle[key];
        },
        updateShowSubtitle() {
            // Set all the showSubtitle values to false when the window's width is less than 768px
            if (this.windowWidth < 768) {
                for (const key in this.showSubtitle) {
                    this.showSubtitle[key] = false;
                }
            } else {
                // Restore the original values when the window's width is greater than or equal to 768px
                this.showSubtitle = {
                    member: true,
                    oott: true,
                    like: true,
                    order: true,
                };
            }
        },
    },
};
</script>

<style lang="scss"></style>
