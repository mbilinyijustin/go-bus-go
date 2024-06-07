<?php
function check_login()
{
    session_start();

    // Check if the user is not logged in
    if (empty($_SESSION['login'])) {
        // Redirect to the login page or any other page you want
        header("Location: user-login.php"); // Change "login.php" to the desired login page
        exit(); // Stop further execution of the script
    }
}
?>
