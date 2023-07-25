<template>
    <div class="sidenav">
        <ul>
            <li>
                <div class="sidenav_icon">
                    <div class="icon_box">
                        <font-awesome-icon
                            icon="fa-solid fa-user"
                            class="icon_img"
                        />
                    </div>
                </div>
                <div class="sidenav_title">
                    <h4>帳號管理</h4>
                    <router-link to="/member_info" class="sidenav_subtitle"
                        >個人資料修改</router-link
                    >
                    <router-link to="/member_psw" class="sidenav_subtitle"
                        >密碼修改</router-link
                    >
                </div>
            </li>
            <li>
                <div class="sidenav_icon">
                    <div class="icon_box">
                        <font-awesome-icon
                            icon="fa-solid fa-shirt"
                            class="icon_img"
                        />
                    </div>
                </div>
                <div class="sidenav_title">
                    <h4>穿搭管理</h4>
                    <router-link to="/member_oott" class="sidenav_subtitle"
                        >我的穿搭</router-link
                    >
                </div>
            </li>
            <li>
                <div class="sidenav_icon">
                    <div class="icon_box">
                        <font-awesome-icon
                            icon="fa-solid fa-heart"
                            class="icon_img"
                        />
                    </div>
                </div>
                <div class="sidenav_title">
                    <h4>收藏管理</h4>
                    <router-link to="/member_like_trip" class="sidenav_subtitle"
                        >行程收藏</router-link
                    >
                    <router-link to="/member_like_oott" class="sidenav_subtitle"
                        >穿搭收藏</router-link
                    >
                </div>
            </li>
            <li>
                <div class="sidenav_icon">
                    <div class="icon_box">
                        <font-awesome-icon
                            icon="fa-solid fa-bag-shopping"
                            class="icon_img"
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
