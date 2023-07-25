<!-- 不知道系統有沒有辦法辨別該用電腦或手機版燈箱，故個版本都有寫
請尋找對應的燈箱根css,都在這邊,請慢用 -->
<template>
    <!-- 會員登入燈箱 -->

    <!-- xl -->
    <div class="member_xl">
        <div class="block">
            <div class="pic">
                <img src="~@/assets/img/popbox_exclamation.svg" alt="" />
                <h1>請先登入會員</h1>
            </div>
            <div class="button">
                <button class="cancel">取消</button>
                <button class="btn">確定</button>
            </div>
        </div>
    </div>

    <!-- sm -->
    <div class="member_sm">
        <div class="block">
            <div class="pic">
                <img src="~@/assets/img/popbox_exclamation.svg" alt="" />
                <h1>請先登入會員</h1>
            </div>
            <div class="button">
                <button class="cancel">取消</button>
                <button class="btn">確定</button>
            </div>
        </div>
    </div>

    <!-- 加入收藏燈箱 -->

    <!-- xl -->
    <div class="like_xl">
        <div class="block">
            <div class="pic">
                <img src="~@/assets/img/popbox_check.svg" alt="" />
                <p>已加入收藏清單</p>
            </div>
        </div>
    </div>

    <!-- sm -->
    <div class="like_sm">
        <div class="block">
            <div class="pic">
                <img src="~@/assets/img/popbox_check.svg" alt="" />
                <p>已加入收藏清單</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style lang="scss">
//popbox

//會員登入xl
.member_xl {
    display: flex;
    width: 410px;
    height: 243px;
    border: 3px solid $textColor_default;
    background-color: $textColor_white;
    border-radius: 20px;
    justify-content: center;

    .block {
        width: 300px;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
        .pic {
            margin-top: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            img {
                width: 34px;
            }
            h1 {
                padding: 10px;
                font-size: $sm_h3;
            }
        }
        .button {
            margin-left: auto;
            .cancel {
                font-size: $xl_h5;
                color: $textColor_default;
                border-bottom: 1px solid $textColor_default;
                margin-right: 20px;
            }
            .btn {
                font-size: $sm_h5;
                padding: 8px 24px;
                box-shadow: 1px 1px 1px 1px #0005;
                @media (min-width: 768px) {
                    font-size: $xl_h5;
                    padding: 8px 32px;
                }
                white-space: nowrap;
                color: $textColor_white;
                text-align: center;
                font-family: $fontFamily;
                letter-spacing: 0.6px;
                display: inline-flex;
                justify-content: center;
                align-items: center;
                gap: 10px;
                border-radius: 50px;
                border: 2px solid $textColor_default;
                background: $textColor_default;
                cursor: pointer;
                &:hover {
                    color: $textColor_default;
                    background: $textColor_white;
                    box-shadow: -2px 2px 4px 0px rgba(0, 0, 0, 0.25);
                }
                &:active {
                    color: $textColor_tint;
                    border: 2px solid $textColor_tint;
                    background: $textColor_white;
                }
            }
        }
    }
}

// sm
.member_sm {
    display: flex;
    width: 273px;
    height: 194px;
    border: 3px solid $textColor_default;
    background-color: $textColor_white;
    border-radius: 20px;
    justify-content: center;

    .block {
        width: 200px;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
        .pic {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            img {
                width: 28px;
            }
            h1 {
                padding: 10px;
                font-size: $sm_h4;
            }
        }
        .button {
            margin-left: auto;
            .cancel {
                font-size: $sm_h5;
                color: $textColor_default;
                border-bottom: 1px solid $textColor_default;
                margin-right: 20px;
            }
            .btn {
                font-size: $sm_h5;
                padding: 8px 24px;
                box-shadow: 1px 1px 1px 1px #0005;
                white-space: nowrap;
                color: $textColor_white;
                text-align: center;
                font-family: $fontFamily;
                letter-spacing: 0.6px;
                display: inline-flex;
                justify-content: center;
                align-items: center;
                gap: 10px;
                border-radius: 50px;
                border: 2px solid $textColor_default;
                background: $textColor_default;
                cursor: pointer;
                &:hover {
                    color: $textColor_default;
                    background: $textColor_white;
                    box-shadow: -2px 2px 4px 0px rgba(0, 0, 0, 0.25);
                }
                &:active {
                    color: $textColor_tint;
                    border: 2px solid $textColor_tint;
                    background: $textColor_white;
                }
            }
        }
    }
}

// 加入收藏燈箱

// xl
.like_xl {
    width: 410px;
    height: 102px;
    border: 3px solid $textColor_default;
    background-color: $textColor_white;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    .block {
        .pic {
            display: flex;
            align-items: center;
            p {
                font-size: $xl_h4;
                padding: 10px;
            }
        }
    }
}

//sm
.like_sm {
    width: 276px;
    height: 78px;
    border: 3px solid $textColor_default;
    background-color: $textColor_white;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    .block {
        .pic {
            display: flex;
            align-items: center;
            img {
                width: 28px;
            }
            p {
                font-size: $sm_h4;
                padding: 10px;
            }
        }
    }
}
</style>
