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

<FORM ACTION="simpan.php" METHOD="POST" NAME="input" enctype="multipart/form-data">
<table width="774" border="0" align="center" cellpadding="0" cellspacing="0">
			
			<tr>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
			  <td width="589">&nbsp;</td>
	  </tr>
			<tr>
			  <td width="20" height="29">&nbsp;</td>
				<td width="165">NIP</td>
				<td><input type="text" name="nip" size="15" maxlength="10"></td>
			</tr>
			<tr>
			  <td height="30">&nbsp;</td>
				<td>Nama</td>
				<td><input type="text" name="nama" size="30" maxlength="30"></td>
			</tr>
			<tr>
			  <td height="32">&nbsp;</td>
			  <td>Foto</td>
			  <td><input type="file" name="foto"/>			    &nbsp;</td>
    </tr>
			<tr>
			  <td height="32">&nbsp;</td>
				<td>Tanggal Lahir</td>
				<td><select name="tgl">
				<? //Menampilkan Tanggal dari 1 - 31
					for ($i=1; $i<=31; $i++) {
						$tg = ($i<10) ? "0$i" : $i;
						echo "<option value='$tg'>$tg</option>";	
					}
				?>
				</select> - 
				<select name="bln">
				<? //Menampilkan Bulan 1 - 12
					for ($i=1; $i<=12; $i++) {
						$bl = ($i<10) ? "0$i" : $i;
						echo "<option value='$bl'>$bl</option>";	
					}
				?>
				</select> - 
				<select name="thn">
				<? //Menampilkan Tahun 1970 - 2000
					for ($i=1970; $i<=2000; $i++) {
						echo "<option value='$i'>$i</option>";	
					}
				?>
				</select>				</td>
			</tr>
			<tr>
			  <td height="28">&nbsp;</td>
				<td>Jenis Kelamin</td>
				<td><input type="radio" name="jenkel" value="Pria"> Pria &nbsp;&nbsp;
				<input type="radio" name="jenkel" value="Wanita"> Wanita</td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
				<td>Alamat</td>
				<td><textarea name="alamat" cols="40" rows="5"></textarea></td>
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
				  <input type="submit" name="Submit" value="Submit">				  &nbsp;
				<input type="reset" name="reset" value="Reset"></td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
    </tr>
		</table>
	</FORM>
