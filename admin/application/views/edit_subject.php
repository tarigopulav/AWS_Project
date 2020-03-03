<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Edit Subject</title>

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
                        <h4 class="page-title">Data Table</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="#">IP</a></li>
                            
                            <li class="active">SHOW IP</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                  
                     
                     <div class="col-md-8">
                        <div class="white-box">
                            <h3 class="box-title m-b-0"></h3>
                            <p class="text-muted m-b-30 font-13">  </p>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                     <?php foreach ($edit_data as $edit_data) {?>
                    <form method="POST" action="<?php echo base_url();?>user/update_add_subject/<?php echo $edit_data['id']?>" enctype='multipart/form-data'>
                                        <div class="form-group">
                                            <label for="exampleInputuname">Subject Name</label>
                                            <div class="input-group">
                                                
                                              <input type="text" name="subject_name" data-style="form-control" class="form-control" value="<?php echo $edit_data['subject_name']?>" required=""> </div>
                                        </div>
                                        <?php for($i=0;$i<count($course);$i++){
                                      if($edit_data['course_name'] == $course[$i]["course_name"]){
                                         
                                          unset($course[$i]);
                                        }
                                    }
                                    ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Course Name</label>
                                            <div class="input-group">
                                                
                                                 <select class="form-control" data-style="form-control" name="course_name">
                                         <option value="<?php echo $edit_data['course_name'] ?>" selected><?php echo $edit_data['course_name'];?></option>
                                         
                                         <?php foreach($course as $course_data){?>
                                         
                                         <option value="<?php echo $course_data['course_name']?>"><?php echo $course_data['course_name']?></option>
                                         <?php }?>
                                     </select> </div>
                                        </div>
                                       
                                      
                                        <?php }?>
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                    </form>
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
