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

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('show-all', require('./components/ShowAll.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data:{
      // restaurants:'',
      // dishes:'',
      // categories:'',
    },
    mounted(){



    //   axios.get('api/restaurants').then(resp =>{
    //     console.log(resp.data.response);
    //   }).catch(error => {
    //         console.log(error);
    //     })




     //      Promise.all([
     //        axios.get('api/restaurants'),
     //        axios.get('api/dishes'),
     //        axios.get('api/categories'),
     //      ]).then(resp => {
     //        console.log(resp[0].data.response);
     //        console.log(resp[1].data.response);
     //        console.log(resp[2].data.response);
     //
     //        this.restaurants = resp[0].data.response;
     //        this.dishes = resp[1].data.response;
     //        this.categories = resp[2].data.response;
     //        return (ShowAll, { props: { restaurants: this.restaurants } });
     //      }).catch(error => {
     //        console.log(error);
     //      })
      },






});
