@extends('home')

@section('home-content')

<style>
    label.error {
        color: red;
        font-size: 14px;
    }
    .echo {
        color: red;
    }
</style>

<h5 class="mb-2">Product List</h5>
<div class="row mb-1">
    <div class="col-sm-5">
    </div>
    @if(Auth::user()->role==1)
    <div class="col-sm-12 d-flex align-items-center justify-content-end">
        <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#addNewProduct" id="newProductClick">
            <i class="fas fa-plus mr-2"></i>New Product
        </button>
    </div>
    @endif
</div>

<table class="table">
    <thead>
        <tr>
            <th class="border-bottom" width="11%">S.No</th>
            <th class="border-bottom" width="16%">Product Name </th>
            <th class="border-bottom" width="16%">Company Name </th>
            <th class="border-bottom" width="16%">Price</th>
            <th class="border-bottom" width="16%">Qty</th>
            <th class="border-bottom" width="16%">Action</th>
        </tr>
    </thead>
    <tbody id="records">
        @foreach ($product as $key => $data)
           <tr class="<?php echo $data->deleted_at == null ? '': 'text-danger'?>">
                <td>{{ $key+1 }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->company_name }}</td>
                <td>${{ number_format($data->price, 2) }}</td>
                <td>{{ $data->quantity }}</td>
                <td>
                    <button id="editProductDetails" onclick="editProductInfo({{ $data->id }})" value="Submit" type="submit" class="btn btn-sm btn-primary">
                   Edit</button>
                </td>
                <td>
                    <button id="deleteProductDetails" onclick="deleteProductInfo({{ $data->id }})" value="Submit" type="submit" class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<br>


<div class="modal fade" id="addNewProduct" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg-5">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h5 class="mb-0">Add Product</h5>
                <button class="btn btn-sm btn-light btn-close cancelAddNewProduct" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div id="success" class="text-center justify-align-center alert alert-success alert-dismissible d-none" role="alert"></div>
                <form  action="{{ url('/product_store') }}" method="POST" id="productForm">
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-10">
                            <label class="mb-0">Product Name <span class="text-danger">*</span></label>
                            <input type="text" id="product" name="name"  value="" class="form-control form-control-sm"  />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-10">
                            <label class="mb-0">Price <span class="text-danger">*</span></label>
                            <input type="text" id="price" name="price"  value="" class="form-control form-control-sm"  />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-10">
                            <label class="mb-0">Quantity <span class="text-danger">*</span></label>
                            <input type="text" id="quantity" name="quantity"  value="" class="form-control form-control-sm"  />
                        </div>
                    </div>
                    @if(Auth::user()->role == 1)
                    <div class="row">
                            <div class="form-group col-sm-10">
                                <label class="mb-0">Company <span class="text-danger">*</span></label>
                                <select id="company-id" name="company_id" class="form-control form-control-sm form-select">
                                    <option value="">--Select Company--</option>
                                    @foreach ($company as $data )
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    @endif

                    <div class="modal-footer">
                        <button id="saveProductDetails" value="Submit"  type="submit" class="btn btn-sm btn-success">
                            <i class="fas fa-check mr-2"></i>Add</button>
                    </div>
        
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editProduct" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg-5">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h5 class="mb-0">Edit Product</h5>
                <button class="btn btn-sm btn-light btn-close cancelEditNewProduct" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div id="success" class="text-center justify-align-center alert alert-success alert-dismissible d-none" role="alert"></div>
                <form  name="updateProductForm" id="updateProductForm">
                    @csrf
                    <input type="hidden" name="id" id="id" value="">
                    <div class="row">
                        <div class="form-group col-sm-10">
                            <label class="mb-0">Product Name <span class="text-danger">*</span></label>
                            <input type="text" id="edit_product" name="name"  value="" class="form-control form-control-sm"/>
                            <span id="product_name_error" class="invalid"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-10">
                            <label class="mb-0">Price <span class="text-danger">*</span></label>
                            <input type="text" id="edit_price" name="price"  value="" class="form-control form-control-sm"/>
                            <span id="product_price_error" class="invalid"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-10">
                            <label class="mb-0">Quantity <span class="text-danger">*</span></label>
                            <input type="text" id="edit_quantity" name="quantity"  value="" class="form-control form-control-sm"/>
                            <span id="product_quantity_error" class="invalid"></span>
                        </div>
                    </div>
                    @if(Auth::user()->role == 1)
                    <div class="row">
                        <div class="form-group col-sm-10">
                            <label class="mb-0">Company <span class="text-danger">*</span></label>
                            <select id="edit_company" name="company_id" class="form-control form-control-sm form-select">
                                <option value="">--Select Company--</option>
                                @foreach ($company as $data )
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                            <span id="company_id_error" class="invalid"></span>
                        </div>
                    </div>
                    @endif
                </form>
                <div class="modal-footer">
                    <button id="updateProductDetails" value="Submit"  type="submit" class="btn btn-sm btn-success">
                    <i class="fas fa-check mr-2"></i>Update</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('js/views/product.js')}}"></script>


@endsection