<div class="d-flex flex-column flex-lg-row mt-5 mb-3">
    <!-- judul halaman -->
    <div class="flex-grow-1 d-flex align-items-center">
        <i class="fa-regular fa-user icon-title"></i>
        <h3>Siswa</h3>
    </div>
    <!-- breadcrumbs -->
    <div class="ms-5 ms-lg-0 pt-lg-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="https://pustakakoding.com/" class="text-dark text-decoration-none"><i class="fa-solid fa-house"></i></a></li>
                <li class="breadcrumb-item"><a href="?halaman=data" class="text-dark text-decoration-none">Siswa</a></li>
                <li class="breadcrumb-item" aria-current="page">Data</li>
            </ol>
        </nav>
    </div>
</div>

<div class="d-grid gap-2 d-md-block bg-white rounded-4 shadow-sm p-4 mb-3">
    <!-- button entri data -->
    <button id="btn-entri" class="btn btn-primary rounded-pill py-2 px-4">
        <i class="fa-solid fa-plus me-2"></i> Entri Siswa
    </button>
</div>

<div class="d-grid gap-2 d-md-block bg-white rounded-4 shadow-sm p-4 mb-5">
    <div class="table-responsive">
        <!-- tabel untuk menampilkan data dari database -->
        <table id="tabel-siswa" class="table table-bordered table-striped table-hover" style="width:100%">
            <thead class="table-light">
                <th class="text-center">No.</th>
                <th class="text-center">Foto</th>
                <th class="text-center">ID Siswa</th>
                <th class="text-center">Nama Lengkap</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Tanggal Daftar</th>
                <th class="text-center">Kelas</th>
                <th class="text-center">Aksi</th>
            </thead>
        </table>
    </div>
</div>

<!-- Modal form entri dan ubah data -->
<div class="modal fade" id="mdl-form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdl-label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <!-- judul form -->
                <h1 class="modal-title fs-5">
                    <i class="fa-solid fa-pen-to-square me-2"></i><span id="mdl-label"></span>
                </h1>
            </div>
            <div class="modal-body text-start">
                <!-- form -->
                <form id="frm-siswa" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="row g-0">
                                <div class="mb-3 col-xl-6 pe-xl-3">
                                    <label class="form-label">ID Siswa <span class="text-danger">*</span></label>
                                    <input type="text" id="id_siswa" name="id_siswa" class="form-control" readonly required>
                                </div>

                                <div class="mb-3 col-xl-6 pe-xl-3">
                                    <label class="form-label">Tanggal Daftar <span class="text-danger">*</span></label>
                                    <input type="text" id="tanggal_daftar" name="tanggal_daftar" class="form-control datepicker" autocomplete="off" required>
                                    <div class="invalid-feedback">Tanggal daftar tidak boleh kosong.</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mb-3 ps-xl-3">
                                <label class="form-label">Kelas <span class="text-danger">*</span></label>
                                <select id="kelas" name="kelas" class="form-select" autocomplete="off" required>
                                    <option selected disabled value="">-- Pilih --</option>
                                    <option value="Data Analysis">Data Analysis</option>
                                    <option value="Digital Marketing">Digital Marketing</option>
                                    <option value="Game Development">Game Development</option>
                                    <option value="Mobile Development">Mobile Development</option>
                                    <option value="Web Design">Web Design</option>
                                    <option value="Web Development">Web Development</option>
                                </select>
                                <div class="invalid-feedback">Kelas tidak boleh kosong.</div>
                            </div>
                        </div>
                    </div>

                    <hr class="mb-4-2">

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3 pe-xl-3">
                                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" autocomplete="off" required>
                                <div class="invalid-feedback">Nama lengkap tidak boleh kosong.</div>
                            </div>

                            <div class="mb-4 pe-xl-3">
                                <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="laki_laki" name="jenis_kelamin" class="form-check-input" value="Laki-laki" required>
                                    <label class="form-check-label">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="perempuan" name="jenis_kelamin" class="form-check-input" value="Perempuan" required>
                                    <label class="form-check-label">Perempuan</label>
                                    <div class="invalid-feedback invalid-feedback-inline">Pilih salah satu jenis kelamin.</div>
                                </div>
                            </div>

                            <div class="mb-3 pe-xl-3">
                                <label class="form-label">Alamat <span class="text-danger">*</span></label>
                                <textarea id="alamat" name="alamat" rows="2" class="form-control" autocomplete="off" required></textarea>
                                <div class="invalid-feedback">Alamat tidak boleh kosong.</div>
                            </div>

                            <div class="mb-3 pe-xl-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" id="email" name="email" class="form-control" autocomplete="off" required>
                                <div class="invalid-feedback">Email tidak boleh kosong.</div>
                            </div>

                            <div class="mb-3 pe-xl-3">
                                <label class="form-label">WhatsApp <span class="text-danger">*</span></label>
                                <input type="text" id="whatsapp" name="whatsapp" class="form-control" maxlength="13" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
                                <div class="invalid-feedback">WhatsApp tidak boleh kosong.</div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mb-3 ps-xl-3">
                                <label class="form-label">Foto Profil <span id="required" class="text-danger">*</span></label>
                                <input type="file" accept=".jpg, .jpeg, .png" id="foto" name="foto" class="form-control" autocomplete="off">
                                <div class="invalid-feedback">Foto profil tidak boleh kosong.</div>

                                <div class="mt-4">
                                    <img id="foto_preview" class="border border-2 img-fluid rounded-4 shadow-sm" alt="Foto Profil" width="240" height="240">
                                </div>

                                <div class="form-text mt-4">
                                    Keterangan : <br>
                                    - Tipe file yang bisa diunggah adalah *.jpg atau *.png. <br>
                                    - Ukuran file yang bisa diunggah maksimal 1 Mb.
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- button simpan data -->
                <button id="btn-simpan" type="button" class="btn btn-primary rounded-pill py-2 px-4 me-2">Simpan</button>
                <!-- button tutup modal form -->
                <button type="button" class="btn btn-secondary rounded-pill py-2 px-4" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal form detail data -->
<div class="modal fade" id="mdl-form-detail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdl-label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <!-- judul form -->
                <h1 class="modal-title fs-5">
                    <i class="fa-solid fa-list-ul me-2"></i> Detail Data Siswa
                </h1>
            </div>
            <div class="modal-body text-start">
                <!-- detail data -->
                <div class="d-flex flex-column flex-xl-row">
                    <div class="flex-shrink-0 text-center mb-5 mb-xl-0">
                        <div class="foto-profil-detail">
                            <img id="dt_foto" class="border border-2 img-fluid rounded-4 shadow" alt="Foto Profil" width="240" height="240">
                        </div>
                    </div>
                    <div class="flex-grow-1 text-muted fw-light ms-xl-5">
                        <div class="table-responsive">
                            <table class="table table-striped lh-lg">
                                <tr>
                                    <td width="200">ID Siswa</td>
                                    <td width="10">:</td>
                                    <td id="dt_id_siswa"></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Daftar</td>
                                    <td>:</td>
                                    <td id="dt_tanggal_daftar"></td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>:</td>
                                    <td id="dt_kelas"></td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>:</td>
                                    <td id="dt_nama_lengkap"></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td id="dt_jenis_kelamin"></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td id="dt_alamat"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td id="dt_email"></td>
                                </tr>
                                <tr>
                                    <td>WhatsApp</td>
                                    <td>:</td>
                                    <td id="dt_whatsapp"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- button tutup modal form -->
                <button type="button" class="btn btn-secondary rounded-pill py-2 px-4" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        /** Tampil Data
         *****************
        */
        // DataTables plugin untuk membuat nomor urut tabel
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        // Menampilkan data dengan datatables serverside processing
        var table = $('#tabel-siswa').DataTable( {
            "processing": true,                     // tampilkan loading saat proses tampil data
            "serverSide": true,                     // aktifkan serverside processing
            "ajax": 'data.php',                     // file proses tampil data dari database
            // tampilkan data
            "columnDefs": [ 
                { "targets": 0, "data": null, "orderable": false, "searchable": false, "width": '30px', "className": 'text-center' },
                { "targets": 1, "width": "50px", "className": "text-center",
                    "render": function ( data, type, row ) {
                        var foto = "<img src=\"images/" + data + "\" class=\"border border-2 img-fluid rounded-3\" alt=\"Foto Profil\" width=\"70px\" height=\"70px\">";
                        return foto;
                    }
                },
                { "targets": 2, "width": "70px", "className": "text-center" },
                { "targets": 3, "width": "200px" },
                { "targets": 4, "width": "80px", "className": "text-center" },
                { "targets": 5, "width": "80px", "className": "text-center" },
                { "targets": 6, "width": "150px" },
                { "targets": 7, "data": null, "orderable": false, "searchable": false, "width": '140px', "className": 'text-center',
                    // button detail, ubah, dan hapus data
                    "render": function(data, type, row) {
                        var btn = "<a class=\"btn btn-warning btn-sm rounded-pill px-3 me-2 mb-1 btn-detail\" href=\"javascript:void(0);\">Detail</a><a class=\"btn btn-primary btn-sm rounded-pill px-3 me-2 mb-1 btn-ubah\" href=\"javascript:void(0);\">Ubah</a><a class=\"btn btn-danger btn-sm rounded-pill px-3 mb-1 btn-hapus\" href=\"javascript:void(0);\">Hapus</a>";
                        return btn;
                    } 
                } 
            ],
            "order": [[ 2, "desc" ]],               // urutkan data berdasarkan "id_siswa" secara descending
            "iDisplayLength": 10,                   // tampilkan 10 data per halaman
            // membuat nomor urut tabel
            "rowCallback": function (row, data, iDisplayIndex) {
                var info   = this.fnPagingInfo();
                var page   = info.iPage;
                var length = info.iLength;
                var index  = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        } );

        /** Form
         ********************
         * Form Entri Data
         * Form Detail Data
         * Form Ubah Data
         * Validasi dan Preview File
        */
        // Menampilkan Modal Form Entri Data
        $('#btn-entri').click(function() {
            // ajax request untuk mengambil data "id_siswa"
            $.ajax({
                url: "get_id.php",      // file proses get data
                // fungsi yang dijalankan sebelum ajax request dikirim
                beforeSend: function() {
                    // tampilkan preloader
                    $('.preloader').fadeIn('slow');
                },
                // fungsi yang dijalankan ketika ajax request berhasil
                success: function(result) {
                    // memberikan interval waktu sebelum fungsi dijalankan
                    setTimeout(function() {
                        // tutup preloader
                        $('.preloader').fadeOut('fast');
                        // tampilkan modal form
                        $('#mdl-form').modal('show');
                        // judul form
                        $('#mdl-label').text('Entri Data Siswa');
                        // reset form
                        $('#frm-siswa')[0].reset();
                        // hapus class was-validated pada form
                        $("#frm-siswa").removeClass('was-validated');

                        /** buat input foto wajib diisi */
                        // hapus class d-none pada label Foto Profil
                        $('#required').removeClass('d-none');
                        // tambahkan attribute required pada input foto
                        $('#foto').attr('required', true);

                        // tampilkan data "id_siswa"
                        $('#id_siswa').val(result);
                        // tampilkan foto default
                        $('#foto_preview').attr('src','images/img-default.png');
                    }, 500);
                }
            });
        });

        // Menampilkan Modal Form Detail Data
        $('#tabel-siswa tbody').on('click', '.btn-detail', function() {
            // mengambil data dari datatables 
            var data = table.row($(this).parents('tr')).data();
            // membuat variabel untuk menampung data "id_siswa"
            var id_siswa = data[2];

            // ajax request untuk mengambil data siswa
            $.ajax({
                type: "GET",                        // mengirim data dengan method GET 
                url: "get_data.php",                // file proses get data
                data: { id_siswa: id_siswa },       // data yang dikirim
                dataType: "JSON",                   // menggunakan tipe data JSON
                // fungsi yang dijalankan sebelum ajax request dikirim
                beforeSend: function() {
                    // tampilkan preloader
                    $('.preloader').fadeIn('slow');
                },
                // fungsi yang dijalankan ketika ajax request berhasil
                success: function(result) {
                    // memberikan interval waktu sebelum fungsi dijalankan
                    setTimeout(function() {
                        // tutup preloader
                        $('.preloader').fadeOut('fast');
                        // tampilkan modal form
                        $('#mdl-form-detail').modal('show');

                        // ubah format tanggal menjadi Hari-Bulan-Tahun (d-m-Y) sebelum ditampilkan ke form
                        var tanggal        = result.tanggal_daftar;
                        var dateArray      = tanggal.split('-');
                        var tanggal_daftar = dateArray[2] + '-' + dateArray[1] + '-' + dateArray[0];

                        // tampilkan data ke form
                        $('#dt_id_siswa').text(result.id_siswa);
                        $('#dt_tanggal_daftar').text(tanggal_daftar);
                        $('#dt_kelas').text(result.kelas);
                        $('#dt_nama_lengkap').text(result.nama_lengkap);
                        $('#dt_jenis_kelamin').text(result.jenis_kelamin);
                        $('#dt_alamat').text(result.alamat);
                        $('#dt_email').text(result.email);
                        $('#dt_whatsapp').text(result.whatsapp);
                        $('#dt_foto').attr('src','images/'+result.foto_profil);
                    }, 500);
                }
            });
        });

        // Menampilkan Modal Form Ubah Data
        $('#tabel-siswa tbody').on('click', '.btn-ubah', function() {
            // mengambil data dari datatables 
            var data = table.row($(this).parents('tr')).data();
            // membuat variabel untuk menampung data "id_siswa"
            var id_siswa = data[2];

            // ajax request untuk mengambil data siswa
            $.ajax({
                type: "GET",                        // mengirim data dengan method GET 
                url: "get_data.php",                // file proses get data
                data: { id_siswa: id_siswa },       // data yang dikirim
                dataType: "JSON",                   // menggunakan tipe data JSON
                // fungsi yang dijalankan sebelum ajax request dikirim
                beforeSend: function() {
                    // tampilkan preloader
                    $('.preloader').fadeIn('slow');
                },
                // fungsi yang dijalankan ketika ajax request berhasil
                success: function(result) {
                    // memberikan interval waktu sebelum fungsi dijalankan
                    setTimeout(function() {
                        // tutup preloader
                        $('.preloader').fadeOut('fast');
                        // tampilkan modal form
                        $('#mdl-form').modal('show');
                        // judul form
                        $('#mdl-label').text('Ubah Data Siswa');
                        // hapus class was-validated pada form
                        $("#frm-siswa").removeClass('was-validated');
                        // reset input foto
                        $('#foto').val('');

                        /** buat input foto tidak wajib diisi */
                        // tambahkan class d-none pada label Foto Profil
                        $('#required').addClass('d-none');
                        // hapus attribute required pada input foto
                        $('#foto').removeAttr('required');

                        // ubah format tanggal menjadi Hari-Bulan-Tahun (d-m-Y) sebelum ditampilkan ke form
                        var tanggal        = result.tanggal_daftar;
                        var dateArray      = tanggal.split('-');
                        var tanggal_daftar = dateArray[2] + '-' + dateArray[1] + '-' + dateArray[0];

                        // tampilkan data ke form
                        $('#id_siswa').val(result.id_siswa);
                        $('#tanggal_daftar').val(tanggal_daftar);
                        $('#kelas').val(result.kelas);
                        $('#nama_lengkap').val(result.nama_lengkap);
                        // checked radio button "jenis_kelamin" sesuai data dari database 
                        var jenis_kelamin = $('input:radio[name=jenis_kelamin]');
                        // jika "jenis_kelamin = Laki-laki"
                        if (result.jenis_kelamin == 'Laki-laki'){
                            jenis_kelamin.filter('[value=Laki-laki]').prop('checked', true);
                        } 
                        // jika "jenis_kelamin = Perempuan"
                        else if (result.jenis_kelamin == 'Perempuan'){
                            jenis_kelamin.filter('[value=Perempuan]').prop('checked', true);
                        }
                        $('#alamat').val(result.alamat);
                        $('#email').val(result.email);
                        $('#whatsapp').val(result.whatsapp);
                        $('#foto_preview').attr('src','images/'+result.foto_profil);
                    }, 500);
                }
            });
        });

        // Validasi file dan preview foto sebelum diunggah
        $('#foto').change(function() {
            // mengambil value dari file
            var filePath = $('#foto').val();
            var fileSize = $('#foto')[0].files[0].size;
            // tentukan extension file yang diperbolehkan
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

            // Jika tipe file yang diunggah tidak sesuai dengan "allowedExtensions"
            if (!allowedExtensions.exec(filePath)) {
                // tampilkan pesan peringatan tipe file tidak sesuai
                $.notify({
                    title: '<h5 class="font-weight-bold mb-1"><i class="fas fa-exclamation-triangle me-2"></i>Peringatan!</h5>',
                    message: 'Tipe file foto tidak sesuai. Harap unggah file foto yang memiliki tipe *.jpg atau *.png.'
                }, {
                    type: 'warning',
		            allow_dismiss: false,
                });
                // reset input file
                $('#foto').val('');
                // tampilkan file default
                $('#foto_preview').attr('src', 'images/img-default.png');

                return false;
            }
            // jika ukuran file yang diunggah lebih dari 1 Mb
            else if (fileSize > 1000000) {
                // tampilkan pesan peringatan ukuran file tidak sesuai
                $.notify({
                    title: '<h5 class="font-weight-bold mb-1"><i class="fas fa-exclamation-triangle me-2"></i>Peringatan!</h5>',
                    message: 'Ukuran file foto lebih dari 1 Mb. Harap unggah file foto yang memiliki ukuran maksimal 1 Mb.'
                }, {
                    type: 'warning',
		            allow_dismiss: false,
                });
                // reset input file
                $('#foto').val('');
                // tampilkan file default
                $('#foto_preview').attr('src', 'images/img-default.png');

                return false;
            }
            // jika file yang diunggah sudah sesuai, tampilkan preview file
            else {
                // mengambil value dari file
                var fileInput = $('#foto')[0];

                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        // preview file
                        $('#foto_preview').attr('src', e.target.result);
                    };
                };
                // membaca file sebagai data URL
                reader.readAsDataURL(fileInput.files[0]);
            }
        });

        /** Proses
         ********************
         * Insert Data
         * Update Data
         * Delete Data
        */
        // Proses Insert dan Update Data
        $('#btn-simpan').click(function() {
            // validasi form input
            // jika ada input (required) yang kosong
            if ($("#frm-siswa")[0].checkValidity() === false) {
                // batalkan submit form
                event.preventDefault()
                event.stopPropagation()
            } 
            // jika tidak ada input (required) yang kosong, jalankan perintah insert / update data
            else {
                // jika form entri data siswa yang ditampilkan, jalankan perintah insert
                if ($('#mdl-label').text() == "Entri Data Siswa") {
                    // ambil data hasil submit dari form dan buat variabel untuk menampung data menggunakan "FormData"
                    var data = new FormData();
                    data.append('id_siswa', $('#id_siswa').val());
                    data.append('tanggal_daftar', $('#tanggal_daftar').val());
                    data.append('kelas', $('#kelas').val());
                    data.append('nama_lengkap', $('#nama_lengkap').val());
                    data.append('jenis_kelamin', $('input[name="jenis_kelamin"]:checked').val());
                    data.append('alamat', $('#alamat').val());
                    data.append('email', $('#email').val());
                    data.append('whatsapp', $('#whatsapp').val());
                    data.append('foto', $('#foto')[0].files[0]);

                    // ajax request untuk insert data siswa
                    $.ajax({
                        type: "POST",               // mengirim data dengan method POST 
                        url: "insert.php",          // file proses insert data
                        data: data,                 // data yang dikirim
                        contentType : false,
                        processData : false,
                        // fungsi yang dijalankan sebelum ajax request dikirim
                        beforeSend: function() {
                            // tampilkan preloader
                            $('.preloader').fadeIn('slow');
                        },
                        // fungsi yang dijalankan ketika ajax request berhasil
                        success: function(result) {
                            // jika insert data berhasil
                            if (result === "sukses") {
                                // memberikan interval waktu sebelum fungsi dijalankan
                                setTimeout(function() {
                                    // tutup preloader
                                    $('.preloader').fadeOut('fast');
                                    // tutup modal form
                                    $('#mdl-form').modal('hide');
                                    // tampilkan pesan sukses simpan data
                                    $.notify({
                                        title: '<h5 class="font-weight-bold mb-1"><i class="fas fa-check-circle me-2"></i>Sukses!</h5>',
                                        message: 'Data siswa berhasil disimpan.'
                                    }, {
                                        type: 'success',
                                        allow_dismiss: false,
                                    });
                                    // reload data pada tabel
                                    var table = $('#tabel-siswa').DataTable();
                                    table.ajax.reload(null, false);
                                }, 500);
                            }
                            // jika insert data gagal
                            else {
                                // memberikan interval waktu sebelum fungsi dijalankan
                                setTimeout(function() {
                                    // tutup preloader
                                    $('.preloader').fadeOut('fast');
                                    // tampilkan pesan gagal dan error result
                                    $.notify({
                                        title: '<h5 class="font-weight-bold mb-1"><i class="fas fa-times-circle me-2"></i>Gagal!</h5>',
                                        message: 'Query Error : ' + result
                                    }, {
                                        type: 'danger',
                                        allow_dismiss: false,
                                    });
                                }, 500);
                            }
                        }
                    });
                    return false;
                }
                // jika form ubah data siswa yang ditampilkan, jalankan perintah update
                else if ($('#mdl-label').text() == "Ubah Data Siswa") {
                    // ambil data hasil submit dari form dan buat variabel untuk menampung data menggunakan "FormData"
                    var data = new FormData();
                    data.append('id_siswa', $('#id_siswa').val());
                    data.append('tanggal_daftar', $('#tanggal_daftar').val());
                    data.append('kelas', $('#kelas').val());
                    data.append('nama_lengkap', $('#nama_lengkap').val());
                    data.append('jenis_kelamin', $('input[name="jenis_kelamin"]:checked').val());
                    data.append('alamat', $('#alamat').val());
                    data.append('email', $('#email').val());
                    data.append('whatsapp', $('#whatsapp').val());
                    data.append('foto', $('#foto')[0].files[0]);

                    // ajax request untuk update data siswa
                    $.ajax({
                        type: "POST",               // mengirim data dengan method POST 
                        url: "update.php",          // file proses update data
                        data: data,                 // data yang dikirim
                        contentType : false,
                        processData : false,
                        // fungsi yang dijalankan sebelum ajax request dikirim
                        beforeSend: function() {
                            // tampilkan preloader
                            $('.preloader').fadeIn('slow');
                        },
                        // fungsi yang dijalankan ketika ajax request berhasil
                        success: function(result) {
                            // jika update data berhasil
                            if (result === "sukses") {
                                // memberikan interval waktu sebelum fungsi dijalankan
                                setTimeout(function() {
                                    // tutup preloader
                                    $('.preloader').fadeOut('fast');
                                    // tutup modal form
                                    $('#mdl-form').modal('hide');
                                    // tampilkan pesan sukses ubah data
                                    $.notify({
                                        title: '<h5 class="font-weight-bold mb-1"><i class="fas fa-check-circle me-2"></i>Sukses!</h5>',
                                        message: 'Data siswa berhasil diubah.'
                                    }, {
                                        type: 'success',
                                        allow_dismiss: false,
                                    });
                                    // reload data pada tabel
                                    var table = $('#tabel-siswa').DataTable();
                                    table.ajax.reload(null, false);
                                }, 500);
                            }
                            // jika update data gagal
                            else {
                                // memberikan interval waktu sebelum fungsi dijalankan
                                setTimeout(function() {
                                    // tutup preloader
                                    $('.preloader').fadeOut('fast');
                                    // tampilkan pesan gagal dan error result
                                    $.notify({
                                        title: '<h5 class="font-weight-bold mb-1"><i class="fas fa-times-circle me-2"></i>Gagal!</h5>',
                                        message: 'Query Error : ' + result
                                    }, {
                                        type: 'danger',
                                        allow_dismiss: false,
                                    });
                                }, 500);
                            }
                        }
                    });
                    return false;
                }
            }

            // tambahkan class was-validated pada form input saat form input sudah divalidasi
            $("#frm-siswa").addClass('was-validated');
        });

        // Proses Delete Data
        $('#tabel-siswa tbody').on('click', '.btn-hapus', function() {
            // mengambil data dari datatables 
            var data = table.row($(this).parents('tr')).data();
            
            // tampilkan notifikasi saat akan menghapus data
            bootbox.dialog({
                title: '<i class="fa-regular fa-trash-can me-2"></i> Hapus Data Siswa',
                message: '<p class="mb-2">Anda yakin ingin menghapus data siswa?</p><p class="fw-bold mb-2">' + data[2] + ' - ' + data[3] + '</p>',
                closeButton: false,
                buttons: {
                    cancel: {
                        label: "Batal",
                        className: 'btn-secondary rounded-pill px-3',
                    },
                    ok: {
                        label: "Ya, Hapus",
                        className: 'btn-danger rounded-pill px-3',
                        callback: function () {
                            // membuat variabel untuk menampung data "id_siswa"
                            var id_siswa = data[2];

                            // ajax request untuk delete data siswa
                            $.ajax({
                                type: "POST",                   // mengirim data dengan method POST 
                                url: "delete.php",              // file proses delete data
                                data: { id_siswa: id_siswa },   // data yang dikirim
                                // fungsi yang dijalankan sebelum ajax request dikirim
                                beforeSend: function() {
                                    // tampilkan preloader
                                    $('.preloader').fadeIn('slow');
                                },
                                // fungsi yang dijalankan ketika ajax request berhasil
                                success: function(result) {
                                    // jika delete data berhasil
                                    if (result === "sukses") {
                                        // memberikan interval waktu sebelum fungsi dijalankan
                                        setTimeout(function() {
                                            // tutup preloader
                                            $('.preloader').fadeOut('fast');
                                            // tampilkan pesan sukses hapus data
                                            $.notify({
                                                title: '<h5 class="font-weight-bold mb-1"><i class="fas fa-check-circle me-2"></i>Sukses!</h5>',
                                                message: 'Data siswa berhasil dihapus.'
                                            }, {
                                                type: 'success',
                                                allow_dismiss: false,
                                            });
                                            // reload data pada tabel
                                            var table = $('#tabel-siswa').DataTable();
                                            table.ajax.reload(null, false);
                                        }, 500);
                                    }
                                    // jika delete data gagal
                                    else {
                                        // memberikan interval waktu sebelum fungsi dijalankan
                                        setTimeout(function() {
                                            // tutup preloader
                                            $('.preloader').fadeOut('fast');
                                            // tampilkan pesan gagal dan error result
                                            $.notify({
                                                title: '<h5 class="font-weight-bold mb-1"><i class="fas fa-times-circle me-2"></i>Gagal!</h5>',
                                                message: 'Query Error : ' + result
                                            }, {
                                                type: 'danger',
                                                allow_dismiss: false,
                                            });
                                        }, 500);
                                    }
                                }
                            });
                        }
                    }
                }
            });
        });
    });
</script>