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



### 진행사항

![KakaoTalk_Photo_2021-08-03-13-52-17](https://user-images.githubusercontent.com/52005780/127959859-d1036714-b0fb-4756-a790-05a9dfbb47ab.jpeg)

![KakaoTalk_Photo_2021-08-03-13-51-56](https://user-images.githubusercontent.com/52005780/127959790-b4b3d09c-7bb0-4d3f-8020-41b4aa9b9d73.jpeg)











### 주의 사항

- .env.exemple 파일 지우지 말것. 사용하려면 복사본을 만든뒤 복사본을 이용할 것.

## 프론트 엔드

<hr>

1. 레이아웃 만들기
2. 오류 처리 구상
3. 비 정상적인 접근 방지
4. vocabulary-vue 폴더에서 npm run serve 입력하면 서버 실행



- 로그인화면 : /signin
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





### 어드민 페이지

- 아마존 웹서버에 서버를 올려서 데이터베이스도 아마존 웹서비스에 있음

- 데이터베이스 제대로 데이터가 올라 갔는지 확인하기 위해 모든 정보를 볼 수 있는 어드민 페이지를 만듬

- 제대로 작동하는지 확인하기 위한 페이지. 그대로 주소창에 치면 됨

  - 유저 정보

    - ```
      http://localhost:8000/admin/users
      ```

  - 단어장 정보

    - ```
      http://localhost:8000/admin/vocabularies
      ```

  - 단어 정보

    - ```
      http://localhost:8000/admin/words/{vocabulary_id}
      ```



### 인증

- 회원가입

  - ```php
    http://localhost:8000/register
    // post
    {
       "name" : "이름",
       "email" : "이메일",
       "password" : "패스워드",
       "password_confirmation" : "패스워드랑 똑같이"
    }
    ```

- 로그인

  - ```php
    http://localhost:8000/login
    // post
    {
    	"email" : "이메일",
      "password" : "패스워드"
    }
    
    
    ```

- 로그아웃

  - ```php
    http://localhost:8000/logout
    // post
    // 다른 정보 필요 없음
    ```

- 로그인 체크

  - ```php
    http://localhost:8000/auth/user
    // get
    // 로그인 되어 있을 시
    {
      'login' : 1,
      'id' : 해당 아이디
    }
    
    // 로그인 안 되어있을 시
    {
      'login' : 0,
      'id' : null
    }
    
    
    ```

  - 

### 단어장 CRUD 그리고 여러가지

- create

  - ``` json
    // http://localhost:8000/voca/vocabulary/store
    // 위쪽 주소로 post
    {
    	"title" : "**단어장 제목**",
    	"public" : "**공개할 껀지. 하면 1, 안하면 0**"
    }
    // 위의 양식으로 ** ** 부분만 바꿔서 제이슨으로 서버로 전송
    
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
    
    ```
  
- delete

  - ```json
    // http://localhost:8000/voca/vocabulary/delete/{id}
    // 위 주로소 delete로 보냄
    // 양식은 필요 없음.
    
    ```

- 내 단어장 보기

  - ```php
    // http://localhost:8000/voca/vocabulary/myVoca
    // get
    // 양식 필요 없음
    [
        {
            "id": 10,
            "created_at": "2021-08-09T10:02:32.000000Z",
            "updated_at": "2021-08-09T10:02:32.000000Z",
            "public": 1,
            "user_id": 5,
            "title": "ㄴㄹㄴㄹ"
        },
      ...
    ]
    // 위의 양식으로 단어장 배열이 옴
    
    ```

- 내 단어장 내에서 검색기능

  - ```php
    // http://localhost:8000/voca/vocabulary/mySearch/{search}
    // get
    // 양식 필요 없음
    
    [
        {
            "id": 10,
            "created_at": "2021-08-09T10:02:32.000000Z",
            "updated_at": "2021-08-09T10:02:32.000000Z",
            "public": 1,
            "user_id": 5,
            "title": "ㄴㄹㄴㄹ"
        },
      ...
    ]
    // 위의 형식으로 단어장 배열이 옴
    ```

  - 공개 되어 있는 단어장 검색

    - ```php
      // http://localhost:8000/voca/vocabulary/search/{search}
      // get
      // 양식 필요 없음
      [
          {
              "id": 6,
              "created_at": "2021-08-04T04:41:04.000000Z",
              "updated_at": "2021-08-04T04:41:04.000000Z",
              "public": 1,
              "user_id": 1,
              "title": "12312313"
          },
          {
              "id": 7,
              "created_at": "2021-08-04T04:45:26.000000Z",
              "updated_at": "2021-08-04T04:45:26.000000Z",
              "public": 1,
              "user_id": 1,
              "title": "12312313"
          },
          {
              "id": 11,
              "created_at": "2021-08-09T10:23:37.000000Z",
              "updated_at": "2021-08-09T10:23:37.000000Z",
              "public": 1,
              "user_id": 5,
              "title": "123123"
          },
        ...
      ]
      
      // 위의 양식으로 public이 1인 단어장 배열이 옴
      ```

    - 

### 단어 CRUD 그리고 여러가지

- create

  - ```json
    // http://localhost:8000/voca/word/store
    // 위 주소로 post로 보내기
    {
      "vocabulary_id" : "단어장 아이디",
      "word" : [
        {
            "chinese_character": "**한자**",
            "hiragana": "**히라가나**",
            "korean": "**한글**",
        },
        {
            "chinese_character": "**한자**",
            "hiragana": "**히라가나**",
            "korean": "**한글**",
        }
      ]
    }
    // 위의 형식으로 JsonArray 형식으로 보냄
    
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
    
    ```
  
- delete

  - ```json
    // http://localhost:8000/voca/word/delete/{id}
    // 위의 주소로 delete로 보냄
    // 양식은 필요 없음
    
    
    ```
  
- important

  - ```json
    // http://localhost:8000/voca/word/important/{id}
    // 위의 주소로 put으로 보냄
    // 양식은 필요 없음
    // 중요도 표시가 안 된건 중요도 표시가 되고,
    // 중요도 표시가 된 건 중요도 표시가 안 되도록 바뀜.
    
    ```

- 단어 섞기

  - ```php
    // http://localhost:8000/voca/word/shuffle/{id}
    // get
    // id는 유저 id가 아니라 단어장 id
    // 양식 필요 없음
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
        },
      ...
     ]
    // 위의 양식으로 단어 배열이 옴.
    // 실행 시킬 때마다 섞임
    ```

  - 

### csrf오류 (419 오류)

 라라벨에서 포스트를 받을 때에는 csrf토큰이 필요하다. 이 토큰의 기능은 승인 되지 않은 코드가 들어오는 것을 막아준다. 우리는 블레이드템플릿에 form 태그 안에 @csrf 기능을 사용해 해결하곤 했다.

```html
// 예시
<form method="POST" action="/profile">
    @csrf 
    ...
</form>
```

포스트 맨에서 보낼 경우 토큰을 넣어 주어야 하지만 아직 넣어주는 방법을 모르므로 라라벨에서 잠시 이 기능을 꺼 놓아야 한다.

1. 라라벨 프로젝트폴더/app/Http/Middleware/VerifyCsrfToken.php로 들어간 뒤

```php
protected $except = [
        //
        'http://localhost:8000/voca/vocabulary/store',
        'http://localhost:8000/voca/vocabulary/delete/*',
        'http://localhost:8000/voca/vocabulary/edit/*',
        'http://localhost:8000/voca/word/store',
        'http://localhost:8000/voca/word/delete/*',
        'http://localhost:8000/voca/word/edit/*',
        '*'

    ];
```

2. 위와 같이 사용한다. 처음에는 일일이 적어주었지만 귀찮아서 *로 모든 요청에서 csrf를 무시해 버림



### access to xmlhttprequest at " " from origin " " has been blocked by cors policy:No ...

 vue에서 axios를 사용해 post로 보냈을 때, 라라벨 서버에서 받지 못하고 위의 오류가 뜨는 경우가 있다. 데이터를 주고 받을 때에는 같은 주소에서만 가능하다. 즉 http://localhost:8000 까지의 앞 부분이 같을 때에만 데이터를 주고받을 수 있다. vue의 경우 http://localhost:8080이고 라라벨의 경우 http://localhost:8000이기에 생기는 오류다. 실제로 배포를 할 때에는 vue의 파일을 포장해서 라라벨 public 폴더에 다 넣고 라라벨 서버만 켜서 사용하기때문에 문제 될것이 없는 상황이다. 다만 개발 단계에서 따로 개발할 경우에는 이런 오류가 생긴다. 이 역시 외부에서 무분별하게 들어오는 코드를 막기 위한 것으로 개발할 때에 잠시 꺼놓아야 한다. 

1. 라라벨 프로젝트 폴더 위치

2. php artisan make:middleware CORS

3. 라라벨 프로젝트폴더/app/Http/Middleware/CORS.php 안으로 들어감

```php
public function handle(Request $request, Closure $next)
{
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Allow-Credentials: false');
    return $next($request);
}
```

4. 위와 같이 작성

5. 라라벨 프로젝트폴더/app/Http/Kernel.php 들어감

6. ```php
   protected $routeMiddleware = [
       'cors' => \App\Http\Middleware\CORS::class,
       ...
   ];
   ```

7. 위와 같이 작성

8. web.php로 들어감

9. ```php
   Route::middleware(['cors'])->group(function(){
       Route::get('/csrf_token', function(){
           return csrf_token();
       });
   
       // 여기에 라우터를 쓰면 됨
   });
   ```

   
