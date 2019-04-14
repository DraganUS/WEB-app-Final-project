import Vue from 'vue'
import Router from 'vue-router'
import home from '@/sites/home'
import dashboardAdmin from '@/sites/dashboardAdmin'
import userlist from '@/sites/userList'
import addUser from '@/sites/addUser'
import editUser from '@/sites/editUser'

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
      component: dashboardAdmin,
    },
    {
      path: '/userlist',
      name: 'userlist',
      component: userlist,
    },
    {
      path: '/editUser',
      name: 'editUSer',
      component: editUser,
    },
    {
      path: '/addUser',
      name: 'addUSer',
      component: addUser,
    }  
  ]
})
