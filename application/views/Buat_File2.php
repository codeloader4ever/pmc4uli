    <div class="box span12">
      <div class="box-header well" data-original-title="data-original-title">
        <h2><i class="icon-th-large"></i> Tambah File
          <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
        </h2>
        
      </div>
      <div class="box-content">
          <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Utama/File/<?php echo $this->uri->segment(3); ?>">
    <?php
    echo form_error('nama');
    echo form_error('ext');
    ?>
          <fieldset>
            <div class="control-group">
              <label class="control-label" for="typeahead">Nama File </label>
              <div class="controls">
                  <input type="text" id="inputSuccess" name="nama">
              </div>
            </div>
            <div>
           <div class="control-group">
              <label class="control-label" for="typeahead">Jenis File </label>
                <div class="controls">
             <select name="ext" >
              <option value="">Pilih Jenis File *</option>
              <option value="html">HTML</option>
              <option value="php">PHP</option>
              <option value="js">JS</option>
              <option value="css">CSS</option>
              <option value="sql">SQL</option>
              <option value="txt">Plain Text</option>
            </select>
           </div>  
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