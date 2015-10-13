
//------Stripe JS--------

// This identifies your website in the createToken call below
Stripe.setPublishableKey('pk_test_JagLLBEfLDVWLzcMFuhDomPu');

//-------------Stripe token generation for standard form-------------------

var stripeResponseHandler = function(status, response) {
    var $Form = (jQuery)('#stripe-payment-form');
    if (response.error) {
        // Show the errors on the form
        $Form.find('.payment-errors').text(response.error.message);
        $Form.find('button').prop('disabled', false);
    } else {
        // token contains id, last4, and card type
        var Token = response.id;
        // Insert the token into the form so it gets submitted to the server
        $Form.append((jQuery)('<input type="hidden" name="stripeToken" />').val(Token));
        // and re-submit
        $Form.get(0).submit();
    }
};
jQuery(function($) {

    $('#stripe-payment-form').submit(function(e) {
        var $Form = $(this);
        // Disable the submit button to prevent repeated clicks
        $Form.find('button').prop('disabled', true);
        Stripe.card.createToken($Form, stripeResponseHandler);
        // Prevent the form from submitting with the default action
        return false;
    });
});

//-------------Stripe token generation for professional plan-------------------

var stripeResponseHandler2 = function(status, response) {
    var $Form = (jQuery)('#stripe-payment-form--2');
    if (response.error) {
        // Show the errors on the form
        $Form.find('.payment-errors').text(response.error.message);
        $Form.find('button').prop('disabled', false);
    } else {
        // token contains id, last4, and card type
        var Token = response.id;
        // Insert the token into the form so it gets submitted to the server
        $Form.append((jQuery)('<input type="hidden" name="stripeToken" />').val(Token));
        // and re-submit
        $Form.get(0).submit();
    }
};
jQuery(function($) {

    $('#stripe-payment-form--2').submit(function(e) {
        var $Form = $(this);
        // Disable the submit button to prevent repeated clicks
        $Form.find('button').prop('disabled', true);
        Stripe.card.createToken($Form, stripeResponseHandler2);
        // Prevent the form from submitting with the default action
        return false;
    });
});

//-------------Stripe token generation for vip plan-------------------

var stripeResponseHandler3 = function(status, response) {
    var $Form = (jQuery)('#stripe-payment-form--3');
    if (response.error) {
        // Show the errors on the form
        $Form.find('.payment-errors').text(response.error.message);
        $Form.find('button').prop('disabled', false);
    } else {
        // token contains id, last4, and card type
        var Token = response.id;
        // Insert the token into the form so it gets submitted to the server
        $Form.append((jQuery)('<input type="hidden" name="stripeToken" />').val(Token));
        // and re-submit
        $Form.get(0).submit();
    }
};
jQuery(function($) {

    $('#stripe-payment-form--3').submit(function(e) {
        var $Form = $(this);
        // Disable the submit button to prevent repeated clicks
        $Form.find('button').prop('disabled', true);
        Stripe.card.createToken($Form, stripeResponseHandler3);
        // Prevent the form from submitting with the default action
        return false;
    });
});

