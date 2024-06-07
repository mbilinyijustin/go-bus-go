<?php
session_start();
include('conn.php');

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header('Location: bus-admin-login.php');
    exit();
}

include('bus-admin-header.php');
include('bus-admin-sidebar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        /* Adjust styles here */
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
            width: 200px; /* Width of the sidebar */
            background-color: #343a40;
            padding-top: 56px; /* Height of the navbar */
        }
        .sidebar .nav-link {
            text-align: center;
            color: #fff; /* White text color */
        }
        .main {
            margin-left: 200px; /* Width of the sidebar */
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
    <!-- Main Content -->
    <div class="main">
        <div class="container">
            <h1 class="text-center mb-4">
                Welcome, 
                <?php 
                $query = mysqli_query($con, "SELECT busAdminName FROM bus_admin WHERE id='".$_SESSION['id']."'");
                while ($row = mysqli_fetch_array($query)) {
                    echo '<span class="text-success">' . $row['busAdminName'] . '</span>';
                }
                ?>
            </h1>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fa fa-user card-icon"></i>
                            <h5 class="card-title">My Profile</h5>
                            <p class="card-text">View and edit your profile details.</p>
                            <a href="bus-admin-edit-profile.php" class="btn btn-primary"><i class="fa fa-user"></i> My Profile</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fa fa-bus card-icon"></i>
                            <h5 class="card-title">Manage Buses</h5>
                            <p class="card-text">Add, edit, or delete bus details.</p>
                            <a href="bus-admin-manage-buses.php" class="btn btn-primary"><i class="fa fa-bus"></i> Manage Buses</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fa fa-users card-icon"></i>
                            <h5 class="card-title">Manage Users</h5>
                            <p class="card-text">Add, edit, or delete user accounts.</p>
                            <a href="bus-admin-manage-users.php" class="btn btn-primary"><i class="fa fa-users"></i> Manage Users</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fa fa-book card-icon"></i>
                            <h5 class="card-title">Manage Bookings</h5>
                            <p class="card-text">View and manage bus bookings.</p>
                            <a href="bus-admin-manage-bookings.php" class="btn btn-primary"><i class="fa fa-book"></i> Manage Bookings</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Font Awesome (for icons) -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
