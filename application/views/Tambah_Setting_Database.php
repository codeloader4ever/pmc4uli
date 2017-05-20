    <div class="box span12">
      <div class="box-header well" data-original-title="data-original-title">
        <h2><i class="icon-th-large"></i> Setting Database Baru
          <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
        </h2>
        
      </div>
      <div class="box-content">
          <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Utama/TambahSettingDatabase">
    <?php
    echo form_error('nama_database');
		echo form_error('username_database');
			echo form_error('password_database');
        if(isset($error_info))
        {
        echo $error_info;
        }
    ?>
          <fieldset>
            <div class="control-group">
              <label class="control-label" for="typeahead">Nama Database </label>
              <div class="controls">
                  <input type="text" id="inputSuccess" name="nama_database">
              </div>
            </div>
              <div class="control-group">
              <label class="control-label" for="typeahead">Username Database </label>
              <div class="controls">
                  <input type="text" id="inputSuccess" name="username_database">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="typeahead">Password Database </label>
              <div class="controls">
                  <input type="password" id="inputSuccess" name="password_database">
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