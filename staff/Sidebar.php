<?php  

error_reporting(0);


  $db = mysqli_connect("localhost","root","","attendance_system")or die("database error");

$sname=mysqli_fetch_row(mysqli_query($db,"SELECT * FROM staff_data WHERE ID='".$_SESSION['staff']."'"));
?>
  <aside class="main-sidebar sidebar-light-purple elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Attendance</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../admin/<?php echo $sname[6]?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $sname[1]?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>

          
          
          <li class="nav-item">
            <a href="Record.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Record Attendance
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="attendance_view.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                View Attendance
              </p>
            </a>
          </li>
          <li class="nav-header">Report</li>
          <li class="nav-item">
            <a href="Report.php" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Attendance Report
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>