<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    // panggil file "config.php" untuk koneksi ke database
    require_once "config/config.php";

    // ambil data hasil POST dari ajax
    $id_siswa      = $mysqli->real_escape_string($_POST['id_siswa']);
    $tanggal       = $mysqli->real_escape_string(trim($_POST['tanggal_daftar']));
    $kelas         = $mysqli->real_escape_string($_POST['kelas']);
    $nama_lengkap  = $mysqli->real_escape_string(trim($_POST['nama_lengkap']));
    $jenis_kelamin = $mysqli->real_escape_string($_POST['jenis_kelamin']);
    $alamat        = $mysqli->real_escape_string(trim($_POST['alamat']));
    $email         = $mysqli->real_escape_string(trim($_POST['email']));
    $whatsapp      = $mysqli->real_escape_string(trim($_POST['whatsapp']));

    // ubah format tanggal menjadi Tahun-Bulan-Hari (Y-m-d) sebelum disimpan ke database
    $tanggal_daftar = date('Y-m-d', strtotime($tanggal));

    // ambil data file hasil POST dari ajax
    $nama_file          = $_FILES['foto']['name'];
    $tmp_file           = $_FILES['foto']['tmp_name'];
    // ambil ekstensi file
    $file               = explode(".", $nama_file);
    $extension          = array_pop($file);
    // enkripsi nama file
    $nama_file_enkripsi = sha1(md5(time() . $nama_file)) . '.' . $extension;
    // tentukan direktori penyimpanan file
    $path               = "images/" . $nama_file_enkripsi;

    // lakukan proses unggah file
    // jika file berhasil diunggah
    if (move_uploaded_file($tmp_file, $path)) {
        // sql statement untuk insert data ke tabel "tbl_siswa"
        $insert = $mysqli->query("INSERT INTO tbl_siswa(id_siswa, tanggal_daftar, kelas, nama_lengkap, jenis_kelamin, alamat, email, whatsapp, foto_profil) 
                                  VALUES('$id_siswa', '$tanggal_daftar', '$kelas', '$nama_lengkap', '$jenis_kelamin', '$alamat', '$email', '$whatsapp', '$nama_file_enkripsi')")
                                  or die('Ada kesalahan pada query insert : ' . $mysqli->error);
        // cek query
        // jika proses insert berhasil
        if ($insert) {
            // tampilkan pesan "sukses"
            echo "sukses";
        }
    }
}
// jika tidak ada ajax request
else {
    // alihkan ke halaman index
    header('location: index.php');
}
