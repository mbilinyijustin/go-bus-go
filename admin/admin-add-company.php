<?php
session_start();
include('conn.php');

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header('Location: admin-login.php');
    exit();
}

// Initialize messages
$success_message = $error_message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['company_name']) && isset($_POST['creation_date'])) {
    $company_name = mysqli_real_escape_string($con, $_POST['company_name']);
    $creation_date = mysqli_real_escape_string($con, $_POST['creation_date']);

    $query = "INSERT INTO buscompany (company, creationDate) VALUES ('$company_name', '$creation_date')";
    if (mysqli_query($con, $query)) {
        $success_message = "Company added successfully!";
    } else {
        $error_message = "Error: " . mysqli_error($con);
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
    <title>Add Company</title>
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
        .main {
            margin-left: 200px; /* Width of the sidebar */
            padding-top: 56px; /* Height of the navbar */
        }
        .card {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Main Content -->
    <div class="main">
        <div class="container">
            <h1 class="text-center mb-4">Add a New Company</h1>

            <?php
            if (!empty($success_message)) {
                echo '<div class="alert alert-success" role="alert">' . $success_message . '</div>';
            }
            if (!empty($error_message)) {
                echo '<div class="alert alert-danger" role="alert">' . $error_message . '</div>';
            }
            ?>

            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="creation_date">Creation Date</label>
                                    <input type="date" class="form-control" id="creation_date" name="creation_date" required>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add Company</button>
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
