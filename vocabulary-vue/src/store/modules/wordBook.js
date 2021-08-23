import axios from "axios";

export default {
    actions:{
        wordPush(_, data) {
            axios.post('/api/voca/word/store', data)
            .then((res) => {
                console.log(res)
                alert("단어를 저장하였습니다")
            })
            .catch((err) => {
                console.log(err)
                return Promise.reject(err)
            })
        }
    }
}