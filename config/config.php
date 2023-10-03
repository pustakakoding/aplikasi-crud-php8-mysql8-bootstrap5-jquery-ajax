<?php
// set default timezone
date_default_timezone_set("ASIA/JAKARTA");

// panggil file parameter koneksi database
require_once "database.php";

// koneksi database
$mysqli = new mysqli($sql_details['host'], $sql_details['user'], $sql_details['pass'], $sql_details['db']);

// cek koneksi
// jika koneksi gagal 
if ($mysqli->connect_error) {
    // tampilkan pesan gagal koneksi
    die('Koneksi Database Gagal : ' . $mysqli->connect_error);
}
