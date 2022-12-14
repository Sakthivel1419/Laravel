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

$('#editCompanyDetails').click(function() {
    $('#editCompany').modal('show');
});

$(".cancelEditCompany").click(function() {
    $('#editCompany').modal('hide');
    // $('#addNewCompany').find("input[type=text],select").val("");
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


function editCompanyInfo(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/company/edit/" + id,
        type: 'get',
        success: function(response) {
            $("#updateCompanyForm #id").val(response.companies.id);
            $("#updateCompanyForm #edit_com_name").val(response.companies.name);
            $("#updateCompanyForm #edit_no_of_emp").val(response.companies.no_of_emp);
            $('#editCompany').modal('show');
        }
    });
}


$(function(){
    $("#updateCompanyForm").validate({
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
    $('#updateCompanyDetails').click(function() {

        $isValid = $('#updateCompanyForm').valid();
        if($isValid){
            var myform = $('#updateCompanyForm');
            var formData = myform.serialize();
    
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "company/update/{id}",
                type: 'POST',
                data: formData,
                success: function(result){
                    $('#updateCompanyForm').find("input[type=text],select").val("");
                    $('.invalid').text('');
                    location.reload();
                    console.log('date updated');
                }
            });
        }
        
    });
});

function deleteCompanyInfo(id) {
    var result = confirm("Are you sure you want to delete ?");
    if (result) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'company/delete/'+id,
            type: 'DELETE',
            success: function() {
                location.reload();
                console.log("deleted");
            }
        });
    }
    
};


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