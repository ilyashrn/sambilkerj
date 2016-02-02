<?php
foreach ($basic_data as $basic_row) {}
if ($ident_data !== false) {
  foreach ($ident_data as $row) {}
  if ($loc_data !== false) {
    foreach ($loc_data as $location) {}
  }
}
?>
<div id="page-content">
  <div class="container">
    <div class="row">
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
        if ($not_logged !== true) { ?>
          <div class="social-media">
            <a href="<?php echo base_url().'index.php/Members/edit_c/I/'.$username;?>" style="font-size:14px;"><i class="mt-icon-picture"></i> Ganti foto profil</a><br>
          </div><!-- social-media -->
        <?php }
        ?>
				</div><!-- about-me-image -->
          <div class="service-box style-3 profil-information default hover-to-2" style="padding-top: 0; padding-bottom: 20px;">
            <h6>Informasi Kontak</h6>  
              <div class="service-box-content">
                <div class="point-detail profil-point">
                  <i class="mt-icon-map-marker2"></i> <?php echo ($ident_data !== false && $loc_data !== false ) ? $row->address.'<br>'.$location->city_name.', '.$location->province_name: '-';?><br>
                  <i class="mt-icon-phone1"></i> <?php echo ($ident_data !== false) ? $row->telp_number: '-';?><br>
                  <i class="mt-icon-at-sign"></i> <?php echo $basic_row->email; ?> <br>
                  <i class="mt-icon-at-sign"></i> <?php echo $basic_row->secondary_email; ?> <br>
                </div>
					   </div><!-- services-boxes-content -->
             <?php
             if ($not_logged !== true) { ?>
                <a href="<?php echo base_url().'index.php/Members/edit_c/I/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-edit"></i> Ubah informasi</a><br>
             <?php } ?>
				</div><!-- services-boxes -->
			</div><!-- about-me -->
		</div><!-- col -->

    <?php foreach ($basic_data as $basic_row) {} ?>
        <div class="col-md-8 hover-to">
          <div class="job-box service-box style-3 default" style="padding:20px; margin-bottom:10px;">
            <h6 style="">
              <a href="#" class="worker-name"><?php echo $basic_row->company_name; ?></a>
              <?php
              if ($not_logged !== true) { ?>
                <a href="<?php echo base_url().'index.php/Members/edit_w/PA/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-edit"></i> Ubah nama/username</a>  
              <?php } ?>
              <br>
              <span class="subtitle-job"><?php echo $basic_row->username; ?><br></span> 
            </h6>

            <div class="service-box-content">
              <div class="row">
                <?php
                if ($ident_data == false && $not_logged == false) { ?>
                <div class="col-sm-12 profil-alert">
                  <div class="text-box">
                    <p>Maaf! sepertinya anda baru terdaftar. Silahkan lengkapi informasi diri anda sekarang juga <a href="<?php echo "edit_w/I/".$basic_row->username; ?>">disini.</a></p>
                  </div><!-- text-box -->
                </div><!-- col -->  
                <?php
                } elseif ($ident_data == false && $not_logged == true) { ?>
                <div class="col-sm-12 profil-alert">
                  <div class="text-box">
                    <p>Maaf! sepertinya perusahaah ini baru terdaftar, tidak ada informasi yang bisa ditampilkan.</p>
                  </div><!-- text-box -->
                </div><!-- col -->  
                <?php 
                } else {
                  foreach ($ident_data as $ident_row) {}
                ?>
                <div class="col-sm-12">
                  <span class="profil-span"><b>Kepemiikan akun</b></span> 
                  <p><?php echo ($ident_row->ownership !== '') ? $ident_row->ownership: '-';?></p>
                  <span class="profil-span"><b>Tentang Perusahaan</b></span> <a href="<?php echo base_url().'index.php/Members/edit_w/I/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-edit"></i> Ubah tentang saya</a><br>  
                  <p><?php echo ($ident_row->about !== '') ? $ident_row->about: '-';?></p>
                  <span class="profil-span"><b>Nomor Pokok Wajib Pajak</b></span> 
                  <p><?php echo ($ident_row->about !== '') ? $ident_row->npwp: '-';?></p>
                  <span class="profil-span"><b>Bentuk Usaha</b></span> 
                  <p><?php echo ($ident_row->businsess_form !== '') ? $ident_row->businsess_form: '-';?></p>
                  <span class="profil-span"><b>Bidang Kegiatan</b></span> 
                  <p><?php echo ($ident_row->bidang !== '') ? $ident_row->bidang: '-';?></p>
                </div>
                <?php
                }
                ?>
              </div>
                <div class="row">
                  <div class="col-sm-6 pull-right profil-log">
                  bergabung pada <?php echo date('j M Y', strtotime($basic_row->created_time)) ;?><br>
                  terakhir login pada <?php echo date('j M Y', strtotime($basic_row->last_login)) ;?>
                  </div>  
                </div>
              </div>
            </div><!-- services-boxes-content -->
          </div><!-- services-boxes -->
        </div>
        </div>
      </div>
      </div>