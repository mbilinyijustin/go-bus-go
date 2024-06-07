<?php
session_start();
error_reporting(0);
include('user-header.php');
include('user-sidebar.php');

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
  <title>User Dashboard</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- Main Content -->
  <div class="container mt-5">
  <h1 class="text-center mb-4">Welcome, <?php 
  $query = mysqli_query($con, "select first_name from users where id='" . $_SESSION['id'] . "'");
  while ($row = mysqli_fetch_array($query)) {
    echo '<span class="text-success">' . $row['first_name'] . '</span>';
  }
  ?></h1>

    <div class="row border border-primary">
      <div class="col-sm-4 ">
        <div class="panel panel-white no-radius text-center">
          <div class="panel-body">
            <span class="fa-stack fa-2x"> 
              <i class="fa fa-square fa-stack-2x text-primary"></i> 
              <i class="fa fa-user fa-stack-1x fa-inverse"></i> 
            </span>
            <h2 class="StepTitle">My Profile</h2>
            <p class="links cl-effect-1">
            <a class="btn btn-primary" href="user-edit-profile.php">Update Profile</a>
            </p>
          </div>
        </div>
      </div>

      <div class="col-sm-4 ">
        <div class="panel panel-white no-radius text-center">
          <div class="panel-body">
            <span class="fa-stack fa-2x"> 
              <i class="fa fa-square fa-stack-2x text-primary"></i> 
              <i class="fa fa-ticket fa-stack-1x fa-inverse"></i> 
            </span>
            <h2 class="StepTitle">Book My Ticket</h2>
            <p class="links cl-effect-1">
            <a class="btn btn-primary" href="booking-ticket.php">Book Ticket</a>
            </p>
          </div>
        </div>
      </div>

      <div class="col-sm-4 ">
        <div class="panel panel-white no-radius text-center">
          <div class="panel-body">
            <span class="fa-stack fa-2x"> 
              <i class="fa fa-square fa-stack-2x text-primary"></i> 
              <i class="fa fa-calendar fa-stack-1x fa-inverse"></i> 
            </span>
            <h2 class="StepTitle">My Booking History</h2>
            <p class="cl-effect-1">
            <a class="btn btn-primary" href="user-booking-history.php">View Booking History</a> 
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
