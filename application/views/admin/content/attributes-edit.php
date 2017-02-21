    <!-- page content -->
        <div class="dev-page-content">                    
            <!-- page content container -->
            <div class="container">
                <!-- Custom Form Layout -->
                        <div class="page-title">
                            <h1>Edit Attribute for <?php foreach ($user_data as $user) {}; echo $user->attribute_name;?></h1>
                            <p>Input the attribute data you want to update.</p>

                            <ul class="breadcrumb">
                                <li><a href="dashboard">Dashboard</a></li>
                                <li><a href="../">Attribute Management</a></li>
                                <li><a href="">Attribute Edit</a></li>
                            </ul>
                        </div>
                        <div class="wrapper wrapper-white">
                            <div class="form-group-one-unit">
                                <?php
                                echo form_open('attributes/editing');
                                ?>
                                <div class="row">
                                    <div class="col-md-8">                        
                                        <div class="form-group form-group-custom form-control-clear">
                                            <label>Attribute name <span>type text</span></label>
                                            <input type="text" class="form-control" placeholder="Attribute Name" name="attribute" value="<?php echo $user->attribute_name;?>"/>
                                        </div>                        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-custom form-control-clear">
                                            <label>Kind of Unit <span>type text or/with numbers</span></label>
                                            <input type="text" class="form-control" placeholder="Kind of Unit" name="kind_of_unit" value="<?php echo $user->kind_of_unit;?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-custom">                                
                                            <label>Attribute <span>type</span></label>
                                            <div class="radio">
                                                <input <?php echo ($user->type == '1') ? 'checked="checked"' : '';?> type="radio" name="type" id="radio1" value="1"/>
                                                <label for="radio1">Raw</label>
                                                <input <?php echo ($user->type == '2') ? 'checked="checked"' : '';?> type="radio" name="type" id="radio2" value="2"/>
                                                <label for="radio2">Ready for sale</label>
                                            </div>
                                            <span class="help-block">Select user's previlege</span>
                                        </div>
                                    </div>
                                </div>                           
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input name="id" type="hidden" value="<?php echo $user->id_attr;?>">
                                    <button type="submit" class="btn btn-default">Renew the attribute</button>
                                    <?php echo form_close();?>
                                </div>
                            </div>   
