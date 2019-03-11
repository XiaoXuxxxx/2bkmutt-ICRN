<div class="user-card" data-camp_id="{{ $p['id'] }}">
    <div class="user-card-content">
        <div class="row">
            <div class="col-sm-8">
                <h2>{{ $p['nickname_th'] . " (" . $p['nickname_en']  . ")" }}</h2>
                <h5>{{ $p['title'] . $p['first_name_th'] . ' ' . $p['last_name_th'] }} ({{ $p['first_name_en'] . ' ' . $p['last_name-en'] }})</h5>
                <h6>{{ ($p['gender'] == "M")? "ผู้ชาย": "ผู้หญิง" }} | SEC{{ $p['sec'] }} | {{ $p['department']['faculty_abbr'] }}:{{ $p['department']['department_abbr'] }} </h6>
            </div>
            <div class="col-sm-4">
                <?php
                    if(isset($lazyload) && $lazyload){
                        echo '<img class="lazy img-responsive" data-original="'. url('img/staff/'.$p['image_filename']) .'">';
                    }else{
                        echo '<img class="img-responsive" src="'. url('img/profile/'.$p['image_filename']) .'">';
                    }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5 data-col">
            <ul class="detailed-data">
                <li><label>SEC:</label> {{ $p['sec'] }}</li>
                <li><label>เบอร์โทรศัพท์:</label> {{ $p['telephone_no'] }}</li>
                <li><label>วันเกิด:</label> {{ date_format(date_create($p['birth_date']), 'F j, Y') }}</li>
                <li><label>คณะที่ดูแล:</label> {{ $p['department']['faculty_full-th'] }}</li>
                <li><label>ภาควิชาที่ดูแล:</label> {{ $p['department']['department_full-th'] }}</li>
            </ul>
            </div>
            <div class="col-sm-5 data-col">
                <ul class="detailed-data">
                    <li><label>โรคประจำตัว:</label> {{ $p['disease'] }}</li>
                    <li><label>อาหารที่แพ้:</label> {{ $p['allergic'] }}</li>
                    <li><label>อีเมล:</label> {{ $p['email'] }}</li>
                    <li><label>เฟซบุ๊ค:</label> {{ $p['facebook'] }}</li>
                    <li><label>หมายเหตุ:</label> {{ $p['remark'] }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
