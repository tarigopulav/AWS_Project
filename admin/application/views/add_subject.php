<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Add Subject</title>

<?php echo include('parts/head_1.php'); ?>
        <!-- Top Navigation -->
      <?php echo include('parts/header_1.php'); ?>
        <!-- End Top Navigation -->
        <!-- Left navbar-header -->
       <?php echo include('parts/left_sidebar_1.php'); ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Add New Subject</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                
                                <li class="breadcrumb-item active">Add Subject</li>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Add New Subject</h4>
                            </div>
                    <form method="POST" action="<?php echo base_url();?>user/submit_add_subject" enctype='multipart/form-data'>
                        <div class="card-body">

                <div class="col-md-8">
                        <div class="white-box">
                            <h3 class="box-title m-b-0"></h3>
                            <p class="text-muted m-b-30 font-13">  </p>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                     <form method="POST" action="<?php echo base_url();?>user/insert_ip" enctype='multipart/form-data'>
                                        <div class="form-group">
                                            <label for="exampleInputuname">User Subject Name</label>
                                            <div class="input-group">
                                                
                                               <input type="text" name="subject" data-style="form-control" class="form-control" required=""> </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Course</label>
                                            <div class="input-group">
                                                
                                                 <select data-style="form-control" class="form-control" name="course" id="course">
                                         <option selected disabled>Select Course</option>
                                         <?php foreach($all_courses as $cousre){?>
                                      <option value="<?php echo $cousre['id']?>"><?php echo $cousre['course_name']?></option>
                                      <?php }?>
                                    </select></div>
                                        </div>
                                       
                                      
                                        
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Row -->
         <?php echo include('parts/footer_1.php'); ?>
 
</body>
</html>