/** function global in this page travel */

let limit  = 0;
let offset = 0;

function fetchData(action) {

    if (action == 'next') {
        offset = offset + limit
    } else if (action == 'back') {
        offset = offset - limit

        if (offset < 0) {
            offset = 0
        }

    } else {
        limit = 10
        offset = 0
    }


    $.ajax({
        url: "/travel-reguler/get-list",
        method: "GET",
        dataType: "JSON",
        data: {
            limit: limit,
            offset: offset
        },
        success: function (data) {
            // console.log(data);
            
           let html = ``;

           /** check jika data nya sebanyak < 10 maka sembunyikan tombol next dan back */
            
           if (data.length < 10) {
                $('#button-pagination').hide()    
           }

           if (data.length > 0) {

                for (let index = 0; index < data.length; index++) {
                    html += `<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mt-2 card-tour">`
                        html += `<a href="/travel-reguler/desc/${data[index].slug}" class="text-decoration-none">`
                            html += `<div class="card p-1">`
                                html += `<span class="badge text-bg-dark"> ${data[index].category} </span>`
                                if (data[index].photos.length > 0) {
                                    html += `<img src="/storage/images/${data[index].photos[0].path}" class="img-card-list-cust rounded" alt="card-1">`
                                } else {
                                    html += `<img class="rounded" src="https://placehold.co/286x161?text=Soon...">`
                                }

                                html += `<div class="card-body body-tour">`
                                    html += `<div class="mb-2">`
                                        html += `${data[index].name.slice(0, 20) + (data[index].name.length > 20 ? "..." : "")}`
                                    html += `</div>`
                                    html += `<div class="rounded-2">`
                                        html += `Location : ${data[index].lokasi.slice(0, 10) + (data[index].lokasi.length > 10 ? "..." : "")}<sup><i class="fa-solid fa-location-dot"></i></sup>`
                                    html += `</div>`
                                    html += `<div class="row mt-2 gap-4">`
                                        html += `<div class="col-6 price pe-0 my-auto bg-blue-sea">`
                                            html += `<b style="font-weight: 600">${rupiah(data[index].price)}</b>/Day`
                                        html += `</div>`
                                        html += `<div class="col-4 btn-grad-custome my-auto" style="margin: 3px !important">Book Now</div>`
                                    html += `</div>`
                                html += `</div>`
                            html += `</div>`
                        html += `</a>`
                    html += `</div>`
                }

                $('#list-data').html(html)
           } else {
                $('#list-data').html(`
                     <h1 class="text-center">Coming Soon...</h1>
                `)
           }
            
        },
        error: function (res) {    
                        
            let text = ''; 
            
            if (res.status == 422) {
                for (const key in res.responseJSON.errors) {
                    text += message(res.responseJSON.errors[key]); 
                }
            } else {                    
                text += "Internal Server Error";
            }

            Swal.fire(
                'Whoops ada Kesalahan',
                `Error : <br> ${text}`,
                'error'
            )
        },
    })

}


$(document).ready( function() {

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

    /** awal pertama fetch set limit 10 dan offset 0 */
    fetchData('first');

        /** function search */
        $('#formSearch').on('submit', function(e) {

            e.preventDefault();
            
            let dataForm = new FormData($('#formSearch')[0]);
            
                
            $.ajax({
                url: "/travel-reguler/search-guest",
                method: "POST",
                dataType: "JSON",
                data: dataForm,
                processData: false,
                contentType: false,
                success: function (data) {
                    let html = ``;
                    $('#list-data').html('')
                    
                    if (data.length > 0) {
    
                        for (let index = 0; index < data.length; index++) {
                            html += `<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mt-2 card-tour">`
                                html += `<a href="/tour/desc/{{ $item->slug }}" class="text-decoration-none">`
                                    html += `<div class="card">`
                                        html += `<span class="badge text-bg-dark"> ${data[index].category} </span>`
                                        if (data[index].photos.length > 0) {
                                            html += `<img src="/storage/images/${data[index].photos[0].path}" class="card-img-top img-card-list-cust" alt="card-1">`
                                        } else {
                                            html += `<img class="card-img-top" src="https://placehold.co/286x161?text=Soon...">`
                                        }
        
                                        html += `<div class="card-body body-tour">`
                                            html += `<p class="mb-1 title-tour">${data[index].name.slice(0, 20) + (data[index].name.length > 20 ? "..." : "")}</p>`
                                            html += `<p class="mb-0 desc-tour">`
                                                html += `<i class="fa-solid fa-location-dot"></i> `
                                                html += data[index].lokasi.slice(0, 10) + (data[index].lokasi.length > 10 ? "..." : "")
                                            html += `</p>`
                                        html += `</div>`
                                    html += `</div>`
                                html += `</a>`
                            html += `</div>`
                        }
        
                        $('#list-data').html(html)
                        $('#button-pagination').hide()
                   } else {
                        $('#list-data').html(`
                             <h1 class="text-center">Coming Soon...</h1>
                        `)
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
    
        /** function jika 3 kolom search kosong maka realod ke data awal */
        $('#searchName, #searchLocation, #searchCategory').on("input change", function() {
            // console.log($('#searchCategory').val());
            
            let valueInputSearchLocation = $('#searchLocation').val().length
            let valueInputSearchName     = $('#searchName').val().length
            let valueInputSearchCategory = $('#searchCategory').val().length

            // console.log([valueInputSearchCategory, valueInputsearchLocation, valueInputSearchName])
    
            if (valueInputSearchLocation == 0 && valueInputSearchName == 0 && valueInputSearchCategory == 0) {
                fetchData('first')
            }
        })    
})