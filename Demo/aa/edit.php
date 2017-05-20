<?php
include "koneksi.php";

if (isset($_GET['nip'])) {
	$nip = $_GET['nip'];
} else {
	die ("Error. No Nip Selected! ");	
}
//Tampilkan datanya
$query = "SELECT nip,nama,namafoto,tgllahir,jenkel,alamat FROM karyawan WHERE nip='$nip'";
$sql = mysql_query ($query);
$hasil = mysql_fetch_array ($sql);
$nip = $hasil['nip'];
$nama = $hasil['nama'];
$jenkel = $hasil['jenkel'];
$namafoto = stripslashes ($hasil['namafoto']);
$foto = $hasil['namafoto'];
//Memecah tanggal Lahir
list($thn,$bln,$tgl) = explode ("-",$hasil['tgllahir']);
$alamat = $hasil['alamat'];
//proses edit 
if (isset($_POST['Edit'])) {
	$nip = $_POST['hnip'];
	$nama = $_POST['nama'];
	$tgllahir = $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
	$jenkel = $_POST['jenkel'];
	$alamat = $_POST['alamat'];
	$namafoto = $_FILES['foto']['name'];
	//Cek Photo
	if (strlen($namafoto)>0) {
		//upload Photo
		if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
			move_uploaded_file ($_FILES['foto']['tmp_name'], "images/".$namafoto);
			mysql_query ("UPDATE karyawan SET namafoto='$namafoto' WHERE nip='$nip'");
		}
	}
	//update data
	$query = "UPDATE karyawan SET nama='$nama',tgllahir='$tgllahir',jenkel='$jenkel',
			  alamat='$alamat' WHERE nip='$nip'";
	$sql = mysql_query ($query);
	if ($sql) {
		echo "<h2><font color=#8BB2D9><center>Data Pegawai telah berhasil diedit</center></font></h2>";	
	} else {
		echo "<h2><font color=red><center>Data Pegawai gagal diedit</center></font></h2>";	
	}
}
?>
<div id="content">
	<h2 align="center">Edit Data Pegawai</h2>
	<FORM ACTION="" METHOD="POST" NAME="input" enctype="multipart/form-data">
		<table cellpadding="0" cellspacing="0" border="0" width="700">
			
			<tr>
			  <td width="18">&nbsp;</td>
				<td width="132" height="24">NIP</td>
				<td width="550">:<b><?=$nip?>
				  <input type="hidden" name="hnip" value="<?=$nip?>">
				</b></td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
				<td height="29">Nama</td>
				<td><input type="text" name="nama" size="30" maxlength="30" value="<?=$nama?>"></td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td height="35">Foto</td>
			  <td><? if (empty($foto)) 
		        echo "<strong><img src='images/nopic.gif' width='50' height='50'> <br> No Image </strong>";
		        else
				echo"<img class='shadow' align=left src='images/$foto' width=100 heigth=50/ title='Foto $nama_lengkap'>"
				?>
                
                <br /><br /><br /><br /><br /><br /><br /><?=$namafoto?>
              <input type="file" name="foto"/></td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
				<td height="35">Tanggal Lahir</td>
				<td><select name="tgl">
				<?
					for ($i=1; $i<=31; $i++) {
						$tg = ($i<10) ? "0$i" : $i;
						$sele = ($tg==$tgl)? "selected" : "";
						echo "<option value='$tg' $sele>$tg</option>";	
					}
				?>
				</select> - 
				<select name="bln">
				<?
					for ($i=1; $i<=12; $i++) {
						$bl = ($i<10) ? "0$i" : $i;
						$sele = ($bl==$bln)?"selected" : "";
						echo "<option value='$bl' $sele>$bl</option>";	
					}
				?>
				</select> - 
				<select name="thn">
				<?
					for ($i=1970; $i<=2000; $i++) {
						$sele = ($i==$thn)?"selected" : "";
						echo "<option value='$i' $sele>$i</option>";	
					}
				?>
				</select>				</td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
				<td height="28">Jenis Kelamin</td>
				<td><input type="radio" name="jenkel" value="Pria" <? echo ($jenkel==Pria)?"checked":""; ?>> 
				Pria &nbsp;&nbsp;
				<input type="radio" name="jenkel" value="Wanita" <? echo ($jenkel==Wanita)?"checked":""; ?>> 
			  Wanita</td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
				<td>Alamat</td>
				<td><textarea name="alamat" cols="40" rows="5"><?=$alamat?></textarea></td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;&nbsp;
				<input type="submit" name="Edit" value="Edit Data">&nbsp;
			  <input type="reset" name="reset" value="Reset"></td>
			</tr>
		</table>
	</FORM>
</div>