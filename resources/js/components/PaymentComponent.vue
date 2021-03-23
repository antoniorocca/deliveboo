<template>
  <form id="payment-form" action="api/token" method="post">

    <!-- Putting the empty container you plan to pass to
    `braintree.dropin.create` inside a form will make layout and flow
    easier to manage -->


    <div id="dropin-container">
    </div>
    <div class="wrap">
      <input class="glovo_btn" type="submit" value="Invia il pagamento">
      <a class="glovo_btn" @click="toggleCheckout">ritorna carrello</a>
    </div>
    <input type="hidden" id="nonce" name="payment_method_nonce"/>
    <input type="hidden" id="cart" name="cart"/>
  </form>
</template>

<script>
    export default {
        methods:{
          toggleCheckout(){
            this.$store.commit('toggleCheckout');
            console.log(this.$store.state.checkout);
          }

        },
        mounted() {
            console.log('Component payment mounted.');
            console.log('ciao');
              var data;
              axios.get('/api/token')
              .then(response =>{



                  data = response.data;

                  // call `braintree.dropin.create` code here
                  const form = document.getElementById('payment-form');

                  braintree.dropin.create({
                    authorization: data,
                    container: '#dropin-container'
                  }, (error, dropinInstance) => {
                    if (error) console.error(error);

                    form.addEventListener('submit', event => {
                      event.preventDefault();

                      dropinInstance.requestPaymentMethod((error, payload) => {
                        if (error) console.error(error);

                        // Step four: when the user is ready to complete their
                        //   transaction, use the dropinInstance to get a payment
                        //   method nonce for the user's selected payment method, then add
                        //   it a the hidden field before submitting the complete form to
                        //   a server-side integration
                        document.getElementById('nonce').value = payload.nonce;
                        document.getElementById('cart').value = JSON.stringify(this.$store.state.cart);
                        form.submit();
                      });
                    });
                  });
              })
              .catch(error =>{

              });

        }
    }
</script>
<style  scoped lang="scss">
.wrap {
  display:flex;
  justify-content: center;

  .glovo_btn {
    max-width: 100px!important;
    display: flex!important;
    justify-content: center!important;
    line-height: 50px!important;
    border-radius: 30px!important;
    background-color: #00a082!important;
    color: white!important;
    height: 50px!important;
    border: 0!important;

  }
}

</style>
