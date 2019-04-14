// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import axios from 'axios'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
// import VueMaterial from 'vue-material'
import Vuelidate from 'vuelidate'

Vue.use(Vuelidate)
Vue.use(Vuetify)
// Vue.use(VueMaterial)

Vue.config.productionTip = false

// Helpers
import colors from 'vuetify/es5/util/colors'

Vue.use(Vuetify, {
  theme: {
    primary: colors.red.darken1, // #E53935
    secondary: colors.red.lighten4, // #FFCDD2
    accent: colors.indigo.base // #3F51B5
  }
})

/* eslint-disable no-new */
new Vue({
  el: '#app',
  axios,
  router,
  Vuetify,
  Vuelidate,
  components: { App },
  template: '<App/>'
})