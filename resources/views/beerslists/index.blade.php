@extends('layouts.app')
@section('content')
    <div class="container beerslists-index">
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
            @if (count($beerslists) > 1)
            <h3 style="color:#334D5C;">Here's all your lists</h3>
            @elseif (count($beerslists) == 1)
            <h3 style="color:#334D5C;">Here's your list</h3>
            @else
            <h3 style="color:#334D5C;">Add your first list ! <i class="fa fa-arrow-up" aria-hidden="true"></i></h3>
            @endif
            <br>
            @if (count($beerslists) > 0)
                @foreach ($beerslists as $list)
                    @include('beerslists.list')
                @endforeach
            @endif

    </div>
</div>

@endsection
