<div class="box span12">
    <div class="box-header well" data-original-title>
	<h2><i class="icon-user"></i>Daftar Pengguna</h2>					
    </div>
	<div class="box-content">
            <form class="form-search" id="form_pencarian" name="form_pencarian" method="post" action="<?=base_url();?>index.php/Moderator/Daftar_Pengguna">
            <h4>Pencarian</h4>
            <input type="text" class="input-medium search-query" style="width: 20%" id="nama_pengguna" name="nama_pengguna">
    <button type="submit" class="btn btn-primary">Cari</button>
    <a href="<?php echo base_url();?>index.php/Moderator/DaftarPengguna" class="btn btn-primary"">Refresh</a>
    </form>
<table class="table table-striped table-bordered bootstrap-datatable datatable">
<!-- ----------------- Membuat no otomatis [mengambil dari sehment 4 dan + 1]------------------------------- -->    
<?php 
$hal = $this->uri->segment(4);
$no = $hal + 1;
if(count($DaftarPengguna->result()) > 0) {
?>
	<thead>
            <tr>
		<th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Level</th>
		<th>Status</th>
		<th>Aksi</th>
            </tr>
	</thead>   
	
        <tbody>
        <?php
        foreach($DaftarPengguna->result() as $row){
        ?>
		<tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row->nama_depan_pengguna;?>  <?php echo $row->nama_belakang_pengguna;?></td>
                    <td><?php echo $row->email_pengguna;?></td>
                    <td><?php echo $row->nama_level;?></td>
                    <td class="center">
                    <?php
                    $status = $row->status_pengguna;
                    if($status == 0){
                    ?>
                    <span class="label label-success">Aktif</span>
                    <?php
                    }else{
                    ?>
                    <span class="label label-important">Tidak Aktif</span>
                    <?php
                    }
                    ?>
                    </td>
		
                    <td class="center">
                    <?php
                    $status = $row->status_pengguna;
                    if($status == 0){
                    ?>
                        <a class="btn btn-success" href='<?php echo base_url();?>index.php/Moderator/StatusPengguna/<?php echo $row->id_pengguna;?>/0'>
                        <i class="icon icon-white icon-gear"></i>  
                        Ubah Status                                           
                        </a>
                        <?php
                        }else{
                        ?>
                        <a class="btn btn-success" href='<?php echo base_url();?>index.php/Moderator/StatusPengguna/<?php echo $row->id_pengguna;?>/1'>
                        <i class="icon icon-white icon-gear"></i>  
                        Ubah Status                                           
                        </a>
                        <?php
                        }
                        ?>
                        
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

<!-- ----------------- Menampilkan pesan ------------------------------- -->              
        <?php
        } else {
        echo "<h4 class='alert_info'> Data Tidak Tersedia </h4>";
        }
        ?>