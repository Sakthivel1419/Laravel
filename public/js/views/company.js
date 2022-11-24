$(document).ready(function() {
    $("#newcompanyClick").click(function() {
        $('#addNewCompany').modal('show');
        $('.hover-filter').addClass('d-none');
    });


});

$(".cancelAddNewCompany").click(function() {
    $('#addNewCompany').modal('hide');
    $('#addNewCompany').find("input[type=text],select").val("");
    $("label.error").hide();
});

$(document).ready(function() {
    $("#companyInfo").validate({
        rules: {
            name: {
                required: true,
            },
            no_of_emp: {
                required: true,   
            }
            
        },
        messages: {
            name: {
                required: "Customer name is required",
            },
            no_of_emp: {
                required: "No_Of_Emp is required",
            }
        }
    
    });
});


// $("#companyInfo").on('click', function(e) {
//     console.log("test");
//     $("#companyInfo").validate({
//         rules: {
//             name: {
//                 required: true,
//                 // maxlength: 20,
//                 // lettersonly: true
//             },
//             no_of_emp: {
//                 required: true,
                
//             }
            
//         },
//         messages: {
//             name: {
//                 required: "Customer name is required",
//             },
//             no_of_emp: {
//                 required: "Email is required",
//             }
//         }
    
//     });
// });


// $('#saveCompanyDetails').click(function() {
//     $isValid = $('#companyInfo').valid();
//     if($isValid) {
//         var formData = $('#companyInfo').serialize();

//     }
// })