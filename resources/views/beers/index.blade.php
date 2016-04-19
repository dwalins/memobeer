@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Beer
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="/beer" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Beer name</label>

                            <div class="col-sm-6">
                                <input type="text" name="beer" id="beer-name" class="form-control" value="{{ old('beer') }}" placeholder="ex. Tripel Karmeliet">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus button expand"></i>Add Beer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($beers) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Beers to buy
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Beer</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($beers as $beer)
                                    <tr>
                                        <td class="table-text"><div>{{ $beer->name }}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="/beer/{{ $beer->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-task-{{ $beer->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
