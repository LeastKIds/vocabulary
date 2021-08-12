<template>
  <div class="main">
    <v-container >
      <v-layout column>
      <!-- 타이틀 영역 -->
      <br>
      <v-flex>
      </v-flex>
      <!-- 본문 -->
        <v-flex>
          <v-layout row >
            <!-- 2단패널 의 좌측 -->
            <v-flex xs8>
              <v-btn v-on:click="logout" >로그아웃</v-btn>
              <v-btn> 공개 단어장 </v-btn>
              <v-btn> 검색 </v-btn>
              <v-btn> 정렬 </v-btn>
      <v-card>
      <v-list-item one-line >
      <v-list-item-content>
        <v-list-item-title class="text-h5 mb-1">
          単語帳１
        </v-list-item-title>
      </v-list-item-content>

      </v-list-item>

    <v-card-actions>
      <v-btn
        outlined
        rounded
        text
      >
        Button
      </v-btn>
    </v-card-actions>
  </v-card>
             </v-flex>


             
          <!-- 2단패널 의 우측 --> 

          <x-flex low>
          <v-layout column>
          <v-btn> 추가 </v-btn>
          <v-btn> 삭제 </v-btn>
          <v-btn> 수정 </v-btn>    
          </v-layout>
          </x-flex>
       










        </v-layout>
        
      </v-flex>
      
    </v-layout>
    
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

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

h1, h2 {
  font-weight: normal; 
  text-align:CENTER;
}
ul {
  list-style-type: none;
  padding: 10;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
btn {

}
</style>

