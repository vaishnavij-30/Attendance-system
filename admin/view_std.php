<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Attendance-admin</title>
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/style.css">
</head>     
<body>
  <div class="container-scroller">
<?php 
  include 'Header.php';
?>
    <div class="container-fluid page-body-wrapper">
<?php 
  include 'Sidebar.php';
?>
      <div class="main-panel">        
        <div class="content-wrapper">
<?php  
  $db = mysqli_connect("localhost","root","","attendance_system")or die("database error");
?>  
          <div class="row">
<?php
      $res=mysqli_query($db,"SELECT * FROM std_data");
      while($row=mysqli_fetch_row($res))
      {
        echo' 
          <div class="col-sm-3" style="background-color: white; color: #fff;border: 3px solid purple; border-radius: 25px;">
            <div class="" >
              <div class="card-body">
                <ul type="none">
                  <li><p class="card-title" style="text-align: center;font-size: 20px; color: Purple; font-weight: 600">'.$row[1].'</p></li>
                  <li><p class="card-title" style="text-align: center;font-size: 16px;color: Black">'.$row[6].'</p></li>
                  <li><p class="card-title" style="text-align: center;font-size: 16px;color: black">Roll No : '.$row[2].'</p></li>
                  <li><p class="card-title" style="text-align: center;font-size: 16px;color: Black">PRN No : '.$row[3].'</p></li>
                  <li><p class="card-title" style="text-align: center;font-size: 16px;color: black">Email : '.$row[4].'</p></li>
                  <li><p class="card-title" style="text-align: center;font-size: 16px;color: Black">Mobile : '.$row[5].'</p></li>
                  <li style="text-align: right;"><a href="update_std.php?id='.$row[0].'"><button type="button" class="btn btn-gradient-danger btn-rounded btn-icon"><i class="mdi mdi-pencil"></i></button></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>';
      }
?>
          </div>
        </div>
<?php
  include 'Footer.php';
?>
      </div>
    </div>
  </div>
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/file-upload.js"></script>
</body>
</html>
