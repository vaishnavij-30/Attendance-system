<?php
  $db = mysqli_connect("localhost","root","","attendance_system")or die("database error");
  $id=$_GET['id'];  
  if(mysqli_query($db,"UPDATE staff_data SET Status ='approve' WHERE ID = '".$id."'"))
  {
    echo'<script>
    alert("Approved");
    window.location.href="view_staff.php";
    </script>';
  }
  else
  {
    echo'<script>
    alert("Try Again...!");
    window.location.href="view_staff.php";
    </script>';
  }
  ?>