<template>
  <div>
    <v-container>
      <v-row class="mt-5">
        <h1>Login</h1>
      </v-row>
      <v-card class="mt-5">
        <v-form ref="form" v-model="valid" class="mx-10" @submit.prevent="login(email, password)">
        <v-row>
          <v-text-field
            v-model="email"
            class="pt-5"
            type="text" 
            label="EMAIL"
            required
            outlined
            :rules="emailRules"
            ></v-text-field>
        </v-row>
        <v-row>
          <v-text-field 
          v-model="password"
          label="PASSWORD"
          required
          outlined
          v-on:click:append="show = !show"
          :type="show ? 'text' : 'password'"
          :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
          :rules="passwordRules"
            ></v-text-field>
        </v-row>
        <v-btn 
          type="submit" 
          color="primary" 
          :disabled="!valid"
          @click="validate"
          class="mt-4">로그인</v-btn>
        <v-row class="mt-5">
          <p>만일 계정이 없다면,<router-link to="/signup"> 회원가입</router-link>을 먼저 진행 해주세요</p>
        </v-row>
      </v-form>
    </v-card>
  </v-container>
  </div>
</template>

<script>
import store from '../store'
export default {
  name: 'login',
  data(){
    return{
      show: false,
      valid: true,
      email:'',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
      ],
      password:'',
      passwordRules: [
        v => !!v || 'Password is required',
        v => v.length >= 8 || 'Min 8 characters'
      ],
    }
  },
  mounted() {
    
  },
  methods : {
    validate () {
      this.$refs.form.validate()
    },
    login(email, password) {
      store.dispatch('signin', {email, password})
      .then(() => {
        this.$router.replace('/')
      })
      .catch(() => {
        console.log('loginFail.')
      })
    },
  }
}
</script>

<style scoped>

</style>
