import Vue from 'vue'
import SignIn from '@/components/SignIn'
import SignUp from '@/components/SignUp'
import Main from '@/components/Main'
import WordBook from '@/components/WordBook'
import VueRouter from 'vue-router'


Vue.use(VueRouter)

const routes = [
  { path: '/',       name: 'Main',   component:Main },
  { path: '/signin', 
    name: 'Signin', 
    component:SignIn, 

    beforeEnter:(to, from, next) => {
      if(localStorage.getItem('accessToken') != null) {
        console.log(localStorage.getItem('accessToken'))
        alert('You already Signin')
        next('/')
      }
      next()
    }
  },
  { path: '/signup', 
    name: 'Signup', 
    component:SignUp,
    beforeEnter:(to, from, next) => {
      if(localStorage.getItem('accessToken') != null) {
        alert('You already Signin')
        next('/')
      }
      next()
    }
  },
  { path: '/main', 
    name: 'Main', 
    component:Main,
  },
  { path: '/wordbook', 
    name: 'WordBook', 
    component:WordBook
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

// router.beforeEach((to, from, next) => {
//     if(to.matched.some((recode) => recode.meta.requiresAuth)) {
//       console.log('Token Check')
//       if(localStorage.getItem('accessToken') == null) {
//         alert('Signin please')
//         next('/signin')
//       }
//       else if(localStorage.getItem('accessToken') != null) {
//         alert('You already Signin')
//         next('/')
//       }
//     }
//     next();
//   }
// )
export default router
