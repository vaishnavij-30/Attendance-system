<?php
$year=$_POST['year'];
$db = mysqli_connect("localhost","root","","attendance_system")or die("database error");
if($year==2)
{
  echo "
  <option>Select Semester</option>
  <option value='3'>SEM III</option>
  <option value='4'>SEM IV</option>
  ";
}
else if($year==3)
{
  echo "
  <option>Select Semester</option>
  <option value='5'>SEM V</option>
  <option value='6'>SEM VI</option>
  ";
}
else if($year==4)
{
  echo "
  <option>Select Semester</option>
  <option value='7'>SEM VII</option>
  <option value='8'>SEM VIII</option>
  ";
}  
?>