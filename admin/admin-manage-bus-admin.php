<?php
session_start();
include('conn.php');

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header('Location: admin-login.php');
    exit();
}

include('admin-header.php');
include('admin-sidebar.php');

if (isset($_GET['action']) && isset($_GET['id'])) {
    // If action is 'delete' and id is provided, delete the bus admin
    if ($_GET['action'] == 'delete') {
        $id = $_GET['id'];
        $delete_query = "DELETE FROM bus_admin WHERE id='$id'";
        $result = mysqli_query($con, $delete_query);
        if ($result) {
            echo "<script>alert('Bus Admin deleted successfully');</script>";
        } else {
            echo "<script>alert('Failed to delete Bus Admin');</script>";
        }
    }
}

// Fetch all bus admins from the database
$query = "SELECT * FROM bus_admin";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Manage Bus Admins</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Styles -->
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
            background-color: #343a40;
            padding-top: 56px; /* Height of the navbar */
        }
        .sidebar .nav-link {
            text-align: center;
            color: #fff; /* White text color */
        }
        .card {
            width: 100%;
            max-width: 300px; /* Adjust card width */
            margin: 10px; /* Add margin around cards */
        }
    </style>
</head>
<body>
    <!-- Main Content -->
    <div class="main">
        <div class="container">
            <h1 class="text-center mb-4">Manage Bus Admins</h1>
            <div class="row justify-content-center">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-lg-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">' . $row['busAdminName'] . '</h5>
                                    <p class="card-text">' . $row['company'] . '</p>
                                    <p class="card-text">' . $row['address'] . '</p>
                                    <p class="card-text">' . $row['contactno'] . '</p>
                                    <p class="card-text">' . $row['busAdminEmail'] . '</p>
                                    <a href="admin-update-bus-admin.php?id=' . $row['id'] . '" class="btn btn-primary"><i class="fa fa-pencil"></i> Update</a>
                                    <a href="?action=delete&id=' . $row['id'] . '" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                </div>
                            </div>
                        </div>';
                }
                ?>
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
