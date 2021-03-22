<template>
  <form id="payment-form" action="api/token" method="post">

    <!-- Putting the empty container you plan to pass to
    `braintree.dropin.create` inside a form will make layout and flow
    easier to manage -->

    <input type="text" name="" value="ciao">
    <div id="dropin-container">
    </div>
    <input type="submit" />
    <input type="hidden" id="nonce" name="payment_method_nonce"/>
    <input type="hidden" id="cart" name="cart"/>
  </form>
</template>

<script>
    export default {
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
