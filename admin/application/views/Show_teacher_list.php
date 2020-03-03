<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Teacher List</title>

<?php echo include('parts/head_1.php'); ?>
        <!-- Top Navigation -->
      <?php echo include('parts/header_1.php'); ?>
        <!-- End Top Navigation -->
        <!-- Left navbar-header -->
       <?php echo include('parts/left_sidebar_1.php'); ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Teacher List</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="#">TEACHER</a></li>
                            
                            <li class="active">Teacher List</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                  
                    
                    <div class="col-sm-12">
                        <div class="white-box">
                           
                            <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 15%;">Name</th>
                                                    <th style="width: 15%;">Email</th>
                                                    <th>Phone</th>
                                                    <th>Gender</th>
                                                    <th>Actinos</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th style="width: 15%;">Name</th>
                                                    <th style="width: 15%;">Email</th>
                                                    <th>Phone</th>
                                                    <th>Gender</th>
                                                    <th>Actinos</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                         <?php foreach($show_list_datd as $slud) {
                                                    ?>
                                                    <tr> 
                                                        <td style="width: 15%;"><img src="<?php echo base_url();?>/upload/<?php echo $slud['image'];?>" alt="image" width="70" height="70"><br>
                                                            <br><span style="font-size: 20px;"><?php echo $slud['name'];?></sapn></td>
                                                            <th style="width: 15%;"><?php echo $slud['email'];?></td>
                                                            <td><?php echo $slud['mobile'];?></td>
                                                            <td><?php echo  $slud['gender'];?></td>
                                                            <td><a href="<?php echo base_url() ?>user/edit_teacher/<?php echo $slud['id']; ?>"> <button type="button" class="btn btn-primary">Edit</button></a>
                                                            <a href="<?php echo base_url() ?>User/delete_teacher/<?php echo $slud['id']; ?>"> <button type="button" class="btn btn-primary">Delete</button></a>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .right-sidebar -->
                
                <!-- /.right-sidebar -->
            </div></div>
            <!-- /.container-fluid -->
 <?php echo include('parts/footer_1.php'); ?>
