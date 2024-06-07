<?php
session_start();
include 'conn.php'; // Include database connection

if (isset($_POST['submit'])) {
    // Collect and sanitize form data
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    // Insert data into the contactus table
    $sql = "INSERT INTO contactus (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Message sent successfully!'); window.location.href='contactus.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        .sticky-container {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            z-index: 1020;
            background-color: white;
            height: auto;
            box-shadow: 0px 4px 2px -2px gray;
        }
        .header1 {
            background-color: #007bff;
            color: white;
            padding: 10px 0;
        }
        .custom-navbar {
            display: flex;
            align-items: center;
            padding: 10px 0;
            background-color: white;
        }
        .custom-navbar .nav-link {
            color: black;
            position: relative;
        }
        .custom-navbar .nav-link.active {
            color: black;
        }
        .custom-navbar .nav-link.active::after {
            content: "";
            display: block;
            width: 100%;
            height: 2px;
            background: black;
            position: absolute;
            bottom: -5px;
            left: 0;
        }
        .appoint {
            margin-left: auto;
        }
        .main {
            padding-top: 70px; /* Height of the sticky header */
        }
        .card {
            margin-top: 20px;
        }
        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        .footer a {
            color: #fff;
        }
        .footer a:hover {
            color: #d4af37;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <!-- Sticky Container -->
    <div class="sticky-container">
        <!-- header navbar -->
        <div class="header1 row no-gutters">
            <div class="col-md-6 col-sm-12 text-left text-white pl-3">
                <i class="fa fa-phone-volume"></i> +255 628674589
            </div>
            <div class="col-md-6 col-sm-12 text-right text-white pr-3">
                <i class="fa fa-envelope"></i> info@GoBusGo
            </div>
        </div>

        <!-- Navbar -->
        <div class="container-fluid custom-navbar">
            <div class="row align-items-center w-100 no-gutters">
                <div class="col-auto d-flex align-items-center">
                    <img src="IMAGES/Logo.png" alt="Logo" style="height: 45px; width: 65px;" class="logoo"> 
                    <h2 class="ml-2">Go Bus Go</h2>
                </div>
                <div class="col">
                    <ul class="nav nav-underline">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="aboutus.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#logins">Logins</a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto appoint">
                    <a class="btn btn-success" href="user-login.php">Book A Ticket</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main">
        <div class="container">
            <h1 class="text-center mb-4">Contact Us</h1>

            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="contactus.php">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" class="form-control" id="subject" name="subject" required>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-paper-plane"></i> Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h2 class="card-title">Get in Touch</h2>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-envelope"></i> Email: <a href="mailto:support@buscompany.com">support@buscompany.com</a></li>
                                <li><i class="fa fa-phone"></i> Phone: +123-456-7890</li>
                                <li><i class="fa fa-map-marker"></i> Address: 123 Main Street, Anytown, AT 12345</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>&copy; 2024 Bus Company. All rights reserved.</p>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i> Facebook</a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i> Twitter</a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i> Instagram</a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i> LinkedIn</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and Font Awesome (for icons) -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
