<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bible Study - Bible Study Tools To Help You Dig Deeper.</title>

    <meta name="description" content="Read the Bible online. Use our tools to dig into the original Greek and Hebrew behind each verse and make notes as you study.">

    <!-- Fonts -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">-->

    <!-- Styles -->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
<!--JS moved from footer to here -->
<script src="/jquery-2.2.3.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
<!--datepicker JS-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
<!--end datepicker JS-->

<!--Custom CSS -->
<link rel="stylesheet" href="/custom-css/custom.css">

</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Bible Study
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="{{ url('/bible') }}">Bible</a></li>
                    @if(Auth::user())

                            <li><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="#">Notes</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/add') }}">Add Note</a></li>
                                    <li><a href="{{ url('/notes') }}">View Notes</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('/topics') }}">Topics</a></li>
                            @if(Auth::user()->is_jw == 'yes')
                            <li><a href="{{ url('/comments-only') }}">Meeting Comments</a></li>
                            @endif
                            
                            @if(Auth::user()->id == '1')
                            <li><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="#">Study(beta)</a>

                                <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('/comment/add') }}">Add Comment</a></li>
                                        <li><a href="{{ url('/comments-only') }}">View Comments (Comments Only)</a></li>
                                        <li><a href="{{ url('/comment/study/view/mobile') }}">View Comments (Mobile)</a></li>
                                        <li><a href="{{ url('/comment/view') }}">View Comments (Tablet & Mobile)</a></li>
                                        <li><a href="{{ url('/comment/study/view') }}">View Comments (Laptop & Desktop)</a></li>
                                </ul>
                            </li>

                            <li><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="#">Publications</a>
                            @endif

                                <ul class="dropdown-menu" role="menu">
                                    @foreach($publications as $publication)
                                        <li><a href="/publication/{{$publication->id}}">{{$publication->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif

                <!--<li style="background-color:#900909;"><a style="color:white;" href="https://paypal.me/danielgalyean">Donate</a></li>-->
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Google Analytics-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-82672874-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- End Google Analytics-->  
</body>
</html>
