<div class="box span12">
    <div class="box-header well" data-original-title>
	<h2><i class="icon-book"></i>Product List</h2>
						
    </div>
    <div class="box-content">
        <form class="form-search" id="form_pencarian" name="form_pencarian" method="post" action="<?=base_url();?>index.php/Admin/Daftar_Product">
            <h4>Search</h4>
            <input type="text" class="input-medium search-query" style="width: 20%" id="judul_kategori_artikel" name="judul_kategori_artikel">
    <button type="submit" class="btn btn-primary">Find</button>
    <a href="<?php echo base_url();?>index.php/Admin/DaftarProduct" class="btn btn-primary">Refresh</a>
	<a href="<?php echo base_url();?>index.php/Export_tbl_product/export" class="btn btn-primary">Export To Excel</a>
    </form>
	<table class="table table-striped table-bordered bootstrap-datatable datatable">
            <!-- ----------------- Membuat no otomatis [mengambil dari sehment 4 dan + 1]------------------------------- -->    
                <?php 
                $hal = $this->uri->segment(4);
                $no = $hal + 1;
                if(count($DaftarProduct->result()) > 0) {
                ?>
	<thead>
	<tr>
		<th>No</th>
		<th>ID </th>
		<th>Item Code </th>
		<th>Name</th>
		<th>N/FIB</th>
		<th>Description</th>
		<th>Action</th>
	</tr>
	</thead>   
        <tbody>
            <?php
            foreach($DaftarProduct->result() as $row){
            ?>
		<tr>
			<td><?php echo $no; ?></td>
					<td><?php echo $row->id_product;?></td>
                    <td><?php echo $row->item_code;?></td>
                    <td><?php echo $row->name;?></td>
                    <td><?php echo $row->n_fib;?></td>
					<td><?php echo $row->description;?></td>
			
			<td class="center">
			<a class="btn btn-info" href= '<?php echo base_url();?>index.php/Admin/UbahProduct/<?php echo $row->id_product;?>' title="Edit">
				<i class="icon-edit icon-white"></i>
                                Edit
                                
			</a>
			<a class="btn btn-danger" href='<?php echo base_url();?>index.php/Admin/HapusProduct/<?php echo $row->id_product;?>' onClick='return confirm("Are you sure delete this data?")' title='Hapus'>
				<i class="icon-trash icon-white"></i>
                                Delete
				
			</a>
			</td>
		</tr>
                <?php
                    $no++;
                    }
                    ?>
		<tr>
		  <td colspan="4"><span class="pagination"><?php echo $this->pagination->create_links(); ?></span></td>
		  </tr>
                  
      </tbody>
	</table>
  </div>
</div>

<!-- ----------------- Menampilkan pesan ------------------------------- -->              
        <?php
        } else {
        echo "<h4 class='alert_info'> Data Not Found </h4>";
        }
        ?>