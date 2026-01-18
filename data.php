<?php
// Deklarasi strict types
declare(strict_types=1);
// Panggil file "functions.php" untuk membuat format tanggal indonesia
require_once "helper/functions.php";

// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    // nama tabel
    $table = 'tbl_siswa';
    // primary key tabel
    $primaryKey = 'id_siswa';

    // membuat array untuk menampilkan isi tabel.
    // Parameter 'db' mewakili nama kolom dalam database.
    // parameter 'dt' mewakili pengenal kolom pada DataTable.
    $columns = [
        ['db' => 'foto_profil', 'dt' => 1],
        ['db' => 'id_siswa', 'dt' => 2],
        ['db' => 'nama_lengkap', 'dt' => 3],
        ['db' => 'jenis_kelamin', 'dt' => 4],
        [
            'db' => 'tanggal_daftar',
            'dt' => 5,
            'formatter' => fn($d) => tanggal_id($d)
        ],
        ['db' => 'kelas', 'dt' => 6],
        ['db' => 'id_siswa', 'dt' => 7]
    ];

    // memanggil file "database.php" untuk informasi koneksi ke server SQL
    require_once "config/database.php";
    // memanggil file "ssp.class.php" untuk menjalankan datatables server-side processing
    require 'config/ssp.class.php';

    echo json_encode(
        SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
    );
}
// jika tidak ada ajax request
else {
    // alihkan ke halaman index
    header('Location: index.php');
    exit;
}
