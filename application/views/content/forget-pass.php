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
									<h3>Forget <span class="text-default">password akun</span></h3>
									<p>Masukkan e-mail yang didaftarkan ke <span class="text-default">SambilKerja.com</span>, kami akan mengirimkan password anda yang baru.</p>
									<!-- <span class="text-default lg"><a href="../Main/new_user">Daftar sekarang</a></span> | <span class="text-default lg"><a href="forget_pass">Lupa password</a></span> -->
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
										<fieldset>
											<h6>Masukkan e-mail:</h6>
								            <input type="search" name="search" placeholder="Your E-mail Address and press enter">
								            <input type="submit" name="submit" value="" style="position: absolute;left: -99999px;">
								        </fieldset>
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