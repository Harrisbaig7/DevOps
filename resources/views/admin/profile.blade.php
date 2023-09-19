@extends('layouts.adminlayout')

@section('title') Admin - Profile @endsection

@section('style')

<style>

    @media(max-width: 1600px){

        h1{
            color: white;
            border-bottom: 4px solid red;
            font-weight: bold !important;
            text-align: center;
            width: 30%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 2% !important;
        }

        h4{
            font-weight: bold !important;
        }

        h5{
            font-weight: bold !important;
        }

        .profile{
            margin-left: auto !important;
            margin-right: auto !important;
            width: 70%;
            color: white;
            padding: 2%;
            text-align: justify;
            font-size: 18px;
        }

        .profile input{
            color: white;
            font-weight: bold;
        }

        form .row{
            margin-top: 4% !important;
        }

        td{
            text-align: center;
        }

        td a:hover{
            color: red;
        }

        th{
            background-color: rgb(219, 25, 51) !important;
        }
        .end{
            margin-top: 4%;
            background-color: rgba(233, 20, 20, 0.795) ;
            height:80px;
        }

    }

    @media(max-width: 767px){
        .profile{
            width: 100%;
        }
    }


</style>

@endsection


@section('content')

    <h1>Admin Profile</h1>

    <form class="profile">
        @csrf

        <div class="row">
            <label class="offset-xl-3 col-xl-1 col-2">User ID:</label>
            <input type="text" class="col-xl-4 offset-1 col-9" value= '{{$user->id}}' disabled>
        </div>
        <div class="row">
            <label class="offset-xl-3 col-xl-1 col-2">Name:</label>
            <input type="text" class="col-xl-4 offset-1 col-9" value='{{$user->name}}' disabled>
        </div>
        <div class="row">
            <label class="offset-xl-3 col-xl-1 col-2">Email:</label>
            <input type="text" class="col-xl-4 offset-1 col-9" value='{{$user->email}}' disabled>
        </div>
    </form>
    <div class="end">
    </div>
@endsection
