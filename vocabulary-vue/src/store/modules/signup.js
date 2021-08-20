import axios from "axios"

export default {
    state:() => ({

    }),
    mutations: {
          
    },
    actions: {
        signup(commit, payload) {
            axios.post('/api/register', payload)
            .then((res) => {
                alert('Signup Success')
                return res.data
            })
            .catch(() => {
                console.log('Signup Fail.')
            })
            
        }
    }

}