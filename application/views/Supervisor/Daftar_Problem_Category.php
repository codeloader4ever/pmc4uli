<div class="box span12">
    <div class="box-header well" data-original-title>
	<h2><i class="icon-book"></i>Problem Category</h2>					
    </div>
	<div class="box-content">
            <form class="form-search" id="form_pencarian" name="form_pencarian" method="post" action="<?=base_url();?>index.php/Admin/Daftar_Problem_Category">
            <h4>Search</h4>
            <input type="text" class="input-medium search-query" style="width: 20%" id="judul_kategori_artikel" name="judul_kategori_artikel">
    <button type="submit" class="btn btn-primary">Find</button>
    <a href="<?php echo base_url();?>index.php/Admin/DaftarProblemCategory" class="btn btn-primary">Refresh</a>
	<a href="<?php echo base_url();?>index.php/Export_tbl_problem_category/export" class="btn btn-primary">Export To Excel</a>
    </form>
<table class="table  table-bordered bootstrap-datatable datatable" style="background-color:white">
<!-- ----------------- Membuat no otomatis [mengambil dari sehment 4 dan + 1]------------------------------- -->    
<?php 
$hal = $this->uri->segment(4);
$no = $hal + 1;
if(count($DaftarProblemCategory->result()) > 0) {
?>
	<thead>
            <tr>
		<th style="background-color:darkblue"><font color="white">No </font></th>
				<th style="background-color:darkblue"><font color="white">ID Problem Category</font></th>
                <th style="background-color:darkblue"><font color="white">Problem Category Name</font></th>
		
            </tr>
	</thead>   
	
        <tbody>
        <?php
        foreach($DaftarProblemCategory->result() as $row){
        ?>
		<tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row->id_problem_category?></td>
                    <td><?php echo $row->name;?></td>
                    
                   
                    
            </tr>
<?php
$no++;
}
?>
		<tr>
                    <td colspan="6"><?php echo $this->pagination->create_links(); ?></td>
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