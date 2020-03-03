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
    <title>Edit Student Profile</title>
    
   <?php include('parts/head.php'); ?>
   <style>
       a.navbar-brand{
           font-size:15px;
       }
   </style>
</head>

<body class="skin-default fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Edit Student Profile</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <?php include('parts/header.php');?>
      <?php //include('parts/left_sidebar.php');?>



        <div class="">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Edit Student Profile</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Edit Student Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
               
               
               



                <div class="row">
<div class="col-md-12">
                    <?php if($this->session->flashdata('success')){ ?>
                
<div class="alert alert-success  alert-dismissible" id="alert">
  <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
</div>
    
<?php }else if($this->session->flashdata('error')){  ?>
<div class="alert alert-danger  alert-dismissible" id="alert">
  <strong>Danger!</strong><?php echo $this->session->flashdata('error'); ?>.
</div>
<?php }else if($this->session->flashdata('warning')){  ?>
<div class="alert alert-warning  alert-dismissible" id="alert">
  <strong>Warning!</strong><?php echo $this->session->flashdata('warning'); ?>.
</div>
 
<?php }else if($this->session->flashdata('info')){  ?>

<div class="alert alert-info  alert-dismissible" id="alert">
  <strong>Info!</strong><?php echo $this->session->flashdata('info'); ?>.
</div>


    
<?php } ?>
                </div>
                 
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Edit Student Info</h4>
                            </div>
                            <?php foreach($get_student_data as $fdata){  $slug=base64_encode( $fdata['id']); ?>
                    <form method="POST" action="<?php echo base_url();?>user/edit_studentform?slug=<?php echo $slug ?>" enctype='multipart/form-data'>
                        <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                              <div class="row">
                                  <div class="col-md-12">
                                     <h5 class="m-t-30 m-b-10">Full Name</h5>
                                     <input type="text" name="fullname" data-style="form-control" class="form-control" value="<?php echo $fdata['name']; ?>">
                                  </div>
                                </div>
                                <div class="row">
                                     
                                     <div class="col-md-6">
                                        <h5 class="m-t-30 m-b-10">Father Name</h5>
                                       <input type="text" name="fathername" data-style="form-control" class="form-control" value="<?php echo $fdata['father_name']; ?>">
                                    </div>
                                     <div class="col-md-6">
                                        <h5 class="m-t-30 m-b-10">Mother Name</h5>
                                        <input type="text" name="mothername" data-style="form-control" class="form-control" value="<?php echo $fdata['mother_name']; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                     
                                     <div class="col-md-6">
                                        <h5 class="m-t-30 m-b-10">E-mail</h5>
                                       <input type="email" name="email" data-style="form-control" class="form-control"  value="<?php echo $fdata['email']; ?>">
                                    </div>
                                     <div class="col-md-6">
                                        <h5 class="m-t-30 m-b-10">Password</h5>
                                        <input type="password" name="password" data-style="form-control" class="form-control"  value="<?php echo $fdata['password']; ?>">
                                    </div>
                                </div>

                                 <div class="row">
                                   
                                <div class="col-md-6">
                                        <h5 class="m-t-30 m-b-10">Phone</h5>
    <input type="text" name="phone" data-style="form-control"  id="phone" class="form-control"  maxlength="10" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" value="<?php echo $fdata['mobile']; ?>">
                                    <span id="message"></span>
                                    </div>
                                    <div class="col-md-6">
                                         <h5 class="m-t-30 m-b-10">Gender</h5>
<?php if($fdata['gender']=='male'){ ?>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="gender" value="male" checked>Male
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="gender" value"female">Female
  </label>
</div>
<?php }else{ ?>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="gender" value="male" >Male
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="gender" value"female" checked>Female
  </label>
</div>
<?php } ?>
                                   
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                <div class="col-md-6">
                                    <label>Dath Of birth</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="dob" value="<?php echo $fdata['date_of_birth']; ?>">
                                    </div>
                                   
                                </div>
                                <div class="col-md-6">
                                    <h5 class="m-t-30 m-b-10">Course</h5>
                                    <div>
                                        
                                   
                                    <select name="course" class="form-control custom-select" >
                                        <option value="<?php echo $fdata['course']; ?>"><?php echo $fdata['course']; ?></option>
                                       
                                  
                                    </select>
                                     </div>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <div class="form-actions">
                                      <button type="submit" class="btn btn-success" name="submit"> <i class="fa fa-check"></i> Save</button>
                                      <button type="button" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Row -->
         <?php include('parts/footer.php');?>
        
</body>

</html>