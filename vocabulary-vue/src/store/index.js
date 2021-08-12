import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import VueCookies from 'vue-cookies'

Vue.use(Vuex)
Vue.use(VueCookies)

export default new Vuex.Store({
    state: {
        accessToken: null
    },
    getters: {
        isAuth(state) {
            if(state.accessToken==null) return false ;
            return true;
        }
    },
    mutations: {
        signin(state, cookie) {
            state.accessToken = cookie
            localStorage.setItem('accessToken', state.accessToken)
        },
        getAccessToken(state) {
            state.accessToken = localStorage.getItem('accessToken')
        },
        logout(state) {
            state.accessToken=null;
            localStorage.removeItem('accessToken')
            VueCookies.remove('XSRF-TOKEN')
            alert('Logout')
        }
    }, 
    actions: {
        signin({commit}, payload) {
            const data = { email:payload.email, password:payload.password }
            return axios.post('/api/login', data)
            .then(res => {
                if(res.status == 200) { // 로그인 성공
                    let cookie = VueCookies.get('XSRF-TOKEN')
                    console.log('200')
                    console.log(cookie)
                    commit('signin', cookie)
                }
            })
            .catch((err) => { // err
                console.log('err')
                commit('loginFailed')
                return Promise.reject(err)
            })
        },
    }

})