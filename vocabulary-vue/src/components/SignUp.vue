<template>
  <div class="sign-up">
    <p>회원가입</p>
    <input type="text" placeholder="email" v-model="email"> <br>
    <input type="password" placeholder="password"> <br>
    <button v-on:click="signup"> 가입하기 </button>
    <span>또는 <router-link to="/login">로그인</router-link>으로 돌아가기</span>
  </div>
</template>

<script>


export default {
  name: 'signUp',
  data(){
    return{
      email: '',
      
      password: '',
    }
  },
  mounted() {
    
  },
  methods : {
      signup() {
        axios.post('https://reqres.in/api/users', {
          email:this.email,
          name:"ppang"
        })
        .then(response => {
          console.log(response.data)
          
        })
        .catch(err => {
          console.log(err)
        })
      }
  }
}
</script>

<style scoped>
  .signUp {
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
  span {
    display: block;
    margin-top: 20px;
    font-size: 15px;
  }
</style>
