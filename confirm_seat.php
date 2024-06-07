<?php
include('conn.php'); // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $busID = intval($_POST['busID']);
    $userID = intval($_POST['userID']);
    $seatNumber = intval($_POST['seatNumber']);

    // Check if the seat is already booked
    $checkSeatQuery = "SELECT * FROM booked WHERE busID = $busID AND seatNumber = $seatNumber";
    $checkSeatResult = mysqli_query($con, $checkSeatQuery);

    if (mysqli_num_rows($checkSeatResult) > 0) {
        echo "Seat already booked!";
    } else {
        // Insert the booked seat into the booked table
        $insertQuery = "INSERT INTO booked (busID, userID, seatNumber) VALUES ($busID, $userID, $seatNumber)";
        if (mysqli_query($con, $insertQuery)) {
            echo "success";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
mysqli_close($con);
?>
