<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Edit Teacher</title>

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
                        <h4 class="page-title">Edit Teacher</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            
                            
                            <li class="active">Edit Teacher</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                  
                     <?php foreach ($edit_data as $teacher_data) {?>
                            <?php for($i=0;$i<count($subject);$i++){
                                      if($teacher_data['subject_id'] == $subject[$i]
                                            ["id"]){
                                         
                                          unset($subject[$i]);
                                        

                                            }
                                    }
                                    
                                    ?>
                     
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">Edit</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                      
                    <form method="POST" action="<?php echo base_url();?>user/update_teacher/<?php echo $teacher_data['id']?>" enctype='multipart/form-data'>
                                        <div class="form-body">
                                            <h3 class="box-title"></h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Full Name</label>
                                                          <input type="text" name="fullname" value="<?php echo $teacher_data['name']?>" data-style="form-control" class="form-control" required=""> </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group has-error">
                                                        <label class="control-label">Father Name</label>
                                                        <input type="text" name="fathername" value="<?php echo $teacher_data['father_name']?>" data-style="form-control" class="form-control" required=""> </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Mother Name</label>
                                                         <input type="text" name="mothername" value="<?php echo $teacher_data['mother_name']?>" data-style="form-control" class="form-control" required=""></div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">E-mail</label>
                                                         <input type="email" name="email" value="<?php echo $teacher_data['email']?>" data-style="form-control" class="form-control" required=""></div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Password</label>
                                                           <input type="password" name="password" value="<?php echo $teacher_data['password']?>" data-style="form-control" class="form-control" required="">
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Phone</label>
                                                       <input type="text" name="phone" value="<?php echo $teacher_data['mobile']?>" data-style="form-control"  id="phone" class="form-control"  maxlength="10" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');"  required>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <h3 class="box-title m-t-40"></h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12 ">
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                          <select name="gender"  class="form-control custom-select">
                                    <?php if($teacher_data['gender'] == 'Male'){?>
                                    <option value="<?php echo $teacher_data['gender']?>"><?php echo $teacher_data['gender']?></option>
                                    <option value="Female">Female</option>
                                    <?php }elseif($teacher_data['gender'] == 'Female'){?>
                                    <option value="<?php echo $teacher_data['gender']?>"><?php echo $teacher_data['gender']?></option>
                                    <option value="Male">Male</option>
                                    <?php }?>
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
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date Of Birth</label>
                                                          <input class="form-control" value="<?php echo $teacher_data['date_of_birth']?>" type="text" id="date_ex" name="date_of_birth" required>  </div>
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
