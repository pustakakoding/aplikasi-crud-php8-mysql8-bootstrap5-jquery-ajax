// Fungsi untuk menginisialisasi plugin
$(document).ready(function () {
    // flatpickr
    flatpickr(".datepicker", {
        locale: "id",
        dateFormat: "d-m-Y",
        allowInput: true,
        disableMobile: "true"
    });
    /* Documentation : https://flatpickr.js.org/ */
});