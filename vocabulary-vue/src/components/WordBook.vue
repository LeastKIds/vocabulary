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
            v-bind:color="!btn.on ? 'none' : 'blue'"
            @click="clickedBtn(btn)"
            >뒤집기 {{ btn.id }}</v-btn
          >
        </v-col>
        <v-col>
          <v-btn
            class="shu"
            align="right"
            v-bind:color="!shuffle ? 'error' : 'success'"
            @click="shuffleOn"
          >
            <!-- 버튼 클릭시 셔플이 On되고 버튼색이 변한다 기능구현:X  boolean값이라 재클릭시 색이 안돌아감 수정필요-->
            섞기
          </v-btn>
        </v-col>
      </v-row>

      <v-row class="word" v-for="w in words" :key="w.id">
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
        <v-col>
          <v-btn class="ma-2" text icon color="blue lighten-2">
            <v-icon>mdi-thumb-up</v-icon>
          </v-btn>
          <v-btn @click="removeList()">X</v-btn></v-col
        >
      </v-row>
      <div class="my-2" align="right">
        <v-btn color="warning" dark large>
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
    };
  },
  methods: {
    shuffleOn() {
      this.shuffle = true;
    },
    clickedBtn(w) {
      this.buttons[w.id - 1].on = true;
    },
    wordAdd() {
      this.words.push({
        id: ++this.count,
        chinese_character: "",
        hiragana: "",
        korean: "",
      }),
        console.log(this.words);
    },
    removeList() {
      // this.words.splice(this.words.id, 1);
      const index = this.words.indexOf(this.words.id);
      this.words.splice(index - 2, 1);
    },
  },
};
</script>

<style scoped>
.blue {
  width: 200px;
  height: 200px;
  background-color: blue;
}
</style>