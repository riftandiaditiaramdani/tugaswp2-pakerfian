    <?php
    // Load file koneksi.php
    include "../pengaturan/koneksi.php";
    include "../pengaturan/fungsi.php";

    // Ambil data NIS yang dikirim oleh index.php melalui URL
    $nik = $_GET['nik'];

    // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
    $query = "SELECT * FROM karyawan WHERE nik='".$nik."'";
    $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

    // Cek apakah file fotonya ada di folder images
    if(is_file("../images/".$data['foto'])) // Jika foto ada 
     unlink("../images/".$data['foto']); // Hapus foto yang telah diupload dari folder images

     // Query untuk menghapus data siswa berdasarkan NIS yang dikirim
     $query2 = "DELETE FROM karyawan WHERE nik='".$nik."'";
     $sql2 = mysqli_query($koneksi, $query2); // Eksekusi/Jalankan query dari variabel $query

     if($sql2){ // Cek jika proses simpan ke database sukses atau tidak 
	 // Jika Sukses, Lakukan :  
	   msgbox("Berhasil Dihapus","../tampilan/lihat.php");// Redirect ke halaman index.php
	}else{ 
	  // Jika Gagal, Lakukan : 
		echo "Data gagal dihapus <a href='../tampilan/lihat'>Kembali</a>";
	}
	?>