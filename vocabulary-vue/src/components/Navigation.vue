<template>
    <div @click="logCheck">
        <v-navigation-drawer   
        :mini-variant.sync="mini"
        permanent
        absolute
        >
        <v-list-item class="px-2">
          <v-list-item-avatar>
            <v-img src="../assets/yomi.jpg"></v-img>
          </v-list-item-avatar>
          
          <v-list-item-title v-if="loginStatus == 1">{{ userinfo.user.email }}</v-list-item-title>
          <v-list-item-title v-else>UNKNOWN</v-list-item-title>
          
          <v-list-item v-if="loginStatus == 1"> {{ userinfo.user.name }}</v-list-item> 
          
          <v-btn
            icon
            @click.stop="mini = !mini"
          >
            <v-icon>mdi-chevron-left</v-icon>
          </v-btn>
        </v-list-item>
        <v-divider></v-divider>
  
        <v-list dense>
          <v-list-item
            v-for="item in items"
            :key="item.title"
            link
          >
            <v-list-item-icon>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-icon>
  
            <v-list-item-content>
              <router-link :to="item.route" style="text-decoration: none; color:black"><v-list-item-title>{{ item.title }}</v-list-item-title></router-link>
            </v-list-item-content>
          </v-list-item>
        </v-list>
        <template v-slot:append>
          <div class="pa-2">
            <v-icon v-if="mini" class="pl-2" style="color:red">mdi-power</v-icon>
            <v-btn color="error" v-else-if="loginStatus == 1" block @click="logout">
              Logout
            </v-btn>
            <v-btn color="success" v-else block @click="login">
              login
            </v-btn>
          </div>
        </template>
      </v-navigation-drawer>
    </div>
</template>

<script>
import store from '../store'
export default {
  data() {
    return{
      mini: true,
      loginStatus: 0,
      items: [
        { title: 'Home', icon: 'mdi-home-city', route:'/' },
        { title: 'My Account', icon: 'mdi-account', route:'/profile' },
        { title: 'WordBook', icon: 'mdi-book-open', route:'/wordbook' },
      ],
      userinfo:{
        login: 0,
        user: {
          created_at:'',
          email:'UNKNOWN',
          email_verifield_at:'',
          id:'',
          name:'',
          password:'',
          updated_at:''
        }
      },
    }
  },
   
  mounteds() {
    this.$emit('show')
  },
  methods: {
    logout() {
        store.dispatch('signout')
        .then(() => {
          this.$router.replace('signin')
          this.loginStatus = 0
        })
        .catch(err => {
          alert('SIGNOUT ERR') 
          console.log(err)
        })
      },
    login() {
      this.$router.replace('signin')
      
    },
    logCheck() {
      if(this.loginStatus == 0) {
        store.dispatch('loginCheck')
        .then((res) => {
          this.userinfo = res
        })
        .catch(() => {
          console.log('Check Error')
        })
        this.loginStatus = store.state.loginCheck.loginCheck
      }
    }
    
  },

  mounted() {
    // setInterval(this.logCheck, 5000)
  },
  watch: {
    loginStatus (Val) {
      console.log(this.$router.currentRoute.path)
      console.log('login : ', Val) 
      this.loginStatus = Val
    }
  }
  
};
</script>