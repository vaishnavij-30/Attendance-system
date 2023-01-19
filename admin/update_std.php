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
error_reporting(0);
  $db = mysqli_connect("localhost","root","","attendance_system")or die("database error");
  $res = mysqli_query($db,"SELECT * FROM std_data WHERE ID = '".$_GET['id']."' ");
  $row = mysqli_fetch_row($res);
?> 
          <div class="row">
            <div class="col-md-3 grid-margin stretch-card"></div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card" style="border-top: 3px solid purple">
                <div class="card-body">
                  <h4 class="card-title">Student Info</h4>
                  <form class="form-sample" action="update_std.php" method="POST">
                    <p class="card-description">
                      Personal info
                    </p>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Full Name</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="sname" value="<?php echo $row[1]?>" />
                            <input type="hidden" class="form-control" name="id" value="<?php echo $row[0]?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Roll Number</label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control" name="rn" value="<?php echo $row[2]?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">PRN Number</label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control" name="prn" value="<?php echo $row[3]?>"/>
                          </div>
                        </div>
                      </div>
                    </div> 
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Email</label>
                          <div class="col-sm-8">
                            <input type="email" class="form-control" name="email" value="<?php echo $row[4]?>"/>
                          </div>
                        </div>
                      </div>
                    </div>  
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Mobile</label>
                          <div class="col-sm-8">
                            <input type="mobile" class="form-control" name="mobile" value="<?php echo $row[5]?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Class</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="year">
                              <option><?php echo $row[6]?></option>
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
  $id=$_POST['id'];
  if(mysqli_query($db,"UPDATE std_data SET Name='".$name."', RollNo='".$rn."', PRN='".$prn."', Email='".$email."', 
    Mobile='".$mobile."', Year='".$year."' WHERE ID='".$id."'"))
  {
    echo'<script>
    alert("Student Information is updated");
    window.location.href="view_std.php";
    </script>';
  }
  else
  {
    echo'<script>
    alert("Student Information is not updated");
    window.location.href="view_std.php";
    </script>';
  }
}
?> 