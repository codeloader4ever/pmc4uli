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

<?php
//berisi konfigurasi server, pastikan diisi dengan benar
$host="localhost"; //Server yang digunakan
$user_db="aa"; //User yang dipakai
$pass_db="aa";//Password yang digunakan
$db="aa";//Database yang Dipakai
$conn_db=mysql_connect($host,$user_db,$pass_db);
mysql_select_db($db);
?> 
