<ol class="breadcrumb">
    <li><a href="{{ url("/") }}"><i class="fa fa-fw fa-home"></i>&nbsp;Home</a></li>
    @if(!$disable)
        @for($i = 1; $i <= count(Request::segments()); $i++)
            <?php
                $text = Request::segment($i);
                $text = str_replace("-", " ", $text);
                $text = ucwords($text);
                $url = "/";
                for($j = 1; $j <= $i; $j++){
                    $url .= Request::segment($j) . "/";
                }
            ?>
            @if($i == count(Request::segments()))
                <li class="active">{{ $text }}</li>
            @else
                <li><a href="{{ $url }}">{{ $text }}</a></li>
            @endif
        @endfor
    @endif
</ol>
