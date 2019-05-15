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


Vue.component('main-page', require('./components/Main-Page.vue').default);

const routes = [
    { path: '/bingo', component: require('./components/Bingo').default },
    { path: '/anecdotario', component: require('./components/Anecdotario.vue').default },
    { path: '/concurso-selfie', component: require('./components/Concurso-Selfie.vue').default },
    { path: '/tu-foto-cuenta', component: require('./components/Tu-Foto-Cuenta.vue').default },
    { path: '/login', component: require('./components/Login.vue').default }
  ]

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({
    routes
  })

const app = new Vue({
    router,
    store
}).$mount('#app');
