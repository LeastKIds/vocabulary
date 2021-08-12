import Vue from 'vue'
import App from './App.vue'
import vuetify from './plugins/vuetify'
import VueCookies from 'vue-cookies'
import router from './router'
import store from './store'

Vue.use(VueCookies)


Vue.config.productionTip = false

new Vue({
  vuetify,
  router,
  store,
  beforeCreate() {
    this.$store.commit('getAccessToken')
  },
  render: h => h(App)
}).$mount('#app')


