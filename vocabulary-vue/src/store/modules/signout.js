import axios from "axios"
export default{
    state:()=>({

    }),
    mutations:{
        // signout(state) {
            
        // }
    },
    actions:{
        signout() {
            return axios.post('/api/logout', { withCredentials: true })
            .then((res) => {
                console.log(res.status)
                alert('logout')
            })
        },
    }
}