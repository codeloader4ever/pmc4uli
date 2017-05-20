<div id="content" class="span12">
  <!-- content starts -->
  <div class="row-fluid sortable">
    <div class="box span9">
      <div class="box-header well" data-original-title>
          <h2><i class="icon-book"></i>Artikel</h2>
      </div>
      <div class="box-content">
<?php
  foreach($TampilArtikel->result() as $row){
 ?>
        <!--/row -->
        <div class="row-fluid">
          <div class="span12">
            <h2><?php echo $row->judul_artikel;?></h2>
            <div class="tooltip-demo well">
              <p class="muted" style="margin-bottom: 0;"><?php echo $row->isi_artikel;?></p>
              <hr>
              Penulis : <?php echo $row->nama_depan_pengguna;?> <?php echo $row->nama_belakang_pengguna;?> || Tanggal Terbit : <?php echo $row->tanggal_artikel;?> || Kategori : <?php echo $row->nama_kategori_artikel;?> 
            </div>
          </div>
        </div>
        <?php
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
