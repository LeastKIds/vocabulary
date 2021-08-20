<template>
  <v-app id="app">
    <v-app-bar app color="primary" dark>
      <router-link to="/">
        <v-icon>mdi-book-alphabet</v-icon>
      </router-link>
      <span class="ml-2"><h2>Vocabulary</h2></span>
      <v-spacer></v-spacer>
    </v-app-bar>

    <v-main>
      <Navigation></Navigation>
      <router-view></router-view>
    </v-main>
    
  </v-app>
</template>

<script>
import Navigation from '@/components/Navigation.vue'

export default {
  name: 'App',

  components: {
    Navigation
  },

  data: () => ({
  })
}
</script>
