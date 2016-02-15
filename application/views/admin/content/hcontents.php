<!-- page content -->
                <div class="dev-page-content">                    
                    <!-- page content container -->
                    <div class="container">
                        
                        <!-- page title -->
                        <div class="page-title">
                            <h1>Slider Images</h1>
                            <p>Awesome gallery powered by isotope plugin</p>
                            
                            <ul class="breadcrumb">
                                <li><a href="dashboard">Dashboard</a></li>
                                <li><a href="#">Home Content Management</a></li>
                            </ul>
                        </div>                        
                        <!-- ./page title -->
                        
                        <!-- gallery powered by isotope -->
                        <div class="gallery isotope" id="gallery">
                            <?php
                                if ($sliders) {
                                foreach ($sliders as $slider) { ?>
                                    <div class="gallery-item">
                                        <img src="<?php echo base_url().'assets/images/slider/'.$slider->img;?>">
                                        <a href="hcontents/removing_im/<?php echo $slider->img.'/'.$slider->id_img;?>"><i class="fa fa-remove"></i> Remove image</a>
                                    </div>                              
                                <?php } }
                                ?>
                        </div>

                        <div class="page-title">
                            <h1>Input New Image</h1>
                        </div>                        
                        <div class="row">
                            <div class="col-md-12">
                              <div class="wrapper wrapper-white">
                                  <?php
                                    if ($this->session->flashdata('msg')) { ?>
                                <div clas="row">
                                    <div class="col-md-9">
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <?php echo $this->session->flashdata('msg');?>
                                        </div>
                                    </div>
                                </div>
                                <?php } if ($this->session->flashdata('warn')) { ?>
                                <div clas="row">
                                    <div class="col-md-9">
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <?php echo $this->session->flashdata('warn');?>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                  <label class="alert alert-warning">Please upload with following extension: .gif, .jpg or .png</label>
                                  <label class="alert alert-warning">Image orientation must be (landscape).</label>
                                  <label class="alert alert-warning">MIN width : 800. Max height: 500.</label>
                                  <?php
                                  $attributes = array('class' =>'form-horizontal', 'data-toggle' => 'validator');
                                  echo form_open_multipart('adm/hcontents/inserting_im', $attributes);
                                  ?>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <div class="form-group">
                                            <input type="file" class="form-control" id="image" name="image" placeholder="Image file">
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label></label>
                                              <button name="ins_im" type="submit" class="btn btn-default">Regrister new image</button>
                                              <?php echo form_close(); ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>

                        <div class="page-title">
                            <h1>Contacts Information</h1>
                        </div>                        
                        <div class="row">
                            <div class="col-md-12">
                              <div class="wrapper wrapper-white">
                                  <?php
                                    if ($this->session->flashdata('msg')) { ?>
                                <div clas="row">
                                    <div class="col-md-9">
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <?php echo $this->session->flashdata('msg');?>
                                        </div>
                                    </div>
                                </div>
                                <?php } if ($this->session->flashdata('warn')) { ?>
                                <div clas="row">
                                    <div class="col-md-9">
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <?php echo $this->session->flashdata('warn');?>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                  <?php
                                  $attributes = array('class' =>'form-horizontal', 'data-toggle' => 'validator');
                                  echo form_open_multipart('adm/hcontents/inserting_co', $attributes);
                                  foreach ($contacts as $cont) {}
                                  ?>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <div class="form-group">
                                            <label>Twitter username (without @)</label>
                                            <input type="text" class="form-control" name="twitter" value="<?php echo ($contacts) ? $cont->twitter : '';?>">
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                            <label>Facebook page link</label>
                                            <input type="text" class="form-control" name="facebook" value="<?php echo ($contacts) ? $cont->facebook : '';?>">
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                            <label>Google+ page link</label>
                                            <input type="text" class="form-control" name="google" value="<?php echo ($contacts) ? $cont->google : '' ;?>">
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                            <label>E-mail Address</label>
                                            <input type="text" class="form-control" name="email" value="<?php echo ($contacts) ? $cont->email : '' ;?>">
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                            <label>Telp Number</label>
                                            <input type="text" class="form-control" name="telp" value="<?php echo ($contacts) ? $cont->telp : '' ;?>">
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label></label>
                                              <button name="ins_im" type="submit" class="btn btn-default">Update contact information</button>
                                              <?php echo form_close(); ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                        </div>
                        <!-- ./gallery powered by isotope -->
                    