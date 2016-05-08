@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Beer "{{ $beer->name }}"</div>

                <div class="panel-body">
                <div class="col-md-5 col-md-offset-1">
                @if($beer->logo_url)
                <img src="{{ $beer->logo_url }}">
                @else
                <img src="http://www.brewerydb.com/img/beer-details.png">
                @endif

                    <div class="beer-page-buttons">
                        <div class="btn-group">
                            <a href="javascript:history.back()" class="btn btn-default">
                                <i class="fa fa-btn fa-backward button expand"></i>Back
                            </a>
                        </div>
                        @if (!Auth::guest())
                            @if (count($beerslists) > 0)
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Add to a list  &nbsp;<span class="caret"></span>
                                </button>
                                  <ul class="dropdown-menu">
                                        @foreach ($beerslists as $list)
                                            <li>
                                                <form action="/beer" method="POST" class="form-horizontal">
                                                    <input type="hidden" name="beerid" id="beerid" value="{{ $beer->id}}">
                                                    <input type="hidden" name="beerslistid" id="beerslistid" value="{{ $list->id }}">
                                                    <input type="hidden" name="name" value="{{$beer->name}}">
                                                    {{ csrf_field() }}
                                                    <button type="submit" name="add" class="beer-page-add-to-list">
                                                        {{ $list->name }}
                                                    </button>
                                                </form>
                                            </li>
                                        @endforeach
                                  </ul>
                            </div>
                            @else
                            <a href="/">Create your first list to add this beer !</a>
                            @endif
                        @endif
                    </div>

                </div>

                <div class="col-md-6">
                    <h2 class="beer-page-title">{{ $beer->name }}</h2>
                    
                    <ul class="beer-list-attributes">
                        @if($beer->brewery)<li><strong><a href="/brewery/{{ $beer->brewery->id }}">{{ $beer->brewery->name }}</a></strong></li>@endif
                        @if($beer->abv != 0)
                        <li class="abv-no-margin">{{ $beer->abv }}°</li>
                        @endif
                        <li><em>{{ $beer->style->name }}</em></li>

                    </ul>

                    <p>{{ $beer->description }}</p>
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
