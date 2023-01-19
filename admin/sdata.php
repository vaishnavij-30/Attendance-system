<?php
$sem=$_POST['sem'];
  $db = mysqli_connect("localhost","root","","attendance_system")or die("database error");
echo'


                  <h4 class="card-title" >Subject Details</h4>
                  <table class="table table-bordered">
                    <thead>
                      <tr style="background-color:#6699cc;color:#fff">
                        <th>Subject</th>
                      </tr>
                    </thead>
                    <tbody>';
                     
                        if($sem==3)
                        {
                          $res=mysqli_query($db,"SELECT * FROM subject WHERE SEM=3");
                          while($row=mysqli_fetch_row($res))
                          {
                            echo "
                            <tr>
                                <td style='color:green;font-size:16px;font-weight:bold'>$row[2]</td>
                               
                            </tr>
                            ";
                          }
                        }
                        else if($sem==4)
                        {
                          $res=mysqli_query($db,"SELECT * FROM subject WHERE SEM=4");
                          while($row=mysqli_fetch_row($res))
                          {
                            echo "
                            <tr>
                              <td style='color:green;font-size:16px;font-weight:bold'>$row[2]</td>
                              
                            </tr>
                            ";
                          }
                        }
                        else if($sem==5)
                        {
                          $res=mysqli_query($db,"SELECT * FROM subject WHERE SEM=5");
                          while($row=mysqli_fetch_row($res))
                          {
                            echo "
                            <tr>
                              <td style='color:green;font-size:16px;font-weight:bold'>$row[2]</td>
                              
                            </tr>
                            ";
                          }
                        }
                        else if($sem==6)
                        {
                          $res=mysqli_query($db,"SELECT * FROM subject WHERE SEM=6");
                          while($row=mysqli_fetch_row($res))
                          {
                            echo "
                            <tr>
                              <td style='color:green;font-size:16px;font-weight:bold'>$row[2]</td>
                              
                            </tr>
                            ";
                          }
                        }
                        else if($sem==7)
                        {
                          $res=mysqli_query($db,"SELECT * FROM subject WHERE SEM=7");
                          while($row=mysqli_fetch_row($res))
                          {
                            echo "
                            <tr>
                              <td style='color:green;font-size:16px;font-weight:bold'>$row[2]</td>
                              
                            </tr>
                            ";
                          }
                        }
                        else if($sem==8)
                        {
                          $res=mysqli_query($db,"SELECT * FROM subject WHERE SEM=8");
                          while($row=mysqli_fetch_row($res))
                          {
                            echo "
                            <tr>
                              <td style='color:green;font-size:16px;font-weight:bold'>$row[2]</td>
                              
                            </tr>
                            ";
                          }
                        }
                        
                    echo'</tbody>
                  </table>

';
?>