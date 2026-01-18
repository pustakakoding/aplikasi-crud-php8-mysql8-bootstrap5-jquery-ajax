<?php
// Deklarasi strict types
declare(strict_types=1);

// format nama hari indonesia
function nama_hari_id(string $tanggal): string
{
    // Mengubah string menjadi objek tanggal
    $date = new DateTime($tanggal);

    // 'w' menghasilkan angka 0 (Minggu) sampai 6 (Sabtu)
    $index_hari = (int) $date->format('w');

    $hari = [
        'Minggu',
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu'
    ];

    return $hari[$index_hari] ?? 'Hari tidak valid';
}

// format tanggal indonesia
function tanggal_id(?string $tanggal): string
{
    // Validasi jika tanggal kosong atau null
    if (empty($tanggal) || $tanggal === '0000-00-00') {
        return '-';
    }

    $bulan_indo = [
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    ];

    // Gunakan DateTime untuk memecah tanggal
    try {
        $date  = new DateTime($tanggal);
        $tgl   = $date->format('d');
        $bulan = (int)$date->format('m');
        $tahun = $date->format('Y');

        return $tgl . ' ' . $bulan_indo[$bulan] . ' ' . $tahun;
    } catch (Exception $e) {
        // Jika format tanggal salah/tidak terbaca
        return "Format Tanggal Salah";
    }
}

// format nama bulan indonesia
function nama_bulan_id(string $tanggal): string
{
    // Mengubah string menjadi objek tanggal
    $date = new DateTime($tanggal);

    // 'n' menghasilkan angka 1-12 tanpa nol di depan
    $bulan_angka = (int) $date->format('n');

    $bulan = [
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    ];

    return $bulan[$bulan_angka] ?? 'Bulan tidak valid';
}
