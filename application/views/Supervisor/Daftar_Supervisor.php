<div class="box span12">
    <div class="box-header well" data-original-title>
	<h2><i class="icon-user"></i>Supervisor</h2>					
    </div>
	<div class="box-content">
            <form class="form-search" id="form_pencarian" name="form_pencarian" method="post"  action="<?=base_url();?>index.php/Admin/Daftar_Supervisor">
            <h4>Search</h4>
            <input type="text" class="input-medium search-query" style="width: 20%" id="judul_kategori_artikel" name="judul_kategori_artikel">
			<button type="submit" class="btn btn-success"> <i class="icon-search icon-white"></i> Find</button>
			<a href="<?php echo base_url();?>index.php/Export_tbl_supervisor/export" class="btn btn-success" style="float:right;">
	<i class="icon-file icon-white"></i>Excel</a>		
			<a href="<?php echo base_url();?>index.php/Admin/TambahSupervisor" class="btn btn-success" style="float:right;">
                        <i class="icon-plus icon-white"></i>Add</a>
						 
    <a href="<?php echo base_url();?>index.php/Admin/DaftarSupervisor" class="btn btn-success" style="float:right;">
	<i class="icon-refresh icon-white"></i>Refresh</a>
	
	
    </form>
<table class="table  table-bordered bootstrap-datatable datatable" style="background-color:white">
<!-- ----------------- Membuat no otomatis [mengambil dari sehment 4 dan + 1]------------------------------- -->    
<?php 
$hal = $this->uri->segment(4);
$no = $hal + 1;
if(count($DaftarSupervisor->result()) > 0) {
?>

	<thead>
            <tr>
		<th style="background-color:darkblue"><font color="white">No </font></th>
				<th style="background-color:darkblue"><font color="white">ID </font></th>
                <th style="background-color:darkblue"><font color="white">Name</font></th>
                <th style="background-color:darkblue"><font color="white">Password</font></th>
                <th style="background-color:darkblue"><font color="white">Job Title</font></th>
		
		<th style="background-color:darkblue"><font color="white">Action </font></th>
            </tr>
	</thead>   
	
        <tbody>
        <?php
        foreach($DaftarSupervisor->result() as $row){
        ?>
		<tr>
                    <td><?php echo $no; ?></td>
					<td><?php echo $row->id_spv;?></td>
                    <td><?php echo $row->name;?></td>
                    <td><?php echo $row->pwd;?></td>
                    <td><?php echo $row->job_title;?></td>
                   
                    <td class="center">
						                                        
                        </a>
                        <a class="btn btn-info" href='<?php echo base_url();?>index.php/Admin/UbahSupervisor/<?php echo $row->id_spv;?>' title="Edit">
                        <i class="icon-edit icon-white"></i>  
                        Edit                                            
                        </a>
                        <a class="btn btn-danger" href='<?php echo base_url();?>index.php/Admin/HapusSupervisor/<?php echo $row->id_spv;?>' onClick='return confirm("Are you sure delete this data?")' title="Delete">
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