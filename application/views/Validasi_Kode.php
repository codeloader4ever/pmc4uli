<div class="box span6">
      <div class="box-header well" data-original-title="data-original-title">
        <h2><i class="icon-user"></i> Validasi Kode
          <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
        </h2>
        
      </div>
      <div class="box-content">
        <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Utama/Validasi_Kode">
 <?php
        echo form_error('kode');
        if(isset($validasi_info))
        {
        echo $validasi_info;
        }
        ?>
            <fieldset>
            <div class="control-group">
              <label class="control-label" for="typeahead">Masukkan Kode validasi </label>
              <div class="controls">
                <input type="password" id="inputSuccess" name="kode">
              </div>
            </div>
            <div class="form-actions"> 
              <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
          </fieldset>
        </form>
      </div>
    </div>