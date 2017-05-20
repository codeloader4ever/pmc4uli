    <div class="box span12">
      <div class="box-header well" data-original-title="data-original-title">
        <h2><i class="icon-user"></i> Edit User
          <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
        </h2>
        
      </div>
      <div class="box-content">
      <?php $row = $Pengguna->row(); ?>
      <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Admin/UbahPengguna/<?php echo $row->id_admin; ?>">
 <?php
 echo form_error('id_admin');
         echo form_error('username');
            echo form_error('pwd');
                    echo form_error('job_title');
 ?>
            <fieldset>
            <div class="control-group">
              <label class="control-label" for="typeahead">ID Admin </label>
              <div class="controls">
                <input type="text" id="inputSuccess" name="id_admin" value="<?php echo $row->id_admin;?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="typeahead2">Name </label>
              <div class="controls">
                <input type="text" id="inputSuccess" name="username" value="<?php echo $row->name;?>">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="typeahead5">Password </label>
              <div class="controls">
                <input type="text" id="inputSuccess" name="pwd" value="<?php echo $row->pwd;?>">
              </div>
            </div>
			 <div class="control-group">
              <label class="control-label" for="typeahead5">Job Title </label>
              <div class="controls">
                <input type="text" id="inputSuccess" name="job_title" value="<?php echo $row->job_title;?>">
              </div>
            </div>
        
            <div class="form-actions"> 
              <button type="submit" class="btn btn-primary">Save</button>
              <a href="<?php echo base_url();?>index.php/Admin/DaftarPengguna" class="btn btn-primary">Cancel</a>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    
    <?php echo form_close(); ?>