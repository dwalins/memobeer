@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">

            <div class="col-sm-12 col-xs-12 beerslist">
                <!-- Current lists -->

                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:55px;">

                                <form action="/edit/{{$beerslist->id}}" method="POST" class="form-horizontal">
                                    {{ csrf_field() }}

                                    <!-- List Name -->
                                    <div class="col-sm-8 col-xs-8">
                                        <div class="form-group">
                                            <input type="text" name="name" id="list-name" class="form-control" value="{{ $beerslist->name }}">
                                        </div>
                                    </div>
                                    <!-- Add list Button -->
                                    <div class="col-sm-4 col-xs-4 new-list-button">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fa fa-btn fa-plus button expand"></i>Edit list name
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="panel-body">
                            Content of each list.
                            </div> 
                        </div>
                        <div class="btn-group">
                        <a class="btn btn-default" href="/lists">
                            <i class="fa fa-btn fa-chevron-left"></i>Back
                        </a>
                        </div>
                        <div class="btn-group">
                            <form action="/list/{{ $beerslist->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" id="delete-task-{{ $beerslist->id }}" class="btn btn-danger">
                            <i class="fa fa-btn fa-trash"></i>Delete "{{ $beerslist->name }}" ?
                            </button>
                            </form>
                        </div>

            </div>

    </div>
</div>
@endsection
