/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


window.Vue = require('vue');
import VueRouter from 'vue-router'
import Vuex from 'vuex'
import StoreData from './store'

Vue.use(VueRouter)
Vue.use(Vuex)

const store = new Vuex.Store(StoreData)
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
import Vue from 'vue'
import VueLazyLoad from 'vue-lazyload'

Vue.use(VueLazyLoad)

Vue.component('main-page', require('./components/Main-Page.vue').default);

const routes = [
    { path: '/bingo', component: require('./components/Bingo').default, meta: {requiresAuth: true} },
    { path: '/trivia', component: require('./components/Trivia').default, meta: {requiresAuth: true} },
    { path: '/anecdotario', component: require('./components/Anecdotario.vue').default, meta: {requiresAuth: true} },
    { path: '/concurso-selfie', component: require('./components/Concurso-Selfie.vue').default, meta: {requiresAuth: true} },
    { path: '/tu-foto-cuenta', component: require('./components/Tu-Foto-Cuenta.vue').default, meta: {requiresAuth: true} },
    { path: '/login', component: require('./components/Login.vue').default, meta: {requiresVisitor: true} }
  ]

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



const router = new VueRouter({
    routes
  })

  router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
      // this route requires auth, check if logged in
      // if not, redirect to login page.
      if (!store.getters.loggedIn) {
        next({
          path: '/login',
          query: { redirect: to.fullPath }
        })
      } else {
        next()
      }
    }    else if (to.matched.some(record => record.meta.requiresVisitor)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (store.getters.loggedIn) {
          next({
            path: '/',
            query: { redirect: to.fullPath }
          })
        } else {
          next()
        }
      } {
      next() // make sure to always call next()!
    }
  })


const app = new Vue({
    router,
    store
}).$mount('#app');
