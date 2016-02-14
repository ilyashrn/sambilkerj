<!-- CONTENT -->
<div id="page-content">
<div class="container">
        <div class="row">
          <div class="col-sm-12">
            
            <div class="owl-carousel images-slider">
            <?php
            foreach ($sliders as $slider) { ?>
              <div> 
                <img src="<?php echo base_url()?>assets/images/slider/<?php echo $slider->img?>" alt="">
              </div>
            <?php }
            ?>
            </div><!-- images-slider -->
            
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- container -->
      
        </div><!-- PAGE CONTENT -->

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="headline">
        <h3><span class="text-default">SambilKerja</span> saat ini</h3>
      </div><!-- headline -->
    </div><!-- col -->
  </div><!-- row -->
</div><!-- container -->

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="row">
        <div class="col-sm-4">
          <div class="counter blue">
            <i class="mt-icon-myspace"></i>
            <div class="counter-value" data-value="<?php echo $worker_count;?>"></div>
            <div class="counter-details">Pengguna</div>
          </div><!-- counter -->
        </div><!-- col -->
        <div class="col-sm-4">
          <div class="counter default">
            <i class="mt-icon-document3"></i>
            <div class="counter-value" data-value="<?php echo $job_count;?>"></div>
            <div class="counter-details">Lowongan</div>
          </div><!-- counter -->
        </div><!-- col -->
        <div class="col-sm-4">
          <div class="counter green">
            <i class="mt-icon-diamond"></i>
            <div class="counter-value" data-value="<?php echo $comp_count;?>"></div>
            <div class="counter-details">Perusahaan</div>
          </div><!-- counter -->
        </div><!-- col -->
      </div><!-- row -->
    </div><!-- col -->
  </div><!-- row -->
</div><!-- container -->

<section class="full-section" id="section-3">
<div class="full-section-shadow-top"></div>
<div class="full-section-shadow-bottom"></div>
<div class="parallax-multilayer">
    <div class="parallax-layer" data-stellar-ratio="0.3" data-x="5%" data-y="40%"><img src="<?php echo base_url().'images/index/multilayer-parallax/image-1.png';?>" alt=""></div>
</div><!-- parallax-multilayer -->
<div class="full-section-container">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="headline">
          <h3>Konsep <span class="text-default">SambilKerja</span></h3>
          <p>Subtitle</p>
        </div><!-- headline -->
      </div><!-- col -->
    </div><!-- row -->
  </div><!-- container -->

  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div class="service-box style-1 default">
          <div class="service-box-content">
            <h6><a href="single-service.html">Modern Design</a></h6>
            <p>Duis aute irure dolor in reprehenderit in dolor velit esse cillum dolore eu fugiat nulla lorem ipsum dolor sit
            amet omis.</p>
          </div><!-- service-box-content -->
        </div><!-- service-box -->
      </div><!-- col -->
      <div class="col-sm-4">
        <div class="service-box style-1 default">
          <div class="service-box-content">
            <h6><a href="single-service.html">Modern Design</a></h6>
            <p>Duis aute irure dolor in reprehenderit in dolor velit esse cillum dolore eu fugiat nulla lorem ipsum dolor sit
            amet omis.</p>
          </div><!-- service-box-content -->
        </div><!-- service-box -->
      </div><!-- col -->
      <div class="col-sm-4">
        <div class="service-box style-1 default">
          <div class="service-box-content">
            <h6><a href="single-service.html">Modern Design</a></h6>
            <p>Duis aute irure dolor in reprehenderit in dolor velit esse cillum dolore eu fugiat nulla lorem ipsum dolor sit
            amet omis.</p>
          </div><!-- service-box-content -->
        </div><!-- service-box -->
      </div><!-- col -->
      <div class="col-sm-4">
        <div class="service-box style-1 default">
          <div class="service-box-content">
            <h6><a href="single-service.html">Modern Design</a></h6>
            <p>Duis aute irure dolor in reprehenderit in dolor velit esse cillum dolore eu fugiat nulla lorem ipsum dolor sit
            amet omis.</p>
          </div><!-- service-box-content -->
        </div><!-- service-box -->
      </div><!-- col -->
    </div><!-- row -->
  </div><!-- container -->
</div><!-- full-section-container -->

</section><!-- full-section -->

<div class="full-section dark-section" id="section-7">

<div class="full-section-shadow-top"></div>
<div class="full-section-pattern"></div>

<div class="full-section-container">

  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center headline">
        <h3><span class="text-default">Frequently Asked Question</span> (F.A.Q.)</h3>
      </div><!-- col -->
    </div><!-- row -->
  </div><!-- container -->

  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="panel-group" id="accordion1">
            <?php
              if ($faqs) {
                foreach ($faqs as $faq) { ?>
            <div class="panel">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion1" href="#collapse<?php echo $faq->id_faq;?>-1"><?php echo $faq->question;?></a>
              </h4>
            </div><!-- panel-heading -->
            <div id="collapse<?php echo $faq->id_faq;?>-1" class="panel-collapse collapse">
              <div class="panel-body">
                <p><?php echo $faq->answer;?></p>
              </div><!-- panel-body -->
            </div><!-- panel-collapse -->
          </div><!-- panel -->
            <?php } }
            ?>
        </div><!-- accordion -->
      </div><!-- col -->
    </div><!-- row -->
  </div><!-- container -->

</div><!-- full-section-container -->

</div><!-- full-section -->

