<div id="page-content">
  <div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="headline">
        <h3>Daftarkan dirimu sekarang juga</h3>
        <p>Daftar sebagai salah satu bagian dari <span class="text-default">SambilKerja</span> disini sekarang juga.</p>
      </div><!-- headline -->
    </div><!-- col -->
    <div class="col-md-6 col-md-offset-3">
        <?php if ($this->session->flashdata('warn')) { ?>
        <div class="alert alert-danger">
          <?php echo $this->session->flashdata('warn'); ?>
        </div>
      <?php } ?>
    </div>
  </div><!-- row -->
</div><!-- container -->

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="horizontal-tabs big-tabs wow fadeIn">
        <ul class="nav nav-tabs">
          <li class="<?php echo (!$tab) ? 'active' : ''?>"><a href="#tab-1-1" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>Pekerja</a></li>
          <li class="<?php echo ($tab) ? 'active' : ''?>"><a href="#tab-1-2" data-toggle="tab"><i class="glyphicon glyphicon-lock"></i>Perusahaan</a></li>
        </ul>
         <div class="tab-content">
          <div class="tab-pane fade <?php echo (!$tab) ? 'in active' : ''?>" id="tab-1-1">
            <div class="row">
              <div class="col-sm-7">
                <?php
                $attributes = array('class' =>'form-horizontal', 'data-toggle' => 'validator');
                echo form_open('Workers/inserting', $attributes);
                ?>
                  <!-- <form class="form-horizontal"> -->
                    <div class="form-group">
                      <label for="fullname" class="col-sm-4 control-label" >Nama Lengkap</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nama Lengkap" required="required" value="<?php echo $this->session->flashdata('fullname');?>"> 
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="username" class="col-sm-4 control-label">Username</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="required" value="<?php echo $this->session->flashdata('username1');?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="email" class="col-sm-4 control-label">E-mail</label>
                      <div class="col-sm-7">
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required="required" value="<?php echo $this->session->flashdata('email1');?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                      <div class="col-sm-7">
                        <input type="password" data-minlength="6" class="form-control" id="inputPassword" name="password" placeholder="Password" required="required" style="margin-bottom:10px;">
                        <span class="help-block">Minimum of 6 characters</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword4" class="col-sm-4 control-label">Confirm Password</label>
                      <div class="col-sm-7">
                        <input type="password" class="form-control" id="matchPassword" data-match="#inputPassword" data-match-error="Whoops, these don't match" name="confirm_password" placeholder="Confirm Password" required="required" style="margin-bottom:10px;">
                        <span class="help-block">Typed password should matches</span>
                      </div>
                    </div>
                    <div class="form-group pull-right">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button name="ins_worker" type="submit" class="btn btn-default">Regrister me</button>
                      </div>
                    </div>
                  <?php
                  echo form_close();
                  ?>
            </div><!-- col -->
          
          <div class="col-sm-5">
						<div class="service-box style-3 default" style="padding-bottom: 60px;">
							<h6><a href="#">Daftar sebagai pekerja</a></h6>
							<div class="service-box-content">
								<p>Daftar sebagai pekerja sekarang juga dan temukan pekerjaan impian disini.</p>
							</div><!-- services-boxes-content -->
						</div><!-- services-boxes -->
					</div><!-- col -->
        </div><!-- row -->

          </div><!-- tab-pane -->
          <div class="tab-pane fade <?php echo ($tab) ? 'in active' : ''?>" id="tab-1-2">
            <div class="row">
              <div class="col-sm-7">
                <?php
                $attributes = array('class' =>'form-horizontal', 'data-toggle' => 'validator');
                echo form_open('Companies/inserting', $attributes);
                ?>
                  <div class="form-group">
                    <label for="company_name" class="col-sm-4 control-label">Nama Perusahaan</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Nama Perusahaan/Organisasi" required="required" value="<?php echo $this->session->flashdata('company_name');?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="username" class="col-sm-4 control-label">Username</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="required" value="<?php echo $this->session->flashdata('username');?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-4 control-label">E-mail</label>
                    <div class="col-sm-7">
                      <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required="required" value="<?php echo $this->session->flashdata('email');?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-4 control-label">E-mail Kedua</label>
                    <div class="col-sm-7">
                      <input type="email" class="form-control" id="2ndemail" name="2nd_email" placeholder="Secondary E-mail" required="required" value="<?php echo $this->session->flashdata('2nd_email');?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-7">
                      <input type="password" data-minlength="6" class="form-control" id="inputPassword2" name="password" placeholder="Password" required="required">
                      <span class="help-block">Minimum of 6 characters</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword4" class="col-sm-4 control-label">Confirm Password</label>
                    <div class="col-sm-7">
                      <input type="password" class="form-control" id="matchPassword" data-match="#inputPassword2" data-match-error="Whoops, these don't match" name="confirm_password" placeholder="Confirm Password" required="required" style="margin-bottom:10px;">
                      <span class="help-block">Typed password should matches</span>
                    </div>
                  </div>
                  <div class="form-group pull-right">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button name="ins_comp" type="submit" class="btn btn-default">Regrister my company</button>
                    </div>
                  </div>
                </form>
              </div><!-- col -->
              <div class="col-sm-5">

						<div class="service-box style-3 default" style="padding-bottom: 60px;">
							<!-- <i class="mt-icon-writingtool"></i> -->
							<h6><a href="#">Daftarkan perusahaan anda</a></h6>
							<div class="service-box-content">
								<p>Daftarkan perusahaan anda sekarang juga dan biarkan para pekerja 'menikmati' lowongan dari perusahaan anda.</p>
							</div><!-- services-boxes-content -->
						</div><!-- services-boxes -->
					</div><!-- col -->
            </div><!-- row -->
          </div><!-- tab-pane -->
        </div><!-- tab-content -->
      </div><!-- horizontal-tabs -->
    </div><!-- col -->
  </div><!-- row -->
</div><!-- container -->
</div><!-- PAGE CONTENT -->


<script>
$(document).ready(function() {
    $('#differentForm').formValidation();
});
</script>
