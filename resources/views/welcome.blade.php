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
                    <p>Please <a href="login">login</a> and have a beer.</p>
                    <p>Lorem dim sum Haam sui gau Jiu cai bau Zhaliang Pei guen Lo baak gou Taro cake Deep fried pumpkin and egg-yolk ball vegetarian crisp spring</p>
                    <p>Cheong fan pan fried bitter melon beef dumpling mango pudding coconut milk pudding black sesame soft ball deep fried bean curd skin rolls rice noodle roll. Chicken feet Potstickers stir fried radish cake Steamed Bun with Butter Cream hot raw fish slices porridge traditional steamed glutinous rice with zhu hao sauce crispy yam puff crispy dragon roll honeydew puree with sago.</p>

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
