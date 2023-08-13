<!-- 帳號管理的個人密碼修改頁面 -->
<template>
    <section class="memberPsw">

        <section class="profile">
            <h2>帳號管理</h2>

            <div class="profile_container">
                <Sidenav class="sidenav"></Sidenav>
                <!-- 個人資料修改 -->
                <div class="profile_card">
                    <div class="member_title">
                        <h3>密碼修改</h3>
                    </div>

                    <form class="member_data">
                        <label for="newpsw">新密碼：</label>
                        <input id="newpsw" v-model="newPsw" type="password" placeholder="請輸入新密碼" />
                        
                        <label for="confirm-newpsw">確認新密碼：</label>
                        <input
                            id="confirm-newpsw"
                            type="password"
                            placeholder="再次輸入新密碼"
                            v-model="newPswConfirm"
                            @paste="(e) => {
                                    e.preventDefault();
                                }"
                        />
                        <div class="btn_group">
                            <router-link to="/member" class="cancel_btn">
                                取消編輯
                            </router-link>
                            <button @click="changePsw" class="btn">
                                儲存
                            </button>
                        </div>
                    </form>
                    
                    
                </div>
            </div>

        </section>
    </section>
</template>

<script>
import Sidenav from "@/components/Sidenav.vue";

export default{
    components:{
        Sidenav,
    },
    data() {
        return {
            newPsw: "",
            newPswConfirm: "",
        }
    },
    methods: {
    //     updateUserInformation(userInfo) {
    //         console.log(updateUserInformation)
    // this.$store.commit("setUserInfo", userInfo)
    //     },
        changePsw() {
            if (this.newPsw !== "" && this.newPswConfirm !== "") {
                if (this.newPsw == this.$store.state.memberInfoAll.info.psw) {
                    console.log(this.$store.state.memberInfoAll.info.psw)
                    alert("輸入的新密碼與舊密碼一樣喔~");
                } else if (this.newPsw == this.newPswConfirm) {
                    let memId = sessionStorage.getItem("mem_id");
                    let url = `${this.$url}changePsw.php`;
                    let params = new URLSearchParams();
                    params.append("memId", memId);
                    params.append("newPsw", this.newPsw);
                    this.axios
                        .post(url, params)
                        .then((res) => {
                            alert(res.data);
                        })
                        .catch((err) => {
                            console.log(err);
                        });
                } else {
                    alert("請再次確認新密碼");
                }
            } else if (this.newPsw == "") {
                document.querySelector('[for="newpsw"]').classList.add("shake");
                setTimeout(() => {
                    document.querySelector('[for="newpsw"]').classList.remove("shake");
                }, 1000);
            } else if (this.newPswConfirm == "") {
                document.querySelector('[for="confirm-newpsw"]').classList.add("shake");
                setTimeout(() => {
                    document.querySelector('[for="confirm-newpsw"]').classList.remove("shake");
                }, 1000);
            }
        },
    },
}
</script>

<style lang="scss" scoped>
@import "@/assets/scss/baseAndMixin.scss";

// *{
//     outline: 1px solid red;
// }
.memberPsw {
    padding-top: 74px;

    @media all and (min-width: $md) {
        padding-top: 200px;

    }

    .profile {
        width: 90%;
        margin: 0 auto;

        @media (min-width: 1200px) {
            box-sizing: border-box;
            width: 1175px;
        }

        h2 {
            margin: 41px auto;
            text-align: center;
        }


        .profile_container {
            display: flex;
            gap: 30px;

            .profile_card {
                width: 100%;
                display: flex;
                flex-direction: column;

                .member_title {
                    width: 100%;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    border-bottom: 1px solid $textColor_default;
                    padding: 0 0 $sp1;

                    h3 {
                        margin: 0;
                    }

                }

                .member_data {
                    padding: 40px 0;

                    @media (min-width: 768px) {
                        width: 435px;
                        box-sizing: border-box;
                        margin: 32px 200px 0 150px;
                    }

                    label {
                        font-size: $sm_h4;
                        font-weight: 700;

                        @media (min-width: 768px) {
                            font-size: $xl_h4;
                        }
                    }

                    input {
                        width: 100%;
                        box-sizing: border-box;
                        margin: $sp1 0 $sp2;

                        @media (min-width: 768px) {
                            margin: $sp1 0 $sp3;
                        }
                    }

                    .btn_group {
                        width: 100%;
                        display: flex;
                        align-items: center;
                        justify-content: flex-end;
                        margin: $sp2 0 $sp10;

                        @media (min-width: 768px) {
                            margin: $sp5 0 $sp15;
                        }

                        a {
                            margin: 0 $sp2;

                            @media (min-width: 768px) {
                                margin: 0 $sp4;
                            }
                        }

                    }
                }
            }
        }

    }
}</style>
