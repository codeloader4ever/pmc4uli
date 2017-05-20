<div class="box span12">
    <div class="box-header well" data-original-title>
        <h2><i class="icon-th-list"></i>Daftar Project Yang Dipublikasi</h2>
    </div>
    
    <div class="box-content">
    <form class="form-search" id="form_pencarian" name="form_pencarian" method="post" action="<?=base_url();?>index.php/Utama/Daftar_Publikasi_2">
            <h4>Pencarian</h4>
            <input type="text" class="input-medium search-query" style="width: 20%" id="project" name="nama_project">
    <button type="submit" class="btn btn-primary">Cari</button>
    <a href="<?php echo base_url();?>index.php/Utama/DaftarPublikasi_2" class="btn btn-primary"">Refresh</a>
    </form>    
<table class="table table-striped table-bordered bootstrap-datatable datatable">
<?php 
	$hal = $this->uri->segment(4);
	$no = $hal + 1;
	if(count($DaftarPublikasi->result()) > 0) {
	?>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Project</th>
                    <th>Nama Anggota</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
<?php
        foreach($DaftarPublikasi->result() as $row){
        ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row->nama_project;?></td>
                    <td><?php echo $row->nama_depan_pengguna;?> <?php echo $row->nama_belakang_pengguna;?></td>
                    <td class="center">
                        <a class="btn btn-warning" href="<?php echo base_url();?>index.php/Utama/Tambah_Pesan/<?php echo $row->id_project;?>/<?php echo $row->id_pengguna;?>">
                            <i class="icon-envelope icon-white"></i>
                            Pesan
                        </a>
                        
                        <a href="<?php echo base_url();?>Demo/<?php echo $row->nama_project;?>" target="_blank" class="btn btn-primary">
                            <i class="icon-eye-open icon-white"></i>
                            Demo
                        </a>
                        
                        <?php
                        $dirPath = "Demo/".$row->nama_project;

                        $destdir = $dirPath;

                        $handle = opendir($destdir);
                        $c = 0;
                        while ($file = readdir($handle)&& $c<3) {
                            $c++;
                        }

                        if ($c>2) {
                        ?>    
                        <a class="btn btn-inverse" href="<?php echo base_url();?>index.php/Utama/Download_My_Project/<?php echo $row->id_project;?>">
                            <i class="icon-download icon-white"></i>
                            Unduh Project
                        </a>
                        <?php
                        }
                        ?>
                         <?php 
                        foreach($NamaDB as $keyDB => $valDB){
                        $pisahDB = explode("|", $valDB);    
                        if($pisahDB[1]==$row->id_pengaturan_database && $pisahDB[0]==1){
                        $data = $this->db->query('SHOW TABLES FROM '.$pisahDB[2])->result(); 
                        }}
                        // var_dump($data); 
                        if(!empty($data) && $row->id_pengaturan_database!=0){
                        ?>
                        <a class="btn btn-info" href="<?php echo base_url();?>index.php/Utama/Export_Database/<?php echo $row->id_pengaturan_database;?>">
                            <i class="icon-circle-arrow-up icon-white"></i>
                            Eksport Database
                        </a>
                        
                        <?php }else{ ?>
                        
                        <?php }?>
                        
                    </td>
                </tr>
<?php
$no++;
}
?>
                <tr>
                  <td colspan="4"><?php echo $this->pagination->create_links(); ?></td>
                </tr>
         </tbody>
        </table>
    </div>
</div>


        <?php
        } else {
        echo "<h4 class='alert_info'> Data Tidak Tersedia </h4>";
        }
        ?>