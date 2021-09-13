$(function(){
    paypal.Buttons({
        // Call your server to set up the transaction
        createOrder: function(data, actions) {
            return fetch('/payments/checkout/'+order_id, {
                method: 'get'
            }).then(function(res) {
                return res.json();
            }).then(function(orderData) {
                return orderData.id;
            });
        },
        // Call your server to finalize the transaction
        onApprove: function(data, actions) {
            return fetch('/payments/success/'+order_id, {
                method: 'post',
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                body: JSON.stringify(data)
            }).then(function(res) {
                if(res.ok)
                    window.location.replace("/payments");
                else{
                    alert("Notice! We're unable to complete your transaction. The page will refresh and please try again.");
                    window.location.reload();
                }
            }).then(function(orderData) {
                console.log(orderData);
                var errorDetail = Array.isArray(orderData.details) && orderData.details[0];
                if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                    return actions.restart(); // Recoverable state, per:
                    // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
                }

                if (errorDetail) {
                    var msg = 'Sorry, your transaction could not be processed.';
                    if (errorDetail.description) msg += '\n\n' + errorDetail.description;
                    if (orderData.debug_id) msg += ' (' + orderData.debug_id + ')';
                    return alert(msg); // Show a failure message (try to avoid alerts in production environments)
                }
            });
        }
    }).render('#paypal-button-container');

});
