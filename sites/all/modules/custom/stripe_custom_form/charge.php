<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <title>Thank you!</title>
    </head>
    <body>

        <?php
            require_once('./config.php');
            $token  = $_POST['stripeToken'];
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

            //  echo '<h1>Successfully subscribed to '.ucfirst($_POST['plan']).' Plan your card was charged for $'.$amt.'! Thank you!</h1>';
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
