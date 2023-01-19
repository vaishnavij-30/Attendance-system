<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<?php
session_start();
error_reporting(0);
$db = mysqli_connect("localhost","root","","attendance_system")or die("database error");

$sub=$_POST['sub'];
$year=$_POST['year'];
$dt_from=$_POST['dt_from'];
$dt_to=$_POST['dt_to'];
$dt1= date("m/d/Y", strtotime($dt_from));  
$dt2= date("m/d/Y", strtotime($dt_to)); 
$date1 = date_create($dt1);
$date2 = date_create($dt2);
//difference between two dates
$diff = date_diff($date1,$date2);
//count days
$date_count=$diff->format("%a");
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
echo'
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Attendance Sheet</h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th style="width: 60px">Roll No</th>
              <th>Name</th>
              <th>Total Lectures</th>
              <th>Attended</th>
              <th>P(%)</th>
            </tr>
            </thead>
            <tbody>';
                $res=mysqli_query($db,"SELECT * FROM std_data WHERE Year='".$year."'");
                   while($row=mysqli_fetch_row($res))
                    {
                      $stu_pre_num=mysqli_num_rows(mysqli_query($db,"SELECT * FROM attendance_process WHERE STU_ID='".$row[0]."' && STATUS='Present' && DATE BETWEEN '".$dt1."' AND '".$dt2."'"));
                      $stu_pre_num2=mysqli_num_rows(mysqli_query($db,"SELECT * FROM attendance_process WHERE STU_ID='".$row[0]."' && DATE BETWEEN '".$dt1."' AND '".$dt2."'"));
                      $pr=($stu_pre_num/$stu_pre_num2*100);
                      $pr2 = number_format($pr, 2);
                      $total_days=$stu_pre_num;
                      echo'<tr> 
                      <td>'.$row[2].'</td>
                      <td>'.$row[1].'</td>
                      <td>'.$stu_pre_num2.'</td>
                      <td>'.$total_days.'</td>
                      <td>'.$pr2.'%</td>
                      </tr>';
                      $sr++;
                    }
                echo'</tr>
            </tbody>
          </table>
        </div>
      </div>';
?>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
  