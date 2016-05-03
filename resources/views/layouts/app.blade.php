<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Memo Beer - List your beers</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href="{{ URL::asset('css/bootstrap-social.css') }}" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link href="{{ URL::asset('js/jquery-ui-1.11.4.custom/jquery-ui.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery-ui-1.11.4.custom/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/autocomplete.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ URL::asset('js/toggle_beer_form.js') }}"></script> --}}
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    
    <style>
        body {
            /*font-family: 'Lato';*/
            font-family: 'Ubuntu', sans-serif;
        }

        a{
            color:#334D5C;
        }
        .form-add-beer{
            display:none;
        }

        .fa-btn {
            margin-right: 6px;
        }
        .icon-top{
            float:left;
            padding-top:7px;
            padding-right:5px;
        }
        .ui-autocomplete-loading {
            background: white url("images/ui-anim_basic_16x16.gif") right 5px center no-repeat;
          }

        .ui-autocomplete img{
            width:25px;
            height:25px;
            margin-right:5px;
            border-style: none;
        }
        .ui-autocomplete a img{
            border-style: none;
        }
        .new-list-container{
            margin-top:15px;
            margin-bottom:15px;
        }
        .new-list-button{
            
        }

        .beerslist{
            /*margin-bottom:25px;*/
        }
        .delete-btn, .edit-btn{
            display:inline-block;
            float:right;
        }
        .borderless-button{
            border: none;
            background: none;
        }

        .panel-body .btn-delete{
            color:#d9534f;
        }
        .beerslist .panel-body{
            padding-bottom:5px;
        }
        .btn-edit{
            /*color:#337ab7;*/
        }

        .listing-beers{
            padding-left:20px;
        }
        .listing-beers li{
            list-style:none;
            margin-bottom:5px;
        }
        .listing-beers p{
            line-height: 70%;
        }
        .listing-beers img{
            width:55%;
        }
        .encart-beer-list{
            padding:7px;
        }

        .abv{
            color:#d9534f;
            margin-left:5px;
        }
        .panel-primary>.panel-heading{
            background-color:#334D5C;
            border-color:#334D5C;
        }
        .panel-title{
            color:#e7e7e7;
            text-transform: uppercase;
        }
        .panel-primary{
            border-color:#334D5C;
        }
        .btn-group{
            color:#e7e7e7;
        }

        .btn-facebook{
            width:260px;
        }
        .btn-facebook:hover{
            color:white !important;
            
        }
        .avatar-top{
            width:30px;
            margin-top:-5px;
            margin-right:5px;
            -webkit-border-radius:50px;
            -moz-border-radius:50px;
            border-radius:50px
        }
        .navbar-nav>li>a{
            padding-bottom:10px;
        }

        .heart-container{
            opacity: 0.4;
            padding-top:7px;
        }
        .heart-container:hover{
            opacity: 1;
        }
        .add-to-favorite{
            font-size:20px;
        }


    html,body,#bubbles { height: 100% }

    #bubbles { padding: 100px 0; z-index: -1; position:absolute; }
    .bubble {
    width: 60px;
    height: 60px;
    background: #ffb200;
    border-radius: 200px;
    -moz-border-radius: 200px;
    -webkit-border-radius: 200px;
    position: absolute;

}

.x1 {
    -webkit-transform: scale(0.9);
    -moz-transform: scale(0.9);
    transform: scale(0.9);
    opacity: 0.2;
    -webkit-animation: moveclouds 15s linear infinite, sideWays 4s ease-in-out infinite alternate;
    -moz-animation: moveclouds 15s linear infinite, sideWays 4s ease-in-out infinite alternate;
    -o-animation: moveclouds 15s linear infinite, sideWays 4s ease-in-out infinite alternate;
}

.x2 {
    left: 200px;
    -webkit-transform: scale(0.6);
    -moz-transform: scale(0.6);
    transform: scale(0.6);
    opacity: 0.5;
    -webkit-animation: moveclouds 25s linear infinite, sideWays 5s ease-in-out infinite alternate;
    -moz-animation: moveclouds 25s linear infinite, sideWays 5s ease-in-out infinite alternate;
    -o-animation: moveclouds 25s linear infinite, sideWays 5s ease-in-out infinite alternate;
}
.x3 {
    left: 350px;
    -webkit-transform: scale(0.8);
    -moz-transform: scale(0.8);
    transform: scale(0.8);
    opacity: 0.3;
    -webkit-animation: moveclouds 20s linear infinite, sideWays 4s ease-in-out infinite alternate;
    -moz-animation: moveclouds 20s linear infinite, sideWays 4s ease-in-out infinite alternate;
    -o-animation: moveclouds 20s linear infinite, sideWays 4s ease-in-out infinite alternate;
}
.x4 {
    left: 470px;
    -webkit-transform: scale(0.75);
    -moz-transform: scale(0.75);
    transform: scale(0.75);
    opacity: 0.35;
    -webkit-animation: moveclouds 18s linear infinite, sideWays 2s ease-in-out infinite alternate;
    -moz-animation: moveclouds 18s linear infinite, sideWays 2s ease-in-out infinite alternate;
    -o-animation: moveclouds 18s linear infinite, sideWays 2s ease-in-out infinite alternate;
}
.x5 {
    left: 150px;
    -webkit-transform: scale(0.8);
    -moz-transform: scale(0.8);
    transform: scale(0.8);
    opacity: 0.3; 
    -webkit-animation: moveclouds 7s linear infinite, sideWays 1s ease-in-out infinite alternate;
    -moz-animation: moveclouds 7s linear infinite, sideWays 1s ease-in-out infinite alternate;
    -o-animation: moveclouds 7s linear infinite, sideWays 1s ease-in-out infinite alternate;
}
@-webkit-keyframes moveclouds { 
    0% { 
        top: 500px;
    }
    100% { 
        top: -500px;
    }
}

@-webkit-keyframes sideWays { 
    0% { 
        margin-left:0px;
    }
    100% { 
        margin-left:50px;
    }
}

@-moz-keyframes moveclouds {     
    0% { 
        top: 500px;
    }

    100% { 
        top: -500px;
    }
}

@-moz-keyframes sideWays {
    0% {
        margin-left:0px;
    }
    100% {
        margin-left:50px;
    }
}
@-o-keyframes moveclouds {
    0% { 
        top: 500px;
    }
    100% { 
        top: -500px;
    }
}

@-o-keyframes sideWays {
    0% {
        margin-left:0px;
    }
    100% {
        margin-left:50px;
    }
}

    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
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
                <a href="{{ url('/') }}"><img src="{{asset("/images/icon-top-small.png")}}" class="icon-top"></a>
                <a class="navbar-brand" href="{{ url('/') }}">
                    Memobeer
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
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
                                @if(Auth::user()->avatar)
                                <img src="{{ Auth::user()->avatar }}" class="avatar-top"> 
                                @else
                                <img src="images/no-avatar.png" class="avatar-top"> 
                                @endif

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
    <div id="bubbles">
        <div class="bubble x1"></div>
        <div class="bubble x2"></div>
        <div class="bubble x3"></div>
        <div class="bubble x4"></div>
        <div class="bubble x5"></div>
    </div>
    @yield('content')


</body>
</html>
