<?php
session_start();
include('conn.php'); // Include your database connection file

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: user-login.php");
    exit();
}

$userID = $_SESSION['id'];

// Get booking date from URL
$bookingDate = mysqli_real_escape_string($con, $_GET['id']);

// Fetch user and booking details
$userQuery = "SELECT firstName, lastName FROM users WHERE id = $userID";
$userResult = mysqli_query($con, $userQuery);
$user = mysqli_fetch_assoc($userResult);

$bookingQuery = "SELECT b.busName, b.busNumber, b.description, b.routeFrom, b.routeTo, b.departureTime, b.price, bk.seatNumber 
                 FROM booked bk 
                 JOIN bus b ON bk.busID = b.id 
                 WHERE bk.userID = $userID AND bk.bookingDate = '$bookingDate'";
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
  <title>Print Receipt</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <style>
    @media print {
      .no-print {
        display: none;
      }
    }
  </style>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <h1 class="text-center mb-4">Booking Receipt</h1>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Booking Details</h5>
          <p class="card-text"><strong>Name: </strong> <?php echo htmlentities($user['firstName'] . ' ' . $user['lastName']); ?></p>
          <p class="card-text"><strong>Bus Name: </strong> <?php echo htmlentities($booking['busName']); ?></p>
          <p class="card-text"><strong>Bus Number: </strong> <?php echo htmlentities($booking['busNumber']); ?></p>
          <p class="card-text"><strong>Description: </strong> <?php echo htmlentities($booking['description']); ?></p>
          <p class="card-text"><strong>Route: </strong> <?php echo htmlentities($booking['routeFrom'] . ' - ' . $booking['routeTo']); ?></p>
          <p class="card-text"><strong>Departure Time: </strong> <?php echo htmlentities($booking['departureTime']); ?></p>
          <p class="card-text"><strong>Price: </strong> <?php echo htmlentities($booking['price']); ?> Tsh</p>
          <p class="card-text"><strong>Seat Number: </strong> <?php echo htmlentities($booking['seatNumber']); ?></p>
          <button class="btn btn-primary no-print" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS bundle -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
