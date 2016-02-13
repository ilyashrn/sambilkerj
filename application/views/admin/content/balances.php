    <!-- page content -->
        <div class="dev-page-content">                    
            <!-- page content container -->
            <div class="container">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title">
                            <h1>Mutation Management</h1>
                            <p>Sortable features for balances tables. Balances let you know .</p>
                            
                            <ul class="breadcrumb">
                                <li><a href="dashboard">Dashboard</a></li>
                                <li><a href="#">Mutation management</a></li>
                            </ul>
                        </div>                        
                        <!-- ./page title -->
                        
                        <!-- datatables plugin -->
                        <div class="wrapper wrapper-white">
                            <div class="page-subtitle">
                                <h3>Mutation Record Table</h3>
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
                            <?php    } ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sortable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Timestamp</th>
                                            <th>User</th>
                                            <th>Description</th>
                                            <th>Mutation</th>
                                            <th>Mutation type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>                               
                                    <tbody>
                                        <?php
                                        if ($balances_data !== false) {
                                        
                                        foreach ($balances_data as $user) { ?>
                                        <tr>
                                            <td><?php echo $user->id_bal;?></td>
                                            <td><?php echo $user->timestamp;?></td>
                                            <td><?php echo $user->username;?></td>
                                            <td><b><?php echo $user->mut_desc;?></b></td>
                                            <td><?php echo ($user->mutation_type == 'withdraw') ? ' <span class="btn btn-xs btn-warning ">withdraw</span>' : ' <span class="btn btn-xs btn-success">deposito</span>';?></td>
                                            <td><b><?php echo setlocale(LC_MONETARY, 'id_ID'); echo 'Rp '.number_format($user->mutation).',00';?></b></td>
                                            <!-- <td><b><?php echo setlocale(LC_MONETARY, 'id_ID'); echo 'Rp '.number_format($user->current_balance).',00';?></b></td> -->
                                            <td>
                                                <a class="btn btn-danger btn-xs" href="balances/deleting/<?php echo $user->id_bal;?>">delete</a>
                                            </td>
                                        </tr>
                                        <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>                        
                        <!-- ./datatables plugin -->

                        <!-- Custom Form Layout -->
                        <div class="page-title">
                            <h1>New Mutation Regristration</h1>
                            <p>Input the mutation data you did.</p>
                        </div>
                        <div class="wrapper wrapper-white">
                            <div class="form-group-one-unit">
                                <?php
                                $balances = array('id' => "validate");
                                echo form_open('balances/inserting',$balances);
                                ?>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group form-group-custom form-control-clear">
                                            <label>Mutation number <span>IDR</span></label>
                                            <input type="number" class="form-control" placeholder="Mutation number" name="mutation"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-custom form-control-clear">
                                            <label>Mutation description<span>describe the mutation</span></label>
                                            <input type="text" class="form-control" placeholder="placeholder"/ name="mut_desc">
                                        </div>
                                    </div>
                                    <div class="col-md-3">                        
                                        <div class="form-group form-group-custom">
                                            <label>Mutation type</label>
                                            <div class="radio">
                                                <input type="radio" name="type" id="radio3" value="withdraw" checked=""/>
                                                <label for="radio3">Withdraw</label>
                                                <input type="radio" name="type" id="radio4" value="deposito"/>
                                                <label for="radio4">Deposito</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-default">Regrister the mutation</button>
                                    <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                        <!-- ./Custom Form Layout -->

                    </div>
                </div>