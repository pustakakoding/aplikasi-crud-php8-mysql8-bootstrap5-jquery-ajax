// ========================================
// UTILITY FUNCTIONS
// ========================================

// Cache selectors
const $preloader = $('.preloader');
const $formInput = $('#formInput');
const $modalInput = $('#modalInput');
const $modalDetail = $('#modalDetail');
const $modalLabel = $('#modalLabel');
const $previewImage = $('#preview-image');
const $imageInput = $('#image');
const $required = $('#required');

// Variable untuk track perubahan form
let formChanged = false;

// Tampilkan notifikasi
function showNotify(type, title, message) {
    const icon = type === 'success' ? 'check' : 'times';
    $.notify({
        title: `<h5 class="font-weight-bold mb-1"><i class="fas fa-${icon}-circle me-2"></i>${title}</h5>`,
        message: message
    }, {
        type: type,
        allow_dismiss: false,
    });
}

// Escape HTML untuk keamanan
function escapeHtml(text) {
    return $('<div>').text(text).html();
}

// Format tanggal ke format Indonesia
function formatTanggalIndo(date) {
    return new Intl.DateTimeFormat('id-ID', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    }).format(new Date(date));
}

// Format tanggal Y-m-d ke d-m-Y dan sebaliknya
function formatDate(dateString, reverse = false) {
    const parts = dateString.split('-');
    return reverse ? 
        `${parts[2]}-${parts[1]}-${parts[0]}` : 
        `${parts[0]}-${parts[1]}-${parts[2]}`;
}

// Set foto input required atau tidak
function setPhotoRequired(required) {
    if (required) {
        $required.removeClass('d-none');
        $imageInput.attr('required', true);
    } else {
        $required.addClass('d-none');
        $imageInput.removeAttr('required');
    }
}

// Set radio button jenis kelamin
function setJenisKelamin(value) {
    $(`input:radio[name=jenis_kelamin][value="${value}"]`).prop('checked', true);
}

// Reset form dan validation
function resetForm() {
    $formInput[0].reset();
    $formInput.removeClass('was-validated');
    $imageInput.val('');
    formChanged = false;
}

/**
 * Validasi karakter input
 * @param {KeyboardEvent} e - Event keyboard
 * @param {string} allowedChars - Daftar karakter yang diizinkan
 * @returns {boolean}
 */
function allowChars(e, allowedChars) {
    // Dapatkan karakter yang ditekan
    const key = e.key;

    // Izinkan tombol kontrol
    if (
        e.ctrlKey ||
        e.metaKey ||
        ['Backspace', 'Tab', 'Escape', 'ArrowLeft', 'ArrowRight', 'Delete'].includes(key)
    ) {
        return true;
    }

    // Enter → pindah ke input berikutnya
    if (key === 'Enter') {
        e.preventDefault(); // Mencegah submit form
        const form = e.target.form;
        if (!form) return false;

        const elements = Array.from(form.elements).filter(el => !el.disabled);
        const index = elements.indexOf(e.target);
        const next = elements[index + 1] || elements[0];
        next.focus();
        return false;
    }

    // Validasi karakter
    if (!allowedChars.toLowerCase().includes(key.toLowerCase())) {
        e.preventDefault();
        return false;
    }

    return true;
}

/**
 * Validasi dan preview image sebelum upload
 * - Validasi tipe file (jpg, jpeg, png)
 * - Validasi ukuran file (max 1MB)
 * - Tampilkan preview image
 * - Notifikasi menggunakan Bootstrap Toasts
 */
(function ($) {
    'use strict';

    // Konstanta konfigurasi
    const CONFIG = {
        maxFileSize: 1000000, // 1MB dalam bytes
        allowedExtensions: ['jpg', 'jpeg', 'png'],
        defaultImage: 'images/img-default.png'
    };

    const $fileInput = $('#image');
    const $previewImage = $('#preview-image');

    // Jika tidak ada file dipilih atau elemen preview tidak ditemukan
    if (!$fileInput.length || !$previewImage.length) {
        return;
    }

    /**
     * Buat container untuk toast jika belum ada
     */
    function initToastContainer() {
        if ($('#toast-container').length === 0) {
            $('body').append(`
                <div id="toast-container" class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
                </div>
            `);
        }
    }

    /**
     * Tampilkan toast notification
     */
    function showToast(message, type = 'danger') {
        initToastContainer();

        const toastId = 'toast-' + Date.now();
        const iconClass = type === 'danger' ? 'fa-solid fa-triangle-exclamation' : 'fa-solid fa-circle-check';
        const title = type === 'danger' ? 'Error' : 'Success';

        const toastHtml = `
            <div id="${toastId}" class="toast align-items-center text-white bg-${type} border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <i class="${iconClass} me-1"></i>
                        <strong>${title}:</strong> ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white align-items-start mt-2 me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        `;

        $('#toast-container').append(toastHtml);

        const toastElement = document.getElementById(toastId);
        const toast = new bootstrap.Toast(toastElement, {
            autohide: true,
            delay: 3000
        });

        toast.show();

        // Hapus toast dari DOM setelah ditutup
        $(toastElement).on('hidden.bs.toast', function () {
            $(this).remove();
        });
    }

    /**
     * Validasi tipe file
     */
    function isValidFileType(fileName) {
        const extension = fileName.split('.').pop().toLowerCase();
        return CONFIG.allowedExtensions.includes(extension);
    }

    /**
     * Validasi ukuran file
     */
    function isValidFileSize(fileSize) {
        return fileSize <= CONFIG.maxFileSize;
    }

    /**
     * Format ukuran file ke format yang lebih readable
     */
    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
    }

    /**
     * Reset input file dan preview
     */
    function resetFileInput() {
        $fileInput.val('');
        $previewImage.attr({
            'src': CONFIG.defaultImage,
            'alt': 'Preview image'
        });
    }

    /**
     * Tampilkan preview image
     */
    function showPreview(file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            $previewImage.attr({
                'src': e.target.result,
                'alt': file.name
            });
        };

        reader.onerror = function () {
            showToast('Gagal membaca file. Silakan coba lagi.', 'danger');
            resetFileInput();
        };

        reader.readAsDataURL(file);
    }

    /**
     * Handler untuk perubahan file input
     */
    function handleFileChange(event) {
        const file = event.target.files[0];

        // Cek apakah ada file yang dipilih
        if (!file) {
            resetFileInput();
            return;
        }

        // Validasi tipe file
        if (!isValidFileType(file.name)) {
            const message = `
                Tipe file tidak sesuai.<br>
                <small>Format diperbolehkan: ${CONFIG.allowedExtensions.join(', ').toUpperCase()}<br>
                File Anda: ${file.name.split('.').pop().toUpperCase()}</small>
            `;
            showToast(message, 'danger');
            resetFileInput();
            return;
        }

        // Validasi ukuran file
        if (!isValidFileSize(file.size)) {
            const maxSizeMB = CONFIG.maxFileSize / 1000000;
            const message = `
                Ukuran file terlalu besar.<br>
                <small>Maksimal: ${maxSizeMB} MB<br>
                File Anda: ${formatFileSize(file.size)}</small>
            `;
            showToast(message, 'danger');
            resetFileInput();
            return;
        }

        // Jika semua validasi lolos, tampilkan preview
        showPreview(file);
    }

    // Event listener untuk perubahan file menggunakan jQuery
    $fileInput.on('change', handleFileChange);

})(jQuery);