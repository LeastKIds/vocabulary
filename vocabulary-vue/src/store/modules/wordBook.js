import axios from "axios"

export default {
    actions:{
        wordPush(_,data) {
            return axios.post('api/voca/word/store', data)
            .then((res) => {
                if(res.status == 200){
                    return res
                }
            })
            .catch((err) => {
                console.log('err')
                return Promise.reject(err)
            })
        },
        // 단어장의 id값이 공유가 안되서 현재 생각한 방법은 Main페이지에 state로 단어장 id값을 주고 그것을 끌어오는 식으로 시험해야할듯하다
        wordGet() {
            // const id = this.$route.params.id
            return axios.get('api/voca/word/show/1') 
            .then(res=> {
                if(res.status == 200){
                    console.log(res)
                    return res
                }
            })
            .catch((err) => {
                console.log(err)
            })
        }
    }
}