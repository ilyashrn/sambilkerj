                <div class="tab-pane fade <?php echo ($tab_param == 'PA') ? 'in active': '';?>" id="tab-6-4">
                	<div class="col-sm-12 service-box style-3 green">
                		<h4>Ubah Password</h4>
                        <?php
                        $attributes = array('class' =>'form-horizontal', 'data-toggle' => 'validator');
                        echo form_open('Workers/updating_password', $attributes);
                        ?>
                          <!-- <form class="form-horizontal"> -->
                            <div class="form-group">
                              <label for="password" class="col-sm-4 control-label" >Password lama</label>
                              <div class="col-sm-7">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password lama">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="new_pass" class="col-sm-4 control-label">Password baru</label>
                              <div class="col-sm-7">
                                <input type="password" class="form-control" id="new_pass" name="new_pass" placeholder="Password baru">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="telp_number" class="col-sm-4 control-label">Konfirmasi password baru</label>
                              <div class="col-sm-7">
                                <input type="password" class="form-control" id="matchPassword" data-match="#new_pass" data-match-error="Whoops, these don't match" name="confirm_password" placeholder="Confirm Password" required="required" style="margin-bottom:10px;">
                                <span class="help-block">Typed password should matches</span>
                              </div>
                            </div>
                            <div class="form-group pull-right" style="margin-right:0px;">
                              <div class="col-sm-offset-2 col-sm-10">
                                <button name="upd_pass" type="submit" class="btn btn-default" style="float:left;">Update Password</button>
                              </div>
                            </div>
                          <?php
                          echo form_close();
                          ?>
                    </div><!-- col -->

                    <div class="col-sm-12 service-box style-3 green">
                      <h4>Ubah Username</h4>
                        <p>Username (dan E-mail) digunakan sebagai identitas untuk melakukan login ke <span class="text-default">SambilKerja</span></p>
                          <?php
                          $attributes = array('class' =>'form-horizontal', 'data-toggle' => 'validator');
                          echo form_open('Workers/updating_username', $attributes);
                          ?>
                            <!-- <form class="form-horizontal"> -->
                              <div class="form-group">
                                <label for="username" class="col-sm-4 control-label" >Username baru</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                </div>
                              </div>
                              <div class="form-group pull-right" style="margin-right:0px;">
                                <div class="col-sm-offset-2 col-sm-10">
                                  <button name="upd_ue" type="submit" class="btn btn-default" style="float:left;">Update</button>
                                </div>
                              </div>
                            <?php
                            echo form_close();
                            ?>
                    </div>
                </div>
              </div><!-- tab-content -->
            </div><!-- vertical-tabs -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- container -->
  </div>
	