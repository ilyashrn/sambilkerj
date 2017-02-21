<!-- FOOTER -->
<footer>
    <div id="footer-top">
      <div id="footer-bottom">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <div class="widget widget-text">
                <div>
                  <p>Sambilkerja &copy; 2016. All Rights Reserved</p>
                </div>
              </div><!-- widget-text -->
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- container -->
      </div><!-- footer-bottom -->
  </footer><!-- FOOTER -->

</div><!-- PAGE-WRAPPER -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
</body>
</html>

<script src="<?php echo base_url('assets/js/NotificationStyles/classie.js');?>"></script>
<script src="<?php echo base_url('assets/js/NotificationStyles/notificationFx.js');?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
      setTimeout(function() {
        <?php if($this->session->flashdata('msg')){ ?>
        var notification = new NotificationFx({
            message : "<?php echo $this->session->flashdata('msg')?>",
            layout : 'growl',
            effect : 'genie',
            type : 'error', // notice, warning or error
        });
        notification.show();
        <?php } ?>
      });
    });
</script>


