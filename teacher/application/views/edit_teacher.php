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
    <title>Edit Teacher </title>
   <?php include('parts/head.php'); ?>
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
                        <h4 class="text-themecolor">Edit Teacher</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Edit Teacher</li>
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
                                <h4 class="m-b-0 text-white">Edit Teacher</h4>
                            </div>
                            <?php foreach ($get_teacher_data as $teacher_data) {?>
                    <form method="POST" action="<?php echo base_url();?>user/update_teacher/<?php echo $teacher_data['id']?>" enctype='multipart/form-data'>
                        <div class="card-body">
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                           
                              <div class="row">
                                  <div class="col-md-12">
                                     <h5 class="m-t-30 m-b-10">Full Name</h5>
                                     <input type="text" name="fullname" value="<?php echo $teacher_data['name']?>" data-style="form-control" class="form-control" required="">
                                  </div>
                                </div>
                                <div class="row">
                                     
                                     <div class="col-md-6">
                                        <h5 class="m-t-30 m-b-10">Father Name</h5>
                                       <input type="text" name="fathername" value="<?php echo $teacher_data['father_name']?>" data-style="form-control" class="form-control" required="">
                                    </div>
                                     <div class="col-md-6">
                                        <h5 class="m-t-30 m-b-10">Mother Name</h5>
                                        <input type="text" name="mothername" value="<?php echo $teacher_data['mother_name']?>" data-style="form-control" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="row">
                                     
                                     <div class="col-md-6">
                                        <h5 class="m-t-30 m-b-10">E-mail</h5>
                                       <input type="email" name="email" value="<?php echo $teacher_data['email']?>" data-style="form-control" class="form-control" required="">
                                    </div>
                                     <div class="col-md-6">
                                        <h5 class="m-t-30 m-b-10">Password</h5>
                                        <input type="password" name="password" value="<?php echo $teacher_data['password']?>" data-style="form-control" class="form-control" required="">
                                    </div>
                                </div>

                                 <div class="row">
                                   
                                <div class="col-md-6">
                                        <h5 class="m-t-30 m-b-10">Phone</h5>
                                       <input type="text" name="phone" value="<?php echo $teacher_data['mobile']?>" data-style="form-control"  id="phone" class="form-control"  maxlength="10" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');"  required>
                                    <span id="message"></span>
                                    </div>
                                    <div class="col-md-6">
                                    <h5 class="m-t-30 m-b-10">Gender</h5>
                                    <select name="gender"  class="form-control custom-select">
                                    <?php if($teacher_data['gender'] == 'Male'){?>
                                    <option value="<?php echo $teacher_data['gender']?>"><?php echo $teacher_data['gender']?></option>
                                    <option value="Female">Female</option>
                                    <?php }elseif($teacher_data['gender'] == 'Female'){?>
                                    <option value="<?php echo $teacher_data['gender']?>"><?php echo $teacher_data['gender']?></option>
                                    <option value="Male">Male</option>
                                    <?php }?>
                                    </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                
                                <div class="col-md-6">
                                   <h5 class="m-t-30 m-b-10">Date Of Birth</h5>
                                   <input class="form-control" value="<?php echo $teacher_data['date_of_birth']?>" type="text" id="date_ex" name="date_of_birth" required> 
                                </div>
                                </div>
                                <div>
                                
                                <br>
                                    <div class="form-actions">
                                      <button type="submit" class="btn btn-success" name="submit"> <i class="fa fa-check"></i> Save</button>
                                      <button type="button" class="btn btn-inverse">Cancel</button>
                                    </div><?php }?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
         <?php include('parts/footer.php');?>
 
</body>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#date_ex" ).datepicker();
  });
  </script>
<script type="text/javascript" >
 $(function() {
   $("#phno").bind("keydown", function (e) {
        if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105)) {
             // 0-9
            var val = $(this).val();
            if (!val.match(/^\d{9}$/))
            {
               console.log("it is a number but nut match 10 digit")
            }
            else
            {
               console.log("success");
               return false; // to restrict user to not enter more than 10 digit
            }
        }
        else
        {
           if(e.keyCode == 8)
              return true; // backspace
           alert("Please enter valid Student Phone No");
                event.preventDefault();
                return false;
        }
   });
});
 </script>
</html>