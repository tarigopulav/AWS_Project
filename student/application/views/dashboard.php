<!DOCTYPE html>
<html lang="en">


<head>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title><?php foreach ($get_student_data as $student_data1) { echo $student_data1['name'];} ?></title>
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

<body class="">
    
        
       <?php include('parts/header.php');?>
       
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
<!------ Include the above in your HEAD tag ---------->
<?php foreach($get_student_data as $student_data) {?>
<div class="container emp-profile">
           
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
                    <div class="col-md-4">
                        <div class="profile-img">
                            <?php if($student_data['image'] !=''){?>
                          
                            <img style="height: 149px;" height="150"  src="http://swifnix.com/works/student/attendanceSystem/student/assets/studentimage/<?php echo $student_data['image'];?>" alt=""/>
                            <?php }else{ ?>
                              <img style="height: 149px;" src="<?php echo base_url(); ?>assets/images/profileimage.png" height="150" >
                            <?php } ?>
                            
                            <form  enctype="multipart/form-data" action="updatestudent_profile_image"  method="post">
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file1" id="file1" >
                                <input type="hidden" id="studentid" name="sid" value="<?php echo $student_data['id']; ?>">
                            </div>

      
  <button style="border-radius: 100px;width:100%;margin-bottom: 10px;" type="submit" name="changeiage" class="btn btn-primary">Save Image</button>
  <br>
</form>
                        </div>
                    </div>
                    <div class="col-md-6">
                         <form method="post" >
                        <div class="profile-head">
                                    <h5>
                                        <?php echo ucfirst($student_data['name']);?>
                                    </h5>
                                    <h6>
                                        <?php echo $student_data['email'];?>
                                    </h6>
                                  
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
    <a href="<?php echo base_url(); ?>user/edit_student_profile?slug=<?php echo base64_encode($student_data['id']); ?>" class="btn btn-primary">Edit Profile <i class='fas fa-pencil-alt'></i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                       <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_attandence">
    Mark Attandence
  </button>-->  <input type="hidden" id="studentid" name="sid" value="<?php echo $student_data['id'] ?>">
                        <a href="#"  data-toggle="modal" data-target="#create_attandence">
         <button type="button" class="btn btn-success" style="width: 100%;border-radius: 1.5rem;">Mark Attendance <i class='fas fa-check'></i></button></a><br><br><center>
                        <?php if ($get_student_id_from_attendance_information) {?>
                            <a href="<?php echo base_url()?>user/attendance_information/<?php echo $student_data['id'] ?>">
                                <button style="border-radius: 1.5rem;" type="button" class="btn btn-info">Show Attendance <i class='fas fa-eye'></i></button></a>
                       <?php }else{?>
                       <a style=" pointer-events: none;
                          cursor: default;
                          text-decoration: none;
                          color: black;" href="<?php echo base_url()?>user/attendance_information/<?php echo $student_data['id'] ?>">
                           <button style="border-radius: 1.5rem;" type="button" class="btn btn-info disabled">Show Attendance <i class='fas fa-eye'></i></button></a>
                       <?php }?>
                        </center>       
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Student Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $student_data['id'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $student_data['name'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $student_data['email'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $student_data['mobile'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Course</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $student_data['course'];?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Father Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $student_data['father_name'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Mother Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $student_data['mother_name'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $student_data['gender'];?></p>
                                            </div>
                                        </div>
                                        
                                        
                                
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
       
       
         <!-- The Modal -->
  <div class="modal fade" id="create_attandence">
    <div class="modal-dialog">
         <form action="submit_attendance" method="post" enctype="multipart/form-data">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Mark Your Attandence</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
             
              <input type="hidden" name="student_id" value="<?php echo $student_data['id'] ?>">
              <div class="form-group">
                  <input type="file" name="student_image" class="form-control" accept="image/*" capture> 
              </div>
              
         
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          
           <button type="submit" class="btn btn-success" name="submit" class="form-control">Submit</button>
        </div>
        
      </div>
       </form>
    </div>
  </div>
    <?php }?>
    
       <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

       <?php include('parts/footer.php');?>
  <script>
        $('#alert').fadeIn('slow').delay(5000).hide(0);
  </script>
      <script type="text/javascript">
  
  

function uploadFile() {
     var student_ids=document.getElementById('studentid').value;
  var file = _("file1").files[0];
  // alert(file.name+" | "+file.size+" | "+file.type);
  var formdata = new FormData();
  formdata.append("file1", file);
   formdata.append("student_id", student_ids);
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.open("POST", "<?php echo  base_url(); ?>user/updatestudent_profile_image"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
  //use file_upload_parser.php from above url
  ajax.send(formdata);
}

function progressHandler(event) {
  _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
  var percent = (event.loaded / event.total) * 100;
  _("progressBar").value = Math.round(percent);
  _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
}

function completeHandler(event) {
  _("status").innerHTML = event.target.responseText;
  _("progressBar").value = 0; //wil clear progress bar after successful upload
}

function errorHandler(event) {
  _("status").innerHTML = "Upload Failed";
}

function abortHandler(event) {
  _("status").innerHTML = "Upload Aborted";
}

       </script>
       
       
</body>


</html>