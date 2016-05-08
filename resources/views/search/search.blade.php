<form action="/beer" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <!-- Beer Name -->
    <div class="form-group">
        <!-- <div class="col-sm-1 col-xs-1"><i class="fa fa-beer" aria-hidden="true" style="font-size:35px;">&nbsp;?</i></div> -->
        <div class="col-sm-8 col-xs-8 container-input-beer-name">
            <input type="text" name="name" id="beer-name" class="beer-name-{{ $list->id }} form-control" value="{{ old('beer') }}" placeholder="Type beer's first letters...">
            <input type="hidden" name="beerid" id="beerid">
            <input type="hidden" name="beerslistid" id="beerslistid" value="{{ $list->id }}">
        </div>
        <div class="col-sm-2 col-xs-2">
            <button type="submit" name="add" class="btn btn-primary btn-add-beer" disabled>
                <i class="fa fa-btn fa-plus button expand"></i>Add Beer
            </button>
        </div>
        <div class="col-sm-2 col-xs-2">
            <button type="submit" name="search" class="btn btn-default beer-search-button" disabled>
                <i class="fa fa-btn fa-search button expand"></i>Search
            </button>
        </div>
    </div>
</form>