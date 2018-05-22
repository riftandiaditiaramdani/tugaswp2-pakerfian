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
      <p><h1>Data Karyawan</h1> 
      </div> 
  <table border="1" width="100%">
   <tr>
     <th>Foto</th>
     <th>NIK</th>
     <th>Nama Lengkap</th>
     <th>Jenis Kelamin</th>
     <th>Alamat</th>
     <th>Email</th>
     <th>Status</th>
     <th>Agama</th>
     <th>Divisi</th>
     <th colspan="2">Aksi</th>
   </tr>
   <?php 
 // Load file koneksi.php  
   include "../pengaturan/koneksi.php";  
   include "../pengaturan/fungsi.php";

$query = "SELECT * FROM karyawan"; // Query untuk menampilkan semua data siswa  
$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query    
while($data = mysqli_fetch_array($sql))
{ // Ambil semua data dari hasil eksekusi $sql   
  echo "<tr>";
  echo "<td><img src='../images/".$data['foto']." 'width='100' height='100'></td>";  
  echo "<td>".$data['nik']."</td>";   
  echo "<td>".$data['nama_lengkap']."</td>";  
  echo "<td>".$data['jenis_kelamin']."</td>";  
  echo "<td>".$data['alamat']."</td>";  
  echo "<td>".$data['email']."</td>";  
  echo "<td>".$data['status']."</td>";  
  echo "<td>".$data['agama']."</td>";  
  echo "<td>".$data['divisi']."</td>";  
  echo "<td><a href='ubah.php?nik=".$data['nik']."'>Ubah</a></td>";    
  echo "<td><a href='../proses/proses_hapus.php?nik=".$data['nik']."'>Hapus</a></td>";
  echo "</tr>"; 
}  
  ?> 
</table> </p>
    </div>
    <div id="copyright">
      <span>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a></span>
      <span>Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</span>
    </div>
  </div>
</div>
</body>
</html>