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
          <v-btn style="width: 280px">뒤집기 {{ btn.id }}</v-btn>
        </v-col>
        <v-col><v-btn align="right" color="error">섞기</v-btn> </v-col>
      </v-row>
      <v-row class="word" v-for="n in 5" :key="n.id">
        <!-- v-for="n in 5" :key="n.id" -->
        <v-col cols="4" md="3">
          <v-text-field v-model="한자" label="한자"></v-text-field>
          <!-- outlined
            color="black" -->
        </v-col>
        <v-col cols="4" md="3">
          <v-text-field v-model="히라가나" label="히라가나"></v-text-field>
        </v-col>
        <v-col cols="4" md="3">
          <v-text-field v-model="뜻" label="뜻"></v-text-field>
        </v-col>
        <v-col><v-btn>X</v-btn></v-col>
      </v-row>
      <v-bottom-navigation grow>
        <v-btn>
          <h3>단어추가</h3>
          <v-icon color="blue" x-large>mdi-plus</v-icon>
        </v-btn>
      </v-bottom-navigation>
    </v-container>
  </div>
</template>

<script>
export default {
  //   name: WordList,
  data() {
    return {
      buttons: [
        { id: 1, color: "blue" },
        { id: 2, color: "black" },
        { id: 3, color: "red" },
      ],
      words: [{ chinese_character: "", hiragana: "", korean: "" }],
      delete: false,
      count: 0,
    };
  },
  methods: {
    clickBtn() {
      this.btn;
    },
    addWordList() {},

    addNum() {
      this.count += 1;
    },
  },
};
</script>

<style scoped>
</style>