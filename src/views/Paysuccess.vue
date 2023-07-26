<template>
    <div class="paysucess_page">
        <div class="msg">
            <h1>付款成功&nbsp;<img src="@/assets/img/popbox_check.svg" alt="paySuccess"></h1>
            <p>票券將於<span> 7個工作天 </span>內寄出</p>
            <p>請留意訂單狀態，謝謝！</p>
            <router-link to="/myorder"><button class="btn">我的訂單</button></router-link>
            <img class="duck" src="@/assets/img/duck_paysuccess.png" alt="" />
            <img class="trace" src="@/assets/img/duck_trace3.png" alt="" />
        </div>
    </div>
</template>
<style lang="scss">
@import "@/assets/scss/baseAndMixin.scss";

.paysucess_page {
    width: 100%;

    .msg {
        width: 100%;
        margin: 100px auto;
        padding: 0 $sp10;
        display: flex;
        flex-direction: column;
        align-items: center;

        h1 {
            @include sm_h2;
            text-align: center;
            margin: 40px auto;
        }

        p {
            font-size: 20px;
            text-align: center;
            margin: 16px auto;

            span {
                color: red;
            }
        }

        .btn {
            margin: 24px;
        }

        .duck {
            width: 150px;
            position: relative;
            left: -150px;
            right: 0;
            bottom: 100px;
            margin: 0 auto;
            animation: shake 4s ease-in-out infinite;

            @keyframes shake {
                0% {
                    transform: rotate(0);
                }

                25% {
                    transform: rotate(-10deg);
                }

                50% {
                    transform: rotate(10deg);
                }

                75% {
                    transform: rotate(-10deg);
                }

                100% {
                    transform: rotate(0);
                }
            }
        }

        .trace {
            position: relative;
            width: 250px;
            left: 30px;
            right: 0;
            bottom: 90px;
            margin: 0 auto;
        }
    }
}

@media all and (min-width: $md) {
    .paysucess_page {
        width: 100%;

        .msg {
            width: 100%;
            margin: 100px auto;

            h1 {
                @include xl_h2;
                text-align: center;
                margin: 40px auto;

                img {
                    width: 40px;
                }
            }

            p {
                font-size: 24px;
                text-align: center;
                margin: 20px auto;

                span {
                    color: $default_red;
                }
            }

            .btn {
                margin: 28px;
            }

            .duck {
                width: 180px;
                left: -250px;
                right: 0;
                bottom: 140px;
                margin: 0 auto;
                animation: shake 4s ease-in-out infinite;
            }

            .trace {
                width: 350px;
                left: 10px;
                right: 0;
                bottom: 120px;
                margin: 0 auto;
            }
        }
    }

    @media all and (min-width: $xl) {
        .paysucess_page {
            .msg {
                .duck {
                    width: 250px;
                    left: -300px;
                    right: 0;
                    bottom: 250px;
                    margin: 0 auto;
                    animation: shake 4s ease-in-out infinite;
                }

                .trace {
                    width: 500px;
                    left: 10px;
                    right: 0;
                    bottom: 200px;
                    margin: 0 auto;
                }
            }
        }
    }
}
</style>
