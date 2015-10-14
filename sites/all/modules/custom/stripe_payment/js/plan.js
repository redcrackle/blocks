jQuery(function($) {
    $( "#popup-element-0-active" ).click(function() {
        var input = $( "#stripe-payment-form,#pay_plan" );
        var value = input.val();
        if( value === '' || value === 'professional' || value ==='vip' ){
            input.val( value + "standard" );
        }
    });

    $( "#popup-element-1-active" ).click(function() {
        var input = $( "#stripe-payment-form--2,#pay_plan" );
        var value = input.val();
        if( value === '' || value === 'standard' || value ==='vip' ){
            input.val( "professional" );
        }
    });

    $( "#popup-element-2-active" ).click(function() {
        var input = $( "#stripe-payment-form--3,#pay_plan" );
        var value = input.val();
        if( value === '' || value === 'standard' || value ==='professional' ){
            input.val( "vip" );
        }
    });

});
