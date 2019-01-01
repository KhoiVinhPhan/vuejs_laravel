
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
import { routes }  from './index';
Vue.component('pagination', require('laravel-vue-pagination'));

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes
})

// const app = new Vue({ router }).$mount('#app')

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('category-component', require('./components/categories/IndexComponent.vue').default);

// const app = new Vue({ router }).$mount('#app')
const app = new Vue({
    el: '#app',
    router
});

