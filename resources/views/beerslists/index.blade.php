@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
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
                    <div class="col-sm-8 col-xs-8">
                        <div class="form-group">
                            <input type="text" name="name" id="list-name" class="form-control" value="{{ old('list') }}" placeholder="ex. my new list">
                        </div>
                    </div>
                    <!-- Add list Button -->
                    <div class="col-sm-2 col-xs-2 new-list-button">
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
                                    <div class="panel-heading">

                                        <span class="panel-title">{{ $list->name }}</span>

                                        <div class="btn-group pull-right">
                                            <div class="btn-group">
                                                    <form action="/list/{{ $list->id }}" method="GET">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="borderless-button btn-edit">
                                                            <i class="fa fa-btn fa-edit"></i>
                                                        </button>
                                                    </form>
                                            </div>
       
                                            <div class="btn-group">
                                                    <form action="/list/{{ $list->id }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="borderless-button btn-delete" onclick="return confirm('Are you sure you want to delete this list?');">
                                                            <i class="fa fa-btn fa-trash"></i>
                                                        </button>
                                                    </form>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="panel-body">
                                    <!-- New Beer Form -->
                                    <form action="/beer" method="POST" class="form-horizontal" style="display:none;">
                                        {{ csrf_field() }}

                                        <!-- Beer Name -->
                                        <div class="form-group">

                                            <div class="col-sm-9">
                                                <input type="text" name="name" id="beer-name" class="beer-name-{{ $list->id }} form-control" value="{{ old('beer') }}" placeholder="ex. Tripel Karmeliet">
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
                                    <ul>
                                    @foreach ($list->beers as $beer)
                                    <li>{{ $beer->name }}</li>
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
