@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
<h3 style="color:#334D5C;">All the breweries beginning by "{{ $letter }}"</h3>
<br>
         <div class="pagination-container">
            <div class="btn-toolbar">
                <div class="btn-group btn-group-sm">
                    <a href="/brewerys/1-9"><button class="btn @if(Request::path() != 'brewerys/1-9') btn-default @endif">1-9</button></a>
                    <a href="/brewerys/A"><button class="btn @if(Request::path() != 'brewerys/A') btn-default @endif">A</button></a>
                    <a href="/brewerys/B"><button class="btn @if(Request::path() != 'brewerys/B') btn-default @endif">B</button>
                    <a href="/brewerys/C"><button class="btn @if(Request::path() != 'brewerys/C') btn-default @endif">C</button>
                    <a href="/brewerys/D"><button class="btn @if(Request::path() != 'brewerys/D') btn-default @endif">D</button>
                    <a href="/brewerys/E"><button class="btn @if(Request::path() != 'brewerys/E') btn-default @endif">E</button>
                    <a href="/brewerys/F"><button class="btn @if(Request::path() != 'brewerys/F') btn-default @endif">F</button>
                    <a href="/brewerys/G"><button class="btn @if(Request::path() != 'brewerys/G') btn-default @endif">G</button>
                    <a href="/brewerys/H"><button class="btn @if(Request::path() != 'brewerys/H') btn-default @endif">H</button>
                    <a href="/brewerys/I"><button class="btn @if(Request::path() != 'brewerys/I') btn-default @endif">I</button>
                    <a href="/brewerys/J"><button class="btn @if(Request::path() != 'brewerys/J') btn-default @endif">J</button>
                    <a href="/brewerys/K"><button class="btn @if(Request::path() != 'brewerys/K') btn-default @endif">K</button>
                    <a href="/brewerys/L"><button class="btn @if(Request::path() != 'brewerys/L') btn-default @endif">L</button>
                    <a href="/brewerys/M"><button class="btn @if(Request::path() != 'brewerys/M') btn-default @endif">M</button>
                    <a href="/brewerys/N"><button class="btn @if(Request::path() != 'brewerys/N') btn-default @endif">N</button>
                    <a href="/brewerys/O"><button class="btn @if(Request::path() != 'brewerys/O') btn-default @endif">O</button>
                    <a href="/brewerys/P"><button class="btn @if(Request::path() != 'brewerys/P') btn-default @endif">P</button>
                    <a href="/brewerys/Q"><button class="btn @if(Request::path() != 'brewerys/Q') btn-default @endif">Q</button>
                    <a href="/brewerys/R"><button class="btn @if(Request::path() != 'brewerys/R') btn-default @endif">R</button>
                    <a href="/brewerys/S"><button class="btn @if(Request::path() != 'brewerys/S') btn-default @endif">S</button>
                    <a href="/brewerys/T"><button class="btn @if(Request::path() != 'brewerys/T') btn-default @endif">T</button>
                    <a href="/brewerys/U"><button class="btn @if(Request::path() != 'brewerys/U') btn-default @endif">U</button>
                    <a href="/brewerys/V"><button class="btn @if(Request::path() != 'brewerys/V') btn-default @endif">V</button>
                    <a href="/brewerys/W"><button class="btn @if(Request::path() != 'brewerys/W') btn-default @endif">W</button>
                    <a href="/brewerys/X"><button class="btn @if(Request::path() != 'brewerys/X') btn-default @endif">X</button>
                    <a href="/brewerys/Y"><button class="btn @if(Request::path() != 'brewerys/Y') btn-default @endif">Y</button>
                    <a href="/brewerys/Z"><button class="btn @if(Request::path() != 'brewerys/Z') btn-default @endif">Z</button>
                </div>
            </div>
            <br>
        </div>

@foreach($brewerys as $brewery)
  <div class="col-sm-6 col-md-4 container-single-brewery">
    <div class="thumbnail">
    <div class="beer-logo-container">
    @if($brewery->logo)
    <img src="{{ $brewery->logo}}" alt="">
    @else
    <center><img src="http://www.brewerydb.com/img/brewery-details.png" alt=""></center><br>
    @endif
    </div>
      <div class="caption">
        <h4><a href="/brewery/{{$brewery->id}}">{{ str_limit($brewery->name, $limit = 28, $end = '...')}}</a></h4>
        <p class="single-brewery-description">{{ str_limit($brewery->description, $limit = 150, $end = '...')}}</p>
        <p>
            <div class="btn-group">
            <a href="/brewery/{{$brewery->id}}" class="btn btn-success" role="button"><i class="fa fa-btn fa-beer"></i>Go to brewery page</a> 
            </div>
        </p>
      </div>
    </div>
  </div>
@endforeach
<div class="pagination-container" style="display:block;">{!! $brewerys->render() !!}</div>
</div>
</div>
@endsection
