
<!-- page content -->
        <div class="dev-page-content">                    
            <!-- page content container -->
            <div class="container">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title">
                            <h1>Supplies Management</h1>
                            <p>Sortable features for supplies tables</p>
                            
                            <ul class="breadcrumb">
                                <li><a href="dashboard">Dashboard</a></li>
                                <li><a href="#">Supplies management</a></li>
                            </ul>
                        </div>                        
                        <!-- ./page title -->
                        
                        <!-- datatables plugin -->
                        <div class="wrapper wrapper-white">
                            <div class="page-subtitle">
                                <h3>Supplies of Attributes Table</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sortable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Attribute name</th>
                                            <th>Current Quantity</th>
                                            <th>last updated/supplied</th>
                                        </tr>
                                    </thead>                               
                                    <tbody>
                                        <?php
                                        if ($attr_sup !== false) {
                                        foreach ($attr_sup as $user) { ?>
                                        <tr>
                                            <td><?php echo $user->id_attr;?></td>
                                            <td><?php echo $user->attribute_name;?></td>
                                            <td><?php echo $user->quantity.' '.$user->kind_of_unit;?></td>
                                            <td><?php echo $user->timestamp;?></td>
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
                                <h3>Supplies Record Table</h3>
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
                                            <th>timestamp</th>
                                            <th>Attribute name</th>
                                            <th>Quantity change</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>                               
                                    <tbody>
                                        <?php
                                        if ($supplies_data !== false) {
                                        foreach ($supplies_data as $user) { ?>
                                        <tr>
                                            <td><?php echo $user->id_supply;?></td>
                                            <td><?php echo $user->timestamp;?></td>
                                            <td><?php echo $user->attribute_name;?></td>
                                            <td><?php echo $user->quantity.' '.$user->kind_of_unit;?></td>
                                            <td><?php echo $user->sup_desc;?></td>
                                            <td>
                                                <a class="btn btn-primary btn-xs" href="supplies/edit/<?php echo $user->id_supply;?>">edit</a>
                                                <a class="btn btn-danger btn-xs" href="supplies/deleting/<?php echo $user->id_supply;?>">delete</a>
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
                            <h1>New Record for Supplies Change</h1>
                            <p>Input the user data you want.</p>
                        </div>
                        <?php
                        echo form_open('supplies/inserting');?>
                        <!-- basic form elements -->
                        <div class="wrapper wrapper-white">
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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="number" name="quantity" class="form-control" placeholder="Quantity of attribute"/>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="sup_desc" class="form-control" placeholder="Supply change description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>With Withdraw</label>
                                        <br/>                               
                                        <div class="checkbox checkbox-inline">
                                            <input name="check_1" type="checkbox" id="check_1" onclick="var input = document.getElementById('withdraw'); if(this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}"/>
                                            <label for="check_1">Checkbox label</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Withdraw Nominal</label>
                                        <input disabled="disabled" type="number" id="withdraw" name="nominal" class="form-control" placeholder="Withdraw Nominal">
                                    </div>
                                </div>                        
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default">Regrister the record</button>
                                    </div>
                                    <?php
                                    echo form_close();?>
                                </div>
                            </div>
                        <!-- ./Custom Form Layout -->

                    </div>
                </div>