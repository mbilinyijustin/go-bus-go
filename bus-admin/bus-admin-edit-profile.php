<?php
session_start();
include('conn.php');

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header('Location: bus-admin-login.php');
    exit();
}

if (isset($_POST['submit'])) {
    $busAdName = $_POST['busAdminName'];
    $address = $_POST['address'];
    $contactno = $_POST['contactno'];
    $email = $_POST['busAdminEmail'];
    
    // If the password field is not empty, update the password
    if (!empty($_POST['password'])) {
        $password = md5($_POST['password']);
        $query = "UPDATE bus_admin SET busAdminName='$busAdName', address='$address', contactno='$contactno', busAdminEmail='$email', password='$password' WHERE id='".$_SESSION['id']."'";
    } else {
        $query = "UPDATE bus_admin SET busAdminName='$busAdName', address='$address', contactno='$contactno', busAdminEmail='$email' WHERE id='".$_SESSION['id']."'";
    }

    $sql = mysqli_query($con, $query);

    if ($sql) {
        echo "<script>alert('Profile updated successfully');</script>";
    } else {
        echo "<script>alert('Profile update failed');</script>";
    }
}

// Fetch current admin details
$query = mysqli_query($con, "SELECT * FROM bus_admin WHERE id='".$_SESSION['id']."'");
$row = mysqli_fetch_array($query);

include('bus-admin-header.php');
include('bus-admin-sidebar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
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
    </style>
</head>
<body>
    <div class="main-content">
        <div class="container">
            <h1 class="text-center mb-4">Bus Admin Edit Profile</h1>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="post">
                                <div class="form-group">
                                    <label for="busAdminName">Bus Admin Name</label>
                                    <input type="text" class="form-control" id="busAdminName" name="busAdminName" value="<?php echo $row['busAdminName']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="contactno">Contact Number</label>
                                    <input type="text" class="form-control" id="contactno" name="contactno" value="<?php echo $row['contactno']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="busAdminEmail">Email</label>
                                    <input type="email" class="form-control" id="busAdminEmail" name="busAdminEmail" value="<?php echo $row['busAdminEmail']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    <small class="form-text text-muted">Leave blank if you do not want to change the password</small>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Update Profile</button>
                            </form>
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
