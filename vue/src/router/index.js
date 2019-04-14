import Vue from 'vue'
import Router from 'vue-router'
import home from '@/sites/home'
import dashboardAdmin from '@/sites/dashboardAdmin'



Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'home',
      component: home
    },
    {
      path: '/dashboardAdmin',
      name: 'dashboardAdmin',
      component: dashboardAdmin
    }
  ]
})
