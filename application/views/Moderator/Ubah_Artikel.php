<div class="box span12">
  <div class="box-header well" data-original-title>
    <h2><i class="icon-book"></i> Tambah Artikel</h2>
  </div>
  <div class="box-content">
      <?php $row = $Artikel->row(); ?>
    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Moderator/UbahArtikel/<?php echo $row->id_artikel; ?>">
<?php
 echo form_error('judul');
    echo form_error('isiartikel');
    echo form_error('datepicker');
 ?>
      <fieldset>
        <div class="control-group">
          <label class="control-label" for="typeahead7">Judul </label>
          <div class="controls">
            <input type="text" id="inputSuccess2" name="judul" value="<?php echo $row->judul_artikel;?>">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="textarea2">Isi Artikel</label>
          <div class="controls">
            <textarea name="isiartikel" rows="3" class="cleditor" id="textarea2" style="width: 600px; height: 150px"><?php echo $row->isi_artikel;?></textarea>
          </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="date01">Tanggal</label>
            <div class="controls">
                <input type="text" class="input-large datepicker" id="datepicker" name="datepicker" value="<?php echo $row->tanggal_artikel;?>">
            </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="date01">Kategori Artikel</label>
          <div class="controls">
           	<?php
            //------- Menampilkan Dropdown -------//
            foreach($KategoriArtikel->result() as $r){
            $array_KategoriArtikel[$r->id_kategori_artikel] = $r->nama_kategori_artikel;
            }
            echo form_dropdown('KategoriArtikel',$array_KategoriArtikel,$row->id_kategori_artikel);
            ?>
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
                echo form_dropdown('status',$data,$row->status_artikel);
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
