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

if (isset($_GET['id'])) {
    $busID = intval($_GET['id']); // Get the bus ID from the URL

    // Fetch bus details from the database
    $query = "SELECT image, busName, busNumber, description, routeFrom, routeTo, departureTime, price, totalSeats FROM bus WHERE id = $busID";
    $result = mysqli_query($con, $query);

    // Fetch booked seats
    $bookedSeatsQuery = "SELECT seatNumber FROM booked WHERE busID = $busID";
    $bookedSeatsResult = mysqli_query($con, $bookedSeatsQuery);
    $bookedSeats = [];
    while ($row = mysqli_fetch_assoc($bookedSeatsResult)) {
        $bookedSeats[] = $row['seatNumber'];
    }
} else {
    echo "No bus selected.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bus Details</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

  <style>
    .seat {
      font-size: 20px;
      margin-right: 5px;
      cursor: pointer;
    }
    .selected {
      color: red;
    }
    .booked {
      color: gray;
      cursor: not-allowed;
    }
  </style>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <h1 class="text-center mb-4">Bus Details</h1>

      <?php
      if (isset($result) && mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $totalSeats = $row['totalSeats']; // Fetch total seats from the database
          echo '<div class="card mb-4">';
          echo '<img src="' . htmlentities($row['image']) . '" class="card-img-top" alt="Bus Image">';
          echo '<div class="card-body text-align-center">';
          echo '<h5 class="card-title">Bus Name: ' . htmlentities($row['busName']) . '</h5>';
          echo '<p class="card-text"><strong>Bus Number: </strong> ' . htmlentities($row['busNumber']) . '</p>';
          echo '<p class="card-text"><strong>Descriptions: </strong> ' . htmlentities($row['description']) . '</p>';
          echo '<p><strong>Route: </strong> ' . htmlentities($row['routeFrom']) . ' - ' . htmlentities($row['routeTo']) . '</p>';
          echo '<p><strong>Departure Time: </strong> ' . htmlentities($row['departureTime']) . '</p>';
          echo '<p><strong>Price: </strong> ' . htmlentities($row['price']) . ' Tsh</p>';
          echo '<div id="selected-seat"><strong>Seat Number:  </strong> None</div>'; // Display selected seat number
          echo '<div class="accordion accordion-flush" id="accordionFlushExample">';
          echo '<div class="accordion-item">';
          echo '<h2 class="accordion-header">';
          echo '<button class="accordion-button collapsed btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">';
          echo 'Click here to select seat';
          echo '</button>';
          echo '</h2>';
          echo '<div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">';
          echo '<div class="accordion-body">';
          echo '<div class="container mt-5">';
          echo '<h1 class="mb-4">Select Your Bus Seat</h1>';
          echo '<div class="row">';
          for ($i = 1; $i <= $totalSeats; $i++) {
              $seatClass = in_array($i, $bookedSeats) ? 'booked' : '';
              echo '<div class="col-md-3">';
              echo '<div class="seat ' . $seatClass . '" onclick="selectSeat(this, ' . $i . ')"><i class="fas fa-chair"></i> Seat ' . $i . '</div>';
              echo '</div>';
          }
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '<div class="text-center">'; // Center the button
          echo '<button id="confirm-btn" class="btn btn-success mr-2" onclick="confirmSeat(' . $busID . ', ' . $userID . ')"><i class="fa fa-check"></i> Confirm </button>';
          echo '<div id="payment-btn" class="mt-2" style="display: none;">';
          echo '<a href="payment.php" class="btn btn-primary"><i class="fa fa-credit-card"></i> Continue to Payment</a>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
      } else {
          echo '<p>No bus details found.</p>';
      }
      mysqli_close($con);
      ?>

    </div>
  </div>
</div>

<!-- Bootstrap JS bundle -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
  var selectedSeatNumber = null;

  function selectSeat(element, seatNumber) {
    if (element.classList.contains('booked')) {
      return; // Prevent selecting booked seats
    }

    var selectedSeat = document.querySelector('.seat.selected');
    if (selectedSeat) {
      selectedSeat.classList.remove('selected');
      selectedSeat.style.pointerEvents = 'auto'; // Allow reselection of previously selected seat
    }
    element.classList.add('selected');
    element.style.pointerEvents = 'none'; // Prevent re-selection of this seat
    document.getElementById('selected-seat').innerHTML = '<strong>Selected Seat: </strong>' + seatNumber;
    selectedSeatNumber = seatNumber;
  }

  function confirmSeat(busID, userID) {
    if (selectedSeatNumber === null) {
      alert('Please select a seat before confirming.');
      return;
    }

    // Send AJAX request to confirm seat
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'confirm_seat.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
      if (xhr.status === 200) {
        var response = xhr.responseText;
        if (response === 'success') {
          alert('Seat confirmed successfully!');
          document.getElementById('confirm-btn').style.display = 'none';
          document.getElementById('accordionFlushExample').style.display = 'none'; // Hide the seat selection
          document.getElementById('payment-btn').style.display = 'block';
        } else {
          alert('Error confirming seat: ' + response);
        }
      }
    };
    xhr.send('busID=' + busID + '&userID=' + userID + '&seatNumber=' + selectedSeatNumber);
  }
</script>

</body>
</html>
