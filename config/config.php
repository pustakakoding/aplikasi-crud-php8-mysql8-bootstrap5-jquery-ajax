<?php
// Deklarasi strict types
declare(strict_types=1);
// Panggil file konfigurasi database
require_once "database.php";

// Error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Koneksi database
    $mysqli = new mysqli(
        $sql_details['host'],
        $sql_details['user'],
        $sql_details['pass'],
        $sql_details['db']
    );

    // Set charset
    $mysqli->set_charset('utf8mb4');

    // Set timezone (opsional)
    $mysqli->query("SET time_zone = '+07:00'");

} catch (mysqli_sql_exception $e) {
    // Logging error
    error_log($e->getMessage());

    // Hentikan eksekusi dan tampilkan pesan
    die("Koneksi database gagal.");
}
