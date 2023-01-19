<?php
$year=$_POST['year'];
  $db = mysqli_connect("localhost","root","","attendance_system")or die("database error");
  if($year==2)
  {
    $year='Second Year';
  }
  else if($year==3)
  {
    $year='Third Year';
  }
  else if($year==4)
  {
    $year='Final Year';
  }                        
      $res=mysqli_query($db,"SELECT * FROM std_data WHERE Year='".$year."'");
      $num=mysqli_num_rows($res);
      $num=1;
      while($row=mysqli_fetch_row($res))
      {
        echo '
            <tr>
              <td>'.$row[2].'
              <input type="hidden" value='.$row[0].' name="stu_name'.$num.'">
              <input type="hidden" value='.$num.' name="count">
              </td>
              <td>'.$row[1].'</td>
              <td style="text-align:center">
                <div class="form-group">
                  <input type="radio" checked value="Present" name="attend'.$num.'" style="height:30px;width:16px;background-color:green">
                  &nbsp;     
                  &nbsp;     
                  &nbsp;     
                  &nbsp;   
                  <input type="radio"  value="Absent" name="attend'.$num.'" style="height:30px;width:16px;background-color:red">
                </div>
              </td>
            <tr>';
            $num++;
        }
        echo"
            <tr style='background-color:#fff;'>
              <td colspan='3' style='text-align:right'>
              <button type='submit' name='save' class='btn btn-success btn-xl'>Save</button>
              </td>
            </tr>";
?>