<?php

$host     = 'localhost';
$database = 'datakaryawan';
$username = 'root';
$password = '';

$koneksi = mysqli_connect ($host, $username, $password) or die ("koneksi server gagal");

if ($koneksi){
	mysqli_select_db($koneksi, $database) or die ("koneksi database gagal");
}

?>