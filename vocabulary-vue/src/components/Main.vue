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
              <!-- <v-btn v-if="btnshow" v-on:click="logout" >로그아웃</v-btn>
              <router-link v-else to="/signin" style="text-decoration: none"><v-btn >로그인</v-btn></router-link> -->
             <!-- 버튼! -->
            <v-btn
              color="yellow"
              elevation="5"
              rounded
              v-if="btnshow" v-on:click="logout"
              >로그아웃</v-btn>
              <router-link v-else to="/signin" style="text-decoration: none">
              <v-btn >로그인</v-btn></router-link>
              
            &nbsp;
            <v-btn
              color="accent"
              elevation="5"
              rounded
            >공개 단어장</v-btn>
            &nbsp;
            <v-btn
              color="accent"
              elevation="5"
              rounded
            >검색</v-btn>
            &nbsp;
            <v-btn
              color="accent"
              elevation="5"
              rounded
            >정렬</v-btn>
            &nbsp;

          <v-btn 
          v-on:click="fetchData"
          >get data</v-btn>



      <br>
      <br>
    <ul>
              <!-- <li v-for="detail in messages" :key="detail.id">{{ detail.info }}</li> -->
         
    </ul>
    <p></p>
    
      <!-- <v-card>
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
  </v-card> -->
             </v-flex>


             
          <!-- 2단패널 의 우측 --> 

          <v-flex low>
          <v-layout column>
          <v-btn
              class="mx-2"
              fab
              dark
              large
              elevation="5"
              color="indigo"
              v-on:click="vo_plus"
             >
              <v-icon dark>
              mdi-plus
              </v-icon>
            </v-btn>
            &nbsp;

            <v-btn
              class="mx-2"
              fab
              dark
              large
              color="cyan"
            >
              <v-icon dark>
              mdi-pencil
              </v-icon>
           </v-btn>
           &nbsp;

            <v-btn
              class="mx-2"
              fab
              dark
              large
              color="red"
            >
              <v-icon dark>
              mdi-delete
              </v-icon>
            </v-btn>
            &nbsp; 
             
            <!-- <v-btn @click="save">저장</v-btn><br> -->
          </v-layout>
          </v-flex>
        </v-layout>
           
      </v-flex>
      
    </v-layout>
    
    </v-container>
    
  </div>
  
</template>

<script>
// import store from '../store'
import axios from 'axios'
export default {
  name: 'Main',
  data() {
    return {
      msg: '메인화면입니다',
      btnshow: true,
      user : null,
      comment : null, 
      messages:[],
    }
  },
  created() {
    
  },

  methods: {
    logout() {
        this.$store.dispatch('logout')
        .then(() => {
          this.$router.replace('signin')
        })
        .catch(err => {
          console.log(err)
        })
      },
        vo_plus() {
        const title = prompt('단어장 제목을 입력하세요~', '무제');
        if (title==null) {return }
        const user_id = prompt('유저 아이디', '무제');
        if (user_id==null) {return }
        const public_0 = prompt('공개여부', '0');
        if (public_0==null) {return }

        console.log(title);
        console.log(user_id);
        console.log(public_0);
        // get, post, delete, put << 다 똑같지만 delete,put은 post
        // 내가 보내고 싶은 놈들은 한꺼번에 담는다
        const data = {
          title: title, //서버로 받아야하는 변수 : 내가 받은 변수
          user_id:'', //동일
          public:+(public_0), //동일
        }
        //this,$store.dispatch('logincheck').
        //.then((res)=> {
         // this.data.user_id=res.data.user_id
        //})
        this.$store.dispatch('vocaSave',data) // store 에 있는 vocaSave함수를 실행한다
              // 아까만든 data를 보내줌

          .then(res =>{ // 아까와 같이 오류 이외의 놈을 서버가 보내줌
            console.log(res) // 콘솔에 res 를 찍어줌
          }).catch( // 이것은 오류 코드
            err=>{
              console.log(err)
            }
          )

        },

      },
      save(){
              const message= {
                  user:this.user,
                  comment:this.comment,
              };
              // 내림차순 unshift
              this.messages.unshift(message)
              this.user=null
              this.comment=null
          },



      // 임시방편
      fetchData() {
      axios.get('http://3.35.216.91/voca/vocabulary/show')
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
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
</style>

