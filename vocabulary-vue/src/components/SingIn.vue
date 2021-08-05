<template>
  <div class="login">
    <v-row>
      <h1>나만의 단어장!</h1>
    </v-row>
    
    <h3>Login</h3>
  <input type="text" placeholder="email"> <br>
  <input type="password" placeholder="password"> <br>
  <button v-on:click="login"> 로그인 </button>
  <p>만일 계정이 없다면,<router-link to="/signup"> 회원가입</router-link>을 먼저 진행 해주세요</p>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'login',
  data(){
    return{
       users: []
    }
  },
  mounted() {
    
  },
  methods : {
    login() {
      axios.get('/api/users')
      .then(response=> {
          console.log(response)
          this.users = response.data

          this.$router.replace('main')
      })
      .catch( err => {
          console.log(err)
      })
    },
  }
}
</script>

<style scoped>
  .login{
    margin-top: 40px;
  }
  input {
    margin: 10px 0;
    width: 20%;
    padding: 15px;
  }
  button {
    margin-top: 20px;
    width: 10%;
    cursor: pointer;
  }
  p{
    margin-top:40px;
    font-size: 15px;
  }
  p a {
    text-decoration: underline;
    cursor: pointer;
  }
</style>
