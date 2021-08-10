<template>
  <div class="hello">
    <v-container>
      <v-row>
        <v-btn v-on:click="logout"> 로그아웃 </v-btn>  
        <v-btn> 공개 단어장 </v-btn>
        <v-btn> 검색 </v-btn>
        <v-btn> 정렬 </v-btn>
      </v-row>
      <v-row>
        <h1>단 어 장</h1>
        <!-- <h1>{{ msg }}</h1> -->
      </v-row>
    </v-container>
  </div>

</template>

<script>
import axios from 'axios'
export default {
  name: 'Main',
  data () {
    return {
      msg: '메인화면입니다'
    }
  },
  methods : {
    logout(){
      axios.post('/api/logout')
      .then(res => {
        console.log(res.data)
        alert('Logout')
        this.$router.replace('signin')
      })
      .catch(err => {
        console.log(err)
      })
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
