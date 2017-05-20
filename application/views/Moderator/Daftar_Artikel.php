<div class="box span12">
    <div class="box-header well" data-original-title>
	<h2><i class="icon-book"></i>Daftar Artikel</h2>
						
    </div>
    <div class="box-content">
      <form class="form-search" id="form_pencarian" name="form_pencarian" method="post" action="<?=base_url();?>index.php/Moderator/Daftar_Artikel">
            <h4>Pencarian</h4>
            <input type="text" class="input-medium search-query" style="width: 20%" id="judul_artikel" name="judul_artikel">
    <button type="submit" class="btn btn-primary">Cari</button>
    <a href="<?php echo base_url();?>index.php/Moderator/DaftarArtikel" class="btn btn-primary"">Refresh</a>
    </form>
	<table class="table table-striped table-bordered bootstrap-datatable datatable">
    <!-- ----------------- Membuat no otomatis [mengambil dari sehment 4 dan + 1]------------------------------- -->    
	<?php 
	$hal = $this->uri->segment(4);
	$no = $hal + 1;
	if(count($DaftarArtikel->result()) > 0) {
	?>
	<thead>
	<tr>
		<th>No</th>
		<th>Judul</th>
                <th>Tanggal</th>
		<th>Kategori Artikel</th>
		<th>Status</th>
		<th>Aksi</th>
	</tr>
	</thead>   
        <tbody>
        <?php
        foreach($DaftarArtikel->result() as $row){
        ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td class="center"><?php echo $row->judul_artikel;?></td>
                        <td class="center"><?php echo $row->tanggal_artikel;?></td>
                        <td class="center"><?php echo $row->nama_kategori_artikel;?></td>
			<td class="center">
            <?php
                    $status = $row->status_artikel;
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
                    $status = $row->status_artikel;
                    if($status == 0){
                    ?>
                        <a class="btn btn-success" href='<?php echo base_url();?>index.php/Moderator/StatusArtikel/<?php echo $row->id_artikel;?>/0' title="Ubah Status">
                        <i class="icon icon-white icon-gear"></i>  
                        Ubah Status                                           
                        </a>
                        <?php
                        }else{
                        ?>
                        <a class="btn btn-success" href='<?php echo base_url();?>index.php/Moderator/StatusArtikel/<?php echo $row->id_artikel;?>/1' title="Ubah Status">
                        <i class="icon icon-white icon-gear"></i>  
                        Ubah Status                                           
                        </a>
                        <?php
                        }
                        ?>
                        <a class="btn btn-info" href='<?php echo base_url();?>index.php/Moderator/UbahArtikel/<?php echo $row->id_artikel;?>' title="Edit">
                        <i class="icon-edit icon-white"></i>  
                        Edit                                            
                        </a>
                        <a class="btn btn-danger" href='<?php echo base_url();?>index.php/Moderator/Hapus_Artikel/<?php echo $row->id_artikel;?>' onClick='return confirm("Anda yakin ingin menghapus data ini?")' title='Hapus'>
                        <i class="icon-trash icon-white"></i> 
                        Hapus
                        </a>
		</td>
          </tr>
          <?php
$no++;
}
?>
		<tr>
                    <td colspan="6"><?php echo $this->pagination->create_links(); ?></td> 
                </tr>

			</td>
           
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