# 단어장

<hr>

- 백엔드
  - ~~노드~~
  - 라라벨
- 프론트 엔드
  - 뷰
  - ~~?~~
- 데이터베이스
  - Mysql
- 회원가입
  - 기존의 라이브러리
  - ~~직접 만들기~~
- 로그인
  - 로그인 세션 유지
  - 로그인 체크
  - ~~SNS로그인~~
- 단어장
  - 한자, 히라가나, 한글 3가지로 저장
    - 사전 API 활용
  - 단어장 안에 단어들이 있는 형식
  - 오답노트
  - 공개 / 비공개
  - 공개 단어장 화면



- ERDcloud : https://www.erdcloud.com/ (데이터베이스 설정 사이트)
  - https://www.erdcloud.com/d/6AGdtfXu8XnAFb6Sk
- 깃 허브 협업 방법
  - 최초로 받기
    - 원하는 폴더 이동
    - git clone (주소)
    - Laravel 폴더로 이동해서 .env.example 파일을 복사본을 만들어서 .env 파일로 만듬
    - .env 파일 안에서 기초 설정 하기
    - laravel 폴더에서 composer install 실행
    - laravel 폴더에서 npm install 실행
    - laravel 폴더에서 php artisan key:generate 실행
    - laravel 폴더에서 php artisan migrate 실행
    - 그 다음은 php 서버를 키든가 하면 됨
    - Vue 폴더에서도 npm install 실행
    - 그 뒤로 뷰 서버를 열든가 하면 됨
  - 두 번째 부터
    - 작업 하기 전에 git pull
    - Laravel 폴더에서 php artisan migrate 실행
    - laravel 폴더에서 npm install 실행
    - vue 폴더에서 npm install 실행
    - 작업을 하고 난 뒤 마스터 브랜치로 커밋하기
    - 커밋은 '이름: 내용'으로 한글로 작성하기
      - ex) 김진홍: README 파일 수정
    - git push origin master 로 푸시하기
- 데이터베이스 설계

![image](https://user-images.githubusercontent.com/52005780/126865081-cf3064ce-6f1b-473b-ad4b-e94fad5229e0.png)





### 주의 사항

- .env.exemple 파일 지우지 말것. 사용하려면 복사본을 만든뒤 복사본을 이용할 것.

## 프론트 엔드

<hr>

1. 레이아웃 만들기
2. 오류 처리 구상
3. 비 정상적인 접근 방지
4. vocabulary-vue 폴더에서 npm run dev 입력하면 서버 실행



- 로그인화면 : /login
  회원가입화면:/signup
  메인화면:/hello



### axios

- ```bash
  npm install axios
  ```

- ```js
  <div id="app">
    <button v-on:click="fetchData">get data</button>
  </div>
  
  // get
  methods: {
      fetchData: function() {
        axios.get('주소')
          .then(function(response) {
            console.log(response);
          })
          .catch(function(error) {
            console.log(error);
          });
      }
    }
  ```

- ```js
  // post
  axios.post('주소', {title: "vue.js는 조으다."}) 
  .then(res => { console.log(res.data) })
  ```

- ```js
  // patch
  axios.patch('주소', {title: "vue.js는 조으다."}) 
    .then(res => { console.log(res.data) })
  
  
  ```

- ```js
  // delete
  axios.delete('주소')
    .then(res => { console.log(res.data) })
  
  
  ```

- ```js
  <form method="post" enctype="multipart/form-data" action="/contant/124/photo"> 
    <input type="file" name="photo" ref="photoimage"> 
      <input type="submit"> 
        </form>
  
  // form/data (사진이나 첨부파일)
  var data = new FormData(); 
  var file = this.$refs.photoimage.files[0]; 
  data.append('photo', file); 
  axios.post('/api/data/' + this.no + '/photo', data) 
    .then((res) => { this.result = res.data; }) 
    .catch((ex) => { console.log('사진업로드 실패', ex); });
  
  
  ```

- 

## 백엔드 

<hr>

1. API 기능 우선 만들기
2. 나중에 안드로이드위해 JSON으로 받을 경로 나누기
3. 개발용, 배포용 구분
4. 비 정상적인 접근 방지
5. vocabulary-laravel 폴더에서 php artisan serve 입력하면 서버 실행



- 구현 기능
  - 로그인
  - 페이지 이동 시 로그인 체크
  - 단어장 나열
  - 단어장 속 단어 나열

### axios 

- json 파싱
  - ```php
    public function get(Request $request) {
    
            $data1['name'] = 'Kim';
            $data1['age'] = 25;
            $data2['test'] = 'test';
            $data2['testQ'] = 'Testq';
            $data['user'] = $data1;
            $data['test'] = $data2;
            return $data;
        }
    ```

  - ```php
    {
        "user": {
            "name": "Kim",
            "age": 25
        },
        "test": {
            "test": "test",
            "testQ": "Testq"
        }
    }
    ```





### 단어장 CRUD

- create

  - ``` json
    // http://localhost:8000/voca/vocabulary/store
    // 위쪽 주소로 post
    {
    	"title" : "**단어장 제목**",
    	"user_id" : "**단어장 만드는 유저 아이디**",
    	"public" : "**공개할 껀지. 하면 1, 안하면 0**"
    }
    // 위의 양식으로 ** ** 부분만 바꿔서 제이슨으로 서버로 전송
    // 성공했을 시 vocabulary created 라고 적힘
    
    ```

- read

  - ```json
    // http://localhost:8000/voca/vocabulary/show
    // 위쪽 주소로 get
    
    [
        {
            "id": 3,
            "created_at": "2021-07-25T02:04:46.000000Z",
            "updated_at": "2021-07-25T02:04:46.000000Z",
            "public": 1,
            "user_id": 1,
            "title": "리스폰 확인용"
        },
        {
            "id": 2,
            "created_at": "2021-07-25T02:04:42.000000Z",
            "updated_at": "2021-07-25T02:04:42.000000Z",
            "public": 1,
            "user_id": 1,
            "title": "리스폰 확인용"
        },
        {
            "id": 1,
            "created_at": "2021-07-24T09:51:29.000000Z",
            "updated_at": "2021-07-24T09:51:29.000000Z",
            "public": 1,
            "user_id": 1,
            "title": "testㅇㅣㅂ니다"
        }
    ]
    
    // 위의 양식처럼 내용이 옴
    ```

- update

  - ```json
    // http://localhost:8000/voca/vocabulary/edit/{id}
    // 위 주소로 put으로 보냄
    {
    	"title" : "**단어장 제목**",
    	"public" : "**공개할 껀지. 하면 1, 안하면 0**"
    }
    // 위의 양식대로 json으로 보냄
    // 성공시 vocabulary edit 문구가 옴
    
    ```

- delete

  - ```json
    // http://localhost:8000/voca/vocabulary/delete/{id}
    // 위 주로소 delete로 보냄
    // 양식은 필요 없음.
    // 성공시 vocabulary delete 문구가 옴
    ```



### 단어 CRUD

- create

  - ```json
    // http://localhost:8000/voca/word/store
    // 위 주소로 post로 보내기
    [
        {
            "chinese_character": "**한자**",
            "hiragana": "**히라가나**",
            "korean": "**한글**",
            "user_id": **유저 아이디**,
            "vocabulary_id": **단어장 아이디**
        },
        {
            "chinese_character": "**한자**",
            "hiragana": "**히라가나**",
            "korean": "**한글**",
            "user_id": **유저 아이디**,
            "vocabulary_id": **단어장 아이디**
        }
     ]
    
    // 위의 형식으로 JsonArray 형식으로 보냄
    // 성공시 save words가 옴
    
    ```
    
  
- read

  - ```json
    // http://localhost:8000/voca/word/show/{vocabulary_id}
    // 위 주소로 get로 보내기
    [
        {
            "id": 2,
            "created_at": "2021-07-25T03:02:57.000000Z",
            "updated_at": "2021-07-28T03:22:01.000000Z",
            "chinese_character": "漢字1testetsetsetets",
            "hiragana": "かんじ",
            "korean": "한자",
            "important": 1,
            "user_id": 1,
            "vocabulary_id": 2
        },
        {
            "id": 3,
            "created_at": "2021-07-26T13:10:05.000000Z",
            "updated_at": "2021-07-26T13:10:05.000000Z",
            "chinese_character": "漢字1",
            "hiragana": "かんじ",
            "korean": "한자",
            "important": 0,
            "user_id": 1,
            "vocabulary_id": 2
        }
     ]
    
    // 위의 양식으로 response가 옴
    
    ```

- update

  - ```json
    // http://localhost:8000/voca/word/edit/{id}
    // 위의 주소로 put으로 보냄
    {
            "chinese_character": "**한자**",
            "hiragana": "**히라가나**",
            "korean": "**한글**"
    }
    
    // 위의 양식으로 보냄
    // 성공시 success eidt로 옴
    
    ```

- delete

  - ```json
    // http://localhost:8000/voca/word/delete/{id}
    // 위의 주소로 delete로 보냄
    // 양식은 필요 없음
    // 성공시 success delete가 옴
    
    
    ```

- important

  - ```json
    // http://localhost:8000/voca/word/important/{id}
    // 위의 주소로 put으로 보냄
    // 양식은 필요 없음
    // 중요도 표시가 안 된건 중요도 표시가 되고,
    // 중요도 표시가 된 건 중요도 표시가 안 되도록 바뀜.
    // 성공시 success important가 옴
    ```

