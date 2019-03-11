<div class="user-card" data-camp_id="{{ $p['camp_id'] }}">
    <div class="user-card-content">
        <div class="row">
            <div class="col-sm-8">
                <h2>{{ $p['camp_id'] }} <small>{{ $p['nickname-th'] . " (" . $p['nickname-en']  . ")" }}</small></h2>
                <h5>{{ $p['title'] . $p['first_name-th'] . ' ' . $p['last_name-th'] }} ({{ $p['first_name-en'] . ' ' . $p['last_name-en'] }})</h5>
                <h6>SEC
                    {{ $p['sec'] }} | 
                    {{ $p['grade'] }} | 
                    {{ ($p['gender'] == "M")? "ผู้ชาย": "ผู้หญิง" }} | 
                    {{ $p['department']['faculty_abbr'] }}:{{ $p['department']['department_abbr'] }} | 
                    {{ (isset($p['user_id']))? "REGISTERED": "UNREGISTERED" }} | 
                    <a href="{{ url('tools/edit-user/' .$p['id'] )}}"><button class="btn btn-primary">EDIT</button></a> | 
                    <a href="{{ url('tools/freeday/' .$p['id'] )}}"><button class="btn btn-info">FreeDay</button></a>
                </h6>
            </div>
            
            <div class="col-sm-4">
                <?php
                if(isset($lazyload) && $lazyload){
                echo '<img class="lazy img-responsive img-rounded" data-original="'. url('img/profile/'.$p['image_filename']) .'">';
                }else{
                echo '<img class="img-responsive img-rounded" src="'. url('img/profile/'.$p['image_filename']) .'">';
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5 data-col">
                <ul class="detailed-data">
                    <li><label>ที่พัก:</label> {{ ($p['is_dorm'] == 1)? 'นอนหอ '.'(ห้อง: ' . $p['dorm_info'] . ')': "ไปกลับ" }}</li>
                    <li><label>เบอร์โทรศัพท์:</label> {{ $p['self_telephone_no'] }}</li>
                    <li><label>วันเกิด:</label> {{ date_format(date_create($p['birth_date']), 'F j, Y') }}</li>
                    <li><label>โรงเรียน:</label> {{ $p['school'] }}</li>
                    <li><label>คณะ:</label> {{ $p['department']['faculty_full-th'] }}</li>
                    <li><label>ภาควิชา:</label> {{ $p['department']['department_full-th'] }}</li>
                    <li><label>ชื่อผู้ปกครอง:</label> {{ $p['parent_first_name-th'] }} {{ $p['parent_last_name-th'] }}</li>
                    <li>ข้อมูลพี่ประจำแลป</li>
                    @foreach($staffcontact as $display)
                    @if($p['department']['camp_dept_id'] == $display['dept_id'])
                    <li><label>ชื่อ:</label> {{ $display['first_name_th']}}  {{ $display['last_name_th']}} ({{ $display['nickname_th']}})</li>
                    @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-5 data-col">
                <ul class="detailed-data">
                    <li><label>โรคประจำตัว:</label> {{ $p['disease'] }}</li>
                    <li><label>อาหารที่แพ้:</label> {{ $p['allergic'] }}</li>
                    <li><label>ศาสนา:</label> {{ $p['religion'] }}</li>
                    <li><label>อีเมล:</label> {{ $p['email'] }}</li>
                    <li><label>เฟซบุ๊ค:</label> {{ $p['facebook'] }}</li>
                    <li><label>หมายเหตุ:</label> {{ $p['remark'] }}</li>
                    <li><label>เบอร์โทรศัพท์ผู้ปกครอง:</label> {{ $p['parent_telephone_no'] }}</li>
                    <li><label></label>-----------------------------------------------------------</li>
                    @foreach($staffcontact as $display)
                    @if($p['department']['camp_dept_id'] == $display['dept_id'])
                    <li><label>เบอร์โทรศัพท์:</label> {{ $display['telephone_no']}}</li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>