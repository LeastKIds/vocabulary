<template>
  <div class="hello">
    <v-container>
      
      <v-row>
        <v-btn type="submit" v-on:click="logout"> 로그아웃 </v-btn>  
        <v-btn> 공개 단어장 </v-btn>
        <v-btn> 검색 </v-btn>
        <v-btn> 정렬 </v-btn>
        <router-link to="/signin"><v-btn> 로그인 </v-btn>  </router-link>
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

// import 

export default {
  name: 'Main',
  data() {
    return {
      msg: '메인화면입니다'
    }
  },
  methods: {
    logout() {
        axios
        .post('/api/logout', { withCredentials: true })
        .then(res => {
          console.log(res.data)
          this.$store.commit('logout')
          this.$router.replace('signin')
        })
        .catch(err => {
          console.log(err)
        })
      },
    }
  }

</script>
