<?php
session_start();
include("conn.php");
error_reporting(0);
if(isset($_POST['submit']))
{
$uname=$_POST['username'];
$dpassword=md5($_POST['password']);	
$ret=mysqli_query($con,"SELECT * FROM bus_admin WHERE busAdminEmail='$uname' and password='$dpassword'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$_SESSION['dlogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$uid=$num['id'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
//Code Logs
$log=mysqli_query($con,"insert into busAdminlog(uid,username,userip,status) values('$uid','$uname','$uip','$status')");

header("location:bus-admin.php");
}
else
{

$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
mysqli_query($con,"insert into busAdminlog(username,userip,status) values('$uname','$uip','$status')");
$_SESSION['errmsg']="Invalid username or password";
header("location:index.php");

}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <style>
    .bg-body {
      background-color: LightGray;
    }
    /* Custom Styles */
    .main-login {
      margin-top: 50px; /* Increase margin at the top */
    }
    .logo h2 {
      font-size: 24px; /* Decrease font size */
    }
    .box-login {
      width: 80%; /* Set width as 80% of the parent container */
      margin: 0 auto; /* Center align the box */
    }
    .form-group {
      margin-bottom: 20px; /* Increase space between form groups */
    }
    .input-icon {
      position: relative;
    }
    .input-icon input {
      padding-left: 40px; /* Add space for icon */
    }
    .input-icon i {
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
    }
  </style>
</head>
<body class="bg-body">
  <div class="container py-4"> <!-- Increase padding of the container -->
    <div class="row justify-content-center"> <!-- Center align content -->
      <div class="main-login col-xs-10 col-sm-8 col-md-6">
        <div class="logo mb-4 text-center"> <!-- Center align logo -->
          <a href="#"><h2>Go Bus Go | Bus Admin Login</h2></a>
        </div>
        <!-- start: LOGIN BOX -->
        <div class="box-login container-fluid bg-white p-4">
          <!-- Your form content -->
          <form name="login" id="login"  method="post" onSubmit="return validateLogin();">
            <fieldset>
              <legend>
                Login
              </legend>
              <p>
								Please enter your email and password to log in.<br />
								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
							</p>
              <div class="form-group">
                <span class="input-icon">
                  <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                  <i class="fa fa-user"></i>
                </span>
              </div>
              <div class="form-group">
                <span class="input-icon">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                  <i class="fa fa-lock"></i>
                </span>
              </div>
              <div class="form-actions">
              <button type="submit" class="btn btn-primary btn-block" id="submit" name="submit">
                  Login <i class="fa fa-sign-in"></i>
                </button>
                <a href="../index.php">Bacto Home Page</a>
              </div>
            </fieldset>
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

<!-- local scripts -->
<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
	
		<script src="assets/js/main.js"></script>

		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
</body>
</html>
