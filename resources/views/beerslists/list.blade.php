<div class="col-sm-12 col-xs-12 beerslist">
    <!-- Current lists -->
    <div class="panel panel-primary">

        <div class="panel-heading index-panel-heading">
            <span class="panel-title">
                <span class="glyphicon glyphicon-th-list"></span>
                @if(Request::path() == 'lists')
                    <a href="/list/{{ $list->id}}">
                @endif
                &nbsp;&nbsp;{{ $list->name }}
                @if(Request::path() == 'lists')
                    </a>
                @endif
            </span>
            <div class="btn-group pull-right"
            @if(Request::path() != 'lists')
                style="display:none;"
            @endif
            >
                <div class="btn-group">

                        <form action="/list/{{ $list->id }}" method="GET">
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
        </div> <!-- end panel heading-->


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

            @if (count($list->beers) == 0)
                @if(Request::path() != 'lists')
                <p><strong>Nothing here yet !</strong> <br>Add some items by typing the beer's (or the brewery's) first letters above.</p>
                @else
                <p><strong>Nothing here yet !</strong> <br>Start to add some beers <a href="/list/{{$list->id}}">here</a>.</p>
                @endif
            @endif
            <ul class="listing-beers">
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
                            <p>
                             @if($beer->brewery)
                            <a href="/brewery/{{ $beer->brewery->id }}">{{ $beer->brewery->name }}</a>  
                            @else
                            unknown brewery
                            @endif
                            <a href="/beer/{{ $beer->id }}">"<strong>{{ $beer->name }}</strong>" </a><span class="abv">{{ $beer->abv }}°</span></p>
                            <p class="listing-beers-style"><em>{{ $beer->style['name'] }}</em></p>
                        </div>
                        <div class="col-sm-1 col-xs-1 heart-container" style="display:none;">
                            <span class="glyphicon glyphicon-heart-empty add-to-favorite"></span>
                        </div>
                        <div class="col-sm-1 col-xs-1 trash-container"             
                        @if(Request::path() == 'lists')
                            style="display:none;"
                        @endif
                        >
                                <form action="/beer/{{ $list->id }}/{{ $beer->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="borderless-button btn-delete" onclick="return confirm('Are you sure you want to delete this item from your list?');">
                                        <i class="fa fa-btn fa-trash"></i>
                                    </button>
                                </form>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
    </div> <!-- end panel body -->

    </div> <!-- end panel-primary-->

</div> <!-- end container 12-12 beerslist -->