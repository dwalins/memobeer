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
                MEMOBEER
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <!--<li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>-->
                <li @if(Request::path() == '/')class="active"@endif><a href="/">Home</a></li>
                <li @if(Request::is('beer*'))class="active"@endif><a href="/beers">Beers</a></li>
                <li @if(Request::is('brewery*'))class="active"@endif><a href="/brewerys">Breweries</a></li>
                <li @if(Request::is('list*')) class="active" @endif><a href="/lists">Lists</a></li>
                <li style="display:none" @if(Request::path() == 'contact') class="active" @endif><a href="/contact">Contact</a></li>
            </ul>

            @if (!Auth::guest())
            <div class="hidden-sm hidden-md">
                <form action = "/beer" class="navbar-form navbar-left" method="POST">
                {{ csrf_field() }}
                    <div class="form-group">
                      <input type="text" class="form-control" name="name">
                    </div>
                    <button type="submit" class="btn btn-default " name="search"><i class="fa fa-btn fa-search button expand"></i>Search</button>
                </form>
            </div>
            @endif

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">

                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li  @if(Request::path() == 'login')class="active"@endif><a href="{{ url('/login') }}">Login</a></li>
                    <li  @if(Request::path() == 'register')class="active"@endif><a href="{{ url('/register') }}">Register</a></li>
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
                            <li><a href="{{ url('/settings') }}"><i class="fa fa-btn fa-edit"></i>Settings</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>