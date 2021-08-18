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
    axios.get('/api/auth/user')
      .then((res) => {
        if(res.data.login == 1){
          console.log(res.data.login)
          this.btnshow = true
        } else {
          this.btnshow = false
        }
      })
      .catch((err) => {
        console.log(err)
      })
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
        const name = prompt('단어장 제목을 입력하세요~', '무제');
        
        if (name==null) {return }

        const user_id = prompt('유저 아이디', '무제');
        if (name==null) {return }
        const publicman = prompt('공개여부', '0');
        if (name==null) {return }
        console.log(name);
        console.log(user_id);
        console.log(publicman);
        axios.post('/api/test',{
          title:name,user_id:user_id,public:+(publicman)
          // this:"자",user_id:"전",public:"거"
          })

            .then(res => {

                if(res.status == 200) { // 로그인 성공
                    
                    console.log(res)
                    console.log('200')

                }

            })

            .catch((err) => { // err

                console.log('err')               

                return Promise.reject(err)

            })




        
        }
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

