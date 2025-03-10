$('.mansory-tour-private').masonry({
    // options
    itemSelector: '.mansory-tour-private-item'
});

document.addEventListener("DOMContentLoaded", function () {
    var grid = document.querySelector('.test-row');
    var masonry = new Masonry(grid, {
        itemSelector: '.grid-item',
        percentPosition: true
    });
});