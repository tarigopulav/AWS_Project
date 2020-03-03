<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Edit Student</title>

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
                        <h4 class="page-title">Edit Student</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                           
                            
                            <li class="active">Edit Student</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                  
                     
                     
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">Edit</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                      <?php foreach ($edit_data as $studnet_data) {?>
                    <form method="POST" action="<?php echo base_url();?>user/update_student/<?php echo $studnet_data['id']?>" enctype='multipart/form-data'>
                                        <div class="form-body">
                                            <h3 class="box-title"></h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Full Name</label>
                                                          <input type="text" name="fullname" value="<?php echo $studnet_data['name']?>" data-style="form-control" class="form-control" required=""> </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group has-error">
                                                        <label class="control-label">Father Name</label>
                                                        <input type="text" name="fathername" value="<?php echo $studnet_data['father_name']?>" data-style="form-control" class="form-control" required=""> </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Mother Name</label>
                                                        <input type="text" name="mothername" value="<?php echo $studnet_data['mother_name']?>" data-style="form-control" class="form-control" required=""></div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">E-mail</label>
                                                         <input type="email" name="email" value="<?php echo $studnet_data['email']?>" data-style="form-control" class="form-control" required=""></div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Password</label>
                                                          <input type="password" name="password" value="<?php echo $studnet_data['password']?>" data-style="form-control" class="form-control" required="">
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Phone</label>
                                                       <input type="text" name="phone" value="<?php echo $studnet_data['mobile']?>" data-style="form-control"  id="phone" class="form-control"  maxlength="10" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');"  required>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            
                                            <div class="row">
                                                <div class="col-md-12 ">
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <select name="gender" class="form-control custom-select">
                                                             
                                        <!--<option><?php echo $studnet_data['gender']?></option>-->
                                        
<option <?php if($studnet_data['gender'] == 'Male') { echo 'selected="selected"';}  ?> value="Male">Male</option>
<option <?php if($studnet_data['gender'] == 'Female') { echo 'selected="selected"';}  ?> value="Female">Female</option>

                                       
                                    </select>
                                                  </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            
                                            
                                          
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            <div class="row">
                                                <div class="col-md-12 ">
                                                    <div class="form-group">
                                                        <label>Course</label>
                                                          <select name="course" class="form-control custom-select">
                                                              <?php foreach ($showcourse as $coursefull){ ?>
                                        <option><?php echo $coursefull['course_name']; ?></option>
                                        <?php } ?>
                                    </select></div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Upload Picture</label><br>
                                                        <img src="<?php echo base_url();?>upload/<?php echo $studnet_data['image']?>" alt="" height="100" width="100">
                                                         <input type="file" name="fileToUpload" id="fileToUpload">
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date Of Birth</label>
                                                          <input class="form-control" value="<?php echo $studnet_data['date_of_birth']?>" type="date" id="date_ex" name="date_of_birth" required> </div>
                                                </div>
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
                    <?php } ?>
                </div>
                <!-- /.row -->
                <!-- .right-sidebar -->
                
                <!-- /.right-sidebar -->
            </div></div>
            <!-- /.container-fluid -->
 <?php echo include('parts/footer_1.php'); ?>
