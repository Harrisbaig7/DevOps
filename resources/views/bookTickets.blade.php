@extends('layouts.layout')


@section('title') Movie - Book Tickets @endsection

@section('style')

<style>

    @media(max-width: 1600px){

        h1{
            font-weight: bold !important;
            width: 50%;
            margin-top: 2% !important;
            text-decoration: underline red;
        }

        h4{
            font-weight: bold !important;
        }

        h5{
            font-weight: bold !important;
        }

        .details{
            color: white;
            padding: 2%;
            text-align: justify;
            font-size: 18px;
        }

        img{
            width: 100%;
            height: 70%;
            object-fit: cover;
            object-position: top;
            /* box-shadow: inset 0px 0px 20px 10px rgba(0, 0, 0, 0.6); */
        }

        .review{
            margin-left: auto !important;
            margin-right: auto !important;
            width: 50%;
        }

        button{
            margin-top: 2% !important;
            width: 30% !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        table{
            color: white !important;
        }

        table input{
            color: rgb(211, 22, 22);
            font-weight: bold;
        }
    }

    @media(max-width: 767px){
        img{
            height: 30%;
        }
    }


</style>

@endsection

@section('content')

    <div class="details">
        <img src="{{asset('covers/'.$movie->movie_cover)}}" alt="">
        <h1>{{ $movie->movie_name }}</h1>

        <h5>Select Tickets: </h5>

        <form class="review" action="{{ url("/bookTickets/$user->id/$movie->id/$show->id") }}" method='post'>
            @csrf

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Tickets</th>
                    <th scope="col">Cost (PKR)</th>
                    <th scope="col"></th>
                    <th scope="col">Quantity</th>
                    <th scope="col"></th>
                    <th scope="col">Subtotal</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td scope="row">E-Standard</td>
                    <td>1000</td>
                    <td id="minus" class="updown"><i class="fas fa-minus-circle"></i></td>
                    <td><input type="number" name="no_of_seats" id="seats" min="1" max="10" value="1"></td>
                    <td id="plus" class="updown"><i class="fas fa-plus-circle"></i></td>
                    <td><input type="number" id="subtotal" value="1000"></td>
                </tr>
                <tr>
                    <td scope="row">GST</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>300</td>
                </tr>
                <tr>
                    <th scope="row">Total</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type="number" id="total" name="totalbill" value="1300"></td>
                </tr>
                </tbody>
            </table>

            <div class="row">
                <button type="submit" class="btn btn-success">Book Ticket</button>
            </div>

        </form>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#plus').click(function (e) {
                e.preventDefault();
                var quantity = $('#seats').val();
                var total = quantity*1000;
                if ( quantity<10 ){
                    quantity++;
                    $('#seats').val(quantity);
                }
            });

            $('#minus').click(function (e) {
                e.preventDefault();
                var quantity = $('#seats').val();
                var total = quantity*1000;
                if ( quantity>1 ){
                    quantity--;
                    $('#seats').val(quantity);
                }
            });

            $('.updown').click(function (e) {
                e.preventDefault();

                var price = 1000;
                var seats = $('#seats').val();

                $('#subtotal').val(price*seats);
                $('#total').val(price*seats+300);


                console.log(seats);

            });

            // $('#seats').on('change', function () {
            //     var price = 1000;
            //     var seats = $('#seats').val();

            //     console.log(seats);

            // });



            // public function valuechange(){
            //     var price = 1000;
            //     var seats = $('#seats').val();

            //     console.log(seats);
            // }
        });
    </script>
    <script src="{{ asset('frontend/bootstrap.bundle.min.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    @yield('scripts')


@endsection
