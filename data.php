<?php
require_once 'models/koneksi.php';
require_once 'models/query.php';

  session_start();
    if (!isset($_SESSION['username'])) {
        header("location: index.php");
    }
?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Waste Water Control and Monitoring System</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- high chart -->
  <link rel="stylesheet" type="text/css" href="https://www.highcharts.com/media/com_demo/css/highslide.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/index.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light" style="background-color:#001a38;">
    <div class="container">
      <a href="#" class="navbar-brand">
        <!-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span style="color:#e5e5e8; font-size: 16px">Waste Water Control and Monitoring System</span>
      </a>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
          <b class="nav-link" style="padding-right: 0px;color:#e5e5e8;">Halo, <?= $_SESSION["username"]; ?></b>
        </li>
        <li class="nav-item dropdown" >
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"style="color:#e5e5e8;"><i class="fas fa-user-circle fa-2x" style="color:#e5e5e8;" aria-hidden="true"></i></a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li><a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-lg">Description </a></li>
            <li><a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-default">Account Setting</a></li>
            <li><a href="models/login.php?op=out" class="dropdown-item">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="font-weight:bold">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body" style="padding-bottom:0px;background-color:#dadce0;">
                <div class="row">
                  <div class="col-md-4 p-2">
                    <h5 class="card-title">Water Level</h5>
                  </div>
                  <div class="col-md-4 p-2">
                    <h5 class="card-title">Manual Switch</h5>
                  </div>
                  <div class="col-md-2 p-2">
                    <h5 class="card-title">Mode</h5>
                  </div>
                  <div class="col-md-2 p-2">
                    <h5 class="card-title">Notification</h5>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-4 p-0">
                      <div class="row">
                        <div class="col-9">
                          <!-- interactive chart -->
                            <figure class="highcharts-figure">
                               <div id="container"></div> 
                             </figure>
                        </div>
                        <div class="col-3" style="padding-left:0px;">
                          <h1 style="font-size: 50px; margin:0; text-align: center;"><?=$current_level;?></h1>
                          <span><h3 style="font-size: 20px; text-align: center; margin-top: 8px;">METER</h3></span>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-4 p-2">
                    <div class="card p-2" style="background-color:#001a38;">
                      <table style="padding:0px; margin:0px;">
                        <tr>
                          <td><h5 style="color:white;">PUMP 1</h5></td>
                          <?php
                          if($ctrl_mode == 1){?>
                            <td><button onclick= "window.location.href= 'control.php?id=1&nilai=1';" type="button" class="btn-lg btn-success my-2">START</button></td>
                            <td><button onclick= "window.location.href= 'control.php?id=1&nilai=0';" type="button" class="btn-lg btn-danger my-2">STOP</button></td>
                            <?php } else{?>
                            <td><button type="button" class="btn-lg my-2" style="cursor:not-allowed;">START</button></td>
                            <td><button type="button" class="btn-lg my-2" style="cursor:not-allowed;">STOP</button></td>
                          <?php } ?> 
                          <td>
                            <div class="led-box">
                              <?php
                                if($ctrl_pump1 == 1):?>
                                  <div class="led-on"></div>
                                <?php else:?>
                                  <div class="led-off"></div>
                                <?php endif;
                              ?>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><h5 style="color:white;">PUMP 2</h5></td>
                          <?php
                          if($ctrl_mode == 1){?>
                            <td><button onclick= "window.location.href= 'control.php?id=2&nilai=1';" type="button" class="btn-lg btn-success my-2">START</button></td>
                            <td><button onclick= "window.location.href= 'control.php?id=2&nilai=0';" type="button" class="btn-lg btn-danger my-2">STOP</button></td>
                            <?php } else{?>
                            <td><button type="button" class="btn-lg my-2" style="cursor:not-allowed;">START</button></td>
                            <td><button type="button" class="btn-lg my-2" style="cursor:not-allowed;">STOP</button></td>
                          <?php } ?> 
                          <td>
                            <div class="led-box">
                              <?php
                                if($ctrl_pump2 == 1):?>
                                  <div class="led-on"></div>
                                <?php else:?>
                                  <div class="led-off"></div>
                                <?php endif;
                              ?>
                            </div>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="col-md-2 p-2">
                    <div class="card px-4 py-2" style="background-color:#001a38;">
                      <?php
                        if($ctrl_mode == 1){
                          $btn_auto="btn-danger";
                          $btn_manual="btn-success";
                        }else{
                          $btn_auto="btn-success";
                          $btn_manual="btn-danger";
                        }
                      ?>
                    
                      <button onclick= "window.location.href= 'control.php?id=3&nilai=0';" type="button" class="<?=$btn_auto;?> btn-lg my-2">AUTO</button>
                      <button onclick= "window.location.href= 'control.php?id=3&nilai=1';"type="button" class="<?=$btn_manual;?> btn-lg btn-success my-2">MANUAL</button>
                    </div>
                  </div>
                  <div class="col-md-2 p-2">
                    <div class="card px-4 py-2" style="align-items:center;background-color:#001a38;">
                      <?php
                        $query = "SELECT * from notification";
                        $result = mysqli_query($conn, $query);
                        while($data= mysqli_fetch_assoc($result)){
                          if($data["connect"] == 1):?>
                            <div class="led-box">
                              <div class="led-connect-on">
                                <p class="text-grey">CONNECTED</p>
                              </div>
                            </div>
                            <?php else:?>
                            <div class="led-box">
                              <div class="led-connect-off">
                                <p class="text-grey">NOT CONNECTED</p>
                              </div>
                            </div>
                          <?php endif;
                          if($data["alarm"] == 1):?>
                            <div class="led-box">
                              <div class="led-alarm-on">
                                <p class="text-white">ALARM</p>
                              </div>
                            </div>
                            <?php else:?>
                            <div class="led-box">
                              <div class="led-alarm-off">
                                <p class="text-grey">ALARM</p>
                              </div>
                            </div>
                          <?php endif;
                        }?>
                    </div>
                  </div>
                </div>
              </div>
            </div>


        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="font-weight:bold">Report Data</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
          <div class="card">
              <div class="card-body" style="background-color:#dadce0;">
                <table id="example1" class="table table-bordered table-striped" style="background-color:white;">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Timestamp</th>
                    <th>Water Level (m)</th>
                    <th>Pump 1</th>
                    <th>Pump 2</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no=1;
                  while($data= mysqli_fetch_assoc($tbl_data)){
                  ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data ["timestamp"];?></td>
                    <td><?= $data ["level"];?></td>
                    <td><?= $data ["pump1"] ? 'ON' : 'OFF';?></td>
                    <td><?= $data ["pump2"] ? 'ON' : 'OFF';?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Description Modals-->
  <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Description</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Isi deskripsinya apa&hellip;</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Account Setting Modals-->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Account Setting</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="models/change_pass.php" method="post">
            <div class="form-group row">
              <label for="currentPass" class="col-sm-4 col-form-label">Current Password</label>
              <div class="col-sm-8">
                <input name="currentPass" type="password" class="form-control" id="currentPass" placeholder="Current Password">
              </div>
            </div>
            <div class="form-group row">
              <label for="newPass" class="col-sm-4 col-form-label">New Password</label>
              <div class="col-sm-8">
                <input name="newPass" type="password" class="form-control" id="newPass" placeholder="New Password">
              </div>
            </div>
            <div class="form-group row">
              <label for="confirmPass" class="col-sm-4 col-form-label">Confirm Password</label>
              <div class="col-sm-8">
                <input name="confirmPass" type="password" class="form-control" id="confirmPass" placeholder="Confirm Password">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-8">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
              <button name="changePass" type="submit" class="btn btn-primary col-sm-4">Change Password</button>
            </div>
          </form>

        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer" style="background-color:#001a38;">
    <div class="d-flex justify-content-center" style="color:#e5e5e8;">
      <strong>Copyright &copy; 2021 All rights reserved | Nadya Putri </strong>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
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
<!-- high chart -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel"]
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
<script type="text/javascript" >
Highcharts.chart('container', {
    chart: {
        type: 'spline',
    },
    title: {
        text: ''
    },
    // subtitle: {
    //     text: 'Source: suhuengine.epizy.com'
    // },
    xAxis: {
      <?php
      $stmnt = $dbh->prepare("SELECT DATE_FORMAT(`data`.timestamp, '%T') AS timestamp FROM `data`
    WHERE
      `data`.timestamp LIKE '%2021-11-06%'");
      $stmnt->execute();
      
      try{
        $timestamp = array();
        $i=0;
        while($row = $stmnt->fetch()){
            $timestamp[$i] = $row['timestamp'];
            $i++;
        }
        echo '"categories": ' . json_encode($timestamp) . '';
    }catch(Exception $ex){
        echo $ex->getMessage();
    }
    ?>
    },
    yAxis: {
        title: {
            text: ''
        },
        labels: {
            formatter: function () {
                return this.value + 'm';
            }
        }
    },
    // tooltip: {
    //     crosshairs: true,
    //     shared: true
    // },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    credits: {
      enabled: false
    },
    series: [{
        name: '',
        marker: {
            symbol: 'square'
        },
        showInLegend: false,
        <?php
      $stmnt = $dbh->prepare("SELECT `data`.level FROM `data`
    WHERE
      `data`.timestamp >= CURRENT_DATE");
      $stmnt->execute();
      
      try{
        $output = array();
        $i=0;
        while($row = $stmnt->fetch()){
            $output[$i] = floatval($row['level']);
            $i++;
        }
        echo 'data: ' . json_encode($output) . '';
    }catch(Exception $ex){
        echo $ex->getMessage();
    }
    ?>
    }]
});
</script>
</body>
</html>
