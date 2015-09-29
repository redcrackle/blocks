
//----------Popup JS------------

$(document).ready(function() {

    //----------------Popup for Standard plan------------------

    var std=$('#standard_register').dialog({
        title: 'Start my $149 Standard Monthly Subscription',
        resizable: true,
        autoOpen:false,
        modal: true,
        hide: 'fade',
        width:700,
        height:700
    });


    $('#standard').click(function(e) {
        e.preventDefault();
        std.dialog('open');
    });

    //----------------Popup for Professional plan------------------

    var prof=$('#professional_register').dialog({
        title: 'Start my $249 Professional Monthly Subscription',
        resizable: true,
        autoOpen:false,
        modal: true,
        hide: 'fade',
        width:550,
        height:550
    });

    $('#professional').click(function(e) {
        e.preventDefault();
        prof.dialog('open');
    });

    //----------------Popup for VIP plan------------------

    var vip=$('#vip_register').dialog({
        title: 'Start my $349 VIP Monthly Subscription',
        resizable: true,
        autoOpen:false,
        modal: true,
        hide: 'fade',
        width:550,
        height:550
    });

    $('#vip').click(function(e) {
        e.preventDefault();
        vip.dialog('open');
    });

});

//------Stripe JS--------

// This identifies your website in the createToken call below
Stripe.setPublishableKey('pk_test_JagLLBEfLDVWLzcMFuhDomPu');
var stripeResponseHandler = function(status, response) {
    var $form = $('#payment-form');
    if (response.error) {
        // Show the errors on the form
        $form.find('.payment-errors').text(response.error.message);
        $form.find('button').prop('disabled', false);
    } else {
        // token contains id, last4, and card type
        var token = response.id;
        // Insert the token into the form so it gets submitted to the server
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        // and re-submit
        $form.get(0).submit();
    }
};
jQuery(function($) {
    $('#payment-form').submit(function(e) {
        var $form = $(this);
        // Disable the submit button to prevent repeated clicks
        $form.find('button').prop('disabled', true);
        Stripe.card.createToken($form, stripeResponseHandler);
        // Prevent the form from submitting with the default action
        return false;
    });
});

