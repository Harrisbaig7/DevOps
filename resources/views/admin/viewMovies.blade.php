@extends('layouts.adminlayout')

@section('title') Admin - Movie @endsection

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

        label{
            color: white;
            font-weight: bold;
        }

        .search{
            margin-left: auto;
            margin-right: auto;
            width: 30%;
            margin-top: 2%;
        }

        #search{
            width: 60%;
        }
    }

    @media(max-width: 450px){
        #pc_table{
            display: none;
        }

        #phn_table{
            display: block;
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

    <div class="search">
        <label for="">Search: </label>
        <input type="search" name="searchbar" id="search" placeholder="Search By Movie Name">
    </div>

    <h1>Movies</h1>
    <hr>

    <table class="table table-striped table-hover table-dark" id="pc_table">
        <thead>
        <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Rating</th>
            <th scope="col">Year</th>
            <th scope="col">Cover</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            {{-- @foreach ($movielist as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>{{ $movie->movie_name }}</td>
                    <td>{{ $movie->ratings }}</td>
                    <td>{{ $movie->year }}</td>
                    <td><img src="{{ asset('covers/'.$movie->movie_cover) }}" alt=""></td>
                    <td><a href="/admin/{{$movie->id}}/edit"><i class="fas fa-edit"></i></a>&emsp;
                        <a href="/admin/{{$movie->id}}/delete"><i class="fas fa-trash-alt"></i></a>&emsp;
                        <a href="/admin/{{$movie->id}}/review">Reviews</a>
                        <a href="/admin/{{$movie->id}}/show">Screen</a></td>
            @endforeach --}}
        </tbody>
    </table>

    <table class="table table-striped table-hover table-dark col-sm-12" id="phn_table">
        <thead>
        <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Cover</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            {{-- @foreach ($movielist as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>{{ $movie->movie_name }}</td>
                    <td><img src="{{ asset('covers/'.$movie->movie_cover) }}" alt=""></td>
                    <td><a href="/admin/{{$movie->id}}/edit"><i class="fas fa-edit"></i></a>&emsp;
                        <a href="/admin/{{$movie->id}}/delete"><i class="fas fa-trash-alt"></i></a>&emsp;
                        <a href="/admin/{{$movie->id}}/review">Reviews</a>
                        <a href="/admin/{{$movie->id}}/show">Screen</a>
                    </td>
            @endforeach --}}
        </tbody>
    </table>


@endsection

@section('script')

<script>

    function getMovies(query=''){
        $.ajax({
            type: "get",
            url: "getMovies",
            data: { query:query },
            dataType: "json",
            success: function (response) {
                $('tbody').html(response.data);
            }
        });
    }

    $(document).ready(function () {
        getMovies();

        $(document).on('keyup', '#search', function () {
            var query = $('#search').val();
            $('tbody').html('');
            getMovies(query);
        });

    });

    setTimeout(function(){
        $('.alert').slideUp(1500);
    }, 2000);

</script>

@endsection
