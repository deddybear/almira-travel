$(document).ready(function() {
    let method;

    const type = [
        'name',
    ];

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    //file form upload

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

    $('#adding_photo').click(function() {
        if (countField < 3) {
            $('#field_photo').append(`
            <div class="form-group row uploadFields">
                <input type="hidden" name="banyakFoto[]">
                <label for="photo_${countField}" class="col-12">File input</label>                
                    <div class="input-group col-10">
                        <div class="custom-file">
                            <input required type="file" class="custom-file-input form-control" id="photo_${countField}" name="photo[]" onchange="changeNameFile(${countField})">
                            <label class="custom-file-label" id="labelFile_${countField}" for="photo_${countField}">Choose file</label>
                        </div>
                     </div>
                <a href="javascript:void(0);" class="btn btm-sm btn-danger del-field"> <i class="text-white fa-solid fa-trash-can"></i></a>
            </div>
            `);
            $('.del-field').click(function() {
                $(this).parent().remove();
                if (countField > 0) {
                    countField = countField - 1;
                }
                
            });
            countField = countField + 1;
    
        }
    });

    $(".date").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
    });

    function domModal(textTitle, textConfrim, textClose) {
        $('.modal-title').html(textTitle)
        $('#btn-confrim').html(textConfrim)
        $('#btn-cancel').html(textClose)
    }

    function clearFieldUpload() {
        $('.uploadFields').remove();
        countField = 0;
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

    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: `/gallery/list`,
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false,
            },
            { data: "name", name: "name"},
            { data: "desc", name: "desc"},
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
            minLength: 1,
            max: 10,
            scroll: true,
            source: function (request, response) {
                $.ajax({
                    url: `/gallery/search`,
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

    //DOM Modal add data func
    $('#add').click(function() {
        clearFieldUpload();
        $("#form")[0].reset();
        domModal('Menambahkan Post Gallery', 'Simpan & Tambah Post', 'Batalkan')
        method = "POST";
    });

    //adding post // edit post func ajax
    $('#form').on('submit', function (e) {
        e.preventDefault();
        let dataForm = new FormData($('#form')[0]);

        $('#modal_form').modal('show')

        if (method == "POST") {
            url = `/gallery/create`;
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
                    url:  `/gallery/delete/${id}`,
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
})