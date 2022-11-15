@extends('home')

@section('home-content')
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



<table class="table table-striped">
        <thead>
            <tr>
                <th class="border-bottom" width="6%">S.No</th>
                <th class="border-bottom" width="16%">User Name </th>
                <th class="border-bottom" width="16%">Email</th>
                {{-- <th class="border-bottom" width="16%">Password</th> --}}
                {{-- <th class="border-bottom" width="6%">Action</th> --}}
            </tr>
        </thead>
        <tbody id="records">
            @foreach ($user as $key => $data)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    {{-- <td>{{ $data->password }}</td> --}}
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
                <form  action="{{ url('/user_store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-10">
                            <label class="mb-0">Name <span class="text-danger">*</span></label>
                            <input type="text" id="user_name" name="name"  value="" class="form-control form-control-sm"  />
                            <span id="company_name_error" class="invalid"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-10">
                            <label class="mb-0">Email <span class="text-danger">*</span></label>
                            <input type="text" id="email_add" name="email"  value="" class="form-control form-control-sm"/>
                            <span id="email_error" class="invalid" style="font-weight: bold;"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-10">
                            <label class="mb-0">Password <span class="text-danger">*</span></label>
                            <input type="text" id="pass" name="password"  value="" class="form-control form-control-sm"/>
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


<script src="{{asset('js/views/users.js')}}"></script>


@endsection