<!DOCTYPE html>
<html lang="en">
<script type="text/javascript">
  function approve(val)
  {
    var a=confirm("Do you really want to approve for this staff...!");
    if(a==true)
    {
      window.location.href='approve_staff.php?id='+val;
    }
    else
    {

    }
  }
  function disapprove(val)
  {
    var a=confirm("Do you really want to disapprove for this staff...!");
    if(a==true)
    {
      window.location.href='disapprove_staff.php?id='+val;
    }
    else
    {
      
    }
  }
</script>
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
  $res=mysqli_query($db,"SELECT * FROM staff_data");
  while($row=mysqli_fetch_row($res))
  {
      if($row[7]=='approve')
      {
          echo' 
           <div class="col-sm-1"></div>
           <div class="col-sm-3 bg-gradient-primary" style=" color: #fff; border-top: 4px solid red; border-bottom: 10px solid white; border-radius: 25px;">
              <div class="" >
                <div class="card-body">
                  <ul type="none">
                    <li style="text-align: center;">
                      <img src="'.$row[6].'" style="height: 100px;width: 100px;border-radius:100px">
                    </li>
                    <li style="text-align: right;"><button onclick="disapprove('.$row[0].')" type="button" class="btn btn-gradient-success btn-rounded btn-icon"><a href="view_staff.php?id='.$row[0].'"></a><i class="mdi mdi-account-plus"></i></button>
                      <a href="update_staff.php?id='.$row[0].'"><button type="button" class="btn btn-gradient-info btn-rounded btn-icon"><i class="mdi mdi-pencil"></i></button></a>
                    </li>
                    <li><p class="card-title" style="text-align: center;font-size: 20px; color: white; font-weight: 600">'.$row[1].'</p></li>
                    <li style="background-color: white"><hr></li>
                    <li><p class="card-title" style="text-align: center;font-size: 16px;color: black"><b>Email</b> : '.$row[3].'</p></li>
                    <li style="text-align: center; color: black"><p class="card-title"><b>Username : </b> '.$row[4].'</p></li>
                    <li style="text-align: center; color: black"><p class="card-title"><b>Password : </b> '.$row[5].'</p></li>
                    <li><p class="card-title" style="text-align: center;font-size: 16px;color: black">'.$row[2].'</p></li>
                  </ul>
                </div>
              </div>
            </div>
            ';
      }
      else
      {
        echo' 
           <div class="col-sm-1"></div>
           <div class="col-sm-3 bg-gradient-primary" style=" color: #fff; border-top: 4px solid red; border-bottom: 10px solid white; border-radius: 25px">
              <div class="" >
                <div class="card-body">
                  <ul type="none">
                    <li style="text-align: center;">
                      <img src="'.$row[6].'" style="height: 100px;width: 100px;border-radius:100px">
                    </li>
                   <li style="text-align: right;"><button onclick="approve('.$row[0].')" type="button" class="btn btn-gradient-danger btn-rounded btn-icon"><a href="view_staff.php?id='.$row[0].'"></a><i class="mdi mdi-account-remove"></i></button>
                     <a href="update_staff.php?id_s='.$row[0].'"><button type="button" class="btn btn-gradient-info btn-rounded btn-icon"><i class="mdi mdi-pencil"></i></button></a>
                   </li>
                    <li><p class="card-title" style="text-align: center;font-size: 20px; color: white; font-weight: 600">'.$row[1].'</p></li>
                    <li style="background-color: white"><hr></li>
                    <li><p class="card-title" style="text-align: center;font-size: 16px;color: black"><b>Email</b> : '.$row[3].'</p></li>
                    <li style="text-align: center; color: black"><p class="card-title"><b>Username : </b> '.$row[4].'</p></li>
                    <li style="text-align: center; color: black"><p class="card-title"><b>Password : </b> '.$row[5].'</p></li>
                    <li><p class="card-title" style="text-align: center;font-size: 16px;color: black">'.$row[2].'</p></li>
                  </ul>
                </div>
              </div>
            </div>
            ';
      }
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
