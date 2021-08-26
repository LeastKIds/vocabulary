<template>
  <div>
    <v-container>
      <v-row>
        <v-col><h1>단어장 제목</h1></v-col>
      </v-row>
      <v-row class="word" v-for="(w, index) in words" :key="index">
        <!-- v-for="n in 5" :key="n.id" -->
        <v-col cols="4" md="3">
          <v-text-field
            v-model="w.chinese_character"
            label="한자"
          ></v-text-field>
          <!-- <p>{{ w.chinese_character }}</p> -->
          <!-- outlined
            color="black" -->
        </v-col>
        <v-col cols="4" md="3">
          <v-text-field v-model="w.hiragana" label="히라가나"></v-text-field>
          <!-- <p>{{ w.hiragana }}</p> -->
        </v-col>
        <v-col cols="4" md="3">
          <v-text-field v-model="w.korean" label="뜻"></v-text-field>
          <!-- <p>{{ w.korean }}</p> -->
        </v-col>
        <!-- 별클릭시 색변환 구현X -->
        <v-col class="ma-3">
          <v-btn
            class="hover"
            icon
            @mouseover="ishovering = true"
            @mouseleave="ishovering = false"
            @click="ishovering = !ishovering"
          >
            <v-icon>mdi-star</v-icon>
          </v-btn>
          <v-btn color="primary" @click="removeList(index)">X</v-btn></v-col
        >
      </v-row>
      <div class="my-2" align="right">
        <v-btn color="primary"
          ><router-link
            to="/wordread"
            style="text-decoration: none"
            class="white--text"
            >Read임시페이지</router-link
          ></v-btn
        >
        <v-btn color="#00B8D4" dark large @click="wordSave">
          저장하기 <v-icon right dark> mdi-cloud-upload </v-icon></v-btn
        >
      </div>
      <v-bottom-navigation grow horizontal>
        <v-btn @click="wordAdd">
          <h3>단어추가</h3>
          <v-icon color="blue" x-large>mdi-plus</v-icon>
        </v-btn>
      </v-bottom-navigation>
    </v-container>
  </div>
</template>

<script>
export default {
  data() {
    return {
      words: [
        {
          id: 0,
          chinese_character: "水泳",
          hiragana: "すいえい",
          korean: "수영",
        },
      ],
      count: 0,
      ishovering: false,
      hoverColor: "",
    };
  },
  methods: {
    wordAdd() {
      this.words.push({
        id: ++this.count,
        chinese_character: "",
        hiragana: "",
        korean: "",
      }),
        console.log(this.words);
    },
    removeList(index) {
      this.$delete(this.words, index);
    },
    wordSave() {
      const data = {
        vocabulary_id: 1, // 단어장의 id값을 받아와야함
        word: this.words,
      };
      // console.log(data);
      this.$store.dispatch("wordPush", data)
        .then((res) => {
          console.log(res);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style scoped>
.hover:hover {
  color: yellow;
}
</style>