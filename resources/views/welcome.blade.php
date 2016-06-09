@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            @if (Auth::guest())
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to Memobeer</div>

                <div class="panel-body">
                    <center><img src="images/logo-welcome-text.png"></center>
                    <p>Please <a href="login">login</a> and have a beer. </p>
                    <p>This applications allows you to browse beers & breweries (thanks to the <a href="http://www.brewerydb.com/">BreweryDB</a> API) and create your own list(s).</p>

                    <p><strong>If you're new here, you can...</strong></p>

                        <div class="form-group" style="text-align:center;">
                            <div>
                                <a href="redirect" class="btn btn-social btn-facebook">
                                    <i class="fa fa-facebook"></i> Sign in with Facebook
                                </a>
                                <a href="register" class="btn btn-primary register-button">
                                    <i class="fa fa-btn fa-sign-in"></i>Register (the old way)
                                </a>

                            </div>
                        </div>
                </div>
            </div>
            @else
            <p>You're logged in.</p>
            @endif
        </div>
    </div>
</div>
@endsection
