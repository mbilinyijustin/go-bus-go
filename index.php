<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKING ONLINE</title>
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
            padding: 300px 0;
            height: 50px;
        
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

        .appoint {
            margin-left: auto; /* Push the button to the far right */
        }
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

        /* Footer */
        .footer {
            background-color: #343a40; /* Light-dark background */
            color: white; /* White text */
            padding: 20px 0; /* Increase padding */
        }

        .footer .social-icons i {
            font-size: 20px;
            margin-right: 10px;
        }

        .footer p {
            margin: 0;
        }

        .text-left {
            position: absolute;
            left: 5px;
        }

        .text-right {
            position: absolute;
            right: 5px;
        }

        .col ul {
            float: right;
        }

        /* Header31 Styling */
        .header31 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #ffffff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .header31 p {
            font-size: 2.5rem;
            font-weight: bold;
            opacity: 0;
            animation: bounceIn 1s ease forwards;
            animation-iteration-count: infinite; /* Infinite loop */
            animation-delay: var(--animation-delay);
        }

        .header31 p:nth-child(1) {
            --animation-delay: 0s;
        }

        .header31 p:nth-child(2) {
            --animation-delay: 5s;
        }

        @keyframes bounceIn {
            0%, 20%, 40%, 60%, 80%, 100% {
                transform: translateY(0);
            }

            10% {
                transform: translateY(-30px);
            }

            30% {
                transform: translateY(-15px);
            }

            50% {
                transform: translateY(-4px);
            }

            70% {
                transform: translateY(-2px);
            }

            90% {
                transform: translateY(-1px);
            }

            100% {
                opacity: 1;
            }
        }

        .header3 {
            position: relative;
        }

        .header3 img {
            width: 100%; /* Full width to avoid overflow */
            height: auto;
        }

        .header3 .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Dark overlay */
            z-index: 1;
        }

        /* Bus Features */
        .bus-features {
            margin: 50px 0; /* Add margin to the top and bottom */
            padding: 30px; /* Add padding for better spacing */
            background-color: #f8f9fa; /* Light background color */
        }

        .bus-features .feature {
            text-align: center;
            margin-bottom: 20px;
        }

        .bus-features .feature i {
            font-size: 50px; /* Larger icon size */
            color: #007bff; /* Icon color */
            margin-bottom: 10px;
        }

        .bus-features .feature p {
            font-size: 20px; /* Font size for feature text */
            font-style: italic;
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
                            <a class="nav-link active" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="aboutus.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactus.php">Contact Us</a>
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
    <!-- Header Image -->
    <div class="header3 container mt-5">
        <div class="row no-gutters">
            <div class="col-md-12 position-relative">
                <img src="IMAGES/bus-1.jpg" class="img-fluid" alt="Responsive image">
                <div class="overlay"></div>
                <div class="header31">
                    <p>Embrace Freedom To Explore</p>
                    <p>Book Now!! &amp;  <span class="text-success">Travel More!!</span> </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bus Features section-->
    <div class="bus-features">
        <center>
            <p style="font-size: 35px; font-style: italic; font-family: Verdana, sans-serif;" class="text-primary">Bus Features</p>
        </center>
        <div class="header61 d-flex justify-content-between row no-gutters">
            <div class="feature col-sm-3">
                <i class="fas fa-wifi"></i>
                <p>Free Wifi</p>
            </div>
            <div class="feature col-sm-3">
                <i class="fas fa-fan"></i>
                <p>Air Conditioner</p>
            </div>
            <div class="feature col-sm-3">
                <i class="fas fa-tv"></i>
                <p>Television</p>
            </div>
            <div class="feature col-sm-3">
                <i class="fab fa-usb"></i>
                <p>Charging System</p>
            </div>
        </div>
    </div>

    <!-- Carousel -->
    <div id="carouselExampleRide" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="pics/b-125.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="pics/b-110.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="pics/b-111.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="pics/b-122.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="pics/b-115.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="pics/b-114.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Logins Section -->
    <section id="logins" class="container-fluid" style="margin: 200px 0 100px 0;">
        <div class="container">
            <div class="inner-title text-center" style="margin-bottom: 50px;">
                <h2>Logins</h2>
            </div>

            <div class="col-sm-12 blog-cont">
                <div class="row no-gutters justify-content-center">
                    <div class="col-sm-4 card text-center mx-2" style="width: 18rem;">
                        <i class="fa fa-user-circle fa-3x mt-3"></i>
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 1.25rem;">User login</h5>
                            <p class="card-text">Users can login here!</p>
                            <a href="user-login.php" class="btn btn-primary">Click Here</a>
                        </div>
                    </div>
                    <div class="col-sm-4 card text-center mx-2" style="width: 18rem;">
                        <i class="fa fa-bus"></i>
                        <i class="fa fa-user-circle fa-3x mt-3"></i>
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 1.25rem;">Bus Admin login</h5>
                            <p class="card-text">Bus Admin can login here!</p>
                            <a href="bus-admin/bus-admin-login.php" class="btn btn-primary">Click Here</a>
                        </div>
                    </div>
                    <div class="col-sm-4 card text-center mx-2" style="width: 18rem;">
                        <i class="fa fa-user-circle fa-3x mt-3"></i>
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 1.25rem;">Admin login</h5>
                            <p class="card-text">Admin can login here!</p>
                            <a href="admin/admin-login.php" class="btn btn-primary">Click Here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <div class="footer container-fluid">
        <div class="row no-gutters">
            <div class="col-sm-4 social-icons">
                <span><i class="fab fa-facebook"></i></span>
                <span><i class="fab fa-whatsapp"></i></span>
                <span><i class="fab fa-instagram-square"></i></span>
                <span><i class="fab fa-youtube"></i></span>
                <span><i class="fab fa-twitter-square"></i></span>
                <span><i class="fab fa-telegram"></i></span>
            </div>
            <div class="col-sm-8 text-right">
                <p>
                    Copyright <span><i class="fas fa-copyright"></i></span> 2024 GoBusGo All 
                    Rights Reserved | Terms & Conditions | FAQ | Privacy Policy 
                </p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const navLinks = document.querySelectorAll(".custom-navbar .nav-link");
            navLinks.forEach(link => {
                link.addEventListener("click", function() {
                    navLinks.forEach(nav => nav.classList.remove("active"));
                    this.classList.add("active");
                });
            });
        });
    </script>
</body>
</html>
