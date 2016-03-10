            <!-- page content -->
                <div class="dev-page-content">                    
                    <!-- page content container -->
                    <div class="container">
                        <div class="wrapper">
                            <div class="row">
                                <div class="col-md-3">
                                        <div class="list-group">
                                            <a href="./" class="list-group-item"><i class="fa fa-inbox"></i> Inbox</a>
                                            <a href="" class="list-group-item active"><i class="fa fa-paper-plane"></i> Sent Messages</a>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-9">
                                        <div class="timeline">                            
                                            <?php if ($replies) {
                                              foreach ($replies as $mes) {   ?>
                                              <div class="timeline-item" style="width: 90%;">
                                                <div class="timeline-item-data">
                                                    <h4>To: <?php echo $mes->company_name?></h4>
                                                    <p><?php echo $mes->message_content;?></p>
                                                    <a href="delete/<?php echo $mes->id_message ?>">Delete</a>
                                                    <span class="pull-right"><?php echo $mes->timestamp?></span>
                                                </div>
                                            </div>
                                            <?php } } else{ ?>
                                            <div class="alert alert-warning">Anda tidak punya pesan saat ini</div>
                                            <?php    } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>