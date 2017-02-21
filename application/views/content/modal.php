<div class="modal fade" id="syarat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Syarat dan Ketentuan</h4>
      </div>
      <div class="modal-body">
          <h6>Hak Sambilan</h6>
          <ul class="check-list">
            <?php
            foreach ($this->Term->get_all_hak() as $hak) { ?>
              <li><?php echo $hak->hak;?></li>
            <?php }
            ?>
          </ul>
          <h6>Kewajiban Sambilan</h6>
          <ul class="check-list">
            <?php
            foreach ($this->Term->get_all_kew() as $kew) { ?>
              <li><?php echo $kew->kewajiban;?></li>
            <?php }
            ?>
          </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>