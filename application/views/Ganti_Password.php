    <div class="box span12">
      <div class="box-header well" data-original-title="data-original-title">
        <h2><i class="icon-user"></i> Ganti Password
          <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
        </h2>
        
      </div>
      <div class="box-content">
      <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Utama/Ganti_Password">
 <?php
    echo form_error('password_baru');
        echo form_error('konfirmasi_password_baru');
 ?>
            <fieldset>
            <div class="control-group">
              <label class="control-label" for="typeahead2">Password Baru </label>
              <div class="controls">
                  <input type="password" id="inputSuccess" name="password_baru">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="typeahead5">Konfirmasi Password Baru</label>
              <div class="controls">
                  <input type="password" id="inputSuccess" name="konfirmasi_password_baru">
              </div>
            </div>
            <div class="form-actions"> 
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn">Batal</button>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    
    <?php echo form_close(); ?>