<!-- Sidebar -->
<div class="sidebar">
    <div class="container">
        <ul class="nav flex-column">
        <li class="nav-item">
      <a class="nav-link" href="bus-admin.php">
        <i class="fa fa-dashboard"></i> Dashboard
      </a>
    </li>
    <li class="accordion-item">
      <div class="nav-link" data-toggle="collapse" data-target="#usersCollapse">
        <i class="fa fa-user"></i> User
      </div>
      <div id="usersCollapse" class="collapse">
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="bus-admin-add-user.php">Add User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bus-admin-manage-users.php">View User</a>
          </li>
        </ul>
      </div>
    </li>
  
   
    <li class="accordion-item">
      <div class="nav-link" data-toggle="collapse" data-target="#busesCollapse">
        <i class="fa fa-bus"></i> Buses
      </div>
      <div id="busesCollapse" class="collapse">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="bus-admin-add-bus.php">Add Bus</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bus-admin-manage-buses.php">View Bus</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="fa fa-search"></i> Search
      </a>
    </li>
        </ul>
    </div>
</div>