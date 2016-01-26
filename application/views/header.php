<div id="page-wrapper">
  <!-- HEADER -->
  <header>
    <div id="header-top">
      <div class="container">
        <div class="row">
          <div class="col-sm-7">
            <div class="widget widget-contact">
              <ul>
                <li>
                  <i class="mt-icon-telephone1"></i>
                  <span class="hidden-xs">xxx xxx xxx</span>
                  <a class="visible-xs-inline" href="tel:2082904995">xxxxxx xxxx </a>
                </li>
                <li>
                  <i class="mt-icon-mail"></i>
                  <a href="mailto:">customerservice@sambilkerja.com</a>
                </li>
              </ul>
            </div><!-- widget-contact -->
          </div><!-- col -->
          <div class="col-sm-5">
            <div class="widget widget-social">
              <div class="social-media">
                <a class="facebook" href="http://www.facebook.com/sambilkerja"><i class="mt-icon-facebook"></i></a>
                <a class="twitter" href="http://www.twitter.com/sambilkerja"><i class="mt-icon-twitter"></i></a>
                <a class="google" href="http://wwww.plus.google.com/sambilkerja"><i class="mt-icon-google-plus"></i></a>
              </div><!-- social-media -->
            </div><!-- widget-social -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- header-top -->
    <div id="header">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <!-- LOGO -->
            <div id="logo">
              <a href="index.html">
                <img src="<?php echo base_url().'assets/images/logo.png';?>" alt="">
              </a>
            </div><!-- logo -->
          </div><!-- col -->
          <div class="col-sm-9">
            <!-- MENU -->
            <nav>
              <a id="mobile-menu-button" href="#"><i class="mt-icon-menu"></i></a>
              <ul class="menu clearfix" id="menu">
                <li class="megamenu">
                  <a class="dropdown-toggle" href="#" data-toggle="dropdown">Browse <strong class="caret"></strong></a>
                  <div class="megamenu-container col-4 browse-cat">
                    <div class="section">
                      <ul>
                        <li class="cat-head"><a href="shortcodes-grid.html">Jasa Keuangan</a></li>
                        <li><a href="shortcodes-typography.html">Typography</a></li>
                        <li><a href="shortcodes-lists.html">Lists</a></li>
                        <li><a href="shortcodes-headlines.html">Headlines</a></li>
                        <li><a href="shortcodes-tables.html">Tables</a></li>
                        <li><a href="shortcodes-forms.html">Forms</a></li>
                        <li><a href="shortcodes-buttons.html">Buttons</a></li>
                        <li><a href="shortcodes-dividers.html">Dividers</a></li>
                        <li><a href="shortcodes-icons-pack.html">Icons pack</a></li>
                      </ul>
                    </div>
                    <div class="section">
                      <ul>
                        <li><a href="shortcodes-alerts.html">Alerts</a></li>
                        <li><a href="shortcodes-text-boxes.html">Text boxes</a></li>
                        <li><a href="shortcodes-image-boxes.html">Image boxes</a></li>
                        <li><a href="shortcodes-services-boxes.html">Services boxes</a></li>
                        <li><a href="shortcodes-process-steps.html">Process steps</a></li>
                        <li><a href="shortcodes-pricing-plans.html">Pricing plans</a></li>
                        <li><a href="shortcodes-team.html">Team</a></li>
                        <li><a href="shortcodes-testimonials.html">Testimonials</a></li>
                        <li><a href="shortcodes-widgets.html">Widgets</a></li>
                      </ul>
                    </div>
                    <div class="section">
                      <ul>
                        <li><a href="shortcodes-accordions.html">Accordions</a></li>
                        <li><a href="shortcodes-tabs.html">Tabs</a></li>
                        <li><a href="shortcodes-maps.html">Maps</a></li>
                        <li><a href="shortcodes-clients.html">Clients</a></li>
                        <li><a href="shortcodes-galleries.html">Galleries</a></li>
                        <li><a href="shortcodes-media-content.html">Media content</a></li>
                        <li><a href="shortcodes-social-media.html">Social media</a></li>
                        <li><a href="shortcodes-filters.html">Filters</a></li>
                        <li><a href="shortcodes-paginations.html">Paginations</a></li>
                      </ul>
                    </div>
                    <div class="section">
                      <ul>
                        <li><a href="shortcodes-counters.html">Counters</a></li>
                        <li><a href="shortcodes-pie-charts.html">Pie charts</a></li>
                        <li><a href="shortcodes-progress-bars.html">Progress bars</a></li>
                        <li><a href="shortcodes-comparition-bars.html">Comparison bars</a></li>
                        <li><a href="shortcodes-statistics.html">Statistics</a></li>
                        <li><a href="shortcodes-sliders.html">Sliders</a></li>
                        <li><a href="shortcodes-full-sections.html">Full sections</a></li>
                        <li><a href="shortcodes-parallax-backgrounds.html">Parallax backgrounds</a></li>
                        <li><a href="shortcodes-video-backgrounds.html">Video backgrounds</a></li>
                      </ul>
                    </div>
                  </div>
                </li>
                <?php
                if ($this->session->userdata('logged') !== false) { //NAVBAR IF USER IS A LOGGED IN USER
                  $cur_username = $this->session->userdata('logged');
                ?>

                <li>
                  <a href="<?php echo base_url().'index.php/Members/'.$cur_username;?>">Hi, <?php echo $cur_username;?>! </a>
                </li>

                <?php 
                } else {
                ?>
                <li>
                  <a href="<?php echo base_url().'index.php/Main/new_user';?>">Regrister</a>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
                  <div class="dropdown-menu login-dropdown">
                    <div class="dropdown-content">
                      <?php
                      echo form_open('in/process');
                      ?>
                        Username or E-mail
                        <input id="user_username" style="margin-bottom: 15px;" type="text" name="name_email" size="30" placeholder="Username or E-mail" />
                        Password
                        <input id="user_password" style="margin-bottom: 15px;" type="password" name="password" size="30" placeholder="Password" />
                        <input id="user_remember_me" style="float: left; margin-right: 10px;" type="checkbox" name="remember_me" value="1" />
                        <label class="string optional" for="user_remember_me"> Remember me</label>
                        <input class="btn btn-primary" style="float: right; font-size: 12px; text-transform: none;" type="submit" name="in" value="Sign me in" />
                      </form>
                    </div>
                    <div class="dropdown-footer">
                      <a href="#" style="color: #337ab7;">I forgot my password.</a>
                    </div>
                  </div>
                </li> 
                <?php
                }
                ?>
                <li class="search">
                  <a class="hidden-xs hidden-sm" href="#"><i class="mt-icon-search"></i></a>
                  <div id="search-form-container">
                    <form id="search-form" action="#">
                      <input id="search" type="search" name="search" placeholder="Enter keywords...">
                      <input id="search-submit" type="submit" value="">
                    </form>
                  </div><!-- search-form-container -->
                </li>
              </ul>
            </nav>
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- header -->
  </header><!-- HEADER -->
