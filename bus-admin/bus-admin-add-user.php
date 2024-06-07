<?php
error_reporting(0);
include_once('conn.php');
if(isset($_POST['submit']))
{
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];
$contact=$_POST['phone'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$query=mysqli_query($con,"insert into users(first_name,last_name,address,city,gender,phone,email,password) values('$fname','$lname','$address','$city','$gender','$contact','$email','$password')");
if($query)
{
	echo "<script>alert('Successfully Registered. You can login now');</script>";
	header('location:user-login.php');
}
}
?>

<?php

include('bus-admin-header.php');
include('bus-admin-sidebar.php');
include('conn.php'); // Include your database connection file

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <style>
    .bg-body {
      background-color: LightGray;
    }
     /* Custom Styles */
     .form-group {
      margin-bottom: 20px;
    }
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
        padding-top: 56px;
    }
    .sidebar .nav-link {
        text-align: center;
        color: #fff; /* White text color */
    }
    .main-content {
        margin-left: 150px; /* Width of the sidebar */
        padding-top: 56px; /* Height of the navbar */
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
    /* Custom Styles */
    .main-login {
      margin-top: 50px; /* Increase margin at the top */
    }
    .logo h2 {
      font-size: 24px; /* Decrease font size */
    }
    .box-register {
      width: 80%; /* Set width as 80% of the parent container */
      margin: 0 auto; /* Center align the box */
    }
  </style>

<!-- script -->
<script type="text/javascript">
function valid()
{
 if(document.registration.password.value!= document.registration.password_again.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.registration.password_again.focus();
return false;
}
return true;
}
</script>


</head>
<body class="bg-body">
  <div class="container">
    <div class="row justify-content-center"> <!-- Center align content -->
      <div class="main-login col-xs-10 col-sm-8 col-md-6">
        <div class="logo margin-top-30 text-center"> <!-- Center align logo -->
          <a href="#"><h2>Go Bus Go | Bus Admin Add User </h2></a>
        </div>
        <!-- start: REGISTER BOX -->
        <div class="box-register container-fluid bg-white">
          <!-- Your form content -->
          <form name="registration" id="registration"  method="post" onSubmit="return valid();">
            <fieldset>
              <legend>
                Sign Up
              </legend>
              <p>
                Enter User details below:
              </p>
              <div class="form-group">
                <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Address" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="city" placeholder="City" required>
              </div>
              <div class="form-group">
                <label class="block">
                  Gender
                </label>
                <div class="clip-radio radio-primary">
                  <input type="radio" id="rg-female" name="gender" value="female" >
                  <label for="rg-female">
                    Female
                  </label>
                  <input type="radio" id="rg-male" name="gender" value="male">
                  <label for="rg-male">
                    Male
                  </label>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="phone" placeholder="Contact" required>
              </div>
              <p>
                Enter User account details below:
              </p>
              <div class="form-group">
                <span class="input-icon">
                  <input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()"  placeholder="Email" required>
                  <i class="fa fa-envelope"></i>
                </span>
                <span id="user-availability-status1" style="font-size:12px;"></span>
              </div>
              <div class="form-group">
                <span class="input-icon">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                  <i class="fa fa-lock"></i>
                </span>
              </div>
              <div class="form-group">
                <span class="input-icon">
                  <input type="password" class="form-control"  id="password_again" name="password_again" placeholder="Password Again" required>
                  <i class="fa fa-lock"></i>
                </span>
              </div>
              <div class="form-group">
                <div class="checkbox clip-check check-primary">
                  <input type="checkbox" id="agree" value="agree" checked="true" readonly="true">
                  <label for="agree">
                    I agree
                  </label>
                </div>
              </div>
              <div class="form-actions">
           
                <button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
                  Submit <i class="fa fa-arrow-circle-right"></i>
                </button>
              </div>
            </fieldset>
          </form>

          <div class="copyright">
            &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> Go Bus Go</span>. <span>All rights reserved</span>
         
        </div>
      </div>
    </div>
  </div>



  <script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
		
	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>	
</body>
</html>

         