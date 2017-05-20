    <div class="box span12">
      <div class="box-header well" data-original-title="data-original-title">
        <h2><i class="icon-user"></i> Ubah Akun
          <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
        </h2>
        
      </div>
      <div class="box-content">
      <?php $row = $Pengguna->row(); ?>
      <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Utama/UbahProfil_Pribadi/<?php echo $row->id_pengguna; ?>">
 <?php
 echo form_error('namadepan');
    echo form_error('namabelakang');
        echo form_error('email');
 ?>
            <fieldset>
            <div class="control-group">
              <label class="control-label" for="typeahead">Nama Depan </label>
              <div class="controls">
                <input type="text" id="inputSuccess" name="namadepan" value="<?php echo $row->nama_depan_pengguna;?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="typeahead2">Nama Belakang </label>
              <div class="controls">
                <input type="text" id="inputSuccess" name="namabelakang" value="<?php echo $row->nama_belakang_pengguna;?>">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="typeahead5">Email </label>
              <div class="controls">
                <input type="text" id="inputSuccess" name="email" value="<?php echo $row->email_pengguna;?>">
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