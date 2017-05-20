    <div class="box span12">
      <div class="box-header well" data-original-title="data-original-title">
        <h2><i class="icon-th-large"></i> Import Database
          <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
        </h2>
        
      </div>
      <div class="box-content">
          <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Utama/Import_DB/<?php echo $this->uri->segment(3);?>" enctype="multipart/form-data">
              
          <fieldset>
            <div class="control-group">
              <label class="control-label" for="typeahead">Import Database </label>
              <div class="controls">
                  <input name="userfile" type="file" id="userfile">
              </div>
            </div>
              
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Import</button>
            </div>
          </fieldset>
        </form>
      </div>
    </div>