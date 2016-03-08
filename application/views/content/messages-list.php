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
		    		<div class="col-md-12">
		    			<a class="btn btn-white" href="#collapseExample" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample"><i class="glyphicon glyphicon-plus"></i> New Message</a>

		    			<div class="collapse" id="collapseExample">
                            <div class="well">
                              <div class="row">
                              	<div class="col-md-6">
                              		<h4>New Message</h4>
                              		<p class="alert alert-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                              		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                              		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                              		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                              		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                              		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                              	</div>
                              	<div class="col-md-6">
                              		<?php echo form_open(''); ?>
                              		<div class="form-group">
                              			<select name="pob" id="pob" style="width:100%; height:20%;" >
						                   <option>Pilih penerima</option>
						                    <?php
						                  foreach ($companies as $comp) { //PROVINCE LOOPING ?> 
						                      <option value="<?php echo $comp->id_company; ?>"><?php echo $comp->company_name; ?></option>   
						                    <?php } 
						                    ?>
						                 </select>
                              		</div>	
                          			<div class="form-group">
						                <textarea class="form-control" rows="3" columns="12" id="address" name="address" placeholder="Write a new message..." style="margin-bottom:10px;"></textarea>
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
		    </div>
	    </div>