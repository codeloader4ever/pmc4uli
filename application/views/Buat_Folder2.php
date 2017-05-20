    <div class="box span12">
      <div class="box-header well" data-original-title="data-original-title">
        <h2><i class="icon-th-large"></i> Tambah Folder
          <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
        </h2>
        
      </div>
      <div class="box-content">
          <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Utama/Folder/<?php echo $this->uri->segment(3); ?>">
    <?php
    echo form_error('nama');
    ?>
          <fieldset>
            <div class="control-group">
              <label class="control-label" for="typeahead">Nama Folder </label>
              <div class="controls">
                  <input type="text" id="inputSuccess" name="nama">
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