$('#newUserClick').click(function() {
    $('#addNewUser').modal('show');
});

$(".cancelAddNewUser").click(function() {
    $('#addNewUser').modal('hide');
    $('#addNewUser').find("input[type=text],input[type=email],input[type=password]").val("");
    $("label.error").hide();
});

$(document).ready(function() {
    $("#userForm").validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,   
            },
            password: {
                required: true,   
            }
            
        },
        messages: {
            name: {
                required: "Customer name is required",
            },
            email: {
                required: "Email is required",
            },
            password: {
                required: "Password is required",
            }
        }
    
    });
});