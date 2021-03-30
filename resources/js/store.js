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
        visibility: true ? JSON.parse(visibility) : false,

        // FUNZIONAMENTO NAVIGAZIONE
        showLanding:true,
        showMain:false,
        showSelectRestaurant:false,
        showRestaurant:false,
        showCart:true,
        showHeader:true,
        /////////////////////////////////////////

        // FUNZIONAMENTO SEARCH
        /////////////////////////////////////////////////////

        /////////////////////////////////////////


    },
    mutations: {

        saveView(state) {
            window.sessionStorage.setItem('visibility', JSON.stringify(state.visibility));
        },

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
          this.state.filteredRestaurant = [];
          this.state.restaurants.forEach((item, i) => {
              console.log(item);
              item.categories.forEach(element => {
                  console.log(element);
                  if (element.name === category) {
                      this.state.filteredRestaurant.push(item);
                  }
              });
          });
          this.state.showLanding = false;
          this.state.showMain = true;
          this.state.showSelectRestaurant = true;
        },
        search(state, search){

          this.state.filteredRestaurant = [];
          let lowSearch = search.toLowerCase();
          this.state.restaurants.forEach((item, i) => {
            let itemName = item.name.toLowerCase();
            if (itemName.includes(lowSearch)) {
              this.state.filteredRestaurant.push(item);
            }
          });
          this.state.showLanding = false;
          this.state.showMain = true;
          this.state.showSelectRestaurant = true;


        },
        selectAllRestaurants(state){
          this.state.filteredRestaurant = this.state.restaurants;
        },
        selectRestaurant(state, restaurant){
          this.state.selectedRestaurant2 = restaurant;
          console.log(this.state.selectedRestaurant2);
        },
        showCarouselRestaurant(state, restaurant){
          console.log(restaurant);
          this.state.selectedRestaurant2 = restaurant;
          if (this.state.showLanding) {
            this.state.showLanding = false;
            this.state.showMain = true;
            this.state.showSelectRestaurant = false;
            this.state.showRestaurant = true;
          }
        },
/////////////////////////////////////////////////////////////////////////////


        // FUNZIONAMENTO NAVIGAZIONE
///////////////////////////////////////////////////////////////////////
        toggleLanding(){
          this.state.showLanding = !this.state.showLanding;
        },
        toggleMain(){
          this.state.showMain = !this.state.showMain;
        },
        togglerestaurant(){
          this.state.showRestaurant = !this.state.showRestaurant;
        },
        toggleSelectRestaurant(){
          this.state.showSelectRestaurant = !this.state.showSelectRestaurant;
          this.state.showHeader = !this.state.showHeader;

        },
//////////////////////////////////////////////////////////////////////


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
