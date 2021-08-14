<template>
  <div>
    <v-container>
      <v-row class="mt-5">
        <h1>SIGNUP</h1>
      </v-row>
      <v-card class="mt-5">
        <v-form ref="form" v-model="valid" @submit.prevent="signup()" class="mx-10">
          <v-text-field 
            v-model ="name"
            label   ="NAME"
            required
            class="pt-10"
            :rules  ="nameRules"
          ></v-text-field>

          <v-text-field 
            v-model ="email"
            label   ="EMAIL"
            required
            class="pt-6"
            :rules  ="emailRules"
          ></v-text-field>

          <v-text-field 
            v-model ="password"
            label   ="PASSWORD"
            required
            class="pt-6"
            :append-icon="pswShow ? 'mdi-eye' : 'mdi-eye-off'"
            :type="pswShow ? 'text' : 'password'"
            v-on:click:append="pswShow = !pswShow"
            :rules ="passwordRules"
          ></v-text-field>

          <v-text-field 
            v-model ="password_confirmation"
            label   ="Confirm Password"
            required
            class   ="pt-6"
            type    ="password"
            :rules  ="password_confirmationRules"
          ></v-text-field>

          <v-row  justify="center">
            <v-btn 
              type="submit" 
              class="my-5" 
              :disabled="!valid" 
              width="300px" 
              color="primary" 
              @click="validate"
              >SINGUP
              </v-btn>
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
      valid: true,
      name:'',
      nameRules:[
        v => !!v || 'Name is required',
        v => (v && v.length <= 10) || 'Name must be less than 10 characters'
      ],
      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
      ],
      password: '',
      passwordRules: [
        v => !!v || 'Password is required',
        v => v.length >= 8 || 'Min 8 characters'
      ],
      password_confirmation: '',
      password_confirmationRules: [
        v => !!v || 'Password is required',
        v => this.password == v || `The password you entered don't match`,
      ],
      
      pswShow: false,
      users:[],
    }
  },
  mounted() {
    
  },
  methods : {
    validate() {
        this.$refs.form.validate()
      },
      signup() {
        const data = {
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation
        }
        console.log(data)
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
      },
      
  }
}
</script>

<style scoped>

</style>
