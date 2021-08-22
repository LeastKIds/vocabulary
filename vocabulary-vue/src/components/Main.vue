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



      <br>
      <br>
    <ul>
              <!-- <li v-for="detail in messages" :key="detail.id">{{ detail.info }}</li> -->
         
    </ul>
    <p></p>
    

        <!-- 여기에 v-while 써야함 -->
      <!-- v card 를 각각 만들어 줘야함 --><ul><li v-for="voca in vocaInfo" v-bind:key="voca.id">
      <v-card style="width:100%" height="180" >
        <!-- 여기서 id 안에 배열 하나가 들어간거 -->
        <v-toolbar dark @click="vocaLink">
          <v-toolbar-title >{{voca.title}}</v-toolbar-title>
        </v-toolbar>
        <v-card-text >
          writer : {{voca.user_id}}
        </v-card-text>
        <v-card-text>
          date : {{voca.created_at}}
        </v-card-text>
      </v-card>
    </li></ul>


  <!-- <ul>
    <li v-for="title in vocaInfo" v-bind:key="title">{{ title }}</li>
  </ul> -->
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
// import axios from 'axios'
export default {
  name: 'Main',
  data() {
    return {
      msg: '메인화면입니다',
      btnshow: true,
      user : null,
      comment : null, 
      vocaInfo: [],
      no:'', //단어장 숫자처리
      list:'' //리스트 데이터
    }
  },
  mounted () {
                this.$store.dispatch('vocaLoad') // store 에 있는 vocaSave함수를 실행한다
              // 아까만든 data를 보내줌

          .then(res =>{ // 아까와 같이 오류 이외의 놈을 서버가 보내줌
            console.log(res) // 콘솔에 res 를 찍어줌
              this.vocaInfo = res.data
          }).catch( // 이것은 오류 코드
            err=>{
              console.log(err)
            }
          )


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
        console.log(title);
        const user_id = prompt('유저 아이디', '무제');
        console.log(user_id); 
        if (user_id==null) {return }
        const public_0 = prompt('비공개 = 0 공개 = 1', '1');
        if (public_0==null) {return }
        console.log(public_0);
        
        // get, post, delete, put << 다 똑같지만 delete,put은 post
        // 내가 보내고 싶은 놈들은 한꺼번에 담는다
        const data = {
          title: title, //서버로 받아야하는 변수 : 내가 받은 변수
          user_id: user_id, //동일
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
            window.location.reload() //
          }).catch( // 이것은 오류 코드
            err=>{
              console.log(err)
            }
          )

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
          vocaLink(){
            console.log("hello")
          }



      // 임시방편

      },
          

  }

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

h1, h2 {
  font-weight: normal; 
  text-align:CENTER;
}
ul {
  list-style: none;
  list-style-type: none;
  padding: 10;
}
li {
  display: inline-block;
  margin: 15px;
  float : left;
}
a {
  color: #42b983;
}
</style>

