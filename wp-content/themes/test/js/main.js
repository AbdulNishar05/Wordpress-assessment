$(document).ready(function () {
    var $container = $('#isocontent');
    $container.isotope({})
    $('#filter-select').change(function () {
        $container.isotope({
            filter: this.value
        });
    });

});
