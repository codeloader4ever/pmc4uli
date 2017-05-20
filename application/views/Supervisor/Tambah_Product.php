    <div class="box span12">
      <div class="box-header well" data-original-title="data-original-title">
        <h2><i class="icon-th-large"></i> Add New Product
          <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
        </h2>
        
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
              <label class="control-label" for="typeahead">ID Product</label>
              <div class="controls">
                  <input type="text" id="inputSuccess" name="id_product">
              </div>
            </div>
			<div class="control-group">
              <label class="control-label" for="typeahead">Item Code</label>
              <div class="controls">
                  <input type="text" id="inputSuccess" name="item_code">
              </div>
            </div>
			<div class="control-group">
              <label class="control-label" for="typeahead">Name</label>
              <div class="controls">
                  <input type="text" id="inputSuccess" name="productname">
              </div>
            </div>
			<div class="control-group">
              <label class="control-label" for="typeahead">N/FIB</label>
              <div class="controls">
                  <input type="text" id="inputSuccess" name="n_fib">
              </div>
            </div>
			<div class="control-group">
              <label class="control-label" for="typeahead">Description</label>
              <div class="controls">
                  <input type="text" id="inputSuccess" name="description">
              </div>
            </div>
              
              
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?php echo base_url();?>index.php/Admin/FormLoginAdmin" class="btn btn-primary">Cancel</a>
            </div>
          </fieldset>
        </form>
      </div>
    </div>