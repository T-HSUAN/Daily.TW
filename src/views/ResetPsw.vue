<!-- 重設密碼頁面 -->
<template>
<section class="reset">
    <section class="resetpsw">

        <div class="canvas" >
            <div class="joinus_sm">
                <img src="@/assets/img/joinus_sm.png" alt="joinus">
            </div>
            <div class="forget">
                <h2>重設密碼</h2>
                <div class="psw_group">
                <label for="newpsw">
                    新密碼
                </label>
                <input 
                type="password" 
                v-model="newpsw" 
                @input="validatePassword"
                :placeholder="passwordPlaceholder">
                <label for="repeatpsw">
                    密碼
                </label>
                <input 
                type="password" 
                v-model="repeatpsw"
                @input="validatePassword"
                :placeholder="passwordPlaceholder">
                <div v-if="!isPasswordValid" class="error_message">請輸入英數混合的6-12位密碼且兩次輸入值要相同</div>
                <div class="space_reset"></div>
                <button v-if="isPasswordValid" @click="handleSubmit">送出</button>
            </div>
            
            
                <div class="cancel_group">
                    <router-link to="/" 
                        @click="handleClick"
                        class="cancel_btn">
                        取消
                    </router-link>
                    <!-- 利用 v-if/v-else 控制是否顯示 router-link -->
                    <router-link 
                        to="/forget_psw"
                        @click="handleSubmit" 
                        class="btn">
                        送出
                    </router-link>
                    
                </div>
            </div>
            <div class="register">
                <h2>Reset</h2>
                <div class="joinus_md">

                    <img  src="../assets/img/reset_md.png" alt="">

                </div>
                <div class="welcome">Please enter your password</div>
                
            </div>       
        </div>

    </section>
</section>
</template>
<script>
export default {
    data(){
        return {
            tabActive: 1,
            tabItems:{
                1:{
                    title: '忘記密碼',
                    tab: 1,
                    goNext: 2,
                    subtitle:"Forget",
                    text:"Please enter your EMAIL",
                    img:""
                },
                2:{
                    title: '重設密碼',
                    tab: 2,
                    goNext:1,
                    subtitle:"Reset",
                    text:"Please enter your password"
                },
            },
            email: '',
            psw:'',
            isActive: false,
            showError: false,
            newpsw: "",
            repeatpsw: "",
        }
    },
    computed: {
    isPasswordValid() {
      // 密码校验逻辑
      const regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,12}$/;
      return (
        regex.test(this.newpsw) &&
        regex.test(this.repeatpsw) &&
        this.newpsw === this.repeatpsw
      );
    },
    passwordPlaceholder() {
      return this.isPasswordValid
        ? "請輸入密碼 (英數混合6-12碼)"
        : "密碼不合法或兩次輸入不一致";
    },
  },
    methods: {
    validateEmail() {
      const regex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
      if (!regex.test(this.email)) {
        // 輸入格式不正確，顯示錯誤提示
        this.showError = true;
      } else {
        // 輸入格式正確，隱藏錯誤提示
        this.showError = false;
      }
    },
      login(){
        if(this.email === '123@gmail.com' && this.psw === 'test'){
          window.alert('登入成功')
        }
        else{
          window.alert('登入失敗，請重新登入');
        }
      },
      // 切換tab
      updateTab(index){
          this.tabActive = index
      },
      handleClick() {
          this.updateTab(this.tabItems[this.tabActive].goNext);
          this.isActive = !this.isActive;
      },
      handleSubmit() {
      // 在这里处理表单提交逻辑
      // 可以通过this.newpsw和this.repeatpsw获取密码值
      console.log("密码正确，执行提交操作");
    },
    validatePassword() {
      // 在用户输入时动态验证密码
      this.passwordPlaceholder = this.isPasswordValid
        ? "請輸入密碼 (英數混合6-12碼)"
        : "密碼不合法或兩次輸入不一致";
    },
    }
    
}
</script>
<style lang="scss" scoped>
@import '@/assets/scss/baseAndMixin.scss';


//手機板
.reset{
    padding-top: 74px;
    @media all and (min-width: $md) {
        padding-top: 200px;
        
    }
.resetpsw{
    margin: 150px 0 60px;

    @media all and (min-width: $md) {
        margin: 130px 0;
    }

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

}
}
@media all and (min-width: $md){
    // *{
    //     outline: 1px solid red;
    // }
.resetpsw{
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