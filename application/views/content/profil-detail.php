<?php
foreach ($basic_data as $basic_row) {}
if ($ident_data !== false) {
  foreach ($ident_data as $row) {
    $gender = ($row->gender == 1) ? 'Laki-laki': 'Perempuan';
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
        if ($row->avatar == '') { ?>
          <img src="<?php echo base_url().'images/nobody.jpg';?>" alt="">
        <?php 
        } else { ?>
          <img src="<?php echo base_url().'images/profil_photo/'.$row->avatar;?>" alt="">
        <?php }
        ?>
					<div class="social-media">
            <a href="<?php echo base_url().'index.php/Members/edit_w/I/'.$username;?>" style="font-size:14px;"><i class="mt-icon-picture"></i> Ganti foto profil</a><br>
					</div><!-- social-media -->
				</div><!-- about-me-image -->
          <div class="service-box style-3 profil-information default hover-to-2" style="padding-top: 0; padding-bottom: 20px;">
            <h6>Informasi Singkat</h6>  
              <div class="service-box-content">
                <div class="point-detail profil-point">
                  <i class="mt-icon-map-marker2"></i> Bekasi, Jawa Barat<br>
                  <i class="mt-icon-timetable"></i> <?php echo ($ident_data !== false) ? 'Lahir pada '.date('j M Y', strtotime($row->dob)): '-';?> <br>
                  <i class="glyphicon glyphicon-user"></i> <?php echo ($ident_data !== false) ? $gender: '-';?> <br>
                  <i class="mt-icon-phone1"></i> <?php echo ($ident_data !== false) ? $row->telp_number: '-';?><br>
                  <i class="mt-icon-at-sign"></i> <?php echo $basic_row->email; ?> <br>
                </div>
					   </div><!-- services-boxes-content -->
            <a href="<?php echo base_url().'index.php/Members/edit_w/I/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-edit"></i> Ubah informasi</a><br>
				</div><!-- services-boxes -->
			</div><!-- about-me -->
		</div><!-- col -->

    <?php
    foreach ($basic_data as $basic_row) {
    }
    // foreach ($ident_data as $ident_row) {
    // }
    ?>
        <div class="col-md-8 hover-to">
          <div class="job-box service-box style-3 default" style="padding:20px; margin-bottom:10px;">
            <h6 style="">
              <a href="#" class="worker-name"><?php echo $basic_row->fullname; ?></a>
              <a href="<?php echo base_url().'index.php/Members/edit_w/PA/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-edit"></i> Ubah nama/username</a>
              <br>
              <span class="subtitle-job"><?php echo $basic_row->username; ?><br></span> 
            </h6>

            <div class="service-box-content">
              <div class="row">
                <?php
                if ($ident_data == false) { ?>
                
                <div class="col-sm-12 profil-alert">
                  <div class="text-box">
                    <p>Maaf! sepertinya anda belum melengkapi profil anda. Silahkan lengkapi sekarang juga <a href="<?php echo "edit_w/I/".$basic_row->username; ?>">disini.</a></p>
                  </div><!-- text-box -->
                </div><!-- col -->  
                <?php
                } else {
                  foreach ($ident_data as $ident_row) {}
                ?>
                <div class="col-sm-12">
                  <span class="profil-span"><b>Sedikit tentang saya</b></span> <a href="<?php echo base_url().'index.php/Members/edit_w/I/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-edit"></i> Ubah tentang saya</a><br>  
                  <p><?php echo ($ident_row->about !== '') ? $ident_row->about: '-';?></p>
                </div>
                <?php
                }
                ?>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <span class="profil-span"><b>Riwayat Pendidikan</b></span> 
                  <a href="<?php echo base_url().'index.php/Members/edit_w/PP/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-plus"></i> Tambahkan Pendidikan</a><br>  
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
                  <span class="profil-span"><b>Pengalaman Kerja</b></span> 
                  <a href="<?php echo base_url().'index.php/Members/edit_w/PP/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-plus"></i> Ubah/Kurangi/Tambah Pengalaman Kerja</a><br>  
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
                  <span class="profil-span"><b>Riwayat Pelatihan</b></span> 
                  <a href="<?php echo base_url().'index.php/Members/edit_w/PP/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-plus"></i> Ubah/Kurangi/Tambah Pengalaman Kerja</a><br>  
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
                  <span class="profil-span"><b>Keahlian yang dimiliki</b></span> 
                  <a href="<?php echo base_url().'index.php/Members/edit_w/KB/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-plus"></i> Ubah/Kurangi/Tambah keahlian</a><br>  
                  <div class="widget-tags required-skills">
                    <?php if ($skill_data == false) { ?>
                      <p>-</p>
                    <?php } else {
                      foreach ($skill_data as $skill) { ?>
                      <a href="#"><?php echo $skill->skill_name;?></a>
                    <?php } } ?>
                  </div>
                  <span class="profil-span"><b>Bahasa yang dikuasai</b></span> 
                  <a href="<?php echo base_url().'index.php/Members/edit_w/KB/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-plus"></i> Ubah/Kurangi/Tambah Bahasa</a>
                  <div class="widget-tags learned-languages">
                      <?php if ($lang_data == false) { ?>
                      <p>-</p>
                    <?php } else {
                      foreach ($lang_data as $lang) { ?>
                      <a href="#"><?php echo $lang->language_name;?></a>
                    <?php } } ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 pull-right profil-log">
                  bergabung pada <?php echo date('j M Y', strtotime($basic_row->created_time)) ;?><br>
                  terakhir login pada 6 Januari 2015
                  </div>  
                </div>
              </div>
            </div><!-- services-boxes-content -->
          </div><!-- services-boxes -->
        </div>
        </div>
      </div>
