<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    // panggil file "config.php" untuk koneksi ke database
    require_once "config/config.php";

    // mengecek data GET dari ajax
    if (isset($_GET['id_siswa'])) {
        // ambil data GET dari ajax
        $id_siswa = $_GET['id_siswa'];

        // sql statement untuk menampilkan data dari tabel "tbl_siswa" berdasarkan "id_siswa"
        $query = $mysqli->query("SELECT * FROM tbl_siswa WHERE id_siswa='$id_siswa'")
                                or die('Ada kesalahan pada query tampil data : ' . $mysqli->error);
        // ambil data hasil query
        $data = $query->fetch_assoc();

        // tampilkan data
        echo json_encode($data);
    }
}
// jika tidak ada ajax request
else {
    // alihkan ke halaman index
    header('location: index.php');
}
