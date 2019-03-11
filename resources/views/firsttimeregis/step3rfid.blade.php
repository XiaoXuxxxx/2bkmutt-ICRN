@extends('layouts.app')

@section('title', 'First Time Registration')

@section('content')
    @include('components.title', [
        "title" => "First Time Registration",
        "desc" => "ลงทะเบียนครั้งแรก"
    ])
    <?php
        $user = App\UserProfile::where("camp_id", "=", $camp_id)->get()->first();
        $generateFields = array(
            [
                "name" => "",
                "display" => "",
                "html" => '<p style="color: red;" class="form-control-static">* Required (จำเป็นต้องกรอก)</p>'
            ],
            [
                "name" => "",
                "display" => "",
                "html" => '<p style="font-size: 16px;" class="form-control-static">ข้อมูลส่วนตัว</p>'
            ],
            [
                "name" => "camp_id",
                "display" => "2B-KMUTT ID",
                "html" => '<p class="form-control-static">' . $user->camp_id . '</p><input type="hidden" name="camp_id" id="form_camp_id" value='.$user->camp_id.'>'
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
                ',
                "required" => true
            ],
            [
                "name" => "title",
                "display" => "คำนำหน้าชื่อ",
                "required" => true
            ],
            [
                "name" => "first_name-th",
                "display" => "ชื่อจริง",
                "required" => true
            ],
            [
                "name" => "last_name-th",
                "display" => "นามสกุล",
                "required" => true
            ],
            [
                "name" => "first_name-en",
                "display" => "First Name",
                "required" => true
            ],
            [
                "name" => "last_name-en",
                "display" => "Last Name",
                "required" => true
            ],
            [
                "name" => "nickname-th",
                "display" => "ชื่อเล่น",
                "required" => true
            ],
            [
                "name" => "nickname-en",
                "display" => "Nickname",
                "required" => true
            ],
            [
                "name" => "self_telephone_no",
                "display" => "เบอร์โทรศัพท์",
                "required" => true,
                "help" => "ใส่เฉพาะตัวเลข ห้ามใส่ขีดคั่น"
            ],
            [
                "name" => "birth_date",
                "display" => "วันเกิด",
		"html" => '
		<div class="input-group date">
  			<input type="text" class="form-control" name="birth_date"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
		</div>',
                "required" => true
            ],
            [
                "name" => "school",
                "display" => "โรงเรียน",
                "required" => true
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
                ',
                "required" => true
            ],
	    [
		"name" => "religion",
		"display" => "ศาสนา",
		"placeholder" => "-"

	    ],
            [
                "name" => "disease",
                "display" => "โรคประจำตัว",
                "placeholder" => "-"
            ],
            [
                "name" => "allergic",
                "display" => "สิ่งที่แพ้",
                "placeholder" => "-"
            ],
            [
                "name" => "email",
                "display" => "อีเมล",
                "help" => "อีเมลที่ใช้ติดต่อได้ในปัจจุบัน",
                "required" => true
            ],
            [
                "name" => "facebook",
                "display" => "Facebook",
                "help" => "ใส่เป็นชื่อเฟซบุ๊ค เช่น John Doe"
            ],
            [
                "name" => "",
                "display" => "",
                "html" => '<p style="font-size: 16px;" class="form-control-static">ข้อมูลผู้ปกครอง</p>'
            ],
            [
                "name" => "parent_first_name-th",
                "display" => "ชื่อจริงผู้ปกครอง",
                "required" => true
            ],
            [
                "name" => "parent_last_name-th",
                "display" => "นามสกุลผู้ปกครอง",
                "required" => true
            ],
            [
                "name" => "parent_telephone_no",
                "display" => "เบอร์โทรศัพท์ผู้ปกครอง",
                "required" => true
            ]
        );
    ?>
    <h5>Step 3: ตรวจสอบข้อมูล</h5><br>
    <form action="{{ url('/magic/first-time-registration/register') }}" method="post" class="form-horizontal">
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
                <button type="submit" class="btn btn-primary">ส่งข้อมูล</button>
            </div>
        </div>
    </form>
<script type='text/javascript' src="/js/jquery-3.3.1.js"></script>
<script type='text/javascript' src="/js/jquery-ui.js"></script>
<script type='text/javascript' src="/js/bootstrap-datepicker.js"></script>
<script type='text/javascript'>
$('.input-group.date').datepicker({
    calendarWeeks: true,
    todayHighlight: true,
    autoclose: true,
    dateFormat: 'yy-mm-dd'
});  

</script>
@endsection

@section('footer')

@endsection
