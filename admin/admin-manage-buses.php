<?php
include('admin-header.php');
include('admin-sidebar.php');
include('conn.php'); // Include your database connection file

// Fetch all buses
$sql = "SELECT * FROM bus";
$result = mysqli_query($con, $sql);

if (isset($_GET['delete'])) {
    $id = mysqli_real_escape_string($con, $_GET['delete']);
    $deleteQuery = "DELETE FROM bus WHERE id='$id'";
    if (mysqli_query($con, $deleteQuery)) {
        echo '<script>alert("Bus deleted successfully");</script>';
        header("Location: bus-admin-manage-buses.php");
    } else {
        echo '<script>alert("Error: Unable to delete bus");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Buses</title>
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
    .table {
        margin-top: 20px;
    }
    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 10px; /* Add margin between buttons */
    }
    .btn-warning, .btn-danger {
        width: 80px;
    }
  </style>
</head>
<body>
<div class="container-fluid main-content">
  <h1 class="booking-header">View Available Buses</h1>
  <table class="table table-bordered table-responsive">
    <thead>
      <tr>
        <th>Bus Name</th>
        <th>Bus Number</th>
        <th>Total Seats</th>
        <th>Route From</th>
        <th>Route To</th>
        <th>Price</th>
        <th>Departure Time</th>
        <th>Description</th>
        <th>Image</th>
        
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?php echo htmlentities($row['busName']); ?></td>
        <td><?php echo htmlentities($row['busNumber']); ?></td>
        <td><?php echo htmlentities($row['totalSeats']); ?></td>
        <td><?php echo htmlentities($row['routeFrom']); ?></td>
        <td><?php echo htmlentities($row['routeTo']); ?></td>
        <td><?php echo htmlentities($row['price']); ?></td>
        <td><?php echo htmlentities($row['departureTime']); ?></td>
        <td><?php echo htmlentities($row['description']); ?></td>
        <td><img src="<?php echo htmlentities($row['image']); ?>" alt="Bus Image" style="width: 100px;"></td>
    
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
