@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                @if($count >1)
                Found {{$count}} items !
                @else
                Found {{$count}} item !
                @endif


                </div>

                <div class="panel-body">
                    @if (count($results) > 0)
                    <ul class="search-listing-beers">
                        @foreach ($results as $result)
                        <li>
                            @if($result->logo_small_url)
                            <img src="{{ $result->logo_small_url }}">
                            @else
                            <img src="http://www.brewerydb.com/img/beer.png">
                            @endif

                        <a href="/beer/{{ $result->id }}">{{ $result->brewery_name }} "<strong>{{ $result->name }}</strong>"</a>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <p>Nothing found ! :-(</p>
                    @endif
                    <div class="pagination-container">{!! $results->render() !!}</div>
                    <div class="beer-page-buttons">
                        <div class="btn-group">
                            <a href="javascript:history.back()" class="btn btn-default">
                                <i class="fa fa-btn fa-backward button expand"></i>Try again?
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
