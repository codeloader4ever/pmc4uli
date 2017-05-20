    <div class="box span8">
      <div class="box-header well" data-original-title="data-original-title">
        <i class="icon-user"><font color="white" size="2"></i> Edit Operator</font>
          <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
        
        
      </div>
      <div class="box-content">
      <?php $row = $Operator->row(); ?>
      <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Admin/UbahOperator/<?php echo $row->id_opr; ?>">
 <?php
 echo form_error('id_opr');
         echo form_error('username');
            echo form_error('nip');
                    echo form_error('job_title');
 ?>
            <fieldset>
            <div class="control-group">
              <label class="control-label" for="typeahead"><font color="white">ID</label></font>
              <div class="controls">
                <input type="text" id="inputSuccess" name="id_opr" value="<?php echo $row->id_opr;?>">
              </div>
            </div>
			 <div class="control-group">
              <label class="control-label" for="typeahead5"><font color="white">NIP </label></font>
              <div class="controls">
                <input type="text" id="inputSuccess" name="nip" value="<?php echo $row->nip;?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="typeahead2"><font color="white">Name </label></font>
              <div class="controls">
                <input type="text" id="inputSuccess" name="username" value="<?php echo $row->name;?>">
              </div>
            </div>

           
			 <div class="control-group">
              <label class="control-label" for="typeahead5"><font color="white">Job Title </label></font>
              <div class="controls">
                <input type="text" id="inputSuccess" name="job_title" value="<?php echo $row->job_title;?>">
              </div>
            </div>
        
            <div class="controls"> 
              <button type="submit" class="btn btn-primary">Save</button>
              <a href="<?php echo base_url();?>index.php/Admin/DaftarOperator" class="btn btn-primary">Cancel</a>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    
    <?php echo form_close(); ?>