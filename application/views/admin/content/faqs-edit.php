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
                        foreach ($faqs as $faq) {}
                        ?>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">                                    
                                    <div class="page-subtitle page-subtitle-centralized">
                                        <h3>Edit Question and Answer</h3>
                                    </div>
                                </div>                                
                            </div>
                            <div class="row">
                                <?php
                                echo form_open('adm/FAQS/editing/'.$faq->id_faq);?>
                                <div class="col-md-6">
                                    <div class="form-group form-group-custom">
                                        <label>Pertanyaan</label>
                                        <textarea name="question" class="form-control"><?php echo $faq->question; ?></textarea> 
                                    </div>                        
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-custom">
                                        <label>Jawaban</label>
                                        <textarea name="answer" class="form-control"><?php echo $faq->answer; ?></textarea> 
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