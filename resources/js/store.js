let cart = window.localStorage.getItem('cart');
let cartCount = window.localStorage.getItem('cartCount');

let store = {
    state: {
        cart: cart ? JSON.parse(cart) : [],
        cartCount: cartCount ? parseInt(cartCount) : 0,
        categories: '',
        dishes : '',
        restaurants: '',
        selectedCategories:'',
        test: 'bomber',
    },

    mutations: {
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
        }
    },
    getters: {
      getCategories(state){
        return state.categories;
      },
      getDishes(state){
        return state.dishes;
      },
      getRestaurant(state){
        return state.restaurants;
      },
    },
    mutations: {
      // categoriesCall(state){
      //   // console.log('fake_call');
      //   // console.log(this.state.categories);
      //   // this.state.categories = 'pippo';
      //   // console.log(this.state.categories);
      //
      // },
      saveCall(state, resp){
        this.state.categories = resp[0];
        this.state.dishes = resp[1];
        this.state.restaurants = resp[2];

      }


    },
    actions: {
      axiosCall(context){
        console.log('call');
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
