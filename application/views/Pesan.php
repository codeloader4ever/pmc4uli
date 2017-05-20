<div id="content" class="span12">
  <!-- content starts -->
  <div class="row-fluid sortable">
    <div class="box span3">
      <div class="box-header well" data-original-title>
        <h2>Pesan Masuk</h2>
      </div>
      <div class="box-content">
<?php
   if(count($Tampil_Pesan->result()) > 0) {
   foreach($Tampil_Pesan->result() as $row){
   $isi = substr($row->isi_pesan,0,50);
?> 
        <!--/row -->
        <div class="row-fluid">
          <div class="span12">
              <?php if($this->session->userdata('id_pengguna')==$row->id_pengguna){?>
              
              
              <?php
              foreach($Pengguna->result() as $row2){
              ?> 
              
              <h4><?php 
              if ($row->id_pengguna_2==$row2->id_pengguna){ ?>
              <?php
              echo 'Ke : ';
              echo $row2->nama_depan_pengguna;?>
              <?php 
              echo $row2->nama_belakang_pengguna;?></h4>Tanggal : <?php echo $row->tanggal_pesan;               
              ?>
              <div class="tooltip-demo well">
              <div><?php echo $isi;?> <a href="<?php echo base_url();?>index.php/Utama/Pesan/<?php echo $row->id_project;?>/<?php echo $row2->id_pengguna;?>">    <i class="icon icon-replyall"></i></a></div>
            
            </div>
            <?php  }
              ?> 
              
              
              <?php }
              }else{              
             $hal = $this->uri->segment(5);
              ?>
              <h4><?php echo 'Dari : '.$row->nama_depan_pengguna;?> <?php echo $row->nama_belakang_pengguna;?></h4>Tanggal : <?php echo $row->tanggal_pesan;?>
              <div class="tooltip-demo well">
              <div><?php echo $isi;?> <a href="<?php echo base_url();?>index.php/Utama/Pesan/<?php echo $row->id_project;?>/<?php echo $row->id_pengguna;?>/<?php 
              if(empty($hal)){
              echo 000;
              }  else {
              echo $hal;    
              }
              ;?>">    <i class="icon icon-replyall"></i></a></div>
            
            </div> 
             <?php } ?>   
              
          </div>
        </div>
        <?php
         }
        ?> 
        <strong><?php echo $paging1; ?></strong>
        <?php
        } else {
        echo "<h4 class='alert_info'> Data Tidak Ada </h4>";
        }
        ?>
      </div>
    </div>
    <!--/span-->
   <div class="box span9">
      <div class="box-header well" data-original-title>
        <h2>Balas Pesan</h2>
      </div>
      <div class="box-content">
<?php
   if(count($Balas_Pesan->result()) > 0) {
   foreach($Balas_Pesan->result() as $row3){
   
?> 
        <!--/row -->
        <div class="row-fluid">
          <div class="span12">
            <h4><?php echo $row3->nama_depan_pengguna;?> <?php echo $row3->nama_belakang_pengguna;?></h4> Tanggal : <?php echo $row3->tanggal_pesan;?>
            <div class="tooltip-demo well">
              <?php echo $row3->isi_pesan;?>
            </div>
          </div>
            <?php } 
            $id_project = $this->uri->segment(3);
        if($id_project==''){
            $id_project= 0;
        }
        $id_kirimi = $this->uri->segment(4);
        if($id_kirimi==''){
            $id_kirimi= 0;
        }
        $per_hal = $this->uri->segment(4);
        if($per_hal==''){
            $per_hal= 0;
        }
        ?>
           <strong><?php echo $paging2; ?></strong> 
            <form method="post" action="<?php echo base_url();?>index.php/Utama/Tambah_Balasan_Pesan/<?php echo $id_project;?>/<?php echo $id_kirimi;?>">
<textarea name="isi_pesan" style="width:98%; height:150px; "></textarea>
<button type="submit" class="btn btn-primary">Kirim</button>
  </form>
        </div>
        <?php
        } else {
        echo "<h4 class='alert_info'> Data Tidak Ada </h4>";
        }
        ?>
      </div>
    </div> 
  </div>
  
  <!--/row-->
  <!-- content ends -->
</div>
