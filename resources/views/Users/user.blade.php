@extends('home')

@section('home-content')

<style>
    label.error {
        color: red;
        font-size: 14px;
    }
</style>

<h5 class="mb-2">User List</h5>
<div class="row mb-1">
    <div class="col-sm-5">
    </div>
    <div class="col-sm-12 d-flex align-items-center justify-content-end">
        <button class="btn btn-sm btn-info pull-right" data-toggle="modal" data-target="#addNewUser" id="newUserClick">
            <i class="fas fa-plus mr-2"></i>New User
        </button>
    </div>
</div>



<table class="table">
        <thead>
            <tr>
                <th class="border-bottom" width="6%">S.No</th>
                <th class="border-bottom" width="16%">User Name </th>
                <th class="border-bottom" width="16%">Email</th>
                {{-- <th class="border-bottom" width="16%">Password</th> --}}
                <th class="border-bottom" width="16%">Invite</th>
                <th class="border-bottom" width="16%">Action</th>
            </tr>
        </thead>
        <tbody id="records">
            @foreach ($user as $key => $data)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>
                        <form action="{{ url('invite/'.$data->id) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-info">Invite User</button>
                        </form>
                    </td>
                    {{-- <td>{{ $data->password }}</td> --}}
                    {{-- <td>
                        <button id="editUserDetails" onclick="editUserInfo({{ $data->id }})"  value="Submit" type="submit" class="btn btn-sm btn-primary">
                       Edit</button>
                    </td> --}}
                    <td>
                        <button id="deleteUserDetails" onclick="deleteUserInfo({{ $data->id }})" value="Submit" type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
</table>
    <br>

<div class="modal fade" id="addNewUser" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg-5">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h5 class="mb-0">Add User</h5>
                <button class="btn btn-sm btn-light btn-close cancelAddNewUser" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div id="success" class="text-center justify-align-center alert alert-success alert-dismissible d-none" role="alert"></div>
                {{-- <form  id="companyInfo" name="companyInfo"> --}}
                <form  action="{{ url('/user_store') }}" method="POST" id="userForm">
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-10">
                            <label class="mb-0">Name <span class="text-danger">*</span></label>
                            <input type="text" id="user_name" name="name" class="form-control form-control-sm"  />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-10">
                            <label class="mb-0">Email <span class="text-danger">*</span></label>
                            <input type="email" id="email_add" name="email" class="form-control form-control-sm" autocomplete="off"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-10">
                            <label class="mb-0">Password <span class="text-danger">*</span></label>
                            <input type="password" id="password" name="password" class="form-control form-control-sm" autocomplete="new-password"/>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button id="saveUserDetails" value="Submit"  type="submit" class="btn btn-sm btn-success">
                            <i class="fas fa-check mr-2"></i>Create</button>
                    </div>
        
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editUser" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg-5">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h5 class="mb-0">Edit User</h5>
                <button class="btn btn-sm btn-light btn-close cancelEditUser" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div id="success" class="text-center justify-align-center alert alert-success alert-dismissible d-none" role="alert"></div>
                <form  id="updateUserForm" name="updateUserForm">
                {{-- <form  action="{{ url('/user_store') }}" method="POST" id="userForm"> --}}
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-10">
                            <label class="mb-0">Name <span class="text-danger">*</span></label>
                            <input type="text" id="edit_user_name" name="name" class="form-control form-control-sm"  />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-10">
                            <label class="mb-0">Email <span class="text-danger">*</span></label>
                            <input type="email" id="edit_email_add" name="email" class="form-control form-control-sm" autocomplete="off"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-10">
                            <label class="mb-0">Password <span class="text-danger">*</span></label>
                            <input type="password" id="edit_password" name="password" class="form-control form-control-sm" autocomplete="new-password"/>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button id="updateUserDetails" value="Submit"  type="submit" class="btn btn-sm btn-success">
                        <i class="fas fa-check mr-2"></i>Update</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('js/views/users.js')}}"></script>


@endsection