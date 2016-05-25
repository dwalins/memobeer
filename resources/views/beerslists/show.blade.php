@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-lg-offset-2 col-lg-8 col-lg-offset-2 
                col-md-offset-1 col-md-10 col-md-offset-1
                col-sm-12">

        <div class="new-list-container col-sm-12">
                @if (Session::has('flash_message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('flash_message') }}
                </div>
                @endif

                <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- Display add beer / search beer--> 
                @include('search.search')
        </div>
         <h3 style="color:#334D5C;">List "{{ $list->name }}"</h3>
         <br>
        @include('beerslists.list')

        <div class="col-sm-12 col-xs-12">
            <div class="btn-group">
                <a class="btn btn-default" href="/lists">
                    <i class="fa fa-btn fa-chevron-left"></i>View all my lists
                </a>
            </div>

            <div class="btn-group">
                <a class="btn btn-primary" href="/edit/{{ $list->id }}">
                    <i class="fa fa-btn fa-edit"></i>Edit this list
                </a>
            </div>

            <div class="btn-group">
                <form action="/list/{{ $list->id }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" id="delete-task-{{ $list->id }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this list?');">
                        <i class="fa fa-btn fa-trash"></i>Delete this list
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
