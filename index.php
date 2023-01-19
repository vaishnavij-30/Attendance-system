<!Doctype html>
<html lang="en">
<head>
  	<title>Attendance</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<section class="ftco-section">
		<div class="container">
<?php  
  $db = mysqli_connect("localhost","root","","attendance_system")or die("database error");
?> 
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
				  <div class="wrap d-md-flex">
						<div class="img" style="background-image: url(Bidve.png);"></div>
					    <div class="login-wrap p-4 p-md-5">
					      	<div class="d-flex">
					      		<div class="w-100">
					      			<h3 class="mb-4">Sign In</h3>
					      		</div>
					      	</div>
							    <form action="index.php" method="POST" class="signin-form">
					      		<div class="form-group mb-3">
					      			<label class="label" for="name">Username</label>
					      			<input type="text" name="uname" class="form-control" placeholder="Username" required>
					      		</div>
				            <div class="form-group mb-3">
				            	<label class="label" for="password">Password</label>
				              <input type="password" name="pass" class="form-control" placeholder="Password" required>
				            </div>
				            <br>
				            <div class="form-group">
				            	<button type="submit" name="save" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
				            </div>
					        </form>
				      </div>
			    </div>
				</div>
			</div>
		</div>
	</section>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
<?php
if(isset($_POST['save']))
{
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];
    
    $res=mysqli_query($db,"select * from admin where USERNAME='".$uname."' && PASSWORD='".$pass."'");
    $row=mysqli_fetch_row($res);

    $sh=mysqli_query($db,"select * from staff_data where Username='".$uname."' && Password='".$pass."' && Status='approve'");
    $sh1=mysqli_fetch_row($sh);

   if($num=mysqli_num_rows($res)>0)
     {
     session_start();
     $_SESSION['admin']=$row[0];
    echo'
    <script>
      window.location.href="admin/index.php";
    </script>
    ';
    }
    else if($num2=mysqli_num_rows($sh)>0)
     {
     session_start();
     $_SESSION['staff']=$sh1[0];

      echo'
      <script>
         window.location.href="staff/index.php";
      </script>
      ';
      }

    else
    {
        echo'
    <script>
       alert("Wrong Username & Password ");
       window.location.href="index.php";
    </script>
    ';
    }
}
?>
