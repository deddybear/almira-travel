$(document).ready(function() {
    let countField = 0;

    ClassicEditor
    .create( document.querySelector( '#ckeditor' ) )
    .catch( error => {
        console.error( error );
    });    

    $('#adding_photo').click(function() {
        console.log(countField);

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
            console.log(countField);
        }
    });

});