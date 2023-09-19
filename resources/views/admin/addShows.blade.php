@extends('layouts.adminlayout')

@section('title') Admin - Add Show @endsection

@section('style')

<style>
    @media(max-width: 1600px){
        h1{
            margin-top: 2% !important;
            /* border-bottom: 1px solid black; */
            font-weight: bold !important;
        }

        hr{
            /* color: white !important; */
            margin-top: 0 !important;
            padding: 0 !important;
        }

        form{
            border: 5px double red;
            background-color: rgb(218, 218, 218);
            color: black;
            margin-left: auto;
            margin-right: auto;
            margin-top: 7%;
            margin-bottom: 6.5%;
            width: 60%;
            padding: 2%;
        }
    }

    @media(max-width: 1079px){
        
        form{
            margin-top: 5%; 
            width: 100%;
        }
        
    }
</style>

@endsection

@section('content')
    
	<form enctype="multipart/form-data" action="{{ url("/admin/$movie->id/addShows") }}" method="POST">
        @csrf

    <!-- ----------------------------------- ADD MOVIE FORM ----------------------------------- -->
		<div class="row form-group">
            <div class="col-xl-12">
                <h1><i class="fas fa-film"></i> Add New Show</h1>
            <hr>
            </div>
		</div>


		<div class="row form-group">
			<label class="col-xl-2 col-4 col-form-label">Movie Name:</label>
			<div class="col-xl-10 col-8">
				<input type="text" id="name" class="form-control" name="movie_name" value="{{$movie->movie_name}}" placeholder="Spiderman: Homecoming" disabled><br>
			</div>
		</div>


		<div class="row form-group">
            <label class="col-xl-2 col-4 col-form-label">No. of Seats:</label>
			<div class="col-xl-1 col-5">
				<input type="number" id="seats" class="form-control" name="movie_seats" placeholder="9"><br>
			</div>


			<label class="col-xl-2 offset-xl-1 col-4 col-form-label">Show Day:</label>
			<div class="col-xl-2 col-5">
                <select name="show_day" id="t_inter" class="form-control" aria-placeholder="Day">
					<option>Monday</option>
					<option>Tuesday</option>
                    <option>Wednesday</option>
					<option>Thursday</option>
                    <option>Friday</option>
					<option>Saturday</option>
                    <option>Sunday</option>
				</select><br>
				{{-- <input type="number" id="show_day" class="form-control" name="show_day" placeholder="Days"> --}}
			</div>

            <label class="col-xl-1 offset-xl-1 col-4 col-form-label">Time:</label>
			<div class="col-xl-2 col-5">
				<input type="text" id="time" class="form-control" name="movie_time"><br>
			</div>
		</div>

		<hr>

		<div class="row form-group">
		</div>

		<button type="submit" class="btn btn-primary col-xl-4 offset-xl-4 col-12">Submit</button>


	</form>

	<br>
@endsection