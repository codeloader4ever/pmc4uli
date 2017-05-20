    <?php
    $row = $Project->row();
    ?>
    
    <div class="box span12">
      <div class="box-header well" data-original-title="data-original-title">
        <h2><i class="icon-th-large"></i> Setting Database
          <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
        </h2>
        
      </div>
      <div class="box-content">
          <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Utama/SettingDatabase/<?php echo $row->id_project; ?>">
    <?php
    echo form_error('db');
    ?>
          <fieldset>
            <div class="control-group">
          <label class="control-label" for="date01">
            <?php  if (count($DB->result()) > 0) { ?>
            Setting Database
            <?php } ?>
          </label>
          <div class="controls">
            <?php
            //------- Menampilkan Dropdown -------//
            // if (count($DB->result()) > 0) {
            // foreach($DB->result() as $r){
            // $array_DB[$r->id_pengaturan_database] = $r->nama_database;
            // }
            // echo form_dropdown('db',$array_DB,$row->id_pengaturan_database);
            // }else{
            // echo "Daftar Database Masih Kosong";
            // }
            ?>
          <select name="db" style="width: 30%">
      <option value="0">Kosongkan Setting Database</option>
      <?php
     foreach($DB->result() as $baris){
      if($row->id_pengaturan_database==$baris->id_pengaturan_database){
      ?>
      <option value="<?php echo $baris->id_pengaturan_database;?>" selected><?php echo $baris->nama_database ;?></option>
      <?php }else{ ?>
      <option value="<?php echo $baris->id_pengaturan_database;?>"><?php echo $baris->nama_database ;?></option>
      <?php }} ?>
    </select>   
          </div>
          </div>
            <div class="form-actions">
              <?php  if (count($DB->result()) > 0) { ?>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn">Batal</button>
              <?php } ?>
            </div>
          </fieldset>
        </form>
      </div>
    </div>