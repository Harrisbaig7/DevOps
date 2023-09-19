@extends('layouts.adminlayout')

@section('title') Admin - View Shows @endsection

@section('style')

<style>

    @media(max-width: 1600px){

        .alert{
            width: 25%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 2%;
            text-align: center;
            border: 2px solid green !important;
        }


        td a{
            color: white;
        }

        td a:hover{
            color: red;
        }

        th{
            background-color: rgb(219, 25, 51) !important; 
        }

        img{
            max-width: 100px;
            max-height: 100px;
        }

        h1{
            margin-top: 2% !important;
            color: white;
            border-bottom: 1px solid white;
            font-weight: bold !important;
        }

        hr{
            color: white !important;
            margin-top: 0 !important;
            padding: 0 !important;
        }

        td{
            text-align: center;
        }

        #phn_table{
            display: none;
        }

        footer{
            margin-top: 24%;
        }
    }

    @media(max-width: 450px){
        #pc_table{
            display: none;
        }

        #phn_table{
            display: block;
            width: 100%;
        }
    }

</style>

@endsection

@section('content')

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <h1>Shows</h1>
    <hr>

    <table class="table table-striped table-hover table-dark" id="pc_table">
        <thead>
        <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Movie</th>
            <th scope="col">Seats</th>
            <th scope="col">Day</th>
            <th scope="col">Time</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($showlist as $show)
                
                <tr>
                    <td>{{ $show->id }}</td>
                    <td>{{ $show->movie_id }}</td>
                    <td>{{ $show->movie_seats }}</td>
                    <td>{{ $show->show_day }}</td>
                    <td>{{ $show->movie_time }}</td>
                    <td><a href="/admin/{{$show->id}}/deleteshow"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="table table-striped table-hover table-dark col-sm-12" id="phn_table">
        <thead>
        <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Movie</th>
            <th scope="col">Seats</th>
            <th scope="col">Day</th>
            <th scope="col">Time</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($showlist as $show)
                
                <tr>
                    <td>{{ $show->id }}</td>
                    <td>{{ $show->movie_id }}</td>
                    <td>{{ $show->movie_seats }}</td>
                    <td>{{ $show->show_day }}</td>
                    <td>{{ $show->movie_time }}</td>
                    <td><a href="/admin/{{$show->id}}/deleteshow"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    
@endsection

<script>
    setTimeout(function(){
        $('.alert').slideUp(1500);
    }, 2000);
</script>