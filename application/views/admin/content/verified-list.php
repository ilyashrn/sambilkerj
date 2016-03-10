            <!-- page content -->
                <div class="dev-page-content">                    
                    <!-- page content container -->
                    <div class="container">
                        <div class="wrapper">
                            <div class="row">
                            <h4><?php echo $title; ?></h4>
                                <div class="col-md-3">
                                        <div class="list-group">
                                            <a href="<?php echo base_url().'adm/payments/' ?>" class="list-group-item"><i class="fa fa-angle-double-down"></i> Incoming List</a>
                                            <a href="<?php echo base_url().'adm/payments/not_paid' ?>" class="list-group-item"><i class="fa fa-remove"></i> Not yet paid</a>
                                            <a href="<?php echo base_url().'adm/payments/verified' ?>" class="list-group-item active"><i class="fa fa-check"></i> Verified</a>
                                            <a href="<?php echo base_url().'adm/payments/settings' ?>" class="list-group-item"><i class="fa fa-gear"></i> Settings</a>
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
                                            <?php if ($verified) {
                                              foreach ($verified as $inc) {   ?>
                                              <div class="timeline-item" style="width: 90%;">
                                                <div class="timeline-item-data">
                                                    <div class="col-md-6">
                                                        <p><b>Nama perusahaan</b> : <a href="../companies/edit/<?php echo $inc->id_company.'/'.$inc->cusername; ?>"><?php echo $inc->company_name?></a></p>
                                                        <p><b>Nama pekerja</b> : <a href="../workers/edit/<?php echo $inc->id_worker.'/'.$inc->username; ?>"><?php echo $inc->fullname;?></a></p>
                                                        <p><b>Judul lowongan</b> : <a href="../lokers/edit/<?php echo $inc->id_post.'/'.$inc->post_title ?>"><?php echo $inc->post_title; ?></a></p>
                                                        <p><b>Tanggal konfirmasi</b> : <?php echo $inc->confirm_time?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><b>Nominal yang ditransfer</b> : <label class="label label-info">IDR <?php echo number_format($inc->nominal) ?></label></p>
                                                        <p><b>Nama pengirim</b> : <?php echo $inc->sender; ?></p>
                                                        <p><b>Tanggal verifikasi</b> : <?php echo ($inc->verified_time == '0000-00-00 00:00:00') ? '-' : $inc->verified_time?></p>
                                                    </div>
                                                    <div class="col-md-12" style="margin-top: 10px;">
                                                        <label class="label label-success"><i class="fa fa-check"></i> Verified</label>
                                                        <a data-toggle="modal" data-target="#reply<?php echo $inc->id_payment;?>" class="btn btn-default btn-xs"><i class="fa fa-picture-o"></i> lihat Bukti transfer</a>
                                                    </div>
                                                </div>

                                                <!-- modal small -->
                                                <div class="modal fade" id="reply<?php echo $inc->id_payment;?>" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
                                                    <div class="modal-dialog modal-md">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <img style="width: 100%;" src="<?php echo base_url().'images/proof/'.$inc->proof;;?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ./modal small -->
                                               </div>
                                            <?php } } else{ ?>
                                            <div class="alert alert-warning">Anda tidak punya list tagihan terverifikasi saat ini.</div>
                                            <?php    } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>