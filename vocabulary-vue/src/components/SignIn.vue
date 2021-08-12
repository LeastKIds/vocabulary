<template>
  <div>
    <v-container>
      <v-row class="mt-5">
        <h1>Login</h1>
      </v-row>
      <v-card class="mt-5">
        <v-form class="mx-10" @submit.prevent="login(email, password)">
        <v-row>
          <v-text-field
            v-model="email"
            class="pt-5"
            type="text" 
            label="EMAIL"
            outlined
            ></v-text-field>
        </v-row>
        <v-row>
          <v-text-field 
          v-model="password"
          :type="show ? 'text' : 'password'"
          label="PASSWORD"
          :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
          v-on:click:append="show = !show"
          outlined
            ></v-text-field>
        </v-row>
        <v-btn type="submit" color="primary">로그인</v-btn>
        <v-row class="mt-5">
          <p>만일 계정이 없다면,<router-link to="/signup"> 회원가입</router-link>을 먼저 진행 해주세요</p>
        </v-row>
      </v-form>
    </v-card>
  </v-container>
  </div>
</template>

<script>
export default {
  name: 'login',
  data(){
    return{
      email:'',
      password:'',
      show: false,
      users: [],
    }
  },
  mounted() {
    
  },
  methods : {
    login(email, password) {
      this.$store.dispatch('signin', {email, password})
      .then(() => {
        this.$router.push('/')
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
