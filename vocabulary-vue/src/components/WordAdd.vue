<template>
  <div>
    <v-row class="word" v-for="w in words" :key="w.id">
      <!-- v-for="n in 5" :key="n.id" -->
      <v-col cols="4" md="3">
        <v-text-field v-model="w.chinese_character" label="한자"></v-text-field>
        <p>{{ w.chinese_character }}</p>
        <!-- outlined
            color="black" -->
      </v-col>
      <v-col cols="4" md="3">
        <v-text-field v-model="w.hiragana" label="히라가나"></v-text-field>
        <p>{{ w.hiragana }}</p>
      </v-col>
      <v-col cols="4" md="3">
        <v-text-field v-model="w.korean" label="뜻"></v-text-field>
        <p>{{ w.korean }}</p>
      </v-col>
      <v-col><v-btn>X</v-btn></v-col>
    </v-row>
  </div>
</template>

<script>
export default {
//   name: WordAdd,
  data() {
    return {};
  },
};
</script>