<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Attendance-admin</title>
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/style.css">
  <script type="text/javascript">
    function get_data(val)
    {
       $.ajax({
              data: "sem="+val,
              type: "POST",
              url: "subject_ajax.php",
              success: function(data)
              {
                $("#sub").html(data);
              }
            });
    }
  </script>
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
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Subject</h4>
                  <form class="forms-sample" action="assign.php" method="POST">
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
                      <select class="form-control" id="sub" name="sub">
                        <option>Select Subject</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <select class="form-control" name="staff">
                        <option>Select Staff</option>
                        <?php  
                        $res=mysqli_query($db,"SELECT * FROM staff_data");
                        while($row=mysqli_fetch_row($res))
                        {
                          echo "<option value='".$row[0]."'>$row[1]</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <button type="submit" name="save" class="btn btn-gradient-primary mr-2">Submit</button>
                    <button type="reset" name="save" class="btn btn-light btn-gradient-danger ">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card" >
                <div class="card-body" >
                  <table class="table table-bordered">
                    <thead style="background-color:#6699bb; color:#fff">
                      <tr>
                        <th>Semester</th>
                        <th>Subject</th>
                        <th>Staff</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php  
                                  
                      $res=mysqli_query($db,"SELECT * FROM assign_class");
                      while($row=mysqli_fetch_row($res))
                      {
                      $subject=mysqli_fetch_row(mysqli_query($db,"SELECT * FROM subject WHERE ID='".$row[2]."'"));
                      $staff=mysqli_fetch_row(mysqli_query($db,"SELECT * FROM staff_data WHERE ID='".$row[3]."'"));
                      echo"<tr>
                        <td>$row[1]</td>
                        <td>$subject[2]</td>
                        <td>$staff[1]</td>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
  include 'Footer.php';
?>
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
  $sem=$_POST['sem'];
  $sub=$_POST['sub'];
  $staff=$_POST['staff'];
 $a1= mysqli_query($db,"SELECT * FROM assign_class WHERE Subject='".$sub."'");
 if($num=mysqli_num_rows($a1)>0)
 {
   echo'<script>
    alert("Subject Already Assigned");
    </script>';
 }
 else
 {
     if(mysqli_query($db,"INSERT INTO assign_class VALUES('','".$sem."','".$sub."','".$staff."')"))
    {
      echo'<script>
      alert("Subject is Assigned");
      window.location.href="assign.php";
      </script>';
    }
    else
    {
      echo'<script>
      alert("Subject is Assigned");
      window.location.href="assign.php";
      </script>';
    }
 }
}
?>