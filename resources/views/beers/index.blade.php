@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">

    <h3 style="color:#334D5C;">All the beers beginning by "{{ $letter }}"</h3>
    <br>
    <div class="pagination-container">
        <div class="btn-toolbar">
            <div class="btn-group btn-group-sm">
                <a href="/beers/1-9"><button class="btn @if(Request::path() != 'beers/1-9') btn-default @endif">1-9</button></a>
                <a href="/beers/A"><button class="btn @if(Request::path() != 'beers/A') btn-default @endif">A</button></a>
                <a href="/beers/B"><button class="btn @if(Request::path() != 'beers/B') btn-default @endif">B</button>
                <a href="/beers/C"><button class="btn @if(Request::path() != 'beers/C') btn-default @endif">C</button>
                <a href="/beers/D"><button class="btn @if(Request::path() != 'beers/D') btn-default @endif">D</button>
                <a href="/beers/E"><button class="btn @if(Request::path() != 'beers/E') btn-default @endif">E</button>
                <a href="/beers/F"><button class="btn @if(Request::path() != 'beers/F') btn-default @endif">F</button>
                <a href="/beers/G"><button class="btn @if(Request::path() != 'beers/G') btn-default @endif">G</button>
                <a href="/beers/H"><button class="btn @if(Request::path() != 'beers/H') btn-default @endif">H</button>
                <a href="/beers/I"><button class="btn @if(Request::path() != 'beers/I') btn-default @endif">I</button>
                <a href="/beers/J"><button class="btn @if(Request::path() != 'beers/J') btn-default @endif">J</button>
                <a href="/beers/K"><button class="btn @if(Request::path() != 'beers/K') btn-default @endif">K</button>
                <a href="/beers/L"><button class="btn @if(Request::path() != 'beers/L') btn-default @endif">L</button>
                <a href="/beers/M"><button class="btn @if(Request::path() != 'beers/M') btn-default @endif">M</button>
                <a href="/beers/N"><button class="btn @if(Request::path() != 'beers/N') btn-default @endif">N</button>
                <a href="/beers/O"><button class="btn @if(Request::path() != 'beers/O') btn-default @endif">O</button>
                <a href="/beers/P"><button class="btn @if(Request::path() != 'beers/P') btn-default @endif">P</button>
                <a href="/beers/Q"><button class="btn @if(Request::path() != 'beers/Q') btn-default @endif">Q</button>
                <a href="/beers/R"><button class="btn @if(Request::path() != 'beers/R') btn-default @endif">R</button>
                <a href="/beers/S"><button class="btn @if(Request::path() != 'beers/S') btn-default @endif">S</button>
                <a href="/beers/T"><button class="btn @if(Request::path() != 'beers/T') btn-default @endif">T</button>
                <a href="/beers/U"><button class="btn @if(Request::path() != 'beers/U') btn-default @endif">U</button>
                <a href="/beers/V"><button class="btn @if(Request::path() != 'beers/V') btn-default @endif">V</button>
                <a href="/beers/W"><button class="btn @if(Request::path() != 'beers/W') btn-default @endif">W</button>
                <a href="/beers/X"><button class="btn @if(Request::path() != 'beers/X') btn-default @endif">X</button>
                <a href="/beers/Y"><button class="btn @if(Request::path() != 'beers/Y') btn-default @endif">Y</button>
                <a href="/beers/Z"><button class="btn @if(Request::path() != 'beers/Z') btn-default @endif">Z</button>
            </div>
        </div>
    </div><br>

    @foreach($beers as $beer)
      <div class="col-sm-6 col-md-4 container-single-beer">
        <div class="thumbnail">
        @if($beer->logo_url)
        <img src="{{ $beer->logo_url}}" alt="">
        @else
        <img src="http://www.brewerydb.com/img/beer-details.png" alt="">
        @endif
          <div class="caption">
            <h4><a href="/beer/{{$beer->id}}">{{ str_limit($beer->name, $limit = 28, $end = '...')}}</a> <span class="abv">@if($beer->abv == 0)@else{{ $beer->abv }}°@endif</span></h4>
            <p><strong>@if($beer->brewery)<a href="/brewery/{{$beer->brewery->id}}">{{ str_limit($beer->brewery_name, $limit = 30, $end = '...')}}</a>@else unknown brewery @endif</strong></p>
            <p class="single-beer-description">{{ str_limit($beer->description, $limit = 150, $end = '...')}}</p>

            <p>
                <div class="btn-group">
                <a href="/beer/{{$beer->id}}" class="btn btn-success" role="button"><i class="fa fa-btn fa-beer"></i>Go to beer page</a> 
                </div>

                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display:none;">
                    Add to a list  &nbsp;<span class="caret"></span>
                </button>
                  <ul class="dropdown-menu">

                            <li>
                                <form action="/beer" method="POST" class="form-horizontal">
                                    <input type="hidden" name="beerid" id="beerid" value="">
                                    <input type="hidden" name="beerslistid" id="beerslistid" value="">
                                    <input type="hidden" name="name" value="">
                                    {{ csrf_field() }}
                                    <button type="submit" name="add" class="beer-page-add-to-list">
                                        List
                                    </button>
                                </form>
                            </li>
                  </ul>
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
                        
                    @endif
                @endif
            </p>

          </div>
        </div>
      </div>
    @endforeach

    <div class="container">
        <div class="row">
            <div class="pagination-container">{!! $beers->render() !!}</div>
        </div>
    </div>

</div>
</div>
@endsection
