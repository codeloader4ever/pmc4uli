<div class="box span12">
    <div class="box-header well" data-original-title>
        <h2><i class="icon-file"></i>Daftar Project</h2>
    </div>
    
    <div class="box-content">
        <form class="form-search" id="form_pencarian" name="form_pencarian" method="post" action="<?=base_url();?>index.php/Utama/Daftar_Project">
            <h4>Pencarian</h4>
            <input type="text" class="input-medium search-query" style="width: 20%" id="project" name="nama_project">
    <button type="submit" class="btn btn-primary">Cari</button>
    <a href="<?php echo base_url();?>index.php/Utama/DaftarProject" class="btn btn-primary"">Refresh</a>
    </form>
        
        <a class="btn btn-primary" href='<?php echo base_url();?>index.php/Utama/TambahProject' title="Buat Project Baru">
                        <i class="icon-file icon-white"></i>  
                        Buat Project Baru                                           
                        </a>
        <hr>
        <table class="table table-striped table-bordered bootstrap-datatable datatable">
        <?php 
	$hal = $this->uri->segment(4);
	$no = $hal + 1;
	if(count($DaftarProject->result()) > 0) {
	?>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Project</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            
            <tbody>
                
                <?php
        foreach($DaftarProject->result() as $row){
        ?>
                
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row->nama_project;?></td>
                    <td class="center"><?php echo $row->tanggal_project;?></td>
                    <td class="center">
                    <?php
                    $status = $row->status_project;
                    if($status == 0){
                    ?>
                      <span class="label label-success">di Publikasi</span>
                    <?php
                    }else{
                    ?>
                    <span class="label label-important">Tidak di Publikasi</span>
                    <?php
                    }
                    ?>
                    </td>
                    <td class="center">
                       <?php
                    $status = $row->status_project;
                    if($status == 0){
                    ?>
                        <a class="btn btn-success" href='<?php echo base_url();?>index.php/Utama/StatusProject/<?php echo $row->id_project;?>/0' title="Ubah Status">
                        <i class="icon icon-white icon-gear"></i>  
                        Ubah Status                                           
                        </a>
                        <?php
                        }else{
                        ?>
                        <a class="btn btn-success" href='<?php echo base_url();?>index.php/Utama/StatusProject/<?php echo $row->id_project;?>/1' title="Ubah Status">
                        <i class="icon icon-white icon-gear"></i>  
                        Ubah Status                                           
                        </a>
                        <?php
                        }
                        ?>
                        <a class="btn btn-info" href='<?php echo base_url();?>index.php/Utama/UbahProject/<?php echo $row->id_project;?>' title="Edit">
                        <i class="icon-edit icon-white"></i>  
                        Edit                                            
                        </a>
                        <a class="btn btn-danger" href='<?php echo base_url();?>index.php/Utama/Hapus_Project/<?php echo $row->id_project;?>' onClick='return confirm("Anda yakin ingin menghapus data ini?")' title='Hapus'>
                        <i class="icon-trash icon-white"></i> 
                        Hapus
                        </a>
                        <a class="btn btn-inverse" href="<?php echo base_url();?>Demo/<?php echo $row->nama_project;?>" target="_blank">
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
                        <a class="btn btn-primary" href="<?php echo base_url();?>index.php/Utama/Download_My_Project/<?php echo $row->id_project;?>">
                            <i class="icon-download icon-white"></i>
                            Unduh
                        </a>
                        <?php
                        }
                        ?>
                        <a class="btn btn-warning" href="<?php echo base_url();?>index.php/Utama/Upload/<?php echo $row->id_project;?>">
                            <i class="icon-download icon-white"></i>
                            Upload
                        </a>
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

                        <a class="btn" href="<?php echo base_url();?>index.php/Utama/SettingDatabase/<?php echo $row->id_project;?>">
                            <i class="icon-wrench"></i>
                            Setting Database
                        </a>
                    </td>
                </tr>
<?php
$no++;
}
?>
                <tr>
                  <td colspan="5"><?php echo $this->pagination->create_links(); ?></td>
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

