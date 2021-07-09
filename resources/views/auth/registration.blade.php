<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <title>Registration</title>
</head>
<body>

    <div class="row justify-content-center">
        @if(Session('status'))
            <div class="alert alert-danger">{{ Session('status') }}</div>
        @endif
    <!-- start login box -->
        <div class="login-box col-lg-4 col-md-6">
            <h2>register</h2>
            <!-- start form -->
            <form action="{{ route('register.custom') }}" method="POST" class="form" autocomplete="off">
                @csrf 
                <div class="row justify-content-center">
                    <div class="user-box col-10">
                        <input class="input" name="name" type="text"  required >
                        <label class="label" for="">Username</label>
                    </div>

                    <div class="user-box col-10">
                        <input class="input" name="email" type="email"  required >
                        <label class="label" for="">Email</label>
                    </div>

                    <div class="user-box col-10">
                        <input class="input" name="password" type="password"  required >
                        <label class="label" for="">Password</label>
                    </div>    
                    <div class="user-box col-5 col-lg-4">
                        
                        <div class="d-grid mx-auto">
                             <button type="submit" class="btn btn-block">SIGN IN</button>
                        </div>

                        <div class="d-grid mx-auto">
                            <a class="switch-link" href="{{url('login')}}">Have an account?</a>
                        </div>
                    </div>
            </div>
            </form>
            <!-- end form -->
        </div>
        <!-- end login-box -->
    </div>
</body>
</html>