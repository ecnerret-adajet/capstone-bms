/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

//home
Vue.component('home-index', require('./components/HomeIndex.vue').default);

//blood requests
Vue.component('bloodrequest-index', require('./components/bloodrequest/Index.vue').default);
Vue.component('bloodrequest-create', require('./components/bloodrequest/Create.vue').default);

// donor
Vue.component('donor-index', require('./components/donor/Index.vue').default);
Vue.component('donor-create', require('./components/donor/Create.vue').default);

//hospital
Vue.component('hospital-index', require('./components/hospital/Index.vue').default);
Vue.component('hospital-create', require('./components/hospital/Create.vue').default);

//user
Vue.component('user-index', require('./components/user/Index.vue').default);
Vue.component('user-create', require('./components/user/Create.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
