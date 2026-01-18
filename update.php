<?php
// Deklarasi strict types
declare(strict_types=1);

// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    // panggil file "config.php" untuk koneksi ke database
    require_once "config/config.php";

    // mengecek data POST dari ajax
    if (isset($_POST['id_siswa'])) {
        // ambil data hasil POST dari ajax
        $id_siswa      = $mysqli->real_escape_string(trim($_POST['id_siswa']));
        $tanggal       = $mysqli->real_escape_string(trim($_POST['tanggal_daftar']));
        $kelas         = $mysqli->real_escape_string(trim($_POST['kelas']));
        $nama_lengkap  = $mysqli->real_escape_string(trim($_POST['nama_lengkap']));
        $jenis_kelamin = $mysqli->real_escape_string($_POST['jenis_kelamin']);
        $alamat        = $mysqli->real_escape_string(trim($_POST['alamat']));
        $email         = $mysqli->real_escape_string(filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL));
        $whatsapp      = $mysqli->real_escape_string(preg_replace('/[^0-9]/', '', trim($_POST['whatsapp'])));

        // ubah format tanggal menjadi Tahun-Bulan-Hari (Y-m-d) sebelum disimpan ke database
        $tanggal_daftar = date('Y-m-d', strtotime($tanggal));

        // mengecek data foto dari form ubah data
        // jika data foto tidak ada (foto tidak diubah)
        if (empty($_FILES['foto']['tmp_name'])) {
            // sql statement untuk update data di tabel "tbl_siswa" berdasarkan "id_siswa"
            $update = $mysqli->query("UPDATE tbl_siswa
                                     SET tanggal_daftar='$tanggal_daftar', kelas='$kelas', nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', alamat='$alamat', email='$email', whatsapp='$whatsapp'
                                     WHERE id_siswa='$id_siswa'")
                                     or die("Ada kesalahan pada query update : {$mysqli->error}");
            // cek query
            // jika proses update berhasil
            if ($update) {
                // tampilkan pesan "sukses"
                echo "sukses";
            }
        }
        // jika data foto ada (foto diubah)
        else {
            // sql statement untuk menampilkan data "foto_profil" dari tabel "tbl_siswa" berdasarkan "id_siswa"
            $query = $mysqli->query("SELECT foto_profil FROM tbl_siswa WHERE id_siswa='$id_siswa'")
                                    or die("Ada kesalahan pada query tampil data : {$mysqli->error}");
            // ambil data hasil query
            $data = $query->fetch_assoc();
            $foto_lama = $data['foto_profil'];

            // ambil data file hasil POST dari ajax
            $nama_file = $_FILES['foto']['name'];
            $tmp_file  = $_FILES['foto']['tmp_name'];
            $extension = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
            // enkripsi nama file
            $nama_file_enkripsi = bin2hex(random_bytes(16)) . '_' . time() . '.' . $extension;
            // tentukan direktori penyimpanan file
            $path = "images/{$nama_file_enkripsi}";

            // lakukan proses unggah file
            // jika file berhasil diunggah
            if (move_uploaded_file($tmp_file, $path)) {
                // sql statement untuk update data di tabel "tbl_siswa" berdasarkan "id_siswa"
                $update = $mysqli->query("UPDATE tbl_siswa
                                         SET tanggal_daftar='$tanggal_daftar', kelas='$kelas', nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', alamat='$alamat', email='$email', whatsapp='$whatsapp', foto_profil='$nama_file_enkripsi'
                                         WHERE id_siswa='$id_siswa'")
                                         or die("Ada kesalahan pada query update : {$mysqli->error}");

                if (file_exists("images/$foto_lama")) {
                    unlink("images/$foto_lama");
                }

                // cek query
                // jika proses update berhasil
                if ($update) {
                    // tampilkan pesan "sukses"
                    echo "sukses";
                }
            }
        }
    }
}
// jika tidak ada ajax request
else {
    // alihkan ke halaman index
    header('Location: index.php');
    exit;
}
