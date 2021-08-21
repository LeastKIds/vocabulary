import axios from "axios"


// 모듈 만들고 main.js 에 임폴트랑 밑에 내가 만든 모듈 이름 적어주기
export default {
    actions : {
            vocaSave(_,data){ //내가 원하는 함수를 만듬
                return axios.post('http://3.35.216.91/voca/vocabulary/store',data) // 리턴 post 는 보내는것 get는 받는것 /api/꼭 줘야함, 
                // 원래는 data자리에 {}가있지만 메인에서 내가 한꺼번에 보낼 놈들은 묶어 놨으니 그걸 사용

                .then(res => { // then은 오류가 아닌 결과값을 받는것 response,res 다 쓸 수 있음 (서버가 보내는 값)
                if(res.status == 200) { // 로그인 성공
                // console.log(res)  // 서버로 부터 반응 (여기 함수는 내가 보낸값을 확인 할 수 있음)
                return res //res 반환
                }
            })

            // 에러나는것은 고정
            .catch((err) => { // err 
                console.log('err')               
                return Promise.reject(err) 
            })
            },
            // vocaLoad(_,data){
            //     return axios.get('http://3.35.216.91/voca/vocabulary/show',data)
            
            //     .then(res => {
            //         if(res.status == 200 )}
            //         )
            // }
            
    
        }
}