<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from static.crazycafe.net/crazycafe/optimistic/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 May 2018 07:46:07 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title -->
    <title>Optimistic-HTML 5 Template</title>
    
    <!-- =================================================
        ***Favicon***
    ==================================================== --> 
     
     <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/animate.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/camera.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/icofont.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url();?>assets/css/meanmenu.css" rel="stylesheet" type="text/css">
       <link href="<?php echo base_url();?>assets/css/owl.carousel.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/owl.video.play.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="preloader">
        <div class="preloader_spinner"></div>
    </div>
    <!-- preloader end -->
    <div class="contact_page">
 <!-- ========================================================== 
    1.*Header_Area start 
============================================================ -->
<?php include('header.php');?>
<!-- ========================================================== 
    2.*Header_top_Area start 
============================================================ --> 
   <?php include('header_top.php');?>
<!-- ==================================================
    3.*ALL_page banner area start
=================================================== -->      
<section class="all_page_slider_bg">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="normal_service_text all_page_slider_text">
                    <h2>Register</h2>
                    <ol class="breadcrumb">
                      <li><a href="http://jobcomplete.com.au/">Home</a><span></span></li>
                      <li class="active"><a href="#">Register</a></li>
                    </ol>
                </div>
            </div><!-- column End -->
        </div><!-- row End -->
    </div><!-- container End -->
</section> 

<section class="contact_area section_padding_bottom">
    <div class="container" >

<?php 
   if($this->session->flashdata('success')){
 ?>
  <div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Success! </strong><?php  echo $this->session->flashdata('success'); ?>
</div>

<?php    
}elseif($this->session->flashdata('error')){ ?>
<div class="alert alert-danger fade in alert-dismissible" style="margin-top:18px;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Warning! </strong><?php  echo $this->session->flashdata('error'); ?>
</div>

<?php 
}
?>

        <div class="row">
            <div class="col-md-12 ">
                <div class="contact_form contact_margin_bottom">
                    <form action="<?php echo base_url();?>welcome/register" method="POST">
                        <input  required type="text" name="fullname" id="userFname" placeholder="fullname" style="border: 1px solid #f44336;">
                    <input required type="email" name="email" id="userEmail" placeholder="Email" style="border: 1px solid #f44336;">
                        <input required type="password" name="password" id="userEmail" placeholder="Password" style="border: 1px solid #f44336;">

                        <input required type="text" name="phone" id="userPhone" placeholder="Phone" style="border: 1px solid #f44336;">
                       
                       

                        <div class="submit_btn">
                            <input type="submit" name="submit" value="Register" class="submit_effect">
                        </div>
                    </form>
                </div><!-- contact_form end -->
            </div><!-- column end -->
           
        </div><!-- row end -->
    </div><!-- container end -->
</section>
<!-- ==================================================
    6.*Footer_area start
===================================================== -->
<footer class="footer">
    <div class="footer_top_area footer_top clearfix">
        <div class="container">
            <div class="row ">
                <div class="col-sm-3 col-sm-offset-1col-xs-12">
                    <div class="widget widget_text">
                        <div class="footer_logo">
                            <a href="index.html"><img src="images/home/footer_logo.png" alt="footer logo"></a>
                        </div>
                        <p>Mutem vel eum iriure dolor in hen drerit in vulputate velit esse mole stie consequat, vel illum dolore </p>
                    </div>
                </div><!-- column end -->
                <div class="col-sm-2 col-xs-6">
                    <div class="widget footer_top_menu">
                        <h2>Our Services</h2>
                            <ul>
                                <li><a href="#">SEO Marketing</a></li>
                                <li><a href="#">email Marketing</a></li>
                                <li><a href="#">video Marketing</a></li>
                            </ul>
                    </div>
                </div><!-- column end -->
                <div class="col-sm-2 col-xs-6">
                    <div class="widget footer_top_menu margin_top_tablet">
                        <h2>important Link</h2>
                        <ul>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Price & Plans</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div><!-- column end -->
                <div class="col-sm-2  col-xs-6">
                    <div class="widget footer_top_menu margin_top_tablet margin-left-30">
                        <h2>Quick Link</h2>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">about</a></li>
                            <li><a href="#">service</a></li>
                        </ul>
                    </div>
                </div><!-- column end -->
                <div class="col-sm-2 col-xs-6">
                    <div class="widget footer_top_menu margin_top_tablet margin-left-30">
                        <h2>follow us</h2>
                        <ul>
                            <li><a href="#">facebook</a></li>
                            <li><a href="#">twitter</a></li>
                            <li><a href="#">Behance</a></li>
                        </ul>
                    </div>
                </div><!-- column end -->
            </div><!-- row end -->
        </div><!-- container end -->
    </div><!-- Footer_Top_area end -->
    <div class="footer_bottom_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer_bottom text-center">
                        <p>Copyright <span>&copy;</span>Crazycafe 2016, All Rights Reserved .</p>
                    </div>
                </div><!-- column end -->
            </div><!-- row end -->
        </div><!-- container end -->
    </div><!-- Footer_bottom_area end -->
</footer>
<!-- ======================================================
    ***Js Files*** 
=========================================================== -->
       
        <!-- ================= Main Js ==================== -->
        <script src="<?php echo base_url();?>assets/js/jquery-3.1.0.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
          
        <!-- ================= Bootstrap min Js =========== -->
        <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

        <!-- ================= owl carousel min Js ======== -->
        <script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>

        <!-- ================= Meanmenu Js ================ -->
        <script src="<?php echo base_url();?>assets/js/jquery.meanmenu.js"></script>

        <!-- ================= Easing  Js ================= -->
        <script src="<?php echo base_url();?>assets/js/jquery.easing.1.3.js"></script>
        
        <!-- ================= Google Map Js ============== -->
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD7CQl6fRhagGok6CzFGOOPne2X1u1spoA"></script>
          
        <!-- ================= Active Js ================== -->
        <script src="<?php echo base_url();?>assets/js/active.js"></script>
        <script>
            var myCenter = new google.maps.LatLng(34.9429457, -81.0967002);

            function initialize() {
                var mapProp = {
                    center: myCenter,
                    scrollwheel: false,
                    zoom: 8,
                    styles: [{
                        "featureType": "landscape",
                        "stylers": [{
                            "saturation": -100
                        }, {
                            "lightness": 65
                        }, {
                            "visibility": "on"
                        }]
                    }, {
                        "featureType": "poi",
                        "stylers": [{
                            "saturation": -100
                        }, {
                            "lightness": 51
                        }, {
                            "visibility": "simplified"
                        }]
                    }, {
                        "featureType": "road.highway",
                        "stylers": [{
                            "saturation": -100
                        }, {
                            "visibility": "simplified"
                        }]
                    }, {
                        "featureType": "road.arterial",
                        "stylers": [{
                            "saturation": -100
                        }, {
                            "lightness": 30
                        }, {
                            "visibility": "on"
                        }]
                    }, {
                        "featureType": "road.local",
                        "stylers": [{
                            "saturation": -100
                        }, {
                            "lightness": 40
                        }, {
                            "visibility": "on"
                        }]
                    }, {
                        "featureType": "transit",
                        "stylers": [{
                            "saturation": -100
                        }, {
                            "visibility": "simplified"
                        }]
                    }, {
                        "featureType": "administrative.province",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    }, {
                        "featureType": "water",
                        "elementType": "labels",
                        "stylers": [{
                            "visibility": "on"
                        }, {
                            "lightness": -25
                        }, {
                            "saturation": -100
                        }]
                    }, {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#f44336"
                        }]
                    }],
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                };

                var map = new google.maps.Map(document.getElementById("my_location"), mapProp);

                var marker = new google.maps.Marker({
                    position: myCenter,
                });

                marker.setMap(map);
            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </div>
   
</body>


<!-- Mirrored from static.crazycafe.net/crazycafe/optimistic/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 May 2018 07:46:07 GMT -->
</html>

