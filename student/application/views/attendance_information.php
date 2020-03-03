<!DOCTYPE html>
<html lang="en">


<head>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title><?php foreach ($student_data as $student_data1) { echo $student_data1['name'];} ?></title>
    <?php include('parts/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/pagination/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/pagination/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/pagination/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/pagination/css/style.css">
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
 <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BsslXeVIU' crossorigin='anonymous'>
 <!------ Include the above in your HEAD tag ---------->

 <div class="container emp-profile">
    
    <div class="table-responsive table-bordered">
        <table class="table display compact cell-border"  id="maintable" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Student Image</th>
                    <th>Student Id</th>
                    <th>Student Name</th>
                    <th>Attendance</th>
                    <th>Date</th>
                       <th>Status</th>

                </tr>
            </thead>                                      
            <tbody>

                <?php foreach ($get_student_attendance_record as $get_student) {?>
                <tr>
                <td><?php if($get_student['student_image']==''){ ?>
                <img src="<?php echo base_url(); ?>assets/images/profileimage.png" height="50" width="50">
                <?php }else{ ?>
                 <img src="<?php echo base_url(); ?><?php echo $get_student['student_image'];?>" height="50" width="50"><?php }?></td>
                    <td><?php echo $get_student['student_id'];?></td>
                    <td><?php echo $get_student['student_name'];?></td>
                    <td><?php echo $get_student['attendance'];?></td>
                    <td><?php echo $get_student['attendance_date'];?></td>
<td><?php if($get_student['attendance_status']=='0'){?>
<button class="btn btn-danger">Proxy</button>
<?php }else{?>
<button class="btn btn-success">Valid</button>
<?php } ?>
</td>

                </tr>
 <?php } ?>
            </tbody>
            <tfoot>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
 <th></th>
  <th></th>
            </tfoot>
        </table>
       
    </div>
</div>
</div>
</div> 


</div>
<?php include('parts/footer.php');?>
<script type="text/javascript" src="<?php echo base_url()?>assets/pagination/js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/pagination/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/pagination/js/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/pagination/js/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/pagination/js/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/pagination/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/pagination/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/pagination/js/app.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/pagination/js/jquery.mark.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/pagination/js/datatables.mark.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/pagination/js/buttons.colVis.min.js"></script> 
</body>


</html>