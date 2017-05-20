<div class="box span6">
      <div class="box-header well" data-original-title="data-original-title">
        <h2><i class="icon-user"></i> Lupa Sandi
          <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
        </h2>
        
      </div>
      <div class="box-content">
        <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Utama/Lupa_Sandi">
 <?php
 echo form_error('email');
 ?>
            <fieldset>
            <div class="control-group">
              <label class="control-label" for="typeahead">Masukkan Email </label>
              <div class="controls">
                <input type="text" id="inputSuccess" name="email">
              </div>
            </div>
            <div class="form-actions"> 
              <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
          </fieldset>
        </form>
      </div>
    </div>