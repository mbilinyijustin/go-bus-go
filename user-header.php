<?php 
session_start();
include("conn.php");
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">User Dashboard</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user-circle-o"></i> 
            <?php 
            // Check if session is set
            if(isset($_SESSION['id'])) {
              // Retrieve user's first name from database
              $query = mysqli_query($con, "SELECT first_name FROM users WHERE id = '".$_SESSION['id']."'");
              // Check if query was successful and returned a result
              if($query && mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_assoc($query);
                echo '<span class="text-success">' . $row['first_name'] . '</span>';
              } else {
                echo '<span class="text-success">User</span>';
              }
            } else {
              echo '<span class="text-success">Guest</span>';
            }
            ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Change Password</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="user-logout.php">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
