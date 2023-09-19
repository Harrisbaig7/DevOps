@extends('layouts.adminlayout')

@section('title') Admin - Movie Reviews @endsection

@section('style')

<style>

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

    h2{
        margin-top: 2% !important;
        color: white;
        text-align: center;
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

</style>

@endsection

@section('content')

    <h1>Movies - Reviews</h1>
    <hr>

    {{-- <h2>{{ $movie->movie_name }}</h2> --}}
    <br>

    <table class="table table-striped table-hover table-dark" id="pc_table">
        <thead>
        <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">User ID</th>
            <th scope="col">Review</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->user_id }}</td>
                    <td>{{ $review->movie_review }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
