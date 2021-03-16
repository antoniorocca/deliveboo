const express = require('express');
const router = express.Router();
const braintree = require('braintree');

router.post('/', (req, res, next) => {
    const gateway = new braintree.BraintreeGateway({
        environment: braintree.Environment.Sandbox,
        // Use your own credentials from the sandbox Control Panel here
        merchantId: '8s2hkcj4nzhx89f9',
        publicKey: '97tmpgnwbbvp8mw6',
        privateKey: '3f1726a9bfee91ee6214f0787e8d7981'
    });

    // Use the payment method nonce here
    const nonceFromTheClient = req.body.paymentMethodNonce;
    // Create a new transaction for $10
    const newTransaction = gateway.transaction.sale({
        amount: '10.00',
        paymentMethodNonce: nonceFromTheClient,
        options: {
            // This option requests the funds from the transaction
            // once it has been authorized successfully
            submitForSettlement: true
        }
    }, (error, result) => {
        if (result) {
            res.send(result);
        } else {
            res.status(500).send(error);
        }
    });
});

module.exports = router;