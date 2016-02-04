<script>
  $(function() {
    $('#category').select2({
      placeholder: "Pilih Kategori"
    });
  });
  $(function() {
    $('#location').select2({
      placeholder: "Pilih Lokasi"
    });
  });
</script><!-- CONTENT -->

<div id="page-content">
    <div id="page-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4>Lowongan pekerjaan terbuka</h4>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- page-header -->

    <div class="container">
      <div class="row">
        <div class="col-sm-4">
        <div class="text-box job-box">
            <span>Refine search</span>
            <?php echo form_open('Jobs/refine_search'); ?>
              <input type="search" name="refine_search" placeholder="Masukkan kata kunci" style="margin-bottom:10px;">
              <!-- <input type="submit" name="submit" value="" style="position: absolute; left: -9999px"> -->
              <span>Lokasi Pekerjaan</span>
              <select name="location[]" id="location" multiple="multiple">
                <option selected="selected" value="default">Semua Lokasi Pekerjaan</option>
                <?php
                foreach ($prov_data as $prov) { //PROVINCE LOOPING
                  $cur_id = $prov->id_province;
                  $cities = $this->Location->get_cities($cur_id); ?>
                  <optgroup label="<?php echo $prov->province_name; ?>"> 
                  <?php
                  foreach ($cities as $city) { ?> //CITY IN CURRENT PROVINCE LOOPING 
                    <option value="<?php echo $city->id_city; ?>"><?php echo $city->city_name;?></option>   
                  <?php }
                  ?>
                  </optgroup>
                  <?php } 
                  ?>
              </select>
              <span>Kategori Pekerjaan</span>
              <select name="category[]" id="category" multiple="multiple">
                <option selected="selected"  value="default">Semua Kategori Pekerjaan</option>
                  <?php
                  foreach ($cat_data as $cat) {
                    $cur_id = $cat->id_category;
                    $sub_cat = $this->Job->get_subs($cur_id);
                  ?>
                    <optgroup label="<?php echo $cat->category_name; ?>"> 
                      <?php foreach ($sub_cat as $sub) { ?> 
                      <option value="<?php echo $sub->id_sub_category; ?>"><?php echo $sub->sub_category_name; ?></option>
                      <?php } ?>
                    </optgroup>
                  <?php } ?>
              </select>
              <input type="submit" value="Cari Pekerjaan">
              <?php echo form_close(); ?>
          </div>
        </div><!-- col -->

        <div class="col-sm-8 job-list">
        <?php
          if ($job_data == false) { ?>
              <div class="text-box default">
                <p>Hasil pencarian tidak ada yang sesuai.</p>
              </div><!-- text-box -->
          <?php } ?>
          <div class="row">
            <div class="col-sm-12 text-box job-box">
              <div class="col-sm-3">
                <span>Sorting option</span>
              </div>
              <div class="col-sm-1">
                <i class="glyphicon glyphicon-sort-by-attributes"></i>
              </div>
              <div class="col-sm-4">
                <?php
                echo form_open('Jobs/lists');
                ?>
                <select name="sort_by" onchange='this.form.submit();'>
                  <option <?php echo ($this->session->userdata('order_by') == '1') ? 'selected="selected"': '';?> value="1">Tanggal dibuka</option>
                  <option <?php echo ($this->session->userdata('order_by') == '2') ? 'selected="selected"': '';?> value="2">Gaji yang ditawarkan</option>
                  <option <?php echo ($this->session->userdata('order_by') == '3') ? 'selected="selected"': '';?> value="3">Deadline ditutup</option>
                </select>  
              </div>
              <div class="col-sm-4">
                <select name="sort_method" onchange='this.form.submit();'>
                  <option <?php echo ($this->session->userdata('sort') == '1') ? 'selected="selected"': '';?> value="1">Sort Descending</option>
                  <option <?php echo ($this->session->userdata('sort') == '2') ? 'selected="selected"': '';?> value="2">Sort Ascending</option>
                </select>  
                <input type="submit" name="sort" style="position: absolute; left: -9999px">
                <?php
                echo form_close();
                ?>
              </div>
            </div>
          </div>
          <?php if ($job_data !== false) {
            foreach ($job_data as $job) {
              $description = character_limiter($job->description,100);
             ?>
              <div class="job-box service-box style-3 default" style="padding:20px;">
              <h6>
                <a href="#" class="title-job"><?php echo $job->post_title;?></a><br>
                <span class="subtitle-job"><a href="#"><?php echo $job->category_name;?> </a> <span class="subtitle-job"> > </span><a href="#"><?php echo $job->sub_category_name;?></a></span>
              </h6>
              <div class="service-box-content">
                <div class="row">
                  <div class="col-sm-8">
                    <p>
                    <?php echo $description;?></p>
                  </div>
                  <div class="col-sm-4 point-detail">
                    <i class="mt-icon-timetable"></i> <?php echo date('j M Y', strtotime($job->deadline));?> <br>
                    <i class="mt-icon-money"></i> IDR <?php setlocale(LC_MONETARY, 'id_ID'); echo number_format($job->salary) ;?> <br>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <span>Keahlian yang dibutuhkan:</span>
                    <div class="widget-tags required-skills">
                        <?php
                        $req_skills = $this->Job->get_req_skill($job->id_post);
                        if ($req_skills == false) {
                          echo '-';
                        } else{
                        foreach ($req_skills as $req) { ?>
                          <a href="#"><?php echo $req->skill_name;?></a>  
                        <?php } } ?>
                        
                    </div>
                  </div>
                  <div class="col-sm-2 pull-right post-owner">
                    <img src="<?php echo base_url().'images/profil_photo/'.$job->avatar;?>">
                  </div>
                  <div class="col-sm-6 pull-right post-owner" style="padding-right:0;">
                    oleh <a href="#"><?php echo $job->company_name;?></a> <br>
                    dibuat <?php echo date('j M Y', strtotime($job->created_time));?>
                  </div>
                </div>
              </div><!-- services-boxes-content -->
            </div><!-- services-boxes -->
          <?php } } ?>
        </div><!-- col -->
      </div><!-- row -->
    </div><!-- container -->
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php echo $links;?>
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- container -->
  </div>