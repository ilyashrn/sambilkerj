<script>
    $(function(){
      $('#univ').select2();
    });
    $(function(){
      $('#mayor').select2();
    });
</script>	


 <div class="tab-pane fade <?php echo ($tab_param == 'PA') ? 'in active': '';?>" id="tab-6-3">
  <div class="col-sm-12 service-box style-3 green profil-tab">
    <h4>Riwayat Pendidikan</h4> 
  	<div class="col-sm-12 edu-box">
          <?php
          if ($edu_data !== false) {
            foreach ($edu_data as $edu) {    ?>
              <div class="col-md-5 service-box style-3 blue">
                <div class="edu-div hover-to">
                  <a href="../../../Workers/removing_edu/<?php echo $edu->id_w_education; ?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-remove"></i> Hapus</a>
                  <h4><?php echo $edu->school_name; ?></h4>
                  <h5><?php echo $edu->mayor_name; ?></h5>
                  <h6><?php echo $edu->year_in.' - '.$edu->year_out; ?></h6>
                </div>
              </div>
          <?php } } ?>
    </div>
    <div class="col-sm-12 service-box style-3 green profil-tab">
    	<div class="col-sm-12">
    		<h4>Tambahkan Riwayat Pendidikan</h4>	
        <div class="form-label">
          <span>Tambahkan riwayat pendidikan yang sudah pernah anda dapatkan guna menunjang karir disini anda dan menarik para perekrut.</span>
        </div>
            <?php
            $attributes = array('id' => 'fileForm','class' => 'form-horizontal','data-toggle' => 'validator');
            echo form_open_multipart('Workers/updating_edu', $attributes);
            ?>
              <!-- <form class="form-horizontal"> -->
                <div class="form-group">
                  <label for="school" class="col-sm-4 control-label">
                    Nama Institusi/Universitas
                  </label>
                  <div class="col-sm-7">
                  <select name="univ" id="univ" style="width:100%; height:20%;" required="required">
                    <option>Pilih Sekolah/Universitas</option>
                    <?php
                    foreach ($sch_sets as $sch) { ?>
                      <option value="<?php echo $sch->id_school?>"><?php echo $sch->school_name; ?></option>  
                    <?php } ?>
                   </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="mayor" class="col-sm-4 control-label">Jurusan/Program Studi</label>
                  <div class="col-sm-7">
              		<select name="mayor" id="mayor" style="width:100%; height:20%;" required="required">
              			<option>Pilih Jurusan/Program Studi</option>
                    <?php
                    foreach ($may_sets as $may) { ?>
                      <option value="<?php echo $may->id_mayor?>"><?php echo $may->mayor_name; ?></option>  
                    <?php } ?>
    			         </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <label for="year_in" class="col-sm-5 control-label">Tahun Masuk</label>
                    <div class="col-sm-7">
                      <input type="text" id="year_in" name="year_in" placeholder="yyyy" value="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="year_in" class="col-sm-5 control-label">Tahun Lulus</label>
                    <div class="col-sm-7">
                      <input type="text" id="year_out" name="year_out" placeholder="yyyy" value="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button name="ins_edu" type="submit" class="btn btn-default" style="float:left;">save input</button>
                  </div>
                </div>
              <?php
              echo form_close();
              ?>
          </div>
        </div><!-- col -->

        <h4>Riwayat Pekerjaan</h4> 
        <div class="col-sm-12 edu-box">
              <?php
              if ($exp_data !== false) {
                foreach ($exp_data as $exp) {    ?>
                  <div class="col-md-5 service-box style-3 blue">
                    <div class="edu-div hover-to">
                      <a href="../../../Workers/removing_exp/<?php echo $exp->id_w_experience; ?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-remove"></i> Hapus</a>
                      <h4><?php echo $exp->company; ?></h4>
                      <h5><?php echo $exp->position; ?></h5>
                      <h6><?php echo $exp->year_in.' - '.$exp->year_out; ?></h6>
                    </div>
                  </div>
              <?php } } ?>
        </div>
        <div class="col-sm-12 service-box style-3 green profil-tab">
          <div class="col-sm-12">
            <h4>Tambahkan Riwayat Pekerjaan</h4> 
            <div class="form-label">
              <span>Tambahkan pengalaman pekerjaan yang sudah pernah anda lakukan guna menunjang karir anda disini dan menarik para perekrut.</span>
            </div>
                <?php
                $attributes = array('id' => 'fileForm','class' => 'form-horizontal','data-toggle' => 'validator');
                echo form_open_multipart('Workers/updating_exp', $attributes);
                ?>
                  <!-- <form class="form-horizontal"> -->
                    <div class="form-group">
                      <label for="company" class="col-sm-4 control-label" >Nama Perusahaan</label>
                      <div class="col-sm-7">
                        <input type="text" id="company" name="company" placeholder="Nama Perusahaan"
                        value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="company" class="col-sm-4 control-label" >Posisi</label>
                      <div class="col-sm-7">
                        <input type="text" id="position" name="position" placeholder="Posisi di Perusahaan"
                        value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-6">
                        <label for="year_in" class="col-sm-5 control-label">Tahun Masuk</label>
                        <div class="col-sm-7">
                          <input type="text" id="year_in" name="year_in" placeholder="yyyy" value="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="year_in" class="col-sm-5 control-label">Tahun Keluar</label>
                        <div class="col-sm-7">
                          <input type="text" id="year_out" name="year_out" placeholder="yyyy" value="">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button name="ins_exp" type="submit" class="btn btn-default" style="float:left;">save input</button>
                      </div>
                    </div>
                  <?php
                  echo form_close();
                  ?>
              </div>
            </div><!-- col -->

            <h4>Riwayat Pelatihan</h4> 
            <div class="col-sm-12 edu-box">
                  <?php
                  if ($train_data !== false) {
                    foreach ($train_data as $train) {    ?>
                      <div class="col-md-5 service-box style-3 blue">
                        <div class="edu-div hover-to">
                          <a href="../../../Workers/removing_train/<?php echo $train->id_w_training; ?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-remove"></i> Hapus</a>
                          <h4><?php echo $train->course_name; ?></h4>
                          <h5><?php echo $train->institution; ?></h5>
                          <h6><?php echo $train->year; ?></h6>
                        </div>
                      </div>
                  <?php } } ?>
            </div>
            <div class="col-sm-12 service-box style-3 green profil-tab">
              <div class="col-sm-12">
                <h4>Tambahkan Riwayat Pelatihan</h4> 
                <div class="form-label">
                  <span>Tambahkan pengalaman pelatihan yang sudah pernah anda ikuti guna menunjang karir anda disini dan menarik para perekrut.</span>
                </div>
                    <?php
                    $attributes = array('id' => 'fileForm','class' => 'form-horizontal','data-toggle' => 'validator');
                    echo form_open_multipart('Workers/updating_train', $attributes);
                    ?>
                      <!-- <form class="form-horizontal"> -->
                        <div class="form-group">
                          <label for="course_name" class="col-sm-4 control-label" >Nama Pelatihan</label>
                          <div class="col-sm-7">
                            <input type="text" id="course_name" name="course_name" placeholder="Nama Pelatihan"
                            value="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="institution" class="col-sm-4 control-label" >Institusi Penyelenggara</label>
                          <div class="col-sm-7">
                            <input type="text" id="institution" name="institution" placeholder="Institusi Penyelanggara"
                            value="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="year" class="col-sm-4 control-label" >Tahun Mengikuti</label>
                          <div class="col-sm-7">
                            <input type="text" id="year" name="year" placeholder="Tahun Mengikuti"
                            value="">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button name="ins_train" type="submit" class="btn btn-default" style="float:left;">save input</button>
                          </div>
                        </div>
                      <?php
                      echo form_close();
                      ?>
                  </div>
                </div><!-- col -->

                <h4>Riwayat Prestasi</h4> 
                <div class="col-sm-12 edu-box">
                      <?php
                      if ($ach_data !== false) {
                        foreach ($ach_data as $ach) {    ?>
                          <div class="col-md-5 service-box style-3 blue">
                            <div class="edu-div hover-to">
                              <a href="../../../Workers/removing_ach/<?php echo $train->id_w_achievement; ?>" style="font-size:10px;" class="a-white"><i class="glyphicon glyphicon-remove"></i> Hapus</a>
                              <h4><?php echo $ach->achievement; ?></h4>
                              <h5><?php echo $ach->institution; ?></h5>
                              <h6><?php echo $ach->year; ?></h6>
                            </div>
                          </div>
                      <?php } } ?>
                </div>
                <div class="col-sm-12 service-box style-3 green profil-tab">
                  <div class="col-sm-12">
                    <h4>Tambahkan Riwayat Prestasi</h4> 
                    <div class="form-label">
                      <span>Tambahkan pengalaman prestasi yang sudah pernah anda raih guna menunjang karir anda disini dan menarik para perekrut.</span>
                    </div>
                        <?php
                        $attributes = array('id' => 'fileForm','class' => 'form-horizontal','data-toggle' => 'validator');
                        echo form_open_multipart('Workers/updating_ach', $attributes);
                        ?>
                          <!-- <form class="form-horizontal"> -->
                            <div class="form-group">
                              <label for="achievement" class="col-sm-4 control-label" >Nama Penghargaan</label>
                              <div class="col-sm-7">
                                <input type="text" id="achievement" name="achievement" placeholder="Nama Penghargaan"
                                value="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="institution" class="col-sm-4 control-label" >Institusi Pemberi</label>
                              <div class="col-sm-7">
                                <input type="text" id="institution" name="institution" placeholder="Institusi Penyelanggara"
                                value="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="year" class="col-sm-4 control-label" >Tahun Mendapatkan</label>
                              <div class="col-sm-7">
                                <input type="text" id="year" name="year" placeholder="Tahun Mengikuti"
                                value="">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                <button name="ins_ach" type="submit" class="btn btn-default" style="float:left;">save input</button>
                              </div>
                            </div>
                          <?php
                          echo form_close();
                          ?>
                    </div>
                  </div><!-- col -->
      </div>
</div>
