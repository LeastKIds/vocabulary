<template>
  <div class="hello">
      <br>
      <button v-on:click="logout"> 로그아웃 </button>
      <button> 공개 단어장 </button>
      <button> 검색 </button>
      <button> 정렬 </button>

  <div>
    <h1>단 어 장 ~</h1>
  </div>
<!-- <h1>{{ msg }}</h1> -->

  </div>

</template>

<script>
export default {
  name: 'Main',
  data () {
    return {
      msg: '메인화면입니다'
    }
  },
  name: 'logout',
  data(){
    return{

    }
  },

  methods : {
    logout(){
    this.$router.replace('login')
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
  font-weight: normal;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
