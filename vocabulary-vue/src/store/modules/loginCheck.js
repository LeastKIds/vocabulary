import axios from "axios"

export default {
    state:() => ({
        loginCheck: 0,
    }),
    mutations:{
        loginCheck(state, login) {
            state.loginCheck = login
            console.log('state.loginCheck : ' + state.loginCheck)
        }
    },
    actions:{
        loginCheck({commit}) {
            console.log('hello')
            axios.get('/api/auth/user')
            .then((res) => {
                console.log(res)
                commit('loginCheck', res.data.login)
                return res.data.login
            })
            .catch((err) => {
                console.log(err)
                console.log('login check fail')
            })
        }
    }
}