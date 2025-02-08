/** function global in this page paket tour */

let limit = 0;
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
        url: "/sewa-mobil/get-list",
        method: "GET",
        dataType: "JSON",
        data: {
            limit: limit,
            offset: offset
        },
        success: function (data) {
            console.log(data);
            
            let html = ``;

            /** check jika data nya sebanyak < 10 maka sembunyikan tombol next dan back */

            if (data.length < 10) {
                $('#button-pagination').hide()
            }

            if (data.length > 0) {

                for (let index = 0; index < data.length; index++) {
                    html += `<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mt-2 card-car">`
                        html += `<a href="/tour/desc/{{ $item->slug }}" class="text-decoration-none">`
                            html += `<div class="card">`
                                html += `<span class="badge text-bg-dark"> ${data[index].tipe_mobil} </span>`
                                    if (data[index].photos.length > 0) {
                                        html += `<img src="/storage/images/${data[index].photos[0].path}" class="card-img-top img-card-list-cust" alt="card-1">`
                                    } else {
                                        html += `<img class="card-img-top" src="https://placehold.co/286x161?text=Soon...">`
                                    }
                                html += `<div class="card-body body-tour">`
                                    html += `<div class="row">`
                                        html += `<div class="col title-car">`
                                            html += `${data[index].name.slice(0, 10) + (data[index].name.length > 10 ? "..." : "")}`
                                        html += `</div>`
                                        html += `<div class="col">`
                                            html += `<div class="float-end desc-car rounded-4 px-2">`
                                            html += `<i class="fa-solid fa-users"></i> `
                                            html += `${data[index].kursi}`
                                        html += `</div>`
                                    html +=  `</div>`
                                html += `</div>`
                            html += `</div>`
                            html += `</div>` // ???
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

$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
    $('#formSearch').on('submit', function (e) {

        e.preventDefault();

        let dataForm = new FormData($('#formSearch')[0]);


        $.ajax({
            url: "/sewa-mobil/search-guest",
            method: "POST",
            dataType: "JSON",
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (data) {
                let html = ``;
                $('#button-pagination').hide()
                $('#list-data').html('')

                if (data.length > 0) {

                    for (let index = 0; index < data.length; index++) {
                        html += `<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mt-2 card-car">`
                            html += `<a href="/tour/desc/{{ $item->slug }}" class="text-decoration-none">`
                                html += `<div class="card">`
                                    html += `<span class="badge text-bg-dark"> ${data[index].tipe_mobil} </span>`
                                        if (data[index].photos.length > 0) {
                                            html += `<img src="/storage/images/${data[index].photos[0].path}" class="card-img-top img-card-list-cust" alt="card-1">`
                                        } else {
                                            html += `<img class="card-img-top" src="https://placehold.co/286x161?text=Soon...">`
                                        }
                                    html += `<div class="card-body body-tour">`
                                        html += `<div class="row">`
                                            html += `<div class="col title-car">`
                                                html += `${data[index].name.slice(0, 10) + (data[index].name.length > 10 ? "..." : "")}`
                                            html += `</div>`
                                            html += `<div class="col">`
                                                html += `<div class="float-end desc-car rounded-4 px-2">`
                                                html += `<i class="fa-solid fa-users"></i> `
                                                html += `${data[index].kursi}`
                                            html += `</div>`
                                        html +=  `</div>`
                                    html += `</div>`
                                html += `</div>`
                                html += `</div>` // ???
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
    $('#searchName, #searchLocation, #searchCategory').on("input change", function () {
        // console.log($('#searchCategory').val());

        let valueInputSearchCategory = $('#searchCategory').val().length
        // let valueInputSearchLocation = $('#searchLocation').val().length
        let valueInputSearchName = $('#searchName').val().length

        // console.log([valueInputSearchCategory, valueInputSearchLocation, valueInputSearchName])

        if (valueInputSearchCategory == 0 && valueInputSearchName == 0) {
            fetchData('first')
        }
    })
})