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
                <a href="<?php echo base_url().'index.php/Members/edit_c/PA/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-edit"></i> Ubah nama/username</a>  
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
                    <p>Maaf! sepertinya anda baru terdaftar. Silahkan lengkapi informasi diri anda sekarang juga <a href="<?php echo "edit_c/I/".$basic_row->username; ?>">disini.</a></p>
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
                  <?php
                  if ($not_logged !== true) { ?>
                    <a href="<?php echo base_url().'index.php/Members/edit_c/I/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-edit"></i> Ubah informasi utama</a><br>
                  <?php } ?>
                  <p><?php echo ($ident_row->ownership !== '') ? 'atas nama '.$ident_row->ownership: '-';?></p>
                  <span class="profil-span"><b>Nomor Pokok Wajib Pajak</b></span> 
                  <p><?php echo ($ident_row->about !== '') ? $ident_row->NPWP: '-';?></p>
                  <span class="profil-span"><b>Bentuk Usaha</b></span> 
                  <p><?php echo ($ident_row->business_form !== '') ? $ident_row->business_form: '-';?></p>
                  <span class="profil-span"><b>Bidang Kegiatan</b></span> 
                  <p><?php echo ($ident_row->bidang !== '') ? $ident_row->bidang: '-';?></p>
                  <span class="profil-span"><b>Tentang Perusahaan</b></span>  
                  <p><?php echo ($ident_row->about !== '') ? $ident_row->about: '-';?></p>
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
        </div> <!-- col-md-8 -->
        <div class="row">
          <div class="col-sm-12">    
            <div class="horizontal-tabs">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab-1-1" data-toggle="tab">Lowongan oleh perusahaan</a></li>
                <li><a href="#tab-1-2" data-toggle="tab">Pekerja saat ini</a></li>
              </ul>                                            
               <div class="tab-content" style="margin-top:0;">
                <div class="tab-pane fade in active " id="tab-1-1">
                  <div class="col-sm-12 service-box style-3 default"> 
                <?php
                if ($job_data == false) {
                  echo 'Belum ada lowongan yang dibuat perusahaan.';
                } else { 
                    foreach ($job_data as $job) { ?>
                    <div class="col-sm-10 job-profil-box service-box style-3 default" style="padding:20px;margin-bottom:10px;padding-bottom:10px;">
                      <span><a href="../Jobs/detail/<?php echo $job->id_post;?>"><strong><?php echo $job->post_title;?></strong></a></span>
                      <span class="small-span"><?php echo $job->created_time;?></span><br>
                      <span class="subtitle-job"><?php echo $job->category_name;?><span class="subtitle-job"> > </span><?php echo $job->sub_category_name;?></span><br>
                      <div class="col-sm-9 i-div">
                        <i class="mt-icon-timetable"> <b>Deadline:</b> <?php echo date('j M Y', strtotime($job->deadline));?></i> 
                        <i class="mt-icon-money"> <b>Gaji:</b> IDR <?php setlocale(LC_MONETARY, 'id_ID'); echo number_format($job->salary) ;?></i>
                        <i class="mt-icon-map-marker1"> <b>Domisili:</b> <?php echo $job->city_name.', '.$job->province_name?></i>
                      </div>
                      <div class="col-sm-2 pull-right" style="font-size:12px;">
                        <a href="../Jobs/detail/<?php echo $job->id_post;?>">Baca selengkapnya</a>
                      </div>
                    </div>
                    <div class="col-sm-2 btn-div">
                      <?php
                      if ($not_logged !== true) { ?>
                          <a href="../Jobs/edit_job/<?php echo $job->id_post;?>" class="btn btn-black"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                          <a href="../Jobs/removing/<?php echo $job->id_post;?>" class="btn btn-default"><i class="glyphicon glyphicon-remove"></i> Hapus</a>
                      <?php } else { ?>
                          <a href="../Jobs/edit_job/<?php echo $job->id_post;?>" class="btn btn-green"><i class="glyphicon glyphicon-check"></i> Daftar</a>
                      <?php  } ?>
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
        </div> <!-- row -->
      </div> <!-- container -->
      </div> <!-- page-content -->
