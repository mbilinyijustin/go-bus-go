<?php
session_start();
error_reporting(0);
include('conn.php');
include('user-header.php');
include('user-sidebar.php');

// Check if user is logged in
if (!isset($_SESSION['id'])) {
  header("Location: user-login.php");
  exit();
}

$noResults = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $routeFrom = mysqli_real_escape_string($con, $_POST['routeFrom']);
    $routeTo = mysqli_real_escape_string($con, $_POST['routeTo']);
    $date = mysqli_real_escape_string($con, $_POST['date']);

    // Insert search data into searchBooking table
    $insertQuery = "INSERT INTO searchBooking (routeFrom, routeTo, searchDate) VALUES ('$routeFrom', '$routeTo', '$date')";
    mysqli_query($con, $insertQuery);

    // Fetch matching buses
    $searchQuery = "SELECT * FROM bus WHERE routeFrom='$routeFrom' AND routeTo='$routeTo'";
    $searchResult = mysqli_query($con, $searchQuery);

    // Check if any results were returned
    if (mysqli_num_rows($searchResult) == 0) {
        $_SESSION['noResults'] = true;
        $noResults = true;
    } else {
        unset($_SESSION['noResults']);
    }
} else {
    if (isset($_SESSION['noResults'])) {
        $noResults = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking Ticket</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- main container -->
<div class="container main-content">
  <h1 class="booking-header">BOOK TICKET NOW</h1>
  <form method="POST" action="">
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="from"><i class="fa fa-map-marker"></i> From</label>
          <select name="routeFrom" class="form-control" id="from" required="true">
            <option value="">Select Route From</option>
            <?php
            $ret = mysqli_query($con, "SELECT DISTINCT routeFrom FROM bus");
            while ($row = mysqli_fetch_array($ret)) {
                echo '<option value="' . htmlentities($row['routeFrom']) . '">' . htmlentities($row['routeFrom']) . '</option>';
            }
            ?>
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="to"><i class="fa fa-map-marker"></i> To</label>
          <select name="routeTo" class="form-control" id="to" required="true">
            <option value="">Select Route To</option>
            <?php
            $ret = mysqli_query($con, "SELECT DISTINCT routeTo FROM bus");
            while ($row = mysqli_fetch_array($ret)) {
                echo '<option value="' . htmlentities($row['routeTo']) . '">' . htmlentities($row['routeTo']) . '</option>';
            }
            ?>
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="date"><i class="fa fa-calendar"></i> Date</label>
          <input type="date" name="date" class="form-control" id="date" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search Bus</button>
      </div>
    </div>
  </form>
</div>

<!-- Table of search results displayed as cards -->
<div class="container" style="margin-left: 100px;">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <h2 class="text-center">Search Results</h2>
      <?php if (isset($searchResult) && mysqli_num_rows($searchResult) > 0) { ?>
      <div class="card-deck">
        <?php
            while ($row = mysqli_fetch_array($searchResult)) {
                echo '<div class="card">';
                echo '<img src="' . htmlentities($row['image']) . '" class="card-img-top" alt="Bus Image">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlentities($row['busName']) . '</h5>';
                echo '<p class="card-text">' . htmlentities($row['description']) . '</p>';
                echo '<a href="user-view-bus-details.php?id=' . htmlentities($row['id']) . '" class="btn btn-primary">View Details</a>';
                echo '</div>';
                echo '</div>';
            }
        ?>
      </div>
      <?php } elseif ($noResults) { ?>
      <div class="row">
        <div class="col-md-12 text-center">
          <h3 style="color: red;">There is no bus found</h3>
          <?php unset($_SESSION['noResults']); // Unset the session variable after displaying the message ?>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
// Clear the session variable on page load
window.onload = function() {
    <?php if(isset($_SESSION['noResults'])): ?>
        <?php unset($_SESSION['noResults']); ?>
    <?php endif; ?>
};
</script>

</body>
</html>
