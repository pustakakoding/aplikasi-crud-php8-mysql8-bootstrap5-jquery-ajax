<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    // panggil file "config.php" untuk koneksi ke database
    require_once "config/config.php";

    // mengecek data POST dari ajax
    if (isset($_POST['id_siswa'])) {
        // ambil data hasil POST dari ajax
        $id_siswa = $mysqli->real_escape_string(trim($_POST['id_siswa']));

        // mengecek data foto profil
        // sql statement untuk menampilkan data "foto_profil" dari tabel "tbl_siswa" berdasarkan "id_siswa"
        $query = $mysqli->query("SELECT foto_profil FROM tbl_siswa WHERE id_siswa='$id_siswa'")
                                 or die('Ada kesalahan pada query tampil data : ' . $mysqli->error);
        // ambil data hasil query
        $data = $query->fetch_assoc();

        // hapus file foto dari folder images
        $hapus_file = unlink("images/$data[foto_profil]");

        // sql statement untuk delete data dari tabel "tbl_siswa" berdasarkan "id_siswa"
        $delete = $mysqli->query("DELETE FROM tbl_siswa WHERE id_siswa='$id_siswa'")
                                  or die('Ada kesalahan pada query delete : ' . $mysqli->error);
        // cek query
        // jika proses delete berhasil
        if ($delete) {
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
