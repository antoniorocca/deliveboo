<template>
    <div class="cart_box">
        <a class="navbar-link" href="">
            Cart ({{ $store.state.cartCount }})
        </a>

        <div v-if="$store.state.cart.length > 0" class="car_product_dropdown">
            <a v-for="item in $store.state.cart"
                :key="item.id"
                class="navbar-item"
                href=""
            >
                <span class="removeBtn"
                    title="Remove from cart"
                    @click.prevent="removeFromCart(item)">X</span>

                {{ item.title }} x{{ item.quantity }} - ${{ item.totalPrice }}
            </a>

            <a class="navbar-item" href="">
                Total: ${{ totalPrice }}
            </a>

            <hr class="navbar-divider">

            <a class="navbar-item" href="">
                Checkout
            </a>
        </div>

        <div v-else class="navbar-dropdown is-boxed is-right">
            <a class="navbar-item" href="">
                Cart is empty
            </a>
        </div>
          
        <img src="img/payment.png" alt="">
    </div>
</template>

<script>
export default {
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
    }
}
}
</script>

<style>
.cart_box {
  position: relative;
  border: 1px solid black;
  width: 350px;
  height: 450px;
  display: flex;
  flex-direction: column;
  align-items: center;
  border-radius: 15px;
  padding: 20px;
}
.car_product_dropdown {
  display: flex;
  flex-direction: column;
}
.cart_box > img {
  width: 80%;
  position: absolute;
  top: 60%;
  left: 50%;
  transform: translate(-50%, -50%);
  opacity: .3;

}
.removeBtn {
    margin-right: 1rem;
    color: red;
}
</style>
