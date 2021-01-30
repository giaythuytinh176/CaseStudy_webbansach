<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng Nhập</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/login/assets/css/style.css') }}">
</head>
<body>
<div class="registration-form">
    <form method="post" action="{{ route('login.check') }}">
        @csrf
        <div class="form-icon">
            <span><i class="icon icon-user"></i></span>
        </div>
        @if(\Illuminate\Support\Facades\Session::has('registed_sucess'))
            <div>
                <p class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('registed_sucess')}}</p>
            </div>
        @endif
        <div class="form-group">
            <label class="mb-1" for="inputEmailAddress">Email:</label>
            <input type="text" class="form-control item" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label class="mb-1" for="inputPassword">Password:</label>
            <input type="password" class="form-control item" name="password" placeholder="Password" required>
        </div>
        @if(\Illuminate\Support\Facades\Session::has('error'))
            <div>
                <p class="alert alert-danger">{{\Illuminate\Support\Facades\Session::get('error')}}</p>
            </div>
        @endif
        <div class="form-group">
            <button type="submit" class="btn btn-block create-account">Login</button>
        </div>
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
