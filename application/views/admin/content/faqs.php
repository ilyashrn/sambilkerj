<!-- page content -->
                <div class="dev-page-content">                    
                    <!-- page content container -->
                    <div class="container">                                                                        
                        
                        <!-- page title -->
                        <div class="page-title">
                            <h1>Frequently Asked Questions</h1>
                            
                            <ul class="breadcrumb">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Content Management</a></li>
                                <li>F.A.Q.</li>
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
                                <div class="col-md-6 col-md-offset-3">                                    
                                    <div class="page-subtitle page-subtitle-centralized">
                                        <h3>Regrister new Question and Answer</h3>
                                    </div>
                                </div>                                
                            </div>
                            <div class="row">
                                <?php
                                echo form_open('adm/FAQS/inserting');?>
                                <div class="col-md-6">
                                    <div class="form-group form-group-custom">
                                        <label>Pertanyaan</label>
                                        <textarea name="question" class="form-control"></textarea> 
                                    </div>                        
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-custom">
                                        <label>Jawaban</label>
                                        <textarea name="answer" class="form-control"></textarea> 
                                    </div>                        
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="submit" class="form-control" name="faq">
                                        <?php echo form_close();?>
                                    </div>                        
                                </div>
                            </div>
                        </div>
                        
                        <div class="wrapper">
                            <div class="row">                                
                                <div class="col-md-12">
                                                                                                            
                                    <div class="faq">
                                        <h2><i class="fa fa-cubes"></i>  Questions List</h2>
                                        <?php
                                        if (!$faqs) { ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="label label-danger">Belum ada pertanyaan yang disetor ke database.</label>
                                            </div>
                                        </div>
                                        <?php } else {
                                            foreach ($faqs as $faq) { ?>
                                                <div class="faq-item">
                                                    <div class="faq-title"><span class="fa fa-angle-down"></span> <?php echo $faq->question;?></div>
                                                    <div class="faq-text">
                                                        <p><?php echo $faq->answer;?> </p>
                                                        <span class="pull-right"> <a href="FAQS/edit/<?php echo $faq->id_faq;?>"><i class="fa fa-pencil"></i></a> <a href="FAQS/deleting/<?php echo $faq->id_faq;?>"><i class="fa fa-remove"></i></a></span>
                                                    </div>
                                                </div>
                                        <?php } } ?>
                                    </div>                                    
                                    
                                </div>
                            </div>
                        </div>