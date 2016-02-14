    <!-- page content -->
        <div class="dev-page-content">                    
            <!-- page content container -->
            <div class="container">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title">
                            <h1>Loker</h1>
                            <p>Loker Management</p>
                            <ul class="breadcrumb">
                                <li><a href="dashboard">Dashboard</a></li>
                                <li><a href="">Lokers Management</a></li>
                            </ul>
                        </div>                        
                        <!-- ./page title -->
                        
                        <!-- datatables plugin -->
                        <div class="wrapper wrapper-white">
                            <div class="page-subtitle">
                                <h3>Lokers Table</h3>
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sortable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Post Title</th>
                                            <th>Company</th>
                                            <th>Applier</th>
                                            <th>Category / Subcategory</th>
                                            <th>Deadline</th>
                                            <th>Created date</th>
                                            
                                        </tr>
                                    </thead>                               
                                    <tbody>
                                        <?php
                                        if ($users_data !== false) {
                                        foreach ($users_data as $user) { ?>
                                        <tr>
                                            <td><?php echo $user->id_post;?></td>
                                            <td><a href="<?php echo base_url()?>adm/Lokers/edit/<?php echo $user->id_post.'/'.$user->post_title?>"><?php echo $user->post_title;?></a></td>
                                            <td><a href="companies/edit/<?php echo $user->id_company.'/'.$user->username;?>"><?php echo $user->company_name;?></a></td>
                                            <td><?php echo $this->Applier->count_rows('id_job',$user->id_post);?></td>
                                            <td><?php echo $user->category_name;?> / <?php echo $user->sub_category_name;?></td>
                                            <td><?php echo $user->deadline;?></td>
                                            <td><?php echo $user->created_time;?></td>
                                        </tr>
                                        <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>                        
                        <!-- ./datatables plugin -->

                        <!-- Custom Form Layout -->
                        <div class="page-title">
                            <h1>New Loker Regristration</h1>
                            <p>Input the loker data you want.</p>
                        </div>
                        <div class="wrapper wrapper-white">
                            <?php
                            $attributes = array('class' =>'form-horizontal', 'data-toggle' => 'validator');
                            echo form_open_multipart('adm/Lokers/inserting', $attributes);
                            ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="fullname">Judul Lowongan</label>
                                      <input type="text" class="form-control" id="post_title" name="post_title" placeholder="Judul Lowongan" required="required">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="username">Perusahaan pemilik lowongan</label>
                                      <select class="form-control selectpicker" name="id_company" placeholder="Company poster">
                                        <option>Pilih perusahaan</option>
                                          <?php
                                          foreach ($companies as $comp) { ?>
                                            <option value="<?php echo $comp->id_company;?>"><?php echo $comp->company_name;?></option>
                                          <?php 
                                          }
                                          ?>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="email">Kategori Pekerjaan</label>
                                        <select class="form-control selectpicker" name="category" id="category">
                                         <option>Pilih kategori pekerjaan</option>
                                          <?php
                                          foreach ($cat_data as $cat) {
                                            $cur_id = $cat->id_category;
                                            $sub_cat = $this->Job->get_subs($cur_id);
                                          ?>
                                            <optgroup label="<?php echo $cat->category_name; ?>"> 
                                              <?php foreach ($sub_cat as $sub) { ?> 
                                              <option value="<?php echo $sub->id_sub_category; ?>"><?php echo $sub->sub_category_name; ?></option>
                                              <?php } ?>
                                            </optgroup>
                                          <?php } ?>
                                       </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Gaji yang ditawarkan</label>
                                      <input type="number" class="form-control" id="salary" name="salary" placeholder="Gaji dalam IDR">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Deadline lowongan</label>
                                      <input type="date" class="form-control" id="deadline" name="deadline" placeholder="Deadline lowongan">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Domisili Pekerjaan</label>
                                      <select class="form-control selectpicker" name="location" id="location" style="width:100%; height:20%;" >
                                         <option>Pilih lokasi pekerjaan</option>
                                          <?php
                                        foreach ($prov_data as $prov) { //PROVINCE LOOPING
                                          $cur_id = $prov->id_province;
                                          $cities = $this->Location->get_cities($cur_id); ?>
                                          <optgroup label="<?php echo $prov->province_name; ?>"> 
                                          <?php
                                          foreach ($cities as $city) { ?> //CITY IN CURRENT PROVINCE LOOPING 
                                            <option value="<?php echo $city->id_city; ?>"><?php echo $city->city_name;?></option>   
                                          <?php }
                                          ?>
                                          </optgroup>
                                          <?php } 
                                          ?>
                                       </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                  <div class="form-group">
                                      <label>Deskripsi Pekerjaan</label>
                                      <textarea placeholder="Deskripsi Kerja" rows="5" class="form-control" name="description"></textarea>
                                    </div>  
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                      <label>Berkas Pendukung</label>
                                      <input type="file" class="form-control" name="file"/>                                            
                                    </div>  
                                    <div class="form-group">
                                      <label>Keterangan Berkas (jika ada)</label>
                                      <input type="text" class="form-control" name="file_desc">
                                    </div>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button name="ins_loker" type="submit" class="btn btn-default">Regrister new loker</button>
                                    </div>
                                </div>
                            </div>
                              <?php
                              echo form_close();
                              ?>
                        </div>
                        <!-- ./Custom Form Layout -->

                    </div>
                </div>