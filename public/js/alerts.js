(function($) {
    showSwal = function(url, name, target) {
        swal({
            title: 'Apakah Anda Yakin',
            text: 'Ingin Menghapus <b>' + name + '</b> Dari Daftar ' + target.charAt(0).toUpperCase() + target.slice(1) + ' ?',
            icon: 'warning',
            showCancelButton: true,
            buttons: {
                confirm: {
                    text: 'Ya',
                    value: true,
                    visible: true,
                    className: 'btn btn-primary',
                    closeModal: true
                },
                cancel: {
                    text: 'Tidak',
                    value: null,
                    visible: true,
                    className: 'btn btn-danger',
                    closeModal: true,
                }

            },
        }).then(function(isConfirm) {
            if (isConfirm) {
                swal({
                    title: 'Berhasil!',
                    text: target.charAt(0).toUpperCase() + target.slice(1) + ' ' + name + 'Berhasil Di Hapus',
                    icon: 'success'
                }).then(function() {
                    window.location = '/master/data/' + target + '/delete/' + url;
                });
            } else {
                swal('Batal', target.charAt(0).toUpperCase() + target.slice(1) + ' ' + name + ' Tidak Berhasil Di Hapus');
            }
        });
    };

    success_ = function() {
        swal({
            position: 'center',
            type: 'success',
            title: 'Berhasil',
            text: 'Isotank berhasil dijadwalkan',
            showConfirmButton: false,
            timer: 4000
        })
    };

    fail_ = function() {
        swal({
            position: 'center',
            type: 'error',
            title: 'Gagal',
            text: 'Isotank telah terpakai beberapa saat yang lalu, mohon untuk memilih ulang isotank yang lain',
            showConfirmButton: false,
            timer: 4000
        })
    };
})(jQuery);