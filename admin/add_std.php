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
          <div class="page-header">
            <h3 class="page-title">
              CSE Department
            </h3>
          </div>
<?php  
  $db = mysqli_connect("localhost","root","","attendance_system")or die("database error");
?> 
          <div class="row">
            <div class="col-md-3 grid-margin stretch-card"></div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card" style="border-top: 3px solid purple">
                <div class="card-body">
                  <h4 class="card-title">Student Info</h4>
                  <form class="form-sample" action="add_std.php" method="POST">
                    <p class="card-description">
                      Personal info
                    </p>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Full Name</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="sname" placeholder="Enter your full name" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Roll Number</label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control" name="rn" placeholder="Enter your roll number" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">PRN Number</label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control" name="prn" placeholder="Enter PRN number" />
                          </div>
                        </div>
                      </div>
                    </div> 
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Email</label>
                          <div class="col-sm-8">
                            <input type="email" class="form-control" name="email" placeholder="Enter Your email" />
                          </div>
                        </div>
                      </div>
                    </div>  
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Mobile</label>
                          <div class="col-sm-8">
                            <input type="mobile" class="form-control" name="mobile" placeholder="Enter your mobile number" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Year</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="year">
                              <option>Select Year</option>
                              <option value="Second Year">Second Year</option>
                              <option value="Third Year">Third Year</option>
                              <option value="Final Year">Final Year</option>
                            </select>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3 grid-margin stretch-card">
                      <button type="Submit" class="btn btn-gradient-primary btn-rounded " name="save">Submit</button>&nbsp;
                      <button type="reset" class="btn btn-gradient-danger btn-rounded " name="save">Cancel</button>
                  </div> 
                  </form>
                </div>
              </div>
            </div>
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
<?php 
if(isset($_POST['save']))
{
  $name=$_POST['sname'];
  $rn=$_POST['rn'];
  $prn=$_POST['prn'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $year=$_POST['year'];
  if(mysqli_query($db,"INSERT INTO std_data VALUES('','".$name."','".$rn."','".$prn."','".$email."','".$mobile."','".$year."')"))
  {
    echo'<script>
    alert("Student Information is Successfully added");
    window.location.href="add_std.php";
    </script>';
  }
  else
  {
    echo'<script>
    alert("Student Information is not added");
    window.location.href="add_std.php";
    </script>';
  }
}
?> 