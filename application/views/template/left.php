     <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                
              <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">                                                                    
                        <li>
                            <a href="<?php echo base_url();?>index.php/main"><i class="fa fa-bar-chart-o"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-desktop"></i> General Management<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>admin/user_controller"><i class="glyphicon glyphicon-copy"></i> User Setup</a>
                                </li>
                                 <li>
                                    <a href="<?php echo base_url();?>admin/account_c"><i class="glyphicon glyphicon-flash"></i> Account Setup</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>admin/VAT_c"><i class="glyphicon glyphicon-road"></i> VAT Setup</a>
                                </li>
                            </ul>   
                        </li>                                                                                               
                        <li><!-- Website menu-->
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Website menu Managements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>admin/location_c"><i class="glyphicon glyphicon-send"></i> Location Setup</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>admin/about_us_c"><i class="glyphicon glyphicon-user"></i> About us Setup</a>
                                </li>                               
                                <li>
                                    <a href="<?php echo base_url();?>admin/promotion_c"><i class="glyphicon glyphicon-star"></i> Promotion Setup</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>admin/contact_us_c"><i class="glyphicon glyphicon-earphone"></i> Contact us Setup</a>
                                </li>
                               
                                <li>
                                    <a href="<?php echo base_url();?>admin/FAQ_c"><i class="glyphicon glyphicon-question-sign"></i> FAQ Setup</a>
                                </li>                                   
                            </ul>                            
                        </li><!-- end Website menu-->
                        <li>
                            <a href="<?php echo base_url();?>admin/category_c"><i class="glyphicon glyphicon-list"></i> Category Managements</a>
                        </li>
                         <li>
                            <a href="<?php echo base_url();?>admin/Privacy_policy_c"><i class="glyphicon glyphicon-list"></i> Privacy Policy</a>
                        </li>
                         <li>
                            <a href="<?php echo base_url();?>admin/Privacy_policy_c"><i class="glyphicon glyphicon-list"></i> Terms of Use</a>
                        </li>
                         <li>
                            <a href="<?php echo base_url();?>admin/pay_walk_in_c"><i class="fa fa-male"></i> Pay Walk In Managements</a>
                        </li>                                                
                        <li><!-- purchase package-->
                            <a href="#"><i class="fa fa-money fa-fw"></i> Purchase packages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>admin/cv_paid_search_c"><i class="glyphicon glyphicon-search"></i> CV paid search Setup</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>admin/bundle_package_c"><i class="glyphicon glyphicon-gift"></i> Bundle package Setup</a>
                                </li>                                   
                            </ul>                            
                        </li><!-- end purchase package-->                                                
                        <li><!-- service -->
                            <a href="#"><i class="fa fa-navicon fa-fw"></i> Service Managements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                 <li>
                                    <a href="<?php echo base_url();?>admin/ads_setup_c"><i class="glyphicon glyphicon-tags"></i> Advertisement Setup</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>admin/cv_setup_c"><i class="glyphicon glyphicon-list-alt"></i> CV Setup</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>admin/search_cv_setup_c"><i class="glyphicon glyphicon-search"></i> Search CV Setup</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>admin/job_setup_c"><i class="glyphicon glyphicon-briefcase"></i> Job Setup</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>admin/search_job_setup_c"><i class="glyphicon glyphicon-search"></i> Search Job Setup</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>admin/skill_setup_c"><i class="glyphicon glyphicon-education"></i> Skill Setup</a>
                                </li>                                                                
                                <li>
                                    <a href="<?php echo base_url();?>admin/search_skill_setup_c"><i class="glyphicon glyphicon-search"></i> Search Skill Setup</a>
                                </li>                                
                            </ul>                            
                        </li><!-- end service -->
                        <li>
                            <a href="#"><i class="fa fa-users"></i> Customer Managements<span class="fa arrow"></span></a>                            
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>admin/order_job_c"><i class="glyphicon glyphicon-briefcase"></i> Job Ordered</a>
                                </li>
                                 <li>
                                    <a href="<?php echo base_url();?>admin/order_cv_c"><i class="glyphicon glyphicon-list-alt"></i> CV Ordered</a>
                                </li>
                                 <li>
                                    <a href="<?php echo base_url();?>admin/order_skill_c"><i class="glyphicon glyphicon-education"></i> Skill Ordered</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>admin/order_ads_c"><i class="glyphicon glyphicon-tags"></i> Advertisement Ordered</a>
                                </li>
                                 <li>
                                    <a href="<?php echo base_url();?>admin/order_bp_c"><i class="glyphicon glyphicon-gift"></i> Bundle package Ordered</a>
                                </li>                                                                
                                <li>
                                    <a href="<?php echo base_url();?>admin/order_cps_c"><i class="glyphicon glyphicon-search"></i> CV paid search Ordered</a>
                                </li>
                            </ul> 
                        </li>                                               
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
   </nav>