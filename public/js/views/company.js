$(document).ready(function() {
    $("#newcompanyClick").click(function() {
        $('#addNewCompany').modal('show');
        $('.hover-filter').addClass('d-none');
    });


});

$(".cancelAddNewCompany").click(function() {
    $('#addNewCompany').modal('hide');
});