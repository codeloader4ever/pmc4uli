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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<SCRIPT LANGUAGE="JavaScript"> 
<!-- Membuat Teks Berjalan di StatusBar
var scrollCounter = 0; var scrollText = "INFO :          Untuk Tutorial Lainya dapat Akses www.arul-id.blogspot.com | Learning by doing | 2007 - 2010 ";
var scrollDelay = 70; var i = 0; 
while (i ++ < 300) scrollText = " " + scrollText; function Scroller() { window.status = scrollText.substring(scrollCounter++, scrollText.length); 
if (scrollCounter == scrollText.length) scrollCounter = 0;
setTimeout("Scroller()", scrollDelay); }
Scroller(); 
// End of scroller script --> 
</SCRIPT>
<title>DATE Now <? echo": ".date("d - m- Y");?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	background-color: #CCCCCC;
}
-->
</style></head>

<body>
<br>
<br>
<br>
<table width="959" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="10" bgcolor="#8BB2D9">&nbsp;</td>
    <td width="164" height="69" bgcolor="#8BB2D9"><div align="center"><img src="image/1240889050_file-manager.png" width="128" height="128" title="www.arul-id.co.cc"></div></td>
    <td width="9" bgcolor="#8BB2D9">&nbsp;</td>
    <td width="619" bgcolor="#8BB2D9"><div align="center"><span class="header">APLIKASI SIMPLE PT. Persib <br>
      </span>JL. PANGERAN BIRU Bandung <span class="header"><br>
      </span></div></td>
    <td width="17" bgcolor="#8BB2D9"><div align="center"><h1 class="header">&nbsp;</h1>
    </div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;</td>
    <td height="27"><div align="center"><strong><? echo" Tanggal : ".date("d - m- Y");?></strong></div></td>
    <td>&nbsp;</td>
    <td align="center"><strong><img src="image/house.png" width="16" height="16" > <a href="index.php" title="Balik ke Rumah uy">HOME</a></strong> <strong><img src="image/add.png" width="16" height="16"> <a href="index.php?page=input" title="Isi data neh">TAMBAH DATA</a></strong> <strong><img src="image/wrench_orange.png" width="16" height="16"> <a href="index.php?page=tampil" title="Mau Edit | Hapus" >LIHAT DATA</a> <img src="image/user_comment.png" width="16" height="16"> <a href="index.php?page=about" title="Empunya Neh"> ABOUT </a><a href="index.php?page=cari" title="Empunya Neh"></a></strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;</td>
    <td height="26" align="center" bgcolor="#8BB2D9"><div align="center">SELAMAT DATANG </div></td>
    <td rowspan="4">&nbsp;</td>
    <td rowspan="4" valign="top"><table width="769" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="594" height="89">
<?php //DISINI UNTUK SET HALAMAN PHP
$page = (isset($_GET['page']))? $_GET['page'] : "main";
switch ($page) {
	case 'input': include "input.php"; break;
	case 'edit'	: include "edit.php"; break;
	case 'delete' : include "delete.php"; break;
	case 'tampil' : include "tampil.php"; break;
	case 'about' : include "about.php"; break;
	case 'cari' : include "cari.php"; break;
	case 'main' :
	default : include 'utama.php';	
}
?></td>
      </tr>
    </table>      </td>
    <td rowspan="4">&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="19">&nbsp;</td>
    <td rowspan="3" align="center" valign="top" bgcolor="#8BB2D9"><strong><a href="index.php?page=cari" title="Empunya Neh"><br>
          <img src="image/search_48.png" width="48" height="48"><br>
    PENCARIAN</a></strong></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="24">&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="12">&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;</td>
    <td height="22">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#8BB2D9">
    <td height="39" colspan="5" bgcolor="#8BB2D9"><div align="center"><a href="http://www.contoh-ta.blogspot.com" target="_blank">www.contoh-ta.blogspot.com</a><br>
        Powered by PHP + SQL + CSS + JavaScript </div>      
      <div align="center"></div></td>
  </tr>
</table>
<div align="center">
</div>
</body>
</html>
