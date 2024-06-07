<?php
include('bus-admin-header.php');
include('bus-admin-sidebar.php');
include('conn.php'); // Include your database connection file

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $sql = "SELECT * FROM bus WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    $bus = mysqli_fetch_assoc($result);

    if (isset($_POST['submit'])) {
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

        if ($image) {
            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        } else {
            $target_file = $bus['image'];
        }
        
        // Prepare SQL statement to update data in 'bus' table
        $sql = "UPDATE bus SET busName='$busName', busNumber='$busNumber', totalSeats='$totalSeats', routeFrom='$routeFrom', routeTo='$routeTo', price='$price', departureTime='$departureTime', description='$description', image='$target_file' WHERE id='$id'";
        
        // Execute SQL statement
        if(mysqli_query($con, $sql)) {
            echo '<script>alert("Bus details updated successfully");</script>';
            header("Location: bus-admin-manage-buses.php");
        } else {
            echo '<script>alert("Error: Unable to update bus details");</script>';
        }
    }
} else {
    header("Location: bus-admin-manage.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Bus Details</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

  <style>
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
        width: 200px; /* Adjust the width of the sidebar */
        background-color: #343a40;
        padding-top: 56px;
    }
    .sidebar .nav-link {
        text-align: center;
        color: #fff; /* White text color */
    }
    .main-content {
        margin-left: 200px; /* Adjust the left margin to the width of the sidebar */
        padding: 20px;
        max-width: calc(100% - 220px); /* Ensure the main content fits within the page */
        overflow-x: auto; /* Enable horizontal scrolling if needed */
    }
    .form-group img {
        display: block;
        margin-top: 10px;
    }
  </style>
</head>
<body>

<div class="container-fluid main-content">
  <h1 class="booking-header">UPDATE BUS DETAILS</h1>
  <form method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="busName"><i class="fa fa-bus"></i><strong> Bus Name</strong></label>
          <input type="text" class="form-control" id="busName" name="busName" value="<?php echo htmlentities($bus['busName']); ?>" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="busNumber"><i class="fa fa-bus"></i><strong>Bus Number</strong></label>
          <input type="text" class="form-control" id="busNumber" name="busNumber" value="<?php echo htmlentities($bus['busNumber']); ?>" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="totalSeats"><i class="fas fa-chair"></i><strong>Total Number Of Seats</strong></label>
          <input type="number" class="form-control" id="totalSeats" name="totalSeats" value="<?php echo htmlentities($bus['totalSeats']); ?>" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="from"><i class="fa fa-map-marker"></i><strong>Route - From</strong></label>
          <input type="text" class="form-control" name="routeFrom" id="from" value="<?php echo htmlentities($bus['routeFrom']); ?>" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="to"><i class="fa fa-map-marker"></i><strong>Route - To</strong></label>
          <input type="text" class="form-control" name="routeTo" id="to" value="<?php echo htmlentities($bus['routeTo']); ?>" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="price"><i class="fa fa-money"></i><strong>Price</strong></label>
          <input type="number" class="form-control" name="price" id="price" value="<?php echo htmlentities($bus['price']); ?>" required>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="departureTime"><i class="fa fa-clock-o"></i><strong>Departure Time</strong></label>
          <input type="time" class="form-control" name="departureTime" id="departureTime" value="<?php echo htmlentities($bus['departureTime']); ?>" required>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="image"><i class="fa fa-image"></i><strong>Image</strong></label>
          <input type="file" class="form-control-file" name="image" id="image">
          <img src="<?php echo htmlentities($bus['image']); ?>" alt="Bus Image" style="width: 100px; margin-top: 10px;">
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="description"><i class="fa fa-info-circle"></i><strong>Description</strong></label>
      <textarea class="form-control" name="description" id="description" rows="3" required><?php echo htmlentities($bus['description']); ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-refresh"></i> Update Bus</button>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
