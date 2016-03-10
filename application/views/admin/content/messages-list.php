            <!-- page content -->
                <div class="dev-page-content">                    
                    <!-- page content container -->
                    <div class="container">
                        <div class="wrapper">
                            <div class="row">
                            <h4>Messaging</h4>
                                <div class="alert alert-info">Anda bisa mengirim pesan ke perusahaan dengan membuka halaman profil perusahaan di Admin Panel ini</div>
                                <div class="col-md-3">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item active"><i class="fa fa-inbox"></i> Inbox</a>
                                            <a href="messages/replies" class="list-group-item"><i class="fa fa-paper-plane"></i> Sent Messages</a>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-9">
                                        <div class="timeline">
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
                                        </div>
                                        <div class="timeline">                            
                                            <?php if ($messages) {
                                              foreach ($messages as $mes) {   ?>
                                              <div class="timeline-item" style="width: 90%;">
                                                <div class="timeline-item-data">
                                                    <h4>From <?php echo $mes->company_name?></h4>
                                                    <p><?php echo $mes->message_content;?></p>
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#reply<?php echo $mes->id_message;?>">Reply</button>
                                                    <a href="messages/delete/<?php echo $mes->id_message ?>">Delete</a>
                                                    <span class="pull-right"><?php echo $mes->timestamp?></span>
                                                </div>
                                               </div>

                                               <!-- modal small -->
                                                <div class="modal fade" id="reply<?php echo $mes->id_message;?>" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                <h4 class="modal-title" id="smallModalHead">Reply to <b><?php echo $mes->company_name;?></b></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?php echo form_open('adm/messages/send'); ?>
                                                                <div class="form-group">
                                                                    <textarea class="form-control" name="content"></textarea>
                                                                    <input type="hidden" name="receiver" value="<?php echo $mes->id_sender;?>"></input>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="submit" class="btn btn-default" value="send"></input>
                                                                </div>
                                                                <?php echo form_close(); ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ./modal small -->
                                            <?php } } else{ ?>
                                            <div class="alert alert-warning">Anda tidak punya pesan saat ini</div>
                                            <?php    } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>