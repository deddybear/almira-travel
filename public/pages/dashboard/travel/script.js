$(document).ready(function () {
    let listEditors = Array(3);
    let countField = 0;
    let toolbars = ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', "indent", 'outdent', '|', 'blockQuote', 'insertTable', 'undo', 'redo'];

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

    
      // disable all tabs
      $('[data-toggle=pill]').click(function () {
        return false;}
      ).addClass("text-muted");

     function validated(tab){
        tab.unbind('click').removeClass('text-muted').addClass('green');
      }

      //validate inputs on click of button
      $('.btn-ok').click(function(){
          
          let allValid = true;
          // get each input in this tab pane and validate
          $(this).parents('.tab-pane').find('.form-control').each(function(i, e){
              let textEditor = listEditors[i].getData();

              // some condition(s) to validate each input
              let len = $(e).val().length;
              if (len > 0 || textEditor){
                  // validation passed
                  allValid = true;
              } else {
                  // validation failed
                  allValid = false;
              }

          });

          if (allValid) {
              let tabIndex = $(this).parents('.tab-pane').index();
              validated($('[data-toggle=pill]').eq(tabIndex+1));
          }

      });

      // always validate first tab
      validated($('[data-toggle=pill]').eq(0));

      $('#adding_photo').click(function() {


        if (countField < 3) {

            $('#field_photo').append(`
            <div class="form-group row">
                <input type="hidden" name="banyakFoto[]">
                <label for="photo_${countField}" class="col-12">File input</label>                
                    <div class="input-group col-10">
                        <div class="custom-file">
                            <input required type="file" class="custom-file-input form-control" id="photo_${countField}" name="photo[]">
                            <label class="custom-file-label" for="photo_${countField}">Choose file</label>
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

      // form submit
      $( "#form" ).submit(function( event ) {
        console.log("Handler for .submit() called..");
        console.log( $( this ).serialize() );
        event.preventDefault();
      });
})