<div class="user-attendance-card" data-camp_id="{{ $p['camp_id'] }}" data-checked=false >
    <div class="user-attendance-card-inner lazy" data-original="{{ url('img/profile/'.$p['image_filename']) }}" style="background-image: url('{{ url('img/preloader.jpg') }}');">
        <div class="user-attendance-card-gradiant">
            <div class="user-attendance-card-content">
                <h5 class="nickname">{{ $p['nickname-en'] }} <small class="nickname-th">{{ $p['nickname-th'] }}</small></h5>
                <h6 class="camp_id">{{ $p['camp_id'] }}</h6>
                <hr>
                <p class="sec">SEC{{ $p['sec'] }}</p>
                <p class="dorm">{{ ($p['is_dorm'] == 1)? "นอนหอ " . $p['dorm_info']: "ไปกลับ" }}</p>
                <p class="remark">หมายเหตุ: {{ $p['remark'] }}</p>
                <p class="remark">RFID : {{$p['rfid']}}</p>
		        <p class="staff" id="staff-value">{{ $p['staff'] }}</p>
            </div>
        </div>
    </div>
</div>
