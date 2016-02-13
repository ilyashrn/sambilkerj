    <!-- page content -->
        <div class="dev-page-content">                    
            <!-- page content container -->
            <div class="container">
                <!-- Custom Form Layout -->
                        <div class="page-title">
                            <h1>Edit User for <?php foreach ($user_data as $user) {}; echo $user->fullname;?></h1>
                            <p>Input the user data you want to update.</p>

                            <ul class="breadcrumb">
                                <li><a href="dashboard">Dashboard</a></li>
                                <li><a href="">Users</a></li>
                                <li><a href="">Users edit</a></li>
                            </ul>
                        </div>
                        <div class="wrapper wrapper-white">
                            <div class="form-group-one-unit">
                                <?php
                                echo form_open('users/editing');
                                ?>
                                <div class="row">
                                    <div class="col-md-12">                        
                                        <div class="form-group form-group-custom form-control-clear">
                                            <label>Fullname <span>type text</span></label>
                                            <input type="text" class="form-control" placeholder="Full Name" name="fullname"/ value="<?php echo $user->fullname;?>">
                                            <span class="help-block">Fill with the new user's fullname</span>
                                        </div>                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-group-custom form-control-clear">
                                            <label>Username <span>type text or/with numbers</span></label>
                                            <input type="text" class="form-control" placeholder="username" name="username" value="<?php echo $user->username;?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group form-group-custom">                                
                                            <label>Previlege <span>option</span></label>
                                            <div class="radio">
                                                <input <?php echo ($user->previlege == '1') ? 'checked="checked"' : '' ;?>type="radio" id="radio20" name="previlege" value="1"/>
                                                <label for="radio20">Superadministrator</label>
                                                <input <?php echo ($user->previlege == '2') ? 'checked="checked"' : '' ;?> type="radio" id="radio20" name="previlege" value="2"/>
                                                <label for="radio20">administrator</label>
                                            </div>
                                            <span class="help-block">Select user's previlege</span>
                                        </div>
                                    </div>
                                </div>                           
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input name="id" type="hidden" value="<?php echo $user->id_user;?>">
                                        <button type="submit" class="btn btn-default">Renew the user</button>
                                        <?php echo form_close();?>
                                    </div>  
                                </div>    

                                <div class="page-subtitle">
                                    <h3>Change Password</h3>
                                    <p>You can change or reset your password here.</p>
                                </div>
                                <div class="col-md-6">
                                <?php echo form_open('users/renew_pass');?>
                                    <div class="form-group">
                                        <label>Old Password</label>                                         
                                        <input type="password" class="form-control" name="old"/>                                    
                                    </div>             
                                    <div class="form-group">
                                        <label>New Password</label>                                         
                                        <input type="password" class="form-control" name="new"/>                                    
                                    </div>             
                                    <div class="form-group">
                                        <label>Confirm new password</label>                                         
                                        <input type="password" class="form-control" name="new_2"/>                                    
                                    </div>         
                                    <div class="form-group">
                                        <input name="username" type="hidden" value="<?php echo $user->username;?>">
                                        <input name="id" type="hidden" value="<?php echo $user->id_user;?>">
                                        <button type="submit" class="btn btn-default">Renew password</button>
                                        <?php echo form_close();?>
                                    </div>      
                                </div>
                            </div>
                        </div>
                        <!-- ./Custom Form Layout -->
