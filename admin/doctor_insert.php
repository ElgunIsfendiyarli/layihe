<?php

include 'header.php';
include 'connect/model/Doctor_model.php';
include 'connect/controller/doctor.php';

$data  = new Doctor;
$doctor = $data->getIxtisas();

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- body -->

            <?php  if (isset($_SESSION['admin_error'])) { ?>


                <?php foreach ($_SESSION['admin_error'] as  $value) { ?>
                    <div class="row justify-content-center">
                        <div class="alert alert-warning col-6" role="alert">
                            <?=$value ?>
                        </div>
                    </div>
                <?php  } ?>




                <?php unset($_SESSION['admin_error']);  } ?>




            <div class="row justify-content-center">
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Doctor  insert</h3>
                        </div>
                        <!-- /.card-header -->





                        <!-- form start -->
                        <form method="post" action="connect/route.php" enctype="multipart/form-data" >
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="image" class="form-control" accept="image/*" id="" placeholder="Enter Image">
                                </div>

                                <div class="form-group">
                                    <label for="">Doctor Name</label>
                                    <input type="text" name="name" class="form-control" id="" placeholder="Doctor name">
                                </div>

                                <div class="form-group">
                                    <label for="">Ixtisas</label>
                                    <select name="ixtisas_id"   class="form-control" required="">
                                        <option disabled="" selected="" >Ixtisasi Secin</option>
                                        <?php foreach ($doctor as $value){ ?>
                                            <option value="<?=$value['id'];?>"><?= $value['name'] ;?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Description</label>
                                    <input type="text" name="description" class="form-control" id="" placeholder="Description email">
                                </div>

                                <div class="form-group">
                                    <label for="">Facebook</label>
                                    <input type="text" name="s_fb" class="form-control" id="" placeholder="Enter Facebook">
                                </div>

                                <div class="form-group">
                                    <label for="">Instagram</label>
                                    <input type="text" name="s_ins" class="form-control" id="" placeholder="Enter Instagram">
                                </div>

                                <div class="form-group">
                                    <label for="">Twitter</label>
                                    <input type="text" name="a_tw" class="form-control" id="" placeholder="Enter Twitter">
                                </div>



                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="doctor_insert">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>





            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2022 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
