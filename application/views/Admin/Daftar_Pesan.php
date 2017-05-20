<div class="box span12">
    <div class="box-header well" data-original-title>
	<h2><i class="icon-book"></i>Daftar Pesan</h2>
						
    </div>
    <div class="box-content">
      <form class="form-search" id="form_pencarian" name="form_pencarian" method="post" action="<?=base_url();?>index.php/Admin/Daftar_Pesan">
            <h4>Pencarian</h4>
            <input type="text" class="input-medium search-query" style="width: 20%" id="isi" name="isi">
    <button type="submit" class="btn btn-primary">Cari</button>
    <a href="<?php echo base_url();?>index.php/Admin/DaftarPesan" class="btn btn-primary"">Refresh</a>
    </form>
	<table class="table table-striped table-bordered bootstrap-datatable datatable">
    <!-- ----------------- Membuat no otomatis [mengambil dari sehment 4 dan + 1]------------------------------- -->    
	<?php 
	$hal = $this->uri->segment(4);
	$no = $hal + 1;
	if(count($DaftarPesan->result()) > 0) {
	?>
	<thead>
	<tr>
		<th>No</th>
		<th>Pengirim</th>
                <th>Penerima</th>
                <th>Tanggal</th>
		<th>Isi Pesan</th>
		<th>Aksi</th>
	</tr>
	</thead>   
        <tbody>
        <?php
        foreach($DaftarPesan->result() as $row){
        ?>
		<tr>
			<td><?php echo $no; ?></td>
                        <?php
                        foreach($DaftarPengguna->result() as $row2){
                        if($row->id_pengguna == $row2->id_pengguna){    
                        ?>
			<td class="center"><?php echo $row2->nama_depan_pengguna;?> <?php echo $row2->nama_belakang_pengguna;?></td>
                        <?php
                        }
                        }
                        ?>
                        
                        <?php
                        foreach($DaftarPengguna->result() as $row2){
                        if($row->id_pengguna_2 == $row2->id_pengguna){    
                        ?>
			<td class="center"><?php echo $row2->nama_depan_pengguna;?> <?php echo $row2->nama_belakang_pengguna;?></td>
                        <?php
                        }
                        }
                        ?>
                        
                        <td class="center"><?php echo $row->tanggal_pesan;?></td>
                        <td class="center"><?php echo $row->isi_pesan;?></td>
                        <td class="center">
                        <a class="btn btn-danger" href='<?php echo base_url();?>index.php/Admin/HapusPesan/<?php echo $row->id_pesan;?>' onClick='return confirm("Anda yakin ingin menghapus data ini?")' title='Hapus'>
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