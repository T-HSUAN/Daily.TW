<!-- email範例 -->
<template>
  <form ref="form" @submit.prevent="sendEmail">
    <label>Name</label>
    <input type="text" name="name" v-model="name">
    <label>Email</label>
    <input type="email" name="email" v-model="email">

    <label>Message</label>
    <textarea name="message" v-model="message"></textarea>

    <input type="submit" value="Send">
  </form>
</template>

<script>
import emailjs from 'emailjs-com';

export default {
  data() {
    return {
      name: '',
      email: '',
      message: '',
      // 其他 data...
    };
  },
  methods: {
    sendEmail() {
      emailjs.sendForm('zhang', 'Contact Form', this.$refs.form, '21inWh_x_4Gcz3eYO')
        .then((result) => {
          console.log('SUCCESS!', result.text);
          // 資料送出成功後，將輸入框的值重置為空字串，即清空輸入框內容
          this.name = '';
          this.email = '';
          this.message = '';
        })
        .catch((error) => {
          console.log('FAILED...', error.text);
        });
    }
  }
}
</script>
