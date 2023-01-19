<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<?php
session_start();
$db = mysqli_connect("localhost","root","","attendance_system")or die("database error");
$sub=$_POST['sub'];
$year=$_POST['year'];
$dt=$_POST['dt'];
$dt2= date("m/d/Y", strtotime($dt));  
echo'
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Attendance Sheet</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th style="width: 60px">Roll No</th>
            <th>Name</th>
            <th>Time</th>
            <th>Status</th>
          </tr>
          </thead>
          <tbody>';
              $res=mysqli_query($db,"SELECT * FROM attendance_process WHERE STAFF_ID='".$_SESSION['staff']."' && DATE='".$dt2."' && SUB_ID='".$sub."'");
                 while($row=mysqli_fetch_row($res))
                  {
                    $sname=mysqli_fetch_row(mysqli_query($db,"SELECT * FROM std_data WHERE ID='".$row[1]."'"));
                    echo'<tr> 
                    <td>'.$sname[2].'</td>
                    <td>'.$sname[1].'</td>
                    <td>'.$row[5].'</td>
                    <td>'.$row[6].'</td>
                    </tr>';
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
  