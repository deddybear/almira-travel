$(document).ready( function(){
    
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
    
    function fetchData(limit, offset) {

        let reqLimit = limit ?? 10
        let reqOffset = offset ?? 0

        $.ajax({
            url: "/paket-tour/get-list",
            method: "GET",
            dataType: "JSON",
            data: {
                limit: reqLimit,
                offset: reqOffset
            },
            success: function (data) {
         
                console.log(data);
                
            },
            error: function (res) {                
                let text = ''; 
                
                if (res.status == 500) {
                    console.log(res.responseJSON.message);
                    
                    text += "Internal Server Error";
                } else {
                    for (const key in res.responseJSON.errors) {
                        text += message(res.responseJSON.errors[key]); 
                    }
                }

                Swal.fire(
                    'Whoops ada Kesalahan',
                    `Error : <br> ${text}`,
                    'error'
                )
            },
        })
    }

    fetchData();

    $('#formSearch').on('submit', function(e) {

        e.preventDefault();
        
        let dataForm = new FormData($('#formSearch')[0]);
        
            
        $.ajax({
            url: "/paket-tour/search-guest",
            method: "POST",
            dataType: "JSON",
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (data) {
         
                console.log(data);
                
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

    $('#searchName, #searchLocation, #searchCategory').on("input change", function() {
        if ($('#searchName, #searchLocation, #searchCategory').val().length == 0) {
            $.ajax({
                url: "/paket-tour/search-guest",
                method: "GET",
                dataType: "JSON",
                data: dataForm,
                processData: false,
                contentType: false,
                success: function (data) {
             
                    console.log(data);
                    
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
        }
    })    
});