<div class="box span12">
    <div class="box-header well" data-original-title>
	<h2><i class="icon-book"></i>MC Number</h2>					
    </div>
	<div class="box-content">
            <form class="form-search" id="form_pencarian" name="form_pencarian" method="post" action="<?=base_url();?>index.php/Admin/Daftar_MC_Number">
            <h4>Search</h4>
            <input type="text" class="input-medium search-query" style="width: 20%" id="judul_kategori_artikel" name="judul_kategori_artikel">
    <button type="submit" class="btn btn-primary">Find</button>
    <a href="<?php echo base_url();?>index.php/Admin/DaftarMCNumber" class="btn btn-primary">Refresh</a>
	<a href="<?php echo base_url();?>index.php/Export_tbl_mc_number/export" class="btn btn-primary">Export To Excel</a>
    </form>
<table class="table  table-bordered bootstrap-datatable datatable" style="background-color:white">
<!-- ----------------- Membuat no otomatis [mengambil dari sehment 4 dan + 1]------------------------------- -->    
<?php 
$hal = $this->uri->segment(4);
$no = $hal + 1;
if(count($DaftarMCNumber->result()) > 0) {
?>
	<thead>
            <tr>
		<th style="background-color:darkblue"><font color="white">No </font></th>
				<th style="background-color:darkblue" ><font color="white"> MC Number </font></th>
				<th style="background-color:darkblue"><font color="white">ID MC</font></th>
				<th style="background-color:darkblue"><font color="white">MC Name</font></th>
                <th style="background-color:darkblue"><font color="white">MC Initial</font></th>
                <th style="background-color:darkblue"><font color="white">Speed</font></th>
				<th style="background-color:darkblue"><font color="white">Responsible</font></th>
		
		
            </tr>
	</thead>   
	
        <tbody>
        <?php
        foreach($DaftarMCNumber->result() as $row){
        ?>
		<tr>
                    <td><?php echo $no; ?></td>
					<td><?php echo $row->id_mc_number;?></td>
					<td><?php echo $row->id_mc;?></td>
					<td><?php echo $row->mcname;?></td>
                    <td><?php echo $row->mc_initial?></td>
                    <td><?php echo $row->speed;?></td>
                    <td><?php echo $row->resp;?></td>
                   
                    
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