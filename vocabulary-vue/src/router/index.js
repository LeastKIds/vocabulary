import Vue from 'vue'
import Router from 'vue-router'
import Login from '@/components/Login'
import SignUp from '@/components/SignUp'
import Main from '@/components/Main'

Vue.use(Router)

export default new Router({
  mode:'history',
  routes: [
    {
      path: '/singin',
      name: 'singin',
      component: SingIn
    },
    {
      path:'/signup',
      name:'SignUp',
      component: SignUp
    },
    {
      path: '/main',
      name: 'main',
      component: Main
    },
  ]
})
