<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Cinemplex - Login</title>
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<script src="https://kit.fontawesome.com/23c9455052.js" crossorigin="anonymous"></script>

    <style>

        .main_login{
                margin-top: 10%; 
                border: 5px wheat groove;
                padding: 2%;
            }

        @media(max-width: 1600px){

            .row{
                --bs-gutter-x: 0rem;
            }

            body{
            background: url('https://static.vecteezy.com/system/resources/previews/003/500/390/non_2x/woman-is-holding-clapperboard-or-movie-slate-in-studio-shooting-it-is-use-in-video-production-and-cinema-industry-on-black-background-free-photo.jpg') no-repeat fixed center;
            background-size: cover;
            }

            input{
                margin-top: 3%; 
            }

            

            h1{
                color: white;
                text-align: center;
            }

            label{
                color: white;
            }

            hr{
                color: white;
            }

            button{
                margin-top: 10%;
            }
        }

        @media(max-width: 767px){
            
            body{
                background: url('https://drive.google.com/uc?export=view&id=1JETSUP9SI8T9MoQ1oo5YhOWtSoooBORZ') no-repeat fixed center;
                background-size: cover;
            }

            .main_login{
                border: none;
            }
        }

        
        
    </style>

</head>
<body>


<!-- ----------------------------------- LOGIN FORM ----------------------------------- -->

<form method="POST" action="{{ route('login') }}">

    @csrf

        <div class="main_login col-lg-4 offset-lg-7">

            <div class="row form-group">

                <h1 class="col-lg-12"><i class="fas fa-sign-in-alt"></i> Login</h1>
                <hr>
    
            </div>
    
            <div class="row form-group">
    
                <label class="col-lg-2 col-form-label">Email Address</label>
                <div class="col-lg-10">
                    <input type="email" id="mail" class="form-control @error('email') is-invalid @enderror"  name="email" placeholder="faiq@something.com"><br>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>
    
            <div class="row form-group">
                
                <label class="col-lg-2 col-form-label">Password</label>
                <div class="col-lg-10">
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="**********"><br>
                </div>
    
            </div>

            <div class="row form-group">
            </div>
    
            <button type="submit" class="btn btn-success col-lg-4 offset-lg-4 col-12">Login </button>

            <hr class="col-lg-10 offset-lg-1">

            <a class="col-lg-4 offset-lg-3 col-10 offset-2" href="{{ route('register') }}">Don't Have an Account? <strong> REGISTER</strong></a>

        </div>

		

	</form>

	<br>

</body>
</html>
