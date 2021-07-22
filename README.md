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
    - laravel 폴더에서 nom Install 실행
    - laravel 폴더에서 php artisan key:generate 실행
    - laravel 폴더에서 php atiran migrate 실행
    - 그 다음은 php 서버를 키든가 하면 됨
    - Vue 폴더에서도 npm install 실행
    - 그 뒤로 뷰 서버를 열든가 하면 됨
  - 두 번째
    - 작업 하기 전에 git pull
    - Laravel 폴더에서 php artisan migrate 실행
    - laravel 폴더에서 npm install 실행
    - vue 폴더에서 npm install 실행
    - 작업을 하고 난 뒤 마스터 브랜치로 커밋하기
    - 커밋은 '이름: 내용'으로 한글로 작성하기
      - ex) 김진홍: README 파일 수정
    - git push origin master 로 푸시하기
- 데이터베이스 설계

<img width="1033" alt="스크린샷 2021-07-21 오후 7 27 18" src="https://user-images.githubusercontent.com/52005780/126475014-49f25f0e-7211-4d41-8235-1743caf5aebf.png">



## 프론트 엔드

<hr>

1. 레이아웃 만들기
2. 오류 처리 구상
3. 비 정상적인 접근 방지
4. vocabulary-vue 폴더에서 npm run serve 입력하면 서버 실행

## 백엔드 

<hr>

1. API 기능 우선 만들기
2. 나중에 안드로이드위해 JSON으로 받을 경로 나누기
3. 개발용, 배포용 구분
4. 비 정상적인 접근 방지
5. vocabulary-laravel 폴더에서 php artisan serve 입력하면 서버 실행

### axios 

- json 파싱
  - ```
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

  - ```
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