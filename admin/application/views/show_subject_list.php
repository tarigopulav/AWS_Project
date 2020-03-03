<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>SHOW ALL SUBJECT </title>

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
                        <h4 class="page-title">Subject</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="#">Subject</a></li>
                            
                            <li class="active">Show subject</li>
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
                                            <th>Subject Name</th>
                                                    <th>Course Name</th>
                                                    <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Subject Name</th>
                                                    <th>Course Name</th>
                                                    <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                         <?php foreach ($subject_list as $subject) {?>
                                                        <td><?php echo $subject['subject_name']?></td>
                                                        <td><?php echo $subject['course_name']?></td>
                                                        <td><a href="<?php echo base_url()?>user/edit_subject/<?php echo $subject['id']?>"> <button type="button" class="btn btn-primary">Edit</button></a>
                                                            <a href="<?php echo base_url()?>user/delete_subject/<?php echo $subject['id']?>"> <button type="button" class="btn btn-primary">Delete</button></a>
                                                            </td>
                                                    </tr>
                                                        <?php }?>
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
