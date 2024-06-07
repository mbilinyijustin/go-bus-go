<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['id'])) {
  header("Location: user-login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Success</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <h1 class="text-center mb-4">Payment Successful</h1>
      <div class="card">
        <div class="card-body text-center">
          <h2 class="card-title">Thank you for your payment!</h2>
          <p class="card-text">Your payment was successful. You will receive a confirmation email shortly.</p>
          <a href="index.php" class="btn btn-primary mt-4">Go to Home</a>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
