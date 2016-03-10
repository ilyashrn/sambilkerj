
<div class="tab-pane fade <?php echo ($tab_param == 'P') ? 'in active': '';?>" id="tab-6-5">
  <div class="col-sm-12 service-box style-3 green">
    <h4>Informasi Pembayaran </h4>
      <div class="alert alert-info">Anda dapat membayarkan 2,5% melalui transfer ke rekening di bawah</div>
      <ul class="check-list">
        <?php foreach ($inv_data as $inv) { ?>
          <li><?php echo $inv->invoice_bank.' - '.$inv->invoice_number.' atas nama '.$inv->invoice_name; ?></li>  
        <?php } ?>
      </ul>
    </div><!-- col -->
  <div class="col-sm-12 service-box style-3 green">
    <h4>Daftar Tagihan </h4>
    <label class="alert alert-warning">Berikut merupakan daftar lowongan dengan gaji yang harus segera disetorkan ke <span class="text-default">SambilKerja</span> <b>sebanyak 2,5%</b>.</label>
        <?php
        if ($job_data == false) { ?>
            <div class="col-sm-12" style="margin-bottom:20px;">
              <label class="label label-success">Anda tidak mempunyai tagihan untuk saat ini.</label>
            </div>
        <?php } else { 
            $final = 0;
            foreach ($job_data as $job) {
              $owe = 2.5/100*$job->salary;
             ?>
            <div class="col-sm-12 job-profil-box service-box style-3 default" style="padding:10px;margin-bottom:10px;">
              <div class="collapse" id="collapseExample-<?php echo $job->id_hired;?>">
                  <div class="well">
                    <div class="row">
                      <?php 
                      $attributes = array('data-toggle' => 'validator');
                      echo form_open_multipart('Companies/verify', $attributes); ?>
                      <div class="col-md-6">
                        <div class="alert alert-info">
                          Anda akan mengkonfirmasi pembayaran 2,5% dari gaji yang ditawarkan atas nama <strong><b><?php echo $job->fullname;?></b></strong> yang bekerja dengan anda
                          pada lowongan berjudul <strong>"<?php echo $job->post_title;?>"</strong>. 
                        </div>
                        <div class="alert alert-warning">
                          <p>Semua field wajib dilengkapi.</p>
                          <p>Untuk bukti pembayaran, <i>filesize</i> maksimal adalah <b>2 MB.</b></p>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-group">
                          <label><strong>Nominal yang dibayarkan</strong> dalam IDR</label>
                          <input type="text" placeholder="dalam IDR" name="nominal" class="form-control" value="<?php echo $owe;?>"></input>
                        </div>
                        <div class="form-group">
                          <label><strong>Nama pengirim</strong></label>
                          <input type="text" placeholder="Nama di rekening pengirim" name="sender" class="form-control" required="required"></input>
                        </div>
                        <div class="form-group">
                          <label><strong>Bukti pembayaran</strong></label>
                          <input name="proof" class="form-control" type="file"></input>
                        </div>
                        <div class="col-sm-6 pull-right form-group">
                          <input type="hidden" name="id" value="<?php echo $job->id_hired;?>"></input>
                          <input class="btn-black" type="submit" name="ra" value="submit"></input>
                        </div>
                      </div>
                      <?php echo form_close(); ?>
                    </div>
                  </div>
                </div>
              <span><strong class="text-default"><?php echo $job->fullname;?></strong> bekerja di lowongan <b><?php echo $job->post_title?></b></span>
              <?php if ($this->Payment->check_entry($job->id_hired)) {
                      if ($this->Payment->check_verified($job->id_hired)) { ?>
                         <div class="pull-right label label-success">Diverifikasi</div>
                       <?php } else { ?>
                        <div class="pull-right label label-warning">Menunggu verifikasi sistem (maksimal 24 jam)</div>
                        <?php } ?>
              <?php } else { ?>
              <a href="#collapseExample-<?php echo $job->id_hired?>" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="pull-right">Konfirmasi</a>
              <?php } ?>
              <br>
              <div class="col-sm-6 i-div">  
                <i class="mt-icon-money"></i> <b>Gaji yang ditawarkan:</b> IDR <?php setlocale(LC_MONETARY, 'id_ID'); echo number_format($job->salary) ;?>,-
              </div>
              <div class="col-sm-6 i-div pull-right">
                <i class="mt-icon-money"></i> <b>Nominal 2,5%:</b> <label class="label label-danger">IDR <?php setlocale(LC_MONETARY, 'id_ID'); echo number_format($owe) ;?>,-</label>
              </div>
            </div>
        <?php $final = $final + $owe;
        } }
        ?>
        <?php if ($job_data == false) {} else { ?>
          <h4>Total tagihan keseluruhan : <label class="label label-danger">IDR <?php echo number_format($final);?>,-</label></h4>
        <?php } ?>
    </div><!-- col -->
</div>
  