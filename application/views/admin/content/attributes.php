    <!-- page content -->
        <div class="dev-page-content">                    
            <!-- page content container -->
            <div class="container">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title">
                            <h1>Attributes Management</h1>
                            <p>Sortable features for attributes tables. Attributes are the object you use to do and support the business.</p>
                            
                            <ul class="breadcrumb">
                                <li><a href="dashboard">Dashboard</a></li>
                                <li><a href="#">Attributes management</a></li>
                            </ul>
                        </div>                        
                        <!-- ./page title -->
                        
                        <!-- datatables plugin -->
                        <div class="wrapper wrapper-white">
                            <div class="page-subtitle">
                                <h3>Attributes Table</h3>
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
                                            <th>Attribute name</th>
                                            <th>Kind of unit</th>
                                            <th>Type of attribute</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>                               
                                    <tbody>
                                        <?php
                                        if ($attributes_data !== false) {
                                        
                                        foreach ($attributes_data as $user) { ?>
                                        <tr>
                                            <td><?php echo $user->id_attr;?></td>
                                            <td><b><?php echo $user->attribute_name;?></b></td>
                                            <td><?php echo $user->kind_of_unit;?></td>
                                            <td><?php echo ($user->type_name == 'Raw') ? '<span class="btn-xs btn-primary btn">'.$user->type_name.'</span>' : '<span class="btn-xs btn-info btn">'.$user->type_name.'</span>';?></td>
                                            <td>
                                                <a class="btn btn-primary btn-xs" href="attributes/edit/<?php echo $user->id_attr;?>">edit</a>
                                                <a class="btn btn-danger btn-xs" href="attributes/deleting/<?php echo $user->id_attr;?>">delete</a>
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
                            <h1>New Attribute Regristration</h1>
                            <p>Input the attribute data you want.</p>
                        </div>
                        <div class="wrapper wrapper-white">
                            <div class="form-group-one-unit">
                                <?php
                                $attributes = array('id' => "validate");
                                echo form_open('attributes/inserting',$attributes);
                                ?>
                                <div class="row">
                                    <div class="col-md-8">                        
                                        <div class="form-group form-group-custom form-control-clear">
                                            <label>Attribute name <span>type text</span></label>
                                            <input type="text" class="form-control" placeholder="Attribute Name" name="attribute"/>
                                            <span class="help-block">Fill with the new attribute's name</span>
                                        </div>                        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-custom form-control-clear">
                                            <label>Kind of Unit <span>type text or/with numbers</span></label>
                                            <input type="text" class="form-control" placeholder="Kind of Unit" name="kind_of_unit"/>
                                            <span class="help-block">Fill with the new attribute's name</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-custom">                                
                                            <label>Attribute <span>type</span></label>
                                            <div class="radio">
                                                <input type="radio" name="type" id="radio1" value="1" checked=""/>
                                                <label for="radio1">Raw</label>
                                                <input type="radio" name="type" id="radio2" value="2"/>
                                                <label for="radio2">Ready for sale</label>
                                            </div>
                                            <span class="help-block">Select user's previlege</span>
                                        </div>
                                    </div>
                                </div>                           
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-default">Regrister the attribute</button>
                                    <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                        <!-- ./Custom Form Layout -->

                    </div>
                </div>