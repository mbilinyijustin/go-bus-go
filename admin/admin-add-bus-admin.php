<?php
session_start();
error_reporting(0);
include('conn.php');
if(strlen($_SESSION['id']==0)) {
 header('location:admin-login.php');
  } else{

if(isset($_POST['submit']))
{	$company=$_POST['company'];
$busAdName=$_POST['busAdminName'];
$address=$_POST['address'];
$contactno=$_POST['contactno'];
$email=$_POST['busAdminEmail'];
$password=md5($_POST['password']);
$sql=mysqli_query($con,"insert into bus_admin(company,busAdminName,address,contactno,busAdminEmail,password) values('$company','$busAdName','$address','$contactno','$email','$password')");
if($sql)
{
echo "<script>alert('Bus Admin info added Successfully');</script>";
echo "<script>window.location.href ='admin-dashboard.php'</script>";

}
}
?>

	<?php 
    include('admin-header.php');
    include('admin-sidebar.php');

    ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Add Bus Admin</title>

           <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
		
		
		
		<link rel="stylesheet" href="style.css" />

<script type="text/javascript">
function valid()
{
 if(document.adddoc.password.value!= document.adddoc.cpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.adddoc.cpassword.focus();
return false;
}
return true;
}
</script>


<script>
function checkemailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#docemail").val(),
type: "POST",
success:function(data){
$("#email-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

<!-- custom styles -->
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
        .main- {
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
      
      .app-content {
        margin-left: 220px; /* Adjust margin as per your requirement */
        padding: 20px; /* Add padding to give some space inside the content area */
    }
    </style>
	</head>
	<body>
		<div id="app">		
			<div class="app-content">
				
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Admin |<span class="text-success">Add Bus Admin</span> </h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin |</span>
									</li>
									<li class="active">
										<span class="text-success">Add Bus Admin</span>
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
													<h5 class="panel-title">Add Bus Admin</h5>
												</div>
												<div class="panel-body">
									
													<form role="form" name="adddoc" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="DoctorSpecialization">
																Bus Company
															</label>
							<select name="Doctorspecialization" class="form-control" required="true">
																<option value="">Select Bus Company</option>
<?php $ret=mysqli_query($con,"select * from busCompany");
while($row=mysqli_fetch_array($ret))
{
?>
																<option value="<?php echo htmlentities($row['company']);?>">
																	<?php echo htmlentities($row['company']);?>
																</option>
																<?php } ?>
																
															</select>
														</div>

<div class="form-group">
	<label for="busAdminName">
		 Bus Admin Name
	</label>
	<input type="text" name="busAdminName" class="form-control"  placeholder="Enter Bus Admin Name" required="true">
</div>


<div class="form-group">
	<label for="address">
		 Bus Admin Address
	</label>
	<input name="address" class="form-control"  placeholder="Enter Bus Admin Address" required="true">
</div>
<div class="form-group">
	<label for="contact">
		 Bus Admin Contact
	</label>
    <input type="text" name="contactno" class="form-control"  placeholder="Enter Bus Admin Contacts" required="true">
</div>

											

<div class="form-group">
	<label for="fess">
		 Bus Admin Email
	</label>
   <input type="email" id="docemail" name="busAdminEmail" class="form-control"  placeholder="Enter Bus Admin Email id" required="true" onBlur="checkemailAvailability()">
   <span id="email-availability-status"></span>
</div>



														
<div class="form-group">
	<label for="exampleInputPassword1">
		 Password
	</label>
	<input type="password" name="password" class="form-control"  placeholder="New Password" required="required">
</div>
														
<div class="form-group">
	<label for="exampleInputPassword2">
		Confirm Password
	</label>
	<input type="password" name="cpassword" class="form-control"  placeholder="Confirm Password" required="required">
</div>
														
														
     <button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
    	Submit
    </button>	
</form>
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
						<!-- end: BASIC EXAMPLE -->
			
					
					
						
						
					
						<!-- end: SELECT BOXES -->
						
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

        <!-- Bootstrap JS and Font Awesome (for icons) -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</body>
</html>
<?php } ?>