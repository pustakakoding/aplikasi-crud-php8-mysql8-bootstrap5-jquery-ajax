<?php
// Deklarasi strict types
declare(strict_types=1);

// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    // panggil file "config.php" untuk koneksi ke database
    require_once "config/config.php";

    /**
     * Generate ID Siswa otomatis dengan format ID-XXXXX
     */
    // sql statement untuk menampilkan 5 digit terakhir dari "id_siswa" pada tabel "tbl_siswa"
    $query = $mysqli->query("SELECT MAX(RIGHT(id_siswa, 5)) as nomor FROM tbl_siswa")
                            or die("Ada kesalahan pada query tampil data : {$mysqli->error}");
    $data = $query->fetch_assoc();

    // Jika nomor tidak null, tambahkan 1. Jika null (tabel kosong), mulai dari 1.
    $nomor_urut = ($data['nomor'] !== null) ? (int)$data['nomor'] + 1 : 1;

    // menambahkan karakter "ID-" diawal dan karakter "0" disebelah kiri nomor urut
    $id_siswa = "ID-" . str_pad((string)$nomor_urut, 5, "0", STR_PAD_LEFT);

    // tampilkan data
    echo $id_siswa;
}
// jika tidak ada ajax request
else {
    // alihkan ke halaman index
    header('Location: index.php');
    exit;
}
