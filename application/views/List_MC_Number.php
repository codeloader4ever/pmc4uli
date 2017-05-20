
<div class="box span12">
    <div class="box-header well" data-original-title>
	<i class="icon-book"></i><font color="white" size="2">Machine Records</font>				
    </div>
	
    </div>
<table class="table  table-bordered bootstrap-datatable datatable" style="background-color:white">
<!-- ----------------- Membuat no otomatis [mengambil dari sehment 4 dan + 1]------------------------------- -->    
<?php 
$hal = $this->uri->segment(4);
$no = $hal + 1;
if(count($ListMCNumber->result()) > 0) {
?>
	<thead>
            <tr>
		<th style="background-color:midnightblue"><font color="white">No </font></th>
				<th style="background-color:midnightblue" ><font color="white"> MC Number </font></th>
				<th style="background-color:midnightblue"><font color="white">ID MC</font></th>
				<th style="background-color:midnightblue"><font color="white">MC Name</font></th>
                <th style="background-color:midnightblue"><font color="white">MC Initial</font></th>
                <th style="background-color:midnightblue"><font color="white">Speed</font></th>
				<th style="background-color:midnightblue"><font color="white">Responsible</font></th>
		
		
            </tr>
	</thead>   
	
        <tbody>
        <?php
        foreach($ListMCNumber->result() as $row){
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