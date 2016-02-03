<script>
	$(function() {
		$('#category').select2();
	});
  $(function() {
    $('#skills').select2();
  });
  $(function() {
    $('#location').select2();
  });
</script>
<!-- CONTENT -->
<?php
  if ($edit == true) { //IF EDIT PAGE THE FOREACH(S) EXIST
    if ($post_data !== false) {
      foreach ($post_data as $post) {}
    }
  }
?>
<div id="page-content">
    <div id="page-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4><?php echo $sub_title;?></h4>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- page-header -->

    <div class="headline">
        <h3><strong><?php echo $sub_subtitle;?></strong></h3>
        <p>Sertakan informasi mengenai lowongan anda melalui form dibawah ini.</p>
    </div>
    
    <div class="container">
      <div class="row">
        <div class="col-sm-12 service-box style-3 default profil-tab">
          <?php
          $attributes = array('id' => 'fileForm','class' => 'form-horizontal','data-toggle' => 'validator');
          echo form_open_multipart(($edit == false) ? 'Jobs/inserting' : 'Jobs/updating/'.$id_post, $attributes);
          ?>
          <div class="form-group">
            <div class="form-label">
              <label for="post_title" class="col-sm-4 control-label" >Judul Informasi Lowongan</label>
              <span>Tentukan judul lowongan yang informatif, deksriptif, dan menarik.</span>  
            </div>
            <div class="col-sm-7">
              <input type="text" id="post_title" name="post_title" placeholder="Judul Informasi Lowongan" required="required"
              value="<?php echo ($edit == true) ? $post->post_title : '';?>">
            </div>
          </div>
          <div class="form-group">
              <label for="category" class="col-sm-4 control-label">Kategori pekerjaan</label>
              <div class="col-sm-7">
                <select name="category" id="category" style="width:100%; height:20%;" >
                 <option>Pilih kategori pekerjaan</option>
                  <?php
                  foreach ($cat_data as $cat) {
                    $cur_id = $cat->id_category;
                    $sub_cat = $this->Job->get_subs($cur_id);
                  ?>
                    <optgroup label="<?php echo $cat->category_name; ?>"> 
                      <?php foreach ($sub_cat as $sub) { ?> 
                      <option <?php echo ($edit == true && $post->id_job_category == $sub->id_sub_category) ? 'selected="selected"' : '';?> value="<?php echo $sub->id_sub_category; ?>"><?php echo $sub->sub_category_name; ?></option>
                      <?php } ?>
                    </optgroup>
                  <?php } ?>
               </select>
              </div>
          </div>
          <div class="form-group">
            <label for="jobdesc" class="col-sm-4 control-label">Deskripsi Pekerjaan</label>
            <div class="col-sm-7">
              <textarea rows="5" columns="12" id="jobdesc" name="jobdesc" placeholder="Deksripsi Pekerjaan" style="margin-bottom:10px;"><?php echo ($edit == true) ? $post->description : '';?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label">
              <label for="jobdesc" class="col-sm-4 control-label">Keahlian yang dibutuhkan</label>
              <span>Tambahkan keahlian yang sebaiknya dimiliki pekerja.</span>
            </div>
            <div class="col-sm-7">
              <select name="skills[]" id="skills" style="width:100%;" multiple="multiple" >
                <?php
                  foreach ($skill_sets as $skill) { ?>
                    <option value="<?php echo $skill->id_skill;?>"
                      <?php
                        if ($req_skill_data !== false) {
                          foreach ($req_skill_data as $sk) {
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
          <div class="form-group">
              <label for="location" class="col-sm-4 control-label">Lokasi Pekerjaan</label>
              <div class="col-sm-7">
                <select name="location" id="location" style="width:100%; height:20%;" >
                 <option>Pilih Kota lokasi pekerjaan</option>
                  <?php
                foreach ($prov_data as $prov) { //PROVINCE LOOPING
                  $cur_id = $prov->id_province;
                  $cities = $this->Location->get_cities($cur_id); ?>
                  <optgroup label="<?php echo $prov->province_name; ?>"> 
                  <?php
                  foreach ($cities as $city) { ?> //CITY IN CURRENT PROVINCE LOOPING 
                    <option <?php echo ($edit == true && $post->id_location == $city->id_city) ? 'selected="selected"' : '';?> value="<?php echo $city->id_city; ?>"><?php echo $city->city_name;?></option>   
                  <?php }
                  ?>
                  </optgroup>
                  <?php } 
                  ?>
               </select>
              </div>
            </div>
          <div class="form-group">
            <div class="form-label">
            <label for="salary" class="col-sm-4 control-label">Gaji yang ditawarkan</label>
              <span>Sertakan gaji yang menarik para pelamar.</span>
            </div>
            <div class="col-sm-7">
              <input type="number" id="salary" name="salary" placeholder="Gaji dalam IDR"
              value="<?php echo ($edit == true) ? $post->salary : '';?>">
            </div>
          </div>
          <div class="form-group">
            <div class="form-label">
            <label for="file" class="col-sm-4 control-label">File Pendukung</label>
              <span>Format yang diperbolehkan antara lain <b>.docx, .doc, .ppt, .pptx, .jpg, dan .pdf.</b></span>
            </div>
            <div class="col-sm-7">
              <input type="file" id="file" name="file" placeholder="Upload file">
              <div class="pull-right" style="margin-bottom:5px;">
                <?php
                if ($edit == true && $post->file == '') { ?>
                <span style="font-size:11px;">File saat ini: - </span>  
                <?php } elseif ($edit == true && !empty($post->file)) { ?>
                <input type="hidden" name="cur_file" value="<?php echo $post->file; ?>">
                <span style="font-size:11px;">File saat ini: <a href=""><i class="mt-icon-file2"></i> <?php echo $post->file;?></a></b>
                </span>
                <a class="a-file" href="../removing_file/<?php echo $post->file.'/'.$post->id_post;?>"><i class="glyphicon glyphicon-remove"></i>Hapus file</a>
                <?php }
                ?>
              </div>
              <input type="text" id="file_desc" name="file_desc" placeholder="Keterangan/nama file"
              value="<?php echo ($edit == true) ? $post->file_desc : '';?>" style="margin-top:5px;">
            </div>
          </div>
          <div class="form-group">
            <label for="deadline" class="col-sm-4 control-label" >Deadline Lowongan</label>
            <div class="col-sm-7">
              <input type="date" id="deadline" name="deadline" placeholder="mm/dd/yyyy"
              value="<?php echo ($edit == true) ? $post->deadline : '';?>">
            </div>
          </div>
          <div class="form-group pull-right">
            <div class="col-sm-offset-2 col-sm-10">
              <button name="ins_job" type="submit" class="btn btn-default" style="margin-right:30px;"><?php echo ($edit == true) ? 'update the job' : 'insert the job' ;?></button>
            </div>
          </div>
          <?php
          echo form_close();
          ?>
        </div>
      </div>
    </div>
</div> <!-- page-content -->

