<template>
  <div class="sign-up">
    <p>회원가입</p>
  <input type="text" placeholder="email"> <br>
  <input type="password" placeholder="password"> <br>
  <button> 가입하기 </button>
  <span>또는 <router-link to="/login">로그인</router-link>으로 돌아가기</span>
  </div>
</template>

<script>
export default {
  name: 'signUp',
  data(){
    return{
    }
  },
  methods : {}
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
