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

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $company = $_POST['company'];
    $busAdName = $_POST['busAdminName'];
    $address = $_POST['address'];
    $contactno = $_POST['contactno'];
    $email = $_POST['busAdminEmail'];

    // Update the bus admin details in the database
    $update_query = "UPDATE bus_admin SET company='$company', busAdminName='$busAdName', address='$address', contactno='$contactno', busAdminEmail='$email' WHERE id='$id'";
    $result = mysqli_query($con, $update_query);
    if ($result) {
        echo "<script>alert('Bus Admin updated successfully');</script>";
        echo "<script>window.location.href ='manage-bus-admins.php'</script>";
    } else {
        echo "<script>alert('Failed to update Bus Admin');</script>";
    }
}

// Fetch the details of the bus admin to be updated
$id = $_GET['id'];
$query = "SELECT * FROM bus_admin WHERE id='$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Update Bus Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
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
            background-color: #343a40;
            padding-top: 56px; /* Height of the navbar */
        }
        .sidebar .nav-link {
            text-align: center;
            color: #fff; /* White text color */
        }
    </style>
</head>
<body>
    <!-- Main Content -->
    <div class="main">
        <div class="container">
            <h1 class="text-center mb-4">Update Bus Admin</h1>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <div class="form-group">
                            <label for="company">Bus Company</label>
                            <input type="text" class="form-control" name="company" value="<?php echo $row['company']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="busAdminName">Bus Admin Name</label>
                            <input type="text" class="form-control" name="busAdminName" value="<?php echo $row['busAdminName']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="contactno">Contact Number</label>
                            <input type="text" class="form-control" name="contactno" value="<?php echo $row['contactno']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="busAdminEmail">Email</label>
                            <input type="email" class="form-control" name="busAdminEmail" value="<?php echo $row['busAdminEmail']; ?>" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    </form>
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
