@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Brewery "{{ $brewery->name }}"</div>

                <div class="panel-body">
                <div class="col-md-5 col-md-offset-1">
                @if($brewery->logo)
                <img src="{{ $brewery->logo }}">
                @else
                <img src="http://www.brewerydb.com/img/beer-details.png">
                @endif
                <div>   
                <h4>Beers from {{ $brewery->name }}</h4>
                <ul class="">
                @foreach($beers as $beer)
                <li><a href="/beer/{{$beer->id}}">{{$beer->name}}</a></li>
                @endforeach
                </ul>
                </div>

                    <div class="beer-page-buttons">
                        <div class="btn-group">
                            <a href="javascript:history.back()" class="btn btn-default">
                                <i class="fa fa-btn fa-backward button expand"></i>Back
                            </a>
                        </div>
                    </div>

                </div>

                <div class="col-md-6">
                    <h2 class="beer-page-title">{{ $brewery->name }}</h2>
                    @if($brewery->established)
                    <h4>Since {{ $brewery->established }}</h4>
                    @endif

                    <p>{{ $brewery->description }}</p>
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
