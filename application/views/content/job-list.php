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

        <div class="col-sm-8">
          <?php
          if ($job_data !== false) {
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
                <!-- <ul class="pagination text-center">
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                </ul> -->
                <?php echo $links;?>
            </div><!-- col -->
        </div><!-- row -->
    
    </div><!-- container -->
  </div>