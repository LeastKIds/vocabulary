<template>
  <div>
    <v-container>
      <v-row class="mt-5">
        <h1>SIGNUP</h1>
      </v-row>
      <v-card class="mt-5">
        <v-form @submit.prevent="signup()" class="mx-10">
          <v-text-field 
            v-model ="name"
            label   ="NAME"
            class="pt-10"
            :rules  ="[rules.required]" 
          ></v-text-field>
          <v-text-field 
            v-model ="email"
            label   ="EMAIL"
            class="pt-6"
            :rules  ="[rules.required, rules.min]"
          ></v-text-field>
          <v-text-field 
            v-model ="password"
            label   ="PASSWORD"
            class="pt-6"
            :append-icon="pswShow ? 'mdi-eye' : 'mdi-eye-off'"
            :type="pswShow ? 'text' : 'password'"
            v-on:click:append="pswShow = !pswShow"
            :rules  ="[rules.required, rules.min]"
          ></v-text-field>
          <v-text-field 
            v-model ="password_confirmation"
            label   ="Confirm Password"
            class   ="pt-6"
            type    ="password"
            :rules  ="[rules.required,
                      rules.passwordMatch(password, password_confirmation),
                      rules.min]"
          ></v-text-field>
          <v-row  justify="center">
            <v-btn type="submit" class="my-5" width="300px" color="primary">SINGUP</v-btn>
          </v-row>
          <v-row class="py-7">
            <span>
              또는 <router-link to="/signin" >로그인</router-link>으로 돌아가기
            </span>
          </v-row>
        </v-form>
      </v-card>
    </v-container>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'signUp',
  data(){
    return{
      //http://localhost:8000/register
  // post
  // {
  //    "name" : "이름",
  //    "email" : "이메일",
  //    "password" : "패스워드",
  //    "password_confirmation" : "패스워드랑 똑같이"
  // }
      name:'',
      email: '',
      password: '',
      password_confirmation: '',
      pswShow: false,
      users:[],
      rules: {
              required: value => !!value || 'Required.',
              min: v => v.length >= 8 || 'Min 8 characters',
              passwordMatch: (password, password_confirmation) => 
                password == password_confirmation || 
                `The password you entered don't match`,
              // emailMatch: () => (`The email and password you entered don't match`),
            },
    }
  },
  // beforeRouteEnter (to, from, next) {
  //   let user = {}
  //   user = this.$store.dispatch('loginCheck')
  //   if(user.id == 1) {
  //     alert('You already Signin')
  //     next('/')
  //   }
  //   next()
  // },
  mounted() {
    
  },
  methods : {
      signup() {
        const data = {
          email: this.email,
          name: this.name,
          password: this.password,
          password_confirmation: this.password_confirmation
        }

        axios.post('/api/register', data)
        .then(response => {
          console.log(response.data)
          this.users.data = response.data
          console.log(this.users.data)
          alert('Signup Success')
          this.$router.replace('signin')
        })
        .catch(err => {
          console.log(err)
        })
      }
  }
}
</script>

<style scoped>

</style>
