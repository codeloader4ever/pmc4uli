<div class="box span12">
    <div class="box-header well" data-original-title>
	<i class="icon-user"><font color="white" size="2"></i>User List</font>				
    </div>
	<div class="box-content">
            <form class="form-search" id="form_pencarian" name="form_pencarian" method="post"  action="<?=base_url();?>index.php/Admin/Daftar_Pengguna">
            <!--<h4>Search</h4> -->
            <input type="text" class="input-medium search-query" style="width: 20%" id="nama_pengguna" name="nama_pengguna">
			<button type="submit" class="btn btn-primary"> <i class="icon-search icon-white"></i> Search</button>
			<a href="<?php echo base_url();?>index.php/Export_tbl_admin/export" class="btn btn-primary" style="float:right;">
	<i class="icon-file icon-white"></i>Excel</a>		
			<a href="<?php echo base_url();?>index.php/Admin/TambahPengguna" class="btn btn-primary" style="float:right;">
                        <i class="icon-plus icon-white"></i>Add</a>
						 
    <a href="<?php echo base_url();?>index.php/Admin/DaftarPengguna" class="btn btn-primary" style="float:right;">
	<i class="icon-refresh icon-white"></i>Refresh</a>
	
	
    </form>
<table class="table  table-bordered bootstrap-datatable datatable" style="background-color:white">
<!-- ----------------- Membuat no otomatis [mengambil dari sehment 4 dan + 1]------------------------------- -->    
<?php 
$hal = $this->uri->segment(4);
$no = $hal + 1;
if(count($DaftarPengguna->result()) > 0) {
?>

	<thead>
            <tr>
		<th style="background-color:midnightblue"><font color="white">No </font></th>
				<th style="background-color:midnightblue"><font color="white">ID </font></th>
                <th style="background-color:midnightblue"><font color="white">Name</font></th>
                <!--<th style="background-color:darkblue"><font color="white">Password</font></th>-->
                <th style="background-color:midnightblue"><font color="white">Job Title</font></th>
				<th style="background-color:midnightblue"><font color="white">Level</font></th>
		
		<th style="background-color:midnightblue"><font color="white">Action </font></th>
            </tr>
	</thead>   
	
        <tbody>
        <?php
        foreach($DaftarPengguna->result() as $row){
        ?>
		<tr>
                    <td><?php echo $no; ?></td>
					<td><?php echo $row->id_admin;?></td>
                    <td><?php echo $row->name;?></td>
                    <!--<td><?php echo $row->pwd;?></td>-->
                    <td><?php echo $row->job_title;?></td>
					<td><?php echo $row->Level;?></td>
                   
                    <td class="center">
						                                        
                        </a>
                        <a class="btn btn-primary" href='<?php echo base_url();?>index.php/Admin/UbahPengguna/<?php echo $row->id_admin;?>' title="Edit">
                        <i class="icon-edit icon-white"></i>  
                        Edit                                            
                        </a>
                        <a class="btn btn-danger" href='<?php echo base_url();?>index.php/Admin/HapusPengguna/<?php echo $row->id_admin;?>' onClick='return confirm("Are you sure delete this data?")' title="Hapus">
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