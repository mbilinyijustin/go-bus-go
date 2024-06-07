<?php
error_reporting(0);
include('conn.php');
include('checklogin.php');
check_login();
$msg = ""; // Initialize $msg variable
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];

    $sql = mysqli_query($con, "Update users set first_name='$fname',last_name='$lname',address='$address',city='$city',gender='$gender' where id='" . $_SESSION['id'] . "'");
    if ($sql) {
        $msg = "Your Profile updated Successfully";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>User | Edit Profile</title>

    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">



</head>

<body>
    <div id="app">
        <?php include('user-sidebar.php'); ?>
        <div class="app-content">

            <?php include('user-header.php'); ?>

            <!-- end: TOP NAVBAR -->
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Customer | Edit Profile</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>User </span>
                                </li>
                                <li class="active">
                                    <span>Edit Profile</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <!-- end: PAGE TITLE -->
                    <!-- start: BASIC EXAMPLE -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                    
                                <div class="row margin-top-30">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="panel panel-white">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">Edit Profile</h5>
                                            </div>
                                            <div class="panel-body">
                                                <?php
                                                $sql = mysqli_query($con, "select * from users where id='" . $_SESSION['id'] . "'");
                                                while ($data = mysqli_fetch_array($sql)) {
                                                ?>
                                                    <h4><?php echo htmlentities($data['first_name']); ?>'s Profile</h4>
                                                    <p><b>Profile Reg. Date: </b><?php echo htmlentities($data['regDate']); ?></p>
                                                    <?php if ($data['updationDate']) { ?>
                                                        <p><b>Profile Last Updation Date: </b><?php echo htmlentities($data['updationDate']); ?></p>
                                                    <?php } ?>
                                                    <hr />
                                                    <form role="form" name="edit" method="post">
                                                        <div class="form-group">
                                                            <label for="fname">
                                                                First Name
                                                            </label>
                                                            <input type="text" name="fname" class="form-control" value="<?php echo htmlentities($data['first_name']); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="lname">
                                                                Last Name
                                                            </label>
                                                            <input type="text" name="lname" class="form-control" value="<?php echo htmlentities($data['last_name']); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="address">
                                                                Address
                                                            </label>
                                                            <textarea name="address" class="form-control"><?php echo htmlentities($data['address']); ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="city">
                                                                City
                                                            </label>
                                                            <input type="text" name="city" class="form-control" required="required" value="<?php echo htmlentities($data['city']); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="gender">
                                                                Gender
                                                            </label>
                                                            <select name="gender" class="form-control" required="required">
                                                                <option value="<?php echo htmlentities($data['gender']); ?>"><?php echo htmlentities($data['gender']); ?></option>
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                                <option value="other">Other</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="fess">
                                                                User Email
                                                            </label>
                                                            <input type="email" name="uemail" class="form-control" readonly="readonly" value="<?php echo htmlentities($data['email']); ?>">
                                                            <a href="change-emailid.php">Update your email id</a>
                                                        </div>
                                                        <button type="submit" name="submit" class="btn btn-o btn-primary">
                                                            Update
                                                        </button>
                                                    </form>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="panel panel-white">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- start: FOOTER -->
            <!-- end: FOOTER -->
            <!-- start: SETTINGS -->
            <!-- end: SETTINGS -->
        </div>
        <!-- start: MAIN JAVASCRIPTS -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/modernizr/modernizr.js"></script>
        <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="vendor/switchery/switchery.min.js"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
        <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="vendor/autosize/autosize.min.js"></script>
        <script src="vendor/selectFx/classie.js"></script>
        <script src="vendor/selectFx/selectFx.js"></script>
        <script src="vendor/select2/select2.min.js"></script>
        <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <!-- start: CLIP-TWO JAVASCRIPTS -->
        <script src="assets/js/main.js"></script>
        <!-- start: JavaScript Event Handlers for this page -->
        <script src="assets/js/form-elements.js"></script>
        <script>
            jQuery(document).ready(function() {
                Main.init();
                FormElements.init();
            });
        </script>
        <!-- end: JavaScript Event Handlers for this page -->
        <!-- end: CLIP-TWO JAVASCRIPTS -->
        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            // Display success message in a popup window
            $(document).ready(function() {
                var msg = "<?php echo htmlentities($msg); ?>";
                if (msg !== "") {
                    alert(msg);
                }
            });
        </script>
    </body>

</html>
