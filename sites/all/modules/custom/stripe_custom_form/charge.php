<?php
  require_once('./config.php');
  $token  = $_POST['stripeToken'];
  $customer = \Stripe\Customer::create(array(
      'email' => $_POST['email'],
      "plan" => $_POST['plan'],
      "source" => $token
  ));

  echo '<h1>Successfully subscribed to '.ucfirst($_POST['plan']).' Plan your card was charged for $149! Thank you!</h1>';
?>

