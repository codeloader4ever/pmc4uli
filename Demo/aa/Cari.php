<? /**
 * @version		1.0
 * @package		Karyawan
 * @copyright	Copyright (C) 2007 - 2009 Chaerul Ramadhan. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Aplikasi untuk Latihan Sederhana mahasiswa dcc lampung
 * Menggunkan PHP + SQL + CSS + JavaScript 
 * See COPYRIGHT.php for copyright notices and details.
 * More Tutorial you can find at www.arul-id.blogspot.com
 */ ?>

<strong>Looking SomeOne  :</strong><br>
<form action="<?$_SERVER['PHP_SELF']?>" method="post" name="pencarian" id="pencarian">
  <input type="text" name="search" id="search">
  <input type="submit" name="submit" id="submit" value="CARI">
</form>

<?php
include"koneksi.php";

// menampilkan data
if ((isset($_POST['submit'])) AND ($_POST['search'] <> "")) {
  $search = $_POST['search'];
  $sql = mysql_query("SELECT * FROM karyawan WHERE nama LIKE '$search%' ") or die(mysql_error());
  //menampilkan jumlah hasil pencarian
  $jumlah = mysql_num_rows($sql); 
  if ($jumlah > 0) {
    echo '<p>Ada '.$jumlah.' data yang sesuai.</p>';
   
        while (	$hasil = mysql_fetch_array ($sql)) {
			$nip = stripslashes ($hasil['nip']);
			$nama = stripslashes ($hasil['nama']);
			$namafoto = stripslashes ($hasil['namafoto']);
			$foto = $hasil['namafoto'];
			$tgllhr = stripslashes ($hasil['tgllahir']);
			$jenkel = stripslashes ($hasil['jenkel']);
			$alamat = stripslashes ($hasil['alamat']);
			$no++;
		//tampilkan data siswa dan photo
	?>
<table width="102%" border="0" align="center" cellpadding="0" cellspacing="0"  id="tabel">
  <tr bgcolor="#8BB2D9">
    <th width="4%" height="39">No
        </td>
    </th>
    <th width="9%">NIP
        </td>
    </th>
    <th width="13%"> Nama
        </td>
    </th>
    <th width="13%">Foto </th>
    <th width="11%">Tgl Lahir
        </td>
    </th>
    <th width="15%">Jenis Kelamin
        </td>
    </th>
    <th width="18%">Alamat
        </td>
    </th>
    <th width="17%">Action
        </td>
    </th>
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
				echo"<img class='shadow' src='images/$foto' width=75 heigth=25/ title='Foto $nama'>"
				?>
      &nbsp;</td>
    <td><?=$tgllhr?>
        <div align="center"></div></td>
    <td><?=$jenkel?>
        <div align="center"></div></td>
    <td><?=$alamat?>
        <div align="center"></div></td>
    <td bgcolor="#CCCCCC"><div align="center"><a href="index.php?page=edit&amp;nip=<?=$nip?>">Edit</a> | <a href="index.php?page=delete&amp;nip=<?=$nip?>">Delete</a></div></td>
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

</table>
<?
      }
  }
  else {
   // menampilkan pesan zero data
    echo 'Maaf, hasil pencarian tidak ditemukan.';
  }
} 
else { echo 'Masukkan nama Seseorang';}
?>
