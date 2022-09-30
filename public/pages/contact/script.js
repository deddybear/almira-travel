$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    
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

    function formatNumber(number) {
        
        if (number.match('[0-9]') ) {
            return number;
        } else {
            return '';
        }
    }

    $('input[name="wa"]').on("keyup change" , function() {
        this.value = formatNumber(this.value);
    })

    $('#form').on('submit', function (e) {
        e.preventDefault();

        let dataForm = new FormData($('#form')[0]);

        $.ajax({
            url: '/sendMsg',
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
            },
            error: function (res) {
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
})