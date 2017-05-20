<div class="box span12">
    <div class="box-header well" data-original-title>
        <h2><i class="icon-inbox"></i>Setting Database</h2>
    </div>
    
    <div class="box-content">
    <form class="form-search" id="form_pencarian" name="form_pencarian" method="post" action="<?=base_url();?>index.php/Utama/Daftar_Setting_Database">
            <h4>Pencarian</h4>
            <input type="text" class="input-medium search-query" style="width: 20%" id="project" name="nama_database">
    <button type="submit" class="btn btn-primary">Cari</button>
    <a href="<?php echo base_url();?>index.php/Utama/Daftar_SettingDatabase" class="btn btn-primary"">Refresh</a>
    </form>
    
    <a class="btn btn-primary" href='<?php echo base_url();?>index.php/Utama/TambahSettingDatabase' title="Setting Database Baru">
                        <i class="icon-file icon-white"></i>  
                        Buat Database Baru                                           
                        </a>
        <hr>
        
<table class="table table-striped table-bordered bootstrap-datatable datatable">
<?php 

	$hal = $this->uri->segment(4);
	$no = $hal + 1;
	if(count($SettingDatabase->result()) > 0) {
	?>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Database</th>
                    <th>Username Database</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
<?php
        foreach($SettingDatabase->result() as $row){
        foreach($NamaDB as $keyDB => $valDB){
                        $pisahDB = explode("|", $valDB); 
                        if($pisahDB[1]==$row->id_pengaturan_database && $pisahDB[0]==1){
                        // echo $row->id_pengaturan_database;
                        
        ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row->nama_database;?></td>
                    <td><?php echo $row->username_database;?></td>
                    <td class="center">
                        <a class="btn btn-warning" href="<?php echo base_url();?>index.php/Utama/Import_Database/<?php echo $row->id_pengaturan_database;?>" title="Import Database">
                            <i class="icon-circle-arrow-down icon-white"></i>
                            Import Database
                        </a>
                        <?php 
                        foreach($NamaDB as $keyDB => $valDB){
                        $pisahDB = explode("|", $valDB);    
                        if($pisahDB[1]==$row->id_pengaturan_database && $pisahDB[0]==1){
                        $data = $this->db->query('SHOW TABLES FROM '.$pisahDB[2])->result(); 
                        }}
                        // var_dump($data); 
                        if(!empty($data)){
                        ?>
                        <a class="btn btn-info" href="<?php echo base_url();?>index.php/Utama/Export_Database/<?php echo $row->id_pengaturan_database;?>">
                            <i class="icon-circle-arrow-up icon-white"></i>
                            Eksport Database
                        </a>
                        
                        <?php }else{ ?>
                        <?php }?>
                        
                        <a href="<?php echo base_url();?>index.php/Utama/Hapus_Setting_Database/<?php echo $row->id_pengaturan_database;?>" onClick='return confirm("Anda yakin ingin menghapus data ini?")' title='Hapus' class="btn btn-primary">
                            <i class="icon-trash icon-white"></i>
                            Hapus
                        </a>
                        
                        <a class="btn btn-inverse" href="<?php echo base_url();?>index.php/Utama/UbahSettingDatabase/<?php echo $row->id_pengaturan_database;?>" title="Edit">
                            <i class="icon-edit icon-white"></i>
                            Edit
                        </a>
                    </td>
                </tr>
<?php
$no++;
}}
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