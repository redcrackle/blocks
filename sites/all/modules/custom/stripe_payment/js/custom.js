//
////----------Popup JS------------
//
//$(document).ready(function() {
//
//    //----------------disable and enable the subscribe button-------------------
//    $('.tos-cont').closest('form').find('#stripe-submit').prop("disabled", true);
//    $('.tos-cont').on('click',function() {
//        var ch = $(this).is(':checked');
//        if (ch == true) {
//            $(this).closest('form').find('#stripe-submit').prop("disabled", false);
//        }
//        else {
//            $(this).closest('form').find('#stripe-submit').prop("disabled", true);
//        }
//    });
//
//    //----------------Popup for Standard plan------------------
//
//    var std=$('#standard_register').dialog({
//        title: 'Start my $149 Standard Monthly Subscription',
//        resizable: true,
//        autoOpen:false,
//        modal: true,
//        hide: 'fade',
//        width:900,
//        height:600
//    });
//
//
//    $('#standard').click(function(e) {
//        e.preventDefault();
//        std.dialog('open');
//    });
//
//    //----------------Popup for Professional plan------------------
//
//    var prof=$('#professional_register').dialog({
//        title: 'Start my $249 Professional Monthly Subscription',
//        resizable: true,
//        autoOpen:false,
//        modal: true,
//        hide: 'fade',
//        width:900,
//        height:600
//    });
//
//    $('#professional').click(function(e) {
//        e.preventDefault();
//        prof.dialog('open');
//    });
//
//    //----------------Popup for VIP plan------------------
//
//    var vip=$('#vip_register').dialog({
//        title: 'Start my $349 VIP Monthly Subscription',
//        resizable: true,
//        autoOpen:false,
//        modal: true,
//        hide: 'fade',
//        width:900,
//        height:600
//    });
//
//    $('#vip').click(function(e) {
//        e.preventDefault();
//        vip.dialog('open');
//    });
//
//});

//------Stripe JS--------

// This identifies your website in the createToken call below
Stripe.setPublishableKey('pk_test_JagLLBEfLDVWLzcMFuhDomPu');

//-------------Stripe token generation-------------------

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

//-------------Token generation for professional plan-------------------

//var stripeResponseHandlerProfessional = function(status, response) {
//    var $ProfessionalForm = $('#professional-form');
//    if (response.error) {
//        // Show the errors on the form
//        $ProfessionalForm.find('.payment-errors').text(response.error.message);
//        $ProfessionalForm.find('button').prop('disabled', false);
//    } else {
//        // token contains id, last4, and card type
//        var professionalToken = response.id;
//        // Insert the token into the form so it gets submitted to the server
//        $ProfessionalForm.append($('<input type="hidden" name="stripeTokenProfessional" />').val(professionalToken));
//        // and re-submit
//        $ProfessionalForm.get(0).submit();
//    }
//};
//jQuery(function($) {
//    $('#professional-form').submit(function(e) {
//        var $ProfessionalForm = $(this);
//        // Disable the submit button to prevent repeated clicks
//        $ProfessionalForm.find('button').prop('disabled', true);
//        Stripe.card.createToken($ProfessionalForm, stripeResponseHandlerProfessional);
//        // Prevent the form from submitting with the default action
//        return false;
//    });
//});


//-------------Token generation for VIP plan-------------------

//var stripeResponseHandlerVIP = function(status, response) {
//    var $VIPForm = $('#vip-form');
//    if (response.error) {
//        // Show the errors on the form
//        $VIPForm.find('.payment-errors').text(response.error.message);
//        $VIPForm.find('button').prop('disabled', false);
//    } else {
//        // token contains id, last4, and card type
//        var vipToken = response.id;
//        // Insert the token into the form so it gets submitted to the server
//        $VIPForm.append($('<input type="hidden" name="stripeTokenVIP" />').val(vipToken));
//        // and re-submit
//        $VIPForm.get(0).submit();
//    }
//};
//jQuery(function($) {
//    $('#vip-form').submit(function(e) {
//        var $VIPForm= $(this);
//        // Disable the submit button to prevent repeated clicks
//        $VIPForm.find('button').prop('disabled', true);
//        Stripe.card.createToken($VIPForm, stripeResponseHandlerVIP);
//        // Prevent the form from submitting with the default action
//        return false;
//    });
//});


