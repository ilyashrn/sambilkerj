<?php
foreach ($basic_data as $basic_row) {}
if ($ident_data !== false) {
  foreach ($ident_data as $row) {}
  if ($loc_data !== false) {
    foreach ($loc_data as $location) {}
  }
}
foreach ($post_data as $post) {}
$this->session->set_flashdata('redirect', $this->uri->uri_string());

?>
<script>
  $(function () {
    $('[data-toggle="popover"]').popover({
      container: 'body',
      html:true,
      title:"Anda akan mendaftar pekerjaan ini",
      template: '<div class="popover" role="tooltip">'
                  +'<div class="arrow"> </div>'
                  +'<form method="post" action="../../../Workers/applying/1/<?php echo $post->id_post.'/'.$this->session->userdata('mem_id').'/'.$basic_row->id_company;?>">'
                  +'<h3 class="popover-title"></h3>'
                  +'<div class="popover-content"></div>'
                  +'<div class="popover-footer">'
                    +'<input type="submit" id="apply" class="btn btn-black" value="Daftar sekarang!">'
                  +'</div>'
                  +'</form>'
                +'</div>'
    });

    $('[data-toggle="popoverrr"]').popover()
    $('[data-toggle="tooltip"]').tooltip()
    $('#syarat').modal(options)
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
              <div class="col-sm-12">
                <span class="profil-span"><b>Berkas Pendukung</b></span>
                <p><i class="mt-icon-file2"></i> <a href="<?php echo base_url().'files/loker/'.$post->file;?>"> <?php echo $post->file;?></a> (<?php echo $post->file_desc;?>)</p>
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
          <div class="alert alert-warning">
            Pekerja nantinya wajib menyisihkan <b>2,5%</b> gaji yang diterima dari pekerjakan untuk biaya administrasi sambilkerja.com.
             <a type="button" data-toggle="modal" data-target="#syarat" href="">Baca selengkapnya</a>
          </div>
        </div><!-- col -->
        <div class="col-sm-8">
          <div class="job-box service-box style-3 default job-footer" style="padding:10px">
          <?php
            if ($mem_type == null) { ?>
              <button id="daftar" class="btn btn-orange" data-container="body" data-placement="bottom" data-trigger="focus" data-toggle="popoverrr" data-content="Login atau daftarkan diri anda terlebih dahulu untuk mendaftar lowongan!">Daftar pekerjaan ini</button>
          <?php 
          } elseif ($mem_type == 'C') { ?>
              <button disabled type="button" data-toggle="tooltip" data-placement="top" title="Perusahaan tidak bisa melamar" id="daftar" class="btn btn-orange">Daftar pekerjaan ini</button>
          <?php } elseif ($mem_type == 'W') { ?>
            <button data-content=
              'Lamaran berdasarkan profil yang sudah anda isi akan dikirimkan ke pihak perusahaan. <a href="../../members/$this->session->userdata("logged");">Cek kembali profil anda</a>. <br><br><input type="checkbox" name="terms" value="1">Saya sudah membaca <a href="">ketentuan dan syarat yang berlaku</a>' 
              data-placement="right"  data-toggle="popover" class="btn btn-orange">
              Daftar pekerjaan ini
            </button>
          <?php }
          ?>
            <span class="profil-span pull-right"><i class="glyphicon glyphicon-alert"></i> Sudah <?php echo $app_count;?> orang mendaftar</span>              
          </div>    
        </div>
      </div>
  </div>
</div>