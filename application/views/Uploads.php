    <div class="box span12">
      <div class="box-header well" data-original-title="data-original-title">
        <h2><i class="icon-th-large"></i> Upload
          <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
        </h2>
        
      </div>
      <div class="box-content">
          <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Utama/Upload_Files/<?php echo $this->uri->segment(3);?>/?file=<?php echo $this->input->get('file'); ?>" enctype="multipart/form-data">
              
          <fieldset>
            <div class="control-group">
              <label class="control-label" for="typeahead">Upload File </label>
              <div class="controls">
                  <input name="userfile" type="file" id="userfile">
              </div>
            </div>
              
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Upload</button>
            </div>
          </fieldset>
        </form>
          *) Jika File yang Anda Upload Tidak Masuk / Tidak Bisa Silahkan di buat Format " zip " terlebih dahulu.
      </div>
    </div>