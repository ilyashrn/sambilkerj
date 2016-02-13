<?php
foreach ($basic_data as $basic_row) {}
?>
        <!-- page content -->
                <div class="dev-page-content">                    
                    <!-- page content container -->
                    <div class="container">
                        
                        <!-- page title -->
                        <div class="page-title">
                            <h1><?php echo $basic_row->administrator_name;?></h1>
                            <p><?php echo $basic_row->username?></p>
                            
                            <ul class="breadcrumb">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Users Management</a></li>
                                <li><a href="../../">Administrators</a></li>
                                <li><?php echo $basic_row->administrator_name;?></li>
                            </ul>
                        </div>                        
                        <!-- ./page title -->
                        <div class="wrapper">                   
                            <div class="row row-wider">
                                <div class="col-md-3">
                                    <div class="profile margin-bottom-0">
                                        <div class="profile-image">
                                            <?php
                                            if ($basic_row->avatar == '') { ?>
                                              <img src="<?php echo base_url().'images/nobody.jpg';?>" alt="">
                                            <?php 
                                            } else { ?>
                                              <img src="<?php echo base_url().'images/profil_photo/'.$basic_row->avatar;?>" alt="">
                                            <?php } ?>
                                        </div>
                                        <div class="profile-info">
                                            <h4><?php echo $basic_row->administrator_name;?></h4>
                                            <?php
                                            if ($basic_row->avatar) { ?>
                                                <span><a href=""><i class="fa fa-remove"></i> Remove Avatar</a></span>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="list-group">
                                        <a href="#" class="list-group-item active"><i class="fa fa-wrench"></i> Edit profile</a>
                                        <a href="../../deleting/<?php echo $basic_row->id_admin;?>" class="list-group-item"><i class="fa fa-remove"></i> Delete User</a>                           
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <?php
                                    echo form_open_multipart('adm/Administrators/editing/');
                                    ?>
                                    <?php
                                if ($this->session->flashdata('msg')) { ?>
                                    <div clas="row">
                                        <div class="col-md-9">
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <?php echo $this->session->flashdata('msg');?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } if ($this->session->flashdata('warn')) { ?>
                                    <div clas="row">
                                        <div class="col-md-9">
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <?php echo $this->session->flashdata('warn');?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="page-subtitle margin-bottom-0">
                                        <h3>Account details</h3>
                                    </div>
                                    <div class="form-group-one-unit margin-bottom-40">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-group-custom">
                                                    <label>Login/username</label>
                                                    <input name="username" type="text" class="form-control" value="<?php echo $basic_row->username;?>"/>                                            
                                                </div>                        
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-group-custom">
                                                    <label>Change Password</label>
                                                    <input name="password" type="password" class="form-control" value=""/>                                            
                                                </div>                        
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-group-custom">
                                                    <label>Re-Password</label>
                                                    <input type="password" class="form-control" value=""/>                                            
                                                </div>                        
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-group-custom">
                                                    <label>Email Address</label>
                                                    <input name="email" type="text" class="form-control" value="<?php echo $basic_row->email;?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-group-custom">
                                                    <label>ID Number</label>
                                                    <input disabled type="text" class="form-control" value="<?php echo $basic_row->id_admin;?>"/>
                                                    <input type="hidden" value="<?php echo $basic_row->id_admin;?>" name="id"/>
                                                    <input type="hidden" value="<?php echo $basic_row->username;?>" name="origin_username"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-group-custom">
                                                    <label>Full Name</label>
                                                    <input type="text" class="form-control" name="administrator_name" value="<?php echo $basic_row->administrator_name;?>"/>                                            
                                                </div>                        
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-custom">
                                                    <label>Avatar</label>
                                                    <input type="file" class="form-control" name="avatar"/>                                            
                                                </div>                        
                                            </div>
                                        </div>                                                              
                                    </div>
                                    
                                    <div class="col-md-12">                                            
                                        <button type="submit" name="save" class="btn btn-danger pull-right">Save</button>
                                        <?php echo form_close();?>
                                    </div>  
                                </div>
                            </div>
                        </div>