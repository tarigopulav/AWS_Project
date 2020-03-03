<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <!-- Tell the browser to be responsive to screen width -->
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="description" content="">
 <meta name="author" content="">
 <!-- Favicon icon -->
 <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
 <title>Attendance Record</title>
 <?php include('parts/head.php'); ?>

 <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/pagination/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/pagination/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/pagination/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/pagination/css/style.css">
</head>

<body class="skin-default fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <?php include('parts/header.php');?>
        <?php include('parts/left_sidebar.php');?>



        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Attendance Record</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">Attendance Record</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <?php if($this->session->flashdata('success')){?>
                <div class="alert alert-success alert-rounded"> <i class="ti-user"></i>  <?php echo $this->session->set_flashdata('success');?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <?php } ?>


                <?php if($this->session->flashdata('error')){?>
                <div class="alert alert-danger alert-rounded"> <i class="ti-user"></i> <?php echo $this->session->set_flashdata('error');?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <?php } ?>




                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Attendance Record</h4>
                                <div class="table-responsive m-t-40">
                                    <div class="table-responsive table-bordered">
                                        <table class="table display compact cell-border"  id="maintable" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Course</th>
                                                    <th>Attended</th>
                                                </tr>
                                            </thead>                                      
                                            <tbody>
                                                <?php foreach($show_list_datd as $slud) {
                                                    ?>
                                                    <tr> 
                                                        <td><img src="<?php echo base_url();?>/upload/<?php echo $slud['image'];?>" alt="image" width="70" height="70"><br>
                                                            <br><span style="font-size: 20px;"><?php echo $slud['name'];?></sapn></td>
                                                            <td><?php echo $slud['email'];?></td>
                                                            <td><?php echo $slud['mobile'];?></td>
                                                            <td><?php echo  $slud['course'];?></td>
                                                            <td><a class="btn" href="">b</a></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                    <tfoot>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Course</th>
                                                    <th>Attended</th>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <!-- Row -->
                    <?php include('parts/footer.php');?>
                    <script>
                    $(document).ready(function() {
                        $('#myTable').DataTable();
                        $(document).ready(function() {
                            var table = $('#example').DataTable({
                                "columnDefs": [{
                                    "visible": false,
                                    "targets": 2
                                }],
                                "order": [
                                [2, 'asc']
                                ],
                                "displayLength": 25,
                                "drawCallback": function(settings) {
                                    var api = this.api();
                                    var rows = api.rows({
                                        page: 'current'
                                    }).nodes();
                                    var last = null;
                                    api.column(2, {
                                        page: 'current'
                                    }).data().each(function(group, i) {
                                        if (last !== group) {
                                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                            last = group;
                                        }
                                    });
                                }
                            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
});
$('#example23').DataTable({
    dom: 'Bfrtip',
    buttons: [
    'copy', 'csv', 'excel', 'pdf', 'print'
    ]
});
</script>
<script src="<?php echo base_url(); ?>assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo base_url(); ?>assets/node_modules/popper/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?php echo base_url(); ?>dist/js/perfect-scrollbar.jquery.min.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url(); ?>dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?php echo base_url(); ?>dist/js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="<?php echo base_url(); ?>assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
<!--Custom JavaScript -->
<script src="<?php echo base_url(); ?>dist/js/custom.min.js"></script>
<!-- This is data table -->
<script src="<?php echo base_url(); ?>assets/node_modules/datatables/jquery.dataTables.min.js"></script>
<!-- start - This is for export functionality only -->
<script src="<?php echo base_url(); ?>cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>


<script type="text/javascript" src="<?php echo base_url()?>assets/pagination/js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/pagination/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/pagination/js/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/pagination/js/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/pagination/js/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/pagination/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/pagination/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/pagination/js/app.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/pagination/js/jquery.mark.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/pagination/js/datatables.mark.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/pagination/js/buttons.colVis.min.js"></script>

</body>

</html>