<div class="user-attendance-card" data-camp_id="{{ $p['camp_id'] }}" data-checked=false >
    <div class="user-attendance-card-inner lazy" data-original="{{ url('img/profile/'.$p['image_filename']) }}" style="background-image: url('{{ url('img/preloader.jpg') }}');">
        <div class="user-attendance-card-gradiant">
            <div class="user-attendance-card-content">
                <h5 class="nickname">{{ $p['nickname-en'] }} <small class="nickname-th">{{ $p['nickname-th'] }}</small></h5>
                <h6 class="camp_id">{{ $p['camp_id'] }}</h6>
                <hr>
                <p class="sec">{{ $p['staff'] }}</p><br>
                <p class="sec">{{ ($p['is_dorm'] == 1)? "นอนหอ " : "ไปกลับ" }}</p>

                <p class="dorm">{{ ($p['where'] == 'OTHER')?  $p['whereOther']: $p['where'] }}</p>
		<p class="dorm">ออกตอน:{{ $p['whenOut'] }}</p>
                <p class="dorm">เข้าตอน:{{ $p['whenCome'] }}</p>
		 <p class="remark">หมายเหตุ: {{ $p['remark'] }}</p>
            </div>
        </div>
    </div>
</div>
