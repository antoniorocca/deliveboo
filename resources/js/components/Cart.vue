<template>
    <div class="cart_box">

      <div class="resume_wrap" v-if="!this.$store.state.checkout">
        <span class="cart_count_span">
          Cart (<span>{{ $store.state.cartCount }}</span>)
        </span>

        <div class="scooter">
          <img src="img/scooter.png" alt="">
        </div>

        <div v-if="$store.state.cart.length > 0" class="cart_product_dropdown">
          <div class="cart_wrap">
            <div class="cart_product_item" v-for="item in $store.state.cart" :key="item.id">

              <span class="cart_item">
                {{ item.name }} x {{ item.quantity }} - <span>${{ item.totalPrice.toFixed(2) }}</span>
              </span>
              <div class="btn_box">
                <button @click="addToCart(item)"><i class="fas fa-plus"></i></button>
                <button class="trash" title="Remove from cart" @click.prevent="removeFromCart(item)"><i class="far fa-trash-alt"></i></button>
                <button v-if="item.quantity > 1" title="Less from cart" @click="lessToCart(item)"><i class="fas fa-minus"></i></button>
              </div>


            </div>
          </div>


          <span class="totalSpan">
            <span>Total: </span> ${{ totalPrice }}
          </span>

          <hr class="navbar_divider">
          <div class="wrapCheckout">

              <button class="checkoutBtn" @click="toggleCheckout" >
                Checkout
              </button>
              <button class="checkoutBtn" style="background-color:red" @click="emptyCart" >Svuota carrello</button>

          </div>
        </div>

        <div v-else class="navbar-dropdown is-boxed is-right">
          <a class="navbar-item" href="">
            Cart is empty
          </a>
        </div>

        <img class="phone" src="img/payment.png" alt="">
      </div>



        <edo-payment v-if="this.$store.state.checkout"></edo-payment>
    </div>
</template>

<script>
export default {
    data() {
      return {
        showCheckout:'',
      };
    },
    mounted(){
      this.showCheckout = this.$store.state.checkout;
    },
    computed: {
        totalPrice() {
            let total = 0;

            for (let item of this.$store.state.cart) {
                total += item.totalPrice;
            }

            return total.toFixed(2);
        }
    },
    methods: {
        removeFromCart(item) {
            this.$store.commit('removeFromCart', item);
        },
        lessToCart(item) {
            console.log(item);
            this.$store.commit('lessToCart', item);
        },
        addToCart(item) {
            this.$store.commit('addToCart', item);
        },
        toggleCheckout(){
          this.$store.commit('toggleCheckout');
          this.showCheckout = this.$store.state.checkout;
        },
        emptyCart(){
          console.log('empty');
          this.$store.commit('emptyCart');
        },
        toggle(){
            if (this.$store.state.visibility == false) {
                this.$store.commit('visibilityFunction')
                console.log('false');
            } else {
                this.$store.commit('visibilityFunction')
                console.log('true');
            }
        },
        // post_cart(){
        //   let cart = {
        //       cart: JSON.stringify(this.$store.state.cart)
        //   }
        //   axios.post('/payment', cart);
        // }
    }
}
</script>

<style  scoped lang="scss">
.cart_box {
    box-shadow:  0 0 10px #acacac;
    width: 400px;
    max-height: 560px;
    display: flex;
    flex-direction: column;
    align-items: center;
    border-radius: 15px;
    padding: 20px;
    .resume_wrap{
        width: 350px;
        .cart_count_span{
            font-size: 23px;
            font-weight: 600;
            display: flex;
            justify-content: center;
            span{
            color: #00a082;
            }
        }
        .scooter{
            text-align: center;
            img{
            height: 40px;
            }
        }
        .cart_product_dropdown {
            display: flex;
            flex-direction: column;
            z-index: 99;
            position: relative;
            z-index: 100;
            .cart_wrap{
            overflow: auto;
            height: 300px;
            padding: 5px;

            .cart_product_item{
                line-height: 50px;
                font-weight: 600;
                padding: 10px;
                border-radius: 10px;
                margin-top: 10px;
                background-color: #f4f4f4;
                box-shadow:  0 0 10px #acacac;
                .cart_item{
                font-size: 20px;
                font-weight: 600;
                span{
                    color: #00a082;
                }
                }
                .btn_box{
                display: flex;
                justify-content: space-between;
                padding: 5px;
                button {
                    font-size: 20px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    padding: 5px;
                    border-radius: 50%;
                    height: 40px;
                    width: 40px;
                    color: #00a082;
                    background-color: #00a08317;
                    border: none;
                }
                .trash{
                    color: red;
                }
                }

            }
            };
            .wrapCheckout{
            display: flex;
            justify-content: space-between;
            .checkoutBtn{
                display: flex;
                justify-content: center;
                line-height: 50px;
                border-radius: 30px;
                background-color: #00a082;
                color: white;
                height: 50px;
                width: 120px;
            }
            }
            .totalSpan{
            font-size: 20px;
            font-weight: 600;
            padding: 20px;
            span{
                color: #00a082;
            }
            }
            .navbar_divider{
            margin-top: 0;
            }
        }
        .phone {
            height: 70%;
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: .15;

        }
    }

}
@media all and (max-width: 880px) {
  .cart_box{
    .resume_wrap{
      width: 250px;
    }
    .resume_wrap{
      .phone{
        width: 300px;
      }
    }
  }

}
@media all and (max-width: 580px) {
  .cart_box{
    position: absolute;
  }

}
@media all and (max-width: 780px) {
    .cart_box{
      width: 100%;
  }
}
</style>
