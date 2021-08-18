import Vue from 'vue'
import Vuex from 'vuex'
import signin from './modules/signin'
import signout from './modules/signout'
import signup from './modules/signup'
import loginCheck from './modules/loginCheck'
import mainvoca from './modules/mainvoca'

Vue.use(Vuex)

export default new Vuex.Store({
    modules:{
        signin,
        signout,
        signup,
        loginCheck,
        mainvoca
    }
})