<script>
    $(function(){
      $('#languages').select2();
    });
    $(function(){
      $("#skills").select2(); 
    });
 </script>  

<div class="tab-pane fade <?php echo ($tab_param == 'P') ? 'in active': '';?>" id="tab-6-5">
  <div class="col-sm-12 service-box style-3 green">
    <h4>Daftar Pembayaran</h4>
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
              <span><strong class="text-default"><?php echo $job->post_title;?></strong> oleh <?php echo $job->company_name ?></span>
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
      <h4>Total tagihan keseluruhan : <label class="label label-danger">IDR <?php echo number_format($final) ?>,-</label></h4>
    </div><!-- col -->
</div>
  