<?php
foreach ($contacts as $cont) {}
?>
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
                  <span class="hidden-xs"><?php echo $cont->telp?></span>
                  <a class="visible-xs-inline" href="tel:<?php echo $cont->telp?>"><?php echo $cont->telp?> </a>
                </li>
                <li>
                  <i class="mt-icon-mail"></i>
                  <a href="mailto:"><?php echo $cont->email;?></a>
                </li>
              </ul>
            </div><!-- widget-contact -->
          </div><!-- col -->
          <div class="col-sm-5">
            <div class="widget widget-social">
              <div class="social-media">
              
                <a class="facebook" href="<?php echo (strpos($cont->facebook,'http://www.')) ? $cont->facebook : 'http://www.'.$cont->facebook?>"><i class="mt-icon-facebook"></i></a>
                <a class="twitter" href="http://www.twitter.com/<?php echo $cont->twitter?>"><i class="mt-icon-twitter"></i></a>
                <a class="google" href="<?php echo (strpos($cont->google,'http://www.')) ? $cont->google : 'http://www.'.$cont->google ?>"><i class="mt-icon-google-plus"></i></a>
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
              <a href="<?php echo base_url();?>">
                <img src="<?php echo base_url().'assets/images/logo.png';?>" alt="">
              </a>
            </div><!-- logo -->
          </div><!-- col -->
          <div class="col-sm-9">
            <!-- MENU -->
            <nav>
              <a id="mobile-menu-button" href="#"><i class="mt-icon-menu"></i></a>
              <ul class="menu clearfix" id="menu">
                <li><a href="<?php echo base_url().'Jobs/';?>">Browse Jobs</a></li>
                <li><a href="<?php echo base_url().'Blog/';?>">Blog</a></li>
                <?php
                if ($this->session->userdata('logged') !== false) { //NAVBAR IF USER IS A LOGGED IN USER
                  $cur_username = $this->session->userdata('logged');
                  if ($this->session->userdata('mem_type') == 'C') { ?>
                  <li class="sign-in"><a style="color:#fff;" href="<?php echo base_url().'Jobs/new_job';?>">Open New Job</a></li>
                <?php }
                ?>
                <li class="dropdown">
                  <a href="<?php echo base_url().'Members/'.$cur_username;?>"><?php echo $cur_username;?> <strong class="caret"></strong></a>
                  <ul>
                    <li><a href="<?php echo base_url().'Members/'.$cur_username;?>">Profile</a></li>
                    <li><a href="<?php echo base_url().'Messages/';?>">Messages</a></li>
                    <?php if ($this->session->userdata('mem_type') == 'W') { ?>
                      <li><a href="<?php echo base_url().'Members/edit_w/P/'.$cur_username;?>">Payment</a></li>
                    <?php } ?>
                    <li><a href="<?php echo ($this->session->userdata('mem_type') == 'W') ? base_url().'Members/edit_w/PA/'.$cur_username : base_url().'Members/edit_c/PA/'.$cur_username ;?>">Settings</a></li>
                    <li><a href="<?php echo base_url().'In/out';?>">Logout</a></li>
                  </ul>
                </li>

                <?php 
                } else {
                ?>
                <li class="regrister">
                  <a href="<?php echo base_url().'Main/new_user';?>">Regrister</a>
                </li>
                <li class="dropdown sign-in">
                  <a style="color:#fff;" class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
                  <div class="dropdown-menu login-dropdown">
                    <div class="dropdown-content">
                      <div class="row">
                        <div class="col-sm-12">
                          <?php
                          $attributes = array('class' => 'form-horizontal');
                          echo form_open('in/process', $attributes);
                          ?>
                            Username or E-mail
                            <input id="user_username" style="margin-bottom: 15px;" type="text" name="name_email" size="30" placeholder="Username or E-mail" />
                            Password
                            <input id="user_password" style="margin-bottom: 15px;" type="password" name="password" size="30" placeholder="Password" />
                            <input id="user_remember_me" style="float: left; margin-right: 10px;" type="checkbox" name="remember_me" value="1" />
                            <label class="string optional" for="user_remember_me"> Remember me</label>
                            <input class="btn btn-primary" style="float: right; font-size: 14px; font-weight: normal; text-transform: none;" type="submit" name="in" value="SIGN ME IN" />
                          <?php echo form_close();?>
                        </div>
                      </div>
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
                    <!-- <form id="search-form" action="#"> -->
                    <?php
                    $attributes = array('id' => 'search-form'); 
                    echo form_open('Jobs/search',$attributes);
                    ?>
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
