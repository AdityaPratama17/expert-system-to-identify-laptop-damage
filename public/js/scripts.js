$(function() {
    $('[data-toggle="tooltip"]').tooltip();

    // GEJALA
    $('.tombolTambahGejala').on('click', function() {
        $('#formModalLabel').html('Tambah Gejala');
        $('.modal-footer button[type=submit]').html('Tambah Gejala');
        $('#id').val('');
        $('#gejala').val('');
        $('#bobot').val(1);
    });

    $('.tombolUbahGejala').on('click', function() {
        $('#formModalLabel').html('Ubah Data Gejala');
        $('.modal-footer button[type=submit]').html('Ubah Gejala');
        $('.modal-body form').attr('action', 'http://localhost/PHP/SISTEM%20PAKAR/FINAL%20PROJECT/public/gejala/ubahGejala');
        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/PHP/SISTEM%20PAKAR/FINAL%20PROJECT/public/gejala/getUbahGejala',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#id').val(data.id_gejala);
                $('#gejala').val(data.nama_gejala);
                $('#bobot').val(data.id_bobot_pakar);
            }
        });
    });

    // KERUSAKAN
    $('.tombolTambahKerusakan').on('click', function() {
        $('#formModalLabel').html('Tambah Jenis Kerusakan');
        $('.modal-footer button[type=submit]').html('Tambah Kerusakan');
        $('#id').val('');
        $('#kerusakan').val('');
    });

    $('.tombolUbahKerusakan').on('click', function() {
        $('#formModalLabel').html('Ubah Data Kerusakan');
        $('.modal-footer button[type=submit]').html('Ubah Kerusakan');
        $('.modal-body form').attr('action', 'http://localhost/PHP/SISTEM%20PAKAR/FINAL%20PROJECT/public/kerusakan/ubahKerusakan');
        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/PHP/SISTEM%20PAKAR/FINAL%20PROJECT/public/kerusakan/getUbahKerusakan',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#id').val(data.id_kerusakan);
                $('#kerusakan').val(data.jenis_kerusakan);
            }
        });
    });

    // ATURAN
    $('.tombolTambahAturan').on('click', function() {
        $('#formModalLabel').html('Tambah Jenis Aturan');
        $('.modal-footer button[type=submit]').html('Tambah Aturan');
        $('#id').val('');
        $('#kerusakan').val(1);
        $('#gejala').val(1);
    });

    $('.tombolUbahAturan').on('click', function() {
        $('#formModalLabel').html('Ubah Data Aturan');
        $('.modal-footer button[type=submit]').html('Ubah Aturan');
        $('.modal-body form').attr('action', 'http://localhost/PHP/SISTEM%20PAKAR/FINAL%20PROJECT/public/aturan/ubahAturan');
        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/PHP/SISTEM%20PAKAR/FINAL%20PROJECT/public/aturan/getUbahAturan',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#id').val(data.id_rule);
                $('#kerusakan').val(data.id_kerusakan);
                $('#gejala').val(data.id_gejala);
            }
        });
    });

    // ADMIN
    $('.tombolTambahAdmin').on('click', function() {
        $('#id').val('');
        $('#nama').val('');
        $('#uname').val('');
        $('#email').val('');
        $('#pw').val('');
    });
});