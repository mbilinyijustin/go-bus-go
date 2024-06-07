<?php
session_start();
include('conn.php');

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header('Location: bus-admin-login.php');
    exit();
}

// Delete user
if (isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];
    $query = mysqli_query($con, "DELETE FROM users WHERE id='$user_id'");
    if ($query) {
        echo "<script>alert('User deleted successfully');</script>";
    } else {
        echo "<script>alert('Error deleting user');</script>";
    }
}

include('admin-header.php');
include('admin-sidebar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
            width: 200px;
            background-color: #343a40;
            padding-top: 56px;
        }
        .sidebar .nav-link {
            text-align: center;
            color: #fff;
        }
        .main-content {
            margin-left: 200px;
            padding-top: 56px;
        }
        .table {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="container">
            <h1 class="text-center mb-4">View available Users</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Email</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM users");
                    while ($row = mysqli_fetch_array($query)) {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['first_name'] . '</td>';
                        echo '<td>' . $row['last_name'] . '</td>';
                        echo '<td>' . $row['address'] . '</td>';
                        echo '<td>' . $row['city'] . '</td>';
                        echo '<td>' . $row['gender'] . '</td>';
                        echo '<td>' . $row['phone'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
