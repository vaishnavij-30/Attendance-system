<?php
$sem=$_POST['sem'];
$db = mysqli_connect("localhost","root","","attendance_system")or die("database error");
if($sem==3)
{
  $res=mysqli_query($db,"SELECT * FROM subject WHERE SEM=3");
  echo"<option>Select Subject</option>";
  while($row=mysqli_fetch_row($res))
  {
  	$ac=mysqli_num_rows(mysqli_query($db,"SELECT * FROM assign_class WHERE Subject='".$row[0]."'"));
  	if($ac)
  	{
  	  echo "<option value=".$row[0]." style='color:orange;font-weight:bold'>$row[2]</option>";
  	}
  	else
  	{
  	  echo "<option value=".$row[0].">$row[2]</option>";
  	}
  }
}
if($sem==4)
{
  $res=mysqli_query($db,"SELECT * FROM subject WHERE SEM=4");
  echo"<option>Select Subject</option>";
  while($row=mysqli_fetch_row($res))
  {
    $ac=mysqli_num_rows(mysqli_query($db,"SELECT * FROM assign_class WHERE Subject='".$row[0]."'"));
  	if($ac)
  	{
     	echo "<option value=".$row[0]." style='color:orange;font-weight:bold'>$row[2]</option>";
  	}
  	else
  	{
    	echo "<option value=".$row[0].">$row[2]</option>";

  	}
  }
}
if($sem==5)
{
  $res=mysqli_query($db,"SELECT * FROM subject WHERE SEM=5");
  echo"<option>Select Subject</option>";
  while($row=mysqli_fetch_row($res))
  {
    $ac=mysqli_num_rows(mysqli_query($db,"SELECT * FROM assign_class WHERE Subject='".$row[0]."'"));
  	if($ac)
  	{
    	echo "<option value=".$row[0]." style='color:orange;font-weight:bold'>$row[2]</option>";
  	}
  	else
  	{
    	echo "<option value=".$row[0].">$row[2]</option>";
  	}
  }
}
if($sem==6)
{
  $res=mysqli_query($db,"SELECT * FROM subject WHERE SEM=6");
  echo"<option>Select Subject</option>";
  while($row=mysqli_fetch_row($res))
  {
    $ac=mysqli_num_rows(mysqli_query($db,"SELECT * FROM assign_class WHERE Subject='".$row[0]."'"));
  	if($ac)
  	{
    	echo "<option value=".$row[0]." style='color:orange;font-weight:bold'>$row[2]</option>";
  	}
  	else
  	{
    	echo "<option value=".$row[0].">$row[2]</option>";
  	}
  }
}
if($sem==7)
{
  $res=mysqli_query($db,"SELECT * FROM subject WHERE SEM=7");
  echo"<option>Select Subject</option>";
  while($row=mysqli_fetch_row($res))
  {
    $ac=mysqli_num_rows(mysqli_query($db,"SELECT * FROM assign_class WHERE Subject='".$row[0]."'"));
  	if($ac)
  	{
    	echo "<option value=".$row[0]." style='color:orange;font-weight:bold'>$row[2]</option>";
  	}
  	else
  	{
  	echo "<option value=".$row[0].">$row[2]</option>";
  	}
  }
}
if($sem==8)
{
  $res=mysqli_query($db,"SELECT * FROM subject WHERE SEM=8");
  echo"<option>Select Subject</option>";
  while($row=mysqli_fetch_row($res))
  {
    $ac=mysqli_num_rows(mysqli_query($db,"SELECT * FROM assign_class WHERE Subject='".$row[0]."'"));
  	if($ac)
  	{
    	echo "<option value=".$row[0]." style='color:orange;font-weight:bold'>$row[2]</option>";
  	}
  	else
  	{
    	echo "<option value=".$row[0].">$row[2]</option>";
  	}
  }
}
?>