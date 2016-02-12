			<section class="full-section dark-section" id="section-19">	
				<div class="full-section-shadow-top"></div>
				<div class="full-section-shadow-bottom"></div>
				<div class="full-section-pattern"></div>
				<div class="full-section-container">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="headline login-headline">
									<img src="<?php echo base_url().'assets/images/logo.png';?>">
									<h3>Login ke <span class="text-default">SambilKerja.com</span></h3>
									<p>Login dengan menggunakan username atau email yang sudah didaftarkan.</p>
									<span class="text-default lg"><a href="../Main/new_user">Daftar sekarang</a></span> | <span class="text-default lg"><a href="forget_pass">Lupa password</a></span>
								</div><!-- headline -->
								
							</div><!-- col -->
						</div><!-- row -->
					</div><!-- container -->
					<div class="container">
						<div class="row">
							<div class="col-sm-4">
							</div><!-- col -->
							<div class="col-sm-4">
								<div class="service-box style-1 green wow fadeInDown" data-wow-delay="0.2s">
									<?php echo form_open('in/process');?>
									<h6>Username or E-mail</h6>
		                            <input id="user_username" style="margin-bottom: 15px;" type="text" name="name_email" size="30" placeholder="Username or E-mail" />
		                            <h6>Password</h6>
		                            <input id="user_password" style="margin-bottom: 15px;" type="password" name="password" size="30" placeholder="Password" />
		                            <input id="user_remember_me" style="margin-right: 5px;" type="checkbox" name="remember_me" value="1" />
		                            <label class="string optional" for="user_remember_me"> Remember me</label>
		                            <input class="btn btn-primary" style="float: right; font-size: 14px; font-weight: normal; text-transform: none;" type="submit" name="in" value="SIGN ME IN" />
		                            <?php echo form_close();?>
								</div><!-- service-box-content -->
							</div><!-- col -->
							<div class="col-sm-4">
							</div><!-- col -->
						</div><!-- row -->
					</div><!-- container -->
				</div><!-- full-section-container -->
			</section><!-- full-section -->
		</body>
		</html>