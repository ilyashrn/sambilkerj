<!-- page content -->
        <div class="dev-page-content">                    
            <!-- page content container -->
            <div class="container">
                <!-- Custom Form Layout -->
                        <div class="page-title">
                            <h1>New Record for Supplies Change</h1>
                            <p>Input the user data you want.</p>
                        </div>
                        <?php
                        echo form_open('supplies/updating');
                        foreach ($sup_data as $sup) {}?>
                        <!-- basic form elements -->
                        <div class="wrapper wrapper-white">
                            <div class="row">
                                <div class="col-md-4">                        
                                    <div class="form-group">
                                        <label>Attribute name</label>                                
                                        <select value="<?php echo $sup->attribute_name;?>" name="attribute" class="form-control selectpicker" placeholder="Please select the attribute">
                                        <?php
                                        foreach ($attribute_data as $attr) { ?>
                                            <option <?php echo ($sup->id_attr == $attr->id_attr) ? 'selected="selected"': '';?>value="<?php echo $attr->id_attr;?>"><?php echo $attr->attribute_name?></option>
                                        <?php }
                                        ?>
                                        </select>
                                    </div>                        
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input value="<?php echo $sup->quantity;?>" type="number" name="quantity" class="form-control" placeholder="Quantity of attribute"/>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea <?php echo $sup->sup_desc;?> name="sup_desc" class="form-control" placeholder="Supply change description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?php echo $sup->id_supply;?>">
                                        <button type="submit" class="btn btn-default">Renew the record</button>
                                    </div>
                                    <?php
                                    echo form_close();?>
                                </div>
                            </div>
                        <!-- ./Custom Form Layout -->