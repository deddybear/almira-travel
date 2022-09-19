$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#c-wa').on('submit', function (e) {
        e.preventDefault();

        let wa = new FormData($(this)[0])
        wa.append('_method', 'PATCH');

        $.ajax({
            url: `/kontak/wa/`,
            method: 'POST',
            data: wa,
            processData: false,
            contentType: false,
            beforeSend : function () {
                $('#loader-wrapper').show();
            },
            complete: function() {
                $('#loader-wrapper').hide();
            },
            success: function(data) {
                console.log(data);
            }
        });
    });

    $('#c-email').on('submit', function (e) {
        e.preventDefault();

        let email = new FormData($(this)[0])
        email.append('_method', 'PATCH');

        $.ajax({
            url: `/kontak/email/`,
            method: 'POST',
            data: email,
            processData: false,
            contentType: false,
            beforeSend : function () {
                $('#loader-wrapper').show();
            },
            complete: function() {
                $('#loader-wrapper').hide();
            },
            success: function(data) {
                                if (data.success) {
                    Swal.fire("Sukses!", data.success, "success");
                    location.reload();
                }
            }
        });
    });

    $('#c-address').on('submit', function (e) {
        e.preventDefault();

        let address = new FormData($(this)[0])
        address.append('_method', 'PATCH');

        $.ajax({
            url: `/kontak/address/`,
            method: 'POST',
            data: address,
            processData: false,
            contentType: false,
            beforeSend : function () {
                $('#loader-wrapper').show();
            },
            complete: function() {
                $('#loader-wrapper').hide();
            },
            success: function(data) {
                if (data.success) {
                    Swal.fire("Sukses!", data.success, "success");
                    
                    location.reload();
                }
            }
        });
    });

    $('#c-gps').on('submit', function (e) {
        e.preventDefault();

        let gps = new FormData($(this)[0])
        
        let filter = $.parseHTML(gps.get('gps'));
        let src = $(filter).attr('src');

        gps.set('gps', src);
        gps.append('_method', 'PATCH');
        
        $.ajax({
            url: `/kontak/gps/`,
            method: 'POST',
            data: gps,
            processData: false,
            contentType: false,
            beforeSend : function () {
                $('#loader-wrapper').show();
            },
            complete: function() {
                $('#loader-wrapper').hide();
            },
            success: function(data) {
                                if (data.success) {
                    Swal.fire("Sukses!", data.success, "success");
                    location.reload();
                }
            }
        });
    });
});