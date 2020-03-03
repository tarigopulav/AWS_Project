<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Admin Dashboard</title>

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
                        <h4 class="page-title">Attendance</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li class="active">Attendance</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
              
               <div class="row">
                  
                     
                     <div class="col-md-8">
                        <div class="white-box">
                            <h3 class="box-title m-b-0"></h3>
                            <p class="text-muted m-b-30 font-13">  </p>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                     <form method="POST" action="<?php echo base_url();?>user/add_att_recored_with_id" enctype='multipart/form-data'>
                                         <h5 class="box-title m-t-30">student name</h5>
                                         <select name="student_name" class="form-control">
                                             <?php foreach($show_list_datd as $as){ ?>
                                         <option value="<?php echo $as['id']; ?>"><?php echo $as['name']; ?></option>
                                         <?php } ?>
                                         </select>
                                       
                                        
                                        
                                      <div class="example">
                                       
                                       <h5 class="box-title m-t-30">Date-1</h5>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="date1" id="datepicker-autoclosee" placeholder="mm/dd/yyyy"> <span class="input-group-addon"><i class="icon-calender"></i></span> </div>
                                    </div>
                                    
                                     <div class="example">
                                        <h5 class="box-title m-t-30">Date-2</h5>
                                        
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="date2" id="datepicker-autoclose" placeholder="mm/dd/yyyy"> <span class="input-group-addon"><i class="icon-calender"></i></span> </div>
                                    </div>
                                        
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
             
                
              
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
      <?php echo include('parts/footer_1.php'); ?>
       <script>
    // Clock pickers
    $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });
    $('.clockpicker').clockpicker({
        donetext: 'Done',
    }).find('input').change(function() {
        console.log(this.value);
    });
    $('#check-minutes').click(function(e) {
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
    // Colorpicker
    $(".colorpicker").asColorPicker();
    $(".complex-colorpicker").asColorPicker({
        mode: 'complex'
    });
    $(".gradient-colorpicker").asColorPicker({
        mode: 'gradient'
    });
    // Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    
    
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclosee').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    
    
    
    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
    });
    // Daterange picker
    $('.input-daterange-datepicker').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        format: 'MM/DD/YYYY h:mm A',
        timePickerIncrement: 30,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-limit-datepicker').daterangepicker({
        format: 'MM/DD/YYYY',
        minDate: '06/01/2015',
        maxDate: '06/30/2015',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
        dateLimit: {
            days: 6
        }
    });
    </script>
</body>


</html>