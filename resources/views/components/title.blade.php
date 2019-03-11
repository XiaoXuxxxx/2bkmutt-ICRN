@if( !empty($title) )
    <h3>{{ $title }}</h3>
@endif
@if( !empty($desc) )
    <p>{{ $desc }}</p>
@endif
@if( !empty($title) || !empty($$desc) )
    <hr>
@endif
