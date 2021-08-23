<template>
  <div>
    <v-container>
      <v-row>
        <v-col
          align="center"
          class="justify around"
          v-for="btn in buttons"
          :key="btn.id"
          cols="3"
          sd="1"
        >
          <v-btn
            style="width: 280px"
            v-bind:color="!btn.on ? 'none' : 'primary'"
            @click="btn.on = !btn.on"
            >뒤집기 {{ btn.id }}</v-btn
          >
        </v-col>
        <v-col>
          <v-btn
            class="shu"
            align="right"
            v-bind:color="!shuffle ? 'error' : 'success'"
            @click="shuffle = !shuffle"
          >
            <!-- 버튼 클릭시 셔플이 On되고 버튼색이 변한다 기능구현:X  boolean값이라 재클릭시 색이 안돌아감 수정필요-->
            섞기
          </v-btn>
        </v-col>
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
          <v-btn
            icon
            style="fontsize: 25px"
            color="error"
            @click="removeList(index)"
            >X</v-btn
          ></v-col
        >
      </v-row>
      <div class="my-2" align="right">
        <v-btn color="warning" dark large @click="wordSave()">
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
      buttons: [
        { id: 1, on: false },
        { id: 2, on: false },
        { id: 3, on: false },
      ],
      words: [{ id: 0, chinese_character: "", hiragana: "", korean: "" }],
      // chinese_character: [],
      // hiragana: [],
      // korean: [],
      shuffle: false,
      count: 0,
      // likes: [{ id: 0, hover: false, hoverColor:'' }],
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
        // this.likes.push({
        //   id: ++this.count,
        //   hover: false,
        //   hoverColor:''
        // });
        console.log(this.words);
    },
    removeList(index) {
      this.$delete(this.words, index);
    },
    wordSave() {
      const data = {
        vocabulary_id: {},
        word: [
          {
            chinese_character: this.words.chinese_character,
            hiragana: this.words.hiragana,
            korean: this.words.korean,
          },
        ],
      };
      this.$store
        .dispatch("wordPush", data)
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