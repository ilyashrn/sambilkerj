<?php
foreach ($basic_data as $basic_row) {}
if ($ident_data !== false) {
  foreach ($ident_data as $row) {}
  if ($loc_data !== false) {
    foreach ($loc_data as $location) {}
  }
}
?>
<script>
  $(function () {
    $('[data-toggle="popover"]').popover()
  });
  $(function() {
    $("#input-id").rating();
  });
</script>
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
            <a href="<?php echo base_url().'Members/edit_c/I/'.$username;?>" style="font-size:14px;"><i class="mt-icon-picture"></i> Ganti foto profil</a><br>
          </div><!-- social-media -->
        <?php }
        ?>
				</div><!-- about-me-image -->
          <div class="service-box style-3 profil-information default hover-to-2" style="padding-top: 0; padding-bottom: 20px;">
            <h6>Informasi Kontak</h6>  
              <div class="service-box-content">
                <div class="point-detail profil-point">
                  <!-- <i class="mt-icon-map-marker2"></i> --> 
                  <span class="profil-span"><b>Alamat Kantor</b></span><br>
                  <?php echo ($ident_data !== false && $loc_data !== false ) ? $row->address.'<br>'.$location->city_name.', '.$location->province_name: '-';?><br>
                  <!-- <i class="mt-icon-phone1"></i>  -->
                  <span class="profil-span"><b>Nomor Telepon</b></span><br>
                  <?php echo ($ident_data !== false) ? $row->telp_number: '-';?><br>
                  <!-- <i class="mt-icon-at-sign"></i>  -->
                  <span class="profil-span"><b>Alamat Email</b></span><br>
                  <?php echo $basic_row->email; ?> <br>
                  <?php echo $basic_row->secondary_email; ?>
                </div>
					   </div><!-- services-boxes-content -->
             <?php
             if ($not_logged !== true) { ?>
                <a href="<?php echo base_url().'Members/edit_c/I/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-edit"></i> Ubah informasi</a><br>
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
                <a href="<?php echo base_url().'Members/edit_c/PA/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-edit"></i> Ubah nama/username</a>  
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
                <div class="col-sm-6">
                  <span class="profil-span"><b>Kepemilikan Akun</b></span> 
                  <p><?php echo ($ident_row->ownership !== '') ? $ident_row->ownership: '-';?></p>
                  <span class="profil-span"><b>Bidang Kegiatan Perusahaan</b></span> 
                  <p><?php echo ($ident_row->bidang !== '') ? $ident_row->bidang: '-';?></p>
                </div>
                <div class="col-sm-6">
                  <span class="profil-span"><b>Nomor Pokok Wajib Pajak</b></span> 
                  <?php
                  if ($not_logged !== true) { ?>
                    <a href="<?php echo base_url().'Members/edit_c/I/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-edit"></i> Ubah informasi utama</a><br>
                  <?php } ?>
                  <p><?php echo ($ident_row->about !== '') ? $ident_row->NPWP: '-';?></p>
                </div>
                <div class="col-sm-6">
                  <span class="profil-span"><b>Bentuk Usaha</b></span> 
                  <p><?php echo ($ident_row->business_form !== '') ? $ident_row->business_form: '-';?></p>
                </div>
                <div class="col-sm-12">
                  <span class="profil-span"><b>Tentang Perusahaan</b></span>  
                  <p><?php echo ($ident_row->about !== '') ? $ident_row->about: '-';?></p>
                </div>
                <?php
                }
                ?>
              </div>
                <div class="row">
                  <div class="col-sm-6 profil-log left">
                    bergabung pada <?php echo date('j M Y', strtotime($basic_row->created_time)) ;?>
                  </div>
                  <div class="col-sm-6 pull-right profil-log">
                    <?php echo ($basic_row->last_login == '0000-00-00 00:00:00') ? 'Belum pernah login' : 'terakhir login pada '.date('j M Y', strtotime($basic_row->last_login)) ;?>
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
                <li class="active"><a href="#tab-1-1" data-toggle="tab">Lowongan oleh perusahaan <span class="badge"><?php echo $job_count?></span></a></li>
                <li><a href="#tab-1-2" data-toggle="tab">Pekerja dan calon pekerja <span class="badge"><?php echo $app_count?></span></a></li>
              </ul>                                            
               <div class="tab-content" style="margin-top:0;">
                <div class="tab-pane fade in active " id="tab-1-1">
                  <div class="col-sm-12 service-box style-3 default"> 
                <?php
                if ($job_data == false) { ?>
                  <label class="label label-danger">Belum ada lowongan yang pernah dibuka perusahaan.</label>
                <?php } else { 
                    foreach ($job_data as $job) { ?>
                    <div class="col-sm-10 job-profil-box service-box style-3 default" style="padding:20px;margin-bottom:10px;padding-bottom:10px;">
                      <span><a href="../Jobs/detail/<?php echo $job->id_post.'/'.$job->post_title;?>"><strong><?php echo $job->post_title;?></strong></a></span>
                      <span class="small-span"><?php echo $job->created_time;?></span><br>
                      <span class="subtitle-job"><?php echo $job->category_name;?><span class="subtitle-job"> > </span><?php echo $job->sub_category_name;?></span><br>
                      <div class="col-sm-9 i-div">
                        <i class="mt-icon-timetable"> <b>Deadline:</b> <?php echo date('j M Y', strtotime($job->deadline));?></i> 
                        <i class="mt-icon-money"> <b>Gaji:</b> IDR <?php setlocale(LC_MONETARY, 'id_ID'); echo number_format($job->salary) ;?></i>
                        <i class="mt-icon-map-marker1"> <b>Domisili:</b> <?php echo $job->city_name.', '.$job->province_name?></i>
                      </div>
                      <div class="col-sm-2 pull-right" style="font-size:12px;">
                        <a href="../Jobs/detail/<?php echo $job->id_post.'/'.$job->post_title;?>">Baca selengkapnya</a>
                      </div>
                    </div>
                    <div class="col-sm-2 btn-div">
                      <?php
                      if ($not_logged !== true) { ?>
                          <a href="../Jobs/edit_job/<?php echo $job->id_post.'/'.$job->post_title;?>" class="btn btn-black"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                          <a href="../Jobs/removing/<?php echo $job->id_post.'/'.$job->post_title;?>" class="btn btn-default"><i class="glyphicon glyphicon-remove"></i> Hapus</a>
                      <?php } else { ?>
                          <button id="daftar" class="btn btn-orange" data-container="body" data-placement="bottom" data-trigger="focus" data-toggle="popover" data-content="Login atau daftarkan diri anda terlebih dahulu untuk mendaftar lowongan!">Daftar!</button>
                      <?php  } ?>
                    </div>
                <?php } }
                ?>
                  </div>
                </div><!-- tab-pane -->
                <div class="tab-pane fade" id="tab-1-2">
                  <div class="col-sm-12 service-box style-3 default"> 
                    <?php
                    if ($app_data == false) { ?>
                      <label class="label label-danger">Belum ada pekerja yang melamar di perusahaan.</label>
                    <?php } else { 
                        foreach ($app_data as $job) { ?>
                        <div class="hover-to col-sm-12 job-profil-box service-box style-3 default" style="padding:20px;margin-bottom:10px;padding-bottom:10px;">
                          <div class="col-sm-1 post-owner">
                            <?php
                            if ($job->worker_avatar == '') { ?>
                              <img src="<?php echo base_url().'images/nobody.jpg';?>" alt="">
                            <?php 
                            } else { ?>
                            <img src="<?php echo base_url().'images/profil_photo/'.$job->worker_avatar?>" style="width:100%;">
                            <?php } ?>
                          </div>
                          <span><a href="../Members/<?php echo $job->worker_username;?>"><strong><?php echo $job->fullname.' ('.$job->worker_username.')';?></strong></a></span>
                          <?php 
                          if ($not_logged !== true) {
                          echo ($job->id_status !== '3' && $job->id_status !== '1' && $job->id_status !== '4') ? '<a class="a-option" href="../Companies/change_stat/3/'.$job->id_hired.'"><label class="label label-warning"><i class="glyphicon glyphicon-minus-sign"></i> Non Aktifkan</label></a>' : '';
                          echo ($job->id_status !== '4' && $job->id_status !== '2' && $job->id_status !== '3') ? '<a class="a-option" href="../Companies/change_stat/4/'.$job->id_hired.'"><label class="label label-danger"><i class="glyphicon glyphicon-remove-sign"></i> Tolak lamaran</label></a>' : '';
                          echo ($job->id_status !== '2' && $job->id_status !== '3') ? '<a class="a-option" href="../Companies/change_stat/2/'.$job->id_hired.'"><label class="label label-success"><i class="glyphicon glyphicon-ok-sign"></i> Pekerjakaan</label></a>' : '';
                          echo ($job->id_status == '2' && $job->review == '') ? '<a href="#collapseExample-'.$job->id_hired.'" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="a-option"><label class="label label-info"><i class="mt-icon-stars"></i> Rate and review</label></a>' : '';
                          }
                          ?>
                          <div class="collapse" id="collapseExample-<?php echo $job->id_hired;?>">
                            <div class="well">
                              <div class="row">
                                <?php echo form_open('Companies/rate'); ?>
                                <div class="col-md-6">
                                  <div class="alert alert-info">
                                    Berikan rating dan review pada <strong><b><?php echo $job->fullname;?></b></strong> berdasarkan kinerjanya selama bekerja bersama anda
                                    pada lowongan berjudul <strong>"<?php echo $job->post_title;?>"</strong>. 
                                  </div>
                                  <div class="alert alert-danger">
                                    Pemberian rating dan review ini tidak bisa dirubah, pastikan anda sudah memikirkannya sebelum memberi.
                                  </div>
                                </div>
                                <div class="col-sm-5">
                                  <div class="col-sm-12">
                                    <label><strong>Rating (0-5)</strong> untuk <?php echo $job->fullname?></label>
                                    <input id="input-id" name="rating" type="number" class="rating" value="<?php echo $job->stars;?>" min=0 max=5 step=0.5 data-size="xs" data-show-clear="false">
                                  </div>
                                  <div class="col-sm-12">
                                    <label><strong>Review</strong> untuk <?php echo $job->fullname?></label>
                                    <textarea placeholder="write your review here" name="review" class="form-control"></textarea>
                                  </div>
                                  <div class="col-sm-6 pull-right">
                                    <input type="hidden" name="id" value="<?php echo $job->id_hired;?>"></input>
                                    <input type="hidden" name="fullname" value="<?php echo $job->fullname;?>"></input>
                                    <input class="btn-black" type="submit" name="ra" value="submit my review"></input>
                                  </div>
                                </div>
                                <?php echo form_close(); ?>
                              </div>
                            </div>
                          </div>
                          <a class="a-option" href="../Members/<?php echo $job->worker_username;?>"><label class="label label-primary"><i class="glyphicon glyphicon-user"></i> Lihat profil</label></a>
                          <div class="col-sm-9 i-div">
                            <b>Lowongan yang didaftarkan:<b> <a href="../Jobs/detail/<?php echo $job->id_post.'/'.$job->post_title;?>"><label class="label label-default"><?php echo $job->post_title;?></label> </a>
                            <b> Tanggal melamar:</b> <label class="label label-primary"><?php echo date('j M Y', strtotime($job->hire_date));?></label> 
                            <b> Status:</b> <label class="label <?php echo 'label-'.$job->label;?>"><?php echo $job->status;?></label>
                          </div>
                        </div>
                    <?php } }
                    ?>
                    </div>
                </div><!-- tab-pane -->
              </div><!-- tab-content -->
            </div><!-- horizontal-tabs -->
          </div><!-- col -->
        </div>
        </div> <!-- row -->
      </div> <!-- container -->
      </div> <!-- page-content -->
