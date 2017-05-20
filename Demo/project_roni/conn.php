<html>
<head>
</head>
<body>
<?php 
ini_set('display_errors',FALSE);
$host="localhost";
$user="bb";
$pass="bb";
$db="bb";


$koneksi=mysql_connect($host,$user,$pass);
mysql_select_db($db,$koneksi);
$tanggal=date("d/m/Y");

if ($koneksi)
{
	//echo "berhasil : )";
}else{
	?><script language="javascript">alert("Gagal Koneksi Database MySql !!")</script><?php 
}

?>

</body>
</html>
 
