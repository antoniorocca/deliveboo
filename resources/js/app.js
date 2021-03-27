window.Vue = require('vue');
import store from './store.js';
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


Vue.component('restaurant-component', require('./components/RestaurantComponent.vue').default);
Vue.component('to-top', require('./components/ToTop.vue').default);
Vue.component('search-component', require('./components/SearchComponent.vue').default);
Vue.component('category-component', require('./components/CategoryComponent.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);
Vue.component('dish-component', require('./components/FooterComponent.vue').default);
Vue.component('selected-restaurant', require('./components/SelectedRestaurant.vue').default);
Vue.component('carousel-component', require('./components/CarouselComponent.vue').default);
Vue.component('header-component', require('./components/HeaderComponent.vue').default);
Vue.component('plate-component', require('./components/PlateComponent.vue').default);




// test product list


Vue.component('cart-dropdown', require('./components/Cart.vue').default);
Vue.component('landing-component', require('./components/LandingComponent.vue').default);
Vue.component('edo-categories', require('./components/EdoCategories.vue').default);
Vue.component('edo-restaurants', require('./components/EdoRestaurants.vue').default);
Vue.component('selected-restaurant', require('./components/SelectedRestaurant.vue').default);
Vue.component('edo-payment', require('./components/PaymentComponent.vue').default);
Vue.component('checkout', require('./components/CheckoutComponent.vue').default);


const app = new Vue({
	el: '#app',
	store: new Vuex.Store(store),
	data: {
		showLanding: true,
		showMain: false,
		search: '',
	},
	methods:{

		switchMain : function(){
			console.log('switch');
			this.showMain = true;
			this.showLanding = false;
		},

	},

	mounted(){
		this.$store.dispatch('axiosCall');
	}
});