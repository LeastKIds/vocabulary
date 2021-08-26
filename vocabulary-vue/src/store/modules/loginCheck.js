import axios from "axios"

export default {
    state:() => ({
        loginCheck: 0,
    }),
    mutations:{
        loginCheck(state, login) {
            state.loginCheck = login
        }
    },
    actions:{
        loginCheck({commit}) {
            return axios.get('/api/auth/user')
            .then((res) => {
                commit('loginCheck', res.data.login)
                return res.data
            })
            .catch((err) => {
                console.log(err)
                console.log('login check fail')
            })
        }
    }
}