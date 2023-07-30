<!-- 舊版header 先不刪 -->
<template>
    <!-- 768px以下顯示側邊欄 -->
    <div class="container_box">
        <!-- 手機版 -->
        <header v-if="viewportWidth < 768" class="phone">
            <!-- logo -->
            <router-link to="/" @click="homeClick">
                <img class="logo" :src="require('@/assets/img/layout/small.svg')" alt="logo" />
            </router-link>
            <!-- 漢堡條 -->
            <img class="ham" :src="require('@/assets/img/layout/hamburger.svg')" alt="hamburger" @click="toggleSidebar" />
        </header>
        <!-- 漢堡nav -->
        <aside v-if="viewportWidth < 768" :class="{ 'show-sidebar': showSidebar }">
            <img class="ham_close" :src="require('@/assets/img/layout/hamburger_close.svg')" alt="hamburger"
                @click="toggleSidebar" />
            <nav>
                <router-link v-for="item in menu" :key="item.id" :to="'/' + item.link" @click="flagDisplay(item.id)">
                    <img :src="require(`@/assets/img/layout/${item.img}.svg`)" alt="icon"
                        :style="{ display: item.display }" />
                    &nbsp;{{ item.name }}
                </router-link>
            </nav>
            <img class="sidebar_logo" :src="require('@/assets/img/layout/sidebar_logo.svg')" alt="logo" />
        </aside>

        <!-- 768px以上顯示header -->
        <header v-else :class="{ sm: showHeader }">
            <div v-if="!showHeader" class="header_default">
                <!-- + { _hidden: !showHeader } -->
                <router-link to="/" @click="homeClick">
                    <img class="logo" :src="require('@/assets/img/layout/logo.png')" alt="logo" />
                </router-link>
                <!-- nav選單 -->
                <nav>
                    <router-link v-for="item in menu" :key="item.id" :to="'/' + item.link" @click="flagDisplay(item.id)">
                        <img :src="require(`@/assets/img/layout/${item.img}.svg`)
                            " alt="icon" :style="{ display: item.display }" />
                        &nbsp;{{ item.name }}
                    </router-link>
                </nav>
            </div>
            <!-- 小nav -->
            <div v-else class="header_sm">
                <!-- + { _display: showHeader } -->
                <router-link to="/" @click="homeClick">
                    <img class="logo" :src="require('@/assets/img/layout/small.svg')" alt="logo" />
                </router-link>
                <nav>
                    <router-link v-for=" item in menu" :key="item.id" :to="'/' + item.link" @click="flagDisplay(item.id)">
                        <img :src="require(`@/assets/img/layout/${item.img}.svg`)
                            " alt="icon" :style="{ display: item.display }" />
                        &nbsp;{{ item.name }}
                    </router-link>
                </nav>
            </div>
        </header>
    </div>
</template>

<script>
export default {
    data() {
        return {
            menu: [
                {
                    id: 1,
                    name: "專屬旅著",
                    link: "plan",
                    img: "flag_plan",
                    display: "none",
                },
                {
                    id: 2,
                    name: "出遊特輯",
                    link: "trip",
                    img: "flag_trip",
                    display: "none",
                },
                {
                    id: 3,
                    name: "穿搭特輯",
                    link: "oott",
                    img: "flag_oott",
                    display: "none",
                },
                {
                    id: 4,
                    name: "景點票券",
                    link: "ticket",
                    img: "flag_ticket",
                    display: "none",
                },
                {
                    id: 5,
                    name: "關於我們",
                    link: "about",
                    img: "flag_about",
                    display: "none",
                },

                {
                    id: 6,
                    name: "登入|註冊",
                    link: "login",
                    img: "flag_login-reg",
                    display: "none",
                },
            ],
            showHeader: true,
            showSidebar: false, // 新增側邊欄顯示狀態
            viewportWidth: 0, // 用來存儲視窗寬度
        };
    },
    methods: {
        handleScroll() {
            this.showHeader = window.scrollY > 0;
        },
        flagDisplay(itemId) {
            this.menu.forEach((item) => {
                if (item.id === itemId) {
                    item.display = "block";
                } else {
                    item.display = "none";
                }
            });
            this.saveMenuState();
        },
        homeClick() {
            this.menu.forEach((item) => {
                item.display = "none";
            });
            this.saveMenuState();
        },
        saveMenuState() {
            // 使用LocalStorage保存菜单状态
            sessionStorage.setItem('menuState', JSON.stringify(this.menu));
        },
        loadMenuState() {
            // 从LocalStorage中加载菜单状态
            const savedMenuState = sessionStorage.getItem('menuState');
            if (savedMenuState) {
                this.menu = JSON.parse(savedMenuState);
            } else {
                // 如果LocalStorage中没有保存的菜单状态，则初始化为初始状态
                this.menu.forEach((item) => {
                    item.display = "none";
                })
            }
        },
        handleResize() {
            this.viewportWidth = window.innerWidth;
        },
        toggleSidebar() {
            this.showSidebar = !this.showSidebar;
        },
    },
    mounted() {
        window.addEventListener("scroll", this.handleScroll);
        this.handleScroll();
        window.addEventListener("resize", this.handleResize);
        this.handleResize();
        this.loadMenuState();
    },
    beforeDestroy() {
        window.removeEventListener("scroll", this.handleScroll);
        window.removeEventListener("resize", this.handleResize);
    },
};
</script>

<style lang="scss">
@import "@/assets/scss/baseAndMixin.scss";

.container_box {
    height: 75px;
    background: linear-gradient(180deg,
            $bgColor_default 59.9%,
            rgba(254, 240, 209, 0) 100%);

    @media (min-width: 768px) {
        height: 190px;
    }
}

header {
    display: none;
}

// header手機版
.phone {
    position: fixed;
    display: block;
    @include width(100);
    height: 75px;
    z-index: 99;
    background: linear-gradient(180deg,
            $bgColor_default,
            rgba(254, 240, 209, 0));
    display: flex;
    justify-content: space-between;

    a {
        display: inline-flex;
        align-items: center;

        .logo {
            width: 160px;
            margin: 0 $sp4;
        }
    }

    .ham {
        width: 40px;
        margin: 0 $sp4;
        cursor: pointer;
    }
}

// 768 up
@media screen and (min-width: $md) {
    header {
        display: block;
        background: linear-gradient(180deg,
                $bgColor_default 59.9%,
                rgba(254, 240, 209, 0) 100%);

        .header_default {
            display: flex;
            justify-content: space-between;
            align-items: start;
            width: 100%;
            max-width: 1200px;
            height: 200px;
            padding-top: $sp4;
            margin: 0 auto;
            z-index: 99;

            //logo
            a {
                .logo {
                    width: 130px;
                    margin-left: $sp2;

                    @media screen and (min-width: 1024px) {
                        width: 190px;
                        margin: 0 $sp4;
                    }
                }
            }

            nav {
                box-sizing: border-box;
                display: flex;
                padding-right: $sp2;

                a {
                    width: 92px;
                    display: flex;
                    justify-content: end;
                    margin-left: $sp1;
                    font-size: 16px;
                    text-align: center;
                    color: $textColor_default;

                    @media screen and (min-width: 1024px) {
                        width: 110px;
                        justify-content: start;
                        margin-left: $sp2;
                        font-size: 20px;

                        img {
                            width: 20px;
                        }
                    }

                    img {
                        width: 16px;
                    }

                    &.router-link-exact-active {
                        color: $default_yellow;
                    }
                }
            }
        }

        main {
            margin-top: 75px;
        }

        .header_sm {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            max-width: 1200px;
            height: 100px;
            background: linear-gradient(180deg,
                    $bgColor_default 59.9%,
                    rgba(254, 240, 209, 0) 100%);

            //logo
            a {
                .logo {
                    width: 200px;
                    margin: 0 $sp4;
                }
            }

            nav {
                display: flex;

                a {
                    display: flex;
                    margin-right: $sp3;
                    font-size: 16px;
                    color: $textColor_default;

                    img {
                        display: none;
                        width: 20px;
                    }

                    &.router-link-exact-active {
                        color: $default_yellow;

                        img {
                            display: block;
                        }
                    }
                }
            }

            &_display {
                display: block;
            }
        }
    }

    //header sm版
    .sm {
        position: fixed;
        top: 0;
        width: 100%;
        height: 100px;
        background: linear-gradient(180deg,
                $bgColor_default 59.9%,
                rgba(254, 240, 209, 0) 100%);
        z-index: 99;
    }

    //header phone版
    .phone {
        display: none;
    }
}

/* 新增側邊欄樣式 */
aside {
    width: 250px;
    height: 600px;
    // border: 1px solid $textColor_default;
    flex-direction: column;
    border-radius: 50px 0 0 0;
    box-shadow: 0 2px 3px 3px #0005;
    background-color: $tint_yellow;
    position: fixed;
    top: 0;
    right: -100%;
    transition: left .8s ease-in-out;
    box-sizing: border-box;
}

.show-sidebar {
    right: 0;
    z-index: 100;

    .ham_close {
        width: 25px;
        padding: 5px;
        position: absolute;
        right: 20px;
        top: 10px;
        border: 1px solid $textColor_default;
        border-radius: 50px;
    }

    nav {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 75px;

        a {
            font-size: $sm_h4;
            color: $textColor_default;
            padding: 10px;
            display: flex;
            text-align: center;
        }
    }

    .sidebar_logo {
        padding-top: $sp9;
        display: flex;
        margin: auto;
    }
}
</style>
