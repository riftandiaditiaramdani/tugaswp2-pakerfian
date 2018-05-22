 <?php
    // Load file koneksi.php
    include "../pengaturan/koneksi.php";
    include "../pengaturan/fungsi.php";

    // Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
    $nik = $_GET['nik'];

    // Ambil Data yang Dikirim dari Form
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $gol_darah = $_POST['gol_darah'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $agama = $_POST['agama'];
    $divisi = $_POST['divisi'];

    // Cek apakah user ingin mengubah fotonya atau tidak
    if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan : 
		 // Ambil data foto yang dipilih dari form 
    	$foto = $_FILES['foto']['name'];
    	$tmp = $_FILES['foto']['tmp_name'];  

	 // Rename nama fotonya dengan menambahkan tanggal dan jam upload
    	$fotobaru = date('dmYHis').$foto;  

	  // Set path folder tempat menyimpan fotonya 
    	$path = "../images/".$fotobaru;  

	 // Proses upload 
	 if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak   
	 // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
	 	$query = "SELECT* FROM karyawan WHERE nik='".$nik."'";  	
    $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query  
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql    

    // Cek apakah file foto sebelumnya ada di folder images   
    if(is_file("../images/".$data['foto'])) // Jika foto ada  
    unlink("../images/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder images        

    // Proses ubah data ke Database   
    $query = "UPDATE karyawan SET nama_lengkap='".$nama_lengkap."', jenis_kelamin='".$jenis_kelamin."', alamat='".$alamat."', gol_darah='".$gol_darah."', no_hp='".$no_hp."', email='".$email."', status='".$status."', agama='".$agama."', divisi='".$divisi."', foto='".$fotobaru."' WHERE nik='".$nik."'";    
    $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query   

    if($sql){ // Cek jika proses simpan ke database sukses atau tidak 
         // Jika Sukses, Lakukan :     
      msgbox("Berhasil Diubah","../tampilan/lihat.php"); // Redirect ke halaman index.php 
 }else{ 
     // Jika Gagal, Lakukan :     
 	echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";     
 	echo "<br><a href='../tampilan/lihat.php'>Kembali Ke Form</a>"; 
 }  
}else{    
     // Jika gambar gagal diupload, Lakukan :   
	msgbox("Maaf Gambar Gagal Diupload","../tampilan/lihat.php");
}
      }else{   // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan : 
     // Proses ubah data ke Database 
      	$query =mysqli_query ($koneksi, "UPDATE karyawan SET nama_lengkap='".$nama_lengkap."', jenis_kelamin='".$jenis_kelamin."', alamat='".$alamat."', gol_darah='".$gol_darah."', no_hp='".$no_hp."', email='".$email."', status='".$status."', agama='".$agama."', divisi='".$divisi."' WHERE nik='".$nik."'"); 
        // Eksekusi/ Jalankan query dari variabel $query  

      if($query){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :   
      msgbox("Berhasil Diubah","../tampilan/lihat.php"); // Redirect ke halaman index.php  
  }else{
        // Jika Gagal, Lakukan :   
  	echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";   
  	echo "<br><a href='../tampilan/lihat.php'>Kembali Ke Daftar Karyawan</a></br>";  
  }
}
?>