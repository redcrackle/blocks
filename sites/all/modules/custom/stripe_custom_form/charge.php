<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <title>Thank you!</title>
    </head>
    <body>

        <?php
            require_once('./config.php');

//          --------- Getting the specific stripe token -------------

            $standardToken = "default";
            if( isset($_POST['stripeTokenStandard']) && ($_POST['stripeTokenStandard'] !== '') ) {
                $standardToken = $_POST['stripeTokenStandard'];
            }

            $professionalToken = "default";
            if( isset($_POST['stripeTokenProfessional']) && ($_POST['stripeTokenProfessional'] !== '') ) {
                $professionalToken = $_POST['stripeTokenProfessional'];
            }

            $vipToken = "default";
            if( isset($_POST['stripeTokenVIP']) && ($_POST['stripeTokenVIP'] !== '') ) {
                $vipToken = $_POST['stripeTokenVIP'];
            }

            if( $standardToken !== 'default' && $professionalToken === 'default' && $vipToken === 'default' ) {
                $token = $standardToken;
            } else if( $professionalToken !== 'default' && $standardToken === 'default' && $vipToken === 'default' ) {
                $token = $professionalToken;
            } else if( $vipToken !== 'default' && $standardToken === 'default' && $professionalToken === 'default' ) {
                $token = $vipToken;
            }

//          ------- Create stripe customer and subscribe him to a plan ---------

            $customer = \Stripe\Customer::create(array(
                'email' => $_POST['email'],
                "plan" => $_POST['plan'],
                "source" => $token
            ));

            if($_POST['plan'] == 'standard'){
                $amt = 149;
            }
            else if($_POST['plan']  == 'professional'){
                $amt = 249;
            }

            else if($_POST['plan'] == 'vip'){
                $amt = 349;
            }

        ?>

        <div class="container">
            <h1 class="jumbotron">
                Thank you!
            </h1>
            <p>
                Your Card was charged $<?php
                echo $amt;
                ?> For the <?php
                $plan = $_POST['plan'];
                if($plan == 'vip')
                {
                    $plan =strtoupper($plan);
                } else {
                    $plan = ucfirst($plan);
                }
                echo $plan;
                ?> Plan!
            </p>
        </div>

    </body>
</html>
