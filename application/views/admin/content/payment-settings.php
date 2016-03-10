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
                                            <a href="<?php echo base_url().'adm/payments/verified' ?>" class="list-group-item"><i class="fa fa-check"></i> Verified</a>
                                            <a href="<?php echo base_url().'adm/payments/settings' ?>" class="list-group-item active"><i class="fa fa-gear"></i> Settings</a>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-9">
                                        <div class="page-title">
                                            <h1>Input new account</h1>
                                        </div>
                                        <div class="wrapper wrapper-white">
                                            <?php $attributes = array('class' => 'form-horizontal'); echo form_open('adm/payments/new_account',$attributes); ?>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="account_name">Bank Name</label>
                                                        <input class="form-control" type="text" name="invoice_bank" placeholder="Bank name" required></input>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="account_name">Account Name</label>
                                                        <input class="form-control" type="text" name="invoice_name" placeholder="Full name " required></input>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="number">Number</label>
                                                        <input class="form-control" type="number" name="invoice_number" placeholder="Account number" required></input>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <button name="ins_acc" type="submit" class="btn btn-default">Regrister new account</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                        <div>
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
                                        <div class="wrapper wrapper-white">
                                            <?php if ($invoice == false) { ?>
                                                <div class="alert alert-warning">Anda tidak punya list rekening saat ini.</div>
                                            <?php } else { ?>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Bank name</th>
                                                            <th>Account name</th>
                                                            <th>Account no.</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            foreach ($invoice as $inv) { ?>
                                                                <tr>
                                                                    <td><?php echo $inv->id_invoice ?></td>
                                                                    <td><?php echo $inv->invoice_bank ?></td>
                                                                    <td><?php echo $inv->invoice_name ?></td>
                                                                    <td><?php echo $inv->invoice_number ?></td>
                                                                    <td><a href="del_account/<?php echo $inv->id_invoice ?>"><i class="fa fa-remove"></i> Remove</a></td>
                                                                </tr>    
                                                            <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>           
                                            <?php } ?>                 
                                        </div>
                                    </div>
                                </div>
                            </div>