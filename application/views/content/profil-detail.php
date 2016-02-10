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
<div id="page-content">
  <div class="container">
    <div class="row">
    <div class="col-sm-12 profil-alert">
      <div class="text-box">
        <p>Halo, <span class="text-default"><?php echo $fullname; ?></span>! Silahkan melengkapi informasi diri anda, buat profil diri yang menarik untuk menarik para pencari kerja! :)</p>
      </div><!-- text-box -->
    </div><!-- col -->  
		<div class="col-sm-4">
			<div class="about-me">
				<div class="about-me-image">
        <?php
        if ($ident_data == false || $row->avatar == '') { ?>
          <img src="<?php echo base_url().'images/nobody.jpg';?>" alt="">
        <?php 
        } else { ?>
          <img src="<?php echo base_url().'images/profil_photo/'.$row->avatar;?>" alt="">
        <?php }
        ?>
					<div class="social-media">
            <a href="<?php echo base_url().'Members/edit_w/I/'.$username;?>" style="font-size:14px;"><i class="mt-icon-picture"></i> Ganti foto profil</a><br>
					</div><!-- social-media -->
				</div><!-- about-me-image -->
          <div class="service-box style-3 profil-information default hover-to-2" style="padding-top: 0; padding-bottom: 20px;">
            <h6>Informasi Singkat</h6>  
              <div class="service-box-content">
                <div class="point-detail profil-point">
                  <i class="mt-icon-map-marker2"></i> <?php echo ($ident_data !== false && $loc_data !== false ) ? $row->address.'<br>'.$location->city_name.', '.$location->province_name: '-';?><br>
                  <i class="mt-icon-timetable"></i> <?php echo ($ident_data !== false && $pob_data !== false) ? 'Lahir di '.$pob->city_name.', '.date('j M Y', strtotime($row->dob)): '-';?> <br>
                  <i class="glyphicon glyphicon-user"></i> <?php echo ($ident_data !== false) ? $gender: '-';?> <br>
                  <i class="mt-icon-phone1"></i> <?php echo ($ident_data !== false) ? $row->telp_number: '-';?><br>
                  <i class="mt-icon-at-sign"></i> <?php echo $basic_row->email; ?> <br>
                </div>
					   </div><!-- services-boxes-content -->
            <a href="<?php echo base_url().'Members/edit_w/I/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-edit"></i> Ubah informasi</a><br>
				</div><!-- services-boxes -->
			</div><!-- about-me -->
		</div><!-- col -->

    <?php foreach ($basic_data as $basic_row) {} ?>
        <div class="col-md-8 hover-to">
          <div class="job-box service-box style-3 default" style="padding:20px; margin-bottom:10px;">
            <h6 style="">
              <a href="#" class="worker-name"><?php echo ($ident_data !== false) ? $basic_row->fullname.' ('.$row->nickname.')': $basic_row->fullname; ?></a>
              <a href="<?php echo base_url().'Members/edit_w/PA/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-edit"></i> Ubah nama/username</a>
              <br>
              <span class="subtitle-job"><?php echo $basic_row->username; ?><br></span> 
            </h6>

            <div class="service-box-content">
              <div class="row">
                <?php
                if ($ident_data == false) { ?>
                
                <div class="col-sm-12 profil-alert">
                  <div class="text-box">
                    <p>Maaf! sepertinya anda baru terdaftar. Silahkan lengkapi informasi diri anda sekarang juga <a href="<?php echo "edit_w/I/".$basic_row->username; ?>">disini.</a></p>
                  </div><!-- text-box -->
                </div><!-- col -->  
                <?php
                } else {
                  foreach ($ident_data as $ident_row) {}
                ?>
                <div class="col-sm-12">
                  <span class="profil-span"><b>Sedikit tentang saya</b></span> <a href="<?php echo base_url().'Members/edit_w/I/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-edit"></i> Ubah tentang saya</a><br>  
                  <p><?php echo ($ident_row->about !== '') ? $ident_row->about: '-';?></p>
                </div>
                <?php
                }
                ?>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <span class="profil-span"><b>Riwayat Pendidikan</b></span> 
                  <a href="<?php echo base_url().'Members/edit_w/PP/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-plus"></i> Tambahkan/Kurangi Riwayat</a><br>  
                  <?php
                    if ($edu_data == false) {
                      echo '-'; }
                    else { 
                      foreach ($edu_data as $edu) { ?>
                        <div class="edu-div col-md-5">
                          <h4><?php echo $edu->school_name; ?></h4>
                          <h5><?php echo $edu->mayor_name; ?></h5>
                          <h6><?php echo $edu->year_in.' - '.$edu->year_out; ?></h6>
                        </div>
                      <?php } } ?>
                </div>
                <div class="col-sm-12">
                  <span class="profil-span"><b>Riwayat Pekerjaan</b></span> <br>
                  <?php
                    if ($exp_data == false) {
                      echo '-'; }
                    else { 
                      foreach ($exp_data as $exp) { ?>
                        <div class="edu-div col-md-5">
                          <h4><?php echo $exp->company; ?></h4>
                          <h5><?php echo $exp->position; ?></h5>
                          <h6><?php echo $exp->year_in.' - '.$exp->year_out; ?></h6>
                        </div>
                      <?php } } ?>
                </div>
                <div class="col-sm-12">
                  <span class="profil-span"><b>Riwayat Pelatihan</b></span> <br>
                  <?php
                    if ($train_data == false) {
                      echo '-'; }
                    else { 
                      foreach ($train_data as $train) { ?>
                        <div class="edu-div col-md-5">
                          <h4><?php echo $train->course_name.' ('.$train->year.')'; ?></h4>
                          <h5><?php echo 'Penyelenggara: '.$train->institution; ?></h5>
                        </div>
                      <?php } } ?>
                </div>
                <div class="col-sm-12">
                  <span class="profil-span"><b>Riwayat Prestasi</b></span> <br>
                  <?php
                    if ($ach_data == false) {
                      echo '-'; }
                    else { 
                      foreach ($train_data as $train) { ?>
                        <div class="edu-div col-md-5">
                          <h4><?php echo $ach->course_name.' ('.$ach->year.')'; ?></h4>
                          <h5><?php echo 'Dianugerahkan oleh: '.$ach->institution; ?></h5>
                        </div>
                      <?php } } ?>
                </div>
                <div class="col-sm-12">
                  <span class="profil-span"><b>Keahlian yang dimiliki</b></span>
                  <a href="<?php echo base_url().'Members/edit_w/KB/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-plus"></i> Tambahkan Keahlian</a><br>  
                  <div class="widget-tags required-skills">
                    <?php if ($skill_data == false) { ?>
                      <p>-</p>
                    <?php } else {
                      foreach ($skill_data as $skill) { ?>
                      <a href="#"><?php echo $skill->skill_name;?></a>
                    <?php } } ?>
                  </div>
                  <span class="profil-span"><b>Bahasa yang dikuasai</b></span> 
                  <a href="<?php echo base_url().'Members/edit_w/KB/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-plus"></i> Tambahkan Bahasa</a><br>  
                  <div class="widget-tags learned-languages">
                      <?php if ($lang_data == false) { ?>
                      <p>-</p>
                    <?php } else {
                      foreach ($lang_data as $lang) { ?>
                      <a href="#"><?php echo $lang->language_name;?></a>
                    <?php } } ?>
                  </div>
                </div>
              </div>
              <div class="row">
                  <div class="col-sm-6 profil-log left">
                    bergabung pada <?php echo date('j M Y', strtotime($basic_row->created_time)) ;?>  
                  </div>
                  <div class="col-sm-6 pull-right profil-log">
                  terakhir login pada <?php echo date('j M Y', strtotime($basic_row->last_login)) ;?>
                  </div>  
                </div>
            </div><!-- services-boxes-content -->
          </div><!-- services-boxes -->
        </div>
        </div>

        <div class="row">
          <div class="col-sm-12">    
            <div class="horizontal-tabs">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab-1-1" data-toggle="tab">Lowongan yang diambil</a></li>
                <li><a href="#tab-1-2" data-toggle="tab">Review oleh perusahaan</a></li>
              </ul>                                            
               <div class="tab-content" style="margin-top:0;">
                <div class="tab-pane fade in active " id="tab-1-1">
                  <div class="col-sm-12 service-box style-3 default"> 
                <?php
                if ($job_data == false) {
                  echo 'Belum ada lowongan yang pernah didaftar.';
                } else { 
                    foreach ($job_data as $job) { ?>
                    <div class="col-sm-12 job-profil-box service-box style-3 default" style="padding:10px;margin-bottom:10px;">
                      <div class="col-sm-2 post-owner">
                        <img src="<?php echo base_url().'images/profil_photo/'.$job->avatar?>" style="width:100%;">
                      </div>
                      <span><a href="../Jobs/detail/<?php echo $job->id_post;?>"><strong><?php echo $job->post_title;?></strong></a></span>
                      <span class="small-span"><?php echo $job->created_time;?></span><br>
                      <div class="col-sm-7 i-div">  
                        <i class="mt-icon-timetable"></i> <b>Tanggal melamar:</b> <label class="label label-primary"><?php echo date('j M Y', strtotime($job->hire_date));?></label>
                        <i class="glyphicon glyphicon-user"></i> <b>Status:</b> <label class="label label-warning">Waiting company confirmation</label><br>
                        <i class="mt-icon-money"></i> <b>Gaji yang ditawarkan:</b> <label class="label label-primary">IDR <?php setlocale(LC_MONETARY, 'id_ID'); echo number_format($job->salary) ;?></label>
                      </div>
                      <div class="col-sm-3 pull-right">
                        <?php
                        if ($not_logged !== true) { ?>
                            <a style="font-size:12px;" href="../Jobs/removing/<?php echo $job->id_post;?>" class="btn btn-default">Batalkan lowongan ini</a>
                        <?php } else { ?>
                            <button id="daftar" class="btn btn-orange" data-container="body" data-placement="bottom" data-trigger="focus" data-toggle="popover" data-content="Login atau daftarkan diri anda terlebih dahulu untuk mendaftar lowongan!">Daftar!</button>
                        <?php  } ?>
                      </div>
                    </div>
                <?php } }
                ?>
                  </div>
                </div><!-- tab-pane -->
                <div class="tab-pane fade" id="tab-1-2">
                  <h3><strong>Quisque eu tortor sed.</strong></h3>
                  <p>Quisque dapibus, purus non congue pulvinar, odio nulla sodales tortor, fringilla faucibus risus massa nec nulla. Phasellus tempus erat elit vitae metus sed.</p>
                </div><!-- tab-pane -->
              </div><!-- tab-content -->
            </div><!-- horizontal-tabs -->
          </div><!-- col -->
        </div>
      </div>
      </div>