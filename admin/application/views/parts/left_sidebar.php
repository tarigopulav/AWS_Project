<!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->
                <div class="user-profile">
                    <div class="user-pro-body">
                        <div><img src="<?php echo base_url();?>assets/images/users/2.jpg" alt="user-img" class="img-circle"></div>
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $username;?><span class="caret"></span></a>
                            <div class="dropdown-menu animated flipInY">
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                <!-- text-->
                               
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="<?php echo base_url()?>user/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                <!-- text-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">&nbsp&nbsp&nbsp&nbspPERSONAL</li>


                        
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Students</span></a>
                            <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url();?>user/add_student">Add Student</a></li>
                        <li><a href="<?php echo base_url();?>user/Show_student_list">Show Student List </a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Teachers</span></a>
                            <ul aria-expanded="false" class="collapse">
                               <li><a href="<?php echo base_url();?>user/add_teacher">Add Teachers</a></li>
                        <li><a href="<?php echo base_url();?>user/Show_teacher_list">Show Teachers List </a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-plus"></i><span class="hide-menu">Course</span></a>
                            <ul aria-expanded="false" class="collapse">
                               <li><a href="<?php echo base_url();?>user/add_course">Add Course</a></li>
                        <li><a href="<?php echo base_url();?>user/show_course_list">Show Course List </a></li>
                            </ul>
                        </li>
                        
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-plus"></i><span class="hide-menu">Subject</span></a>
                            <ul aria-expanded="false" class="collapse">
                               <li><a href="<?php echo base_url();?>user/add_subject">Add Subject</a></li>
                        <li><a href="<?php echo base_url();?>user/show_subject_list">Show Subject List </a></li>
                            </ul>
                        </li>

                        <li> <a href="<?php echo base_url()?>user/attendance_record"><i class="ti-layout-grid3"></i>Attendance Record</a>
                            
                        </li>
                        
                       <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">IP ADDRESS</span></a>
                            <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url();?>user/add_ip">ADD IP ADDRESS</a></li>
                        <li><a href="<?php echo base_url();?>user/showall_ip">ALL SHOW ADDRESS </a></li>
                            </ul>
                        </li>
<li> <a href="<?php echo base_url()?>user/exelabc"><i class="ti-layout-grid3"></i>Attendance report</a>
                            
                        </li>
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>