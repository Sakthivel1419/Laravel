@extends('home')

@section('home-content')

<style>
    ul { 
        list-style-type: none;
        margin: 0; 
        /* padding: 10;  */
        margin-bottom: 10px; 
    }
    li { 
        /* margin: 5px;  */
        /* padding: 5px;  */
        width: 150px;
        /* text-align: center;  */
    }
    .box {
        border: 3px solid rgb(22, 20, 20);
        background-color: rgb(248, 246, 245);
        border-radius: .5em;
        padding: 10px;
        cursor: move;
    }

    .box-user {
        border: 3px solid rgb(22, 20, 20);
        background-color: rgb(248, 246, 245);
        border-radius: .10em;
        padding: 10%;
    }

    #droppable {
        width: 150px;
        height: 150px;
        padding: 0.5em;
        float: center;
        margin: 10px
    }

    /* .card1 {
        box-shadow: black;
        transition: 0.3s;
        width: 20px;
        padding: 20px;
    } */
    /* .card1:hover {
        box-shadow: rgb(218, 19, 19);
    } */

    .card {
        box-shadow: black;
        transition: 0.3s;
        width: 10%;
        padding: 10%;
    }

    .card:hover {
        box-shadow: #ddd;
    }

    .container {
        /* padding: 2px 16px; */
    }

    .left {
        float: left;
        padding-left: 30px;

    }

    .right {
        float: right;
        padding-right: 300px;
    }

    #sortable {
        padding: 0px;
    }

    .vl {
        border-left: 6px solid green;
        height: 500px;
        position: absolute;
        left: 50%;
        margin-left: -3px;
        top: 0;
    }
    /* #cart {
        width: 200px;
        height: 400px;
        border: 2px solid black;
        float: center;
    } */

</style>
  

{{-- <ul>
    <li id="draggable" class="ui-state-highlight box draggable">Drag me down</li>
</ul> --}}
<div class="left">
<h3 class="mb-2" style="text-align: center; margin-bottom: 15px;">Company List</h3>
    <div class="card1">
        <div class="container d-flex flex-column">
            @foreach ($com as $company )

            <ul id="sortable">
                <li class="ui-state-default box draggable" style="text-align: top;" value="{{ $company->id }}">{{ $company->name }}</li>
            </ul>
            @endforeach

        </div>
    </div>
</div>

<div class="vl"></div>


<div class="right">
    <h3 class="mb-2">User List</h3>
    
    <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
    <div class="card1">
        @foreach ($users as $user )
        <div class="container">
            <ul id="sortable">
                <li class="ui-state-default box-user draggable" value="{{ $user->id }}">{{ $user->name }}</li>
            </ul>
        </div>
        @endforeach
    </div>
</div>












{{-- <div id="cart">
    <ul>
        @foreach ($users as $user)
        <h2>{{ $user->name }}</h2>
        <li class="ui-widget-content" id="droppable" style="text-align:center;" value="{{ $user->id }}">{{ $user->name }}</li>
        @endforeach
    </ul>
</div> --}}

{{-- <h2>Users List</h2>
@foreach ($users as $user )    
    <div class="card">
        <div class="container">
            <h5 value="{{ $user->id }}">{{ $user->name }}</h5>
        </div>
    </div>
@endforeach --}}




<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


<script>
    $( function() {
      $( "#sortable" ).sortable({
        revert: true
      });
      $( ".draggable" ).draggable({
        connectToSortable: "#sortable",
        helper: "clone",
        revert: "invalid"
      });
      $( "ul, li" ).disableSelection();
    });

    $( function() {
        $( "#resizable" ).resizable({
        // alsoResize: "#also"
        });
        // $( "#also" ).resizable();
    } );
</script>

{{-- <style>
    .container {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 10px;
    }

    .box {
        border: 3px solid #666;
        background-color: #ddd;
        border-radius: .5em;
        padding: 10px;
        cursor: move;
    }
</style> --}}

{{-- <div class="container">
    <ol>
        <li draggable="true" class="box">A</li>
        <li draggable="true" class="box">B</li>
        <li draggable="true" class="box">C</li>
    </ol>
</div> --}}

{{-- <div class="container">
    <div draggable="true" class="box">A</div>
    <div draggable="true" class="box">B</div>
    <div draggable="true" class="box">C</div>
</div> --}}
    
@endsection













<!-- <div class="col-8">
            
            <h1>sakthi</h1>
            <form  action="{{ url('/mapping_store') }}" method="POST">
            @csrf
                <div class="row">
                    @foreach($users as $user)    
                        <div class="col-sm-4">
                            <div class="card" >
                                <div class="card-header">
                                    <h5 class="card-title ui-state-highlight text-center" name="user_id" value="{{$user->id}}">{{$user->name}}</h5>
                                </div>
                                <div class="card-body drop-able" id="unorder1"></div>
                            </div>
                        </div>
                    @endforeach
                    <div>
                        <button id="saveCompanyDetails" value="Submit" type="submit" class="btn btn-sm btn-success">
                        <i class="fas fa-check mr-2"></i>Save</button>
                    </div>
                </div>
            </form>          
        </div> -->
















{{-- EXIST DATA --}}

$('.listUser').droppable({
    
    drop : function (event, ui) {
        var companyId = ui.draggable.data('company_id');
        var dropcomId = [];
        // var flag = false;
        var i=0;
        $(this).find('.list-group-item').each(function () {
            dropcomId[i] = $(this).data('company_id');
            i++;
        });
        // $("#checkId_"+userid).val(dropcomId.join(","));
        // empty =  $("#checkId_"+userid).val();


        var data =dropcomId.includes(companyId);

        
        // console.log(dropcomId);
        // console.log(data);

        // $(this).append(ui.draggable.clone()).children().appendTo(this);
        // console.log($(ui.draggable.data('company_id'))[0]);
        
        if (!data) {
            $(this).append(ui.draggable.clone()).children().appendTo(this);

            // dropcomId.push($(ui.draggable.data('company_id'))[0]);

            // $("#checkId_"+userid).val('');
            // $("#checkId_"+userid).val(dropcomId.join(","));
           
        }

        
        // console.log(dropcomId.join(","));
        //  console.log(empty);
        // console.log(userid);

    }
});
