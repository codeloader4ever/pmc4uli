<div class="box span12">
    <div class="box-header well" data-original-title>
	<h2><i class="icon-book"></i>Sub Big Loss</h2>					
    </div>
	<div class="box-content">
            <form class="form-search" id="form_pencarian" name="form_pencarian" method="post" action="<?=base_url();?>index.php/Admin/Daftar_Subbigloss">
            <h4>Search</h4>
            <input type="text" class="input-medium search-query" style="width: 20%" id="judul_kategori_artikel" name="judul_kategori_artikel">
    <button type="submit" class="btn btn-primary">Find</button>
    <a href="<?php echo base_url();?>index.php/Admin/DaftarSubbigloss" class="btn btn-primary">Refresh</a>
	<a href="<?php echo base_url();?>index.php/Export_tbl_subbigloss/export" class="btn btn-primary">Export To Excel</a>
    </form>
<table class="table  table-bordered bootstrap-datatable datatable" style="background-color:white">
<!-- ----------------- Membuat no otomatis [mengambil dari sehment 4 dan + 1]------------------------------- -->    
<?php 
$hal = $this->uri->segment(4);
$no = $hal + 1;
if(count($DaftarSubbigloss->result()) > 0) {
?>
	<thead>
            <tr>
		<th style="background-color:darkblue"><font color="white">No </font></th>
				<th style="background-color:darkblue" ><font color="white"> ID Sub Big Loss </font></th>
				<th style="background-color:darkblue"><font color="white">Sub Big Loss Name</font></th>
				<th style="background-color:darkblue"><font color="white">Sub Big Loss Desc</font></th>
				<th style="background-color:darkblue"><font color="white">Id Big Loss</font></th>
                <th style="background-color:darkblue"><font color="white">Big Loss Name</font></th>
                <th style="background-color:darkblue"><font color="white">Big Loss Desc</font></th>
				
		
		
            </tr>
	</thead>   
	
        <tbody>
        <?php
        foreach($DaftarSubbigloss->result() as $row){
        ?>
		<tr>
                    <td><?php echo $no; ?></td>
					<td><?php echo $row->id_subbigloss;?></td>
					<td><?php echo $row->subbiglossname;?></td>
					<td><?php echo $row->subbiglossdesc;?></td>
                    <td><?php echo $row->id_bigloss?></td>
                    <td><?php echo $row->biglossname;?></td>
                    <td><?php echo $row->biglossdesc;?></td>
                   
                    
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