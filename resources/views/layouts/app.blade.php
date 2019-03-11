<!DOCTYPE html>
<html>
  <head>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>2B-KMUTT16 :: @yield('title', 'Page')</title>
    <link href="https://fonts.googleapis.com/css?family=Krub:400,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="/css/sidebar.css" rel="stylesheet" >
    <link href="/css/circle-profile.css" rel="stylesheet">
    <link href="/css/2bapp.css" rel="stylesheet">
    <link href="/css/sticky.css" rel="stylesheet">
    <link href="/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/css/table.css">
    <link rel="icon" type="image/jpeg" href="/img/logo_2b.jpeg" />
    <style>
  
    /*    background: #d7f5ff;*/
    body {
    background: #fae9ff;
    #background-image : url('img/bg_2b.png');
    #background-repeat: round ;
    #background-attachment: fixed;
    font-family: 'Krub', sans-serif;
    }
    </style>
    <script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!};
    </script>
    <?php
    use App\User;
    use App\UserProfile;
    $recentUser = Auth::user(); 
    $user = UserProfile::where('user_id','=',$recentUser->id)->first();
    ?>
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar Holder -->
      <nav id="sidebar">
        <div class="sidebar-header">
          <h3><a href="/"><img src="/img/2b16.png" width="100%"></a></h3>
        </div>
        <!-- PROFILE IMAGES -->
        <div class="circle-img">
          @role(['admin'])
          <!--
            @if(Auth::user()->name == "Mr.Aom")
            <div class="ratio img-responsive img-circle" style="background-image: url('/img/aom.png');"></div>
            @elseif(Auth::user()->name == "k-rei")
            <div class="ratio img-responsive img-circle" style="background-image: url('/img/miko.jpg');"></div>
            @else
            <div class="ratio img-responsive img-circle" style="background-image: url('/img/Auth::user()->name');"></div>
            @endif
          -->
          <!--Profile by auth name -->
          <div class="ratio img-responsive img-circle" style="background-image: url('/img/admin/{{ Auth::user()->name }}.jpg');"></div>
          @endrole

          @role(['senior'])
            <div class="ratio img-responsive img-circle" style="background-image: url('/img/chapcher.png');"></div>
          @endrole

          @role(['junior'])
            @if(Auth::user()->name == "panisjar")
            <div class="ratio img-responsive img-circle" style="background-image: url('/img/jar.png');"></div>
            @elseif(Auth::user()->name == "Oab")
            <div class="ratio img-responsive img-circle" style="background-image: url('/img/oab.png');"></div>
            @else
            <div class="ratio img-responsive img-circle" style="background-image: url('/img/satchan.png');"></div>
            @endif
          @endrole

          @role(['staff'])
          <div class="ratio img-responsive img-circle" style="background-image: url('/img/chapcher.jpg');"></div>
          @endrole
        <!--
          @role(['user'])
            @if($user->image_filename != '')
            <div class="ratio img-responsive img-circle" style="background-image: url('/img/profile/{{ $user->image_filename }}');"></div>
            @endif
          @endrole

          @role(['usertest'])
            <div class="ratio img-responsive img-circle" style="background-image: url('/img/profiles/{{ Auth::user()->name }}.jpg');"></div>
          @endrole
        -->
        </div>
        <!-- END PROFILE IMAGES -->

        <!-- START MENU ITEM -->
        <ul class="list-unstyled components">
          <li class="active">
            <p>Hello :: {{ Auth::user()->name}} ({{ Auth::user()->roles[0]->display_name}})</p>
            
            <!--
            @role(['admin','senior','junior','staff'])
            <li><a href="{{ url('/tools/freeday-checking') }}" class="is-active"><i class="fa fa-list-alt"></i><span class="app-dashboard-sidebar-text"> Freeday Checking</span></a></li>
            @endrole 
            -->
          
            @role(['user','usertest'])
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> 2BKMUTT Home</a></li>
            <li><a href="{{ url('/checkAttendanceLog') }}"><i class="fa fa-calendar-check-o"></i> Check Attendance Log</a></li>
            <li><a href="{{ url('/profile/starvote') }}">    <i class="fa fa-comments"></i> Star Vote</a></li>
            <li><a href="{{ url('profile/labreport')}}"><i class="fa fa-pencil-square-o"></i> Project Topic Submission </a></li>
            
            @endrole

            <!-- Role User Test move to same Role User-->
            <!--
            @role(['usertest'])
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> 2BKMUTT Home</a></li>
            <li><a href="{{ url('/checkAttendanceLog') }}"><i class="fa fa-calendar-check-o"></i> Check Attendance Log</a></li>
            <li><a href="{{ url('/profile/starvote') }}">    <i class="fa fa-comments"></i> Star Vote</a></li>
            <li><a href="{{ url('profile/labreport')}}"><i class="fa fa-pencil-square-o"></i> Project Topic Submission </a></li>
            @endrole-->
            
            @role(['junior','senior','admin'])
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> 2BKMUTT Home</a></li>
            
            <li><a href="{{ url('/Protocol/checkList') }}"  class=is-active"><i class="glyphicon glyphicon-zoom-in"></i><span class="app-dashboard-sidebar-text"> Checking List System</span></a></li>
            <li><a href="{{ url('/System/Registration') }}" class="is-active"><i class="fa fa-pencil-square-o"></i><span class="app-dashboard-sidebar-text"> Registration System</a></li>
            <li><a href="{{ url('/profile/starvote') }}">    <i class="fa fa-comments"></i> Star Vote</a></li>  
            <!--
            <li><a href="{{ url('/leaflet')}}" class="is-active"><i class="fa fa-list-alt"></i> Leatflet System</a></li>
            -->
            <li><a href="{{ url('/tools/rfid-attendance-checking') }}" class="is-active"><i class="fa fa-barcode"></i><span class="app-dashboard-sidebar-text"> RFID Attendance Checking</span></a></li>

             <li><a href="{{ url('/tools/qr-attendance-checking') }}" class="is-active"><i class="fa fa-qrcode"></i><span class="app-dashboard-sidebar-text"> QR-CODE Attendance Checking</span></a></li>

            <li><a href="{{ url('/tools/attendance-checking') }}" class="is-active"><i class="fa fa-list-alt"></i><span class="app-dashboard-sidebar-text"> Attendance Checking</span></a></li>
            <!--
            <li><a href="{{ url('/tools/attendance-log') }}" class="is-active"><i class="fa fa-file-text"></i><span class="app-dashboard-sidebar-text"> Attendance Log</span></a></li>
            -->
            <li><a href="{{ url('/tools/userdata-viewer') }}" class="is-active"><i class="fa fa-database"></i><span class="app-dashboard-sidebar-text"> User Data Viewer</span></a></li>
            <li><a href="{{ url('/tools/staffdata-viewer') }}" class="is-active"><i class="fa fa-database"></i><span class="app-dashboard-sidebar-text"> Staff Data Viewer</span></a></li>
            <!--
            <li><a href="{{ url('/profile/starvote') }}">    <i class="fa fa-comments"></i> StarVote For Staff</a></li>
            -->
            <li><a href="{{ url('/tools/master-resetpassword') }}" class="is-active"><i class="fa fa-user"></i><span class="app-dashboard-sidebar-text"> Master Password Reset</span></a></li>
            @endrole

            <!-- Reset Password All Role -->
            <li><a href="{{ url('/profile/resetpassword') }}" ><i class="fa fa-user"></i> Reset Password</a></li>

            <!-- Data Import For Admin -->
            @role(['admin'])
            <li><a href="{{ url('/tools/data-importer') }}" ><i class="fa fa-table"></i> Data Importer</a></li>
            @endrole

            <!-- Logout -->
            
            <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
           
          </ul>
          </nav>
          <!-- Page Content Holder -->
          <div id="main-page" class="col-sm-9">
            <div id="content" color="#fee9e9">
              <button type="button" id="sidebarCollapse" class="navbar-btn">
              <span></span>
              <span></span>
              <span></span>
              </button>
              
              @if (trim($__env->yieldContent('breadcrumb')))
              <?php $disable = true; ?>
              @else
              <?php $disable = false;?>
              @endif
              @include('components.breadcrumb', ['disable' => $disable])
              <div id="main-content-container">
                @yield('content')
                <br>
                @include('components.footer')
              </div>
            </div>
          </div>
          <!-- jQuery CDN -->
          <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
          <!-- Bootstrap Js CDN -->
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <script src="/js/app.js" type="text/javascript"> </script>
          @yield('footer')
          <script type="text/javascript">
          $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
          $(this).toggleClass('active');
          });
            });
          </script>
          
        </body>
      </html>