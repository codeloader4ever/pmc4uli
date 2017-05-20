<div class="box span12">
  <div class="box-header well" data-original-title>
    <h2><i class="icon-book"></i> Tambah Artikel</h2>
  </div>
   
  <div class="box-content">
    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Admin/TambahArtikel">
<?php
 echo form_error('judul');
    echo form_error('isiartikel');
    echo form_error('datepicker');
 ?>
      <fieldset>
        <div class="control-group">
          <label class="control-label" for="typeahead7">Judul </label>
          <div class="controls">
            <input type="text" id="inputSuccess2" name="judul">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="textarea2">Isi Artikel</label>
          <div class="controls">
              <textarea name="isiartikel" rows="3" class="cleditor" id="textarea2" style="width: 600px; height: 150px"></textarea>
          </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="date01">Tanggal</label>
            <div class="controls">
                <input type="text" class="input-large datepicker" id="datepicker" name="datepicker">
            </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="date01">Kategori Artikel</label>
          <div class="controls">
           	<?php
            //------- Menampilkan Dropdown -------//
            foreach($KategoriArtikel->result() as $row){
            $array_KategoriArtikel[$row->id_kategori_artikel] = $row->nama_kategori_artikel;
            }
            echo form_dropdown('KategoriArtikel',$array_KategoriArtikel,set_value('KategoriArtikel'));
            ?>
          </div>
          </div>
        <div class="control-group">
          <label class="control-label" for="date01">Status</label>
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
