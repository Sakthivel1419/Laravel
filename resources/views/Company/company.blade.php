@extends('home')

@section('home-content')
<h5 class="mb-2">Company List</h5>
<div class="row mb-1">
    <div class="col-sm-5">
    </div>
    @if(Auth::user()->role==1)
    <div class="col-sm-12 d-flex align-items-center justify-content-end">
        <button class="btn btn-sm btn-info pull-right" data-toggle="modal" data-target="#addNewCompany" id="newcompanyClick">
            <i class="fas fa-plus mr-2"></i>New Company
        </button>
    </div>
    @endif
</div>

{{-- <div class="table-wrapper" id="customers_list">
    @include('Company.company_list')
</div> --}}

<table class="table table-striped">
        <thead>
            <tr>
                <th class="border-bottom" width="6%">S.No</th>
                <th class="border-bottom" width="16%">Company Name </th>
                <th class="border-bottom" width="16%">No.Of.Emp</th>
                {{-- <th class="border-bottom" width="6%">Action</th> --}}
            </tr>
        </thead>
        <tbody id="records">
            @foreach ($company as $key => $data)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $data->name }}</td>
                    @if($data->no_of_emp == 1)
                    <td>1 to 10</td>
                    @elseif ($data->no_of_emp == 2)
                    <td>10 to 100</td>
                    @elseif ($data->no_of_emp == 3)
                    <td>100 to 500</td>
                    @else
                    <td>above 500</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
</table>
    <br>

<div class="modal fade" id="addNewCompany" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg-5">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h5 class="mb-0">Add Company</h5>
                <button class="btn btn-sm btn-light btn-close cancelAddNewCompany" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div id="success" class="text-center justify-align-center alert alert-success alert-dismissible d-none" role="alert"></div>
                {{-- <form  id="companyInfo" name="companyInfo"> --}}
                <form  action="{{ url('/store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-10">
                            <label class="mb-0">Company Name <span class="text-danger">*</span></label>
                            <input type="text" id="com_name" name="name"  value="" class="form-control form-control-sm"  />
                            <span id="company_name_error" class="invalid"></span>
                        </div>
                    </div>
                    <div class="row">
                            <div class="form-group col-sm-10">
                                <label class="mb-0">No.Of.emp <span class="text-danger">*</span></label>
                                <select id="no_of_emp" name="no_of_emp" class="form-control form-control-sm form-select">
                                    <option value="">--Select No.Of.Emp--</option>
                                    <option value="1">1 to 10</option>
                                    <option value="2">10 to 100</option>
                                    <option value="3">100 to 500</option>
                                    <option value="4">above 500</option>
                                </select>
                            </div>
                    </div>

                    <div class="modal-footer">
                        <button id="saveCompanyDetails" value="Submit"  type="submit" class="btn btn-sm btn-success">
                            <i class="fas fa-check mr-2"></i>Add</button>
                    </div>
        
                </form>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('js/views/company.js')}}"></script>


@endsection