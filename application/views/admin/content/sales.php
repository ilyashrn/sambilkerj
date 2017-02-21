
<!-- page content -->
        <div class="dev-page-content">                    
            <!-- page content container -->
            <div class="container">
                
                <div class="row">
                    <div class="col-md-12">
                        <!-- ./Custom Form Layout -->
                        <div class="page-title">
                            <h1>Sales Management</h1>
                            <p>Sortable features for sales tables</p>
                            
                            <ul class="breadcrumb">
                                <li><a href="dashboard">Dashboard</a></li>
                                <li><a href="#">Sales management</a></li>
                            </ul>
                        </div>                        
                        <!-- ./page title -->
                        
                        <!-- Custom Form Layout -->
                        <div class="wrapper wrapper-white">
                            <div class="page-subtitle">
                                <h3>New Record for Sales</h3>
                                <p>Input the sales data you want.</p>
                            </div>
                        </div>
                        <?php
                        echo form_open('sales/inserting');?>
                        <!-- basic form elements -->
                        <div class="wrapper">
                            <div class="row">
                                <div class="col-md-4">                        
                                    <div class="form-group">
                                        <label>Attribute name</label>                                
                                        <select name="attribute" class="form-control selectpicker" placeholder="Please select the attribute">
                                        <?php
                                        foreach ($attribute_data as $attr) { ?>
                                            <option value="<?php echo $attr->id_attr;?>"><?php echo $attr->attribute_name?></option>
                                        <?php }
                                        ?>
                                        </select>
                                    </div>                        
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="number" name="quantity" class="form-control" placeholder="Quantity of attribute"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Sold cost</label>
                                        <input type="number" id="withdraw" name="cost" class="form-control" placeholder="Sold Nominal in IDR">
                                    </div>
                                </div>                        
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default">Regrister the sale record</button>
                                    </div>
                                    <?php
                                    echo form_close();?>
                                </div>
                            </div>
                        
                        <!-- datatables plugin -->
                        <div class="wrapper wrapper-white">
                            <div class="page-subtitle">
                                <h3>Sales per Attribute Table</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sortable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Attribute name</th>
                                            <th>Sold Quantity</th>
                                            <th>Sold Cost</th>
                                            <th>Last updated</th>
                                        </tr>
                                    </thead>                               
                                    <tbody>
                                        <?php
                                        if ($attr_sal !== false) {
                                        foreach ($attr_sal as $user) { ?>
                                        <tr>
                                            <td><?php echo $user->id_attr;?></td>
                                            <td><?php echo $user->attribute_name;?></td>
                                            <td><?php echo ($user->sold_q == '') ? '<span class="btn btn-danger btn-xs">Currently not sold</span>': '<b>'.$user->sold_q.'</b> '.$user->kind_of_unit;?></td>
                                            <td><?php echo ($user->sold_cost == '') ? '<span class="btn btn-danger btn-xs">Currently not sold</span>': 'Rp '.number_format($user->sold_cost).',00';?></td>
                                            <td><?php echo ($user->timestamp == '') ? '<span class="btn btn-danger btn-xs">Currently not sold</span>': $user->timestamp;?></td>
                                        </tr>
                                        <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>                        
                        <!-- ./datatables plugin -->
                        
                        <!-- datatables plugin -->
                        <div class="wrapper wrapper-white">
                            <div class="page-subtitle">
                                <h3>Sales Record Table</h3>
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
                                            <th>User</th>
                                            <th>timestamp</th>
                                            <th>Attribute name</th>
                                            <th>Sold Quantity</th>
                                            <th>Sold cost</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>                               
                                    <tbody>
                                        <?php
                                        if ($sales_data !== false) {
                                        foreach ($sales_data as $user) { ?>
                                        <tr>
                                            <td><?php echo $user->id_sale;?></td>
                                            <td><?php echo $user->username;?></td>
                                            <td><?php echo $user->timestamp;?></td>
                                            <td><b><?php echo $user->attribute_name;?></b></td>
                                            <td><?php echo $user->quantity.' '.$user->kind_of_unit;?></td>
                                            <td><b><?php echo setlocale(LC_MONETARY, 'id_ID'); echo 'Rp '.number_format($user->cost).',00';?></b></td>
                                            <td>
                                                <a class="btn btn-primary btn-xs" href="sales/edit/<?php echo $user->id_sale;?>">edit</a>
                                                <a class="btn btn-danger btn-xs" href="sales/deleting/<?php echo $user->id_sale;?>">delete</a>
                                            </td>
                                        </tr>
                                        <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>                        
                        <!-- ./datatables plugin -->

                    </div>
                </div>