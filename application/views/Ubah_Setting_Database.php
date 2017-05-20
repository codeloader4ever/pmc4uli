    <div class="box span12">
      <div class="box-header well" data-original-title="data-original-title">
        <h2><i class="icon-th-large"></i> Ubah Setting Database
          <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
        </h2>
        
      </div>
      <div class="box-content">
      <?php $row = $SettingDatabase->row(); ?>
          <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Utama/UbahSettingdatabase/<?php echo $row->id_pengaturan_database; ?>">
    <?php
    echo form_error('setting_database');
    ?>
          <fieldset>
            <div class="control-group">
              <label class="control-label" for="typeahead">Nama Database </label>
              <div class="controls">
                  <input type="text" id="inputSuccess" name="nama_database" value="<?php echo $row->nama_database;?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="typeahead">Username Database </label>
              <div class="controls">
                  <input type="text" id="inputSuccess" name="username_database" value="<?php echo $row->username_database;?>">
              </div>
            </div>
              <div class="control-group">
              <label class="control-label" for="typeahead">Password Database </label>
              <div class="controls">
                  <input type="password" id="inputSuccess" name="password_database" value="<?php echo $row->password_database;?>">
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