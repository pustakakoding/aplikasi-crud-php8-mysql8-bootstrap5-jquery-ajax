<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    // panggil file "config.php" untuk koneksi ke database
    require_once "config/config.php";

    // membuat "id_siswa"
    // sql statement untuk menampilkan 5 digit terakhir dari "id_siswa" pada tabel "tbl_siswa"
    $query = $mysqli->query("SELECT RIGHT(id_siswa,5) as nomor FROM tbl_siswa ORDER BY id_siswa DESC LIMIT 1")
                            or die('Ada kesalahan pada query tampil data : ' . $mysqli->error);
    // ambil jumlah baris data hasil query
    $rows = $query->num_rows;

    // cek hasil query
    // jika "id_siswa" sudah ada
    if ($rows <> 0) {
        // ambil data hasil query
        $data = $query->fetch_assoc();
        // nomor urut "id_siswa" yang terakhir + 1
        $nomor_urut = $data['nomor'] + 1;
    }
    // jika "id_siswa" belum ada
    else {
        // nomor urut "id_siswa" = 1
        $nomor_urut = 1;
    }

    // menambahkan karakter "ID-" diawal dan karakter "0" disebelah kiri nomor urut
    $id_siswa = "ID-" . str_pad($nomor_urut, 5, "0", STR_PAD_LEFT);

    // tampilkan data
    echo $id_siswa;
}
// jika tidak ada ajax request
else {
    // alihkan ke halaman index
    header('location: index.php');
}
