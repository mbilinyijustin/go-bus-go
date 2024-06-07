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

$userID = $_SESSION['id']; // Get the user ID from the session

$query = "SELECT b.busName, b.busNumber, b.description, b.routeFrom, b.routeTo, b.departureTime, b.price, bk.seatNumber 
          FROM booked bk 
          JOIN bus b ON bk.busID = b.id 
          WHERE bk.userID = $userID 
          ORDER BY bk.id DESC";

$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking History</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="container">
    <h1 class="text-center mb-4">Booking History</h1>
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Bus Name</th>
                    <th>Bus Number</th>
                    <th>Description</th>
                    <th>Route</th>
                    <th>Departure Time</th>
                    <th>Price</th>
                    <th>Seat Number</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlentities($row['busName']) . "</td>";
                        echo "<td>" . htmlentities($row['busNumber']) . "</td>";
                        echo "<td>" . htmlentities($row['description']) . "</td>";
                        echo "<td>" . htmlentities($row['routeFrom']) . " - " . htmlentities($row['routeTo']) . "</td>";
                        echo "<td>" . htmlentities($row['departureTime']) . "</td>";
                        echo "<td>" . htmlentities($row['price']) . " Tsh</td>";
                        echo "<td>" . htmlentities($row['seatNumber']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No bookings found.</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>

<?php
mysqli_close($con);
?>
