<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Attendance Daily Report</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script type="text/javascript">
    function get_data(val)
    {
      $.ajax({
          data: "year="+val,
          type: "POST",
          url: "year2.php",
          success: function(data)
          {
            $("#year").html(data);
          }
      });
    }
    function get_students_data()
    {
      var year=document.getElementById('y').value;
      var dt=document.getElementById('dt').value;
      var val=document.getElementById('sub_id').value;

      $.ajax({
          data: "sub="+val+"&year="+year+"&dt="+dt,
          type: "POST",
          url: "attendance_ajax.php",
          success: function(data)
          {
            $("#pre").html(data);
          }
      });
    }
    function clean1()
    {
      $.ajax({
          type: "POST",
          url: "clean.php",
          success: function(data)
          {
            $("#pre").html(data);
          }
      });
    }
    function get_sub_data(val)
    {
      $.ajax({
          data: "sem="+val,
          type: "POST",
          url: "subject.php",
          success: function(data)
          {
            $("#sub_id").html(data);
          }
      });
    }
  </script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php
  include 'Navbar.php';
  include 'Sidebar.php';
?>
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-purple">
              <div class="card-header">
                <h3 class="card-title">Select For Result</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  
                  <div class="col-sm-3">
                    <label>Select Year:</label>
                      <select class="form-control" id="y" name="year" onchange="get_data(this.value),clean1();">
                      <option style="font-weight: bold;">Select Year</option>
                      <option value="2">Second Year</option>
                      <option value="3">Third Year</option>
                      <option value="4">Final Year</option>
                    </select>
                  </div>
                  <div class="col-sm-3">
                      <label>Select Semester:</label>
                      <select class="form-control" id="year" name="sid" onchange="get_sub_data(this.value),clean1();">
                        <option>Select Semester</option>
                      </select>
                  </div>
                  <div class="col-sm-3">
                      <label>Select Subject:</label>
                      <select class="form-control" id="sub_id" name="sub_id">
                        <option>Select Subject</option>
                      </select>
                  </div>
                  <div class="col-sm-3">
                    <label>Date:</label>
                      <input type="date" class="form-control" name="" id="dt" onchange="get_students_data()">
                  </div>                    
                </div>
              </div>
            </div>
          </div>
          <div class="col-12" id="pre">
          </div>
        </div>
      </div>
    </section>
  </div>
<?php
  include 'Footer.php';
?>
</div>
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
