$(document).ready(function() {
    let countField = 0;
    let fieldeditor;
    let toolbars = ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', "indent", 'outdent', '|', 'blockQuote', 'insertTable', 'undo', 'redo'];
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    ClassicEditor
    .create( document.querySelector( '#detail' ), {
        toolbar: toolbars
    })
    .then(editor => {
        fieldeditor = editor;
    })
    .catch( error => {
        console.error( error );
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

    function formatNumber(number) {

        let number_string = number.replace(/[^,\d]/g, ''),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return rupiah;

    }

    $('input[name="price"], input[name="cc"], input[name="kursi"]').on("keyup change" , function() {
       this.value = formatNumber(this.value);
    })


    $('.custom-control-input').change(function (e){
        // alert($(this).val())
        if ($(this).val() == 1) { // pilih angka
            console.log('ini 1');
            
            $('#price_nominal').prop('disabled', false)
            $('#price_char').prop('disabled', true)
        } else { // pilih huruf
            console.log('ini 2');
            $('#price_nominal').prop('disabled', true)
            $('#price_char').prop('disabled', false)
        }
    });


    $('#adding_photo').click(function() {
        let countField = $("#field_photo").children().length;
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

            });

    
        }
    });

    function CKupdate() {
        fieldeditor.setData('');
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

    function domModal(textTitle, textConfrim, textClose) {
        $('.modal-title').html(textTitle)
        $('#btn-confrim').html(textConfrim)
        $('#btn-cancel').html(textClose)
    }

    const idrFormatter = new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0,
    });

    const type = [
        'name',
        'tipe_mobil',
        'kursi',
        'cc'
    ];

    $(".date").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
    });

    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: `/mobil/list`,
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false,
            },
            { data: "name", name: "name"},
            { 
                data: function (row) {
                    return idrFormatter.format(row.price)
                }, 
                name: "price"
            },
            { 
                data: function (row) {
                    return row.price_string ?? "-"
                }, 
                name: "price_string"
            },
            { 
                data: function (row) {
                    return row.using_price == 1 ? 'Angka' : 'Huruf'
                }, 
                name: "using_price"
            },
            { data: "tipe_mobil", name: "tipe_mobil"},
            { data: "kursi", name: "kursi"},
            { data: "cc", name: "cc"},
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
                    url: `/mobil/search`,
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
        CKupdate();
        clearFieldUpload();
        indexTab = 0;
        $("#form")[0].reset();
        $(`.custom-control-input`).attr('checked', false)
        $(`.price`).attr('disabled', true)
        domModal('Menambahkan Post Sewa Mobil', 'Simpan & Tambah Post', 'Batalkan')
        method = "POST";
    });

    //DOM Modal edit data func
    $('tbody').on('click', '.edit', function() {
        method = "PATCH";
        CKupdate();
        clearFieldUpload();
        indexTab = 0;
        $("#form")[0].reset();
        $(`.price`).attr('disabled', true)
        id = $(this).attr('data');

        $.ajax({
            url: `/mobil/get-data/${id}`,
            method: "GET",
            dataType: "JSON",
            processData: false,
            contentType: false,
            beforeSend : function () {
                $('#loader-wrapper').show();
            },
            complete: function() {
                $('#loader-wrapper').hide();
            },
            success: function (data) {

                
               for (const key in data) {

                if (key == 'detail' ) { // untuk textarea ckeditor
                    fieldeditor.setData(data[key])

                } else if (key == 'using_price') {
                    $(`#customRadio-${data[key]}`).attr('checked', true)
                    $(`.price-${data[key]}`).attr('disabled', false)
                } else {
                    $(`[name="${key}"]`).val(data[key])
                }



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


        domModal('Edit Post Sewa Mobil', 'Simpan & Edit Post', 'Batalkan');
        $('#modal_form').modal('show')
    });

        //adding post // edit post func ajax
        $('#form').on('submit', function (e) {
            e.preventDefault();
            let dataForm = new FormData($('#form')[0]);
            
    
            $('#modal_form').modal('show')
            if (method == "POST") {
                url = `/mobil/create`;
            } else if (method == "PATCH") {
                url = `/mobil/update/${id}`;
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
                        url:  `/mobil/delete/${id}`,
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