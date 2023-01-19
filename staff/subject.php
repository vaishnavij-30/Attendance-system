<?php
$sem=$_POST['sem'];
session_start();
$db = mysqli_connect("localhost","root","","attendance_system")or die("database error");
$sub1=mysqli_query($db,"SELECT * FROM assign_class WHERE SEM='".$sem."'&& Staff='".$_SESSION['staff']."'");
echo "<option >Select Subject</option>";
while($sub=mysqli_fetch_row($sub1))
{
   $dname=mysqli_fetch_row(mysqli_query($db,"SELECT * FROM subject WHERE ID='".$sub[2]."' "));
   echo "<option value=".$dname[0].">$dname[2]</option>";
}
?>