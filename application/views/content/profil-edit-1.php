<script>
    $(function(){
      $('#test').select2();
    });
    $(function(){
      $('#test2').select2();
    });
    $(function() {
      $('#pob').select2();
    });
 </script>	


 <div class="tab-pane fade <?php echo ($tab_param == 'I') ? 'in active': '';?>" id="tab-6-6">
	<div class="col-sm-12 service-box style-3 green profil-tab">
	<div class="col-sm-12">
		<h4>Informasi Dasar</h4>	
        <?php
        $attributes = array('id' => 'fileForm','class' => 'form-horizontal','data-toggle' => 'validator');
        echo form_open_multipart('Workers/updating_ident', $attributes);
        foreach ($basic_data as $row) {}
    	if ($ident_data !== false) {
	    	foreach ($ident_data as $row2) {
	    		$dob = implode("/", array_reverse(explode("-", $row2->dob)));	
	    	}	
	    }
        ?>
          <!-- <form class="form-horizontal"> -->
            <div class="form-group">
              <label for="fullname" class="col-sm-4 control-label" >Nama Lengkap</label>
              <div class="col-sm-7">
                <input type="text" id="fullname" name="fullname" placeholder="Nama Lengkap" required="required"
                value="<?php echo $row->fullname;?>">
              </div>
            </div>
            <div class="form-group">
              <label for="nickname" class="col-sm-4 control-label" >Nama Panggilan</label>
              <div class="col-sm-7">
                <input type="text" id="nickname" name="nickname" placeholder="Nama Panggilan"
                value="<?php echo ($ident_data !== false) ? $row2->nickname: '';?>">
              </div>
            </div>
            <div class="form-group">
              <label for="nickname" class="col-sm-4 control-label" >E-mail</label>
              <div class="col-sm-7">
                <input type="email" id="email" name="email" placeholder="E-mail"
                value="<?php echo $row->email;?>">
              </div>
            </div>
            <div class="form-group">
              <label for="gender" class="col-sm-4 control-label">Jenis Kelamin</label>
              <div class="col-sm-7">
          		<select name="gender" id="test2" style="width:100%; height:20%;" >
          			<option>Pilih Jenis Kelamin</option>
          			<option <?php echo ($ident_data !== false && $row2->gender == 1) ? 'selected="selected"': '';?> value="1">Laki-laki</option>
          			<option <?php echo ($ident_data !== false && $row2->gender == 2) ? 'selected="selected"': '';?>value="2">Perempuan</option>
			    </select>
              </div>
            </div>
            <div class="form-group">
              <label for="dob" class="col-sm-4 control-label">Tempat dan Tanggal Lahir</label>
              <div class="col-sm-7">
                <select name="pob" id="pob" style="width:100%; height:20%;" >
                   <option>Pilih Kota Kelahiran</option>
                    <?php
                  foreach ($prov_data as $prov) { //PROVINCE LOOPING
                    $cur_id = $prov->id_province;
                    $cities = $this->Location->get_cities($cur_id); ?>
                    <optgroup label="<?php echo $prov->province_name; ?>"> 
                    <?php
                    foreach ($cities as $city) { ?> //CITY IN CURRENT PROVINCE LOOPING 
                      <option <?php echo ($ident_data !== false &&  $row2->pob == $city->id_city) ? 'selected="selected"': '';?> value="<?php echo $city->id_city; ?>"><?php echo $city->city_name;?></option>   
                    <?php }
                    ?>
                    </optgroup>
                    <?php } 
                    ?>
                 </select>
                <input style="margin-top:15px;"type="date" id="dob" name="dob" placeholder="mm/dd/yyyy" value="<?php echo ($ident_data !== false) ? $row2->dob: '';?>">
              </div>
            </div>
            <div class="form-group">
              <label for="telp_number" class="col-sm-4 control-label">Nomor Handphone</label>
              <div class="col-sm-7">
                <input type="text"  id="telp_number" name="telp_number" placeholder="Nomor Handphone" value="<?php echo ($ident_data !== false) ? $row2->telp_number: '';?>">
              </div>
            </div>
            <div class="form-group">
              <label for="domicile" class="col-sm-4 control-label">Domisili</label>
              <div class="col-sm-7">
          		  <select name="domicile" id="test" style="width:100%; height:20%;" >
          			 <option>Pilih Kota Domisili</option>
            			<?php
        				foreach ($prov_data as $prov) { //PROVINCE LOOPING
        					$cur_id = $prov->id_province;
        					$cities = $this->Location->get_cities($cur_id); ?>
        					<optgroup label="<?php echo $prov->province_name; ?>"> 
        					<?php
        					foreach ($cities as $city) { ?> //CITY IN CURRENT PROVINCE LOOPING 
        						<option <?php echo ($ident_data !== false &&  $row2->domicile == $city->id_city) ? 'selected="selected"': '';?> value="<?php echo $city->id_city; ?>"><?php echo $city->city_name;?></option>		
        					<?php }
        					?>
        					</optgroup>
            			<?php }	
            			?>
  			       </select>
              </div>
            </div>
            <div class="form-group">
              <label for="address" class="col-sm-4 control-label">Alamat lengkap</label>
              <div class="col-sm-7">
                <textarea rows="3" columns="12" id="address" name="address" placeholder="Alamat lengkap" style="margin-bottom:10px;"><?php echo ($ident_data !== false) ? $row2->address: '';?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="about" class="col-sm-4 control-label">Tentang saya</label>
              <div class="col-sm-7">
                <textarea rows="5" columns="12" data-minlength="10" id="about" name="about" placeholder="Tentang saya" style="margin-bottom:10px;"><?php echo ($ident_data !== false) ? $row2->about: '';?></textarea>
                <span class="help-block">Minimum: 10 characters</span>
              </div>
            </div>
            <div class="form-group">
              <label for="avatar" class="col-sm-4 control-label">Foto Profil</label>
              <div class="col-sm-7 cur-avatar">
				<?php
		        if ($ident_data == false || $row2->avatar == '') { ?>
		          <img src="<?php echo base_url().'images/nobody.jpg';?>" alt="">
		          <input type="hidden" name="cur_avatar" value="">
		        <?php 
		        } else { ?>
		          <img src="<?php echo base_url().'images/profil_photo/'.$row2->avatar;?>" alt="">
		          <input type="hidden" name="cur_avatar" value="<?php echo $row2->avatar; ?>">
		          <a href="../../../Workers/removing_photo/<?php echo $row2->avatar.'/'.$row2->id_worker;?>" class="a-photo"><i class="glyphicon glyphicon-remove"></i>Hapus gambar</a>
		        <?php }
		        ?>
                <input type="file" id="avatar" name="avatar" placeholder="Upload gambar">
              </div>
            </div>
            <div class="form-group pull-right">
              <div class="col-sm-offset-2 col-sm-10">
                <button name="ins_ident" type="submit" class="btn btn-default" style="float:left;">Save changes</button>
              </div>
            </div>
          <?php
          echo form_close();
          ?>
      </div>
    </div><!-- col -->
</div>
