<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Easiest Way to Add Input Masks to Your Forms</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/login/assets/css/style.css') }}">
</head>
<body>
<div class="registration-form">
    <form method="post" action="{{route('register.user1')}}">
        @csrf
        <div class="form-icon">
            <span><i class="icon icon-user"></i></span>
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="email" placeholder="Email" name="email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control item" id="password" placeholder="Password" name="password">
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="first_name" placeholder="Firstname" name="first_name" >
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="last_name" placeholder="Lastname" name="last_name" >
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="address" placeholder="Address" name="address" >
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="phone" placeholder="Phone" name="phone" >
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block create-account">Create Account</button>
        </div>
        <div class="error-message">
            @if($errors->any())
                @foreach($errors->all() as $nameError)
                <p style="color: red">{{$nameError}}</p>
                @endforeach
                @endif

        </div>
        <p style='color:green'>{{ (isset($success)) ? $success : '' }}</p>
    </form>
    <div class="social-media">
        <h5>Sign up with social media</h5>
        <div class="social-icons">
            <a href="#"><i class="icon-social-facebook" title="Facebook"></i></a>
            <a href="#"><i class="icon-social-google" title="Google"></i></a>
            <a href="#"><i class="icon-social-twitter" title="Twitter"></i></a>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="{{ asset('frontend/login/assets/js/script.js') }}"></script>
</body>
</html>

{{--    <!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
{{--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>--}}
{{--    <link rel="stylesheet" href="{{ asset("frontend/css/style.css") }}">--}}
{{--    <title>Document</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container mt-5" >--}}
{{--    <form method="get" action="{{route('register.user')}}">--}}
{{--        @csrf--}}
{{--        <div class="form-group">--}}
{{--            <div class="error-message">--}}
{{--                @if($errors->any())--}}
{{--                    @foreach($errors->all() as $nameError)--}}
{{--                        <p style="color: green">{{$nameError}}</p>--}}
{{--                    @endforeach--}}
{{--                @endif--}}
{{--            </div>--}}
{{--            <p style="color: red">{{(isset($success)) ? $success:''}}</p>--}}
{{--            <label>Name</label>--}}
{{--            <input type="text" class="form-control" name="first_name" placeholder="Enter your firstname">--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label>Password</label>--}}
{{--            <input type="password" class="form-control" name="password" placeholder="Enter your password">--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label>Email</label>--}}
{{--            <input type="email" class="form-control" name="email" placeholder="Enter your email">--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label>Phone</label>--}}
{{--            <input type="number" class="form-control" name="phone" placeholder="Enter your phone">--}}
{{--        </div>--}}


{{--        <input type="submit" name="submit" value="Submit" class="btn btn-dark btn-block">--}}
{{--    </form>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}


