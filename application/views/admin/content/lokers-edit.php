<?php
if ($post_data !== false) {
  foreach ($post_data as $post) {}
}
?>
        <!-- page content -->
                <div class="dev-page-content">                    
                    <!-- page content container -->
                    <div class="container">
                        
                        <!-- page title -->
                        <div class="page-title">
                            <h1><?php echo $post->post_title;?></h1>
                            <p>By <?php echo $post->company_name?></p>
                            
                            <ul class="breadcrumb">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="../../">Loker Management</a></li>
                                <li><?php echo $post->post_title;?></li>
                            </ul>
                        </div>                        
                        <!-- ./page title -->
                        
                        <div class="wrapper">                   
                            <div class="row row-wider">
                                <div class="col-md-3">
                                    <div class="profile margin-bottom-0">
                                        <div class="profile-image">
                                            <?php
                                            if ($post_data == false || $post->avatar == '') { ?>
                                              <img src="<?php echo base_url().'images/nobody.jpg';?>" alt="">
                                            <?php 
                                            } else { ?>
                                              <img src="<?php echo base_url().'images/profil_photo/'.$post->avatar;?>" alt="">
                                            <?php } ?>
                                        </div>
                                        <div class="profile-info">
                                            <h4><?php echo $post->company_name;?></h4>
                                        </div>
                                    </div>
                                    
                                    <div class="list-group">
                                        <a href="#" class="list-group-item active"><i class="fa fa-wrench"></i> Edit Loker</a>
                                        <a href="../../deleting/<?php echo $post->id_post;?>" class="list-group-item"><i class="fa fa-remove"></i> Delete Loker</a>                           
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <?php
                                    echo form_open_multipart('adm/lokers/editing/'.$post->id_post);
                                    ?>
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
                                    <div class="page-subtitle margin-bottom-0">
                                        <h3>Loker details</h3>
                                    </div>
                                    <div class="form-group-one-unit margin-bottom-40">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group form-group-custom">
                                                    <label>Judul Lowongan</label>
                                                    <input name="post_title" type="text" class="form-control" value="<?php echo $post->post_title;?>"/>                                            
                                                </div>                        
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-group-custom">
                                                    <label for="username">Pemilik lowongan</label>
                                                      <select class="form-control" name="id_company" placeholder="Company poster">
                                                        <option>Pilih perusahaan</option>
                                                          <?php
                                                          foreach ($companies as $comp) { ?>
                                                            <option <?php echo ($comp->id_company == $post->id_company) ? 'selected="selected"' : ''; ?> value="<?php echo $comp->id_company;?>"><?php echo $comp->company_name;?></option>
                                                          <?php 
                                                          }
                                                          ?>
                                                      </select>
                                                </div>                        
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-group-custom">
                                                    <label for="email">Kategori Pekerjaan</label>
                                                    <select class="form-control" name="category" id="category">
                                                     <option>Pilih kategori pekerjaan</option>
                                                      <?php
                                                      foreach ($cat_data as $cat) {
                                                        $cur_id = $cat->id_category;
                                                        $sub_cat = $this->Job->get_subs($cur_id);
                                                      ?>
                                                        <optgroup label="<?php echo $cat->category_name; ?>"> 
                                                          <?php foreach ($sub_cat as $sub) { ?> 
                                                          <option <?php echo ($sub->id_sub_category == $post->id_job_category) ? 'selected="selected"' : ''; ?>  value="<?php echo $sub->id_sub_category; ?>"><?php echo $sub->sub_category_name; ?></option>
                                                          <?php } ?>
                                                        </optgroup>
                                                      <?php } ?>
                                                   </select>
                                                </div>                        
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group form-group-custom">
                                                    <label>Gaji yang ditawarkan</label>
                                                    <input name="salary" type="number" class="form-control" value="<?php echo $post->salary;?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-group-custom">
                                                    <label>Deadline</label>
                                                    <input name="deadline" type="date" class="form-control" value="<?php echo $post->deadline;?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-group-custom">
                                                    <label>Post ID Number</label>
                                                    <input disabled type="text" class="form-control" value="<?php echo $post->id_post;?>"/>
                                                    <input type="hidden" value="<?php echo $post->id_post;?>" name="id"/>
                                                    <input type="hidden" value="<?php echo $post->id_company;?>" name="id_company"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-group-custom">
                                                  <label>Domisili Pekerjaan</label>
                                                  <select class="form-control" name="location" id="location" style="width:100%; height:20%;" >
                                                     <option>Pilih lokasi pekerjaan</option>
                                                      <?php
                                                    foreach ($prov_data as $prov) { //PROVINCE LOOPING
                                                      $cur_id = $prov->id_province;
                                                      $cities = $this->Location->get_cities($cur_id); ?>
                                                      <optgroup label="<?php echo $prov->province_name; ?>"> 
                                                      <?php
                                                      foreach ($cities as $city) { ?> //CITY IN CURRENT PROVINCE LOOPING 
                                                        <option <?php echo ($city->id_city == $post->id_location) ? 'selected="selected"' : ''; ?> value="<?php echo $city->id_city; ?>"><?php echo $city->city_name;?></option>   
                                                      <?php }
                                                      ?>
                                                      </optgroup>
                                                      <?php } 
                                                      ?>
                                                   </select>
                                               </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group form-group-custom">
                                                    <label>Deskripsi Pekerjaan</label>
                                                    <textarea name="description" class="form-control"><?php echo $post->description;?></textarea> 
                                                </div>                        
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-group-custom">
                                                    <label>Berkas Pendukung</label><br>
                                                    <?php
                                                    if ($post->file!=='') { ?>
                                                      File saat ini: <a href="<?php echo base_url().'files/loker/'.$post->file;?>"><?php echo $post->file;?></a><br>
                                                      <a href="../../remove_file/<?php echo $post->file.'/'.$post->id_post?>"><i class="fa fa-remove"></i>Hapus file</a>  
                                                    <?php }
                                                    ?>
                                                    <input type="file" class="form-control" name="file"/>                                            
                                                </div>                        
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-group-custom">
                                                    <label>Keterangan Berkas</label>
                                                    <input type="text" class="form-control" value="<?php echo $post->file_desc;?>" name="file_desc"/>                                            
                                                </div>                        
                                            </div>
                                        </div>                                                              
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">                                            
                                            <button type="submit" name="save" class="btn btn-danger pull-right">Save</button>
                                            <?php echo form_close();?>
                                        </div>
                                    </div>  

                                    <div class="page-subtitle margin-bottom-0">
                                        <h3>Pekerja di Lowongan "<?php echo $post->post_title;?>" <span class="badge badge-info"><?php echo $app_count;?></span> </h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <?php
                                        if ($job_data == false) { ?>
                                            <div class="col-sm-12" style="margin-bottom:20px;">
                                              <label class="label label-danger">Belum ada pekerja yang mendaftar lowongan.</label>
                                            </div>
                                        <?php } else { 
                                            foreach ($job_data as $job) { ?>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"><a href="<?php echo base_url()?>adm/workers/edit/<?php echo $job->id_worker.'/'.$job->username?>"><?php echo $job->fullname;?></a></h3>
                                                </div>
                                                <div class="panel-body" style="line-height: 20px;">
                                                    <div class="col-md-6">
                                                        <b>Tanggal review dan rating:</b> <?php echo ($job->review_date) ? date('j M Y', strtotime($job->review_date)) : 'Belum dirating';?></i><br>
                                                        <i><b>Rating</b> <?php echo $job->stars;?><br>
                                                        <b>Review:</b><br> <?php echo($job->review) ? '"'.$job->review.'"' : '-'?>
                                                    </div>
                                                    <div class="col-md-6">  
                                                        <i><b>Tanggal melamar:</b> <?php echo date('j M Y', strtotime($job->hire_date));?></label><br>
                                                        <b>Status:</b> <?php echo $job->status;?><br>
                                                        <b>Gaji yang ditawarkan:</b> IDR <?php setlocale(LC_MONETARY, 'id_ID'); echo number_format($job->salary) ;?></i>
                                                    </div>
                                                    <div class="col-md-5" style="margin-top: 30px;">
                                                        <?php
                                                        if ($job->store) { ?>
                                                            <label class="label label-success">2,5% sudah disetor</label>      
                                                        <?php } else {
                                                        ?>
                                                        <a href="../../store/<?php echo $job->id_hired;?>"><i class="fa fa-check"></i>Tandai sudah menyetor 2,5% penghasilan</a>
                                                        <?php } ?>
                                                    </div>
                                                </div>                                        
                                            </div>
                                            <?php } } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>