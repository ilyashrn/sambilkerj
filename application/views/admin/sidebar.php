<!-- set loading layer -->
        <div class="dev-page-loading preloader"></div>
        <!-- ./set loading layer -->       
        
        <!-- page wrapper -->
        <div class="dev-page">

            <!-- page header -->    
            <div class="dev-page-header">
                
                <div class="dph-logo">
                    <a href="<?php echo base_url().'adm/dashboard'?>">SambilKerja Admin Panel</a>
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
                            <img src="<?php echo ($this->session->userdata('avatar') !== '') ? base_url().'images/profil_photo/'.$this->session->userdata('avatar') : base_url().'images/nobody.jpg'?>">
                        </div>
                        <div class="profile-info">
                            <h4><?php echo $this->session->userdata('administrator_name');?></h4>
                            <span><?php echo $this->session->userdata('usrnm');?></span>
                        </div>                        
                    </div>
                    
                    <ul class="dev-page-navigation">
                        <li class="title">Navigation</li>
                        <li <?php echo ($this->uri->segment(2) === 'dashboard') ? 'class="active"' : ''?>>
                            <a href="<?php echo base_url().'adm/dashboard'?>"><i class="fa fa-desktop"></i> <span>Dashboard</span></a>
                        </li>
                        <li <?php echo ($this->uri->segment(2) === 'users' || $this->uri->segment(2) === 'administrators' || $this->uri->segment(2) === 'workers') || $this->uri->segment(2) === 'companies' ? 'class="active"' : ''?>>
                            <a href="#"><i class="fa fa-group (alias)"></i> <span>Users Manager</span></a>
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
                            </ul>
                        </li>                        
                        <li <?php echo ($this->uri->segment(2) === 'lokers') ? 'class="active"' : ''?>>
                            <a href="<?php echo base_url().'adm/lokers'?>"><i class="fa fa-file-o"></i> <span>Loker Manager</span></a>
                        </li>
                        <li <?php echo ($this->uri->segment(2) === 'contents' || $this->uri->segment(2) === 'FAQS' || $this->uri->segment(2) === 'hcontents' || $this->uri->segment(2) === 'terms') ? 'class="active"' : ''?>>
                            <a href="#"><i class="fa fa-list"></i> <span>Content Manager</span></a>
                            <ul>
                                <li <?php echo ($this->uri->segment(2) === 'contents') ? 'class="active"' : ''?>>
                                    <a href="<?php echo base_url().'adm/contents'?>"><span>Content sets Manager</span></a>
                                </li>
                                <li <?php echo ($this->uri->segment(2) === 'FAQS') ? 'class="active"' : ''?>>
                                    <a href="<?php echo base_url().'adm/FAQS'?>"><span>Frequently Asked Questions</span></a>
                                </li>
                                <li <?php echo ($this->uri->segment(2) === 'hcontents') ? 'class="active"' : ''?>>
                                    <a href="<?php echo base_url().'adm/hcontents'?>"><span>Home Content Manager</span></a>
                                </li>
                                <li <?php echo ($this->uri->segment(2) === 'terms') ? 'class="active"' : ''?>>
                                    <a href="<?php echo base_url().'adm/terms'?>"><span>Hak dan Kewajiban Manager</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    
                </div>
                <!-- ./page sidebar