<template>
    <form id="payment-form" @submit="checkForm" action="api/token" method="post">

        <!-- Putting the empty container you plan to pass to
        `braintree.dropin.create` inside a form will make layout and flow
        easier to manage -->

        <p v-if="errors.length">
            <b>Please correct the following error(s):</b>
            <ul>
                <li v-for="error in errors">{{ error }}</li>
            </ul>
        </p>

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" v-model="name" maxlength="100" class="form-control" name="name" id="name" placeholder="Inserisci il tuo nome" required>
        </div>

        <div class="form-group">
            <label for="surname">Cognome</label>
            <input type="text" v-model="surname" maxlength="100" class="form-control" name="surname" id="surname" placeholder="Inserisci il tuo cognome" required>
        </div>

        <div class="form-group">
            <label for="address">Indirizzo</label>
            <input type="text" v-model="address" maxlength="100" class="form-control" name="address" id="address" placeholder="Inserisci il tuo indirizzo" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" v-model="email" maxlength="100" class="form-control" name="email" id="email" placeholder="Inserisci la tua email" required>
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
        data() {
            return{
                errors: [],
                name: null,
                surname: null,
                address: null,
                email: null,
            };
        },
        methods:{
            toggleCheckout(){
                this.$store.commit('toggleCheckout');
                console.log(this.$store.state.checkout);
            },
            checkForm: function (e) {
                if (this.name && this.surname && this.address && this.email) {
                    return true;
                }

                this.errors = [];

                if (!this.name) {
                    this.errors.push('Name required.');
                }
                if (!this.surname) {
                    this.errors.push('Surname required.');
                }
                if (!this.address) {
                    this.errors.push('Address required.');
                }
                if (!this.email) {
                    this.errors.push('Email required.');
                }

                e.preventDefault();
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
    overflow-y: auto;
    width: 350px;
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
            margin-top: 10px;
            cursor: pointer;
            text-decoration: none;
        }
    }
}

</style>
