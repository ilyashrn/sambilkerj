        <!-- page wrapper -->
        <div class="dev-page dev-page-login dev-page-login-v2">
                      
            <div class="dev-page-login-block">
                <img src="<?php echo base_url().'assets/images/logo.png';?>" width="90%">
                <div class="dev-page-login-block__form">
                    <div class="title"><strong>Welcome to admin panel</strong>, please login</div>
                    <?php
                    echo form_open('adm/login/processing');
                    ?>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="username" name="username">
                            </div>
                        </div>                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                        </div>
                        <div class="form-group no-border margin-top-20">
                            <button type="submit" class="btn btn-success btn-block">Login</button>
                        </div>
                    <?php echo form_close();?>
                </div>
                <div class="dev-page-login-block__footer">
                    © 2016 Ilyas Habiburrahman powered by <strong>Aqvatarius</strong>. All rights reserved.
                </div>
            </div>
            
        </div>
        <!-- ./page wrapper -->                
        
        <!-- javascript -->
        <script type="text/javascript" src="<?php echo base_url().'assets/js/plugins/jquery/jquery.min.js'?>"></script>       
        <script type="text/javascript" src="<?php echo base_url().'assets/js/plugins/bootstrap/bootstrap.min.js'?>"></script>        
        <!-- ./javascript -->
    </body>
</html>






