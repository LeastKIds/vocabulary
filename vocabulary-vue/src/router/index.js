import Vue from 'vue'
import SignIn from '@/components/SignIn'
import SignUp from '@/components/SignUp'
import Main from '@/components/Main'
import WordBook from '@/components/WordBook'
import ProFile from '@/components/ProFile'
// import Navigation from '@/components/Navigation'
import VueRouter from 'vue-router'
// import store from '../store'
import store from '../store'

Vue.use(VueRouter)

const routes = [

  { path: '/',       
    name: 'Main',   
    component:Main,
    beforeEnter:(to, from, next) => {
      store.dispatch('loginCheck')
      .then((res) => {
        console.log(res)
        next()
      })
      .catch((err) => {
        console.log(err)
        console.log('Check ERROR')
        next('/signin')
      })
    }
    
  },

  { path: '/signin', 
    name: 'Signin', 
    component:SignIn, 
    beforeEnter:(to, from, next) => {
      store.dispatch('loginCheck')
      .then(res => {
        console.log(res)
        if(res === 1){
          alert('You already Signin')
          next('/')
        } else
        next()
      })
      .catch((err) => {
        console.log(err)
        console.log('ERROR')
      })
    }
  },
  { path: '/signup', 
    name: 'Signup', 
    component:SignUp,
    beforeEnter:(to, from, next) => {
      store.dispatch('loginCheck')
      .then(res => {
        console.log(res)
        if(res.login === 1){
          alert('You already Signin')
          next('/')
        } else
        next()
      })
      .catch((err) => {
        console.log(err)
        console.log('ERROR')
      })
    }
  },
  { 
    path: '/wordbook', 
    name: 'WordBook', 
    component:WordBook,
    meta:{requiresAuth:true}
  },
  {
    path: '/profile', 
    name: 'ProFile', 
    component:ProFile,
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
    store.dispatch('loginCheck')
    .then(res => {
      console.log(res)
      if(res.login === 0){
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
