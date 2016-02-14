<!-- page content -->
                <div class="dev-page-content">                    
                    <!-- page content container -->
                    <div class="container">                                                                        
                        
                        <!-- page title -->
                        <div class="page-title">
                            <h1>Hak dan Kewajiban</h1>
                            
                            <ul class="breadcrumb">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Content Management</a></li>
                                <li>Hak dan Kewajiban</li>
                            </ul>
                        </div>                        
                        <!-- ./page title -->
                        
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
                                <?php } ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                    echo form_open('adm/terms/inserting_hak');?>
                                    <h3>Input Hak baru</h3>
                                    <div class="form-group form-group-custom">
                                        <label>Hak</label>
                                        <input type="text" name="hak" class="form-control"> 
                                    </div>               
                                    <div class="form-group">
                                        <input type="submit" value="SUBMIT HAK BARU" class="form-control" name="faq">
                                        <?php echo form_close();?>
                                    </div>                                 
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    echo form_open('adm/terms/inserting_kew');?>
                                    <h3>Input Kewajiban baru</h3>
                                    <div class="form-group form-group-custom">
                                        <label>Kewajiban</label>
                                        <input type="text" name="kewajiban" class="form-control"> 
                                    </div>                        
                                    <div class="form-group">
                                        <input type="submit" value="SUBMIT KEWAJIBAN BARU" class="form-control" name="faq">
                                        <?php echo form_close();?>
                                    </div>                        
                                </div>
                            </div>
                        </div>
                        
                        <div class="wrapper">
                            <div class="row">                                
                                <div class="col-md-12">
                                                                                                            
                                    <div class="faq">
                                        <h2>Hak</h2>
                                        <?php
                                        if (!$hak) { ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="label label-danger">Belum ada daftar hak yang disetor ke database.</label>
                                            </div>
                                        </div>
                                        <?php } else {
                                            foreach ($hak as $h) { ?>
                                                <div class="faq-item">
                                                    <div class="faq-title"> <a href="terms/deleting/id_hak/hak/<?php echo $h->id_hak;?>"><i class="fa fa-remove"></i></a> <?php echo $h->hak;?></div>
                                                </div>
                                        <?php } } ?>

                                        <h2>Kewajiban</h2>
                                        <?php
                                        if (!$kewajiban) { ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="label label-danger">Belum ada daftar kewajiban yang disetor ke database.</label>
                                            </div>
                                        </div>
                                        <?php } else {
                                            foreach ($kewajiban as $k) { ?>
                                                <div class="faq-item">
                                                    <div class="faq-title"> <a href="terms/deleting/id_kewajiban/kewajiban/<?php echo $k->id_kewajiban;?>"><i class="fa fa-remove"></i></a> <?php echo $k->kewajiban;?></div>
                                                </div>
                                        <?php } } ?>
                                    </div>                                    
                                    
                                </div>
                            </div>
                        </div>