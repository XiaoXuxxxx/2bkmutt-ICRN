<div class="progress" id="{{$id}}-main" style="margin-bottom:0; opacity:{{ ($at == 0)?"0":"1" }};">
    <div class="progress-bar progress-bar-striped active" id="{{$id}}-progress" role="progressbar" style="width: {{$at or 50}}%; {{ (isset($color))? "background-color: ".$color.";" : ""}};"></div>
</div>
