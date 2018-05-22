<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Skeleton 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20130902

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="../default.css" rel="stylesheet" type="text/css" media="all" />
<link href="../fonts.css" rel="stylesheet" type="text/css" media="all" />

<head>  
    	<title></title>
    </head>
    <body>
    	 <div id="page" class="container">
  <div id="header">
    <div id="logo">
      <img src="images/pic02.jpg" width="50" height="50" />
      <h1><a href="#">Riftandi Aditia</a></h1>
      <span><a href="http://templated.co" rel="nofollow">12151927</a></span>
    </div>
    <div id="menu">
      <ul>
        <li class="current_page_item"><a href="../index.html" accesskey="1" title="">Home</a></li>
        <li><a href="./input.php" accesskey="2" title="">Input Data Karyawan</a></li>
        <li><a href="./lihat.php" accesskey="3" title="">Lihat Data Karyawan</a></li>
        <li><a href="../logout.php" accesskey="4" title="">Logout</a></li>
      </ul>
    </div>
  </div>
    	<div id="main">
    <div id="banner">
      <img src="images/pic01.jpg" alt="" class="image-full" />
    </div>
    <div id="welcome">
      <div class="title">
      <p><h1>Ubah Data Karyawan</h1> 
      </div>  
    	<?php
    	// Load file koneksi.php  
    	include "../pengaturan/koneksi.php";   
    	include "../pengaturan/fungsi.php"; 

    	// Ambil data NIS yang dikirim oleh index.php melalui URL
    	@$nik = $_GET['nik']; 

    	// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim 
    	$query = "SELECT* FROM karyawan WHERE nik='".$nik."'"; 
    	$sql = mysqli_query($koneksi, $query);  // Eksekusi/Jalankan query dari variabel $query  
    	$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql 
    	?> 
    	<form method="post" action="../proses/proses_ubah.php?nik=<?php echo $nik; ?>" enctype="multipart/form-data"> 
    		<table cellpadding="8">
    			<tr>
    				<td>Nama Lengkap</td>   
    				<td><input type="text" name="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?>"></td>
    			</tr> 
    			<tr>
    				<td>Jenis Kelamin</td>
    				<td><select name="jenis_kelamin">
    					<option value="P">Perempuan</option>
    					<option value="L">Laki-Laki</option>
    				</select></td>
    			</tr>
    			<tr> 
    				<td>Alamat</td>   
    				<td><textarea name="alamat"><?php echo $data['alamat']; ?></textarea></td> 
    			</tr> 

    			<tr>   
    				<td>Golongan Darah</td>
    				<td><select name="gol_darah">
    					<option value="A">A</option>
    					<option value="AB">AB</option>
    					<option value="B">B</option>
    					<option value="O">O</option value="<?php echo $data['gol_darah'];?>"></select></td>

    					</tr> 

    					<tr>
    						<td>Nomor HP</td>   
    						<td><input type="number" name="no_hp" value="<?php echo $data['no_hp']; ?>"></td>
    					</tr> 

    					<tr>
    						<td>Email</td>   
    						<td><input type="email" name="email" value="<?php echo $data['email']; ?>"></td>
    					</tr> 

    					<tr>    
    						<td>Status</td>
    						<td><select name="status">
    							<option value="belum_menikah">Belum Menikah</option>
    							<option value="menikah">Menikah</option value="<?php echo $data['status'];?>"></select></td>

    								<tr>    
    									<td>Agama</td>
    									<td><select name="agama">
    										<option value="islam">Islam</option>
    										<option value="kristen">Kristen</option>
    										<option value="hindu">Hindu</option>
    										<option value="budha">Budha</option value="<?php echo $data['agama'];?>"></select></td>
    										</tr>

    										<tr>
    											<td>Divisi</td>
    											<td><select name="divisi">
    												<option value="Logistik">Logistik</option>
    												<option value="Humas">Humas</option>
    												<option value="Akuntansi">Akuntansi</option>
    												<option value="Marketing">Marketing</option>
    											</select></td>
    										</tr>
    										<tr>  
    											<td>Foto</td> 
    											<td>  
    												<input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
    												<input type="file" name="foto">
    											</td>
    										</tr> 
    									</table>
    									<hr> 
    									<input type="submit" value="Ubah">  
    									<a href="lihat.php"><input type="button" value="Batal"></a> 
    								</form>
    							</body>
    							</html>
