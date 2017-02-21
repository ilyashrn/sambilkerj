<script>
    $(function(){
      $('#receiver').select2();
    });
 </script>	
 		<div id="page-content">
		    <div id="page-header">
		        <div class="container">
		            <div class="row">
		                <div class="col-sm-12">
		                    <h4><?php echo $title ?></h4>
		                </div><!-- col -->
		            </div><!-- row -->
		        </div><!-- container -->
		    </div><!-- page-header -->

		    <div class="container">
		    	<div class="row">
		    		<div class="col-md-8">
		    			<div class="alert alert-success">
                  			Anda hanya bisa mengirim pesan ke perusahaan <strong>yang sedang anda daftar</strong> atau <strong>sedang bekerja dengan anda</strong>.
                  		</div>
		    			<a class="btn btn-white" href="#collapseExample" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample"><i class="glyphicon glyphicon-plus"></i> New Message</a>
		    			<div class="collapse" id="collapseExample">
                            <div class="well">
                              <div class="row">
                              	<div class="col-md-6">
                              		<h4>New Message</h4>
                              		<div class="alert alert-warning">
                              			Dilarang mengirimkan kontak pribadi/berhubungan langsung selain menggunakan aplikasi SambilKerja.com
                              		</div>
                              	</div>
                              	<div class="col-md-6">
                              		<?php echo form_open('Messages/send/'); ?>
                              		<div class="form-group">
                              			<select name="receiver" id="receiver" style="width:100%; height:20%;" >
						                   <option>Pilih penerima</option>
						                   <?php if ($companylist) { ?>
							                   <optgroup label="Perusahaan">
								                    <?php
								                  	foreach ($companylist as $comp) { //PROVINCE LOOPING ?> 
								                      <option value="<?php echo $comp->id_company; ?>"><?php echo $comp->company_name; ?></option>   
								                    <?php } 
								                    ?>
							                    </optgroup>
						                    <?php } if ($workerlist) { ?>
						                    	<optgroup label="Pekerja">
						                    		<?php foreach ($workerlist as $work) { ?>
						                    			<option value="<?php echo $work->id_worker.'|worker'?>"><?php echo $work->fullname ?></option>
						                    		<?php } ?>
						                    	</optgroup>
						                    <?php } if ($adminlist) { ?>
						                    	<optgroup label="Administrator">
						                    		<?php foreach ($adminlist as $adm) { ?>
						                    			<option value="<?php echo $adm->id_admin.'|admin' ?>"><?php echo $adm->administrator_name ?></option>
						                    		<?php } ?>
						                    	</optgroup>
						                    <?php } ?>
						                 </select>
                              		</div>	
                          			<div class="form-group">
						                <textarea class="form-control" rows="3" columns="12" id="content" name="content" placeholder="Write a new message..." style="margin-bottom:10px;"></textarea>
						            </div>
						            <div class="form-group">
						            	<input type="submit" class="btn btn-default" value="Send message"></input>
						            </div>
                              		<?php echo form_close(); ?>
                              	</div>
                              </div>
                            </div>
                      	</div>
	    			</div>
		    	</div>	
		    	<div class="row">
		    		<div class="col-md-12 col-sm-12 service-box style-3 green">
		    			<div class="vertical-tabs">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab-1" data-toggle="tab">INBOX</a></li>
								<li><a href="#tab-2" data-toggle="tab">SENT MESSAGES</a></li>
							</ul>                                            
							 <div class="tab-content">
								<div class="tab-pane fade in active" id="tab-1">
									<?php if (!$messages) { ?>
										<div class="alert alert-info">Anda tidak mempunyai pesan masuk apapun saat ini</div>
									<?php } else { foreach ($messages as $mes) { ?>
										<div class="col-sm-12 job-profil-box service-box style-3 default" style="padding:10px;margin-bottom:10px;">
							              <span><strong class="text-default">From: 
							              <?php if ($mem_type == 'W') {
							              	echo $mes->company_name;
							              } else {
							              	if ($mes->message_type == '1') {
							              		echo $mes->fullname;
							              	} else {
							              		echo $mes->administrator_name.'(Administrator)';
							              	}
						              	  }?></strong></span><span class="pull-right"><?php echo $mes->timestamp; ?></span>
							              <br>
							              <p><?php echo $mes->message_content ?></p>
							              <a class="pull-right" href="Messages/del/<?php echo $mes->id_message; ?>">Delete </a> 
							              <a href="#collapseExample<?php echo $mes->id_message;?>" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample"><i class=""></i> Reply </a>
							              <div class="collapse" id="collapseExample<?php echo $mes->id_message;?>">
				                            <div class="well">
				                              <div class="row">
				                              	<div class="col-md-8">
				                              		<?php echo form_open('Messages/send/'); ?>
				                          			<div class="form-group">
										                <textarea class="form-control" rows="3" columns="12" id="content" name="content" placeholder="Write reply message..." style="margin-bottom:10px;"></textarea>
										            </div>
										            <div class="col-md-6">
										            	<input type="hidden" name="receiver" value="<?php 
										            	if ($mem_type == 'W') {
											              	echo $mes->id_sender;
											              } else {
											              	if ($mes->message_type == '1') {
											              		echo $mes->id_sender.'|worker';
											              	} else {
											              		echo $mes->id_sender.'|admin';
											              	}
										              	  }?>"></input>
										            	<input type="submit" class="btn btn-default" value="Send message"></input>
										            </div>
				                              		<?php echo form_close(); ?>
				                              	</div>
				                              </div>
				                            </div>
				                      	</div>
							            </div>
									<?php } } ?>
								</div><!-- tab-pane -->
								<div class="tab-pane fade" id="tab-2">
									<?php if (!$replies) { ?>
										<div class="alert alert-info">Anda tidak mempunyai pesan keluar apapun saat ini.</div>
									<?php } else{ foreach ($replies as $mes) { ?>
										<div class="col-sm-12 job-profil-box service-box style-3 default" style="padding:10px;margin-bottom:10px;">
							              <span><strong class="text-default">To: 
							              <?php if ($mem_type == 'W') {
							              	echo $mes->company_name;
							              } else {
							              	if ($mes->message_type == '2') {
							              		echo $mes->fullname;
							              	} elseif ($mes->message_type == '3') {
							              		echo $mes->administrator_name.'(Administrator)';
							              	}
							              }?></strong></span><span class="pull-right"><?php echo $mes->timestamp; ?></span>
							              <br>
							              <p><?php echo $mes->message_content ?></p>
							              <a class="pull-right" href="Messages/del/<?php echo $mes->id_message; ?>">Delete</a>
							            </div>
									<?php } }?>
								</div><!-- tab-pane -->
							</div><!-- tab-content -->
						</div>
		    		</div>
		    	</div>
		    </div>
	    </div>