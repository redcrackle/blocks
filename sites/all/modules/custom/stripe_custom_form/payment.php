<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Payment Information</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- The required Stripe lib -->
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <!-- jQuery is used only for this example; it isn't required to use Stripe -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script type="text/javascript">
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
    </script>
</head>
    <body>
        <div class="container">
            <h1>Subscribe to <?php $plan = $_POST['plan'];
                if($plan == 'vip')
                {
                    $plan =strtoupper($plan);
                } else {
                    $plan = ucfirst($plan);
                }

                echo $plan?> Plan</h1>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <form action="charge.php" method="POST" id="payment-form" >
                        <span class="payment-errors"></span>

                        <div class="form-group">
                            <label>
                                Email Address
                            </label>
                            <input type="email" size="20" name="email" placeholder="Email Address" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label>
                                <span>Card Number</span>
                            </label>
                            <input type="text" size="20" data-stripe="number" placeholder="Card Number" class="form-control"/>
                        </div>


                        <div class="form-group">
                            <label>
                                <span>CVC</span>
                            </label>
                            <input type="text" size="4" data-stripe="cvc" placeholder="CVC" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label>
                                Expiry
                            </label>
                            <input type="text" size="2" data-stripe="exp-month" placeholder="MM" class="form-control"/>
                            <span> / </span>
                            <input type="text" size="4" data-stripe="exp-year" placeholder="YYYY" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <input type="checkbox" id="check"  > I agree to <a href="#"> terms and conditions </a>
                        </div>

                        <input type="hidden" name="plan" value="<?php $plan = $_POST['plan']; echo $plan?>">

                        <button type="submit" id="purchase" class="btn btn-default" >Start <?php $plan = $_POST['plan'];
                            if($plan == 'vip')
                            {
                                $plan =strtoupper($plan);
                            } else {
                                $plan = ucfirst($plan);
                            }

                            echo $plan?> Subscription</button>
                    </form>

                </div>
            </div>
        </div>

    </body>
</html>