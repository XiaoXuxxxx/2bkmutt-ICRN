@extends('layouts.app')

@section('title', 'Userdata Viewer')

@section('content')
    @include('components.title', [
        "title" => "Userdata Viewer",
        "desc" => "List all users"
    ])
    <form id="userdata-viewer-search-form" class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-12">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-search"></i></div>
                    <input type="text" class="form-control" id="search-box" placeholder="Search...">
                    <div class="input-group-btn"><button type="submit" class="btn btn-primary btn">Search</button></div>
                </div>
            </div>
        </div>
    </form>
    <p id="search-status">Start typing in the search box to search.</p>
    <hr>
    @foreach($userprofiles as $profile)
        @include('components.usercard', ['p' => $profile, 'lazyload' => true])
    @endforeach
@endsection

@section('footer')
    <script src="{{ asset('js/userdataviewer.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.lazyload.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $("img.lazy").lazyload({
                effect : "fadeIn"
            });
        });
    </script>
@endsection
