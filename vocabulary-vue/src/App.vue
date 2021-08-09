<template>
  <v-app>
    <v-app-bar app color="primary" dark>
      <router-link to="/">
        <v-icon>mdi-book-alphabet</v-icon>
      </router-link>
      <span class="ml-2">Vocabulary</span>
    </v-app-bar>

    <v-main>
      <router-view></router-view>
    </v-main>
  </v-app>
</template>

<script>

// import Main from './components/Main.vue'
export default {
  name: 'App',

  components: {
    // Main
  },

  data: () => ({
    //
  }),
};
</script>
