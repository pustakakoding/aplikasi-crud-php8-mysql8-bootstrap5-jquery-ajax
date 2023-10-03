<!-- Aplikasi CRUD dengan PHP 8, MySQL 8, Bootstrap 5, dan jQuery AJAX
***********************************************************************
* Developer   : Indra Styawantoro
* Company     : Pustaka Koding
* Release     : September 2023
* Update      : -
* Website     : pustakakoding.com
* E-mail      : pustaka.koding@gmail.com
* WhatsApp    : +62-813-7778-3334
-->

<?php
// panggil file "database.php" untuk koneksi ke database
require_once "config/database.php";
?>

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css" integrity="sha512-MQXduO8IQnJVq1qmySpN87QQkiR1bZHtorbJBD0tzy7/0U9+YIC93QWHeGTEoojMVHWWNkoCp8V6OzVSYrX0oQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                <span class="navbar-brand text-white">
                    <i class="fa-solid fa-laptop-code me-2"></i>
                    Aplikasi CRUD <span class="d-none d-md-inline">dengan PHP 8, MySQL 8, Bootstrap 5, dan jQuery AJAX</span>
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
                &copy; 2023 - <a href="https://pustakakoding.com/" target="_blank" class="text-brand text-decoration-none">Pustaka Koding</a>. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/plugins/datatables/dataTables.bootstrap5.min.js"></script>
    <!-- Flatpickr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js" integrity="sha512-K/oyQtMXpxI4+K0W7H25UopjM8pzq0yrVdFdG21Fh5dBe91I40pDd9A4lzNlHPHBIP2cwZuoxaUSX0GJSObvGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/l10n/id.min.js" integrity="sha512-XCJP/fJxX6uFAvyH4yZfgsbzmiBiS7hPiVEGw8C+372GAiMgLlPVy00o585G/kD+Shh2YWXr34Ui0lee7+x0ZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap Notify -->
    <script type="text/javascript" src="assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
    <!-- Bootbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.min.js" integrity="sha512-oVbWSv2O4y1UzvExJMHaHcaib4wsBMS5tEP3/YkMP6GmkwRJAa79Jwsv+Y/w7w2Vb/98/Xhvck10LyJweB8Jsw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom Scripts -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/form-validation.js"></script>
</body>

</html>