<?php
// Deklarasi strict types
declare(strict_types=1);

// Panggil file "database.php" untuk koneksi ke database
require_once "config/database.php";
?>

<!-- Aplikasi CRUD dengan PHP 8, MySQL 8, Bootstrap 5, dan jQuery AJAX
***********************************************************************
* Developer   : Indra Styawantoro
* Company     : Pustaka Koding
* Release     : September 2023
* Update      : Januari 2026
* Website     : pustakakoding.com
* E-mail      : pustaka.koding@gmail.com
* WhatsApp    : +62-813-7778-3334
-->

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplikasi CRUD dengan PHP 8, MySQL 8, Bootstrap 5, dan jQuery AJAX">
    <meta name="author" content="Indra Styawantoro">

    <!-- Title -->
    <title>Aplikasi CRUD dengan PHP 8, MySQL 8, Bootstrap 5, dan jQuery AJAX</title>

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.6/css/dataTables.bootstrap5.min.css" />
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.css" integrity="sha256-GzSkJVLJbxDk36qko2cnawOGiqz/Y8GsQv/jMTUrx1Q=" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- jQuery Core -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column h-100">
    <!-- Preloader -->
    <div style="display: none;" class="preloader">
        <div class="loading">
            <img src="assets/img/spinner-loading.gif" alt="Loading" width="200">
        </div>
    </div>

    <!-- Header -->
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top bg-primary shadow">
            <div class="container-fluid px-lg-5">
                <span class="navbar-brand d-flex align-items-center text-white">
                    <i class="fa-solid fa-laptop-code fs-4 me-3"></i>
                    <span>
                        Aplikasi CRUD 
                        <span class="d-none d-md-inline">dengan PHP 8, MySQL 8, Bootstrap 5, dan jQuery AJAX</span>
                    </span>
                </span>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-shrink-0">
        <div class="container-fluid pt-5 px-lg-5">

            <!-- panggil file "view.php" untuk menampilkan halaman konten -->
			<?php include "view.php"; ?>

        </div>
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto bg-white shadow py-4">
        <div class="container-fluid px-lg-5">
            <!-- copyright -->
            <div class="copyright text-center mb-2 mb-md-0">
                &copy; 2026 - <a href="https://pustakakoding.com/" target="_blank" class="text-decoration-none fw-semibold">Pustaka Koding</a>. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.3.6/js/dataTables.min.js"></script>
    <script src="assets/js/plugins/datatables/dataTables.bootstrap5.min.js"></script>
    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js" integrity="sha256-Huqxy3eUcaCwqqk92RwusapTfWlvAasF6p2rxV6FJaE=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/l10n/id.js" integrity="sha256-cvHCpHmt9EqKfsBeDHOujIlR5wZ8Wy3s90da1L3sGkc=" crossorigin="anonymous"></script>
    <!-- Bootstrap Notify -->
    <script type="text/javascript" src="assets/js/plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <!-- Bootbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.4/bootbox.min.js" integrity="sha512-l9O8NTlhknUJDJQlUVeavXJrtGEEYma4O29lRjEV7mO6DxXVvX9SWEIfnAlpnf+2T8LHTfsVuzttCDEMpIyaew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- Custom Scripts -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/utils.js"></script>
</body>

</html>