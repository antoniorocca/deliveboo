let cart = window.localStorage.getItem('cart');
let cartCount = window.localStorage.getItem('cartCount');
let visibility = window.sessionStorage.getItem('visibility');

let store = {
    state: {
        cart: cart ? JSON.parse(cart) : [],
        cartCount: cartCount ? parseInt(cartCount) : 0,
        categories: '',
        dishes: '',
        restaurants: '',
        selectedCategories:[],
        filteredRestaurant:'',
        // variabile per toglerare tra carrello e checkout
        checkout:false,
        test: 'bomber',
        selectedRestaurant: [],
        selectedRestaurant2:'',
        visibility: true? JSON.parse(visibility) : false,
        searchBar:'',
    },
    mutations: {

        visibilityFunction(state){
            if (this.state.visibility == false) {
                this.state.visibility = true;
                // window.localStorage.setItem('v', visibility);
            } else {
                this.state.visibility = false;
                // window.localStorage.setItem('v', visibility);
            }
            this.commit('saveView');
        },
        saveView(state) {
            window.sessionStorage.setItem('visibility', JSON.stringify(state.visibility));
        },

      // TEST

      changeTest(state){
        state.test = 'ciao';
      },
      /////////////////
        addToCart(state, item) {
            let found = state.cart.find(product => product.id == item.id);

            if (found) {
                found.quantity++;
                found.totalPrice = found.quantity * found.price;
            } else {
                state.cart.push(item);

                Vue.set(item, 'quantity', 1);
                Vue.set(item, 'totalPrice', item.price);
            }

            state.cartCount++;
            this.commit('saveCart');
        },
        lessToCart(state, item) {
            let found = state.cart.find(product => product.id == item.id);

            if (found.quantity == 1) {
                let product = state.cart[index];
                state.cartCount -= product.quantity;


                state.cart.splice(index, 1);

            }
            else {
                found.quantity--;
                found.totalPrice = found.quantity * found.price;
            }

            state.cartCount--;
            this.commit('saveCart');
        },
        removeFromCart(state, item) {
            let index = state.cart.indexOf(item);

            if (index > -1) {
                let product = state.cart[index];
                state.cartCount -= product.quantity;

                state.cart.splice(index, 1);
            }
            this.commit('saveCart');
        },
        saveCart(state) {
            window.localStorage.setItem('cart', JSON.stringify(state.cart));
            window.localStorage.setItem('cartCount', state.cartCount);
        },
        saveCall(state, resp) {
            this.state.categories = resp[0].data.response;
            this.state.dishes = resp[1].data.response;
            this.state.restaurants = resp[2].data.response;
            this.state.filteredRestaurant = resp[2].data.response;
        },
        setSelectedCategoties(state, category) {
            this.state.selectedCategories = category;
        },

        // FUNZIONAMENTO SELEZIONE RISTORANTI
//////////////////////////////////////////////////////////////////////////

        filterRestaurant(state, category){
          this.state.filteredRestaurant = [];
          this.state.categories.forEach((item, i) => {
            if (item.name === category) {
              item.restaurants.forEach((item, i) => {
                this.state.filteredRestaurant.push(item);
              });
            }
          });
          console.log(this.state.filteredRestaurant);
        },
        selectAllRestaurants(state){
          this.state.filteredRestaurant = this.state.restaurants;
        },
        selectRestaurant(state, restaurant){
          this.state.selectedRestaurant2 = restaurant;
          console.log(this.state.selectedRestaurant2);
        },
/////////////////////////////////////////////////////////////////////////////


        setRestaurants(state, category) {
            this.state.selectedCategories = this.state.restaurants.data.response;
        },
        setSelectedRestaurant(state, restaurant) {
            // console.log(restaurant);
            this.state.selectedRestaurant = restaurant;
        },
        searchBar(state, s) {
            if (s == '') {
                this.state.filteredRestaurant = this.state.restaurants;
            } else {
                this.state.filteredRestaurant = s;
            }
            // console.log(s);
            // console.log(restaurant);
        },
        // funzione per toglerare tra carrello e checkout
        toggleCheckout(){

          this.state.checkout = !this.state.checkout

        },
        emptyCart(){
          this.state.cart = [];
          this.state.cartCount = 0;
          this.commit('saveCart');
        }

    },
    getters: {
        getCategories(state) {
            return state.categories;
        },
        getDishes(state) {
            return state.dishes;
        },
        getRestaurant(state) {
            return state.restaurants;
        },
        getSelectedCategories(state) {
            return state.selectedCategories;
        },
        getSelectedRestaurant(state) {
            return state.selectedRestaurant;
        },
    },
    actions: {
        axiosCall(context) {
            // console.log('call');
            Promise.all([
                axios.get('api/categories'),
                axios.get('api/dishes'),
                axios.get('api/restaurants'),
            ]).then(resp => {
                context.commit('saveCall', resp);
            }).catch(error => {
                console.log(error);
            })
        }

    }
};
export default store;
