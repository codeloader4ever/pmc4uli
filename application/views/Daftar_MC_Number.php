
<div class="box span12">
    <div class="box-header well" data-original-title>
	<i class="icon-book"></i><font color="white" size="2">Machine Records</font>				
    </div>
	<div class="box-content">
	
<form class="form-horizontal" method="post"  >
 
            <fieldset>
            
<?php 
 
(isset($_POST["datepicker"])) ? $datepicker = $_POST["datepicker"] : $datepicker=date('d/m/Y');
 
?>  

              <label class="control-label" for="typeahead"><font color="white">Date</font></label>
              <div class="controls">
                <input type="text"  id="datepicker" name="datepicker" value="<?php echo $datepicker; ?>">
              </div> 
            
                                                                   
<?php 
 
(isset($_POST["shift"])) ? $shift = $_POST["shift"] : $shift="";
 
?>

               <label class="control-label" for="shift"><font color="white">Shift</font></label>
                                                            <div class="controls" id="combo_status">
                                                              <select id="validateSelect" name="shift" id="shift"  >
 <option <?php if ($shift == 0 ) echo 'selected' ; ?> value="0"></option>
 <option <?php if ($shift == 'Pagi' ) echo 'selected' ; ?> value="Pagi">Pagi</option> 
 <option <?php if ($shift == 'Siang' ) echo 'selected' ; ?> value="Siang">Siang</option>                                                       
 <option <?php if ($shift == 'Malam' ) echo 'selected' ; ?> value="Malam">Malam</option>                            


                                
                                                          </select>
                                
                                                            </div>        

                         
			


                                                                <label class="control-label" for="Deskripsi"><font color="white">Select Report</font></label>
                                                            <div class="controls" id="combo_status">
                                                              <select id="validateSelect" name="Level" id="Level" class="status">
																<option value="0"></option>
                                                                <!--<option value="1">Loss Tree</option>
                                                                <option value="2">Breakdown Analysis</option>
																<option value="3">Daily Production Monitoring</option>
																<option value="4">Production Premi Report</option>
																<option value="5">Minor Stoppage Report</option>-->
																<option value="6" selected="true">e-PAMCO</option>
                                                              </select>
															        <input type="submit" class="btn btn-primary" name="search" value="Search" /> 
                                                            </div>  
                                                  

														<br>

 
<?php 
 
(isset($_POST["approval"])) ? $approval = $_POST["approval"] : $approval=0;
 
?> 

                                                                <label class="control-label" for="Deskripsi" ><font color="white">Approval</font></label>
                                                            <div class="controls" id="combo_status">
                                                              <select id="inputSuccess" name="approval" id="approval" class="status">
                                <option <?php if ($approval == 0 ) echo 'selected' ; ?> value="0"></option>
																<option <?php if ($approval == 1 ) echo 'selected' ; ?> value="1">Approved</option>
                                <option <?php if ($approval == 2 ) echo 'selected' ; ?> value="2">Waiting Approvel</option>
																<option <?php if ($approval == 3 ) echo 'selected' ; ?> value="3">Denied</option>
																
                                                              </select>
															  <input type="submit" class="btn btn-primary" name="submit" value="Submit" onClick='return confirm("Are you sure Submit this data?")' title="Approval" /> 
                                <input type="submit" class="btn btn-primary" name="excel" value="Excel"  title="Excel" /> 
                                                            </div>  
                                                            </div>												
          
    
<hr style="border-color:yellow" height="1">




<!-- ----------------- Membuat no otomatis [mengambil dari sehment 4 dan + 1]------------------------------- -->    
<?php 
$hal = $this->uri->segment(4);
$no = $hal+1;
$no1 = $hal+1;
$no2 = $hal+1;

if(count($DaftarMCNumber->result()) > 0) {
?>

<?php $row = $DaftarMCRecord->row(); ?>

 
 <table>           
            
<th> <label class="control-label" for="typeahead"><font color="white">Machine Type</font></label> </th>
<th> <label class="control-label" for="typeahead"><font color="white">Machine No</font></label> </th>    
<th> <label class="control-label" for="typeahead"><font color="white">Item COde </font></label> </th>
<th><label class="control-label" for="typeahead"><font color="white">Item Name</font></label></th>



              <tr> 
              <td><input type="text"  id="machinetype" name="machinetype" value="<?php echo $row->mcname;?>"> </td>
              <td><input type="text"  id="machinetype" name="machinetype" value="<?php echo $row->id_mc_number;?>"> </td>
              <td> <input type="text"  id="itemcode" name="itemcode" value="<?php echo $row->item_code;?>"> </td>
                <td><input type="text"  id="itemname" name="itemname" value="<?php echo $row->productname;?>"></td>
                </tr>
              
</table>

  <hr style="border-color:yellow" height="1">            
             


 </fieldset>
        </form>
      </div>

<table class="table  table-bordered bootstrap-datatable datatable" style="background-color:white" >
	<thead>
            <tr> <font color="yellow"> Bigloss Records</font>
		<th style="background-color:midnightblue"><font color="white">No </font></th>
				<th style="background-color:midnightblue"><font color="white"> Bigloss </font></th>
				<th style="background-color:midnightblue"><font color="white">Sub Bigloss</font></th>
				<th style="background-color:midnightblue"><font color="white">Record Time</font></th>
        <th style="background-color:midnightblue"><font color="white">Duration</font></th>
        <th style="background-color:midnightblue"><font color="white">Description</font></th>
				
        
		
		
            </tr>
	</thead>   

        <tbody>
        <?php
        foreach($DaftarMCNumber->result() as $row){
        ?>
		<tr>
                    <td><?php echo $no; ?></td>
					<td><?php echo $row->biglossname;?></td>
					<td><?php echo $row->subbiglossname;?></td>
					<td><?php echo $row->record_time;?></td>
                    <td><?php echo gmdate("H:i:s",$row->duration);?></td>
                    <td><?php echo $row->description;?></td>
                    
                    
                   
                    
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

<table class="table  table-bordered bootstrap-datatable datatable" style="background-color:white">
<thead>
            <tr> <font color="yellow"> Measurement & Adjustment</font>
    <th style="background-color:midnightblue"><font color="white">No </font></th>
        <th style="background-color:midnightblue" ><font color="white"> Problem </font></th>
        <th style="background-color:midnightblue"><font color="white">Sub Problem</font></th>
        <th style="background-color:midnightblue"><font color="white">Record Time</font></th>
                <th style="background-color:midnightblue"><font color="white">Duration</font></th>
                <th style="background-color:midnightblue"><font color="white">Description</font></th>
        
            </tr>
  </thead>   
<tbody>
        <?php
        foreach($DaftarMCProblem1->result() as $row){
        ?>
    <tr>
                    <td><?php echo $no1; ?></td>
          <td><?php echo $row->problemname;?></td>
          <td><?php echo $row->subproblemname;?></td>
          <td><?php echo $row->record_time;?></td>
                    <td><?php echo gmdate("H:i:s",$row->duration);?></td>
                    <td><?php echo $row->description;?></td>
                    
                    
                   
                    
            </tr>
<?php
$no1++;
}
?> 
    <tr>
                    <td colspan="6"><?php echo $this->pagination->create_links(); ?></td>
    </tr>
    </tbody>

		</table>

</table>

<table class="table  table-bordered bootstrap-datatable datatable" style="background-color:white">
<thead>
            <tr> <font color="yellow"> Breakdown & Equipment Failure Time </font>
    <th style="background-color:midnightblue"><font color="white">No </font></th>
        <th style="background-color:midnightblue" ><font color="white"> Problem </font></th>
        <th style="background-color:midnightblue"><font color="white">Sub Problem</font></th>
        <th style="background-color:midnightblue"><font color="white">Record Time</font></th>
                <th style="background-color:midnightblue"><font color="white">Duration</font></th>
                <th style="background-color:midnightblue"><font color="white">Description</font></th>
        
            </tr>
  </thead>   
<tbody>
        <?php
        foreach($DaftarMCProblem2->result() as $row){
        ?>
    <tr>
                    <td><?php echo $no2; ?></td>
          <td><?php echo $row->problemname;?></td>
          <td><?php echo $row->subproblemname;?></td>
          <td><?php echo $row->record_time;?></td>
                    <td><?php echo gmdate("H:i:s",$row->duration);?></td>
                    <td><?php echo $row->description;?></td>
                    
                    
                   
                    
            </tr>
<?php
$no2++;
}
?> 
    <tr>
                    <td colspan="6"><?php echo $this->pagination->create_links(); ?></td>
    </tr>
    </tbody>

    </table>
<hr style="border-color:yellow" height="1">

<table class="table  table-bordered bootstrap-datatable datatable" style="background-color:white" >
    <thead>
            
        <tr> <font color="yellow"> Total </font>    
        <th style="background-color:midnightblue"><font color="white">Counter </font></th>
                <th style="background-color:midnightblue"><font color="white"> OEE </font></th>
                <th style="background-color:midnightblue"><font color="white">Outer</font></th>
                <th style="background-color:midnightblue"><font color="white">Total Loss Time</font></th>       
                <th style="background-color:midnightblue"><font color="white">MC Efficiency(%)</font></th>
                <th style="background-color:midnightblue"><font color="white">Operator</font></th>       
                <th style="background-color:midnightblue"><font color="white">Responsible</font></th>

       </tr> 
            
    </thead>   


<tbody>
        <?php $row = $DaftarMCRecord->row(); ?>
        <?php $row1= $DaftarTotalMCRecord1 ->row(); ?>
        <?php $row2= $DaftarTotalMCRecord2 ->row(); ?>
        <tr>
                    
                    <td><?php echo $row->counter;?></td>
                    <td><?php echo $row->counter/$row->speed;?></td>
                    <td><?php echo $row->counter/$row->n_fib;?></td>
                    <td><?php echo gmdate("H:i:s",$row1->duration+$row2->duration);?></td>
                    <td><?php echo $row->counter/(480*$row->speed)*100;?></td>
                    <td><?php echo $row->opr1name.",".$row->opr2name;?></td>
                    <td><?php echo $row->spvname;?></td>
                    
                    
                   
                    
            </tr>
</table>


        </div>
</div>

<!-- ----------------- Menampilkan pesan ------------------------------- -->              
       
        <?php
        } else  { 
          echo "<h4 class='alert_info'> <font color='red'> Data Not Found </font></h4>";
        }
        ?>




