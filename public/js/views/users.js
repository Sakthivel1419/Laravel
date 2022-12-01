$('#newUserClick').click(function() {
    $('#addNewUser').modal('show');
});

$(".cancelAddNewUser").click(function() {
    $('#addNewUser').modal('hide');
    $('#addNewUser').find("input[type=text],input[type=email],input[type=password]").val("");
    $("label.error").hide();
});

$('#editUserDetails').click(function () {
    $('#editUser').modal('show');

});

$('.cancelEditUser').click(function (){
    $('#editUser').modal('hide');
    // $('#addNewProduct').find("input[type=text],select").val("");
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


function editUserInfo(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/user.edit/" + id,
        type: 'get',
        success: function(response) {
            $("#updateUserForm #id").val(response.users.id);
            $("#updateUserForm #edit_user_name").val(response.users.name);
            $("#updateUserForm #edit_email_add").val(response.users.email);
            $("#updateUserForm #edit_password").val(response.users.password);
            // $("#updateUserForm #edit_company").val(response.users.company_id);
            $('#editUser').modal('show');

        }
    });
}


function deleteUserInfo(id) {
    var result = confirm("Are you sure you want to delete ?");
    if (result) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'user/delete/'+id,
            type: 'DELETE',
            success: function() {
                location.reload();
                console.log("deleted");
            }
        });
    }
    
};