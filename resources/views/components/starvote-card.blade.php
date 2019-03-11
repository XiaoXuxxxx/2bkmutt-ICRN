<div class="user-attendance-card" data-camp_id="{{ $p['id'] }}" data-checked=false >
    <div class="user-attendance-card-inner lazy" data-original="{{ url('img/profile/'.$p['image_filename']) }}" style="background-image: url('{{ url('img/preloader.jpg') }}');">
        <div class="user-attendance-card-gradiant">
            <div class="user-attendance-card-content">
                <h5 class="nickname">{{ $p['nickname-en'] }} <small class="nickname-th">{{ $p['nickname-th'] }}</small></h5>
                <hr>
                <p class="sec">SEC {{ $p['sec'] }}</p>
                <p class="remark">{{ $p['camp_id'] }}</p>
            </div>
        </div>
    </div>
</div>
