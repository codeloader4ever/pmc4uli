<div id="content" class="span12">
  <!-- content starts -->
  <div class="row-fluid sortable">
    <div class="box span9">
      <div class="box-header well" data-original-title>
          <h2><i class="icon-book"></i>Artikel</h2>
      </div>
      <div class="box-content">
<?php
             if(count($TampilArtikel->result()) > 0) {
       foreach($TampilArtikel->result() as $row){
            $isi = substr($row->isi_artikel,0,1000);
        ?>
        <!--/row -->
        <div class="row-fluid">
          <div class="span12">
            <h2><?php echo $row->judul_artikel;?></h2>
            <div class="tooltip-demo well">
              <p class="muted" style="margin-bottom: 0;"><?php echo $isi;?></p>
              <a class="btn btn-primary" href='<?php echo base_url();?>index.php/Utama/Detail_Artikel/<?php echo $row->id_artikel;?>'>Baca Selengkapnya</a>
              <hr>
              Penulis : <?php echo $row->nama_depan_pengguna;?> <?php echo $row->nama_belakang_pengguna;?> || Tanggal Terbit : <?php echo $row->tanggal_artikel;?> || Kategori : <?php echo $row->nama_kategori_artikel;?> 
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
    </div>
    <!--/span-->
    <div class="box span3">
      <div class="box-header well" data-original-title>
        <h3>Kategori Artikel</h3>
      </div>
        <ul>
 <?php
   foreach($TampilKategoriArtikel->result() as $row){
 ?>  
    <li>
    <a href='<?php echo base_url();?>index.php/Utama/Artikel_Menurut_Kategori/<?php echo $row->id_kategori_artikel;?>'><?php echo $row->nama_kategori_artikel;?></a>
    </li>
    <?php
      }
    ?>
  </ul>
    </div>
    <!--/span-->
    <!--/span-->
    <!--/span-->
  </div>
  <!--/row-->
  <!-- content ends -->
</div>
