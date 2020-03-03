<!DOCTYPE html>
<html lang="en">


<head>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Teacher Dashboard</title>
   <?php include('parts/head.php'); ?>
</head>
<style>
body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
</style>
<?php include('parts/header.php');?>
<body class="">
    
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
<!------ Include the above in your HEAD tag ---------->
<?php foreach ($get_teacher_data as $get_teacher_data) {?>
<div class="container emp-profile">
            
                <div class="row">
                    <div class="col-md-4">
                        <br><br><br>
                        <div class="profile-img">
                            <?php if($get_teacher_data['image'] !=''){?>
                          
                            <img style="height: 149px;" height="150"  src="http://swifnix.com/works/student/attendanceSystem/teacher/assets/teacherimage/<?php echo $get_teacher_data['image'];?>" alt=""/>
                            <?php }else{ ?>
                              <img style="height: 149px;" src="<?php echo base_url(); ?>assets/images/profileimage.png" height="150" >
                            <?php } ?>
                            
                            <form  enctype="multipart/form-data" action="updateteacher_profile_image"  method="post">
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file1" id="file1" >
                                <input type="hidden" id="teacherid" name="tid" value="<?php echo $get_teacher_data['id']; ?>">
                                
                            </div>
                            <button style="border-radius: 100px;width:100%;margin-bottom: 10px;" type="submit" name="changeiage" class="btn btn-primary">Save Image</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo ucfirst($get_teacher_data['name']);?>
                                    </h5>
                                    <h6>
                                        <?php echo $get_teacher_data['email'];?>
                                    </h6>
                                    <p class="proile-rating"><span></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">All</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a  style="border-radius: 1.5rem;" class="btn btn-primary" href="<?php echo base_url()?>user/edit_teacher/<?php echo $get_teacher_data['id'];?>">Edit Profile  <i class='fas fa-pencil-alt'></i></a><br><br>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                          <a href="<?php echo base_url()?>user/attendance_information"><button type="button" class="btn btn-success" style="width: 100%;border-radius: 1.5rem;">View Attendance <i class='fas fa-check'></i></button></a>
                             <br><br>
                              <a href="<?php echo base_url()?>user/student_information"><button type="button" class="btn btn-primary" style="width: 100%;border-radius: 1.5rem;">View Student <i class='fas fa-check'></i></button></a> 
                         
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Teacher Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $get_teacher_data['id'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $get_teacher_data['name'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $get_teacher_data['email'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $get_teacher_data['mobile'];?></p>
                                            </div>
                                        </div>
                                        
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Father Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $get_teacher_data['father_name'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Mother Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $get_teacher_data['mother_name'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $get_teacher_data['gender'];?></p>
                                            </div>
                                        </div>
                                        
                                        
                                
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
        <?php }?>
       <?php include('parts/footer.php');?>
  
       
</body>


</html>