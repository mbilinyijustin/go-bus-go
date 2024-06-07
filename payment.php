<?php
error_reporting(0);
include('user-header.php');
include('user-sidebar.php');
include('conn.php'); // Include your database connection file

// Check if user is logged in
if (!isset($_SESSION['id'])) {
  header("Location: user-login.php");
  exit();
}

$userID = $_SESSION['id'];

// Fetch user and booking details
$userQuery = "SELECT first_name, last_name FROM users WHERE id = $userID";
$userResult = mysqli_query($con, $userQuery);
$user = mysqli_fetch_assoc($userResult);

$bookingQuery = "SELECT b.busName, b.busNumber, b.description, b.routeFrom, b.routeTo, b.departureTime, b.price, bk.seatNumber 
                 FROM booked bk 
                 JOIN bus b ON bk.busID = b.id 
                 WHERE bk.userID = $userID ORDER BY bk.id DESC LIMIT 1";
$bookingResult = mysqli_query($con, $bookingQuery);
$booking = mysqli_fetch_assoc($bookingResult);

if (!$booking) {
    echo "No booking found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Page</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

  <style>
    .payment-method {
      cursor: pointer;
      border: 1px solid #ccc;
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
    }
    .payment-method.active {
      border-color: #007bff;
      background-color: #e9f7ff;
    }
  </style>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <h1 class="text-center mb-4">Payment Page</h1>
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title">Booking Details</h5>
          <p class="card-text"><strong>Name: </strong> <?php echo htmlentities($user['first_name'] . ' ' . $user['last_name']); ?></p>
          <p class="card-text"><strong>Bus Name: </strong> <?php echo htmlentities($booking['busName']); ?></p>
          <p class="card-text"><strong>Bus Number: </strong> <?php echo htmlentities($booking['busNumber']); ?></p>
          <p class="card-text"><strong>Descriptions: </strong> <?php echo htmlentities($booking['description']); ?></p>
          <p class="card-text"><strong>Route: </strong> <?php echo htmlentities($booking['routeFrom'] . ' - ' . $booking['routeTo']); ?></p>
          <p class="card-text"><strong>Departure Time: </strong> <?php echo htmlentities($booking['departureTime']); ?></p>
          <p class="card-text"><strong>Price: </strong> <?php echo htmlentities($booking['price']); ?> Tsh</p>
          <p class="card-text"><strong>Seat Number: </strong> <?php echo htmlentities($booking['seatNumber']); ?></p>
        </div>
      </div>

      <h2>Select Payment Method</h2>
      <div id="payment-methods">
        <div class="payment-method" onclick="selectPaymentMethod('visa')">
          <i class="fa fa-cc-visa fa-2x"></i> Visa
        </div>
        <div class="payment-method" onclick="selectPaymentMethod('mobile_money')">
          <i class="fa fa-mobile fa-2x"></i> Mobile Money
        </div>
        <div class="payment-method" onclick="selectPaymentMethod('paypal')">
          <i class="fa fa-paypal fa-2x"></i> PayPal
        </div>
      </div>

      <form id="payment-form" action="process_payment.php" method="POST" style="display: none;">
        <input type="hidden" name="payment_method" id="payment-method" value="">
        
        <div id="visa-fields" style="display: none;">
          <div class="form-group">
            <label for="card-number">Card Number</label>
            <input type="text" class="form-control" id="card-number" name="card_number">
          </div>
          <div class="form-group">
            <label for="card-expiry">Expiry Date</label>
            <input type="text" class="form-control" id="card-expiry" name="card_expiry">
          </div>
          <div class="form-group">
            <label for="card-cvc">CVC</label>
            <input type="text" class="form-control" id="card-cvc" name="card_cvc">
          </div>
        </div>
        
        <div id="mobile-money-fields" style="display: none;">
          <div class="form-group">
            <label for="mobile-number">Mobile Number</label>
            <input type="text" class="form-control" id="mobile-number" name="mobile_number">
          </div>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary mt-4">Submit Payment</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function selectPaymentMethod(method) {
    document.getElementById('payment-method').value = method;
    document.getElementById('payment-form').style.display = 'block';
    document.getElementById('visa-fields').style.display = method === 'visa' ? 'block' : 'none';
    document.getElementById('mobile-money-fields').style.display = method === 'mobile_money' ? 'block' : 'none';

    var paymentMethods = document.querySelectorAll('.payment-method');
    paymentMethods.forEach(function(element) {
      element.classList.remove('active');
    });

    document.querySelector('.payment-method[onclick="selectPaymentMethod(\'' + method + '\')"]').classList.add('active');
  }
</script>

</body>
</html>
