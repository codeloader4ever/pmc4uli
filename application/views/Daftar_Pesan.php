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
              echo $row2->nama_depan_pengguna;?>
              <?php 
              echo $row2->nama_belakang_pengguna;?></h4>Tanggal : <?php echo $row->tanggal_pesan;               
              }
              ?> 
              
              
              <?php }
              }else{
              ?>
           
              <h4><?php echo $row->nama_depan_pengguna;?> <?php echo $row->nama_belakang_pengguna;?></h4>Tanggal : <?php echo $row->tanggal_pesan;?>
              <?php } ?>   
              <div class="tooltip-demo well">
              <div><?php echo $isi;?> <a href="<?php echo base_url();?>index.php/Utama/Balasan_Pesan/<?php echo $row->id_project;?>">    <i class="icon icon-replyall"></i></a></div>
            
            </div>
          </div>
        </div>
        <?php
         }
        ?> 
        <strong><?php echo $this->pagination->create_links(); ?></strong>
        <?php
        } else {
        echo "<h4 class='alert_info'> Data Tidak Ada </h4>";
        }
        ?>
      </div>