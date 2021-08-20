import axios from "axios"

export default{
    state:() =>({

    }),
    mutations:{

    },
    actions:{
        signin(commit, payload) {
            let data = { email:payload.email, password:payload.password}
            axios.post('/api/login', data)
            .then(res => {
                if(res.status == 200) { // 로그인 성공
                    console.log('200')
                    alert('signin')
                    
                }
            })
            .catch((err) => { // err
                console.log('err')               
                return Promise.reject(err)
            })
        },
    }
}