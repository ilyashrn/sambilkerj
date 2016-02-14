    <!-- page content -->
        <div class="dev-page-content">                    
            <!-- page content container -->
            <div class="container">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title">
                            <h1>Contents</h1>
                            <p>Content Management</p>
                            <ul class="breadcrumb">
                                <li><a href="dashboard">Dashboard</a></li>
                                <li><a href="">Contents Management</a></li>
                            </ul>
                        </div>                        
                        <!-- ./page title -->
                        
                        <div class="wrapper wrapper-white">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="page-subtitle">
                                <h1>New Content Regristration</h1>
                                <p>Input the content data you want.</p>
                              </div>
                              <div class="wrapper wrapper-white">
                                  <?php
                                  $attributes = array('class' =>'form-horizontal', 'data-toggle' => 'validator');
                                  echo form_open_multipart('adm/contents/inserting', $attributes);
                                  ?>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <div class="form-group">
                                            <label>Jenis Konten</label>
                                            <select onchange="yesnoCheck(this);" class="form-control selectpicker" name="content_id" id="location" style="width:100%; height:20%;" >
                                               <option>Pilih jenis kontent</option>
                                               <option value="1">School</option>
                                               <option value="2">Mayor</option>
                                               <option value="3">Skill</option>
                                               <option value="4">Language</option>
                                               <option value="5">Category</option>
                                               <option value="6">Sub Category</option>
                                             </select>
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="fullname">Nama Konten</label>
                                            <input type="text" class="form-control" id="content" name="content" placeholder="Nama Konten">
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div id="ifYes" class="form-group" style="display: none;">
                                            <label for="fullname">Category</label>
                                            <select class="form-control selectpicker" name="category">
                                              <option>Pilih Kategori</option>
                                              <?php
                                              foreach ($cat_set as $ct) { ?>
                                                <option value="<?php echo $ct->id_category;?>"><?php echo $ct->category_name;?></option>
                                              <?php }
                                              ?>
                                            </select>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <button name="ins_cont" type="submit" class="btn btn-default">Regrister new content</button>
                                          </div>
                                      </div>
                                       <script>
                                            function yesnoCheck(that) {
                                                if (that.value == "6") {
                                                    document.getElementById("ifYes").style.display = "block";
                                                } else {
                                                    document.getElementById("ifYes").style.display = "none";
                                                }
                                            }
                                        </script>
                                  </div>
                                    <?php
                                    echo form_close();
                                    ?>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- datatables plugin -->
                        <div class="wrapper wrapper-white">
                            <div clas="row">
                                  <div class="col-md-12">
                                      <div class="alert alert-warning alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          <p>Press <i class="fa fa-remove"> button</i> to remove from entry. </p>
                                      </div>
                                  </div>
                              </div>
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
                          <div class="row">
                            <div class="col-md-6">
                              <div class="page-subtitle">
                                <h3>Schools Set Table</h3>
                              </div>
                              <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-sortable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>School name</th>
                                            </tr>
                                        </thead>                               
                                        <tbody>
                                            <?php
                                            if ($sch_set !== false) {
                                            foreach ($sch_set as $sch) { ?>
                                            <tr>
                                                <td><?php echo $sch->id_school;?></td>
                                                <td><?php echo $sch->school_name;?> <a href="contents/deleting/1/<?php echo $sch->id_school;?>"><i class="fa fa-remove"></i></a></td>
                                            </tr>
                                            <?php } } ?>
                                        </tbody>
                                    </table>
                                </div> <!-- table-responsive -->
                            </div> <!-- col-md-6 -->
                            <div class="col-md-6">
                              <div class="page-subtitle">
                                <h3>Mayors Set Table</h3>
                              </div>
                              <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-sortable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Mayor name</th>
                                            </tr>
                                        </thead>                               
                                        <tbody>
                                            <?php
                                            if ($may_set !== false) {
                                            foreach ($may_set as $may) { ?>
                                            <tr>
                                                <td><?php echo $may->id_mayor;?></td>
                                                <td><?php echo $may->mayor_name;?> <a href="contents/deleting/2/<?php echo $may->id_mayor;?>"><i class="fa fa-remove"></i></a></td>
                                            </tr>
                                            <?php } } ?>
                                        </tbody>
                                    </table>
                                </div> <!-- table-responsive -->
                              </div> <!-- col-md-6 -->
                          </div> <!-- row -->

                          <div class="row">
                            <div class="col-md-6">
                              <div class="page-subtitle">
                                <h3>Skills Set Table</h3>
                              </div>
                              <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-sortable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Skill name</th>
                                            </tr>
                                        </thead>                               
                                        <tbody>
                                            <?php
                                            if ($skill_set !== false) {
                                            foreach ($skill_set as $skill) { ?>
                                            <tr>
                                                <td><?php echo $skill->id_skill;?></td>
                                                <td><?php echo $skill->skill_name;?> <a href="contents/deleting/3/<?php echo $skill->id_skill;?>"><i class="fa fa-remove"></i></a></td>
                                            </tr>
                                            <?php } } ?>
                                        </tbody>
                                    </table>
                                </div> <!-- table-responsive -->
                            </div> <!-- col-md-6 -->
                            <div class="col-md-6">
                              <div class="page-subtitle">
                                <h3>Languages Set Table</h3>
                              </div>
                              <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-sortable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Language name</th>
                                            </tr>
                                        </thead>                               
                                        <tbody>
                                            <?php
                                            if ($lang_set !== false) {
                                            foreach ($lang_set as $lang) { ?>
                                            <tr>
                                                <td><?php echo $lang->id_language;?></td>
                                                <td><?php echo $lang->language_name;?> <a href="contents/deleting/4/<?php echo $lang->id_language;?>"><i class="fa fa-remove"></i></a></td>
                                            </tr>
                                            <?php } } ?>
                                        </tbody>
                                    </table>
                                </div> <!-- table-responsive -->
                              </div> <!-- col-md-6 -->
                          </div> <!-- row -->

                          <div class="row">
                            <div class="col-md-5">
                              <div class="page-subtitle">
                                <h3>Job Categories Set Table</h3>
                              </div>
                              <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-sortable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Category name</th>
                                            </tr>
                                        </thead>                               
                                        <tbody>
                                            <?php
                                            if ($cat_set !== false) {
                                            foreach ($cat_set as $cat) { ?>
                                            <tr>
                                                <td><?php echo $cat->id_category;?></td>
                                                <td><?php echo $cat->category_name;?> <a href="contents/deleting/5/<?php echo $cat->id_category;?>"><i class="fa fa-remove"></i></a></td>
                                            </tr>
                                            <?php } } ?>
                                        </tbody>
                                    </table>
                                </div> <!-- table-responsive -->
                            </div> <!-- col-md-3 -->
                            <div class="col-md-7">
                              <div class="page-subtitle">
                                <h3>Sub Categories Set Table</h3>
                              </div>
                              <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-sortable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Sub Category name</th>
                                                <th>Category name</th>
                                            </tr>
                                        </thead>                               
                                        <tbody>
                                            <?php
                                            if ($sub_set !== false) {
                                            foreach ($sub_set as $sub) { ?>
                                            <tr>
                                                <td><?php echo $sub->id_sub_category;?></td>
                                                <td><?php echo $sub->sub_category_name;?> <a href="contents/deleting/6/<?php echo $sub->id_sub_category;?>"><i class="fa fa-remove"></i></a></td>
                                                <td><?php echo $sub->category_name;?></td>
                                            </tr>
                                            <?php } } ?>
                                        </tbody>
                                    </table>
                                </div> <!-- table-responsive -->
                              </div> <!-- col-md-3 -->
                          </div> <!-- row -->
                        </div>                        
                        <!-- ./datatables plugin -->

                        <!-- Custom Form Layout -->
                        <!-- ./Custom Form Layout -->

                    </div>
                </div>