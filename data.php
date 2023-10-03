<?php
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
    $columns = array(
        array( 'db' => 'foto_profil', 'dt' => 1 ),
        array( 'db' => 'id_siswa', 'dt' => 2 ),
        array( 'db' => 'nama_lengkap', 'dt' => 3 ),
        array( 'db' => 'jenis_kelamin', 'dt' => 4 ),
        array(
            'db' => 'tanggal_daftar',
            'dt' => 5,
            'formatter' => function ($d, $row) {
                return date('d-m-Y', strtotime($d));
            }
        ),
        array( 'db' => 'kelas', 'dt' => 6 ),
        array( 'db' => 'id_siswa', 'dt' => 7 )
    );

    // memanggil file "database.php" untuk informasi koneksi ke server SQL
    require_once "config/database.php";
    // memanggil file "ssp.class.php" untuk menjalankan datatables server-side processing
    require 'config/ssp.class.php';

    echo json_encode(
        SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
    );
}
// jika tidak ada ajax request
else {
    // alihkan ke halaman index
    header('location: index.php');
}
