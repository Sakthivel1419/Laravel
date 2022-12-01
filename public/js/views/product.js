$('#newProductClick').click(function (){
    $('#addNewProduct').modal('show');
});
$('#editProductDetails').click(function () {
    $('#editProduct').modal('show');

});

$('.cancelEditNewProduct').click(function (){
    $('#editProduct').modal('hide');
    // $('#addNewProduct').find("input[type=text],select").val("");
    $("label.error").hide();

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

function editProductInfo(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/product.edit/" + id,
        type: 'get',
        success: function(response) {
            $("#updateProductForm #id").val(response.products.id);
            $("#updateProductForm #edit_product").val(response.products.name);
            $("#updateProductForm #edit_price").val(response.products.price);
            $("#updateProductForm #edit_quantity").val(response.products.quantity);
            $("#updateProductForm #edit_company").val(response.products.company_id);
            $('#editProduct').modal('show');

        }
    });
}

$(function(){
    $("#updateProductForm").validate({
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
    $('#updateProductDetails').click(function() {
        $isValid = $('#updateProductForm').valid();

        if($isValid) {
            var myform = $('#updateProductForm');
            var formData = myform.serialize();
    
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "product.update/{id}",
                type: 'POST',
                data: formData,
                success: function(result){
                    $('#updateProductForm').find('input[type=text],select').val('');
                    $('.invalid').text('');
                    location.reload();
                    console.log('date updated');
                }
            });
        }
        
    });
});

function deleteProductInfo(id) {
    var result = confirm("Are you sure you want to delete ?");
    if (result) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'product.delete/'+id,
            type: 'DELETE',
            success: function() {
                location.reload();
                console.log("deleted");
            }
        });
    }
    
};





