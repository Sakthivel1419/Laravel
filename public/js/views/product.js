$('#newProductClick').click(function (){
    $('#addNewProduct').modal('show');
});


$('.cancelAddNewProduct').click(function (){
    $('#addNewProduct').modal('hide');
    $('#addNewProduct').find("input[type=text],select").val("");
    $("label.error").hide();

});


$(document).ready(function() {
    $("#productForm").validate({
        rules: {
            name: {
                required: true
            },
            price: {
                required: true   
            },
            quantity: {
                required: true   
            },
            company_id : {
                required: true   
            }
        },
        messages: {
            name: {
                required: "Customer name is required",
            },
            price: {
                required: "Price is required",
            },
            quantity: {
                required: "Quantity is required",
            },
            company_id: {
                required: "Company is required",
            }
        }
    
    });
});