import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        data : {
            loginCheck:''
        }
    },
    getters: {
        isAuth(state) {
            if(state.accessToken==null) return false ;
            return true;
        }
    },
    mutations: {
        signin() {
            alert('signin')
        }
    },  
    actions: {
        signin({commit}, payload) {
            const data = { email:payload.email, password:payload.password}
            console.log(data)
            return axios.post('/api/login', data)
            .then(res => {
                if(res.status == 200) { // 로그인 성공
                    console.log('200')
                    commit('signin')
                }
            })
            .catch((err) => { // err
                console.log('err')               
                return Promise.reject(err)
            })
        },
        logout() {
            return axios.post('/api/logout', { withCredentials: true })
            .then((res) => {
                console.log(res.status)
                alert('logout')
            })
        },
    }

})