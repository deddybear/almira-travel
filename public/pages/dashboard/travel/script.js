$('[data-toggle=pill]').click(function () {
  return false;}
).addClass("text-muted");      

$(document).ready(function () {
    let listEditors = Array(3);
    let countField = 0;
    let indexTab = 0;
    let id;
    let toolbars = ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', "indent", 'outdent', '|', 'blockQuote', 'insertTable', 'undo', 'redo'];

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    document.querySelectorAll('.ckeditor').forEach(function (val, i) {
        ClassicEditor
          .create(val, {
            toolbar: toolbars,
          })
          .then(editor => {
            listEditors[i] = editor;
          })
          .catch(error => {
            console.error(error);
          });
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

        let number_string = number.replace(/[^,\d]/g, '').toString(),
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


    function CKupdate() {
      listEditors.forEach(element => {
          element.setData('');
      });
    }

    function validated(tab){
      tab.unbind('click').removeClass('text-muted').addClass('green');
    }

    function clearFieldUpload() {
      $('.uploadFields').remove();
      countField = 0;
    }

        // disable all tabs
    function mutedAllTabs() {
        $('[data-toggle=pill]').click(function () {
            return false; 
        }).removeClass('active').addClass("text-muted");
        $('[data-toggle=pill]').eq(0).unbind('click');
        $('[data-toggle=pill]').eq(0).removeClass('text-muted').addClass('active green');
        $('.tab-pane').removeClass('active show');
        $('#trip').addClass('active show');
    }

      //validate inputs on click of button
    $('.btn-ok').click(function(){
        
        let allValid = false;
        // get each input in this tab pane and validate
        $(this).parents('.tab-pane').find('.ckeditor').each(function(i, e){
            let textEditor = listEditors[indexTab].getData();
           
            // some condition(s) to validate each input
            let len = $(e).val().length;

            if (indexTab == 0) { //tab detail
              let nameTour = $('.name-travel').val().length;
              let priceTour = $('.price-travel').val().length;

              if (nameTour > 0 && priceTour > 0 && textEditor.length > 0) {
                  allValid = true;
              } else {
          
                  allValid = false;
              }
          } else {

              if (len > 0 || textEditor.length > 0) {  // validation texteditor passed
                  allValid = true;
                  indexTab = indexTab + 1 ;
              } else {  // validation texteditor failed
                 
                  allValid = false;
              }
          }

        });

        if (allValid) {
            let tabIndex = $(this).parents('.tab-pane').index();

            $('[data-toggle=pill]').eq(tabIndex).removeClass('active');
            $('[data-toggle=pill]').eq(tabIndex + 1).addClass('active');
            $('.tab-pane').eq(tabIndex).removeClass('active show');
            $('.tab-pane').eq(tabIndex + 1).addClass('active show');
            
            validated($('[data-toggle=pill]').eq(tabIndex+1));
        }
    });

    // always validate first tab
    validated($('[data-toggle=pill]').eq(0));

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
        'category',
        'lokasi',
        'price'
    ];

    $(".date").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
    });

    $('#dataTable').DataTable({
      processing: true,
      serverSide: true,
      ajax: `/travel/list`,
      columns: [
          {
              data: "DT_RowIndex",
              name: "DT_RowIndex",
              orderable: false,
              searchable: false,
          },
          { data: "name", name: "name"},
          { data: "category", name: "category"},
          { data: "lokasi", name: "lokasi"},
          { 
              data: function (row) {
                  return idrFormatter.format(row.price)
              }, 
              name: "price"},
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

  $('input[name="price"]').on("keyup change" , function() {
    this.value = formatNumber(this.value);
  })


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
                url: `/travel/search`,
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
        mutedAllTabs();
        CKupdate();
        clearFieldUpload();
        indexTab = 0;
        $("#form")[0].reset();
        domModal('Menambahkan Post Travel', 'Simpan & Tambah Post', 'Batalkan')
        method = "POST";
    });

    //DOM Modal edit data func
    $('tbody').on('click', '.edit', function() {
          method = "PATCH";
          mutedAllTabs();
          CKupdate();
          clearFieldUpload();
          indexTab = 0;
          $("#form")[0].reset();
          id = $(this).attr('data');
          
          domModal('Edit Post Travel', 'Simpan & Edit Post', 'Batalkan');
          $('#modal_form').modal('show')
    });

    //adding post // edit post func ajax
    $('#form').on('submit', function (e) {
          e.preventDefault();
          let dataForm = new FormData($('#form')[0]);

          $('#modal_form').modal('show')
          if (method == "POST") {
              url = `/travel/create`;
          } else if (method == "PATCH") {
              url = `/travel/update/${id}`;
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
  
      //delete func
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
                      url:  `/travel/delete/${id}`,
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