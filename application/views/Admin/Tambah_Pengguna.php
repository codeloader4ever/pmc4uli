    <div class="box span8">
      <div class="box-header well" data-original-title="data-original-title">
        <i class="icon-user"><font color="white" size="2"></i> Add New User</font>
          <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
        
        
      </div>
      <div class="box-content">
        <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Admin/TambahPengguna">
 <?php
 echo form_error('id_admin');
    echo form_error('username');
         echo form_error('pwd');
            echo form_error('job_title');
			echo form_error('Level');
 ?>
            <fieldset>
            <div class="control-group">
              <label class="control-label" for="typeahead"><font color="white">ID</label></font>
              <div class="controls">
                <input type="text" id="inputSuccess" name="id_admin">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="typeahead2"><font color="white">Name </label></font>
              <div class="controls">
                <input type="text" id="inputSuccess" name="username">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="typeahead3"><font color="white">Password </label></font>
              <div class="controls">
                <input type="text" id="inputSuccess" name="pwd">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="typeahead4"><font color="white">Job Title </label></font>
              <div class="controls">
                  <input type="text" id="inputSuccess" name="job_title">
              </div>
            </div>
			<div class="control-group">
                                                                <label class="control-label" for="Deskripsi"><font color="white">Level</label></font>
                                                            <div class="controls" id="combo_status">
                                                              <select id="validateSelect" name="Level" id="Level" class="status">
                                                                <option value="1">Admin</option>
                                                                <option value="2">Supervisor/Leader</option>
                                                              </select>
                                                            </div>  
                                                            </div>
            
            <div class="controls"> 
              <button type="submit" class="btn btn-primary">Save</button>
              <a href="<?php echo base_url();?>index.php/Admin/Daftar_Pengguna" class="btn btn-primary">Cancel</a>
            </div>
          </fieldset>
        </form>
      </div>
    </div>