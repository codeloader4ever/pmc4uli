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

<div id="content">
	<h2 align="center">Data Pegawai</h2>
	<table width="102%" border="0" align="center" cellpadding="0" cellspacing="0"  id="tabel">
	<tr bgcolor="#8BB2D9">
		<th width="4%" height="39">No</td>
		<th width="9%">NIP</td>
		<th width="13%"> Nama</td>
		<th width="13%">Foto        
		<th width="11%">Tgl Lahir</td>
		<th width="15%">Jenis Kelamin</td>
		<th width="18%">Alamat</td>
	  <th width="17%">Action</td>      </tr>
	<? ini_set('display_errors', 1); ini_set('error_reporting', E_ERROR);
	include "koneksi.php";
	$sql="SELECT * FROM karyawan ORDER BY nip";
	$tampil = mysql_query($sql);
    while (	$hasil = mysql_fetch_array ($tampil)) {
			$nip = stripslashes ($hasil['nip']);
			$nama = stripslashes ($hasil['nama']);
			$namafoto = stripslashes ($hasil['namafoto']);
			$foto = $hasil['namafoto'];
			$tgllhr = stripslashes ($hasil['tgllahir']);
			$jenkel = stripslashes ($hasil['jenkel']);
			$alamat = stripslashes ($hasil['alamat']);
      {
		$no++;
	?>
		<tr align="center">
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td bgcolor="#CCCCCC">&nbsp;</td>
	  </tr>
		<tr align="center">
			<td><?=$no?>
		    <div align="center"></div></td>
			<td><?=$nip?>
		    <div align="center"></div></td>
			<td><?=$nama?>
		    <div align="center"></div></td>
			<td><? 
	
			if (empty($foto)) 
		        echo "<strong><img src='images/nopic.gif' width='50' height='50'> <br> No Image </strong>";
		        else
				echo"<img class='shadow' src='images/$foto' width=75 heigth=25/ title='Foto $nama' >"
				?>&nbsp;</td>
			<td><?=$tgllhr?>
		    <div align="center"></div></td>
			<td><?=$jenkel?>
		    <div align="center"></div></td>
			<td><?=$alamat?>
		    <div align="center"></div></td>
		  <td bgcolor="#CCCCCC"><div align="center"><a href="index.php?page=edit&nip=<?=$nip?>">Edit</a> | <a href="index.php?page=delete&nip=<?=$nip?>" OnClick="return confirm('Yakin Data <?=$nama?> akan dihapus');">Delete</a></div></td>
	    </tr>
		<tr align="center">
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td> 
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td bgcolor="#CCCCCC">&nbsp;</td>
	  </tr>
	<?  
	}}
	?>
  </table>
</div>
