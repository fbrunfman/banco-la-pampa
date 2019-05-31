/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import 'babel-polyfill'
window.Vue = require('vue');
import VueRouter from 'vue-router'
import Vuex from 'vuex'
import StoreData from './store'
import VueSweetalert2 from 'vue-sweetalert2'
import Popover  from 'vue-js-popover'




const options = {
    confirm: '#41b882',
    cancel: '#ff7674'
}

Vue.use(VueRouter)
Vue.use(Vuex)
Vue.use(VueSweetalert2, options);
Vue.use(Popover)


const store = new Vuex.Store(StoreData)

/* store.subscribe((mutation, state) => {
	// Store the state object as a JSON string
	localStorage.setItem('store', JSON.stringify(state));
}); */


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
    { path: '/proximamente', component: require('./components/Proximamente').default, meta: {requiresAuth: true} },
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
