<?php
session_start();
include('conn.php');
$_SESSION['dlogin']=="";
date_default_timezone_set('Asia/Kolkata');
$ldate=date( 'd-m-Y h:i:s A', time () );
$did=$_SESSION['id'];
mysqli_query($con,"UPDATE busAdminlog  SET logout = '$ldate' WHERE uid = '$did' ORDER BY id DESC LIMIT 1");
session_unset();
//session_destroy();
$_SESSION['errmsg']="You are currently logged out ";
?>
<script language="javascript">
document.location="bus-admin-login.php";
</script>
