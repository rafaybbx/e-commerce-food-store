<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="{{ asset('adminassets/css/adminlogin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

</head>

<body>

    <div class="container">

        @include('backend.message')
        <div class="wrapper">
            <div class="title"><span>Admin Login </span></div>


            <form method="POST" action="{{ route('admin.authenticate') }}">
                @csrf
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" name="email" id="email" required placeholder="Email"
                        @error('email') is-invalid @enderror>
                    @error('email')
                        {{-- <p class="invalid-feedback"> {{ $message }}</p> --}}
                    @enderror

                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="Password"
                        @error('password') is-invalid
                        @enderror>
                         @error('password')
                            {{-- <p class="invalid-feedback"> {{ $message }}</p> --}}
                        @enderror
                </div>
                <div class="pass"><a href="#">Forgot password?</a></div>
                <div class="row button">
                    <input type="submit" value="Login">
                </div>
                {{-- <div class="signup-link">Not a member? <a href="#">Signup now</a></div> --}}
            </form>



        </div>
    </div>


</body>

</html>
