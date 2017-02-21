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
                                            <span><i class="fa fa-map-marker"></i> <?php echo ($ident_data !== false && $loc_data !== false ) ? $location->city_name.', '.$location->province_name: '-';?></span>
                                        </div>
                                    </div>
                                    
                                    <div class="list-group">
                                        <a href="../../edit/<?php echo $basic_row->id_worker.'/'.$basic_row->username;?>" class="list-group-item <?php echo ($this->uri->segment(3) == 'edit') ? 'active': '';?>"><i class="fa fa-wrench"></i> Edit profile</a>
                                        <a href="#" class="list-group-item <?php echo ($this->uri->segment(3) == 'messages') ? 'active': '';?>"><i class="fa fa-envelope-o"></i> Messages</a>
                                        <a href="../../deleting/<?php echo $basic_row->id_worker;?>" class="list-group-item"><i class="fa fa-remove"></i> Delete User</a>                           
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="page-subtitle margin-bottom-0">
                                        <h3>Inbox <span class="badge badge-info"></span> </h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <?php
                                        if ($messages == false) { ?>
                                            <div class="col-sm-12" style="margin-bottom:20px;">
                                              <label class="label label-danger">Tidak ada pesan masuk.</label>
                                            </div>
                                        <?php } else { 
                                            foreach ($messages as $mes) { ?>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">From: 
                                                      <?php echo $mes->company_name;?>
                                                      (<?php echo $mes->timestamp; ?>)
                                                      </h3>
                                                </div>
                                                <div class="panel-body" style="line-height: 20px;">
                                                    <div class="col-md-12">
                                                        <p><?php echo $mes->message_content; ?></p>
                                                    </div>
                                                    <div class="col-md-5" style="margin-top: 30px;">
                                                        <a href=""><i class="fa fa-remove"></i>Hapus</a>
                                                    </div>
                                                </div>                                        
                                            </div>
                                            <?php } } ?>
                                        </div>
                                    </div>
                                    <div class="page-subtitle margin-bottom-0">
                                        <h3>Sent Messages <span class="badge badge-info"></span> </h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <?php
                                        if ($replies == false) { ?>
                                            <div class="col-sm-12" style="margin-bottom:20px;">
                                              <label class="label label-danger">Tidak ada pesan masuk.</label>
                                            </div>
                                        <?php } else { 
                                            foreach ($replies as $mes) { ?>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">To: 
                                                      <?php echo $mes->company_name;?>
                                                      (<?php echo $mes->timestamp; ?>)
                                                      </h3>
                                                </div>
                                                <div class="panel-body" style="line-height: 20px;">
                                                    <div class="col-md-12">
                                                        <p><?php echo $mes->message_content; ?></p>
                                                    </div>
                                                    <div class="col-md-5" style="margin-top: 30px;">
                                                        <a href=""><i class="fa fa-remove"></i>Hapus</a>
                                                    </div>
                                                </div>                                        
                                            </div>
                                            <?php } } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>