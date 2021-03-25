<template>
    <form id="payment-form" action="api/token" method="post">

        <!-- Putting the empty container you plan to pass to
        `braintree.dropin.create` inside a form will make layout and flow
        easier to manage -->

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" maxlength="100" class="form-control" name="name" id="name" placeholder="Inserisci il tuo nome">
        </div>

        <div class="form-group">
            <label for="surname">Cognome</label>
            <input type="text" maxlength="100" class="form-control" name="surname" id="surname" placeholder="Inserisci il tuo cognome">
        </div>

        <div class="form-group">
            <label for="address">Indirizzo</label>
            <input type="text" maxlength="100" class="form-control" name="address" id="address" placeholder="Inserisci il tuo indirizzo">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" maxlength="100" class="form-control" name="email" id="email" placeholder="Inserisci la tua email">
        </div>

        <div id="dropin-container"></div>
        <div class="wrap">
            <input class="payment_btn" type="submit" value="Invia il pagamento">
            <a class="payment_btn" @click="toggleCheckout">ritorna carrello</a>
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
#payment-form{
    .wrap {
        display:flex;
        justify-content: space-between;
        .payment_btn {
        min-width: 150px;
        display: flex;
        justify-content: center;
        line-height: 50px;
        border-radius: 30px;
        background-color: #00a082;
        color: white;
        height: 50px;
        border: 0;
        }
    }
}

</style>
