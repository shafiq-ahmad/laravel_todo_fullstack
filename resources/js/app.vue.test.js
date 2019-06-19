/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
import VueRouter from 'vue-router';
Vue.use(VueRouter);
// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
//my code started
import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './components/Todo.vue';
import CreateTodo from './components/CreateTodo.vue';
Vue.use(VueAxios, axios);

/*const routes = [
  {
      name: 'home',
      path: '/',
      //component: HomeComponent
      component: App
  },
  {
      name: 'create',
      path: '/create',
      component: CreateTodo
  }

];*/

//my code ended


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
const routes = [
    {
        path: '/',
        components: {
            todo: 'todo'
        }
    },
    //{path: '/admin/companies/create', component: CompaniesCreate, name: 'createCompany'},
    //{path: '/admin/companies/edit/:id', component: CompaniesEdit, name: 'editCompany'},
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*const app = new Vue({
    el: '#app',
});*/

//const router = new VueRouter({ mode: 'history', routes: routes});
//const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');

