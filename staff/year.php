<?php
session_start();
$year=$_POST['year'];
  $db = mysqli_connect("localhost","root","","attendance_system")or die("database error");
    if($year==2)
    {
      $res=mysqli_query($db,"SELECT * FROM assign_class WHERE SEM=3 || SEM=4 ");
      echo"<option>Select Subject</option>";
      while($row=mysqli_fetch_row($res))
      {
        $staffn=mysqli_fetch_row(mysqli_query($db,"SELECT * FROM subject WHERE ID='".$row[2]."'"));
        if($row[3]==$_SESSION['staff'])
        {
          echo "<option value=".$staffn[0].">$staffn[2]  </option>";
        }
      }
    }
    if($year==3)
    {
      $res=mysqli_query($db,"SELECT * FROM assign_class WHERE SEM=5 || SEM=6 ");
      echo"<option>Select Subject</option>";
      while($row=mysqli_fetch_row($res))
      {
        $staffn=mysqli_fetch_row(mysqli_query($db,"SELECT * FROM subject WHERE ID='".$row[2]."'"));
        if($row[3]==$_SESSION['staff'])
        {
          echo "<option value=".$staffn[0].">$staffn[2]  </option>";
        }
      }
    }
    if($year==4)
    {
      $res=mysqli_query($db,"SELECT * FROM assign_class WHERE SEM=7 || SEM=8 ");
      echo"<option>Select Subject</option>";
      while($row=mysqli_fetch_row($res))
      {
        $staffn=mysqli_fetch_row(mysqli_query($db,"SELECT * FROM subject WHERE ID='".$row[2]."'"));
        if($row[3]==$_SESSION['staff'])
        {
          echo "<option value=".$staffn[0].">$staffn[2]  </option>";
        }
      }
   }
?>