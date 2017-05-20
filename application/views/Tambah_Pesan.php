<div class="box span12">
  <div class="box-header well" data-original-title>
    <h2><i class="icon-book"></i> Kirim Pesan</h2>
  </div>
   
  <div class="box-content">
    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Utama/Tambah_Pesan/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>">
<?php
    echo form_error('isipesan');
 ?>
        <div class="control-group">
          <label class="control-label" for="textarea2">Isi Pesan</label>
          <div class="controls">
              <textarea name="isipesan" rows="3" class="cleditor" id="textarea2" style="width: 600px; height: 150px"></textarea>
          </div>
        </div>
        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Kirim</button>
          <button type="reset" class="btn">Batal</button>
        </div>
      </fieldset>
    </form>
  </div>
</div>
