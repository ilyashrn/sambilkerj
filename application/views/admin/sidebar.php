<!-- set loading layer -->
        <div class="dev-page-loading preloader"></div>
        <!-- ./set loading layer -->       
        
        <!-- page wrapper -->
        <div class="dev-page">
            
            <!-- page header -->    
            <div class="dev-page-header">
                
                <div class="dph-logo">
                    <a href="index.html">Finance and Supplies Management System</a>
                    <a class="dev-page-sidebar-collapse">
                        <div class="dev-page-sidebar-collapse-icon">
                            <span class="line-one"></span>
                            <span class="line-two"></span>
                            <span class="line-three"></span>
                        </div>
                    </a>
                </div>
            </div>
            <!-- ./page header -->
            
            <!-- page container -->
            <div class="dev-page-container">

                <!-- page sidebar -->
                <div class="dev-page-sidebar">                    
                    
                    <div class="profile profile-transparent">
                        <div class="profile-image">
                            <img src="<?php echo base_url().'images/nobody.jpg'?>">
                        </div>
                        <div class="profile-info">
                            <h4><?php echo $this->session->userdata('fullname');?></h4>
                            <span><?php echo $this->session->userdata('prev');?></span>
                        </div>                        
                    </div>
                    
                    <ul class="dev-page-navigation">
                        <li class="title">Navigation</li>
                        <li <?php echo ($this->uri->segment(2) === 'dashboard') ? 'class="active"' : ''?>>
                            <a href="<?php echo base_url().'adm/dashboard'?>"><i class="fa fa-desktop"></i> <span>Dashboard</span></a>
                        </li>
                        <li <?php echo ($this->uri->segment(2) === 'users' || $this->uri->segment(2) === 'administrators' || $this->uri->segment(2) === 'workers') || $this->uri->segment(2) === 'companies' ? 'class="active"' : ''?>>
                            <a href="<?php echo base_url().'adm/users'?>"><i class="fa fa-group (alias)"></i> <span>Users Management</span></a>
                            <ul>
                                <li <?php echo ($this->uri->segment(2) === 'administrators') ? 'class="active"' : ''?>>
                                    <a href="<?php echo base_url().'adm/administrators'?>"> <span>Administrators</span></a>
                                </li>    
                                <li <?php echo ($this->uri->segment(2) === 'workers') ? 'class="active"' : ''?>>
                                    <a href="<?php echo base_url().'adm/workers'?>"> <span>Workers</span></a>
                                </li>    
                                <li <?php echo ($this->uri->segment(2) === 'companies') ? 'class="active"' : ''?>>
                                    <a href="<?php echo base_url().'adm/companies'?>"> <span>Companies</span></a>
                                </li>                    
                                <!-- <li>
                                    <a href="#">Second Level</a>
                                    <ul>
                                        <li><a href="#">Third Level</a></li>
                                        <li><a href="#">Third Level</a></li>
                                        <li><a href="#">Third Level</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Second Level</a></li> -->
                            </ul>
                        </li>                        
                        <li <?php echo ($this->uri->segment(2) === 'lokers') ? 'class="active"' : ''?>>
                            <a href="<?php echo base_url().'adm/lokers'?>"><i class="fa fa-file-o"></i> <span>Loker Management</span></a>
                        </li>
                        <li <?php echo ($this->uri->segment(2) === 'skillsets') ? 'class="active"' : ''?>>
                            <a href="<?php echo base_url().'adm/skillsets'?>"><i class="fa fa-briefcase"></i> <span>Skills sets Management</span></a>
                        </li>
                        <li <?php echo ($this->uri->segment(2) === 'languages') ? 'class="active"' : ''?>>
                            <a href="<?php echo base_url().'adm/languages'?>"><i class="fa fa-flag-checkered"></i> <span>Languages sets Management</span></a>
                        </li>
                        <li <?php echo ($this->uri->segment(2) === 'contents') ? 'class="active"' : ''?>>
                            <a href="<?php echo base_url().'adm/content'?>"><i class="fa fa-list"></i> <span>Content Management</span></a>
                        </li>
                    </ul>
                    
                </div>
                <!-- ./page sidebar