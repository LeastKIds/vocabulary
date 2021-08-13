import Vue from 'vue'
import SignIn from '@/components/SignIn'
import SignUp from '@/components/SignUp'
import Main from '@/components/Main'
import WordBook from '@/components/WordBook'
import VueRouter from 'vue-router'
import store from '../store'
import axios from 'axios'

Vue.use(VueRouter)
Vue.use(store)

const routes = [

  { path: '/',       
    name: 'Main',   
    component:Main,
    
  },

  { path: '/signin', 
    name: 'Signin', 
    component:SignIn, 
    meta:{requiresAuth:true}
  },
  { path: '/signup', 
    name: 'Signup', 
    component:SignUp,
    meta:{requiresAuth:true}
  },
  { path: '/wordbook', 
    name: 'WordBook', 
    component:WordBook,
    meta:{requiresAuth:true}
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

router.beforeEach((to, from, next) => {
  if(to.matched.some((recode) => recode.meta.requiresAuth)) {
    console.log('Login Check')
    axios.get('/api/auth/user')
    .then(res => {
      console.log(res.data)
      if(res.data.login == 1){
        alert('You already Signin')
        next('/')
      } else {
        alert('Signin please')
        next('/signin')
        close;
      }  
    })
    .catch((err) => {
      console.log('err')
      return Promise.reject(err)
    })
    }
    next();
  }
)
export default router
