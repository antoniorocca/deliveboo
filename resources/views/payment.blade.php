<head>
    <meta charset="utf-8">
    <script src="https://js.braintreegateway.com/web/dropin/1.27.0/js/dropin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>

<div id="app">
  <form id="payment-form" action="api/token" method="post">
    <!-- Putting the empty container you plan to pass to
    `braintree.dropin.create` inside a form will make layout and flow
    easier to manage -->

    <div id="dropin-container"></div>
    <input type="submit" />
    <input type="hidden" id="nonce" name="payment_method_nonce"/>
  </form>
</div>








    <script type="text/javascript">
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
                  form.submit();
                });
              });
            });
        })
        .catch(error =>{

        });
    </script>
</body>
