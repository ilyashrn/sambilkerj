<?php
foreach ($basic_data as $basic_row) {}
if ($ident_data !== false) {
  foreach ($ident_data as $row) {}
  if ($loc_data !== false) {
    foreach ($loc_data as $location) {}
  }
}
?>
        <!-- page content -->
                <div class="dev-page-content">                    
                    <!-- page content container -->
                    <div class="container">
                        
                        <!-- page title -->
                        <div class="page-title">
                            <h1><?php echo $basic_row->company_name;?></h1>
                            <p><?php echo $basic_row->username?></p>
                            
                            <ul class="breadcrumb">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Users Management</a></li>
                                <li><a href="../../">Company</a></li>
                                <li><?php echo $basic_row->company_name;?></li>
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
                                            <h4><?php echo $basic_row->company_name;?></h4>
                                            <?php
                                            if ($ident_data && $row->avatar) { ?>
                                                <span><a href="../../remove_photo/<?php echo $basic_row->id_company;?>"><i class="fa fa-remove"></i> Remove Avatar</a></span>
                                            <?php }
                                            ?>
                                            <br><span><i class="fa fa-map-marker"></i> <?php echo ($ident_data !== false && $loc_data !== false ) ? $location->city_name.', '.$location->province_name: '-';?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="list-group">
                                        <a href="#" class="list-group-item active"><i class="fa fa-wrench"></i> Edit profile</a>
                                        <a href="../../messages/<?php echo $basic_row->id_company.'/'.$basic_row->username ?>" class="list-group-item <?php echo ($this->uri->segment(3) == 'messages') ? 'active': '';?>"><i class="fa fa-envelope-o"></i> Messages</a>
                                        <a href="../../deleting/<?php echo $basic_row->id_company;?>" class="list-group-item"><i class="fa fa-remove"></i> Delete User</a>                           
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <?php
                                    echo form_open_multipart('adm/companies/editing');
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
                                                    <input name="password" type="password" name="confirm_password" class="form-control" value=""/>                                            
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
                                            <div class="col-md-4">
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
                                            <div class="col-md-4">
                                                <div class="form-group form-group-custom">
                                                    <label>Secondary Email Address</label>
                                                    <input name="" disabled type="email" class="form-control" value="<?php echo $basic_row->secondary_email;?>"/>
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group form-group-custom">
                                                    <label>Change Secondary Email</label>
                                                    <input name="secondary_email" type="email" class="form-control" value=""/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-group-custom">
                                                    <label>ID Number</label>
                                                    <input disabled type="text" class="form-control" value="<?php echo $basic_row->id_company;?>"/>
                                                    <input type="hidden" value="<?php echo $basic_row->id_company;?>" name="id"/>
                                                    <input type="hidden" value="<?php echo $basic_row->username;?>" name="origin_username"/>
                                                    <input type="hidden" name="uri" value="<?php echo $this->uri->uri_string();?>"></input>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group form-group-custom">
                                                    <label>Ownership</label>
                                                    <input name="ownership" type="text" class="form-control" value="<?php echo $row->ownership;?>"/>
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
                                                    <label>Company Name</label>
                                                    <input type="text" class="form-control" name="company_name" value="<?php echo $basic_row->company_name;?>"/>                                            
                                                </div>                        
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-group-custom">
                                                    <label>NPWP</label>
                                                    <input type="text" class="form-control" name="npwp" value="<?php echo ($ident_data !== false) ? $row->NPWP: ''; ?>"/>                                            
                                                </div>                        
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-group-custom">
                                                    <label>Bentuk Usaha</label>
                                                    <select name="business_form" class="form-control">
                                                         <option <?php echo ($ident_data !== false &&  $row->business_form == 'BUMN') ? 'selected="selected"': '';?> value="BUMN">Badan Usaha Milik Negara</option>
                                                         <option <?php echo ($ident_data !== false &&  $row->business_form == 'PT') ? 'selected="selected"': '';?> value="PT">Perseroan Terbatas</option>
                                                         <option <?php echo ($ident_data !== false &&  $row->business_form == 'CV') ? 'selected="selected"': '';?>value="CV">Commanditaire Vennootschap</option>
                                                         <option <?php echo ($ident_data !== false &&  $row->business_form == 'Firma') ? 'selected="selected"': '';?> value="Firma">Firma</option>
                                                         <option <?php echo ($ident_data !== false &&  $row->business_form == 'Perorangan') ? 'selected="selected"': '';?> value="Perorangan">Perorangan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">                                            
                                            <div class="col-md-4">
                                                <div class="form-group form-group-custom">
                                                    <label>Telp Number</label>
                                                    <input type="text" class="form-control" name="telp_number" value="<?php echo ($ident_data !== false) ? $row->telp_number: ''; ?>"/>                                            
                                                </div>                        
                                            </div>
                                            <div class="col-md-4">
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
                                            <div class="col-md-4">
                                                <div class="form-group form-group-custom">
                                                    <label>Bidang Kegiatan</label>
                                                    <input name="bidang" type="text" class="form-control" value="<?php echo ($ident_data) ? $row->bidang : '';?>"/>
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group form-group-custom">
                                                    <label>Address</label>
                                                    <textarea rows="5" name="address" class="form-control"><?php echo ($ident_data !== false ) ? $row->address: '';?></textarea> 
                                                </div>                        
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-group-custom">
                                                    <label>About</label>
                                                    <textarea rows="5" name="about" class="form-control"><?php echo ($ident_data !== false ) ? $row->about: '';?></textarea> 
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
                                        <h3>Lowongan oleh <?php echo $basic_row->company_name ?> <span class="badge badge-info"><?php echo $job_count;?></span> </h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <?php
                                        if ($job_data == false) { ?>
                                            <div class="col-sm-12" style="margin-bottom:20px;">
                                              <label class="label label-danger">Belum ada lowongan yang pernah dibuka.</label>
                                            </div>
                                        <?php } else { 
                                            foreach ($job_data as $job) {
                                                $app_count = $this->Applier->count_rows('id_job',$job->id_post);
                                             ?>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"><?php echo $job->post_title;?></h3>
                                                </div>
                                                <div class="panel-body" style="line-height: 20px;">
                                                    <div class="col-md-6">
                                                        <i><b>Kategori:</b> <?php echo $job->category_name;?><span class="subtitle-job"> > </span><?php echo $job->sub_category_name;?></span> <br>
                                                        <b>Pendaftar:</b> <?php echo $app_count;?><br>
                                                        <b>Tanggal dibuka:</b> <?php echo $job->created_time;?>
                                                    </div>
                                                    <div class="col-md-6">  
                                                        <i> <b>Deadline:</b> <?php echo date('j M Y', strtotime($job->deadline));?></i><br>
                                                        <i> <b>Gaji:</b> IDR <?php setlocale(LC_MONETARY, 'id_ID'); echo number_format($job->salary) ;?></i><br>
                                                        <i> <b>Domisili:</b> <?php echo $job->city_name.', '.$job->province_name?></i></i>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p><i><b>Deskripsi Kerja: </b><br></i><?php echo $job->description;?></p>
                                                        <i><b>File Pendukung</b> <a href="<?php echo base_url().'files/loker/'.$job->file;?>"> <?php echo $job->file;?></a> (<?php echo $job->file_desc;?>)</i>
                                                    </div>
                                                    <div class="col-md-4 pull-right">
                                                        <a href="../../../lokers/deleting/<?php echo $job->id_post;?>"><i class="fa fa-trash"></i> Hapus Lowongan</a><br>
                                                        <a href="../../../lokers/edit/<?php echo $job->id_post;?>"><i class="fa fa-edit"></i> Edit Lowongan</a>
                                                    </div>
                                                </div>                                        
                                            </div>
                                            <?php } } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>