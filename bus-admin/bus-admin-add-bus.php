<?php

include('bus-admin-header.php');
include('bus-admin-sidebar.php');
include('conn.php'); // Include your database connection file

if(isset($_POST['submit'])) {
    // Retrieve form data
    $busName = mysqli_real_escape_string($con, $_POST['busName']);
    $busNumber = mysqli_real_escape_string($con, $_POST['busNumber']);
    $totalSeats = mysqli_real_escape_string($con, $_POST['totalSeats']);
    $routeFrom = mysqli_real_escape_string($con, $_POST['routeFrom']);
    $routeTo = mysqli_real_escape_string($con, $_POST['routeTo']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $departureTime = mysqli_real_escape_string($con, $_POST['departureTime']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    
    // Handle file upload
    $image = $_FILES['image']['name'];
    $target_dir = "../IMAGES/";
    $target_file = $target_dir . basename($image);
    
    // Check if file was uploaded without errors
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // Prepare SQL statement to insert data into 'bus' table
        $sql = "INSERT INTO bus (busName, busNumber, totalSeats, routeFrom, routeTo, price, departureTime, description, image) 
                VALUES ('$busName', '$busNumber', '$totalSeats', '$routeFrom', '$routeTo', '$price', '$departureTime', '$description', '$target_file')";
        
        // Execute SQL statement
        if(mysqli_query($con, $sql)) {
            echo '<script>alert("Bus details added successfully");</script>';
        } else {
            echo '<script>alert("Error: Unable to add bus details");</script>';
        }
    } else {
        echo '<script>alert("Error: Unable to upload image");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Bus Details</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <style>
    /* Custom Styles */
    .form-group {
      margin-bottom: 20px;
    }
    .navbar {
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
    }
    .navbar-brand {
      margin-right: auto;
    }
    .sidebar {
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #343a40;
        padding-top: 56px;
    }
    .sidebar .nav-link {
        text-align: center;
        color: #fff; /* White text color */
    }
    .main-content {
        margin-left: 150px; /* Width of the sidebar */
        padding-top: 56px; /* Height of the navbar */
    }
    .card-icon {
      font-size: 30px; /* Reduced font size */
      margin-bottom: 15px;
    }
    .card-text {
      font-size: 14px; /* Reduced font size */
    }
    .card {
      width: 100%;
      max-width: 300px; /* Adjust card width */
    }
    .sidebar .nav-link {
        text-align: center;
        padding: 10px 0;
    }
  </style>
</head>
<body>

<div class="container main-content">
  <h1 class="booking-header">ADD BUS DETAILS</h1>
  <form method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="busName"><i class="fa fa-bus"></i><strong> Bus Name</strong></label>
          <input type="text" class="form-control" id="busName" name="busName" placeholder="Enter bus name" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="busNumber"><i class="fa fa-bus"></i><strong>Bus Number</strong></label>
          <input type="text" class="form-control" id="busNumber" name="busNumber" placeholder="Enter bus number" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="totalSeats"><i class="fas fa-chair"></i><strong>Total Number Of Seats</strong></label>
          <input type="number" class="form-control" id="totalSeats" name="totalSeats" placeholder="Enter the total number of seats" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="from"><i class="fa fa-map-marker"></i><strong>Route - From</strong></label>
          <input type="text" class="form-control" name="routeFrom" id="from" placeholder="Enter source" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="to"><i class="fa fa-map-marker"></i><strong>Route - To</strong></label>
          <input type="text" class="form-control" name="routeTo" id="to" placeholder="Enter destination" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="price"><i class="fa fa-money"></i><strong>Price</strong></label>
          <input type="number" class="form-control" name="price" id="price" placeholder="Enter price" required>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="departureTime"><i class="fa fa-clock-o"></i><strong>Departure Time</strong></label>
          <input type="time" class="form-control" name="departureTime" id="departureTime" required>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="image"><i class="fa fa-image"></i><strong>Image</strong></label>
          <input type="file" class="form-control-file" name="image" id="image" required>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="description"><i class="fa fa-info-circle"></i><strong>Description</strong></label>
      <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter description" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-plus-circle"></i> Add Bus</button>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
