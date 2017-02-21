<script>
    $(function(){
      $('#languages').select2();
    });
    $(function(){
      $("#skills").select2(); 
    });
 </script>  

<div class="tab-pane fade <?php echo ($tab_param == 'KB') ? 'in active': '';?>" id="tab-6-2">
	<div class="col-sm-12 service-box style-3 green">
		<h4>Keahlian yang Dimiliki</h4>
        <?php
        $attributes = array('class' =>'form-horizontal', 'data-toggle' => 'validator');
        echo form_open('Workers/updating_KB', $attributes);
        ?>
            <div class="form-group">
              <div class="col-sm-12 form-label">
                <span>Tambahkan keahlian yang anda miliki disini, sehingga perekrut dapat melihat potensi yang anda punya.</span>
              </div>
              <div class="col-sm-7">
                <select name="skills[]" id="skills" style="width:100%;" multiple="multiple" >
                  <?php
                  foreach ($skill_sets as $skill) { ?>
                    <option value="<?php echo $skill->id_skill;?>"
                      <?php
                        if ($skill_data !== false) {
                          foreach ($skill_data as $sk) {
                            if ($skill->id_skill == $sk->id_skill) {
                              echo 'selected="selected"';
                            }
                          }
                        }
                      ?>
                    ><?php echo $skill->skill_name;?></option>  
                  <?php 
                  }
                  ?>
                </select>
              </div>
            </div>
            <h4>Bahasa yang Dikuasai</h4>
            <div class="form-group">
              <div class="col-sm-12 form-label">
                <span>Tambahkan bahasa yang anda kuasai disini, sehingga perekrut dapat melihat potensi yang anda punya.</span>
              </div>
              <div class="col-sm-7">
                <select name="languages[]" id="languages" style="width:100%;" multiple="multiple" >
                  <?php 
                  foreach ($lang_sets as $language) { ?>
                    <option value="<?php echo $language->id_language;?>"
                      <?php
                        if ($lang_data !== false) {
                         foreach ($lang_data as $lg) {
                            if ($language->id_language == $lg->id_language) {
                              echo 'selected="selected"';
                            }
                          } 
                        }
                      ?>
                    ><?php echo $language->language_name;?></option>  
                  <?php 
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group pull-right">
              <div class="col-sm-offset-2 col-sm-10">
                <button name="ins_KB" type="submit" class="btn btn-default" style="float:left;">Save changes</button>
              </div>
            </div>
          <?php
          echo form_close();
          ?>
    </div><!-- col -->
</div>
	