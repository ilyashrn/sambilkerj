<script>
    $(function(){
      $('#test').select2();
    });
    $(function(){
      $('#business').select2();
    });
 </script>	


 <div class="tab-pane fade <?php echo ($tab_param == 'I') ? 'in active': '';?>" id="tab-6-6">
	<div class="col-sm-12 service-box style-3 green profil-tab">
	<div class="col-sm-12">
		<h4>Informasi Dasar</h4>	
        <?php
        $attributes = array('id' => 'fileForm','class' => 'form-horizontal','data-toggle' => 'validator');
        echo form_open_multipart('Companies/updating_ident', $attributes);
        foreach ($basic_data as $row) {}
    	if ($ident_data !== false) {
	    	foreach ($ident_data as $row2) {
	    		$dob = implode("/", array_reverse(explode("-", $row2->dob)));	
	    	}	
	    }
        ?>
          <!-- <form class="form-horizontal"> -->
            <div class="form-group">
              <label for="company_name" class="col-sm-4 control-label" >Nama Perusahaan</label>
              <div class="col-sm-7">
                <input type="text" id="company_name" name="company_name" placeholder="Nama Perusahaan" required="required"
                value="<?php echo $row->company_name;?>">
              </div>
            </div>
            <div class="form-group">
              <label for="npwp" class="col-sm-4 control-label" >NPWP</label>
              <div class="col-sm-7">
                <input type="number" id="npwp" name="npwp" placeholder="Nomor Pokok Wajib Pajak"
                value="<?php echo ($ident_data !== false) ? $row2->npwp: '';?>">
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-4 control-label" >E-mail Primer</label>
              <div class="col-sm-7">
                <input type="email" id="email" name="email" placeholder="E-mail Primer"
                value="<?php echo $row->email;?>">
              </div>
            </div>
            <div class="form-group">
              <label for="email_2nc" class="col-sm-4 control-label" >E-mail Sekunder</label>
              <div class="col-sm-7">
                <input type="email" id="secondary_email" name="secondary_email" placeholder="E-mail Sekunder"
                value="<?php echo $row->secondary_email;?>">
              </div>
            </div>
            <div class="form-group">
              <label for="telp_number" class="col-sm-4 control-label">Nomor Telepon</label>
              <div class="col-sm-7">
                <input type="text"  id="telp_number" name="telp_number" placeholder="Nomor Telepon" value="<?php echo ($ident_data !== false) ? $row2->telp_number: '';?>">
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
              <label for="address" class="col-sm-4 control-label">Alamat Lengkap</label>
              <div class="col-sm-7">
                <textarea rows="3" columns="12" id="address" name="address" placeholder="Alamat lengkap" style="margin-bottom:10px;"><?php echo ($ident_data !== false) ? $row2->address: '';?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="about" class="col-sm-4 control-label">Tentang Perusahaan</label>
              <div class="col-sm-7">
                <textarea rows="5" columns="12" data-minlength="10" id="about" name="about" placeholder="Tentang saya" style="margin-bottom:10px;"><?php echo ($ident_data !== false) ? $row2->about: '';?></textarea>
                <span class="help-block">Minimum: 10 characters</span>
              </div>
            </div>
            <div class="form-group">
              <label for="bidang" class="col-sm-4 control-label" >Bidang Kegiatan</label>
              <div class="col-sm-7">
                <input type="text" id="bidang" name="bidang" placeholder="Bidang Kegiatan Perusahaan" required="required"
                value="<?php echo $row->company_name;?>">
              </div>
            </div>
            <div class="form-group">
              <label for="bentuk_usaha" class="col-sm-4 control-label">Bentuk Usaha</label>
              <div class="col-sm-7">
                <select name="business_form" id="business" style="width:100%; height:20%;" >
                 <option>Pilih Bentuk Usaha Perusahaan</option>
                 <option <?php echo ($ident_data !== false &&  $row2->business_form == 'BUMN') ? 'selected="selected"': '';?> value="BUMN">Badan Usaha Milik Negara</option>
                 <option <?php echo ($ident_data !== false &&  $row2->business_form == 'PT') ? 'selected="selected"': '';?> value="PT">Perseroan Terbatas</option>
                 <option <?php echo ($ident_data !== false &&  $row2->business_form == 'CV') ? 'selected="selected"': '';?>value="CV">Commanditaire Vennootschap</option>
                 <option <?php echo ($ident_data !== false &&  $row2->business_form == 'Firma') ? 'selected="selected"': '';?> value="Firma">Firma</option>
                 <option <?php echo ($ident_data !== false &&  $row2->business_form == 'Perorangan') ? 'selected="selected"': '';?> value="Perorangan">Perorangan</option>
               </select>
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
		          <a href="../../../Companies/removing_photo/<?php echo $row2->id_company.'/'.$row2->avatar;?>" class="a-photo"><i class="glyphicon glyphicon-remove"></i>Hapus gambar</a>
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
