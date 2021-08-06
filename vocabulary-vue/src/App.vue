<template>
  <v-app>
    <v-app-bar app color="primary" dark>
      <span class="mr-2">Latest Release</span>
      <v-icon>mdi-open-in-new</v-icon>
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
