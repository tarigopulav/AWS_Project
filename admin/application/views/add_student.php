<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Add Student </title>

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
                        <h4 class="page-title">Add Student</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">

                            <li class="active">Add Student</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                  
                     
                     
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">Student Information</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                      <form method="POST" action="<?php echo base_url();?>user/submit_add_student" enctype='multipart/form-data'>
                                        <div class="form-body">
                                            <h3 class="box-title"></h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Full Name</label>
                                                         <input type="text" name="fullname" data-style="form-control" class="form-control" required=""> </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group has-error">
                                                        <label class="control-label">Father Name</label>
                                                        <input type="text" name="fathername" data-style="form-control" class="form-control" required="">  </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Mother Name</label>
                                                        <input type="text" name="mothername" data-style="form-control" class="form-control" required=""></div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">E-mail</label>
                                                        <input type="email" name="email" data-style="form-control" class="form-control" required=""> </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Password</label>
                                                         <input type="password" name="password" data-style="form-control" class="form-control" required="">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date Of Birth</label>
                                                         <input class="form-control" type="date" id="date_ex" name="date_of_birth" required> </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Phone</label>
                                                      <input type="text" name="phone" data-style="form-control"  id="phone" class="form-control"  maxlength="10" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');"  required>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            
                                          
                                            <div class="row">
                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                         <select name="gender" class="form-control custom-select">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    </select></div>
                                                </div>
                                            
                                            
                                           
                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <label>Course</label>
                                                         <select name="course" class="form-control custom-select">
                                        <option>Select your Course</option>
                                        <?php foreach ($all_course as $all_course) {?>
                                    <option value="<?php echo $all_course['course_name']?>"><?php echo $all_course['course_name']?></option>
                                    <?php } ?>
                                    </select></div>
                                                </div>
                                            </div>
                                           
                                                <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Upload Picture</label>
                                                        <input type="file" name="fileToUpload" id="fileToUpload" accept=".jpeg, .jpg, .gif,.png" required>
                                                </div>
                                                <!--/span-->
                                                
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                          
                                        </div>
                                            
                                         
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                            <button type="button" class="btn btn-default">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
