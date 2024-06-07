<?php
session_start();
include('conn.php'); // Include your database connection file

// Check if user is logged in
if (!isset($_SESSION['id'])) {
  header("Location: user-login.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $userID = $_SESSION['id'];
  $paymentMethod = $_POST['payment_method'];

  // Process the payment based on the selected method
  if ($paymentMethod == 'visa') {
    $cardNumber = $_POST['card_number'];
    $cardExpiry = $_POST['card_expiry'];
    $cardCvc = $_POST['card_cvc'];

    // Here, you'd integrate with a payment gateway to process the card payment

    // Mock payment success
    $paymentSuccess = true;

  } elseif ($paymentMethod == 'mobile_money') {
    $mobileNumber = $_POST['mobile_number'];

    // Here, you'd integrate with a mobile money provider's API to process the payment

    // Mock payment success
    $paymentSuccess = true;

  } elseif ($paymentMethod == 'paypal') {
    // Here, you'd integrate with PayPal's API to process the payment

    // Mock payment success
    $paymentSuccess = true;
  }

  if ($paymentSuccess) {
    // Update the booking as paid in the database
    $updateQuery = "UPDATE booked SET paid = 1 WHERE userID = $userID AND id = (SELECT id FROM booked WHERE userID = $userID ORDER BY id DESC LIMIT 1)";
    mysqli_query($con, $updateQuery);

    // Redirect to a confirmation page
    header("Location: payment_success.php");
    exit();
  } else {
    echo "Payment failed. Please try again.";
  }
}
?>
