    <div class="box span12">
      <div class="box-header well" data-original-title="data-original-title">
        <h2><i class="icon-th-large"></i> Tambah Kategori Artikel
          <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
        </h2>
        
      </div>
      <div class="box-content">
      <?php $row = $KategoriArtikel->row(); ?>
          <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Moderator/UbahKategoriArtikel/<?php echo $row->id_kategori_artikel; ?>">
    <?php
    echo form_error('kategoriartikel');
    ?>
          <fieldset>
            <div class="control-group">
              <label class="control-label" for="typeahead">Nama Kategori Artikel </label>
              <div class="controls">
                  <input type="text" id="inputSuccess" name="kategoriartikel" value="<?php echo $row->nama_kategori_artikel;?>">
              </div>
            </div>
              
              <div class="control-group">
                <label class="control-label" for="selectError">Status</label>
                <div class="controls">
                <?php
                //--------- Dropdown ------------//
				$data = array(
                '0'   => 'Aktif',
                '1' => 'Tidak Aktif'
                );
                echo form_dropdown('status',$data,$row->status_kategori_artikel);
            	?>     
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