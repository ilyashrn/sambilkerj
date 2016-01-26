<div class="tab-pane fade" id="tab-6-2">
	<div class="col-sm-12 service-box style-3 green">
		<h4>Informasi Dasar</h4>
        <?php
        $attributes = array('class' =>'form-horizontal', 'data-toggle' => 'validator');
        echo form_open('Workers/inserting', $attributes);
        ?>
          <!-- <form class="form-horizontal"> -->
            <div class="form-group">
              <label for="fullname" class="col-sm-4 control-label" >Nama Lengkap</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nama Lengkap" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="dob" class="col-sm-4 control-label">Tanggal Lahir</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="dob" name="dob" placeholder="Tanggal lahir">
              </div>
            </div>
            <div class="form-group">
              <label for="telp_number" class="col-sm-4 control-label">Nomor Handphone</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="telp_number" name="telp_number" placeholder="Nomor Handphone">
              </div>
            </div>
            <div class="form-group">
              <label for="about" class="col-sm-4 control-label">Tentang saya</label>
              <div class="col-sm-7">
                <textarea rows="5" data-minlength="10" class="form-control" id="about" name="about" placeholder="Tentang saya" style="margin-bottom:10px;"></textarea>
                <span class="help-block">Minimum: 10 characters</span>
              </div>
            </div>
            <div class="form-group pull-right">
              <div class="col-sm-offset-2 col-sm-10">
                <button name="ins_ident" type="submit" class="btn btn-default" style="float:left;">Save</button>
                <button name="ins_worker" class="btn btn-white">Cancel</button>
              </div>
            </div>
          <?php
          echo form_close();
          ?>
    </div><!-- col -->
</div>
	