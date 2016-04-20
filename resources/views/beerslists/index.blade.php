@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">


            <!-- Lists -->

            <div class="new-list-container col-sm-12">
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
                    <div class="col-sm-4 col-xs-4 new-list-button">
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

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                       {{ $list->name }}
                                    </div>
                                    <div class="panel-body">
                                    Content of each list.
                                    </div> 
                                </div>

                                <div>
                                    <form action="/list/{{ $list->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" id="delete-task-{{ $list->id }}" class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i>Delete "{{ $list->name }}" ?
                                    </button>
                                    </form>
                                </div>

                    </div>
                @endforeach
            @endif

    </div>
</div>
@endsection
