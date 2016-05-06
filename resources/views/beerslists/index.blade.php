@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-lg-offset-2 col-lg-8 col-lg-offset-2 
                    col-md-offset-1 col-md-10 col-md-offset-1
                    col-sm-12">
            <!-- Lists -->

            <div class="new-list-container col-sm-12">

                @if (Session::has('flash_message'))
                <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('flash_message') }}
                </div>
                @endif

                <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- New list Form -->
                <form action="/list" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- List Name -->
                    <div class="col-sm-9 col-xs-9">
                        <div class="form-group">
                            <input type="text" name="name" id="list-name" class="form-control" value="{{ old('list') }}" placeholder='ex. "my awesome list"'>
                        </div>
                    </div>
                    <!-- Add list Button -->
                    <div class="col-sm-offset-1 col-xs-offset-1 col-sm-2 col-xs-2 new-list-button">
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus button expand"></i>New list
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            @if (count($beerslists) > 0)
                @foreach ($beerslists as $list)
                    <div class="col-sm-12 col-xs-12 beerslist">
                        <!-- Current lists -->

                                <div class="panel panel-primary">
                                    <div class="panel-heading index-panel-heading">

                                        <span class="panel-title">

                                        <span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;<a href="/list/{{$list->id}}">{{ $list->name }}</a></span>

                                        <div class="btn-group pull-right">
                                            <div class="btn-group">
<!--                                                         <button class="borderless-button btn-add-beer" id="btn-add-beer-{{ $list->id }}">
                                                            <i class="fa fa-btn fa-plus" title="Add a beer to this list"></i>
                                                        </button> -->
                                                    <form action="/edit/{{ $list->id }}" method="GET">
                                                        {{ csrf_field() }}
                                                        <button class="borderless-button btn-add-beer" id="btn-add-beer-{{ $list->id }}">
                                                            <i class="fa fa-btn fa-plus" title="Add a beer to this list"></i>
                                                        </button>
                                                    </form>
                                            </div>
                                            <div class="btn-group">
                                                    <form action="/edit/{{ $list->id }}" method="GET">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="borderless-button btn-edit">
                                                            <i class="fa fa-btn fa-edit" title="Edit this list"></i>
                                                        </button>
                                                    </form>
                                            </div>
       
                                            <div class="btn-group">
                                                    <form action="/list/{{ $list->id }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="borderless-button btn-delete" onclick="return confirm('Are you sure you want to delete this list?');">
                                                            <i class="fa fa-btn fa-trash" title="Delete this list"></i>
                                                        </button>
                                                    </form>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="panel-body">
                                    <!-- New Beer Form -->
                                    <form action="/beer" method="POST" class="form-horizontal form-add-beer" id="input-btn-add-beer-{{ $list->id }}">
                                        {{ csrf_field() }}

                                        <!-- Beer Name -->
                                        <div class="form-group">

                                            <div class="col-sm-9">
                                                <input type="text" name="name" id="beer-name" class="beer-name form-control" value="{{ old('beer') }}" placeholder="ex. Tripel Karmeliet">
                                                <input type="hidden" name="beerid" id="beerid">
                                                <input type="hidden" name="beerslistid" id="beerslistid" value="{{ $list->id }}">
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fa fa-btn fa-plus button expand"></i>Add Beer
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <ul class="listing-beers">

                                    @if (count($list->beers) == 0)
                                    <p>Start to add beers in your list <a href="/list/{{ $list->id }}">here</a>.</p>
                                    @endif
                                    @foreach ($list->beers as $beer)

                                    <li>
                                    <div class="row">
                                        <div class="col-sm-2 hidden-xs">
                                            @if($beer->logo_small_url)
                                            <img src="{{ $beer->logo_small_url }}">
                                            @else
                                            <img src="http://www.brewerydb.com/img/beer.png">
                                            @endif
                                        </div>
                                        <div class="col-sm-9 col-xs-11 encart-beer-list">
                                            <p><a href="/brewery/{{ $beer->brewery->id }}">{{ $beer->brewery->name }}</a>  <a href="/beer/{{ $beer->id }}">"<strong>{{ $beer->name }}</strong>" </a><span class="abv">{{ $beer->abv }}°</span></p>
                                            <p><em>{{ $beer->style['name'] }}</em></p>
                                            <p></p>
                                        </div>
                                        <div class="col-sm-1 col-xs-1 heart-container">
                                        <span class="glyphicon glyphicon-heart-empty add-to-favorite"></span>
                                        </div>
                                    </div>
                                    </li>

                                    @endforeach
                                    </ul>

                                </div> 
                                </div>

                    </div>
                @endforeach
            @endif

    </div>
</div>

@endsection
