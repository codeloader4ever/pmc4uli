<div class="box span12">
    <div class="box-header well" data-original-title>
	<h2><i class="icon-book"></i>Daftar Kategori Artikel</h2>
						
    </div>
    <div class="box-content">
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
			<td class="center">
                            <span class="label label-success">Status</span>
			</td>
			<td class="center">
			<a class="btn btn-success" href="#">
				<i class="icon icon-white icon-gear"></i>  
				Ubah Status                                           
			</a>
			<a class="btn btn-info" href="#">
				<i class="icon-edit icon-white"></i>  
				Edit                                            
			</a>
			<a class="btn btn-danger" href="#">
				<i class="icon-trash icon-white"></i> 
				Hapus
			</a>
			</td>
		</tr>
		<tr>
		  <td colspan="4"><span class="pagination"><?php echo $this->pagination->create_links(); ?></span></td>
		  </tr>
                  <?php
                    $no++;
                    }
                    ?>
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