$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsive:{
        0: {
            items:1
        }
    }
})

$(document).ready(function() {

    console.log('ahi');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    function whereIsThis () {
        let url = window.location.href;
        let here = url.split('/');
        return here[3];
    };

    const message = messageErrors => {
        var temp = '';
        if (messageErrors instanceof Array) {
                messageErrors.forEach(element => {
                    temp += `${element} <br>`
                });
                return temp;
        } else {
            return messageErrors ? `${messageErrors} <br>` : ' '
        }
       
    }

    $('#form').on('submit', function (e) {
        e.preventDefault();

        let dataForm = new FormData($('#form')[0]);
        let segemnet = whereIsThis();

        // console.log($("form").serializeArray());
        $.ajax({
            url: `/send/${segemnet}/review`,
            method: 'POST',
            dataType: "JSON",
            data: dataForm,
            processData: false,
            contentType: false,
            beforeSend : function () {
                $('#loader-wrapper').show();
            },
            complete: function() {
                $('#loader-wrapper').hide();
            },
            success: function (data) {
                if (data.success) {
                    Swal.fire("Sukses!", data.success, "success");
                    grecaptcha.reset();
                    $('#form')[0].reset();
                }

                window.location.reload();
            },
            error: function (res) {
                grecaptcha.reset();
                let text = ''; 

                for (const key in res.responseJSON.errors) {
                    text += message(res.responseJSON.errors[key]); 
                }

                Swal.fire(
                    'Whoops ada Kesalahan',
                    `Error : <br> ${text}`,
                    'error'
                )
            }
        })
    })

    $('.delete').click(function() {
        const id = $(this).attr("data");

        Swal.fire({
            title: "Apakah kamu yakin ??",
            text: "Setelah terhapus, ini tidak bisa dikembalikan lagi!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Saya Setuju!",
            cancelButtonText: "Batalkan"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url:  `/review/delete/${id}`,
                    method: 'DELETE',
                    dataType: 'JSON',
                    beforeSend : function () {
                        $('#loader-wrapper').show();
                    },
                    complete: function() {
                        $('#loader-wrapper').hide();
                    },
                    success: function (data) {
                        Swal.fire("Deleted!", data.success, "success");
                        location.reload();
                    },
                    error: function (res) {

                        console.log(res);
                        let text = ''; 

                        for (const key in res.responseJSON.errors) {
                            text += message(res.responseJSON.errors[key]); 
                        }
        
                        Swal.fire(
                            'Whoops ada Kesalahan',
                            `Error : <br> ${text}`,
                            'error'
                        )
                    }
                })
            } else {
                
            }
        });
    })
})