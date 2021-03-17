<head>
    <meta charset="utf-8">
    <script src="https://js.braintreegateway.com/web/dropin/1.27.0/js/dropin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Step one: add an empty container to your page -->
    <div id="dropin-container"></div>

    <script type="text/javascript">
        var data;
        axios.get('/api/token')
        .then(response =>{
            data = response.data;

            // call `braintree.dropin.create` code here
            // Step two: create a dropin instance using that container (or a string
            //   that functions as a query selector such as `#dropin-container`)
            braintree.dropin.create({
            authorization: data,
            container: document.getElementById('dropin-container'),
            // ...plus remaining configuration
            }, (error, dropinInstance) => {
            // Use `dropinInstance` here
            // Methods documented at https://braintree.github.io/braintree-web-drop-in/docs/current/Dropin.html
            });
        })
        .catch(error =>{

        });
    </script>
</body>