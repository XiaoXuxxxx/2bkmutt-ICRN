<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>2BKMUTT16 :: ICRN-LoginPage</title>
    <link href="https://fonts.googleapis.com/css?family=Krub:400,600" rel="stylesheet">
    <link rel="shortcut icon" href="/img/logo_2b.jpeg">
    <link href="/css/sticky2.css" rel="stylesheet">
    <link href="/css/login2.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  </head>
  <style>
  body{
 #     background : #fae9ff;
     
   # background-image: linear-gradient(to right, #a1c4fd 0%, #c2e9fb 51%, #a1c4fd 100%);
  #  background-image: linear-gradient(to right, #ffecd2 0%, #fcb69f 51%, #ffecd2 100%);
  #  background-image: linear-gradient(to right, #f6d365 0%, #fda085 51%, #f6d365 100%);
   # background-image: linear-gradient(to right, #84fab0 0%, #8fd3f4 51%, #84fab0 100%);
  }
  .bg-1{
    background-image: linear-gradient(to right, #fbc2eb 0%, #a6c1ee 51%, #fbc2eb 100%); 
  }
  .bg:hover{
    background-position: right center;
  }

  .right {
  position: fixed;
  left: 10px;
  top: 10px;
  width : 15%;
  }
  .fa-star{
  animation: spin 2s linear infinite;
  }
  @-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
  }
  @keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
  }
  </style>
  <body class="bg bg-1">

    <div class="right">
      <img src="/img/logo_2b.jpeg" width="25%">
      <img src="/img/logo_kmutt.png" width="25%">
    </div>
    <script type="text/javascript">
    
    var APP_URL = {!! json_encode(url('/')) !!};
    </script>
<div class="container-fluid">
<div class="row">
<div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="wrapper " style="margin-top: 30px;">
      <!--<center><img src="/img/logo_web.png" class="img img-responsive" width="350"></center> -->
      <img src="/img/2b16_dark.png" class="img img-responsive" width="350"><br>
      <form class="login" id="login2" method="POST" action="{{ url('/login') }}">
        {!! csrf_field() !!}
        <p class="title" style="text-align: left;">
          <i class="fa fa-fw fa-sign-in"></i>&nbsp;Sign In
        </p>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"></div>
          <input type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" autofocus/>
          <i class="fa fa-user"></i>
          <input type="password" name="password" placeholder="Password">
          <i class="fa fa-key"></i>
        <button>
          <i class="spinner"></i>
          <span class="state" style="font-size: 16px;"><i class="fa fa-fw fa-sign-in"></i>&nbsp;Sign in</span>
        </button>
        
      </form>
      @if (session('status'))
      TEST
      @endif
      @if ($errors->has('email'))
      <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
      </span>
      @endif
      <!-- Remind Passowrd -->
      <p>Forget Password? Contact your P'staff</p>
    </div>
    <div class="col-md-3"></div>
    </div>
  </div>

</div>

    
  </div>
  <script src="js/jquery-1.12.0.min.js"></script> 
  @include('components.footer')
</body>
</html>