@extends('layouts.layout')

@section('title') Cineplex - About Us @endsection

@section('style')

<style>

    @media(max-width: 1600px){

        .aboutus{
            margin-top: 1%;
            padding: 5%;
            font-size: 20px;
            text-align: justify;
            background-color: #212525;
            color: white;
            /* font-weight: bold; */
        }

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

        address{
            font-weight: bold;
            background-color: #212525;
            width: 40%;
            margin-left: auto;
            margin-right: auto;
            color: white;
            text-align: center;
            margin-top: 3%;
            font-size: 20px;
            padding: 2%;
        }

        #cine{
            padding-left: 2%;
            width: 40%;
            height: 40%;
            float: right;
        }

        #me{
            padding-right: 2%;
            width: 30%;
            height: 80%;
            float: left;
            display: inline;
        }

        #image{
            width: 100%;
            height: 100%;
        }

        img:hover{
            transition: transform .4s;
            transform: scale(1.1);
        }
    }

    @media(max-width: 767px){

        address{
            font-weight: bold;
            background-color: #212525;
            width: 100%;
            text-align: center;
            margin-top: 3%;
            font-size: 20px;
            padding: 2%;
        }

        #cine{
            padding: 1%;
            width: 100%;
            height: 30%;
            float: none;
        }

        #me{
            padding: 4%;
            width: 45%;
            height: 25%;
            float: right;
            align-items: center;
        }
    }

</style>

@endsection

@section('content')


    <h1>About Us</h1>

    <!-- ____________________________________QOUTE____________________________________ -->

    <address><em>
        "It's not over when you LOSE,
        It's over when you QUIT......"</em>
    </address>


    <!-- ____________________________________ABOUT ME____________________________________ -->

    <div class="aboutus">

        <section>
            <img id="cine" src="https://britishcinematographer.co.uk/wp-content/uploads/2017/05/twitter-and-firstlook-onscreen.jpg" alt="">
            <p>Cineplex is Pakistan’s one of the most luxury movie theater. We offer an entertaining and distinguished cinematic experience. Enjoy your movie by reclining on our sofa seats, with food served to your seat from a wide array of delicious cuisines. Immerse yourself to witness an unparalleled experience in viewing the state-of-the-art digital 3D screening at Cineplex. Founded in 2022, we have demonstrated our drive to push the cinema experience to new and exciting levels through our luxury dine-in theatre concepts. Our business has been the best in providing an ultimate movie-going experience. With this luxury lounge offering fully reclining Lay-Z boys seats, elegant lobby spaces, cutting edge sound and projection technology makes Cineplex stands out as an international movie theater.</p>
        </section>
        <hr>

        <section>
            <div id="image">
                <img id="me" src="covers/admin.jpeg" alt="">
                <p>My name is Muhammad Haris Baig. I am the owner of the Cineplex.</p>
                <p>Another year has flown by, on unseen wings of time, flying on the fast and ruthless winds of change. Despite all challenges associated with the development work of this immense magnitude, Team Cineplex has not only ensured best cinematic experience but also provide the people with comfortable seats and affordable prices for the show. I am indebted to Team Cineplex for their perseverance and professionalism. It's their effort, their commitment, their passion that has transformed Cineplex into what it is today. Following a fulfilling 2022, we look forward to 2023 as another great year of achievement and service, as Cineplex stays committed to providing an entertaining, progressive and prosperous movies.</p>
            </div>
        </section>

        <hr>

    </div>

@endsection
