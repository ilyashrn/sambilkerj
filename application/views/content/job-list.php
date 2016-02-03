<!-- CONTENT -->
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
          <div class="panel-group" id="categories">		
							<div class="panel">
								<div class="panel-heading">
									<h4 class="panel-title category-title">
										<a data-toggle="collapse" data-parent="#accordion1" href="#collapse2-1">Donec neque eu posuere</a>
									</h4>
								</div><!-- panel-heading -->
								<div id="collapse2-1" class="panel-collapse collapse">
									<div class="panel-body">
										<p>Nullam interdum in purus non porttitor. Nulla mollis eu neque eu ornare. Proin eget placerat massa, ac maximus
										massa. Nullam bibendum et velit sed volutpat. Donec rutrum lobortis nunc turpis, vel ultricies lacus tincidunt
										porttitor nibh neque eu.</p>
									</div><!-- panel-body -->
								</div><!-- panel-collapse -->
							</div><!-- panel -->
							<div class="panel">
								<div class="panel-heading">
									<h4 class="panel-title category-title">
										<a data-toggle="collapse" data-parent="#accordion1" href="#collapse3-1">Nulla mollis eu neque</a>
									</h4>
								</div><!-- panel-heading -->
								<div id="collapse3-1" class="panel-collapse collapse">
									<div class="panel-body">
										<p>Aenean malesuada condimentum nisl, eu posuere leo porta sodales. Quisque semper faucibus nisl in maximus.
										Morbi blandit eget risus ut aliquam. Fusce eget lobortis nunc turpis, vel ultricies lacus tincidunt faucibus est, at
										molestie ex felis mi.</p>
									</div><!-- panel-body -->
								</div><!-- panel-collapse -->
							</div><!-- panel -->
							<div class="panel">
								<div class="panel-heading">
									<h4 class="panel-title category-title">
										<a data-toggle="collapse" data-parent="#accordion1" href="#collapse4-1">Proin eget placerat</a>
									</h4>
								</div><!-- panel-heading -->
								<div id="collapse4-1" class="panel-collapse collapse">
									<div class="panel-body">
										<p>Etiam tincidunt ligula nisl, nec tristique odio eleifend in. Phasellus mauris nibh, convallis vel ultrices vitae,
										auctor a metus. Aenean aliquam vel diam non auctor lobortis nunc turpis, vel ultricies lacus tincidunt eget risus ut
										aliquam auctor a metus.</p>
									</div><!-- panel-body -->
								</div><!-- panel-collapse -->
							</div><!-- panel -->
						</div><!-- accordion -->
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