@extends('layouts.app')

@section('title', 'First Time Registration')

@section('content')
    @include('components.title', [
        "title" => "Edit User"
    ])
    <?php
        $user = App\UserProfile::where("id", "=", $id)->get()->first();
        $generateFields = array(
            [
                "name" => "",
                "display" => "",
                "html" => '<img src="' . url('img/profile/'. $user->image_filename ) . '" style="width:50%;">'
            ],
            [
                "name" => "",
                "display" => "ID",
                "html" => '<p class="form-control-static">' . $user->id . '</p>
                           <input type="hidden" name="id" id="form_id" value='.$user->id.'>'
            ],
            [
                "name" => "",
                "display" => "USER ID",
                "html" => '<p class="form-control-static">' . $user->user_id . '</p>
                           <input type="hidden" name="user_id" id="form_user_id" value='.$user->user_id.'>'
            ],
            [
                "name" => "camp_id",
                "display" => "2B-KMUTT ID",
            ],
            [
                "name" => "sec",
                "display" => "Section",
            ],
            [
                "name" => "remark",
                "display" => "หมายเหตุ"
            ],
	    [
		"name" => "checkWhere",
		"display" => "น้องจะเข้ามาที่ไหน",
		"html" => '
		<label class="radio-inline">
                      <input type="radio" name="checkWhere" value="1" '. (($user->checkWhere == "1")? 'checked': '') .' > บางมด
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="checkWhere" value="2" '. (($user->checkWhere == "2")? 'checked': '') .' > บางขุน
                    </label>
		'

	    ],
	    [
                "name" => "staff",
                "display" => "น้องจะไปเที่ยวกับใคร",
                "help" => "Example : PBoss,PAom,PFort,PNut"

            ],
	    [
                "name" => "where",
                "display" => "ไปที่ไหน",
                "html" => '
			<label for="where">โปรดเลือกสถานที่</label>
      			<select class="form-control">
			<option>CEN2</option>
			<option>CEN3</option>
			<option>SIAM</option>
			<option>BANMOR</option>
			<option>WATPRAKAEW</option>
			<option>DREAMWORLD</option>
			<option>BOOKFAIR2018</option>
			<option>SIAMPARKCITY</option>
                        <option>OTHER</option>
      			</select>
                ' 

            ],

	    [
                "name" => "whenCome",
                "display" => "น้องจะเข้ามากี่โมง",
                "help" => "กรอกเป็น  11:00 13:15 ประมาณนี้"
            ],

            [
                "name" => "",
                "display" => "",
                "html" => '<p style="font-size: 16px;" class="form-control-static">ข้อมูลส่วนตัว</p>'
            ],
            [
                "name" => "gender",
                "display" => "เพศ",
                "html" => '
                    <label class="radio-inline">
                      <input type="radio" name="gender" id="form_gender" value="M" '. (($user->gender == "M")? 'checked': '') .' > ชาย / Male
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="gender" id="form_gender" value="F" '. (($user->gender == "F")? 'checked': '') .' > หญิง / Female
                    </label>
                '
            ],
            [
                "name" => "title",
                "display" => "คำนำหน้าชื่อ"
            ],
            [
                "name" => "first_name-th",
                "display" => "ชื่อจริง"
            ],
            [
                "name" => "last_name-th",
                "display" => "นามสกุล"
            ],
            [
                "name" => "first_name-en",
                "display" => "First Name"
            ],
            [
                "name" => "last_name-en",
                "display" => "Last Name"
            ],
            [
                "name" => "nickname-th",
                "display" => "ชื่อเล่น"
            ],
            [
                "name" => "nickname-en",
                "display" => "Nickname"
            ],
            [
                "name" => "self_telephone_no",
                "display" => "เบอร์โทรศัพท์"
            ],
            [
                "name" => "birth_date",
                "display" => "วันเกิด",
                "help" => "กรอกเป็น ปี-เดือน-วัน เช่น 1998-09-23"
            ],
            [
                "name" => "school",
                "display" => "โรงเรียน"
            ],
            [
                "name" => "grade",
                "display" => "ระดับชั้น",
                "html" => '
                    <label class="radio-inline">
                      <input type="radio" name="grade" id="form_grade" value="ม.4" '. (($user->grade == "ม.4")? 'checked': '') .' > ม.4 (~Grade 10)
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="grade" id="form_grade" value="ม.5" '. (($user->grade == "ม.5")? 'checked': '') .' > ม.5 (~Grade 11)
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="grade" id="form_grade" value="ปวช.1" '. (($user->grade == "ปวช.1")? 'checked': '') .' > ปวช.1
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="grade" id="form_grade" value="ปวช.2" '. (($user->grade == "ปวช.2")? 'checked': '') .' > ปวช.2
                    </label>
                '
            ],
            [
                "name" => "disease",
                "display" => "โรคประจำตัว",
                "placeholder" => "-"
            ],
            [
                "name" => "allergic",
                "display" => "แพ้",
                "placeholder" => "-"
            ],
            [
                "name" => "email",
                "display" => "อีเมล"
            ],
            [
                "name" => "facebook",
                "display" => "Facebook",
            ],
            [
                "name" => "",
                "display" => "",
                "html" => '<p style="font-size: 16px;" class="form-control-static">ข้อมูลผู้ปกครอง</p>'
            ],
            [
                "name" => "parent_first_name-th",
                "display" => "ชื่อจริงผู้ปกครอง"
            ],
            [
                "name" => "parent_last_name-th",
                "display" => "นามสกุลผู้ปกครอง"
            ],
            [
                "name" => "parent_telephone_no",
                "display" => "เบอร์โทรศัพท์ผู้ปกครอง"
            ],
            [
                "name" => "",
                "display" => "",
                "html" => '<p style="font-size: 16px;" class="form-control-static">ข้อมูลหอ</p>'
            ],
            [
                "name" => "is_dorm",
                "display" => "ที่พัก",
                "html" => '
                    <label class="radio-inline">
                      <input type="radio" name="grade" id="form_grade" value="1" '. (($user->is_dorm == 1)? 'checked': '') .' > นอนหอ
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="grade" id="form_grade" value="0" '. (($user->is_dorm == 0)? 'checked': '') .' > ไป-กลับ
                    </label>
                '
            ],
            [
                "name" => "dorm_info",
                "display" => "ห้องพัก (สำหรับคนอยู่หอ)"
            ]
        );
    ?>
    @if(isset($withSuccess))
        <div class="alert alert-success">Saved</div>
    @endif
    <form action="{{ url('/tools/edit-user') }}" method="post" class="form-horizontal">
        <form class="form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @foreach( $generateFields as $field )
            <div class="form-group">
                <label for="{{ $field['name'] }}" class="col-sm-3 control-label">{{ $field['display'] }} {{ (isset($field['required'])? " *": "") }}</label>
                <div class="col-sm-9">
                    <?php
                        if(isset($field['html'])){
                            echo $field['html'];
                        }else{
                            echo '<input
                                    type="text"
                                    class="form-control"
                                    '.( (isset($field['required']))? ' required ':'' ).'
                                    name="'.$field['name'].'"
                                    id="form_'.$field['name'].'"
                                    placeholder="'.( (isset($field['placeholder']) )? $field['placeholder']: str_replace("*", "", $field['display']) ) .'"
                                    value="'.$user[$field['name']].'">';
                        }
                        if( isset($field['help']) ) echo '<p class="help-block">'.$field['help'].'</p>';
                    ?>
                </div>
            </div>
        @endforeach
        <div class="form-group">
            <label class="col-sm-3 control-label"></label>
            <div class="col-sm-9">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection

@section('footer')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endsection
