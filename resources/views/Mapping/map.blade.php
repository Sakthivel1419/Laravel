@extends('home')

@section('home-content')
<style>
 
 /* #unorder li{
border: solid 1px black;
margin-bottom: 10px;
padding: 0px;
list-style-type: none;
 }

 ul {
    padding: 0px;
    margin: 0px;
 }

 h1 {
    margin-bottom: 20px;
 }

 .card-body {
    flex:0 0 auto;
    min-height: 1px;
    padding: 1rem;
} */

 
 /* .box {
        border: 3px solid rgb(22, 20, 20);
        background-color: rgb(248, 246, 245);
        border-radius: .2em;
        padding: 10px;
        cursor: move;
    } */

/* .company {
    border: 3px solid lightgrey;
    font-size: 25px;
    background-color: white;
    width: 250px;
    padding: 10px;
    display: inline-table;
    max-width: 25%;
}

#company_list li{
    font-size: 20px;

 }

.divUser {
    margin-left: 50px;
} */
</style>

<div>
    <div class="row">
        <div class="col-4 company">
            <h1>Company</h1>
            @foreach ( $com as $company )
                <ul id="company_list" class="company_drag">
                    <li data-company_id ="{{ $company->id }}" name="company_id">{{ $company->name }} </li>    
                </ul>
            @endforeach
        </div>
    
        <div class="col-8 divUser">
            <h1>User</h1>
            <div class="row">
                @foreach($users as $user)    
                    <div class="col-7 col-lg-6" style="display: block;">
                        {{-- <div class="card"> --}}
                            {{-- <div class="card-header"> --}}
                                {{-- <h5 class="card-title text-center">{{$user->name}}</h5> --}}
                            {{-- </div> --}}
                            <strong class="mb-1 clearfix d-block">{{ $user->name}}</strong>
                                {{-- @foreach($map as $data)
                                    @if($user->id == $data->user_id)
                                    <li class="card-body">{{ $data['company']['name'] }}</li>
                                    @endif                                    
                                @endforeach --}}
                            {{-- <ul class="users_company_list" data-user_id="{{ $user->id }}">
                                <li data-company_id ="{{ $company->id }}" name="company_id">{{ $company->name }} 
                                    <div class="media-body">

                                    </div>
                                </li>    
                            </ul> --}}
                        </div>
                        <br><br>
                    </div>
                @endforeach

                <div>
                    <button id="saveCompanyDetails" onclick="myFunction()" value="Submit" type="submit" class="btn btn-sm btn-success">
                    <i class="fas fa-check mr-2"></i>Save</button>
                </div>
            </div> 
        </div>
    </div>
</div>

{{-- <div>
    <div class="row">
        <div class="col-4 company">
            <h1>Company</h1>
            @foreach ( $com as $company )
                <ul id="company_list" class="company_drag">
                    <li data-company_id ="{{ $company->id }}" name="company_id">{{ $company->name }} </li>    
                </ul>
            @endforeach
        </div>
    
        <div class="col-8 divUser">
            <h1>User</h1>
            <div class="row">
                @foreach($users as $user)    
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title text-center">{{$user->name}}</h5>
                            </div>
                                @foreach($map as $data)
                                    @if($user->id == $data->user_id)
                                    <li class="card-body">{{ $data['company']['name'] }}</li>
                                    @endif                                    
                                @endforeach
                            <ul class="users_company_list" data-user_id="{{ $user->id }}">
                                <div class="card-body userCompany"></div>
                            </ul>
                        </div>
                        <br><br>
                    </div>
                @endforeach

                <div>
                    <button id="saveCompanyDetails" onclick="myFunction()" value="Submit" type="submit" class="btn btn-sm btn-success">
                    <i class="fas fa-check mr-2"></i>Save</button>
                </div>
            </div> 
        </div>
    </div>
</div> --}}




{{-- <div>
    <div class="row">
        <div class="col-4" id="unorder" >
            <h1>Company List</h1>
                @foreach ($com as $company )
                    <ul class="drag-able">
                        <li class="box col-6 ui-state-default text-center" data-company_id ="{{ $company->id }}" name="company_id">{{ $company->name }} </li>
                    </ul>
                @endforeach                          
        </div>
        
        <div class="col-8">
            
            <h1>User List</h1>
                <div class="row">
                    @foreach($users as $user)    
                        <div class="col-sm-4">
                            <div class="card" >
                                <div class="card-header">
                                    <h5 class="card-title ui-state-highlight text-center">{{$user->name}}</h5>
                                </div>
                                <ul class="users_company_list" data-user_id="{{ $user->id }}">
                                   
                                    @foreach($map as $data)
                                    @if($user->id == $data->user_id)
                                    <div class="media-body">{{ $data['company']['name'] }}</div>
                                    @endif                                    
                                    @endforeach

                                    <div class="card-body drop-able" id="unorder1"></div>
                                </ul>  
                            </div>
                            <br>
                        </div>
                    @endforeach
                </div>

                <br><br><br>
                    <div>
                        <button id="saveCompanyDetails" onclick="myFunction()" value="Submit" type="submit" class="btn btn-sm btn-success">
                        <i class="fas fa-check mr-2"></i>Save</button>
                    </div>
                </div>
        </div>
    </div>
</div> --}}



<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>

// $(document).ready(function () {
    
// });

function myFunction() {
    var userIdArr = new Array();
    var companyIdArr = [];
    var i=0;

    $('.users_company_list').each(function() {
        var userId = $(this).data('user_id');
        console.log(userId);


        $(this).find("li").each(function () {
            companyIdArr[i] = $(this).data('company_id');
            i++
        });
        userIdArr[userId] = companyIdArr;
        companyIdArr = [], i=0;
    });
    console.log(userIdArr);


    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ route ('mapping_store') }}",
        type: 'POST',
        data: {
            'userIdArr' : userIdArr
        },
        success: function(result) {
            location.reload();
            console.log('date updated');
        }
    });
}

$('.company_drag li').draggable({
        appendTo: "body",
        cursor: "move",
        helper : 'clone',
        revert: true,
        revertDuration: 0

});

$('.userCompany').droppable({
    drop : function (event, ui) {
        $(this).append(ui.draggable.clone()).children().appendTo(this);

    }
});
// $(".drag-able").draggable({
//   appendTo: "body",
//   cursor: "move",
//   helper: "clone",
//   revert: true,
//   revertDuration: 0
// });

// $(".drop-able").droppable({
    
//   tolerance: 'pointer',
//   drop: function(event, ui) {
//     $(this).append(ui.draggable.clone()).children().appendTo(this);

//   },
// });
  
</script>


@endsection