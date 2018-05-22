<?php
session_start();
include "../pengaturan/koneksi.php";
include "../pengaturan/fungsi.php";
$nik=$_POST['nik'];
$nama_lengkap=$_POST['nama_lengkap'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$alamat=$_POST['alamat'];
$gol_darah=$_POST['gol_darah'];
$no_hp=$_POST['no_hp'];
$email=$_POST['email'];
$status=$_POST['status'];
$agama=$_POST['agama'];
$divisi=$_POST['divisi'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

$fotobaru = date('dmYHis').$foto;

$path = "../images/".$fotobaru;

if(move_uploaded_file($tmp, $path)){

$simpan= "INSERT INTO karyawan VALUES('".$nik."', '".$nama_lengkap."', '".$jenis_kelamin."', '".$alamat."', '".$gol_darah."', '".$no_hp."', '".$email."', '".$status."', '".$agama."', '".$divisi."', '".$fotobaru."')";
$sql = mysqli_query($koneksi, $simpan);
	if($sql){
	msgbox("Berhasil Terdaftar","../tampilan/lihat.php");

}else{
	msgbox("Gagal terdaftar","../tampilan/input.php");
}
}else{
	msgbox("Gagal Terdaftar","../tampilan/input.php");
}
?>