    <div class="box span12">
      <div class="box-header well" data-original-title="data-original-title">
        <h2><i class="icon-th-large"></i> Tambah Kategori Artikel
          <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
        </h2>
        
      </div>
      <div class="box-content">
          <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Moderator/TambahKategoriArtikel">
    <?php
    echo form_error('kategoriartikel');
    echo form_error('status');
    ?>
          <fieldset>
            <div class="control-group">
              <label class="control-label" for="typeahead">Nama Kategori Artikel </label>
              <div class="controls">
                  <input type="text" id="inputSuccess" name="kategoriartikel">
              </div>
            </div>
              
              <div class="control-group">
                <label class="control-label" for="selectError">Status</label>
                <div class="controls">
                  <select name="status" id="status" data-rel="chosen">
                    <option value="0" selected>Aktif</option>
                    <option value="1">Tidak Aktif</option>
                  </select>
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