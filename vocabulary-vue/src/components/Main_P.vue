<template>
  <div class="Main_P">
    <v-container >
      <v-layout column>
      <!-- 타이틀 영역 -->
      <br>
      <v-flex>
      </v-flex>
      <!-- 본문 -->
        <v-flex>
          <v-layout row margin: 15px >
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
            v-on:click="vo_publicload"
            >개인 단어장</v-btn>
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
    

        <!-- 여기에 v-for 써야함 -->
      <!-- v card 를 각각 만들어 줘야함 --><ul readonly><li v-for="voca in vocaInfo" v-bind:key="voca.id" >
      <v-card width="220" height="150" >
        <!-- 여기서 id 안에 배열 하나가 들어간거 -->
        <v-toolbar dark @click="vo_Link(voca.id)" style="width:100%">
          <v-toolbar-title>{{voca.title}}</v-toolbar-title>
        </v-toolbar>
        <v-card-text>
          사용자 : {{voca.user_id}}
        <br>
          <!-- date : {{moment(voca.created_at).format('LLL')}} -->
      작성일 :  {{voca.day}}
      <v-btn
  elevation="2"
  outlined
  rounded
  text
  x-small
  v-if="show"
  @click="vo_update_p(voca.id,voca.title,voca.public)"
>편집</v-btn>
      <v-btn
  elevation="2"
  outlined
  rounded
  text
  x-small
  color="red"
  v-if="show1"
  @click="vo_delete_p(voca.id)"
>삭제</v-btn>
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
              v-on:click="vo_update"
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
              v-on:click="vo_delete"
            >
              <v-icon dark>
              mdi-delete
              </v-icon>
            </v-btn>
            &nbsp; 
             
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
  name: 'Main_P',
  data() {
    return {
      msg: '메인화면입니다',
      btnshow: true,
      user : null,
      comment : null, 
      vocaInfo: [],
      no:'', //단어장 숫자처리
      list:'', //리스트 데이터
      show: false,
      show1:false,
    }
  },
  mounted () {
                this.$store.dispatch('vocaMyLoad') // store 에 있는 vocaSave함수를 실행한다
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
        let public_0 = confirm("공개 하시겠습니까?")
        if (public_0==null) {return }
        else if (public_0==true){
          public_0 = 1;
        }else if (public_0 ==false){
          public_0 = 0;
        }
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
        this.$store.dispatch('vocaMySave',data) // store 에 있는 vocaSave함수를 실행한다
              // 아까만든 data를 보내줌

          .then(res =>{ // 아까와 같이 오류 이외의 놈을 서버가 보내줌
            console.log(res) // 콘솔에 res 를 찍어줌




// 편집할때 화면 재로딩 아니고 그냥 목록만 나열

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




          }).catch( // 이것은 오류 코드
            err=>{
              console.log(err)
            }
          )

        },
        vo_update(){
        this.show = !this.show;
        
    },
        vo_update_p(id,title,public_0){
        const title_update = prompt('단어장 제목을 수정하세요', title);
        if (title_update==null) {return }
    
        console.log(public_0)
        let public_0_update = confirm("단어장을 공개로 하시겠습니까?")
        if (public_0_update==null) {return }
        else if (public_0_update==true){ public_0=1}
        else if (public_0_update==false){public_0=0}
  

    const data = {
          title: title_update, //서버로 받아야하는 변수 : 내가 받은 변수
          id: id, //동일
          public:+(public_0_update), //동일
        }

        this.$store.dispatch('vocaMyUpdateP',data) // store 에 있는 vocaSave함수를 실행한다
              // 아까만든 data를 보내줌

          .then(res =>{ // 아까와 같이 오류 이외의 놈을 서버가 보내줌
            console.log(res) // 콘솔에 res 를 찍어줌
            
            





 // 편집할때 화면 재로딩 아니고 그냥 목록만 나열

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








          }).catch( // 이것은 오류 코드
            err=>{
              console.log(err)
            }
          )
    },
      vo_delete(){
      this.show1 = !this.show1;
    },
      vo_delete_p(id){
                        let flag= confirm("정말 삭제 하시겠습니까??");
                if(flag==false){return ;}
                if(flag==null){return ;}
        console.log(id);
                const url = "api/voca/vocabulary/delete/"+id
                this.$store.dispatch('vocaMyDeleteP',url)

          .then(res =>{ // 아까와 같이 오류 이외의 놈을 서버가 보내줌
            console.log(res) // 콘솔에 res 를 찍어줌
            window.location.reload() //
          }).catch( // 이것은 오류 코드
            err=>{
              console.log(err)
            }
          )
      },
      vo_publicload(){
          this.$router.replace('/')
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
          vo_Link(id){
            console.log(id)
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
 
}
li {
  display: inline-block;
  margin: 15px;
  margin-top :40px;
  float : left;
}
a {
  color: #42b983;
}
</style>

