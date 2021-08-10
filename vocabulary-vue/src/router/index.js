import Vue from 'vue'
import Router from 'vue-router'
import SignIn from '@/components/SignIn'
import SignUp from '@/components/SignUp'
import Main from '@/components/Main'

Vue.use(Router)

export default new Router({
  mode:'history',
  routes: [
    {
      path: '/signin',
      name: 'signin',
      component: SignIn
    },
    {
      path:'/signup',
      name:'signUp',
      component: SignUp
    },
    {
      path: '/hello',
      name: 'main',
      component: Main
    },
  ]
})
