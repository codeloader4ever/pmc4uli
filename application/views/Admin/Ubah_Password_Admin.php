    <div class="box span8">
      <div class="box-header well" data-original-title="data-original-title">
        <i class="icon-user"><font color="white" size="2"></i> Cahnge Password</font>
          <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
        
        
      </div>
      <div class="box-content">
      <?php $row = $Pengguna->row(); ?>
      <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Admin/Ubah_Password_Admin/<?php echo $row->id_admin; ?>">
 <?php
 echo form_error('password_lama');
    echo form_error('password_baru');
        echo form_error('konfirmasi_password_baru');
 ?>
            <fieldset>
            <div class="control-group">
             <!-- <label class="control-label" for="typeahead">Old Password </label>
              <div class="controls">
                  <input type="password" id="inputSuccess" name="password_lama">
              </div> -->
            </div>
            <div class="control-group">
              <label class="control-label" for="typeahead2"><font color="white">New Pasword </label></font>
              <div class="controls">
                  <input type="password" id="inputSuccess" name="password_baru">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="typeahead5"><font color="white">Password Confirmation</label></font>
              <div class="controls">
                  <input type="password" id="inputSuccess" name="konfirmasi_password_baru">
              </div>
            </div>
            <div class="controls"> 
              <button type="submit" class="btn btn-primary">Save</button>
              <a href="<?php echo base_url();?>index.php/Admin" class="btn btn-primary">Cancel</a>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    
    <?php echo form_close(); ?>