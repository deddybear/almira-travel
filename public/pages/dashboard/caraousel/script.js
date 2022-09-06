$(document).ready(function() {

    const type = [
        'name'
    ];

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    window.changeNameFile = function (index) {

        let inputField = document.getElementById(`photo_${index}`);
        let labelFile = document.getElementById(`labelFile_${index}`);

        if (inputField.value == "") {
            labelFile.innerHTML = "Choose file";
        } else {
            let theSplit = inputField.value.split('\\');
            labelFile.innerHTML = theSplit[theSplit.length-1];
        }
    }

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
    
    function domModal(textTitle, textConfrim, textClose) {
        $('.modal-title').html(textTitle)
        $('#btn-confrim').html(textConfrim)
        $('#btn-cancel').html(textClose)
    }

    $(".date").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
    });

    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: `/caraousel/list`,
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false,
            },
            { data: "path", name: "path"
            },
            { data: "created_at", name: "created_at"},
            { data: "updated_at", name: "updated_at"},
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
            minLength: 3,
            max: 10,
            scroll: true,
            source: function (request, response) {
                $.ajax({
                    url: `/caraousel/search`,
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
                            array[index++] = item[type];
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

    //DOM Modal add data func
    $('#add').click(function() {
        $("#form")[0].reset();
        domModal('Menambahkan Gambar Caraousel', 'Simpan & Tambah Post', 'Batalkan')
        method = "POST";
    });

    //DOM Modal edit data func
    $('tbody').on('click', '.edit', function() {
        method = "PATCH";
        $("#form")[0].reset();
        id = $(this).attr('data');

        domModal('Edit Gambar Caraousel', 'Simpan & Edit Post', 'Batalkan');
        $('#modal_form').modal('show')
    });

    //adding post // edit post func ajax
    $('#form').on('submit', function (e) {
        e.preventDefault();
        let dataForm = new FormData($('#form')[0]);
        
        if (method == "POST") {
            url = `/caraousel/create`;
        } else if (method == "PATCH") {
            url = `/caraousel/update/${id}`;
            dataForm.append('_method', method)
        }
        


        $.ajax({
            url: url,
            method: "POST",
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
                    location.reload();
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
    })

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
                    url:  `/caraousel/delete/${id}`,
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