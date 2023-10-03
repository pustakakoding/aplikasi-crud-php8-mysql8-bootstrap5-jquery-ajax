<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    // panggil file "config.php" untuk koneksi ke database
    require_once "config/config.php";

    // mengecek data POST dari ajax
    if (isset($_POST['id_siswa'])) {
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

        // mengecek data foto dari form ubah data
        // jika data foto tidak ada (foto tidak diubah)
        if (empty($_FILES['foto'])) {
            // sql statement untuk update data di tabel "tbl_siswa" berdasarkan "id_siswa"
            $update = $mysqli->query("UPDATE tbl_siswa
                                      SET tanggal_daftar='$tanggal_daftar', kelas='$kelas', nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', alamat='$alamat', email='$email', whatsapp='$whatsapp'
                                      WHERE id_siswa='$id_siswa'")
                                      or die('Ada kesalahan pada query update : ' . $mysqli->error);
            // cek query
            // jika proses update berhasil
            if ($update) {
                // tampilkan pesan "sukses"
                echo "sukses";
            }
        }
        // jika data foto ada (foto diubah)
        else {
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
                // sql statement untuk update data di tabel "tbl_siswa" berdasarkan "id_siswa"
                $update = $mysqli->query("UPDATE tbl_siswa
                                          SET tanggal_daftar='$tanggal_daftar', kelas='$kelas', nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', alamat='$alamat', email='$email', whatsapp='$whatsapp', foto_profil='$nama_file_enkripsi'
                                          WHERE id_siswa='$id_siswa'")
                                          or die('Ada kesalahan pada query update : ' . $mysqli->error);
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
    header('location: index.php');
}
