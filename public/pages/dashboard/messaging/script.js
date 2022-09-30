$(document).ready(function() {
    const type = [
        'name',
        'email',
        'wa',
    ];

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

    $(".date").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
    });

    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: `/messaging/list`,
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false,
            },
            { data: "name", name: "name"},
            { data: "email", name: "email"},
            { data: "wa", name: "wa"},
            { data: "created_at", name: "created_at"},
            {
                data: "Actions",
                name: "Actions",
                orderable: false,
                serachable: false,
                sClass: "text-center",
            },
        ],
        initComplete: function () {
            
            this.api()
                .columns()
                .every(function () {
                    var that = this;
                    $("input", this.footer()).on(
                        "keyup change clear",
                        function () {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        }
                    );
                });

            $('#loader-wrapper').hide();
        },
    });

    $("#dataTable tfoot .search").each(function (i) {
        $(this).html(`<input 
                type="text" 
                data-type="${type[i]}" 
                class="autocomplete_f text-sm form-control" 
                placeholder="Search ${type[i].replace("_", " ").toUpperCase()}"
        />`);
    });

    $(document).on("focus", ".autocomplete_f", function () {
        let type = $(this).data("type");

        $(this).autocomplete({
            minLength: 1,
            max: 10,
            scroll: true,
            source: function (request, response) {
                $.ajax({
                    url: `/messaging/search`,
                    dataType: "JSON",
                    data: {
                        keyword: request.term,
                        type: type,
                    },
                    beforeSend : function () {
                        $('#loader-wrapper').show();
                    },
                    complete: function() {
                        $('#loader-wrapper').hide();
                    },
                    success: function (data) {
                
                        let array = [];
                        let index = 0;

                        $.map(data, function (item) {
                            array[index++] = item[type].toString();
                        });

                        response(array);
                    },
                    error: function (err) {
                        response(["Tidak Ditemukan di Database"]);
                    },
                })
            }
        });
    });

    $('tbody').on('click', '.show', function() {
        let id = $(this).attr("data");

        $.ajax({
            url: `/messaging/show/${id}`,
            method: 'GET',
            dataType: 'JSON',
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
                    $('.modal-title').html(`Pesan dari ${data.success.name}`)
                    $('#name').val(data.success.name)
                    $('#email').val(data.success.email)
                    $('#wa').val(data.success.wa)
                    $('#msg').text(data.success.msg)

                    // $('#sendWa').attr("data", data.success.wa)
                    // $('#msg').text(data.success.msg)

                    $('#modal_form').modal('show')
                } else if (data.Nfound) {
                    Swal.fire("Deleted!", data.Nfound, "success");
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
            },
        })
    });

    $('tbody').on('click', '.sendWa',  function() {
        let nomerWa = $(this).attr("data")

        Swal.fire({
            title: "Membalas Pesan",
            text: "Tuliskan Pesan Anda",
            input: 'text',
            showCancelButton: true        
        }).then((result) => {
            if (result.value) {
                let win = window.open(`https://api.whatsapp.com/send?phone=${nomerWa}&text=${result.value}`, '_blank');
                    if (win) {
                        
                        win.focus();
                    } else {
                        
                        alert('Please allow popups for this website');
                    }
            }
        });
    });

    $("tbody").on("click", ".delete", function () {
        let id = $(this).attr("data");

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
                    url:  `/messaging/delete/${id}`,
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
    });    
});