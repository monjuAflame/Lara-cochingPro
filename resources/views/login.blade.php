<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Login Here </title>
  
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/bootstrap-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/elegant-icons-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/style-responsive.css') }}" rel="stylesheet" />

</head>

  <body class="login-img3-body">

    <div class="container">

      <form class="login-form" action="{{ url('login') }}" method="POST">
      {{ csrf_field() }}         
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
        </div>
      </form>
    <div class="text-right">
            <div class="credits">
                <a href="#">Aflame ORG</a>
            </div>
        </div>
    </div>


  </body>
</html>
