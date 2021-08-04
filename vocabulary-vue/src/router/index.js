import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Login from '@/components/Login'
import SignUp from '@/components/SignUp'
import Main from '@/components/Main'

Vue.use(Router)

export default new Router({
  mode:'history',
  routes: [
    {
      path: '/hello',
      name: 'HelloWorld',
      component: HelloWorld
    },
    {
      path: '/login',
      name: 'Login',
      component: Login
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
