<?php
foreach ($basic_data as $basic_row) {}
if ($ident_data !== false) {
  foreach ($ident_data as $row) {
    $gender = ($row->gender == 1) ? 'Laki-laki': 'Perempuan';
  }
  if ($loc_data !== false) {
    foreach ($loc_data as $location) {}
  }
  if ($pob_data !== false) {
    foreach ($pob_data as $pob) {}
  }
}
?>
            <!-- page content -->
                <div class="dev-page-content">                    
                    <!-- page content container -->
                    <div class="container">
                        
                        <!-- page title -->
                        <div class="page-title">
                            <h1><?php echo $basic_row->fullname;?></h1>
                            <p><?php echo $basic_row->username?></p>
                            
                            <ul class="breadcrumb">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Users Management</a></li>
                                <li><a href="../../">Workers</a></li>
                                <li><?php echo $basic_row->fullname;?></li>
                            </ul>
                        </div>                        
                        <!-- ./page title -->
                        
                        <div class="wrapper">                   
                            <div class="row row-wider">
                                <div class="col-md-3">
                                    <div class="profile margin-bottom-0">
                                        <div class="profile-image">
                                            <?php
                                            if ($ident_data == false || $row->avatar == '') { ?>
                                              <img src="<?php echo base_url().'images/nobody.jpg';?>" alt="">
                                            <?php 
                                            } else { ?>
                                              <img src="<?php echo base_url().'images/profil_photo/'.$row->avatar;?>" alt="">
                                            <?php } ?>
                                        </div>
                                        <div class="profile-info">
                                            <h4><?php echo $basic_row->fullname;?></h4>
                                            <?php
                                            if ($row->avatar) { ?>
                                                <span><a href="../../remove_photo/<?php echo $row->avatar.'/'.$basic_row->id_worker;?>"><i class="fa fa-remove"></i> Remove Avatar</a></span>
                                            <?php }
                                            ?>
                                            <br><span><i class="fa fa-map-marker"></i> <?php echo ($ident_data !== false && $loc_data !== false ) ? $location->city_name.', '.$location->province_name: '-';?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="list-group">
                                        <a href="#" class="list-group-item <?php echo ($this->uri->segment(3) == 'edit') ? 'active': '';?>"><i class="fa fa-wrench"></i> Edit profile</a>
                                        <a href="../../messages/<?php echo $basic_row->id_worker.'/'.$basic_row->username;?>" class="list-group-item <?php echo ($this->uri->segment(3) == 'messages') ? 'active': '';?>"><i class="fa fa-envelope-o"></i> Messages</a>
                                        <a href="../../deleting/<?php echo $basic_row->id_worker;?>" class="list-group-item"><i class="fa fa-remove"></i> Delete User</a>                           
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <?php
                                    echo form_open_multipart('adm/workers/editing/'.$basic_row->id_worker);
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
                                            <div class="col-md-3">
                                                <div class="form-group form-group-custom">
                                                    <label>Login/username</label>
                                                    <input name="" disabled type="text" class="form-control" value="<?php echo $basic_row->username;?>"/>                                            
                                                </div>                        
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-group-custom">
                                                    <label>Change username</label>
                                                    <input name="username" type="text" class="form-control" value=""/>                                            
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
                                                    <label>Confirm Password</label>
                                                    <input type="password" class="form-control" name="confirm_password" value=""/>                                            
                                                </div>                        
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group form-group-custom">
                                                    <label>Email Address</label>
                                                    <input name="" disabled type="text" class="form-control" value="<?php echo $basic_row->email;?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-group-custom">
                                                    <label>Change Email</label>
                                                    <input name="email" type="email" class="form-control" value=""/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-group-custom">
                                                    <label>ID Number</label>
                                                    <input disabled type="text" class="form-control" value="<?php echo $basic_row->id_worker;?>"/>
                                                    <input type="hidden" value="<?php echo $basic_row->id_worker;?>" name="id"/>
                                                    <input type="hidden" value="<?php echo $basic_row->username;?>" name="origin_username"/>
                                                    <input type="hidden" name="uri" value="<?php echo $this->uri->uri_string();?>"></input>
                                                </div>
                                            </div>
                                        </div>                                                              
                                    </div>
                                    
                                    
                                    <div class="page-subtitle margin-bottom-0">
                                        <h3>Personal information</h3>
                                    </div>
                                    <div class="form-group-one-unit margin-bottom-40">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-group-custom">
                                                    <label>Full Name</label>
                                                    <input type="text" class="form-control" name="fullname" value="<?php echo $basic_row->fullname;?>"/>                                            
                                                </div>                        
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-group-custom">
                                                    <label>Nick Name</label>
                                                    <input type="text" class="form-control" name="nickname" value="<?php echo ($ident_data !== false) ? $row->nickname: ''; ?>"/>                                            
                                                </div>                        
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-group-custom">
                                                    <label>Telp Number</label>
                                                    <input type="text" class="form-control" name="telp_number" value="<?php echo ($ident_data !== false) ? $row->telp_number: ''; ?>"/>                                            
                                                </div>                        
                                            </div>
                                        </div>
                                        <div class="row">                                            
                                            <div class="col-md-3">
                                                <div class="form-group form-group-custom">
                                                    <label>Birthday date</label>
                                                    <input type="date" class="form-control datetimepicker" name="dob" value="<?php echo ($ident_data !== false) ? $row->dob: ''; ?>"/>                                            
                                                </div>                        
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-group-custom">
                                                    <label>Birthday place</label>
                                                    <select name="pob" class="form-control">
                                                       <option>Pilih Kota Kelahiran</option>
                                                        <?php
                                                      foreach ($prov_data as $prov) { //PROVINCE LOOPING
                                                        $cur_id = $prov->id_province;
                                                        $cities = $this->Location->get_cities($cur_id); ?>
                                                        <optgroup label="<?php echo $prov->province_name; ?>"> 
                                                        <?php
                                                        foreach ($cities as $city) { ?> //CITY IN CURRENT PROVINCE LOOPING 
                                                          <option <?php echo ($ident_data !== false &&  $row->pob == $city->id_city) ? 'selected="selected"': '';?> value="<?php echo $city->id_city; ?>"><?php echo $city->city_name;?></option>   
                                                        <?php }
                                                        ?>
                                                        </optgroup>
                                                        <?php } 
                                                        ?>
                                                     </select>
                                                </div>                        
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-group-custom">
                                                    <label>Gender</label>
                                                    <select name="gender" class="form-control">
                                                        <option <?php echo ($ident_data !== false && $row->gender == '1') ? 'selected="selected"': '';?> value="1">Laki-laki</option>    
                                                        <option <?php echo ($ident_data !== false && $row->gender == '2') ? 'selected="selected"': '';?> value="2">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-group-custom">
                                                    <label>Domisili</label>
                                                    <select name="domicile" class="form-control">
                                                     <option>Pilih Kota Domisili</option>
                                                        <?php
                                                        foreach ($prov_data as $prov) { //PROVINCE LOOPING
                                                            $cur_id = $prov->id_province;
                                                            $cities = $this->Location->get_cities($cur_id); ?>
                                                            <optgroup label="<?php echo $prov->province_name; ?>"> 
                                                            <?php
                                                            foreach ($cities as $city) { ?> //CITY IN CURRENT PROVINCE LOOPING 
                                                                <option <?php echo ($ident_data !== false &&  $row->domicile == $city->id_city) ? 'selected="selected"': '';?> value="<?php echo $city->id_city; ?>"><?php echo $city->city_name;?></option>       
                                                            <?php }
                                                            ?>
                                                            </optgroup>
                                                        <?php } 
                                                        ?>
                                                   </select>
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group form-group-custom">
                                                    <label>Address</label>
                                                    <textarea name="address" class="form-control"><?php echo ($ident_data !== false ) ?$row->address: '';?></textarea> 
                                                </div>                        
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-group-custom">
                                                    <label>About</label>
                                                    <textarea name="about" class="form-control"><?php echo ($row->about !== '') ?$row->about: '';?></textarea> 
                                                </div>                        
                                            </div>
                                            <div class="col-md-4">
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

                                    <div class="page-subtitle margin-bottom-0">
                                        <h3>Lowongan dan Review <span class="badge badge-info"><?php echo $job_count;?></span> </h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <?php
                                        if ($job_data == false) { ?>
                                            <div class="col-sm-12" style="margin-bottom:20px;">
                                              <label class="label label-danger">Belum ada lowongan yang pernah didaftar.</label>
                                            </div>
                                        <?php } else { 
                                            foreach ($job_data as $job) { ?>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"><a href="../../../lokers/edit/<?php echo $job->id_post.'/'.$job->post_title; ?>"><?php echo $job->post_title;?></a></h3>
                                                </div>
                                                <div class="panel-body" style="line-height: 20px;">
                                                    <div class="col-md-6">
                                                        <b>Tanggal review dan rating:</b> <?php echo ($job->review_date) ? date('j M Y', strtotime($job->review_date)) : 'Belum dirating';?></i><br>
                                                        <i><b>Rating</b> <?php echo $job->stars;?><br>
                                                        <b>Review:</b><br> <?php echo($job->review) ? '"'.$job->review.'"' : '-'?>
                                                    </div>
                                                    <div class="col-md-6">  
                                                        <i><b>Tanggal melamar:</b> <?php echo date('j M Y', strtotime($job->hire_date));?></label><br>
                                                        <b>Status:</b> <?php echo $job->status;?><br>
                                                        <b>Gaji yang ditawarkan:</b> IDR <?php setlocale(LC_MONETARY, 'id_ID'); echo number_format($job->salary) ;?></i>
                                                    </div>
                                                    <div class="col-md-5" style="margin-top: 30px;">
                                                        <!-- <?php
                                                        if ($job->store) { ?>
                                                            <label class="label label-success">2,5% sudah disetor</label>      
                                                        <?php } else {
                                                        ?>
                                                        <a href="../../store/<?php echo $job->id_hired;?>"><i class="fa fa-check"></i>Tandai sudah menyetor 2,5% penghasilan</a>
                                                        <?php } ?> -->
                                                    </div>
                                                </div>                                        
                                            </div>
                                            <?php } } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>