<div class="box span12">
    <div class="box-header well" data-original-title>
	<h2><i class="icon-book"></i>Daftar Kategori Artikel</h2>
						
    </div>
    <div class="box-content">
        <form class="form-search" id="form_pencarian" name="form_pencarian" method="post" action="<?=base_url();?>index.php/Moderator/Daftar_KategoriArtikel">
            <h4>Pencarian</h4>
            <input type="text" class="input-medium search-query" style="width: 20%" id="judul_kategori_artikel" name="judul_kategori_artikel">
    <button type="submit" class="btn btn-primary">Cari</button>
    <a href="<?php echo base_url();?>index.php/Moderator/DaftarKategoriArtikel" class="btn btn-primary"">Refresh</a>
    </form>
	<table class="table table-striped table-bordered bootstrap-datatable datatable">
            <!-- ----------------- Membuat no otomatis [mengambil dari sehment 4 dan + 1]------------------------------- -->    
                <?php 
                $hal = $this->uri->segment(4);
                $no = $hal + 1;
                if(count($DaftarKategoriArtikel->result()) > 0) {
                ?>
	<thead>
	<tr>
		<th>No</th>
		<th>Nama Kategori Artikel</th>
		<th>Status</th>
		<th>Aksi</th>
	</tr>
	</thead>   
        <tbody>
            <?php
            foreach($DaftarKategoriArtikel->result() as $row){
            ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td class="center"><?php echo $row->nama_kategori_artikel;?></td>
			<td class="center"> <?php
            $status = $row->status_kategori_artikel;
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
            $status = $row->status_kategori_artikel;
            if($status == 0){
            ?>
            <a class="btn btn-success" href='<?php echo base_url();?>index.php/Moderator/StatusKategoriArtikel/<?php echo $row->id_kategori_artikel;?>/0'>
			<i class="icon icon-white icon-gear"></i>  
			Ubah Status                                           
			</a>
            <?php
            }else{
            ?>
			<a class="btn btn-success" href='<?php echo base_url();?>index.php/Moderator/StatusKategoriArtikel/<?php echo $row->id_kategori_artikel;?>/1'>
			<i class="icon icon-white icon-gear"></i>  
			Ubah Status                                           
			</a>
            <?php
            }
            ?>
			<a class="btn btn-info" href= '<?php echo base_url();?>index.php/Moderator/UbahKategoriArtikel/<?php echo $row->id_kategori_artikel;?>' title="Edit">
				<i class="icon-edit icon-white"></i>
                                Edit
                                
			</a>
			<a class="btn btn-danger" href='<?php echo base_url();?>index.php/Moderator/HapusKategoriArtikel/<?php echo $row->id_kategori_artikel;?>' onClick='return confirm("Anda yakin ingin menghapus data ini?")' title='Hapus'>
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
		  <td colspan="4"><span class="pagination"><?php echo $this->pagination->create_links(); ?></span></td>
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