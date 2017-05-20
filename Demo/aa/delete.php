<?php
//Panggil Koneksi
include "koneksi.php";

// Cek nip
if (isset($_GET['nip'])) {
	$nip = $_GET['nip'];
// membaca nama file yang akan dihapus berdasarkan nip
$query   = "SELECT * FROM karyawan WHERE nip ='$nip'";
$hasil   = mysql_query($query);
$data    = mysql_fetch_array($hasil);
$namafoto = $data['namafoto'];
} else {
	die ("Error. Tak ada Nip yang dipilih Silakan cek kembali! ");	
}

	//proses delete data
	if (!empty($nip) && $nip != "") {
		//Hapus data
		$query = "DELETE FROM karyawan WHERE nip='$nip'";
		$sql = mysql_query ($query);
		// menghapus file dalam folder sesuai namanya
		unlink("images/".$namafoto);
		if ($sql) {		
			?>
				<script language="JavaScript">
				alert('Data Berhasil dihapus');
				document.location='index.php?page=tampil';
				</script>
			<?
			
				
		} else {
			echo "<h2><font color=red><center>Data pegawai gagal dihapus</center></font></h2>";	
	}}
	?>
</div>