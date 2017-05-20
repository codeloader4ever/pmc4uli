    <div class="box span8">
      <div class="box-header well" data-original-title="data-original-title">
        <i class="icon-th-large"><font color="white" size="2"></i> Add New Product</font>
          <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
        
        
      </div>
      <div class="box-content">
          <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/Admin/TambahProduct">
    <?php
    echo form_error('id_product');
    echo form_error('item_code');
	echo form_error('productname');
	echo form_error('n_fib');
	echo form_error('description');
    ?>
          <fieldset>
            <div class="control-group">
              <label class="control-label" for="typeahead"><font color="white">ID Product</label></font>
              <div class="controls">
                  <input type="text" id="inputSuccess" name="id_product">
              </div>
            </div>
			<div class="control-group">
              <label class="control-label" for="typeahead"><font color="white">Item Code</label></font>
              <div class="controls">
                  <input type="text" id="inputSuccess" name="item_code">
              </div>
            </div>
			<div class="control-group">
              <label class="control-label" for="typeahead"><font color="white">Name</label></font>
              <div class="controls">
                  <input type="text" id="inputSuccess" name="productname">
              </div>
            </div>
			<div class="control-group">
              <label class="control-label" for="typeahead"><font color="white">N/FIB</label></font>
              <div class="controls">
                  <input type="text" id="inputSuccess" name="n_fib">
              </div>
            </div>
			<div class="control-group">
              <label class="control-label" for="typeahead"><font color="white">Description</label></font>
              <div class="controls">
                  <input type="text" id="inputSuccess" name="description">
              </div>
            </div>
              
              
            <div class="controls">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?php echo base_url();?>index.php/Admin/Daftar_Product" class="btn btn-primary">Cancel</a>
            </div>
          </fieldset>
        </form>
      </div>
    </div>