<!-- 重設密碼完成頁面 -->
<template>
    <section class="reset">
        <section class="resetpsw">

            <div class="canvas">
                <div class="joinus_sm">
                    <img src="@/assets/img/joinus_sm.png" alt="joinus">
                </div>
                <div class="resetcard">
                    <h2>修改成功</h2>
                    <p>請至信箱驗證並修改密碼</p>
                    <p>請返回重新登入</p>
                    <div class="space"></div>
                    <button type="button" class="btn" @click="returnLogin">返回會員登入</button>

                </div>
                <div class="register">
                    <h2>Reset Success！</h2>
                    <div class="joinus_md">
                        <img src="../assets/img/reset_md.png" alt="">
                    </div>
                    <div class="welcome">We really appreciate all your effort.</div>
                </div>
            </div>


        </section>
    </section>
</template>
<script>
export default {
    methods: {
        returnLogin() {
            this.$router.push('/login')
        }
    }
}
</script>
<style lang="scss" scoped>
@import '@/assets/scss/baseAndMixin.scss';

// *{
//     outline: 1px solid red;
// }


.reset {
    padding-top: 74px;

    @media all and (min-width: $md) {
        padding-top: 200px;

    }

    .resetpsw {
        margin: 150px 0 60px;

        @media all and (min-width: $md) {
            margin: 130px 0;
        }

        .canvas {
            width: 83%;
            background-color: $default_yellow;
            margin: auto;
            border-radius: $sp3;
            position: relative;
            z-index: 2;

            @media all and (min-width: $md) {
                max-width: 1000px;
                display: flex;
                justify-content: center;
                margin: $sp10 auto;
            }

            .joinus_sm {
                position: absolute;
                top: -130px;
                width: 150px;
                left: 50%;
                transform: translateX(-50%);
                overflow: hidden;

                @media all and (min-width: $md) {
                    display: none;
                }

                img {
                    display: block;
                    height: 100%;
                    width: 100%;
                    object-fit: cover;
                }
            }

            .resetcard {
                padding: $sp8 $sp3;
                display: flex;
                flex-direction: column;
                align-items: center;

                @media all and (min-width: $md) {
                    width: 50%;
                    border-right: 2px solid $textColor_white;
                    padding: $sp6 0;
                }

                h2 {
                    color: $textColor_white;
                    font-size: $sm_h2;
                    padding: 0 0 $sp5;
                    font-weight: 900;
                    line-height: 150%;

                    /* 42px */
                    @media all and (min-width: $md) {
                        font-size: $xl_h2;
                        padding: 0 0 110px;
                    }
                }

                p {
                    padding: 0 0 $sp4;
                }

                @media all and (min-width: $md) {
                    .space {
                        padding-top: 166px;
                    }
                }



            }

            .register {
                display: none;

                @media all and (min-width: $md) {
                    width: 50%;
                    padding: $sp6 0;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    border-radius: 0 $sp3 $sp3 0;

                    h2 {
                        color: $textColor_white;
                        font-size: $xl_h2;
                        padding: 0 0 $sp5;
                        font-weight: 900;
                        letter-spacing: 2px;
                    }

                    p {
                        font-size: $xl_h4;
                        color: $textColor_white;
                        font-weight: 700;
                        letter-spacing: 0.72px;
                    }

                    .joinus_md {
                        width: 300px;
                        overflow: hidden;
                        margin: $sp4 0 $sp10;

                        img {
                            display: block;
                            height: 100%;
                            width: 100%;
                            object-fit: cover;
                        }
                    }

                    .welcome {
                        font-size: $xl_h4;
                        color: $textColor_white;
                    }
                }
            }

        }




    }
}
</style>