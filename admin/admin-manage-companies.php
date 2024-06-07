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

// Handle update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_company_id'])) {
    $company_id = mysqli_real_escape_string($con, $_POST['update_company_id']);
    $company_name = mysqli_real_escape_string($con, $_POST['update_company_name']);
    $creation_date = mysqli_real_escape_string($con, $_POST['update_creation_date']);

    $query = "UPDATE buscompany SET company='$company_name', creationDate='$creation_date' WHERE id='$company_id'";
    if (mysqli_query($con, $query)) {
        $success_message = "Company updated successfully!";
    } else {
        $error_message = "Error: " . mysqli_error($con);
    }
}

// Handle delete
if (isset($_GET['delete_company_id'])) {
    $company_id = mysqli_real_escape_string($con, $_GET['delete_company_id']);
    $query = "DELETE FROM buscompany WHERE id='$company_id'";
    if (mysqli_query($con, $query)) {
        $success_message = "Company deleted successfully!";
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
    <title>Manage Companies</title>
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
            <h1 class="text-center mb-4">Manage Companies</h1>

            <?php
            if (!empty($success_message)) {
                echo '<div class="alert alert-success" role="alert">' . $success_message . '</div>';
            }
            if (!empty($error_message)) {
                echo '<div class="alert alert-danger" role="alert">' . $error_message . '</div>';
            }
            ?>

            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Company Name</th>
                                <th>Creation Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM buscompany";
                            $result = mysqli_query($con, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['company']}</td>
                                        <td>{$row['creationDate']}</td>
                                        <td>
                                            <button class='btn btn-warning btn-sm' data-toggle='modal' data-target='#updateModal' data-id='{$row['id']}' data-name='{$row['company']}' data-date='{$row['creationDate']}'>
                                                <i class='fa fa-edit'></i> Update
                                            </button>
                                            <a href='admin-manage-companies.php?delete_company_id={$row['id']}' class='btn btn-danger btn-sm'>
                                                <i class='fa fa-trash'></i> Delete
                                            </a>
                                        </td>
                                    </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="admin-manage-companies.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Update Company</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="update_company_id" name="update_company_id">
                        <div class="form-group">
                            <label for="update_company_name">Company Name</label>
                            <input type="text" class="form-control" id="update_company_name" name="update_company_name" required>
                        </div>
                        <div class="form-group">
                            <label for="update_creation_date">Creation Date</label>
                            <input type="date" class="form-control" id="update_creation_date" name="update_creation_date" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Font Awesome (for icons) -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $('#updateModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var date = button.data('date');
            
            var modal = $(this);
            modal.find('#update_company_id').val(id);
            modal.find('#update_company_name').val(name);
            modal.find('#update_creation_date').val(date);
        });
    </script>
</body>
</html>
