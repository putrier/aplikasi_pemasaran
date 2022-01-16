const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    swal({
        title: 'Success',
        text: 'Data Berhasil' + flashData,
        type: 'success'
    });
}

//tombol hapus
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    swal({
        title: "Anda Yakin",
        text: "Data Ingin Dihapus?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Hapus",
        closeOnConfirm: false
    },
        function () {
            document.location.href = href;
        });

});



//tombol logout
$('.tombol-logout').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    swal({
        title: "Logout?",
        text: "Apakah Anda Ingin Logout?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Logout",
        closeOnConfirm: false
    },
        function () {
            document.location.href = href;
        });
});



//tombol verifikasi
$('.tombol-verifikasi').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    swal({
        title: "Verifikasi?",
        text: "Apakah Ingin Memverifikasi Data Ini?",
        type: "info",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Verifikasi",
        closeOnConfirm: false
    },
        function () {
            document.location.href = href;
        });
});

//tombol deactive
$('.tombol-deactive').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    swal({
          title: "Deactive?",
          text: "Apakah ingin menonaktifkan data ini?",
          type: "info",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Deactive",
          closeOnConfirm: false
          
        },
         function () {
            document.location.href = href;
    
        });
});

//tombol verifikasi
$('.tombol-aktif').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    swal({
          title: "Active?",
          text: "Apakah ingin mengaktifkan data ini?",
          type: "info",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Active",
          closeOnConfirm: false
          
        },
         function () {
            document.location.href = href;
    
        });
});

//tombol verifikasi
$('.tombol-verify').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    swal({
          title: "Verifikasi?",
          text: "Apakah ingin memverifikasi data ini?",
          type: "info",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Verifikasi",
          closeOnConfirm: false
          
        },
         function () {
            document.location.href = href;
    
        });
});

