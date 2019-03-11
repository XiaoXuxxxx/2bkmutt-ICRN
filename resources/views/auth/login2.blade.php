<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>2BKMUTT15 - Login</title>
    <link rel="shortcut icon" href="/img/logo_2b.jpeg">
    <link href="/css/login.css" rel="stylesheet">
    <link href="/css/sticky2.css" rel="stylesheet">

</head>
<body>
    <style type="text/css">
        .wrapper{
            min-height: 0;
            margin-top: 130px;
        }
        hr.style{ 
            border: 0; height: 0; border-top: 1px solid rgba(0, 0, 0, 0.1); border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        #bgVideo {
    position: fixed;
    top: -90px;
    right: 0;
    bottom: 0;
    margin-top: -10px;
    min-width: 100%; 
    min-height: 100%;
}
@media (max-width:768px){
#bgVideo {
    position: fixed;
    top: -20px;
    right: 0;
    bottom: 0;
    margin-top: -10px;
    min-width: 100%;
    min-height: 100%;
}



}
    </style>
<!--<video autoplay muted loop id="bgVideo">
  <source src="/video/bnk48.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video>-->
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->
        <h2 class="active"> Sign In </h2>

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="/img/logo2.png" id="icon" alt="User Icon" />
            <br>
            <br>
        </div>

        <!-- Login Form -->
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
	{!! csrf_field() !!}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"></div>
            <input type="email" class="fadeIn second" name="email" value="{{ old('email') }}" placeholder="Email Address">
            <input type="password" class="fadeIn third" name="password" placeholder="Password">
	    <hr class="style" style="width: 85%;">
            <input type="submit" id="login-submit" class="fadeIn fourth"  style="width: 85%;" value="Log In">
        </form>
	@if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <p>Forget Password? Contact your P'staff</p>
        </div>

    </div>
</div>
<!--@include('components.footer')-->
</body>
</html>

