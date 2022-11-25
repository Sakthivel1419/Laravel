@extends('home')

@section('home-content')


<div class="workspace p-4" id="workspace" style="transition: all 0.3s ease 0s; transform: none; opacity: 1;">
    <link href="{{ asset('css/connected.list.css') }}" rel="stylesheet">
    <div class="card bg-white shadow-sm rounded border-0">
        <div class="card-body">
            <div class="card-body border-top">
                <div class="connected-list">
                    <div class="row">
                        <div class="col-6 col-xl-5">
                            <div class="row ">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="card bg-light border-0">
                                        <div class="card-body">
                                            <div class="mb-1" style="float:left;">
                                                <strong class="mb-1 d-block clearfix">Company List</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                            <ul id="clVerticals" class="verticals-sortable list-group connected-available ui-sortable">
                                @foreach( $com as $company)
                                <li class="list-group-item ui-sortable-handle liclass" data-company_id="{{ $company->id }}">
                                    <div class="media-body">{{ $company->name }}</div>
                                </li>
                                @endforeach  
                            </ul>
                        </div>
                        <div class="col-6 col-xl-7 connected-list-group">
                            <div class="row">
                                @foreach($users as $key =>  $user)

                                    <div class="col-7 col-lg-6" style="display: block">
                                        <strong class="mb-1 clearfix d-block">{{ $user->name }}</strong>

                                        <ul id="listUse" data-user_id="{{ $user->id }}" class="accounts_list list-group listUser connected-selected list-group-sm ui-sortable">
                                            
                                            @foreach($map as $key => $mapValue)
                                                @if($mapValue->user_id == $user->id)
                                                <li class="list-group-item ui-sortable-handle" data-company_id="{{ $mapValue->company_id }}">
                                                    {{ $mapValue['company']['name'] }}
                                                </li>
                                                @endif
                                            @endforeach

                                        </ul>
                                    </div> 
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <button id="saveCompanyDetails" onclick="myFunction()" value="Submit" type="submit" class="btn btn-sm btn-success" style="float: right;">
                            <i class="fas fa-check mr-2"></i>Save</button>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>



<script type="text/javascript">

$('.verticals-sortable li').draggable({
        appendTo: "body",
        helper : 'clone',
        revert: true,
        revertDuration: 0

});

$('.listUser').droppable({
    drop : function (event, ui) {
        $(this).append(ui.draggable.clone()).children().appendTo(this);

    }
});


function myFunction() {
    var userIdArr = new Array();
    var companyIdArr = [];
    var i=0;

    $('.listUser').each(function() {
        var userId = $(this).data('user_id');
        // console.log(userId);


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
            // location.reload();
            window.location.href = "/mapping";
            console.log('date updated');
        }
    });
}    
</script>

@endsection



