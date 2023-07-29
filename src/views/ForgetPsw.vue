<!-- 忘記密碼頁面 -->
<template>
    <section class="forgetpsw">
        
        <div  class="canvas" >
            <div class="joinus_sm">
                <img src="@/assets/img/joinus_sm.png" alt="joinus">
            </div>
            <form class="forget" ref="form" @submit.prevent="sendEmail">
                <h2>忘記密碼</h2>
                <p  >請輸入註冊時的EMAIL，<br> 我們將寄送給您重置密碼的連結</p>
                <label>Email
                    <input 
                        type="email"
                        v-model="email"
                        name="user_email" 
                        placeholder='請輸入EMAIL'>
                        <div class="space_forget"></div>
                </label>    
                
    
                <div class="cancel_group">
                    <router-link to="/" 
                        class="cancel_btn">
                        取消
                    </router-link>
                    <input type="submit"
                    value="送出"
                    class="btn">
                </div>
            </form>
            <div class="register">
                <h2>Forget</h2>
                <div class="joinus_md">
                    <img  src="../assets/img/forget_md.png" alt="">
                </div>
                <div class="welcome">Please enter your EMAIL</div>
            </div>
            
            
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

    </section>
</template>




<script>
import emailjs from 'emailjs-com';

export default {
    data(){
        return {
            email: '',
            isPopBoxVisible: false,
            isPopBoxFalse:false,
        }
    },
    methods: {
        sendEmail() {
      if (this.email === '') {
 
        this.isPopBoxFalse = true;
      } else {
 
        emailjs.sendForm('zhang', 'Contact Form', this.$refs.form, '21inWh_x_4Gcz3eYO')
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
        this.email= '';
    }
    }   
}
</script>
<style lang="scss">
@import '@/assets/scss/baseAndMixin.scss';


#app{
    background-color: $bgColor_default;
}
//手機板

.forgetpsw{
    padding: 200px 0 150px;
    .canvas{  
        width: 83%;
        background-color: $default_yellow;
        margin: auto;
        border-radius: $sp3;
        position: relative;
        z-index: 2;  
        .joinus_sm{
            position: absolute;
            top: -130px;
            width: 150px;
            left: 50%;
            transform: translateX(-50%);
            overflow: hidden;
            img{
                display: block;
                height: 100%;
                width: 100%;
                object-fit: cover;
            }
        }
        .forget{
            padding: $sp8 $sp3;
            display: flex;
            flex-direction: column;
            align-items: center;
            h2{
                color: $textColor_white;
                font-size: $sm_h2;
                padding: 0 0 $sp5;
                font-weight: 900;
                line-height: 150%; /* 42px */
                letter-spacing: 0.84px;
            }
            p{
                font-size: $sm_p;
                font-weight: 400;
                line-height: 180%; /* 25.2px */
                letter-spacing: 0.42px;
                text-align: center;
            }
            label{
                width: 100%;
                color: $textColor_white;
                font-size: $sm_h4;
                font-weight: 700;
                letter-spacing: 0.72px;
                padding: 4px 0;
                position: relative;
                input{
                    width: 100%;
                    box-sizing: border-box;
                    font-size: $sm_p;
                    margin: $sp1 0 $sp1;
                }
                .error_message{
                    position: absolute;
                    bottom: -2px;
                color: $warningColor;
                font-size: $sm_p;
                }
                
            }
            .psw_group{
                width: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
                label{
                    width: 100%;
                    color: $textColor_white;
                    font-size: $sm_h4;
                    font-weight: 700;
                    letter-spacing: 0.72px;
                    padding: 4px 0;
                    position: relative;
                }
                input{
                    width: 100%;
                    padding: $sp1 20px;
                    background: $textColor_white;
                    color: $textColor_default;
                    box-sizing: border-box;
                    font-size: $sm_p;
                    margin: $sp1 0 $sp1;
                }
                
            }
            .cancel_group{
                width: 100%;
                display: flex;
                justify-content: flex-end;
                align-items: center;
                a:first-child{
                    padding: 0 $sp2;
                }
                
                
            }
            
        }
        .register{
            display: none;    
        }
        
    }

    //popbox

.member_sm{
            display: flex;
            width: 273px;
            height: 194px;
            border: 3px solid $textColor_default;
            background-color: $textColor_white;
            border-radius: 20px;

            position: absolute;
            z-index: 10;
            top: 300px;
            left: 50%;
            transform: translate(-50%, 0%);
            .block{
                width: 250px;
                left: 50%;
                transform: translate(-50%, 0%);
                position: relative;
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                align-items: center;
                .pic{
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    margin-top: 20px;
                    img{
                    width: 28px;
                    }
                    h3{
                        padding: 10px;
                        font-size: $sm_h4;
                    }
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
                // }
            }
            // 電腦版
            @media (min-width: 768px) {
            display: flex;
                top: 500px;
            width: 410px;
            height: 243px;
            border: 3px solid $textColor_default;
            background-color: $textColor_white;
            border-radius: 20px;
            justify-content: center;
            
            position: absolute;
            z-index: 10;

            .block{
                width: 100%;
                position: relative;
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                align-items: center;
                .pic{
                    margin-top: 10px;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    img{
                    width: 34px;
                    }
                    h3{
                        text-align: center;
                        font-size: $sm_h3;
                        line-height: 150%;
                        margin-top: 15px;
                    }
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
}





@media all and (min-width: $md){
    // *{
    //     outline: 1px solid red;
    // }
.forgetpsw{
    padding: 50px 0;
    .canvas{
        max-width: 1000px;
        display: flex;
        justify-content: center;
        margin: $sp10 auto;
        .joinus_sm{
            display: none;
        }
        .forget{
            width: 50%;
            border-right: 2px solid $textColor_white;
            padding: $sp6 0;
            h2{
                font-size: $xl_h2;
                padding: 0 0 110px;
            }
            p{
                font-size: $xl_p;
                font-weight: 400;
                line-height: 165%; /* 25.2px */
                letter-spacing: 0.54px;
            }
            label{
                width: 80%;
                font-size: $xl_h4;
                input{
                    font-size: $xl_p;
                }
                .space_forget{
                    margin: 0 0 110px;
                }
                .error_message{
                    bottom: -6px;
                    font-size: $xl_p;
                }
            }
            .psw_group{
                width: 80%;
                label{
                        font-size: $xl_h4;
                    }
                    input{
                        font-size: $xl_p;
                        margin: $sp1 0 $sp1;
                    }
                    .space_reset{
                    margin: 0 0 80px;
                }
                }
                .cancel_group{
                justify-content: center;
                a:first-child{
                    padding: 0 $sp2;
                }
                
                
            }
            
        }
        .register{
            width: 50%;
            padding: $sp6 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-radius: 0 $sp3 $sp3 0;
            h2{
                color: $textColor_white;
                font-size: $xl_h2;
                padding: 0 0 $sp5;
                font-weight: 900;
                letter-spacing: 2px;
            }
            p{
                font-size: $xl_h4;
                color:$textColor_white;
                font-weight: 700;
                letter-spacing: 0.72px;
            }
            .joinus_md{
                width: 300px;
                overflow: hidden;
                margin: $sp4 0 $sp10;
                img{
                    display: block;
                    height: 100%;
                    width: 100%;
                    object-fit: cover;
                }
            }
            .welcome{
                font-size: $xl_h4;
                color:$textColor_white;
            }      
        }
        
    }

}
}
</style>