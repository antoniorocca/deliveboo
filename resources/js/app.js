// TODO: ORDINARE IN MODO COERENTE APP.JS

window.Vue = require('vue');
import VueRouter from 'vue-router';
import ShowAll from './components/ShowAll';

// import RestaurantComponent from './components/RestaurantComponent';
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// Vue.use(VueRouter)
//
// const Foo = { template: '<div>foo</div>' }
// // const Bar = { template: '<div>bar</div>' }
//
// const routes = [
//   { path: '/foo', component: Foo },
//   { path: '/generali', component: ShowAll, name:'ShowAll' }
// ]
//
//
// const router = new VueRouter({
//   routes // short for `routes: routes`
// })

// esempio componente
Vue.component('restaurant-component', require('./components/RestaurantComponent.vue').default);
Vue.component('to-top', require('./components/ToTop.vue').default);
Vue.component('category-component', require('./components/CategoryComponent.vue').default);




// TODO:
// APP VUE DA ELIMINARE - INUTILE
// const app = new Vue({
//   router,
//   data:{
//   },
// }).$mount('#app');
//



// CARRELLO
// TODO:
// DIVENTERA' MAIN APP

import store from './store.js';
Vue.component('products-list', require('./components/ProductsList.vue').default);
Vue.component('cart-dropdown', require('./components/Cart.vue').default);
Vue.component('landing-component', require('./components/LandingComponent.vue').default);
Vue.component('edo-categories', require('./components/EdoCategories.vue').default);
Vue.component('edo-restaurants', require('./components/EdoRestaurants.vue').default);


const app = new Vue({
    el: '#app',
    store: new Vuex.Store(store),
    data:{
      showLanding : true,
      showMain : false,
      search:'',
    },
    methods:{
      switchMain : function(){
        console.log('switch');
        this.showMain = true;
        this.showLanding = false;

      },
    },
    mounted(){
      this.$store.dispatch('axiosCall')
    }
});


// LANDING COMPONENT





/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('show-all', require('./components/ShowAll.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
//     data:{
//     },
//     mounted(){

//     },

// });
