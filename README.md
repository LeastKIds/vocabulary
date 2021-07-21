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
- 깃 허브 협업 방법
  - 맨 처음에 clone 으로 땡겨오기
  - 작업을 한 뒤에는 master 브랜치로 올리기
  - 그 다음부터는 작업 시작할 때 pull을 하고 작업하기
  - 커밋 할 땐 '이름 : 내용' 으로 한글로 작성하기
    - Ex) 김진홍 : 깃 커밋 이용 방법
- 데이터베이스 설계

![image-20210721192808999](/Users/gimjinhong/Library/Application Support/typora-user-images/image-20210721192808999.png)



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