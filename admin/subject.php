<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Attendance-admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <script type="text/javascript">
    function get_data(val)
    {
       $.ajax({
              data: "sem="+val,
              type: "POST",
              url: "subjectdata.php",
              success: function(data)
              {
                $("#sub_data").html(data);
              }

            });
    }
  </script>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php
include 'Header.php';
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php
      include 'Sidebar.php';
      ?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
        
<?php  
  $db = mysqli_connect("localhost","root","","attendance_system")or die("database error");
?> 


          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Subject</h4>
                  
                  <form class="forms-sample" action="subject.php" method="POST">
                    <div class="form-group">
                     <select class="form-control" name="sem" onchange="get_data(this.value)">
                              <option style="font-weight: bold;">Select Semester</option>
                              <option value="3">III</option>
                              <option value="4">IV</option>
                              <option value="5">V</option>
                              <option value="6">VI</option>
                              <option value="7">VII</option>
                              <option value="8">VIII</option>
                     </select>
                    </div>
                    <div class="form-group">
                      <input type="text" name="sub" class="form-control" id="exampleInputEmail1" placeholder="Enter Subject Name">
                    </div>
                    <button type="submit" name="save" class="btn btn-gradient-primary mr-2">Submit</button>
                    <button type="reset" name="save" class="btn btn-light btn-gradient-danger ">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card" >
                <div class="card-body" id="sub_data">
                  <center> 
                 <img src="../CSElogo2.png" style="height: 400px;width: 400px;" class="img img-responsive">
                 </center>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php
include 'Footer.php';
        ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
<?php
if(isset($_POST['save']))
{
  $sem=$_POST['sem'];
  $sub=$_POST['sub'];
  
  if(mysqli_query($db,"INSERT INTO subject VALUES('','".$sem."','".$sub."')"))
  {
    echo'<script>
    alert("Subject is Added");
    window.location.href="subject.php";
    </script>';
  }
  else
  {
    echo'<script>
    alert("Subject is not Added");
    window.location.href="subject.php";
    </script>';
  }

}
?>