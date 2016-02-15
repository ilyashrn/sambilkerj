    <!-- page content -->
        <div class="dev-page-content">                    
            <!-- page content container -->
            <div class="container">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title">
                            <h1>Companies</h1>
                            <p>Users Management</p>
                            
                            <ul class="breadcrumb">
                                <li><a href="dashboard">Dashboard</a></li>
                                <li><a href="">Users Management</a></li>
                                <li><a href="">Companies</a></li>
                            </ul>
                        </div>                        
                        <!-- ./page title -->
                        
                        <!-- datatables plugin -->
                        <div class="wrapper wrapper-white">
                            <div class="page-subtitle">
                                <h3>Companies Table</h3>
                            </div>
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
                            <?php    } ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sortable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Company Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Jobs Opened</th>
                                            <th>Last login</th>
                                            <th>Signup date</th>
                                            
                                        </tr>
                                    </thead>                               
                                    <tbody>
                                        <?php
                                        if ($users_data !== false) {
                                        foreach ($users_data as $user) { ?>
                                        <tr>
                                            <td><?php echo $user->id_company;?></td>
                                            <td><a href="<?php echo base_url()?>adm/companies/edit/<?php echo $user->id_company.'/'.$user->username?>"><?php echo $user->company_name;?></a></td>
                                            <td><?php echo $user->username;?></td>
                                            <td><?php echo $user->email;?></td>
                                            <td><?php echo $this->Job->get_per_comp_count($user->id_company)?></td>
                                            <td><?php echo ($user->last_login!== '0000-00-00 00:00:00') ? $user->last_login : 'Never login';?></td>
                                            <td><?php echo $user->created_time;?></td>
                                        </tr>
                                        <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>                        
                        <!-- ./datatables plugin -->

                        <!-- Custom Form Layout -->
                        <div class="page-title">
                            <h1>New Company Regristration</h1>
                            <p>Input the user company data you want.</p>
                        </div>
                        <div class="wrapper wrapper-white">
                            <?php
                            $attributes = array('class' =>'form-horizontal', 'data-toggle' => 'validator');
                            echo form_open('adm/companies/inserting', $attributes);
                            ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="fullname">Nama Perusahaan</label>
                                      <input type="text" class="form-control" id="fullname" name="company_name" placeholder="Nama Lengkap" required="required">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="required">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="email">E-mail</label>
                                      <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required="required" data-error="Bruh, that email address is invalid">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="inputPassword3">Password</label>
                                      <input type="password" data-minlength="6" class="form-control" id="inputPassword" name="password" placeholder="Password" required="required" style="margin-bottom:10px;">
                                      <span class="help-block">Minimum of 6 characters</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputPassword4">Confirm Password</label>
                                        <input type="password" class="form-control" id="matchPassword" data-match="#inputPassword" data-match-error="Whoops, these don't match" name="confirm_password" placeholder="Confirm Password" required="required" style="margin-bottom:10px;">
                                        <span class="help-block">Typed password should matches</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button name="ins_comp" type="submit" class="btn btn-default">Regrister new company</button>
                                    </div>
                                </div>
                            </div>
                              <?php
                              echo form_close();
                              ?>
                        </div>
                        <!-- ./Custom Form Layout -->

                    </div>
                </div>