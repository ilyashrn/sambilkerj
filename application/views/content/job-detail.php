<?php
foreach ($basic_data as $basic_row) {}
if ($ident_data !== false) {
  foreach ($ident_data as $row) {}
  if ($loc_data !== false) {
    foreach ($loc_data as $location) {}
  }
}
foreach ($post_data as $post) {}
?>
<script>
  $(function () {
    $('[data-toggle="popover"]').popover({
      container: 'body',
      html:true,
      title:"Anda akan mendaftar pekerjaan ini",
      template: '<div class="popover" role="tooltip">'
                  +'<div class="arrow"> </div>'
                  +'<h3 class="popover-title"></h3>'
                  +'<div class="popover-content"></div>'
                  +'<div class="popover-footer">'
                    +'<a href="" class="btn btn-black">Daftar sekarang!</a>'
                  +'</div>'
                +'</div>'
    });
  });
</script>
<div id="page-content">
  <div class="container">
    <div class="row">
        <div class="col-md-8 hover-to">
          <div class="job-box service-box style-3 default" style="padding:20px; margin-bottom:10px;">
            <div class="row">
              <div class="col-sm-12">
                <h6 class="row-job">
                  <b><a href="#" class="worker-name"><?php echo $post->post_title;?></a></b>
                  <!-- <a href="<?php echo base_url().'Members/edit_w/PA/'.$username;?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-edit"></i> Ubah nama/username</a> -->
                  <br>
                  <b><span class="subtitle-job"><a href="#"><?php echo $post->category_name;?> </a> <span class="subtitle-job"> / </span><a href="#"><?php echo $post->sub_category_name;?></a></span></b>
                </h6>
              </div>
            </div>
            <div class="service-box-content">
              <div class="row">
                <div class="col-sm-12">
                  <div class="col-sm-6 row-job">
                    <span class="profil-span"><b>Tawaran Gaji</b></span>  
                    <p>IDR <?php echo setlocale(LC_MONETARY, 'id_ID'); echo number_format($post->salary);?>,00</p>
                  </div>
                  <div class="col-sm-6 row-job">
                    <span class="profil-span"><b>Lokasi Pekerjaan</b></span>  
                    <p><?php echo $post->city_name.', '.$post->province_name?></p>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-sm-12">
                <span class="profil-span"><b>Deskripsi Kerja</b></span>
                <p><?php echo $post->description;?></p>
              </div>
                <div class="col-sm-12">
                  <span class="profil-span"><b>Keahlian yang dibutuhkan</b></span>
                  <div class="widget-tags required-skills">
                    <?php if ($req_skill == false) { ?>
                      <p>-</p>
                    <?php } else {
                      foreach ($req_skill as $skill) { ?>
                      <a href="#"><?php echo $skill->skill_name;?></a>
                    <?php } } ?>
                  </div>
                </div>
              </div>
              <div class="row">
                  <div class="col-sm-6 profil-log left">
                    Dibuka <?php echo date('j M Y', strtotime($post->created_time)) ;?> 
                  </div>
                  <div class="col-sm-6 pull-right profil-log">
                    Berakhir <?php echo date('j M Y', strtotime($post->deadline)) ;?>
                  </div>  
                </div>
            </div><!-- services-boxes-content -->
          </div><!-- services-boxes -->
        </div>
        <div class="col-sm-4">
          <div class="job-box service-box style-3 default" style="padding:10px">
            <h5><b> Informasi Perusahaan</b></h5>
            <div class="row">
              <div class="col-sm-5 company-avatar">
              <?php
              if ($ident_data == false || $row->avatar == '') { ?>
                <a href="../../../Members/<?php echo $basic_row->username;?>"><img src="<?php echo base_url().'images/nobody.jpg';?>" alt=""></a>
              <?php 
              } else { ?>
                <a href="../../../Members/<?php echo $basic_row->username;?>"><img src="<?php echo base_url().'images/profil_photo/'.$row->avatar;?>" alt=""></a>
              <?php }
              ?>
              </div><!-- about-me-image -->
              <div class="col-sm-7">
                <span><a href="../../../Members/<?php echo $basic_row->username;?>"><?php echo $post->company_name; ?></a></span>
                <p><?php echo $basic_row->email.'<br>'.$row->telp_number;?></p>
              </div>
            </div>
            <a class="profil-job" href="../../../Members/<?php echo $basic_row->username;?>"><?php echo $post_count;?> Pekerjaan tersedia di <?php echo $post->company_name?></a>
          </div>
        </div><!-- col -->
        <div class="col-sm-8">
          <div class="job-box service-box style-3 default job-footer" style="padding:10px">
            <button data-content='Lamaran berdasarkan profil yang sudah anda isi akan dikirimkan ke pihak perusahaan. <br><br><input type="checkbox" name="terms" value="1">Saya sudah membaca <a href="">ketentuan dan syarat yang berlaku</a>' data-placement="right"  data-toggle="popover" class="btn btn-orange">Daftar pekerjaan ini</button>
            <span class="profil-span pull-right"><i class="glyphicon glyphicon-alert"></i> Sudah 50 orang mendaftar</span>              
          </div>    
        </div>
      </div>
  </div>
</div>