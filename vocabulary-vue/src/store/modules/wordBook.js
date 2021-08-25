import axios from "axios";

export default {
    actions:{
        wordPush(_, data) {
            axios.post('/api/voca/word/store', data)
            .then((res) => {
                if(res.status == 200){
                    alert("단어를 저장하였습니다")
                    return res
                }
            })
            .catch((err) => {
                console.log(err)
                return Promise.reject(err)
            })
        }
    }
}