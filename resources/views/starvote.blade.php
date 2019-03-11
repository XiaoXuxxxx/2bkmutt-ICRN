@extends('layouts.app')

@section('title', 'Star Vote System')


@section('content')
    @include('components.title', [
        "title" => "Star Vote System",
        "desc" => "Star Vote System"
    ])
    @if(isset($voteResult))
        @if($staffcard == 1)
            <div class="alert alert-success">คุณได้โหวต P'{{ $voteResult->getAttribute('nickname_en') }} | You're Voted P'{{ $voteResult->getAttribute('nickname-en') }}</div>
            @include('components.starstaffcard', ['p' => $voteResult, 'lazyload' => true ,'vote' => false])
        @endif
        @if($staffcard == 0)
            <div class="alert alert-success">คุณได้โหวต {{ $voteResult->getAttribute('nickname-en') }} | You're Voted {{ $voteResult->getAttribute('nickname-en') }}</div>
            @include('components.starcard', ['p' => $voteResult, 'lazyload' => true ,'vote' => false , 'startype' => $startype])
        @endif
    @endif

<p id="browserDetect"></p>
<div id="link" class="row">
<div class="col-md-2"><center> <a href="{{ url('profile/starvote') }}"><button type="button" class="btn btn-block btn-primary"><i class="fa fa-home"></i> MainPage</button></a><p></p></div>
<div class="col-md-2"><center>  <a href="{{ url('profile/starvote/DiaoChan') }}/"><button type="button" class="btn btn-block btn-danger"><i class="fa fa-female"></i> DiaoChan</button></a> </div>
<div class="col-md-2"><center>  <a href="{{ url('profile/starvote/Lubu')}}"><button type="button" class="btn btn-block btn-success"><i class="fa fa-male"></i> Lubu</button></a></div>
<div class="col-md-2"><center>  <a href="{{ url('profile/starvote/XiahouYuan')}}"><button type="button" class="btn btn-block" style="background-color: #6f4a2f !important; color: #FFFFFF;"><i class="fa fa-child"></i> XiahouYuan</button></a></div>
<div class="col-md-2"><center>  <a href="{{ url('profile/starvote/ZhugeLiang')}}"><button type="button" class="btn btn-info btn-block"><i class="fa fa-id-badge"></i> ZhugeLiang</button></a></div>
</div>
    <hr>

	 @if($displayCard != 1)
	<div id="define" class="row">
<div class="col-md-12">
        <p><label class="label label-danger " style="font-size : 14px;">DiaoChan</label> (ดาว) : Clever | Pretty | Friendly</p>
        <p><label class="label label-success " style="font-size : 14px;">Lubu</label> (เดือน) : Clever | Handsome | Friendly</p>
        <p><label class="label label-success " style="background-color: #6f4a2f !important; color: #FFFFFF; font-size:14px;">XiahouYuan</label> (ดาวเทียม) : Lovely | Funny | Friendly</p>
        <p><label class="label label-info " style="font-size : 14px;">ZhugeLiang</label> (สิ่งศักดิ์สิทธิ์) : Staff | Lovely | Friendly</p>
</div>
</div>

<div id="player"></div>
<div class="well">
<center>	** ลิ้งค์เข้าโหวต ไม่ได้หายไปไหน กรุณาดูวิดีโอให้จบก่อน ** </center><br>
<center>	** P.S. The starvote link will not appear until the end of video ** </center>
</div>
<!--
<hr>
<iframe width="100%" height="560" src="https://www.youtube.com/embed/jPWSzLpnH_M?autoplay=1" frameborder="0" allow="autoplay;" allowfullscreen></iframe>
<hr>
-->

   @endif

    @if($displayCard == 1)
    <form id="userdata-viewer-search-form" class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-12">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-search"></i></div>
                    <input type="text" class="form-control" id="search-box" placeholder="Search...">
                    <div class="input-group-btn"><button type="submit" class="btn btn-primary btn">Search</button></div>
		</div>
		<p>สามารถหาเพื่อนของน้องๆได้จากตัวย่อ ของ คณะต่างๆ เช่น CPE,CVE,ME เป็นต้น หรือจากการ พิมพ์ชื่อ เพื่อนของน้องๆ</p>
		<p>You can look for your friend by type department abbreviation such as CPE,CVE,ME or type your friend name in the search box.</p>

            </div>
        </div>
    </form>


    <p id="search-status">Start typing in the search box to search.</p>
        @if($staffcard == 1)
            @foreach($userprofiles as $profile)
                @include('components.starstaffcard', ['p' => $profile, 'lazyload' => true ,'vote' => true])
            @endforeach
        @endif
        @if($staffcard == 0)
            @foreach($userprofiles as $profile)
                @include('components.starcard', ['p' => $profile, 'lazyload' => true ,'vote' => true , 'startype' => $startype])
            @endforeach
        @endif
    @endif
@endsection

@section('footer')
    <script src="{{ asset('js/userdataviewer.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.lazyload.min.js') }}"></script>
    <script src="{{ asset ('/node_modules/browser-detect/dist/browser-detect.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $("img.lazy").lazyload({
                effect : "fadeIn"
            });
        });
    </script>
<script src="https://www.youtube.com/player_api"></script>

<script>



$(function() {
    var result = browser();
    if(result.name == 'safari'){
	document.getElementById("browserDetect").innerHTML = "Browser Detect : " +result.name +" " + result.version + " (If you use Safari. You need to click play the video by yourself) ";
    }
    if(window.location.href === 'https://2bkmutt.com/profile/starvote'){
    $('#link').hide();
    $('#define').hide();
    }
    else{
	$('#link').show();
        $('#define').show();
    }
});



    // create youtube player
    var player;
    function onYouTubePlayerAPIReady() {
        player = new YT.Player('player', {
          height: '560',
          width: '100%',
	  playerVars: {
                    autoplay: 1
		},
          videoId: 'jPWSzLpnH_M?',
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
    }

    // autoplay video
    function onPlayerReady(event) {
        event.target.playVideo();
    }

    // when video ends
    function onPlayerStateChange(event) {        
        if(event.data === 0) {            
		$('#link').show();
                $('#define').show();
        }
    }
  
</script>



@endsection

