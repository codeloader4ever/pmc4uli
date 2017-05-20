<? /**

 * @version		1.0
 * @package		Karyawan
 * @copyright	Copyright (C) 2007 - 2009 Asep Setiawan. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Aplikasi untuk Latihan Sederhana mahasiswa dcc lampung
 * Menggunkan PHP + SQL + CSS + JavaScript 
 * See COPYRIGHT.php for copyright notices and details.
 * More Tutorial you can find at www.contoh-ta.blogspot.com
 */ ?>

<? ini_set('display_errors', 1); ini_set('error_reporting', E_ERROR);
//Cek Tombol 
if ($_POST['Submit'] == "Submit") {
//Kirimkan Variabel
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$tgllahir = $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
$jenkel = $_POST['jenkel'];
$alamat = $_POST['alamat'];
$foto = $_POST['foto'];
$namafoto = $_FILES['foto']['name'];

//validasi data jika nama dan pesan kosong
if (empty($_POST['nip'])|| empty($_POST['nama'])) 
{
?>
<script language="JavaScript">
alert('Data Harap Dilengkapi');
document.location='index.php?page=input';
</script>
<?
}
//Jika Validasi Terpenuhi
else
{
//Memanggil File Koneksi Database
include "koneksi.php";

//Cek Photo
	if (strlen($namafoto)>0) {
		//upload Photo
		if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
			move_uploaded_file ($_FILES['foto']['tmp_name'], "images/".$namafoto);
			
		}
	}
//Masukan data ke Table Karyawan
$tambah="INSERT INTO karyawan VALUES('$nip','$nama','$namafoto','$tgllahir','$jenkel','$alamat')";
$kueri_tbh=mysql_db_query($db,$tambah,$conn_db);
if ($kueri_tbh)
{
//Jika Sukses
//echo "Data telah diinput";
//echo"<meta http-equiv='refresh' content='0;url=index.php?page=tampil'>";
?>
<script language="JavaScript">
alert('Data Berhasil diinput');
document.location='index.php?page=tampil';
</script>
<?

}
else
{
//Jika Gagal
echo "Data gagal diinput, Silakan Ulangi";
}
}
}
?>
