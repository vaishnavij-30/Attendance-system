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
            <div class="col-md-3 grid-margin stretch-card"></div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card" style="border-top: 3px solid purple">
                <div class="card-body">
                  <h4 class="card-title">Teacher Info</h4>
                  <form class="form-sample" action="add_staff.php" method="POST" enctype="multipart/form-data">
                    <p class="card-description">
                      Personal info
                    </p>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Name</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Enter Your Name" name="sname" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Email</label>
                          <div class="col-sm-8">
                            <input type="Email" class="form-control" placeholder="Enter Your Email" name="email" />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Mobile</label>
                          <div class="col-sm-8">
                            <input type="mobile" class="form-control" placeholder="Enter Your Email" name="mob" />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Image</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control" name="Photo" />
                              </div>
                            </div>
                          </div>
                        </div> 
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Username</label>
                          <div class="col-sm-8">
                            <input type="Username" class="form-control" placeholder="Enter Your Username" name="uname" />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Password</label>
                          <div class="col-sm-8">
                            <input type="password" class="form-control" placeholder="Password" name="pass" />
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
  $email=$_POST['email'];
  $mob=$_POST['mob'];
  $uname=$_POST['uname'];
  $pass=$_POST['pass'];
  $max1=mysqli_query($db,"SELECT MAX(ID) FROM staff_data");
  $max=mysqli_fetch_row($max1);
      if($max[0])
      {
        $max=$max[0];
        $max_id=$max+1;
      }
      else 
      {
       $max_id=1;
      } 
  $file_exists=array("jpg","jpeg","png","gif","bmp","pdf");//file extenssions supported for upload 
        $upload_exists = end (explode('.', $_FILES["Photo"]["name"]));//find extension of file 
        if(($upload_exists==null )||($upload_exists==""))//file is none or of 0kb
        {
            echo"<script>alert('File Not Select Or uncompatible file'); </script>";
        }
        else
        {
            if((($_FILES['Photo']['size']<2000000) || in_array($upload_exists,$file_exists)))//file size & file extension support
            {
             $newname="$max_id"."_staff.png"; 
             $targetfile='upload/'.$newname;//location of folder with target file name 
                if($_FILES['Photo']['error']>0)//check if any error in file 
                {
                    echo"<script>alert('image 2 large  or pdf large size should b less than 2 mb');</script>";
                }
                else
                {
                    //upload file to location set above
                    move_uploaded_file($_FILES['Photo']['tmp_name'],$targetfile);//end img code

  if(mysqli_query($db,"INSERT INTO staff_data VALUES('','".$name."','".$mob."','".$email."','".$uname."','".$pass."',
    '".$targetfile."','disapprove')"))
  {
    echo'<script>
    alert("Staff Information is Successfully added");
    window.location.href="add_staff.php";
    </script>';
  }
  else
  {
    echo'<script>
    alert("Staff Information is not added");
    window.location.href="add_staff.php";
    </script>';
  }
}
}
}
}
?> 