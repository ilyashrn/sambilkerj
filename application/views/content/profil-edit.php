<div id="page-content">
				<div class="container">
				<div class="row">
					<div class="col-sm-12">
						
						<div class="vertical-tabs big-tabs">
						
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab-6-6" data-toggle="tab"><i class="mt-icon-films"></i>Informasi Diri</a></li>
								<li><a href="#tab-6-2" data-toggle="tab"><i class="mt-icon-code"></i>Pengaturan Akun</a></li>
								<li><a href="#tab-6-3" data-toggle="tab"><i class="mt-icon-stars"></i>Hapus Akun</a></li>
								<li><a href="#tab-6-4" data-toggle="tab"><i class="mt-icon-folder1"></i>Multi purpose</a></li>
								<li><a href="#tab-6-5" data-toggle="tab"><i class="mt-icon-tablet1"></i>Retina Ready</a></li>
							</ul>                                            
						
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab-6-6">
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
										
								</div><!-- tab-pane -->
								<div class="tab-pane fade" id="tab-6-2">
									
									<h4>Vestibulum posuere nulla quis faucibus <br class="hidden-xs"> eu justo laoreet. <span class="text-default">Enjoy.</span></h4>
									
									<br>
									
									<p>Donec tempus lobortis nibh. Mauris ac massa in sem ultrices suscipit. Maecenas pretium non justo at fermentum. Cras 
									blandit mauris suscipit nunc placerat venenatis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per 
									inceptos himenaeos. In hendrerit purus vitae erat iaculis, a aliquam dui sodales. Ut vel eros lacus. Ut dapibus et massa 
									non scelerisque. Sed pharetra libero vitae mollis fermentum.</p>
									
									<p>Maecenas nec ornare eros, sed mattis lacus. Vestibulum a neque quam. Nunc mattis, lorem fermentum lobortis egestas, ipsum elit ultrices mi, quis elementum metus eros non elit rhoncus augue.</p>
									
									<br>
									
									<a class="btn btn-default btn-xs" href="#">Creative</a>
									<a class="btn btn-blue btn-xs" href="#">Inteligent</a>
									<a class="btn btn-green btn-xs" href="#">Smart</a>
									<a class="btn btn-black btn-xs" href="#">Casual</a>
										
								</div><!-- tab-pane -->
								<div class="tab-pane fade" id="tab-6-3">
									
									<h4>Class aptent taciti sociosqu dolor <br class="hidden-xs"> litora torquent per. <span class="text-default">Enjoy.</span></h4>
									
									<br>
									
									<p>Nam et enim sodales, finibus eros id, mollis libero. Phasellus efficitur placerat ligula sit amet auctor. Vivamus 
									luctus eros non magna consectetur dapibus. Cras a pellentesque turpis, at efficitur eros. Sed pharetra nisi non lacus 
									lacinia euismod. Proin ornare enim turpis, et euismod metus sagittis ut. Integer pulvinar id velit sed laoreet. Nullam 
									ac posuere dui, eget tristique leo dictum, lacus accumsan ultricies.</p>
									
									<p>Sed pharetra libero vitae mollis fermentum. Maecenas nec ornare eros, sed mattis lacus. Vestibulum a neque quam. Nunc mattis, lorem fermentum lobortis egestas, ipsum elit ultrices mi eros non elit.</p>
									
									<br>
									
									<a class="btn btn-default btn-xs" href="#">Creative</a>
									<a class="btn btn-blue btn-xs" href="#">Inteligent</a>
									<a class="btn btn-green btn-xs" href="#">Smart</a>
									<a class="btn btn-black btn-xs" href="#">Casual</a>
										
								</div><!-- tab-pane -->
								<div class="tab-pane fade" id="tab-6-4">
									
									<h4>Mauris ac massa in sem ultrices <br class="hidden-xs"> rhoncus augue vel blandit. <span class="text-default">Enjoy.</span></h4>
									
									<br>
									
									<p>Aenean volutpat a lacus quis gravida. Donec id urna eleifend nisl gravida eleifend. Proin sollicitudin ipsum id porta 
									ullamcorper. Vestibulum lobortis nunc augue, ut rutrum tortor pulvinar eu. Pellentesque molestie sagittis velit vel 
									sagittis. Aenean vitae diam fringilla sapien consequat maximus in ut dolor. Suspendisse eget consectetur velit. Proin 
									vel ante semper, vestibulum erat vitae, accumsan eros. Maecenas semper tempus.</p>
									
									<p>Praesent ut ipsum congue, elementum diam vitae, porta odio. Etiam porta justo vitae purus viverra, et dapibus est 
									rhoncus. Aenean vehicula maximus eros, eget elementum ipsum suscipit sit amet.</p>
									
									<br>
									
									<a class="btn btn-default btn-xs" href="#">Creative</a>
									<a class="btn btn-blue btn-xs" href="#">Inteligent</a>
									<a class="btn btn-green btn-xs" href="#">Smart</a>
									<a class="btn btn-black btn-xs" href="#">Casual</a>
										
								</div><!-- tab-pane -->
								<div class="tab-pane fade" id="tab-6-5">
									
									<h4>Cras sit amet maximus augue dolor <br class="hidden-xs"> erat finibus iaculis non. <span class="text-default">Enjoy.</span></h4>
									
									<br>
									
									<p>Praesent ut ipsum congue, elementum diam vitae, porta odio. Etiam porta justo vitae purus viverra, et dapibus est 
									rhoncus. Aenean vehicula maximus eros, eget elementum ipsum suscipit sit amet. Integer tincidunt eros eu euismod 
									ullamcorper. Nullam pharetra sem sit amet consectetur tristique. Sed aliquet ante eros, id porta dui semper sed. Cras 
									sit amet maximus augue. Donec lobortis libero eget justo venenatis.</p>
									
									<p>Morbi dignissim, tortor vitae hendrerit imperdiet, metus nibh blandit mi, eget interdum nibh turpis eget tellus. In 
									facilisis tortor ante, vitae vestibulum augue sodales sagittis suscipit sit amet.</p>
									
									<br>
									
									<a class="btn btn-default btn-xs" href="#">Creative</a>
									<a class="btn btn-blue btn-xs" href="#">Inteligent</a>
									<a class="btn btn-green btn-xs" href="#">Smart</a>
									<a class="btn btn-black btn-xs" href="#">Casual</a>
										
								</div><!-- tab-pane -->
							</div><!-- tab-content -->
						
						</div><!-- vertical-tabs -->
						
					</div><!-- col -->
				</div><!-- row -->
			</div><!-- container -->
		
</div>